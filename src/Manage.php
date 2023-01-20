<?php

namespace Zaver\SDK;

use Zaver\SDK\Object\WidgetRequest;
use Zaver\SDK\Object\WidgetResponse;
use Zaver\SDK\Utils\Base;

class Manage extends Base {
	public function getWidget(WidgetRequest $request): WidgetResponse {
		list($paymentId, $clientIp, $language) = $request->getData();

		$query = http_build_query(['clientIp' => $clientIp, 'language' => $language]);
		$response = $this->client->get("/payments/manage/v1/$paymentId?$query");

		return new WidgetResponse($response);
	}
}