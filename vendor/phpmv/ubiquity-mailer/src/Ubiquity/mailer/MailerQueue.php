<?php
namespace Ubiquity\mailer;

use Ubiquity\cache\CacheManager;
use Ubiquity\utils\base\UArray;

/**
 * Ubiquity\mailer$MailerQueue
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.0
 *
 */
class MailerQueue {

	/**
	 *
	 * @var array
	 */
	private $queue;

	/**
	 *
	 * @var array
	 */
	private $dequeue;

	private $rootKey = 'mailer/';

	public function __construct() {
		$cache = CacheManager::$cache;
		if ($cache->exists($this->rootKey . 'queue')) {
			$this->queue = $cache->fetch($this->rootKey . 'queue');
		} else {
			$this->queue = [];
		}
		if ($cache->exists($this->rootKey . 'dequeue')) {
			$this->dequeue = $cache->fetch($this->rootKey . 'dequeue');
		} else {
			$this->dequeue = [];
		}
	}

	public function add(string $mailerClass): bool {
		if (! $this->search($mailerClass)) {
			$this->queue[] = [
				'class' => $mailerClass
			];
			return true;
		}
		return false;
	}

	public function search(string $mailerClass): bool {
		foreach ($this->queue as $element) {
			if ($element['class'] === $mailerClass && (! isset($element['at']) && ! isset($element['between']))) {
				return true;
			}
		}
		return false;
	}

	public function later(string $mailerClass, \DateInterval $duration): void {
		$d = new \DateTime();
		$this->sendAt($mailerClass, $d->add($duration));
	}

	public function sendAt(string $mailerClass, \DateTime $date): void {
		$this->queue[] = [
			'class' => $mailerClass,
			'at' => $date
		];
	}

	public function sendBetween(string $mailerClass, \DateTime $startDate, \DateTime $endDate): void {
		$this->queue[] = [
			'class' => $mailerClass,
			'between' => $startDate,
			'and' => $endDate
		];
	}

	public function save($queue = true, $dequeue = true): void {
		if ($queue) {
			$this->saveContent('queue');
		}
		if ($dequeue) {
			$this->sortDequeue();
			$this->saveContent('dequeue');
		}
	}

	private function saveContent($part): void {
		$content = "return " . UArray::asPhpArray($this->{$part}, 'array') . ';';
		CacheManager::$cache->store($this->rootKey . $part, $content);
	}

	private function sortDequeue() {
		\usort($this->dequeue, function ($left, $right) {
			return $right['sentAt'] <=> $left['sentAt'];
		});
	}

	public function toSendAt(\DateTime $date): array {
		$result = [];
		foreach ($this->queue as $index => $mail) {
			$this->toSendMailAt($result, $mail, $date, $index);
		}
		return $result;
	}

	private function toSendMailAt(array &$result, array $mail, \DateTime $date, $index): bool {
		if (isset($mail['at'])) {
			if ($mail['at'] <= $date) {
				$mail['index'] = $index;
				$result[] = $mail;
				return true;
			}
		} elseif (isset($mail['between'])) {
			if ($date >= $mail['between'] && $date <= $mail['and']) {
				$mail['index'] = $index;
				$result[] = $mail;
				return true;
			}
		}
		return false;
	}

	public function toSend(): array {
		$result = [];
		$date = new \DateTime();
		foreach ($this->queue as $index => $mail) {
			if (! isset($mail['at']) && ! isset($mail['between'])) {
				$mail['index'] = $index;
				$result[] = $mail;
			} else {
				$this->toSendMailAt($result, $mail, $date, $index);
			}
		}
		return $result;
	}

	public function all(): array {
		return $this->queue ?? [];
	}

	public function allSent(): array {
		return $this->dequeue ?? [];
	}

	public function clear(): void {
		$this->queue = [];
	}

	public function remove($mailerClass): void {
		foreach ($this->queue as $index => $value) {
			if ($value['class'] === $mailerClass) {
				unset($this->queue[$index]);
			}
		}
	}

	public function removeByIndex($index): bool {
		if (isset($this->queue[$index])) {
			unset($this->queue[$index]);
			return true;
		}
		return false;
	}

	public function removeFromDequeueByIndex($index): bool {
		if (isset($this->dequeue[$index])) {
			unset($this->dequeue[$index]);
			return true;
		}
		return false;
	}

	public function removeAt(\DateTime $date, $inInterval = false): void {
		foreach ($this->queue as $index => $value) {
			if (($value['at'] ?? null) === $date) {
				unset($this->queue[$index]);
			} elseif ($inInterval && isset($value['between'])) {
				if ($date >= $value['between'] && $date <= $value['and']) {
					unset($this->queue[$index]);
				}
			}
		}
	}

	public function sent($index): bool {
		if (isset($this->queue[$index])) {
			$mail = $this->queue[$index];
			$mail['sentAt'] = new \DateTime();
			unset($this->queue[$index]);
			$this->dequeue[] = $mail;
			return true;
		}
		return false;
	}

	public function sendAgain($index): bool {
		if (isset($this->dequeue[$index])) {
			$mailInfos = $this->dequeue[$index];
			$mail = new ArrayMail();
			$mail->setArrayInfos($mailInfos);
			if (MailerManager::send($mail)) {
				$mailInfos['sentAt'] = new \DateTime();
				$this->dequeue[] = $mailInfos;
				return true;
			}
		}
		return false;
	}

	public function sendArray(array $values): bool {
		$mail = new ArrayMail();
		$mail->setArrayInfos($values);
		if (MailerManager::send($mail)) {
			$values['sentAt'] = new \DateTime();
			$this->dequeue[] = $values;
			return true;
		}
		return false;
	}

	public function send($index): bool {
		if (isset($this->queue[$index])) {
			$mailInfos = $this->queue[$index];
			$mailClass = $mailInfos['class'];
			$mail = new $mailClass();
			if (MailerManager::send($mail)) {
				$mailInfos['sentAt'] = new \DateTime();
				$mailInfos['to'] = $mail->to;
				$mailInfos['cc'] = $mail->cc;
				$mailInfos['bcc'] = $mail->bcc;
				$mailInfos['from'] = $mail->from;
				$mailInfos['subject'] = $mail->subject;
				$mailInfos['attachments'] = $mail->attachments;
				$mailInfos['rawAttachments'] = $mail->rawAttachments;
				$mailInfos['body'] = $mail->body();
				$mailInfos['bodyText'] = $mail->bodyText();
				$mailInfos['attachmentsDir'] = $mail->getAttachmentsDir();
				unset($this->queue[$index]);
				$this->dequeue[] = $mailInfos;
				return true;
			}
		}
		return false;
	}
}

