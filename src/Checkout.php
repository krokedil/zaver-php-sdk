<?php
namespace Zaver\SDK;
use Zaver\SDK\Config\Endpoint;
use Zaver\SDK\Object\PaymentCreationRequest;
use Zaver\SDK\Object\PaymentUpdateRequest;
use Zaver\SDK\Object\PaymentStatusResponse;
use Zaver\SDK\Utils\Base;
use Zaver\SDK\Utils\Error;
use Zaver\SDK\Utils\Html;
use Zaver\SDK\Utils\Helper;
use Exception;

class Checkout extends Base {

	/**
	 * Create a payment using a `PaymentCreationRequest` as the message body. In return, you get a `PaymentStatusResponse`.
	 */
	public function createPayment(PaymentCreationRequest $request): PaymentStatusResponse {
		$response = $this->client->post('/payments/checkout/v1', $request);

		return new PaymentStatusResponse($response);
	}

	public function getPaymentStatus(string $paymentId): PaymentStatusResponse {
		$response = $this->client->get('/payments/checkout/v1/' . $paymentId);

		return new PaymentStatusResponse($response);
	}

	public function updatePayment(string $paymentId, PaymentUpdateRequest $request): PaymentStatusResponse {
		$response = $this->client->patch('/payments/checkout/v1/' . $paymentId, $request);

		return new PaymentStatusResponse($response);
	}

	public function receiveCallback(?string $callbackKey = null): PaymentStatusResponse {
		if(!is_null($callbackKey) && !hash_equals($callbackKey, Helper::getAuthorizationKey())) {
			throw new Error('Invalid callback key');
		}

		try {
			if($_SERVER['REQUEST_METHOD'] !== 'POST') {
				throw new Error('Invalid HTTP method');
			}
			
			$data = json_decode(file_get_contents('php://input'), true, 10, JSON_THROW_ON_ERROR);
		}
		catch(Exception $e) {
			throw new Error('Failed to decode Zaver response', null, $e);
		}

		return new PaymentStatusResponse($data);
	}

	/**
	 * @param PaymentStatusResponse|string $token
	 */
	public function getHtmlSnippet($token, array $attributes = []): string {
		if($token instanceof PaymentStatusResponse) {
			$token = $token->getToken();
		}
		elseif(!is_string($token)) {
			throw new Error('Expected token string');
		}

		return Html::getTag('script', false, array_merge([
			'src' => ($this->isTest() ? Endpoint::TEST_SCRIPT : Endpoint::PRODUCTION_SCRIPT),
			'id' => 'zco-loader',
			'zco-token' => $token
		], $attributes));
	}
}