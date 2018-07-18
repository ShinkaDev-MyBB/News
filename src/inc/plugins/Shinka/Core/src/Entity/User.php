<?php

class Shinka_Core_Entity_Stylesheet
{
    /** @var int  */
    public $uid;

    /** @var string */
    public $username;

    /**
     * Store name and table definitions
     */
    public function __construct(int $uid, string $username)
    {
        $this->uid = $uid;
        $this->username = $username;
    }

    public function toArray()
    {
        return array(
            'uid' => $this->uid,
            'username' => $this->username,
        );
    }

    public function fromArray(array $arr)
    {
        $this->uid = $arr['uid'];
        $this->username = $arr['username'];
    }
}
