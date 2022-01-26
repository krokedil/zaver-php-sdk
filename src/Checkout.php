<?php
namespace Zaver\SDK;
use Zaver\SDK\Checkout\PaymentCreationRequest;
use Zaver\SDK\Checkout\PaymentStatusResponse;
use Zaver\SDK\Utils\Error;
use Exception;

class Checkout {
	protected $client = null;
	protected $callbackKey = null;
	protected $test = false;

	public function __construct(string $apiKey, ?string $callbackKey = null, bool $test = false) {
		$this->client = new Utils\Client(($test ? Config\Endpoint::TEST : Config\Endpoint::PRODUCTION), $apiKey);
		$this->callbackKey = $callbackKey;
		$this->test = $test;
	}

	/**
	 * Create a payment using a `PaymentCreationRequest` as the message body. In return, you get a `PaymentStatusResponse`.
	 */
	public function createPayment(PaymentCreationRequest $request): PaymentStatusResponse {
		$response = $this->client->post('/payments/checkout/v1', $request);
		$response['test'] = $this->test;

		return new PaymentStatusResponse($response);
	}

	public function getPaymentStatus(string $paymentId): PaymentStatusResponse {
		$response = $this->client->get('/payments/checkout/v1/' . $paymentId);

		return new PaymentStatusResponse($response);
	}

	public function receiveCallback(): PaymentStatusResponse {
		if(!is_null($this->callbackKey) && $this->callbackKey !== self::getAuthorizationKey()) {
			throw new Error('Invalid callback key');
		}

		try {
			$data = json_decode(file_get_contents('php://input'), true, 10, JSON_THROW_ON_ERROR);
		}
		catch(Exception $e) {
			throw new Error('Failed to decode Zaver response', null, $e);
		}

		return new PaymentStatusResponse($data);
	}

	static protected function getAuthorizationKey(): ?string {
		if(isset($_SERVER['HTTP_AUTHORIZATION'])) {
			$auth = explode(' ', $_SERVER['HTTP_AUTHORIZATION']);

			return end($auth);
		}
		elseif(function_exists('getallheaders')) {
			foreach(getallheaders() as $key => $value) {
				if(strtolower($key) === 'authorization') {
					$auth = explode(' ', $value);

					return end($auth);
				}
			}
		}

		return null;
	}
}