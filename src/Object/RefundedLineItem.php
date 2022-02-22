<?php
namespace Zaver\SDK\Object;
use Zaver\SDK\Utils\DataObject;

/**
 * The Payment Creation Request contains the necessary information to create a payment.
 */
class RefundedLineItem extends DataObject {
	
	/**
	 * Required. The id of the line item being refunded.
	 */
	public function setLineItemId(string $lineItemId): self {
		$this->data['lineItemId'] = $lineItemId;

		return $this;
	}

	/**
	 * Required. Total refunded amount of the line item, including tax (e.g. VAT).
	 */
	public function setRefundAmount(float $refundAmount): self {
		$this->data['refundAmount'] = $refundAmount;

		return $this;
	}

	/**
	 * Required. Total amount of tax (e.g. VAT) of the refunded line item.
	 */
	public function setRefundTaxAmount(float $refundTaxAmount): self {
		$this->data['refundTaxAmount'] = $refundTaxAmount;

		return $this;
	}

	/**
	 * Required. Tax percentage for the refunded line item, in percent (e.g. 25)
	 */
	public function setRefundTaxRatePercent(float $refundTaxRatePercent): self {
		$this->data['refundTaxRatePercent'] = $refundTaxRatePercent;

		return $this;
	}

	/**
	 * Required. The number of units refunded.
	 */
	public function setRefundQuantity(int $refundQuantity): self {
		$this->data['refundQuantity'] = $refundQuantity;

		return $this;
	}

	/**
	 * Required. The refunded amount per unit, including tax (e.g. VAT).
	 */
	public function setUnitRefundAmount(float $unitRefundAmount): self {
		$this->data['unitRefundAmount'] = $unitRefundAmount;

		return $this;
	}

	/**
	 * A brief description of the refunded line item.
	 */
	public function setDescription(string $description): self {
		$this->data['description'] = $description;

		return $this;
	}
}