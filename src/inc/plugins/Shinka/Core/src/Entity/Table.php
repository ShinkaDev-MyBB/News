<?php
/**
 * Database table
 */
class Shinka_Core_Entity_Table
{
    public $name;
    public $definitions;

    /**
     * Stores name and table definitions
     */
    public function __construct($name, $definitions)
    {
        $this->name = $name;
        $this->definitions = $definitions;
    }

    public function toArray()
    {
        return array(
            'name' => $name,
            'definitions' => $definitions,
        );
    }

    public function fromArray(array $arr)
    {
        $this->name = $arr['name'];
        $this->definitions = $arr['definitions'];
    }
}
