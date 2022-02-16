<?php
namespace Zaver\SDK\Utils;
use JsonSerializable;
use ArrayAccess;

abstract class DataObject implements JsonSerializable, ArrayAccess {
	protected $data = [];

	/**
	 * @return static
	 */
	static public function create(array $data = []): self {
		return new static($data);
	}

	public function __construct(array $data = []) {
		foreach($data as $key => $value) {
			$method = 'set' . ucfirst($key);

			if(method_exists($this, $method)) {
				$this->$method($value);
			}
			else {
				$this->data[$key] = $value;
			}
		}
	}

	public function jsonSerialize() {
        return $this->data;
    }

	public function offsetExists(mixed $offset): bool {
		return isset($this->data[$offset]);
	}

	public function offsetGet(mixed $offset) {
		return $this->data[$offset] ?? null;
	}

	public function offsetSet(mixed $offset, mixed $value): void {
		$method = 'set' . ucfirst($offset);

		if(method_exists($this, $method)) {
			$this->$method($value);
		}
		else {
			$this->data[$offset] = $value;
		}
	}

	public function offsetUnset(mixed $offset): void {
		unset($this->data[$offset]);
	}
}