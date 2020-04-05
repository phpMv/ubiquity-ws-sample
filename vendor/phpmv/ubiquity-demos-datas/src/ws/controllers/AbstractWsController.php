<?php
namespace ws\controllers;

use ws\classes\data\AbstractDataProvider;
use ws\classes\data\DataArrayProvider;
use Ubiquity\utils\http\URequest;
use Ubiquity\controllers\Controller;

/**
 * Controller AbstractWsController
 */
abstract class AbstractWsController extends Controller {

	protected $headerView = "@activeTheme/main/vHeader.html";

	protected $footerView = "@activeTheme/main/vFooter.html";

	protected $items = [
		'Home',
		'Partners',
		'Contact'
	];

	protected AbstractDataProvider $dataProvider;

	/**
	 * Gets the menu for the active page
	 *
	 * @param string $activeItem
	 *        	The selected item in meny (active page)
	 * @return array
	 */
	protected function getMenu($activeItem) {
		$items = $this->items;
		return compact('items', 'activeItem');
	}

	public function initialize() {
		if (! URequest::isAjax()) {
			$this->loadView($this->headerView);
		}
		$this->dataProvider = new DataArrayProvider();
	}

	public function finalize() {
		if (! URequest::isAjax()) {
			$this->loadView($this->footerView);
		}
	}
}
