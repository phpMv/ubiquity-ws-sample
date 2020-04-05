<?php
namespace Ubiquity\mailer;

use PHPMailer\PHPMailer\PHPMailer;
use Ubiquity\utils\base\UArray;
use Ubiquity\utils\base\UFileSystem;
use Ubiquity\cache\ClassUtils;

/**
 * Ubiquity\mailer$MailerManager
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.0
 *
 */
class MailerManager {

	/**
	 *
	 * @var PHPMailer
	 */
	private static $mailer;

	/**
	 *
	 * @var MailerQueue
	 */
	private static $queue;

	private static $config;

	private static $dConfig = [
		'host' => '127.0.0.1',
		'port' => 587,
		'auth' => false,
		'user' => '',
		'password' => '',
		'protocol' => 'smtp',
		'CharSet' => 'utf-8',
		'ns' => 'mail'
	];

	private static function getConfigPath() {
		return \ROOT . 'config' . \DS . 'mailer.php';
	}

	/**
	 * Start the mailer manager.
	 */
	public static function start() {
		$mailer = new PHPMailer();
		$config = self::loadConfig();
		$mailer->Host = $config['host'];
		$mailer->Port = $config['port'];
		$mailer->Mailer = $config['protocol'];
		if ($config['protocol'] === 'smtp') {
			$mailer->isSMTP();
			if (isset($config['SMTPOptions'])) {
				$mailer->SMTPOptions = $config['SMTPOptions'];
			}
			if ($config['auth']) {
				$mailer->SMTPAuth = true;
				$mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
				$mailer->Password = $config['password'];
				$mailer->Username = $config['user'];
			}
		}
		$mailer->isHTML(true);
		self::$mailer = $mailer;
		self::applyConfig($config);
		self::$queue = new MailerQueue();
	}

	public static function initConfig() {
		self::saveConfig(self::$dConfig);
	}

	public static function saveConfig($config) {
		$content = "<?php\nreturn " . UArray::asPhpArray($config, 'array', 1, true) . ';';
		$path = self::getConfigPath();
		if (UFileSystem::safeMkdir(\dirname($path))) {
			if (@\file_put_contents($path, $content, LOCK_EX) === false) {
				throw new \Exception("Unable to write mailer config file: {$path}");
			}
			return true;
		} else {
			throw new \Exception("Unable to create folder : {$path}");
		}
	}

	public static function loadConfig() {
		$path = self::getConfigPath();
		$config = [];
		if (\file_exists($path)) {
			$config = include self::getConfigPath();
		}
		return self::$config = \array_merge(self::$dConfig, $config);
	}

	public static function send(AbstractMail $mail): bool {
		$mail->build(self::$mailer);
		return self::$mailer->send();
	}

	public static function sendArray(array $values): bool {
		return self::$queue->sendArray($values);
	}

	public static function getErrorInfo() {
		return self::$mailer->ErrorInfo;
	}

	public static function getNamespace() {
		return self::$config['ns'] ?? 'mail';
	}

	/**
	 *
	 * @return \PHPMailer\PHPMailer\PHPMailer
	 */
	public static function getMailer() {
		return MailerManager::$mailer;
	}

	public static function sendQueue($limit = NULL): int {
		$mails = self::$queue->toSend();
		$i = 0;
		$limit = $limit ?? \sizeof($mails);
		while ($i < $limit) {
			self::$queue->send($i);
			$i ++;
		}
		return $i;
	}

	public static function sendQueuedMail($index): bool {
		return self::$queue->send($index);
	}

	/**
	 * Send again a mail in dequeue
	 *
	 * @param int $index
	 * @return bool
	 */
	public static function sendAgain($index): bool {
		return self::$queue->sendAgain($index);
	}

	/**
	 * Returns an array of mail files
	 *
	 * @param boolean $silent
	 * @return array
	 */
	protected static function _getFiles($silent = false) {
		$typeDir = \ROOT . \DS . \str_replace("\\", \DS, self::getNamespace());
		if (! $silent) {
			echo 'Mail directory is ' . $typeDir . "\n";
		}
		return UFileSystem::glob_recursive($typeDir . \DS . '*.php');
	}

	protected static function applyConfig($config) {
		$config = \array_diff_key($config, [
			'host' => 0,
			'port' => 0,
			'protocol' => 0,
			'SMTPOptions' => 0,
			'auth' => 0,
			'password' => 0,
			'user' => 0
		]);
		$reflex = new \ReflectionClass(self::$mailer);
		foreach ($config as $k => $v) {
			if ($reflex->hasProperty($k)) {
				$prop = $reflex->getProperty($k);
				$prop->setAccessible(true);
				$prop->setValue(self::$mailer, $v);
			} elseif ($reflex->hasMethod($k)) {
				$reflex->getMethod($k)->invoke(self::$mailer, $v);
			}
		}
	}

	/**
	 * Returns an array of the mail class names
	 *
	 * @param boolean $silent
	 * @return string[]
	 */
	public static function getMailClasses($silent = false) {
		$result = [];
		$files = self::_getFiles($silent);
		foreach ($files as $file) {
			$result[] = ClassUtils::getClassFullNameFromFile($file);
		}
		return $result;
	}

	public static function allInQueue() {
		return self::$queue->all();
	}

	public static function allInDequeue() {
		return self::$queue->allSent();
	}

	public static function addToQueue($class): bool {
		return self::$queue->add($class);
	}

	public static function sendAt($class, \DateTime $date) {
		self::$queue->sendAt($class, $date);
	}

	public static function sendBetween($class, \DateTime $startDate, \DateTime $endDate) {
		self::$queue->sendBetween($class, $startDate, $endDate);
	}

	public static function inQueue($class) {
		return self::$queue->search($class);
	}

	public static function saveQueue($queue = true, $dequeue = true) {
		self::$queue->save($queue, $dequeue);
	}

	public static function clearAllMessages() {
		self::$queue->clear();
	}

	public static function removeFromQueue($index): bool {
		return self::$queue->removeByIndex($index);
	}

	public static function removeFromDequeue($index): bool {
		return self::$queue->removeFromDequeueByIndex($index);
	}
}

