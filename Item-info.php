<?php
session_start();
$name = $_SESSION["name"];
$description = $_SESSION["description"];
$place = $_SESSION["place"];
$price = $_SESSION["price"];


if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    session_start();
}

if (isset($_GET['profile'])) {
    header('Location:Profile.php');
    exit();
}
if (isset($_GET['upload'])) {
    header('Location:upload.php');
    exit();
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
    <section class="header-navbar item-navbar">
        <a href="index.php" class="site-brand">
            Etno<span>Srbija</span>
        </a>
        <nav class="navbar">
            <a href="index.php" class="active-page"> Home</a>
            <a href="About.php"> About</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
        <?php if (!isset($_SESSION['user'])) {
            echo "<script>console.log('ime nije setovano');</script>";
        ?>
            <div id="login">
                <a href="Login.php" class="btn">Log In</a>
            </div>
        <?php } else {
        ?>

            <div class="dropdown" id="login">
                <button class="dropbtn btn"><?php echo $_SESSION['user']; ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="?logout">Izloguj se</a>
                    <a href="?profile">Profil</a>
                    <?php if ($_SESSION['user'] == "Admin") { ?>
                        <a href="?upload">Upload</a><?php } ?>
                </div>
            </div>

        <?php } ?>
    </section>
    <!-- kraj navbara -->

    <div class="small-container single-destination">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo "Img/" . Strtolower($name) . "/" . Strtolower($name) . "-featured" . ".jpg" ?>" width="100%" id="DestinationImg"></img>
                <div class="small-img-row">
                    <?php
                    $folderPath = "Img/" . Strtolower($name) . "/";
                    $file = glob($folderPath . '*');
                    $countFile = 0;
                    if ($file != false) {
                        $countFile = count($file);
                    }
                    while ($countFile - 1 > 0) {
                        $countFile--;
                    ?>
                        <div class="small-img-col">
                            <img src="<?php echo "Img/" . Strtolower($name) . "/" . Strtolower($name) . "_" . $countFile . ".jpg" ?>" width="100%" class="small-img"></img>
                        </div>
                    <?php } ?>
                    <div class="small-img-col">
                        <img src="<?php echo "Img/" . Strtolower($name) . "/" . Strtolower($name) . "-featured" . ".jpg" ?>" width="100%" class="small-img"></img>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <h3><?php echo $name . "," . $place; ?></h3>
                <h4><?php echo $price . " RSD"; ?></h4>
                <p><?php echo $description; ?></p>
                <?php if (isset($_SESSION["user-id"])) { ?>
                    <input type="date" id="date-from" name="date-from" placeholder="Datum pocetka" required>
                    <input type="date" id="date-to" name="date-to" placeholder="Datum odlaska" required>
                    <a id="reservate" href="" class="btn">Rezervisi</a>
                <?php } else {
                    echo "<script>alert('Niste se ulogovali<br>Ulogujte se ako zelite da rezervisete odmor');</script>";
                } ?>
            </div>
        </div>
    </div>






    <!-- footer -->
    <section class="footer">
        <footer class="myfooter">
            <a href="Index.html" class="site-brand">
                Etno<span>Srbija</span>
            </a>
            <p class="text"> Samo se uputite u jedno od bajkovitih srpskih etno sela! Zaljubićete se u Srbiju još više – to vam obećavamo!</p>

            <div class="box-container">


                <div class="box">
                    <h3>Popularna mesta</h3>
                    <a href="#"><i class="fas fa-angle-right"></i> Uvac</a>
                    <a href="#"><i class="fas fa-angle-right"></i> Gostoljublje</a>
                    <a href="#"><i class="fas fa-angle-right"></i> Moravski Konaci</a>
                    <a href="#"><i class="fas fa-angle-right"></i> Stanisici</a>
                    <a href="#"><i class="fas fa-angle-right"></i> Sirogojno</a>
                    <a href="#"><i class="fas fa-angle-right"></i> Trsic</a>
                </div>

                <div class="box">
                    <h3>Kontakt info</h3>
                    <a href="#"> <i class="fas fa-phone"></i> +381-456-7890 </a>
                    <a href="#"> <i class="fas fa-mobile"></i> +381-222-3333 </a>
                    <a href="#"> <i class="fas fa-envelope"></i> neca@gmail.com </a>
                    <a href="#"> <i class="fas fa-map"></i> Vrbnica, Serbia - 400104 </a>
                </div>

                <div class="box">
                    <h3>Pratite nas na:</h3>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>

                <div class="subscripe-form box">
                    <h2>Prijavite se za najnovije vesti!</h2>
                    <form class="flex">
                        <input type="email" placeholder="Enter email" name="email-sub" class="form-control">
                        <input type="submit" class="btn" name="subscribe" value="Subscribe">
                    </form>
                </div>
            </div>
            <div class="credit"> created by <span>@nemanja</span> | all rights reserved! &trade; </div>
        </footer>
    </section>
    <!-- kraj footer -->
    <script src="JS/item-info.js"></script>
    <script src="JS/ajax.js"></script>
</body>

</html>