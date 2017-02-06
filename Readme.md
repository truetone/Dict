# Simple PHP Dict

This is a simple PHP class to mimic some of the behavior of a Python dictionary.

Namely, easily storing and retrieving arbitrary data by key reference.

## Usage

```
$data = ["foo" => "bar"];
$dict = new \UMN\CEHD\Dict\Dict($data);

$foo = $dict->get("foo"); // will be "bar"
$baz = $dict->get("baz"); // will be null
$json = $dict->toJSON(); // will be "[foo: \"bar\"]" (string)
$array = $dict->toArray(); // will be ["foo" => "bar"] (array)
```
