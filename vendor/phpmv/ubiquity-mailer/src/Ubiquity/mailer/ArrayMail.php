<?php
namespace Ubiquity\mailer;

use PHPMailer\PHPMailer\PHPMailer;

class ArrayMail extends AbstractMail {

	/**
	 *
	 * @var array
	 */
	private $arrayInfos;

	/**
	 *
	 * @return array
	 */
	public function getArrayInfos() {
		return $this->arrayInfos;
	}

	/**
	 * This array sets the main values (to, from, cc, bcc, subject, body, bodyText, attachments, rawAttachments)
	 *
	 * @param array $arrayInfos
	 */
	public function setArrayInfos(array $arrayInfos) {
		$this->arrayInfos = $arrayInfos;
	}

	public function addArrayInfos(array $arrayInfos) {
		foreach ($arrayInfos as $k => $v) {
			$this->arrayInfos[$k] = $v;
		}
	}

	public function body() {
		return $this->arrayInfos['body'] ?? '';
	}

	public function bodyText() {
		return $this->arrayInfos['bodyText'] ?? '';
	}

	public function getSubject() {
		return $this->arrayInfos['subject'] ?? '';
	}

	public function build(PHPMailer $mailer) {
		foreach ($this->arrayInfos as $key => $value) {
			if (\property_exists($this, $key)) {
				$this->{$key} = $value;
			}
		}
		parent::build($mailer);
	}

	public static function copyFrom(AbstractMail $mail) {
		$newMail = new ArrayMail();
		$newMail->setArrayInfos([
			'from' => $mail->from,
			'to' => $mail->to,
			'cc' => $mail->cc,
			'bcc' => $mail->bcc,
			'subject' => $mail->getSubject(),
			'body' => $mail->body(),
			'bodyText' => $mail->bodyText(),
			'attachments' => $mail->attachments,
			'rawAttachments' => $mail->rawAttachments,
			'replyTo' => $mail->replyTo
		]);
		return $newMail;
	}

	public function getAttachmentsDir() {
		return $this->arrayInfos['attachmentsDir'] ?? parent::getAttachmentsDir();
	}
}

