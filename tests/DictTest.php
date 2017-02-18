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

    public function testIsMutable()
    {
        $this->dict->baz = "bat";
        $this->assertEquals("bat", $this->dict->baz);

        $bat = $this->dict->get("baz");
        $this->assertEquals("bat", $bat);
    }

    public function testDeepArray()
    {
        $multidimensional_array = [
            "root",
            "sibling",
            "children" => [
                "secondary",
                "secondary sibling",
                "secondary children" => [
                    "tertiary",
                    "tertiary sibling",
                    "tertiary children" => [
                        "quarternary",
                        "quarternary sibling 1",
                        "quarternary sibling 2",
                        "quarternary sibling 3",
                        "quarternary sibling 4",
                    ]
                ]
            ],
            "new root",
            "new root 2",
            "fourth root" => [
                "fourth root child 1",
                "fourth root child 2",
                "fourth root children" => [
                    "foo",
                    "bar",
                ]
            ],
        ];

        $dict = new \UMN\CEHD\Dict\Dict($multidimensional_array);

        $this->assertEquals(null, $dict->get("root"));
        $this->assertEquals(null, $dict->get("children"));
    }
}
