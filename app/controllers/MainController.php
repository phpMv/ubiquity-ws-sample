<?php
namespace controllers;

use Ubiquity\utils\http\URequest;
use ws\controllers\AbstractWsController;

/**
 * Controller MainController
 */
class MainController extends AbstractWsController {

	/**
	 *
	 * @get("_default","name"=>"Home")
	 */
	public function index() {
		$this->loadDefaultView([
			'messages' => $this->dataProvider->getMessages(),
			'content' => nl2br($this->dataProvider->getPageContent('Home'))
		] + $this->getMenu('Home'));
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
}
