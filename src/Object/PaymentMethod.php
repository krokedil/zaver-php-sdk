<?php
namespace Zaver\SDK\Object;
use Zaver\SDK\Utils\DataObject;

/**
 * PaymentMethod as found in `PaymentMethodsResponse`
 * 
 * @method float          getPaymentMethod()    The Payment Method identifier.
 * @method string         getTitle()            The title of the payment method for display purposes.
 * @method string         getDescription()      A short text that describes the payment method.
 * @method string         getIconSvgSrc()       A URL to an SVG icon for the payment method.
 */
class PaymentMethod extends DataObject {

}