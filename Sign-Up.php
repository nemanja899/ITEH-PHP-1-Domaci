<?php

require_once "DbconnectionFactory.php";
require_once "model/User.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['FirstName']) && isset($_POST['LastName']) && $_POST['submit-signup'] == 'Sign Up') {

    $user = new User();
    $user->FirstName = $_POST['FirstName'];
    $user->LastName = $_POST['LastName'];
    $user->Password = $_POST['password'];
    $user->Email = $_POST['email'];
    $result = User::add($user, $conn);

    if ($result) {
        $_POST[]=array();
        header('Location:Login.php');
        
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etno Srbija</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="font/fonts.css">
    <link rel="stylesheet" href="CSS/normalize.css">

    <link rel="stylesheet" href="CSS/Style.css">
</head>

<body>
    <!-- navbar -->
    <section class="header-navbar" style="background-color: #adba8a !important;">
        <a href="index.php" class="site-brand">
            Etno<span>Srbija</span>
        </a>
        <nav class="navbar">
            <a href="index.php" class="active-page"> Home</a>
            <a href="About.php"> About</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>

    </section>

    <div class="login container">
        <div class="login-container">
            <h2>Napravi Nalog</h2>
            <p>Unesi podatke</p>
            <form action="" method="POST">
                <span>Unesi svoju email adresu</span>
                <input type="email" name="email" id="email" placeholder="youremail@gmail.com" required>
                <span>Unesi sifru</span>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span>Unesi Ime</span>
                <input type="text" name="FirstName" id="firstname" placeholder="First Name" required>
                <span>Unesi Prezime</span>
                <input type="text" name="LastName" id="lastname" placeholder="Last Name" required>
                <input type="submit" name="submit-signup" value="Sign Up" class="btn" id="submit-login">
                <div>
                    <p>
                        <?php
                        if(isset($_POST['submit-signup'])){
                        
                            echo "Nije uspela registracija";
                       
                        }
                        ?>
                    </p>
                </div>
            </form>
        </div>
    </div>




    <script src="JS/ajax.js"></script>
</body>

</html>