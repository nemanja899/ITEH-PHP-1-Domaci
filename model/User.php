<?php
class User
{

    public $ID;
    public $FirstName;
    public $LastName;
    public $Email;
    public $Password;

    public function __construct(
        $id = NULL,
        $FirstName = null,
        $LastName = null,
        $Email = null,
        $Password = null
    ) {
        $this->ID = $id;
        $this->FirstName = $FirstName;
        $this->Email = $Email;
        $this->LastName = $LastName;
        $this->Password = $Password;
    }
}
