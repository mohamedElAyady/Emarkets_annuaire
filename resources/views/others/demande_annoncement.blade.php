<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="assets_acceuil/img/favicon.png "rel="icon">
  <link href="assets_acceuil/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <!-- Template Main CSS File -->
  <link href="assets_acceuil\css\header_style.css" rel="stylesheet">
  <link href="{{ asset('multi_step_form_assets\style.css')}}" rel="stylesheet">
  <link href="{{ asset('assets\annuaire\css\main.css')}}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>/*
    $(document).ready(function() {
      // Array to store data
      var formDataArray = [];
  
      // Add an event listener to the button click
      $('.js-btn-submit').click(function() {
        // Get the CSRF token value
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
  
        // Get the input values
        var typeEntreprise = $('input[name="type_entreprise"]').val();
        var raisonSociale = $('input[name="raison_sociale"]').val();
        var ville = $('input[name="ville"]').val();
        var adresse = $('input[name="adresse"]').val();
        var email = $('input[name="email"]').val();
        var telephone = $('input[name="telephone"]').val();
        var secteurActivite = $('select[name="secteur_activite"]').val();
        var logoFileInput = $('input[name="logo_url"]')[0];
        var description = $('textarea[name="description"]').val();
        var siteWeb = $('input[name="site_web"]').val();
        var facebook = $('input[name="facebook"]').val();
        var instagram = $('input[name="instagram"]').val();
        var linkedIn = $('input[name="linkedIn"]').val();
        var platform = $('input[name="platform"]').val();
        var lien = $('input[name="lien"]').val();
  
        // Create a new FormData object
        var formData = new FormData();
  
        // Append the input values to the FormData object
        formData.append('type_entreprise', typeEntreprise);
        formData.append('raison_sociale', raisonSociale);
        formData.append('ville', ville);
        formData.append('adresse', adresse);
        formData.append('email', email);
        formData.append('telephone', telephone);
        formData.append('secteur_activite', secteurActivite);
        formData.append('description', description);
        formData.append('site_web', siteWeb);
        formData.append('facebook', facebook);
        formData.append('instagram', instagram);
        formData.append('linkedIn', linkedIn);
        formData.append('platform', platform);
        formData.append('lien', lien);
  
        // Append the file to the FormData object
        if (logoFileInput.files.length > 0) {
          formData.append('logo_url', logoFileInput.files[0]);
        }
  
        // Add form data to the array
        formDataArray.push(formData);
  
        // Log the array to the console
        console.log(formDataArray);
  
  
        // Make an AJAX request to the server
        $.ajax({
          url: '{{ route('createDemande') }}',
          type: 'POST',
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            console.log(response);
            // Handle the success response
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle the error response
          }
        });
      });
    });*/
  </script>
  
  

