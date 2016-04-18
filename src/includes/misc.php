<?php

function redirect($url) {
	if (!headers_sent()) {
		header('Location: ' . $url);
	}
	else {
		die('<meta name="refresh" content="0; ' . $url . '"');
	}
}
