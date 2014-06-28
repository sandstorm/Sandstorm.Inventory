<?php
namespace Sandstorm\Inventory\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * an item in the inventory
 *
 * @Flow\Entity
 */
class InventoryItem {

	/**
	 * name or title of the item
	 *
	 * @var string
	 * @Flow\Validate(type="Text")
	 * @Flow\Validate(type="StringLength", options={ "minimum"=3 })
	 */
	protected $title = '';

	/**
	 * serial number of the item
	 *
	 * @var string
	 * @Flow\Validate(type="Text")
	 * @Flow\Validate(type="StringLength", options={ "minimum"=6, "maximum"=6 })
	 * @ORM\Column(length=6)
	 */
	protected $serialNumber = '';

	/**
	 * A short description of the item
	 *
	 * @var string
	 * @Flow\Validate(type="Text")
	 */
	protected $description = '';

	/**
	 * The person currently responsible for the item
	 *
	 * @var string
	 * @Flow\Validate(type="Text")
	 * @Flow\Validate(type="StringLength", options={ "minimum"=1 })
	 */
	protected $curator = '';

	/**
	 * the serial number
	 *
	 * @param string $serialNumber new value
	 * @return void
	 */
	function setSerialNumber($serialNumber) {
		$this->serialNumber = $serialNumber;
	}

	/**
	 * the serial number
	 *
	 * @return string value
	 */
	function getSerialNumber() {
		return $this->serialNumber;
	}

	/**
	 * A short description of the item
	 *
	 * @param string $description new value
	 * @return void
	 */
	function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * A short description of the item
	 *
	 * @return string value
	 */
	function getDescription() {
		return $this->description;
	}

	/**
	 * The person currently responsible for the item
	 *
	 * @param string $curator new value
	 * @return void
	 */
	function setCurator($curator) {
		$this->curator = $curator;
	}

	/**
	 * The person currently responsible for the item
	 *
	 * @return string value
	 */
	function getCurator() {
		return $this->curator;
	}

	/**
	 * name or title of the item
	 *
	 * @param string $title new value
	 * @return void
	 */
	function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * name or title of the item
	 *
	 * @return string value
	 */
	function getTitle() {
		return $this->title;
	}
}