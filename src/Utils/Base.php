<?php
namespace Zaver\SDK\Utils;
use Zaver\SDK\Config\Endpoint;

abstract class Base {
	
	/** @var Client $client */
	protected $client = null;
	protected $test = false;

	public function __construct(string $apiKey, bool $test = false) {
		$this->client = new Client(($test ? Endpoint::TEST : Endpoint::PRODUCTION), $apiKey);
		$this->test = $test;
	}

	public function isTest(): bool {
		return $this->test;
	}
}