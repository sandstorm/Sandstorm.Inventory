<?php
namespace Sandstorm\Inventory\Controller;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;

/**
 * controller to interact with multiple InventoryItems
 *
 * @Flow\Scope("singleton")
 */
class OverviewController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \Sandstorm\Inventory\Domain\Repository\InventoryItemRepository
	 */
	protected $inventoryItemRepository;

	/**
	 * lists all InventoryItems
	 *
	 * @return void
	 */
	public function indexAction() {
		$items = $this->inventoryItemRepository->findAll();
		$this->view->assign('items', $items);
	}
}
