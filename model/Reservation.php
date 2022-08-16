<?php
class Reservation
{

    public $ID;
    public $Name;
    public $Description;
    public $Price;
    public $Place;

    public function __construct($ID = null, $Name = null, $Description = null, $Price = null, $Place = null)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        $this->Place = $Place;
    }
}
