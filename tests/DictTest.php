<?php

require_once __DIR__ . '/../src/Dict.php';

use PHPUnit\Framework\TestCase;

class DictTest extends TestCase
{
    private $dict;

    private $test_data;

    protected function setUp()
    {
        $data = ["foo" => "bar"];
        $this->test_data = $data;
        $this->dict = new \UMN\CEHD\Dict\Dict($data);
    }

    public function testCreation()
    {
        $this->assertTrue(property_exists($this->dict, "foo"));
        $this->assertFalse(is_null($this->dict->foo));
        $this->assertEquals("bar", $this->dict->foo);
    }

    public function testGet()
    {
        $result = $this->dict->get("foo");
        $this->assertEquals("bar", $result);
    }

    public function testToArray()
    {
        $result = $this->dict->toArray();
        $this->assertEquals($this->test_data, $result);
    }

    public function testToJSON()
    {
        $result = $this->dict->toJSON();
        $json = json_encode($this->test_data);
        $this->assertEquals($json, $result);
    }
}
