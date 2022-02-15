<?php
namespace Zaver\SDK\Object;
use Zaver\SDK\Utils\DataObject;

/**
 * Used to update an ongoing payment, if possible. Only fields that are to be updated are to be included.
 */
class PaymentUpdateRequest extends DataObject {
	
	/**
	 * The new amount for the payment.
	 */
	public function setAmount(float $amount): self {
		$this->data['amount'] = $amount;

		return $this;
	}

	/**
	 * Desired new status. Most notably `CANCELLED` - used to cancel payments.
	 */
	public function setStatus(string $status): self {
		$this->data['status'] = $status;

		return $this;
	}
}