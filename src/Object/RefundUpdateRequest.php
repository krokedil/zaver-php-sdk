<?php
namespace Zaver\SDK\Object;
use Zaver\SDK\Utils\DataObject;

/**
 * The Payment Creation Request contains the necessary information to create a payment.
 */
class RefundUpdateRequest extends DataObject {

	/**
	 * A description of the refund.
	 */
	public function setActingRepresentative(MerchantRepresentative $actingRepresentative): self {
		$this->data['actingRepresentative'] = $actingRepresentative;

		return $this;
	}
}