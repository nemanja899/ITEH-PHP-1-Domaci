<?php


        $host = "localhost";
        $db = "etnoserbiabooking";
        $user = "admin";
        $pass = "admin";
    


        $conn = new mysqli($host, $user, $pass, $db);

       

        if ($conn->connect_errno) {
            throw new ErrorException("Nauspesna konekcija: greska> " . $conn->connect_error . ", err kod>" . $conn->connect_errno);
        }
 
?>
