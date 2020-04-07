<?php
namespace controllers;

use Ubiquity\utils\http\URequest;
use ws\controllers\AbstractWsController;
use Ubiquity\utils\http\UCookie;
use Ubiquity\utils\base\UString;

/**
 * Controller MainController
 */
class MainController extends AbstractWsController {

	private $noMoreMessages;

	private $cookieMessage = '';

	private $acceptCookies = false;

	private function getMessages() {
		$allMessages = $this->dataProvider->getMessages();
		$messages = [];
		foreach ($allMessages as $message) {
			if (! UString::contains($message->title, $this->noMoreMessages)) {
				$messages[] = $message;
			}
		}
		return $messages;
	}

	public function initialize() {
		parent::initialize();

		if (! UCookie::exists("init-cookies")) {
			$this->cookieMessage = $this->loadView('MainController/cookiesInfo.html', [
				'redirect' => basename($_SERVER['REQUEST_URI'])
			], true);
		} else {
			$this->acceptCookies = UString::getBooleanStr(UCookie::get('accepts-cookies', false));
			if ($this->acceptCookies) {
				$this->noMoreMessages = UCookie::get('noMoreMessages', '');
			}
		}
	}

	public function finalize() {
		if (! URequest::isAjax()) {
			$this->loadView($this->footerView, [
				'cookieMessage' => $this->cookieMessage
			]);
		}
	}

	private function displayPage($page = 'Home', $hasMessages = true) {
		$menu = $this->getMenu($page);
		$messages = [];
		if ($hasMessages) {
			$messages = $this->getMessages();
		}
		$content = nl2br($this->dataProvider->getPageContent($page));
		$this->loadView('MainController/index.html', compact('messages', 'content') + $menu);
	}

	/**
	 *
	 * @get("_default","name"=>"Home")
	 */
	public function index() {
		$this->displayPage();
	}

	/**
	 *
	 * @get("news","name"=>"News")
	 */
	public function displayNews() {
		$this->displayPage('News', false);
	}

	/**
	 *
	 *@get("contact","name"=>"Contact")
	 */
	public function contact() {
		$this->loadDefaultView($this->getMenu('Contact'));
	}

	/**
	 *
	 *@get("partners","name"=>"Partners")
	 */
	public function partners() {
		$partners = $this->dataProvider->getPartners();
		$this->loadDefaultView([
			'partners' => $partners
		] + $this->getMenu('Partners'));
	}

	/**
	 *
	 *@get("partner/{name}")
	 */
	public function partnerDetails($name) {
		$partner = $this->dataProvider->getPartner($name);
		if ($partner != null) {
			return $this->loadDefaultView([
				'partner' => $partner
			] + $this->getMenu(''));
		}
		$this->notfound('/partner/' . $name);
	}

	/**
	 *
	 * @route("{route}","requirements"=>["route"=>"(?!admin|Admin).*?"],"priority"=>-1000)
	 */
	public function notfound($route) {
		$this->loadView("MainController/notfound.html", [
			'route' => $route
		] + $this->getMenu(''));
	}

	/**
	 *
	 *@route("sendMessage")
	 */
	public function sendMessage() {
		$message = (object) URequest::getDatas();
		$this->loadDefaultView([
			'msg' => $message
		]);
	}

	/**
	 *
	 * @get("noMore/{title}","name"=>"noMore")
	 */
	public function noMoreMessage($title) {
		$this->noMoreMessages .= ',' . $title;
		if ($this->acceptCookies) {
			UCookie::set('noMoreMessages', $this->noMoreMessages);
		}
		$this->index();
	}

	/**
	 *
	 * @get("cookies/{accept}/{redirect}")
	 */
	public function acceptCookiesOrNot($accept, $redirect = '') {
		$accept = UString::isBooleanTrue($accept);
		UCookie::set('accepts-cookies', $accept);
		UCookie::set('init-cookies', 1);
		header("location:/$redirect");
	}
}
