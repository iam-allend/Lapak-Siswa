<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title> <?= $tittle; ?> </title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('frontend/css/bootstrap.min.css'); ?>" />
  <!----css3---->
  <link rel="stylesheet" href="<?= base_url('frontend/css/custom.css'); ?>">

  <link rel="stylesheet" href="font/flaticon.css">
  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
  <link rel="stylesheet" type="text/css" href=" <?= base_url('frontend/css/settings.css'); ?>" media="screen" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;800&family=Lato:ital,wght@0,400;0,700;0,900;1,300&family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;600;700;800&family=Oswald:wght@200;300;400;500;600;700&family=PT+Sans:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,500&family=Roboto:wght@300;400;500;700;900&family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!--fontawesome-->


  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
    rel="stylesheet">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">



  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="<?= base_url('frontend/css/animate.min.css'); ?>">
  <!-- Link Font Awesome -->




</head>

<body>



  <div class="header" id="header">
    <header class="header-area header-style-two">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-3">
            <div class="header-left">

              <a href="" target="_blank" class="social-facebook">
                <i class="fab fa-facebook-f"></i>
              </a>

              <a href="" target="_blank" class="social-twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" target="_blank" class="social-twitter">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="" target="_blank" class="social-twitter">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
          <div class="col-md-9">
            <div class="header-right">
              <ul>
                <li>

                  <i class="far fa-clock"></i>
                  <?php
                  date_default_timezone_set("Asia/Jakarta");
                  echo date("d-m-Y");
                  ?>

                </li>
                <li>
                  <i class="fas fa-map-marker-alt"></i>
                  JL Pemuda Semarang Indonesia
                </li>
                <li>
                  <i class="fas fa-mobile-alt"></i>
                  <a href="https://www.google.com/search?gs_ssp=eJzj4tZP1zcsSSmsMMnNMmC0UjGoMEo1N0gzSbYwsDBMSktLTLMyqEhKMjUySrMwMDM0tLRMMvYSKM7NzlMwNFAoTs1NLErMSwcAv2gUfg&q=smkn+10+semarang&oq=smkn10+sem&gs_lcrp=EgZjaHJvbWUqEggBEC4YDRivARjHARiABBiOBTIGCAAQRRg5MhIIARAuGA0YrwEYxwEYgAQYjgUyCAgCEAAYFhgeMggIAxAAGBYYHjIICAQQABgWGB4yCggFEAAYBRgNGB4yCggGEAAYBRgNGB4yCggHEAAYBRgNGB4yCggIEAAYBRgNGB7SAQgzMjQxajBqN6gCALACAA&sourceid=chrome&ie=UTF-8#">(024)3515701</a>
                  <li class="fas fa-user-alt"></li> <a href="/profile">Login</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="navigation" id="navigation" style="background-color:orange;">
      <div class="header-inner" id="header-inner">
        <div class="container">
          <nav class="navbar navbar-expand-lg my-navbar p-0">
            <a class="navbar-brand" href="index.php"><img src="https://ugc.production.linktr.ee/qnmkSb1gTSOsC1WoLGNB_yJcVw3n3VhywCi6K?io=true&size=avatar-v3_0" class="img-fluid" style="width: 65px;" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
              <span></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/about">About Us</a>
                </li>
                <!-- <li class="nav-item dropdown">
        <a class="nav-link" href="#" data-toggle="dropdown">Aboutus
		<i class="fas fa-chevron-down"></i></a>
		  <ul class="dropdown-menu small-menu">
		     <a href="aboutus.php">Who we Are</a>
			  <a href="#">Profile</a>
		  </ul>
      </li> -->

                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" data-toggle="dropdown">Produk<i class="fas fa-chevron-down"></i></a>
                  <ul class="dropdown-menu small-menu">
                    <a href="urban-infrastructure.php">Kapal</a>
                    <a href="road-infrastructure.php">IT</a>
                    <a href="industrial-infrastructure.php">tawuran</a>
                    <a href="construction-engineering.php">gardan kapal</a>
                    <a href="structure-engineering.php">mesin bubut</a>


                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">Blog</a>
                </li>



                <!-- <li class="nav-item dropdown">
        <a class="nav-link" href="#" data-toggle="dropdown">opo wae njir bingng</a>
		  <ul class="dropdown-menu small-menu">
		     <a href="#">1</a>
		     <a href="#">2</a>
		     <a href="#">3</a>
		     <a href="#">4</a>
		     <a href="#">5</a>
		     <a href="#">6 mbuh keri rk wes </a>
		  </ul>
      </li> -->

                <li class="nav-item">
                  <a class="nav-link" href="/contactus">Contact</a>
                </li>
              </ul>


            </div>
            <form class="form-inline my-2 my-lg-0 d-lg-block d-md-none d-none">
              <div class="appoint-btn">
                <a href="#">Hubungi Kami</a>
              </div>
            </form>
          </nav>
        </div>
      </div>
    </div>

  </div>