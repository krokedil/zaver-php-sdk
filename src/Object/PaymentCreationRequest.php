<?php
namespace Zaver\SDK\Object;
use Zaver\SDK\Utils\DataObject;

/**
 * The Payment Creation Request contains the necessary information to create a payment.
 */
class PaymentCreationRequest extends DataObject {
	
	/**
	 * Required. A short name/description of the payment.
	 */
	public function setTitle(string $title): self {
		$this->data['title'] = $title;

		return $this;
	}

	/**
	 * A longer description of the payment.
	 */
	public function setDescription(string $description): self {
		$this->data['description'] = $description;

		return $this;
	}

	/**
	 * Required. The Payment amount in the format 100 or the format 100.00.
	 */
	public function setAmount(float $amount): self {
		$this->data['amount'] = $amount;

		return $this;
	}

	/**
	 * Required. The ISO currency code of the Payment. Currently, only "SEK" is supported.
	 */
	public function setCurrency(string $currency): self {
		$this->data['currency'] = $currency;

		return $this;
	}

	/**
	 * Required. The market(/country) for this payment request. Available markets depend on the merchant's contract with Zaver.
	 */
	public function setMarket(string $market): self {
		$this->data['market'] = $market;

		return $this;
	}

	/**
	 * The language(/locale) for this payment request. Must match allowed languages for the selected Market. If not provided
	 * then the default language for this merchant and market will be used.
	 */
	public function setLanguage(string $language): self {
		$this->data['language'] = $language;

		return $this;
	}

	/**
	 * ID string, e.g. order reference.
	 */
	public function setMerchantPaymentReference(string $merchantPaymentReference): self {
		$this->data['merchantPaymentReference'] = $merchantPaymentReference;

		return $this;
	}

	/**
	 * An associative array of merchant-defined key-value pairs. These are returned with the Payment Status Response.
	 * A Maximum of 20 pairs is allowed, each key and value with a maximum length of 200 characters.
	 */
	public function setMerchantMetadata(array $merchantMetadata): self {
		$this->data['merchantMetadata'] = $merchantMetadata;

		return $this;
	}

	/**
	 * URLs relevant to the payment.
	 */
	public function setMerchantUrls(MerchantUrls $merchantUrls): self {
		$this->data['merchantUrls'] = $merchantUrls;

		return $this;
	}

	/**
	 * List of line items.
	 */
	public function addLineItem(LineItem $lineItem): self {
		if(!isset($this->data['lineItems'])) {
			$this->data['lineItems'] = [];
		}

		$this->data['lineItems'][] = $lineItem;

		return $this;
	}
}