<?php

namespace forum;

class Category {
	public $id;
	public $name;
	public $parentSubforumId;

	public function __construct($id, $name, $parentSubforumId) {
		$this->id = $id;
		$this->name = $name;
		$this->parentSubforumId = $parentSubforumId;
	}
}
