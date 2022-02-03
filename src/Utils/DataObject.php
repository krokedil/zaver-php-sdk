<?php
namespace Zaver\SDK\Utils;
use JsonSerializable;

abstract class DataObject implements JsonSerializable {
	protected $data = [];

	static public function create(array $data = []): self {
		return new self($data);
	}

	public function __construct(array $data = []) {
		$this->data = $data;
	}

	public function jsonSerialize() {
        return $this->data;
    }
}