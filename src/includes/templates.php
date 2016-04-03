<?php

namespace forum;

function joinPaths() {
    $paths = array();

    foreach (func_get_args() as $arg) {
        if ($arg !== '') {
			$paths[] = $arg;
		}
    }

    return preg_replace('#/+#', '/', join('/', $paths));
}

class TemplateException extends \Exception {}

class Template {
	// Template includes regex
	private static $INC_REGEX = '/\{\{\s*include "(.+)"\s*\}\}/';

	// Template variable regex
	private static $VAR_REGEX = '/\{\{\s*([A-Za-z_][A-Za-z0-9_]*)\s*\}\}/';

	// Main template file
	private $file;

	// Template values
	private $templateValues;

	// Prepared template
	private $prepared;

	public function __construct($file) {
		$this->file = $file;
		$this->templateValues = array();
	}

	/*
	bindValue($name, $value)
	---
	Bind $value to template variable named $name
	*/
	public function bindValue($name, $value) {
		$this->templateValues[$name] = $value;
	}

	/*
	unbindValue($name)
	---
	Unbind template variable $name
	*/
	public function unbindValue($name) {
		unset($this->templateValues[$name]);
	}

	/*
	bindValues($arr)
	---
	Bind multiple template variables from (name => value) array $arr
	*/
	public function bindValues($arr) {
		foreach ($arr as $name => $value) {
			$this->bindValue($name, $value);
		}
	}

	/*
	unbindValues($arr)
	---
	Unbind multiple template variables from (name => value) array $arr
	*/
	public function unbindValues($arr) {
		foreach ($arr as $name) {
			$this->unbindValue($name);
		}
	}

	/*
	prepare()
	---
	Prepare the template by substituting bound variables in the template file
	*/
	public function prepare() {
		if (!file_exists($this->file)) {
			throw new TemplateException('File ' + $this->file + ' does not exist');
		}

		$content = file_get_contents($this->file);

		/*
		Include files
		*/
		$prepared = preg_replace_callback(Template::$INC_REGEX, function($matches) {
			$path = joinPaths(dirname($this->file), $matches[1]);
			if (!file_exists($path)) {
				return '<no such file ' . $path . '>';
			}
			return (new Template($path))->prepare()->output();
		}, $content);

		if ($prepared === NULL) {
			throw new TemplateException('There was an error preparing the template');
		}

		/*
		Replace variables
		*/
		if (count($this->templateValues) > 0) {
			/*
			Prepare the template by replacing {{variables}} by the values bound
			to the same name in the template instance
			*/
			$prepared = preg_replace_callback(Template::$VAR_REGEX, function($matches) {
				$name = $matches[1];
				if (!isset($this->templateValues[$name])) {
					return '<no template variable ' . $name . '>';
				}
				return $this->templateValues[$name];
			}, $prepared);
		}

		if ($prepared === NULL) {
			throw new TemplateException('There was an error preparing the template');
		}

		$this->prepared = $prepared;

		return $this;
	}

	/*
	output()
	---
	Returns the prepared template
	*/
	public function output() {
		if (!isset($this->prepared)) {
			throw new TemplateException('Template has not been prepared');
		}
		return $this->prepared;
	}
}
