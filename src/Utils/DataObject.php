<?php
namespace Zaver\SDK\Utils;
use JsonSerializable;

abstract class DataObject implements JsonSerializable {
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
}