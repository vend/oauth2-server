<?php

use League\OAuth2\Server\Util\DefaultGenerator;

class DefaultGenerator_test extends PHPUnit_Framework_TestCase
{
	/**
	 * @var DefaultGenerator
	 */
	private $generator;

	public function setUp()
	{
		$this->generator = new DefaultGenerator();
	}

	function test_generate()
	{
		$v1 = $this->generator->generate();
		$v2 = $this->generator->generate();
		$v3 = $this->generator->generate(50);

		$this->assertEquals(40, strlen($v1));
		$this->assertTrue($v1 !== $v2);
		$this->assertEquals(50, strlen($v3));
	}
}
