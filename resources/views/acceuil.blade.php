<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets_acceuil/img/favicon.png "rel="icon">
  <link href="assets_acceuil/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- header -->
  <link href="assets_acceuil\css\header_style.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_acceuil/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets_acceuil/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->

  @include('layouts.navbar')
  <!-- End #header -->
  <style>
    .hero {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .hero h1 {
      margin: 0 0 0 0;
      font-size: 60px;
      font-size: 3.65rem;
      font-weight: 700;
      text-transform: uppercase;
        }
    .hero p {
            font-size: 1.3125rem;
        }
        
    .form-control{
      border-radius:0px;
      box-shadow: none;
      height: 50px;
      font-family: inherit;
      border-color: black;
    }
    .form-control:hover,
    .form-control:focus
    {
        border-color: #F9B044;
    }

    .search-btn{
      margin: 0 0 0 0;
      font-size: 60px;
      font-size: 1.4rem;
      font-weight: 700;
      text-transform: uppercase;
    }
    .search-btn:hover{
      color: #F9B044;
    }

</style>

<section class="hero" style="background-image: url('assets/annuaire/img/cardbackground.png'); height: 100vh;">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <h1>Bienvenue sur eMarkets Annuaire</h1>
              <p>Le premier et le seul annuaire qui rassemble tous les acteurs a l'ére numérique au maroc.</p>
          </div>
          
      </div>
      <form action="{{ route('search') }}" method="GET">
        <div class="row">
            <div class="col-9">
                <input class="form-control shadow-none" type="text" name="q" placeholder="Rechercher par la raison sociale, ville, sécteur d'activité et l'adresse">
            </div>
            <div class="col-3">
                <button class="form-control shadow-none" type="submit">
                    <h5 class="search-btn">Recherche</h5>
                </button>
            </div>
        </div>
    </form>
  </div> 
</section><!-- End Hero -->


  <!-- ======= Footer ======= -->
  <!-- End #footer -->

  @include('layouts.footer')
  <!-- Template Main JS File -->
  <script src="assets_acceuil/js/main.js"></script>

</body>

</html>
