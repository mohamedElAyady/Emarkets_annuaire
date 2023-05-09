<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WeBuild - Bootstrap Coming Soon Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets_acceuil/img/favicon.png "rel="icon">
  <link href="assets_acceuil/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>Emarket Annuaire</h1>
      <h2>Trouver une entreprise</h2>
      
      <form action="forms/notify.php" method="post" role="form" class="php-email-form">

        <div class="input-group">
            <select id="DoctorSpecialties" class="search-query search-query-spe" name="data[Doctor][specialties]">
                <option value="">Toutes les spécialités</option>
                <option value="1" >Allergologie</option><option value="8" >Anatomie et cytologie pathologiques humaines</option><option value="9" >Anesthésie-réanimation</option><option value="10" >Angiologie, artères, veines, lymphatiques</option><option value="11" >Biologie médicale</option><option value="2" >Cancérologie</option><option value="12" >Cardiologie et médecine des affections vasculaires</option><option value="40" >Chirurgie dentaire</option><option value="13" >Chirurgie générale</option><option value="14" >Chirurgie infantile</option><option value="15" >Chirurgie maxillo-faciale</option><option value="16" >Chirurgie orthopédique, traumatologie</option><option value="17" >Chirurgie plastique</option><option value="18" >Dermato-vénéréologie</option><option value="19" >Diabétologie-nutrition</option><option value="42" >Diététique</option><option value="20" >Endocrinologie et maladies métaboliques</option><option value="43" >Gastroentérologie</option><option value="21" >Gynécologie obstétrique</option><option value="25" >Maladies du sang</option><option value="28" >Médecine d'urgence</option><option value="26" >Médecine du sport</option><option value="27" >Médecine du travail</option><option value="3" >Médecine générale</option><option value="29" >Médecine interne</option><option value="30" >Médecine physique et de réadaptation</option><option value="32" >Neurochirurgie</option><option value="33" >Neurologie</option><option value="34" >Neuropsychiatrie</option><option value="41" >Nutrition</option><option value="31" >Néphrologie</option><option value="5" >Ophtalmologie</option><option value="35" >Ostéopathie</option><option value="36" >Oto-rhino-laryngologie</option><option value="22" >Pathologie digestive</option><option value="24" >Pneumo-phtisiologie</option><option value="37" >Psychiatrie</option><option value="23" >Pédiatrie</option><option value="38" >Radiologie</option><option value="4" >Rhumatologie</option><option value="39" >Santé publique</option><option value="44" >Sexologie</option><option value="7" >Stomatologie</option><option value="6" >Urologie</option>                        </select>  
            <input type="text" class="search-query search-query-city" placeholder="Ville" id="city_autocomplete"  >
        
        </div>

        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your notification request was sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Trouver</button></div>
      </form>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, NY 535022, USA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>WeBuild</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-coming-soon-template-countdwon/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End #footer -->

  <!-- Vendor JS Files -->
  <script src="assets_acceuil/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_acceuil/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets_acceuil/js/main.js"></script>

</body>

</html>