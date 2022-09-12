<?php
session_start();
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
    <section class="header-navbar">
        <a href="index.php" class="site-brand">
            Etno<span>Srbija</span>
        </a>
        <nav class="navbar">
            <a href="index.php"> Home</a>
            <a href="About.php" class="active-page"> About</a>
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
    <!-- kraj navbara -->

    <!-- header -->
    <section class="home-section">
    <div class="home">
      <div class="slide">
        <div class="content">
          <div class="header-title">
          <h1>O nama </h1>
          <p>Etno Srbija pruža mogućnost da osmislite jedinstvenu avanturu i da život udahnemo punim plućima, kao i jedinstven osećaj putovanja, uz siguran i bezbedan krov nad glavom. Ovime, stvara se kvalitetniji život i povratak unutrašnjeg balansa.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- kraj headera -->
    <!-- about sekcija -->
    <section id="about" class="featured-places">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">stvari koje treba da znate
                    o nama
                </span>
                <h2 class="lg-title">Nasa Prica</h2>

            </div>
            <div class="about-row">
                <div class="about-left m2">
                    <img src="Img/o-nama.jpg">
                </div>
                <div class="about-right">
                    <h2>20 godina iskustva</h2>
                    <p class="text">Ideja na kojoj živimo i vozimo je povratak prirodi, aktivnom životu i harmonizacija sa onim čemu izvorno pripadamo.

                        Najbolji način uživati u prirodi jeste biti deo nje, osetiti sve što pruža i doživeti sve ono za šta smo spremi. Budite svoj vodič uz dobro uredjen i organizovan aktivan odmor ili život u prirodi.

                        Dozvolite sebi udobnost, sigurnost i luksuz u okruženju prelepih prostranstava i prirodnih lepota.

                        Etno Kamp pruža mogućnost obezbedjivanja jedinstvenih, luksuznih i udobnih vozila na točkovima, popularno nazvanih kamperima. Osnovani smo da Vama, Vašoj porodici i onima koje volite pružimo jedinstvene trenutke uživanja, harmonije i aktivnog druženja sa prirodom, uz visok stepen bezbednosti i performansi visoke tehnologije.

                        Udobnost, bezbednost i luksuz su postulati koje poštujemo i na kojima je zasnovano naše poslovanje.

                        Dozvolite da Vas uvedemo u svet komfora i zadovoljstva. Jedinstveno i neponovljivo!</p>
                    <p class="text">Ako je ideja putovanje, Etno Kamp pruža način.
                        Vožnjom kamperima konektujemo se sa prirodom. Oni koje volite, porodica je zajedno, na okupu, a opet, okružena prostranstvima prirode.

                        Kuće na točkovima – kamperi omogućavaju upotrebu svih savremenih i modernih dostignuća tehnike, ali na drugačiji način od uobičajenog. Vožnja kampera uspostavlja ili vraća balans i ravnotežu u život, a pruža jedinstveni osećaj zadovoljstva onime što jesmo.</p>
                </div>
            </div>
        </div>

    </section>
    <!-- about sekcija -->



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
    <script src="JS/script.js"></script>
    <script src="JS/ajax.js"></script>
</body>

</html>