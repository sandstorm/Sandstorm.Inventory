<?php
namespace Sandstorm\Inventory\Controller;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;

/**
 * controller to process scanned inventory qr codes
 */
class ScanController extends ActionController {

	/**
	 * parses the given URI (scanned from a inventory QR barcode) and parses
	 * the inventory serial number from it.
	 *
	 * Then it redirects to the InventoryItemController.
	 *
	 * @param string $qrCode
	 * @return void
	 */
	public function scanAction($qrCode) {
		$serialNumber = str_replace('http://qr.sandstorm-media.de/', '', $qrCode);
		$this->redirect('createOrUpdate', 'InventoryItem', 'Sandstorm.Inventory', array('serialNumber' => $serialNumber));
	}
}