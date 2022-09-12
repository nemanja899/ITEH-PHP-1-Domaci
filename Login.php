<?php
require_once "DbconnectionFactory.php";
require_once "model/User.php";
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
    
   
    $user = User::login($_POST['email'], $_POST['password'], $conn);
   
    if ($user != null) {
    
        $_SESSION['user'] = $user->FirstName;
        $_SESSION['user-id']=$user->ID;
        unset($_POST);
        if ($user->FirstName != "Admin") {
       
            header('Location: index.php');
            exit();
        } else {
        
            header('Location: upload.php');
            exit();
        }
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
            <h2>Prijavi se</h2>
            <p>Unesi podatke</p>
            <form action="" method="POST">
                <span>Unesi svoju email adresu</span>
                <input type="email" name="email" id="email" placeholder="youremail@gmail.com" required>
                <span>Unesi sifru</span>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <input type="submit" name="submit-login" value="Login" class="btn" id="submit-login">
                <a href="?email;" id="forget_password">Zaboravljena sifra?</a>
                <div class="forget_password">
                    <p id="show-password">

                    </p>
                </div>
            </form>
            <a href="Sign-Up.php" class="btn">Sign Up</a>
        </div>
    </div>




    <script src="JS/ajax.js"></script>
</body>

</html>