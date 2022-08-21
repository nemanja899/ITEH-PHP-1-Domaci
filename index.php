<?php 
require_once 'model/Vacation.php';
require_once 'DbConnectionFactory.php';
session_start();
$top_places = Vacation::getTopSix($conn);
if (!$top_places) {
    echo "Nastala je greška pri preuzimanju podataka";
    die();
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

    <link rel="stylesheet"  href="CSS/Style.css">
</head>
<body>
  <!-- navbar -->
  <section class="header">
    <nav class="navbar">
        <div class ="container flex">
            <a href="Index.html" class="site-brand">
                Etno<span>Srbija</span>
            </a>
            <button type="buttnon" id="navbar-show-btn" class="flex">
                <i class= "fas fa-bars"></i>
            </button>
            <div id="navbar-collapse">
                <button type="button" id="navbar-close-btn" class="flex" >
                    <i class="fas fa-times"></i>
                </button>
                <ul class="navbar-nav">
                    <li class ="nav-item">
                        <a href ="Index.html" class="nav-link active"> Home</a>

                    </li>
                    <li class ="nav-item">
                        <a href ="Gallery.html" class="nav-link"> Gallery</a>

                    </li>
                    <li class ="nav-item">
                        <a href ="About.html" class="nav-link"> About</a>

                    </li>
                    <li class ="nav-item">
                        <a href ="Contact.html" class="nav-link"> Contact</a>

                    </li>
                </ul>
            </div>

        </div>
    </nav>
  </section>
  <!-- kraj navbara -->

  <!-- header -->
  <header class="flex">
      <div class="container">
          <div class="header-title">
              <h1>Pusti svoj korak </h1>
              <p>Iskusite nešto potpuno novo, a ipak staro. Probudite se u toplom zagrljaju mira i tišine, i provedite dan ušuškani u čuveno srpsko gostoprimstvo. Naučite stari zanat ili dva u prelepoj prirodi. I uživajte u čarima tradicionalne srpske kuhinje. </p>
          </div>
          <div class="header-form">
              <h2>Izaberi svoju destinaciju:</h2>
              <form id="myform" class="flex">
                  <input type ="text" class="form-control" name="place" placeholder="Destination name">
                  <input type="date" id="datum" name="date" class="form-control" placeholder="Date">
                  <input type="number" class= "form-control" name="price"  placeholder="Cena(RSD)" >
                  <button type="submit" id="search" name="search" class="btn"> Search</button>
              </form>
          </div>
      </div>

  </header>
  <!-- kraj headera -->

  <!-- sekcija odabranih lokacija -->
  <section id="featured" class="slikeSrb">
      <div class="container">
          <div class="title-wrap">
              <span class="sm-title">Upoznati neka mesta 
              pre nego sto odputujete</span>
              <h2 class="lg-title">odabrana mesta</h2>
          </div>
          <div class="featured-row">
            <?php  foreach($top_places as $tp_place){ ?>
              <div class="featured-item m2 shadow">
                <div class="featured-item-img">
                  <img src="<?php echo "Img/".Strtolower( $tp_place['Name'])."/". Strtolower($tp_place['Name'])."-featured".".jpg"?>"></img>
                </div>
                  <div class ="featured-item-content">
                      <span>
                          <i class ="fas fa-map-marker-alt"></i>
                          <?php echo $tp_place['Name'].','.$tp_place["Place"]?>
                      </span>
                      <div>
                          <p class="text"><?php echo $tp_place['Description']?></p>
                      </div>
                  </div>
              </div>
                <?php }?>
            </div>
      </div>
  </section>
  <!-- kraj sekcije odabranih lokacija -->
  <!-- footer -->
  <footer class="slikeSrb">
      <div class="container footer-row">
          <div class="footer-item">
              <a href="Index.html" class="site-brand">
                  Etno<span>Srbija</span>
              </a>
              <p class="text"> Samo se uputite u jedno od bajkovitih srpskih etno sela! Zaljubićete se u Srbiju još više – to vam obećavamo!</p>
          </div>
          <div class="footer-item">
              <h2>Pratite nas na:</h2>
              <ul class="social-links">
                  <li>
                      <a href="#">
                        <i class ="fab fa-facebook-f"></i>
                      </a>
                   </li>
                   <li>
                    <a href="#">
                      <i class ="fab fa-instagram"></i>
                    </a>
                 </li>
                 <li>
                    <a href="#">
                      <i class ="fab fa-twitter"></i>
                    </a>
                 </li>
                 <li>
                    <a href="#">
                      <i class ="fab fa-pinterest"></i>
                    </a>
                 </li>
                 <li>
                    <a href="#">
                      <i class ="fab fa-google-plus"></i>
                    </a>
                 </li>
              </ul>
          </div>
          <div class="footer-item">
              <h2>Popularna mesta</h2>
              <ul>
                  <li><a href="#">Uvac</a></li>
                  <li><a href="#">Gostoljublje</a></li>
                  <li><a href="#">Moravski Konaci</a></li>
                  <li><a href="#">Stanisici</a></li>
                  <li><a href="#">Sirogojno</a></li>
                  <li><a href="#">Trsic</a></li>
              </ul>

          </div>
          <div class="subscripe-form footer-item">
              <h2>Prijavite se za najnovije vesti!</h2>
              <form class="flex">
                  <input type="email" placeholder="Enter email" class="form-control">
                  <input type="submit" class="btn" value="Subscribe">
                </form>
              </form>
          </div>
      </div>
  </footer>
  <!-- kraj footer -->
    <script src = "JS/script.js"></script>
</body>
</html>