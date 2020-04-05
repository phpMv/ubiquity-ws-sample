<?php
namespace Ubiquity\exceptions;

/**
 * Ubiquity\exceptions$MailerException
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.0
 *
 */
class MailerException extends UbiquityException {

	public function __construct($message = null, $code = null, $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}
