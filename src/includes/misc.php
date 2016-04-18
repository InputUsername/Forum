<?php

namespace forum;

function redirect($url) {
	if (!headers_sent()) {
		header('Location: ' . $url);
		exit();
	}
	else {
		die('<meta name="refresh" content="0; ' . $url . '"');
	}
}

function defaultValue($val, $default) {
	return isset($val) ? $val : $default;
}
