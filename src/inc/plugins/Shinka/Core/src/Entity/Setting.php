<?php

class Shinka_Core_Entity_Setting
{
    /** @var string */
    public $name;

    /** @var string */
    public $title;

    /** @var string */
    public $description;

    /** @var string */
    public $optionscode;

    /** @var */
    public $value;

    /** @var int */
    public $disporder;

    /** @var int */
    public $gid;

    public function __construct(string $name, string $title, string $description, string $optionscode, string $value, $disporder = 1, $gid = null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;
        $this->optionscode = $optionscode;
        $this->value = $value;
        $this->disporder = $disporder;
        $this->gid = $gid;
    }

    public function toArray()
    {
        return array(
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'optionscode' => $this->optionscode,
            'value' => $this->value,
            'disporder' => $this->disporder,
            'gid' => $this->gid,
        );
    }

    public static function fromArray($data)
    {
        return new Shinka_Core_Entity_Setting(
            $data['name'],
            $data['title'],
            $data['description'],
            $data['optionscode'],
            $data['value'],
            $data['disporder'],
            $data['gid']
        );
    }
}
