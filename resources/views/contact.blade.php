<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contactez-Nous</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets_acceuil/img/favicon.png "rel="icon">
  <link href="assets_acceuil/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
  <!-- ======= Contact Us Section ======= -->
  <section id="contact" class="contact" style="margin-top: 65px">
    <div class="container">

      <div class="row contact-info">
        <div class="col-md-6">
          <div class="contact-item">
            <img src="{{ asset('assets_acceuil/img/location.JPEG') }}" alt="">
            <h3>Adresse</h3>
            <address>A108 Adam Street, NY 535022, USA</address>
          </div>
        </div>

        <div class="col-md-6">
          <div class="contact-item split-background">
            <img src="{{ asset('assets_acceuil/img/phone.PNG') }}" alt="">
            <h3>Appelez-nous</h3>
            <div class="contact-text">
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="contact-item">
            <img src="{{ asset('assets_acceuil/img/email.JPEG') }}" alt="">
            <h3>Envoyez-nous un email</h3>
            <div class="contact-text">
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="contact-item split-background">
            <img src="{{ asset('assets_acceuil/img/clock.JPEG') }}" alt="">
            <h3>Heures d'ouverture</h3>
            <div class="contact-text">
              <p>Lundi - Samedi : 9h00 - 18h00</p>
            </div>
          </div>
        </div>
      </div>


      <div class="form">
        <form action="{{ route('contact.store') }}" method="post" role="form" class="php-email-form">
            @csrf
            <div class="section-title">
                <h2>Contactez-Nous</h2>
              </div>
          <div class="row">
            <div class="col-md form-group">
              <input type="text" name="nom" class="form-control" id="nom" placeholder="Vote Nom" required>
            </div>

            <div class="col-md form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre Prénom" required>
              </div>
            <div class="form-group mt-3">
              <input type="email" class="form-control" name="email" id="email" placeholder="Vote E-mail" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="sujet" id="sujet" placeholder="Sujet" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Votre message a été envoyé. Merci!</div>
          </div>
          <div class="text-center"><button style="background-color:#6F6C6D " type="submit">Envoyer le message</button></div>
        </form>
      </div>

    </div>
  </section>

  <!-- End Contact Us Section -->

  </main><!-- End #main -->
 <!-- ======= Footer ======= -->
 @include('layouts.footer')
 <!-- End #footer -->




  <!-- Template Main JS File -->
  <script src="assets_acceuil/js/main.js"></script>

</body>

</html>
