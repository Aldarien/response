<?php
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
	protected $value = 'Test';
	
	public function setUp()
	{
		$_GET['test'] = $this->value;
		$_POST['test'] = $this->value;
	}
	public function testGet()
	{
		$this->assertEquals($this->value, get('test'));
	}
	public function testPost()
	{
		$this->assertEquals($this->value, post('test'));
	}
}
?>