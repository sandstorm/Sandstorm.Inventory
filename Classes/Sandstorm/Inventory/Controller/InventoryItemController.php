<?php
namespace Sandstorm\Inventory\Controller;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;

use Sandstorm\Inventory\Domain\Model\InventoryItem as InventoryItem;

/**
 * controller to interact with single InventoryItems
 *
 * @Flow\Scope("singleton")
 */
class InventoryItemController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \Sandstorm\Inventory\Domain\Repository\InventoryItemRepository
	 */
	protected $inventoryItemRepository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * display the an InventoryItem
	 *
	 * @param InventoryItem $item item to display
	 * @return void
	 */
	public function showAction(InventoryItem $item) {
		$this->view->assign('item', $item);
	}

	/**
	 * shows a mask to create a new InventoryItem
	 *
	 * @param string $serialNumber initial value of the serial number field
	 * @return void
	 */
	public function newAction($serialNumber = '') {
		$this->view->assign('serialNumber', $serialNumber);
	}

	/**
	 * shows a mask to edit an InventoryItem
	 *
	 * @param InventoryItem $item item to edit
	 * @return void
	 */
	public function editAction(InventoryItem $item) {
		$this->view->assign('item', $item);
	}

	/**
	 * persists and shows an InventoryItem
	 *
	 * @param InventoryItem $item item to persist and show
	 * @return void
	 */
	public function createAction(InventoryItem $item) {
		$this->inventoryItemRepository->add($item);
		$this->persistenceManager->persistAll();
		$this->redirect('show', NULL, NULL, array('item' => $item));
	}

	/**
	 * persists and shows an InventoryItem
	 *
	 * @param InventoryItem $item item to persist and show
	 * @return void
	 */
	public function updateAction(InventoryItem $item) {
		$this->inventoryItemRepository->update($item);
		$this->persistenceManager->persistAll();
		$this->redirect('show', NULL, NULL, array('item' => $item));
	}

	/**
	 * shows a mask to create or edit an InventoryItem with a specific serial number
	 *
	 * @param string $serialNumber serial number of the InventoryItem to create or edit
	 * @return void
	 */
	public function createOrUpdateAction($serialNumber) {
		$item = $this->inventoryItemRepository->findOneBySerialNumber($serialNumber);

		if ($item) {
			$this->redirect('edit', NULL, NULL, array('item' => $item));
		} else {
			$this->redirect('new', NULL, NULL, array('serialNumber' => $serialNumber));
		}
	}
}