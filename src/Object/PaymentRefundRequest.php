<?php
namespace Zaver\SDK\Object;
use Zaver\SDK\Utils\DataObject;

/**
 * The Payment Refund Request contains the necessary information to refund a payment.
 * 
 * @method float          getAmount()                   The Payment amount in the format 100 or the format 100.00.
 * @method string         getCurrency()                 The ISO currency code of the Payment. Currently, only "SEK" is supported.
 * @method array          getMerchantMetadata()         List of lineItems on the payment request to refund.
 * @method array          getLineItems() 		        An associative array of merchant-defined key-value pairs.
 */
class PaymentRefundRequest extends DataObject {

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
	 * List of lineItems on the payment request to refund.
	 */
	public function setLineItems(array $lineItems): self {
		$this->data['lineItems'] = $lineItems;

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
}