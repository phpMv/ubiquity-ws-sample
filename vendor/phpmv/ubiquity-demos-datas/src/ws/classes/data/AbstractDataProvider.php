<?php
namespace ws\classes\data;

/**
 * Abstract class
 *
 * @author jc
 *
 */
abstract class AbstractDataProvider {

	/**
	 * Returns an array of Partners (name, datails, image, tag)
	 */
	public abstract function getPartners();

	/**
	 * Gets a partner by its name
	 *
	 * @param string $name
	 */
	public abstract function getPartner(string $name);

	/**
	 * Returns an array of messages (title, content, type, icon)
	 */
	public abstract function getMessages();

	/**
	 */
	protected abstract function getContents();

	/**
	 * Returns the content of a page
	 *
	 * @param string $index
	 * @return string
	 */
	public function getPageContent(string $index) {
		return $this->getContents()[$index] ?? "No content";
	}
}

