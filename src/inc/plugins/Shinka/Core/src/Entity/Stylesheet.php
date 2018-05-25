<?php

class Shinka_Core_Entity_Stylesheet
{
    /** @var string  */
    public $stylesheet;

    /** @var string */
    public $name;

    /** @var int */
    public $attachedto;

    /** @var int */
    public $tid;

    /**
     * Store name and table definitions
     */
    public function __construct(string $stylesheet, string $name, $attachedto = '', $tid = 1)
    {
        $this->stylesheet = $stylesheet;
        $this->name = $name;
        $this->attachedto = $attachedto;
        $this->tid = $tid;
    }

    public function toArray()
    {
        return array(
            'stylesheet' => $this->stylesheet,
            'name' => $this->name,
            'tid' => $this->tid,
        );
    }

    public static function fromDirectory($dir)
    {
        $files = array_slice(scandir($dir), 2);

        $stylesheets = array();
        foreach ($files as $file) {
            $css = file_get_contents($dir . '/' . $file, true);

            $stylesheets[] = new Shinka_Core_Entity_Stylesheet($css, $file);
        }

        return $stylesheets;
    }
}
