<?php
/**
 * Python Dictionary-like object and convenience methods
 *
 * @author Tony Thomas <thoma127@umn.edu>
 * @license GPL 3.0
 * @version 0.1.0
 */

namespace UMN\CEHD\Dict;

/**
 * The Dict class
 *
 * Stores simple, arbitrary data in a class and includes some
 * convenience methods
 */
class Dict
{
    /**
     * Builds one-dimensional object from key/value pairs
     * @param $data - An array of data
     */
    function __construct(array $data=[])
    {
        foreach($data as $key => $value)
        {
            $this->__create_property($key, $value);
        }
    }

    /**
     * Returns a JSON representation of the object data
     * @return String - JSON representation
     */
    function __toString()
    {
        return json_encode($this);
    }

    /**
     * Adds an arbitrarily named class property and populates it with
     * data
     * @param $name - A class property name
     * @param $value - The data to be stored in the property
     */
    private function __create_property($name, $value)
    {
        $this->{$name} = $value;
    }

    /**
     * Returns an array representation of the object data by
     * converting it to JSON and then decoding the JSON representation
     * @xxx This is expedient, but probably not the best way to to this.
     * @return Array
     */
    public function toArray()
    {
        return json_decode($this->toJSON(), true);
    }

    /**
     * Returns a JSON representation of the object data by
     * @return String - JSON representation
     */
    public function toJSON()
    {
        return json_encode($this);
    }

    /**
     * Returns a JSON representation of the object data by
     * @alias for toJSON()
     * @return String - JSON representation
     */
    public function toString()
    {
        return $this->toJSON();
    }

    /**
     * A convenience method for retrieving class attribute data by name
     * @param $property_name - A class property name
     * @return mixed or null - property data or null if $property_name is not
     * set
     */
    public function get($property_name)
    {
        if (property_exists($this, $property_name))
        {
          return $this->$property_name;
        }
        return null;
    }
}
