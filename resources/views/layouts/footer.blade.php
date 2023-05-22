<!DOCTYPE html>
<html>
<head>
  <!-- Add the Font Awesome CSS file -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .fa-ul li a {
      color: black;
      transition: color 0.3s;
      margin-left: 0.5em;
    }
    .p-4 {
        padding: 1px!important;
    }
    .fa-ul li a:hover {
      color: #F9B044;
    }

    footer {
      font-size: 12px;
    }

    .logo img {
      max-height: 200px;
      padding-top:15px;
      padding-bottom:30px;
    }

    .btn-floating.btn-dark.btn-lg {
      font-size: 12px;
      width: 32px;
      height: 32px;
      line-height: 32px;
      padding: 0;
    }

    .btn-floating.btn-dark.btn-lg:hover {
      background-color: #F9B044;
      color: white;
    }

    h5.text-uppercase.mb-4.pb-1 {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div>
  <footer class="text-black text-center text-lg-start bg-light">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row mt-4">
        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
          <a href="/acceuil" class="logo d-flex align-items-center">
            <img src="{{asset('assets/annuaire/img/logo.png')}}" alt="">
          </a>

          <div class="mt-4" style="padding-left:20px">
            <!-- Facebook -->
            <a type="button" class="btn btn-floating btn-dark btn-lg"><i class="fab fa-facebook-f"></i></a>
            <!-- Dribbble -->
            <a type="button" class="btn btn-floating btn-dark btn-lg"><i class="fab fa-dribbble"></i></a>
            <!-- Twitter -->
            <a type="button" class="btn btn-floating btn-dark btn-lg"><i class="fab fa-twitter"></i></a>
            <!-- Google + -->
            <a type="button" class="btn btn-floating btn-dark btn-lg"><i class="fab fa-google-plus-g"></i></a>
            <!-- Linkedin -->
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4 pb-1">Entreprises Au Maroc</h5>
          <ul class="fa-ul" style="margin-left: 1.65em;">
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-search"></i></span><span class="ms-2">Rechercher Une Entreprise</span>
            </li>
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-star"></i></span><span class="ms-2">Spécialités</span>
            </li>
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-map-marker-alt"></i></span><span class="ms-2">Villes</span>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <ul class="fa-ul" style="margin-left: 1.65em;">
                <li class="mb-3">
                  <span class="fa-li"><i class="fas fa-sign-in-alt"></i></span><a href="/login">Se Connecter</a>
                </li>
                <li class="mb-3">
                  <span class="fa-li"><i class="fas fa-user-plus"></i></span><a href="/register">Inscription</a>
                </li>
                <li class="mb-3">
                  <span class="fa-li"><i class="fas fa-book"></i></span><a href="/annuaire">Annuaire</a>
                </li>
                <li class="mb-3">
                  <span class="fa-li"><i class="fas fa-blog"></i></span><a href="/blog">Blog</a>
                </li>
                <li class="mb-3">
                  <span class="fa-li"><i class="fas fa-question-circle"></i></span><a href="/faq">F.A.Q</a>
                </li>
                <li class="mb-3">
                  <span class="fa-li"><i class="fas fa-envelope"></i></span><a href="/contact">Contactez-Nous</a>
                </li>
              </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 2Pointlogic.com
    </div>
    <!-- Copyright -->
  </footer>
</div>

</body>
</html>
