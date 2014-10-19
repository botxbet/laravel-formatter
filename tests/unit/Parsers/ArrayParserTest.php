<?php namespace SoapBox\Formatter\Test\Parsers;

use stdClass;
use SoapBox\Formatter\Test\TestCase;
use SoapBox\Formatter\Parsers\ParserInterface;
use SoapBox\Formatter\Parsers\ArrayParser;

class ArrayParserTest extends TestCase {

	public function testArrayParserIsInstanceOfParserInterface() {
		$parser = new ArrayParser(new \stdClass);
		$this->assertTrue($parser instanceof ParserInterface);
	}

	public function testConstructorAcceptsSerializedArray() {
		$expected = [0, 1, 2];
		$parser = new ArrayParser(serialize($expected));
		$this->assertEquals($expected, $parser->toArray());
	}

	public function testConstructorAcceptsObject() {
		$expected = ['foo' => 'bar'];
		$input = new stdClass;
		$input->foo = 'bar';
		$parser = new ArrayParser($input);
		$this->assertEquals($expected, $parser->toArray());
	}

    /**
     * @expectedException InvalidArgumentException
     */
	public function testArrayParserThrowsExceptionWithInvalidInputOfEmptyString() {
		$parser = new ArrayParser('');
	}

	public function testtoArrayReturnsArray() {
		$parser = new ArrayParser(serialize([0, 1, 2]));
		$this->assertTrue(is_array($parser->toArray()));
	}

}
