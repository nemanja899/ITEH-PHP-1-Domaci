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

    public static function login($username,$password, mysqli $conn){
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

        $user = null;
        if($msqlObj = $conn->query($query)){
            $red = $msqlObj->fetch_array();
            $user= new User($red["id"],$red["firstname"],$red["lastname"],$red["email"],$red["password"]);
            
        }

        return $user;

    }
  
    public function searchUserByCondiction(mysqli $conn, $condition){
        $query = "SELECT * FROM user WHERE email='$condition' or firstname='$condition' or lastname='$condition' or password='$condition'";
        return $conn->query($query);
    }
    #deleteById

    public function deleteUser(mysqli $conn)
    {
        $query = "DELETE FROM user WHERE email = '$this->email'";
        return $conn->query($query);
    }

    #update
    public function update($oldEmail,$newEmail, mysqli $conn)
    {
        $query = "UPDATE user set email = '$newEmail', password = '$this->Password'  WHERE email='$oldEmail'";
        return $conn->query($query);
    }


    public static function add(User $user, mysqli $conn)
    {
        $query = "INSERT INTO user(firstname, lastname, email,password) VALUES('$user->FirstName', '$user->LastName', '$user->Email','$user->Password')";
        return $conn->query($query);
    }
}
