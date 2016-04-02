<?php

namespace forum;

class TemplateException extends \Exception {}

class Template {
	private $file;
	private $templateValues;

	private $prepared;

	public function __construct($file) {
		$this->file = $file;
		$this->templateValues = array();
	}

	public function bindValue($name, $value) {
		$this->templateValues[$name] = $value;
	}

	public function unbindValue($name) {
		unset($this->templateValues[$name]);
	}

	public function bindValues($arr) {
		foreach ($arr as $name => $value) {
			$this->bindValue($name, $value);
		}
	}

	public function unbindValues($arr) {
		foreach ($arr as $name) {
			$this->unbindValue($name);
		}
	}

	public function prepare() {
		if (!file_exists($file)) {
			throw new TemplateException('File ' + $file + ' does not exist');
		}

		$content = file_get_contents($file);

		$prepared = preg_replace('/\$([A-Za-z_][A-Za-z0-9_]*)/', function($matches) {
			$name = $matches[0];
			if (!isset($this->templateValues[$name])) {
				return '<no template variable ' . $name . '>';
			}
			return $this->templateValues[$name];
		}, $content);

		if ($prepared === NULL) {
			throw new TemplateException('There was an error preparing the template');
		}

		$this->prepared = $prepared;
	}

	public function output() {
		if (!isset($this->prepared)) {
			throw new TemplateException('Template has not been prepared');
		}
		return $this->prepared;
	}
}
