

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <!-- Scripts -->


        <!-- Favicons -->
    <header class="header fixed-top position-absolute" >



    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/annuaire/img/logo.png"  alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto {{ Request::is('acceuil') ? 'active' : '' }}" href="{{ url('/acceuil') }}">Acceuil</a></li>
            <li><a class="nav-link scrollto {{ Request::is('annuaire') ? 'active' : '' }}" href="{{ url('/annuaire') }}">Annuaire</a></li>
            <li><a class="nav-link scrollto {{ Request::is('blog') ? 'active' : '' }}" href="{{ url('/blog') }}">Blog</a></li>
            <li><a class="nav-link scrollto {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contacter-nous</a></li>



          @if (Route::has('login'))
          @auth
                <li>
                 <a href="{{ url('demande_annoncement') }}" class="getstarted">Demande d'annoncement</a>
               </li>
              <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                  <li>
                      <i class="bi bi-person"></i>
                      <a class="dropdown-item" href="{{ url('profil') }}">Profile</a>
                  </li>

                  <li>
                    <hr class="dropdown-divider">
                  </li>

                  <li>
                      <i class="bi bi-gear"></i>
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </li>

                </ul><!-- End Profile Dropdown Items -->
              </li>
          @else

              <li>
                  <a href="{{ route('login') }}" class="getstarted">Log in</a>
              </li>
          @if (Route::has('register'))
              <li>
                  <a href="{{ route('register') }}" class="getstarted">Register</a>
              </li>
          @endif
          @endauth
          @endif

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

