<?php


require_once "../DbConnectionFactory.php";
require_once "../model/User.php";
require_once "../model/Vacation.php";

session_start();
if (isset($_POST['email'])) {
    $u = new User();
    $result = $u->searchUserByCondiction($conn, $_POST['email']);
    $myObj = array();
    if ($result) {
        while ($row = $result->fetch_array(1)) {
            $myObj[] = $row;
        }
    }
    if (count($myObj) >0) {
        echo json_encode($myObj);
    } else {
        echo "Failed";
    }
}
if(isset($_GET['place'])){
    $condition=$_GET['place'];
    $results=Vacation::searchByCondtition($condition,$conn);
    
    if(count($results)>0){
        $_SESSION['places']=$results;
        echo json_encode($results);
    }
    else{
        echo "Failed";
    }
}
?>