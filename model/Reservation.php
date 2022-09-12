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

    public  function getAllByUser(mysqli $conn)
    {
        $query = "SELECT * FROM reservation WHERE userid=$this->UserID";
        return $conn->query($query);
    }


    #deleteById

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM reservation  WHERE date=$this->Date and userid=$this->UserID and vacationid=$this->VacationID";
        return $conn->query($query);
    }

    #update
    public function update($oldDate,$NewDate, mysqli $conn)
    {
        $query = "UPDATE reservation set date = '$NewDate',datefrom = '$this->DateFrom',dateto = '$this->DateTo' WHERE date='$oldDate' AND VacationID = $this->VacationID and UserID=$this->UserID";
        return $conn->query($query);
    }


    public static function add(Reservation $reservation, mysqli $conn)
    {
        $query = "INSERT INTO reservation(date, userid, vacationid, datefrom,dateto) VALUES('$reservation->Date', $reservation->UserID,$reservation->VacationID,'$reservation->DateFrom', '$reservation->DateTo')";
        return $conn->query($query);
    }
}

