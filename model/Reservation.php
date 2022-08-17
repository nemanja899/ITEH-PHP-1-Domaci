<?php
class Reservation
{

    public $Date;
    public $UserID;
    public $VacationID;
    public $DateFrom;
    public $DateTo;

    public function __construct($Date = null, $UserID = null, $VacationID = null, $DateFrom = null, $DateTo = null)
    {
        $this->Date = $Date;
        $this->UserID = $UserID;
        $this->VacationID = $VacationID;
        $this->DateFrom = $DateFrom;
        $this->DateTo = $DateTo;
    }
}
