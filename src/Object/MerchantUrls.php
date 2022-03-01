<?php
namespace Zaver\SDK\Object;
use Zaver\SDK\Utils\DataObject;

/**
 * The merchant url object contains urls relevant to the checkout process.
 * 
 * @method string getCallbackUrl() URL for the merchant callback. Updates on the order will be sent to this URL as they occur.
 * @method string getSuccessUrl()  Only for the Payment API. URL for the merchant success page. If included, customers will be redirected here after payment success.
 */
class MerchantUrls extends DataObject {
	/**
	 * URL for the merchant callback. Updates on the order will be sent to this URL as they occur.
	 */
	public function setCallbackUrl(string $callbackUrl): self {
		$this->data['callbackUrl'] = $callbackUrl;

		return $this;
	}

	/**
	 * URL for the merchant success page. If included, customers will be redirected here after payment success.
	 */
	public function setSuccessUrl(string $successUrl): self {
		$this->data['successUrl'] = $successUrl;

		return $this;
	}
}