<?php
require_once 'model/Vacation.php';
require_once 'DbConnectionFactory.php';
session_start();
$top_places = Vacation::getTopSix($conn);
if (!$top_places) {
  echo "Nastala je greška pri preuzimanju podataka";
  die();
}
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  session_start();
}
if (isset($_GET['profile'])) {
  header('Location:Profile.php');
  exit();
}
if(isset($_GET['upload'])) {
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
      <a href="index.php" class="active-page"> Home</a>
      <a href="About.php"> About</a>
      <a href="Contact.php"> Contact</a>
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

  <!-- header -->
  <section class="home-section">
    <div class="home">
      <div class="slide">
        <div class="content">
          <div class="header-title">
            <h1>Etno Sela Srbije</h1>
            <p>Iskusite nešto potpuno novo, a ipak staro.</p>
          </div>
          <div class="header-form">
            <h2>Izaberi svoju destinaciju:</h2>
            <form id="myform" class="flex">
              <input type="text" class="form-control" name="place" placeholder="Destination name">
              <input type="date" id="datum" name="date" class="form-control" placeholder="Date">
              <button type="submit" id="search" name="search" class="btn"> Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- kraj headera -->

  <!-- sekcija odabranih lokacija -->
  <section class="featured-places">
    <div class="container">
      <div class="title-wrap">
        <span class="sm-title">Upoznati neka mesta
          pre nego sto odputujete</span>
        <h2 class="lg-title">odabrana mesta</h2>
      </div>
      <div class="box-container">
        <?php foreach ($top_places as $tp_place) { ?>
          <div class="box">
            <a href="Item-info.php" class="item-info">
              <div class="image">
                <img src="<?php echo "Img/" . Strtolower($tp_place['Name']) . "/" . Strtolower($tp_place['Name']) . "-featured" . ".jpg" ?>"></img>
              </div>
              <div class="content">
                <span>
                  <i class="fas fa-map-marker-alt"></i>
                  <?php echo $tp_place['Name'] . ',' . $tp_place["Place"] ?>
                </span>
                <div>
                  <p class="text"><?php echo $tp_place['Description'] ?></p>
                </div>
              </div>
            </a>
          </div>

        <?php } ?>
      </div>
  </section>
  <!-- kraj sekcije odabranih lokacija -->




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
  <script src="JS/script.js"></script>
</body>

</html>