<body>
    <!-- ======= Header ======= -->
    @include('layouts.navbar')
    <!-- End #header -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <div class="content" style="margin-top: 100px; margin-bottom: 200px;">
        @if ($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
                {{$message}}
            </div>
        @endif
        <div class="content__inner">
          <div class="container overflow-hidden">
            <div class="multisteps-form">
              <div class="row">
                <div class="col-12 col-lg-8 ml-auto mr-auto">
                  <div class="multisteps-form__progress p-5">
                    <button class="multisteps-form__progress-btn js-active" type="button" title="Entreprise infos">Entreprise infos</button>
                    <button class="multisteps-form__progress-btn" type="button" title="Address">plus d'informations</button>
                    <button class="multisteps-form__progress-btn" type="button" title="Order Info">Social media</button>
                    <button class="multisteps-form__progress-btn" type="button" title="Message">Choisir un pack</button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-lg-8 m-auto">
                    <form class="multisteps-form__form" action="{{ route('entreprises.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="multisteps-form__panel bg-white js-active" data-animation="scaleIn">
                            <h3 class="multisteps-form__title nunito" style="font-size: 2rem; color:#6F6C6D;"><b>Entreprise infos</b></h3>
                            <div class="multisteps-form__content">
                              <div class="form-row mt-4">
                                <div class="col-12 col-sm-6">
                                  <input class="multisteps-form__input form-control" type="text" name="type_entreprise" placeholder="type d'entreprise" required/>
                                </div>
                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                  <input class="multisteps-form__input form-control" type="text" name="raison_sociale" placeholder="Raison Sociale" required/>
                                </div>
                              </div>
                              <div class="form-row mt-4">
                                <div class="col-12 col-sm-6">
                                  <input class="multisteps-form__input form-control" type="text" name="ville" placeholder="ville" required/>
                                </div>
                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                  <input class="multisteps-form__input form-control" type="text" name="adresse" placeholder="adresse" required/>
                                </div>
                              </div>
                              <div class="form-row mt-4">
                                <div class="col-12 col-sm-6">
                                  <input class="multisteps-form__input form-control" type="email" name="email" placeholder="Email"/>
                                </div>
                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                  <input class="multisteps-form__input form-control" type="text" name="telephone" placeholder="telephone"/>
                                </div>
                              </div>
                              <div class="button-row d-flex mt-4">
                                <button class="button-21 nunito skeleton ml-auto js-btn-next" type="button" title="Next">Next</button>
                              </div>
                            </div>
                        </div>
        
                        <div class="multisteps-form__panel" data-animation="scaleIn">
                            <h3 class="multisteps-form__title nunito" style="font-size: 2rem; color:#6F6C6D;"><b>plus d'informations</b></h3>
                            <div class="multisteps-form__content" style="height: 50vh;">
                              <div class="form-row mt-4">
                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                  <select class="multisteps-form__input form-control" name="secteur_activite">
                                    <option>Secteur D'activité</option>
                                    <option>Vente au détail en ligne</option>
                                    <option>Marketplaces en ligne</option>
                                    <option>Services en ligne</option>
                                    <option>Mode et habillement </option>
                                  </select>
                                </div>
                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                  <input type="file" class="multisteps-form__input form-control" name="logo_url" accept="image/*">
                                </div>
                              </div>
                              <div class="form-row mt-4">
                                <textarea class="multisteps-form__textarea form-control" name="description" placeholder="Description"></textarea>
                              </div>
                              <div class="button-row d-flex mt-4">
                                <button class="button-21 button-21-prev nunito skeleton js-btn-prev" type="button" title="Prev">Prev</button>
                                <button class="button-21 nunito skeleton ml-auto js-btn-next" type="button" title="Next">Next</button>
                              </div>
                            </div>
                        </div>
        
                        <div class="multisteps-form__panel" data-animation="scaleIn">
                            <h3 class="multisteps-form__title nunito" style="font-size: 2rem; color:#6F6C6D;"><b>Social media</b></h3>
                            <div class="multisteps-form__content">
                                <div class="form-row mt-4">
                                  <div class="col-12 col-sm-6">
                                      <input class="multisteps-form__input form-control" type="url" name="site_web" placeholder="Site web" required/>
                                  </div>
                                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                      <input class="multisteps-form__input form-control" type="url" name="facebook" placeholder="Facebook" required/>
                                  </div>
                                  </div>
                                  <div class="form-row mt-4">
                                  <div class="col-12 col-sm-6">
                                      <input class="multisteps-form__input form-control" type="url" name="instagram" placeholder="Instagram" required/>
                                  </div>
                                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                      <input class="multisteps-form__input form-control" type="url" name="linkedIn" placeholder="linkedIn" required/>
                                  </div>
                                  </div>
                                  <hr>
                                      <h5 class="nunito "  style="font-size: 1rem; color:#6F6C6D;">Autre:</h5>
                                  <div class="form-row mt-1">
                                  <div class="col-12 col-sm-3">
                                      <input class="multisteps-form__input form-control" type="text" name="platform" placeholder="Platform"/>
                                  </div>
                                  <div class="col-12 col-sm-9 mt-4 mt-sm-0">
                                      <input class="multisteps-form__input form-control" type="text" name="lien" placeholder="Lien"/>
                                  </div>
                                </div>
                                <div class="button-row d-flex mt-4">
                                    <button class="button-21 button-21-prev nunito skeleton  js-btn-prev" type="button" title="Prev">Prev</button>
                                    <button class="button-21 nunito skeleton  ml-auto js-btn-next" type="button" title="Next">Next</button>
                                    </div>
                            </div>
                        </div>
        
                        <div class="multisteps-form__panel" data-animation="scaleIn">
                        <h3 class="multisteps-form__title nunito" style="font-size: 2rem; color:#6F6C6D;"><b>Choisir un pack</b></h3>
                        <div class="multisteps-form__content">
                            <div class="row">
                                <div class="col-6 p-3" style="height: 60vh; background-color: red; border-radius: 1rem">
                                    <div class="border" style="background-color: white; border-radius: 1rem">

                                        <div class="row nunito" style="text-align: center; height: 7vh"></div>

                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>

                                        <div class="row nunito" style="text-align: center; height: 4vh;margin-bottom: 0.8vh">
                                        
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="col-2 p-3" style="height: 60vh;border-radius: 1rem">
                                    <div class="border" style="background-color: white; border-radius: 1rem">

                                        <div class="row nunito" style="text-align: center; height: 7vh"><b>Pack 1</b></div>

                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>

                                        <div class="row nunito" style="text-align: center; height: 3vh;margin-bottom: 0.8vh">
                                            <b>0DH</b>
                                            <input type="radio" name="radio_input" value="0" id="radio1" style="margin-top: 1vh">
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="col-2 p-3" style="height: 60vh;border-radius: 1rem">
                                    <div class="border" style="background-color: white; border-radius: 1rem">

                                        <div class="row nunito" style="text-align: center; height: 7vh"><b>Pack 1</b></div>

                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>

                                        <div class="row nunito" style="text-align: center; height: 3vh;margin-bottom: 0.8vh">
                                            <b>0DH</b>
                                            <input type="radio" name="radio_input" value="1" id="radio2" style="margin-top: 1vh">
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="col-2 p-3" style="height: 60vh;border-radius: 1rem">
                                    <div class="border" style="background-color: white; border-radius: 1rem">

                                        <div class="row nunito" style="text-align: center; height: 7vh"><b>Pack 1</b></div>

                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>
                                        <div class="row nunito" style="text-align: center; height: 5.4vh"><b>Pack 1</b></div>

                                        <div class="row nunito" style="text-align: center; height: 3vh;margin-bottom: 0.8vh">
                                            <b>0DH</b>
                                            <input type="radio" name="radio_input" value="2" id="radio3" style="margin-top: 1vh">
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="button-row d-flex mt-4">
                                <button class="button-21 button-21-prev nunito skeleton js-btn-prev" type="button" title="Prev">Prev</button>
                                <button class="button-21 nunito skeleton ml-auto  js-btn-submit" type="submit" title="Send">Send</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


</body>
@include('layouts.footer')
<!-- Template Main JS File -->

<script src="assets_acceuil/js/main.js"></script>
<script src="{{ asset('assets/annuaire/js/index.js') }}"></script>
<script src="https://kit.fontawesome.com/badbb472a2.js" crossorigin="anonymous"></script>
<script src="{{ asset('multi_step_form_assets/function.js') }}"></script>

</html>
    