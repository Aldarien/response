<?php
namespace App\Service;

class Response
{
	protected $post;
	protected $get;
	protected $gump;
	
	public function __construct()
	{
		$this->gump = new \GUMP();
	}
	public function sanitize()
	{
		if ($_POST) {
			$this->post = $this->correctNumbers($this->gump->sanitize($_POST));
		}
		if ($_GET) {
			$this->get = $this->correctNumbers($this->gump->sanitize($_GET));
		}
	}
	public function correctNumbers(array $data)
	{
		$output = [];
		foreach ($data as $key => $value) {
			if (is_float(str_replace(',', '.', $value))) {
				$output[$key] = str_replace(',', '.', $value);
			} else {
				$output[$key] = $value;
			}
		}
		return $output;
	}
	public function get($query = null)
	{
		if ($this->get == null) {
			$this->sanitize();
		}
		if ($query == null) {
			return $this->get;
		}
		if (isset($this->get[$query])) {
			return $this->get[$query];
		}
		return false;
	}
	public function post($query = null)
	{
		if ($this->post == null) {
			$this->sanitize();
		}
		if ($query == null) {
			return $this->post;
		}
		if (isset($this->post[$query])) {
			return $this->post[$query];
		}
		return false;
	}
}
?>