<?php
namespace Sandstorm\Inventory\ViewHelpers;

use Neos\Flow\Annotations as Flow;
use TYPO3\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

/**
 * creates a link to ScanController::scanAction reading its parameter from a barcode
 *
 * does only work with android phones
 */
class ScanInventoryBarcodeViewHelper extends AbstractTagBasedViewHelper {

	/**
	 * @var string
	 */
	protected $tagName = 'a';

	/**
	 * Initialize arguments
	 *
	 * @return void
	 * @api
	 */
	public function initializeArguments() {
		// TODO: implement
	}

	/**
	 * renders the link to ScanController::scanAction
	 *
	 * @return string the rendered link
	 * @api
	 */
	public function render() {
		$builder = $this->controllerContext->getUriBuilder();

		$builder->reset()
			->setCreateAbsoluteUri(TRUE);

		$scanUri = $builder->uriFor('scan', array('qrCode' => 'CODE'), 'Scan', 'Sandstorm.Inventory');
		$scanUri = str_replace('CODE', '{CODE}', $scanUri);
		$scannerUri = "zxing://scan/?ret=" . urlencode($scanUri);

		$this->tag->addAttribute('href', $scannerUri);
		$this->tag->setContent($this->renderChildren());
		$this->tag->forceClosingTag(TRUE);

		return $this->tag->render();
	}
}
