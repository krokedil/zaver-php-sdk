<?php
namespace Zaver\SDK\Utils;
use JsonSerializable;

abstract class DataObject implements JsonSerializable {
	protected $data = [];

	public function __construct(array $data = []) {
		$this->data = $data;
	}

	public function jsonSerialize() {
        return $this->data;
    }
}