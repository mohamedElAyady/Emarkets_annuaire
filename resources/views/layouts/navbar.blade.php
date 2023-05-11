
<!-- ======= Header ======= -->
      <!-- Favicons -->
      <link href="assets/annuaire/img/favicon.png" rel="icon">
      <link href="assets/annuaire/img/apple-touch-icon.png" rel="apple-touch-icon">
      
  
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
      <!-- Scripts -->
     
  
      <!-- Template Main CSS File -->
      <link href="{{ asset('assets/annuaire/css/main.css') }}" rel="stylesheet"> 
      <link href="{{ asset('assets/annuaire/css/style.css') }}" rel="stylesheet"> 
        <!-- Favicons -->
    <header id="header" class="header fixed-top position-absolute">



    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/annuaire/img/logo.png"  alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li ><a class="nav-link scrollto {{ Request::is('acceuil') ? 'active' : '' }}" href="{{ url('/acceuil') }}">Acceuil</a></li>
          <li ><a class="nav-link scrollto {{ Request::is('annuaire') ? 'active' : '' }}" href="{{ url('/annuaire') }}">Annuaire</a></li>
          <li><a class="nav-link scrollto" href="#services">Blog</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Contacter-nous</a></li>
          
          <li>
            @if (Route::has('login'))
            <div class="switch">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <li><a href="{{ route('login') }}" class="getstarted " >Log in</a></li>

                    @if (Route::has('register'))
                       <li> <a href="{{ route('register') }}" class=" getstarted" >Register</a></li>
                    @endif
                @endauth

            </div>
             @endif
           </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

