<?php
namespace Zaver\SDK\Object;
use Zaver\SDK\Utils\DataObject;
use DateTime;

/**
 * Contains the current status of the payment. Returned by way of callback, or by calling the `GET` endpoint.
 */
class RefundResponse extends DataObject {

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getRefundId(): string {
		return $this->data['refundId'] ?? '';
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getDescription(): string {
		return $this->data['description'] ?? '';
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getPaymentId(): string {
		return $this->data['paymentId'] ?? '';
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getInvoiceReference(): string {
		return $this->data['invoiceReference'] ?? '';
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getRefundAmount(): float {
		return (float)$this->data['refundAmount'] ?? 0;
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getCurrency(): string {
		return $this->data['currency'] ?? '';
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getRefundTaxAmount(): float {
		return (float)$this->data['refundTaxAmount'] ?? 0;
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getRefundTaxRatePercent(): float {
		return (float)$this->data['refundTaxRatePercent'] ?? 0;
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getStatus(): string {
		return $this->data['status'] ?? '';
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getMerchantReference(): string {
		return $this->data['merchantReference'] ?? '';
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getMerchantMetadata(): array {
		return (array)$this->data['merchantMetadata'] ?? [];
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getInitializingRepresentative(): ?MerchantRepresentative {
		return (!empty($this->data['initializingRepresentative']) ? new MerchantRepresentative($this->data['initializingRepresentative']) : null);
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getApprovingRepresentative(): ?MerchantRepresentative {
		return (!empty($this->data['approvingRepresentative']) ? new MerchantRepresentative($this->data['approvingRepresentative']) : null);
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getCancellingRepresentative(): ?MerchantRepresentative {
		return (!empty($this->data['cancellingRepresentative']) ? new MerchantRepresentative($this->data['cancellingRepresentative']) : null);
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getLastEvent(): ?DateTime {
		return (isset($this->data['lastEvent']) ? new DateTime($this->data['lastEvent']) : null);
	}

	/**
	 * The ID of the Refund. This is used when retrieving, approving, and cancelling the Refund.
	 */
	public function getCallbackUrl(): string {
		return $this->data['callbackUrl'] ?? '';
	}
}