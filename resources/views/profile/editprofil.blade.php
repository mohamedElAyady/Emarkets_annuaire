<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
      <!-- Favicons -->
    <link href="assets/annuaire/img/favicon.png" rel="icon">
    <link href="assets/annuaire/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/annuaire/css/main.css') }}" rel="stylesheet"> 
    <link href="{{ asset('assets/annuaire/css/style.css') }}" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="assets_acceuil/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets_acceuil\css\header_style.css" rel="stylesheet">

      <!-- Favicons -->

  

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body style="background-color: white">
    <!-- Start navigation bar -->
    @include('layouts.navbar')
    <!-- End navigation bar -->
    
    <x-app-layout style="margin-top: 400px; background-color: white">
            <div style="margin-top: 64px; background-color: white" >
              <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" style="background-color: white">
                  @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                      @livewire('profile.update-profile-information-form')

                    
                  @endif

                  @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                      <div class="mt-10 sm:mt-0">
                          @livewire('profile.update-password-form')
                      </div>

                      
                  @endif

                  

                  

                  @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                      

                      <div class="mt-10 sm:mt-0" >
                          @livewire('profile.delete-user-form')
                      </div>
                  @endif
              </div>
          </div>
        </x-app-layout>



    <script src="{{ asset('assets/annuaire/js/index.js') }}"></script>
    <script src="https://kit.fontawesome.com/badbb472a2.js" crossorigin="anonymous"></script>
</body>
</html>
