<?php

namespace Zaver\SDK\Object;

use Zaver\SDK\Utils\DataObject;

/**
 * The Payment Creation Request contains the necessary information to create a payment.
 * 
 * @method string getClientIp()		IP address of the client making the request.
 * @method string getLanguage()		Requested language of the returned widget.
 */

class WidgetRequest extends DataObject {
	/**
	 * Required. IP address of the client making the request.
	 */
	public function setClintIp(string $clientIp): self {
		$this->data['clientIp'] = $clientIp;

		return $this;
	}

	/**
	 * Requested language of the returned widget.
	 */
	public function setLanguage(string $language): self {
		$this->data['language'] = $language;

		return $this;
	}
}