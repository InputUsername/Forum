<?php

namespace forum;

class Subforum {
	public $id;
	public $name;
	public $parentSubforumId;
	public $categoryId;

	public function __construct($id, $name, $parentSubforumId, $categoryId) {
		$this->id = $id;
		$this->name = $name;
		$this->parentSubforumId = $parentSubforumId;
		$this->categoryId = $categoryId;
	}
}
