<?php
namespace Zaver\SDK;
use Zaver\SDK\Utils\Base;
use Zaver\SDK\Object\RefundCreationRequest;
use Zaver\SDK\Object\RefundResponse;
use Zaver\SDK\Object\RefundUpdateRequest;

class Refund extends Base {
	public function createRefund(RefundCreationRequest $request): RefundResponse {
		$response = $this->client->post('/refund/v1', $request);

		return new RefundResponse($response);
	}

	public function getRefund(string $refundId): RefundResponse {
		$response = $this->client->get(sprintf('/refund/v1/%s', $refundId));

		return new RefundResponse($response);
	}

	public function approveRefund(string $refundId, ?RefundUpdateRequest $request = null): RefundResponse {
		$response = $this->client->post(sprintf('/refund/v1/%s/approve', $refundId), $request);

		return new RefundResponse($response);
	}

	public function cancelRefund(string $refundId, ?RefundUpdateRequest $request = null): RefundResponse {
		$response = $this->client->post(sprintf('/refund/v1/%s/cancel', $refundId), $request);

		return new RefundResponse($response);
	}
}