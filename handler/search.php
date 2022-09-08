<?php

require_once "../DbConnectionFactory.php";
require_once "../model/User.php";

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
?>