<?php
namespace Zaver\SDK;

/**
 * The merchant url object contains urls relevant to the checkout process.
 */
class MerchantUrls extends Utils\DataObject {
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