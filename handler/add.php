<?php
require_once "../DbConnectionFactory.php";
require_once "../model/Reservation.php";
session_start();

if (isset($_SESSION['user-id']) && isset($_SESSION['item-id'])) {

    $resevation= new Reservation();

    $resevation->Date=date('Y-m-d');
   

    $resevation->DateFrom=$_POST['dateFrom'];
    $resevation->DateTo=$_POST['dateTo'];
    $resevation->UserID=(int)$_SESSION['user-id'];
    $resevation->VacationID=(int)$_SESSION['item-id'];

    $result=Reservation::add($resevation,$conn);

    if($result){
        echo "success";
    }else{
        echo "failed";
    }

}

?>