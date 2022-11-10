<?php

namespace Zaver\SDK\Object;

use Zaver\SDK\Utils\Error;
use Zaver\SDK\Utils\DataObject;

/**
 * The merchant customizations options contains options used to customize a new payment request.
 * 
 * @method string getHideInstallmentOptions()						Ether true or false. If true, the Zaver checkout will not show any installment options during settlement.
 * @method string getSpecificPaymentMethod()						Allows the api user to render the checkout starting in a specific payment method journey.
 * @method string getSalespersonUsername()							The username (=email) of the Zaver for Business user that creates or updates the payment request. This will be mandatory for some merchants.
 * @method string getCaptureMethod()								Which method should be used to capture the payment. If not set, defaults to immediate.
 * @method string getPaymentRecipientCompanyRegistrationNumber()	In case the integrator is a PSP, and assumes the merchant role in the zaver system, sub merchants are identified by this field.
 * @method string getOfferPaymentMethods()							The payment methods to be offered to the payer for merchants that have this feature enabled. Depending on the merchant configuration a subset of the requested methods might be available. If no payments methods are offered then the payment request cannot be paid. This is detected upon payment request creation and an error is returned instead.
 */
class MerchantCustomizationOptions extends DataObject {
	const SPECIFIC_PAYMENT_METHOD_DIRECTDEBIT = 'directDebit';
	const SPECIFIC_PAYMENT_METHOD_INSTALLMENTS = 'installments';
	const SPECIFIC_PAYMENT_METHOD_PAYLATER = 'payLater';
	const SPECIFIC_PAYMENT_METHOD_SWISH = 'swishTechnicalSupplier';
	
	const SPECIFIC_PAYMENT_METHODS = [
		self::SPECIFIC_PAYMENT_METHOD_DIRECTDEBIT,
		self::SPECIFIC_PAYMENT_METHOD_INSTALLMENTS,
		self::SPECIFIC_PAYMENT_METHOD_PAYLATER,
		self::SPECIFIC_PAYMENT_METHOD_SWISH
	];
	
	const OFFERED_PAYMENT_METHOD_SWISH = 'SWISH';
	const OFFERED_PAYMENT_METHOD_BANKTRANSFER = 'BANK_TRANSFER';
	const OFFERED_PAYMENT_METHOD_PAYLATER = 'PAY_LATER';
	const OFFERED_PAYMENT_METHOD_INSTALLMENTS = 'INSTALLMENTS';
	const OFFERED_PAYMENT_METHOD_B2B_R2P = 'B2B_R2P';

	const OFFERED_PAYMENT_METHODS = [
		self::OFFERED_PAYMENT_METHOD_SWISH,
		self::OFFERED_PAYMENT_METHOD_BANKTRANSFER,
		self::OFFERED_PAYMENT_METHOD_PAYLATER,
		self::OFFERED_PAYMENT_METHOD_INSTALLMENTS,
		self::OFFERED_PAYMENT_METHOD_B2B_R2P
	];

	const CAPTURE_METHOD_IMMEDIATE = 'immediate';
	const CAPTURE_METHOD_DEFERRED = 'deferred';
	const CAPTURE_METHODS = [
		self::CAPTURE_METHOD_IMMEDIATE,
		self::CAPTURE_METHOD_DEFERRED
	];

	/**
	 * @param bool $hide If true, the Zaver checkout will not show any installment options during settlement.
	 */
	public function setHideInstallmentOptions(bool $hide): self {
		$this->data['hideInstallmentOptions'] = $hide ? 'true' : 'false';

		return $this;
	}

	/**
	 * @param string $method One of `MerchantCustomizationOptions::SPECIFIC_PAYMENT_METHODS`
	 */
	public function setSpecificPaymentMethod(string $method): self {
		if (!in_array($method, self::SPECIFIC_PAYMENT_METHODS)) {
			throw new Error('Invalid payment method.', 400);
		}

		$this->data['specificPaymentMethod'] = $method;

		return $this;
	}

	/**
	 * @param string $username Usersname (email) of the Zaver for Business user that creates or updates the payment request.
	 */
	public function setSalespersonUsername(string $username): self {
		$this->data['salespersonUsername'] = $username;

		return $this;
	}

	/**
	 * @param string $method One of `MerchantCustomizationOptions::CAPTURE_METHODS`
	 */
	public function setCaptureMethod(string $method): self {
		if (!in_array($method, self::CAPTURE_METHODS)) {
			throw new Error('Invalid capture method.', 400);
		}

		$this->data['captureMethod'] = $method;

		return $this;
	}

	/**
	 * @param string $companyRegistrationNumber In case the integrator is a PSP, and assumes the merchant role in the zaver system, sub merchants are identified by this field.
	 */
	public function setPaymentRecipientCompanyRegistrationNumber(string $companyRegistrationNumber): self {
		$this->data['paymentRecipientCompanyRegistrationNumber'] = $companyRegistrationNumber;

		return $this;
	}

	/**
	 * @param array $paymentMethods One of `MerchantCustomizationOptions::OFFERED_PAYMENT_METHODS`
	 */
	public function setOfferPaymentMethods(array $paymentMethods): self {
		$paymentMethods = array_unique($paymentMethods);	
		$diff = array_diff($paymentMethods, self::OFFERED_PAYMENT_METHODS);

		if (!empty($diff)) {
			throw new Error('Invalid payment methods.', 400);
		}

		$this->data['offerPaymentMethods'] = implode(',', $paymentMethods);

		return $this;
	}
}
