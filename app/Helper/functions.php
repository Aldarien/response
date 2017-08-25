<?php
function sanitize() {
	App\Contract\Response::sanitize();
}
function get($query = null) {
	return App\Contract\Response::get($query);
}
function post($query = null) {
	return App\Contract\Response::post($query);
}
?>