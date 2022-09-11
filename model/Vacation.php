<?php
class Vacation
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

    public static function searchByCondtition($condition, mysqli $conn)
    {
        $query = "SELECT * FROM vacation WHERE id = $condition or
         name = '$condition' or description='$condition' or price = $condition or place = '$condition";

        $result = array();
        if ($msqlObj = $conn->query($query)) {
            while ($red = $msqlObj->fetch_array()) {
                $result[] = $red;
            }
            return $result;
        }
    }

    public static function getTopSix(mysqli $conn)
    {
        $query = "SELECT * FROM vacation";

        $result = array();
        if ($msqlObj = $conn->query($query)) {
            $i=0;
            while ($red = $msqlObj->fetch_array() and $i++ < 6) {
                $result[] = $red;
            }
            return $result;
        }
    }

    #deleteById

    public function delete(mysqli $conn)
    {
        $query = "DELETE FROM vacation WHERE id = $this->ID";
        return $conn->query($query);
    }

    #update
    public function update(mysqli $conn)
    {
        $query = "UPDATE vacation set Name = '$this->Name', Description = '$this->Description',
        price = $this->Price,place='$this->Place'";
        return $conn->query($query);
    }


    public static function add(Vacation $vacation, mysqli $conn)
    {
        $query = "INSERT INTO vacation(name, description, price, place) VALUES('$vacation->Name', '$vacation->Description', $vacation->Price,'$vacation->Place')";
        $result=$conn->query($query);
      
        return $result;
    }
}
