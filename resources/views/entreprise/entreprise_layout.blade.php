<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Administration</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('admin_assets/img/logov2.png ')}}" rel="icon">
    <link href="{{asset('assets/annuaire/css/main.css')}}" rel="stylesheet">


    <link href="{{asset('admin_assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"><!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    
 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"><!-- Vendor CSS Files -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="{{asset('admin_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet">

  <style>
    .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .comment-header {
    display: flex;
    align-items: center;
    padding: 12px;
    border-bottom: 1px solid #e9ebee;
    }

    .comment-avatar {
    width: 40px;
    height: 40px;
    background-color: #ddd;
    border-radius: 50%;
    }

    .comment-username {
    margin-left: 10px;
    }

    .comment-content {
    padding: 12px;
    }

    .comment-text {
    background-color: #f0f2f5;
    border-radius: 10px;
    padding: 10px;
    margin: 0;
    }

    .dropdown-toggle {
color: #333;
}

.dropdown-toggle:hover {
    color: #555;
}

.dropdown-menu {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
}

.dropdown-item {
    color: #333;
}

.dropdown-item:hover {
    background-color: #e6e6e6;
    color: #555;
}
.dropdown-toggle::after {
display: none;
}


</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/acceuil" class="logo d-flex align-items-center">
        <img src="{{asset('assets/annuaire/img/logo.png')}}" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">{{ $count }}</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Vous avez nouvelles notifications
            </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

              <!-- Notification Items -->
              @foreach($notifications as $notification)
              <a style="color: #6F6C6D" href="#">
                <li class="notification-item">
                  <i class="bi bi-info-circle text-primary"></i>
                  <div>
                    <h4>{{ $notification->utilisateur->prenom }} {{ $notification->utilisateur->nom }}</h4>
                    <p>nouveau commentaire</p>
                    <p>{{ $notification->created_at }}</p>
                  </div>
                </li>
              </a>
              <li>
                <hr class="dropdown-divider">
              </li>
            @endforeach
            <li class="dropdown-footer">
              <a href="{{ route('entreprise.annonce') }}">Afficher toutes les commentaires</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset(Auth::user()->profile_photo_path)}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/entreprise/profile">
                <i class="bi bi-person"></i>
                <span>Mon Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Paramètres</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>déconnecter</span>
              </a>
            </li>            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
             </form>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav" style="height: 100%; display: flex; flex-direction: column; justify-content: space-between;">

      <li class="nav-item">
        <a class="nav-link {{ Request::is('entreprise') ? '' : 'collapsed' }}" href="{{ url('/entreprise') }}">
          <i class="bi bi-house"></i>
          <span>tableau de bord</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('entreprise/annonce') ? '' : 'collapsed' }}" href="/entreprise/annonce">
          <i class="bi bi-file-earmark-plus"></i>
          <span>Mon annonce</span>
        </a>


      <li class="nav-item">
        <a class="nav-link {{ Request::is('entreprise/support') ? '' : 'collapsed' }}" href="/entreprise/support">
          <i class="bi bi-question-circle-fill"></i>
          <span>Support technique</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link <?php
        if (!Request::is('entreprise/profile') ) echo 'collapsed';
        ?>" href="/entreprise/profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->


      
      <li class="nav-item" style="margin-top: auto;">
        <a class="nav-link <?php if (!Request::is('en')) echo 'collapsed'; ?>" href="/entreprise/profile" style="color: gold;">
          <i class="fas fa-crown" style="color: gold;"></i>
          <span>Upgrade mon plan</span>
        </a>
      </li><!-- End Upgrade Plan Nav -->
    


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    
        <!-- content here -->

    @yield('content')
        <!-- fin content -->



  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

  <!-- Template Main JS File -->
  <script src="{{asset('admin_assets/js/main.js')}}"></script>
    <!-- Vendor JS Files -->
  <script src="https://kit.fontawesome.com/badbb472a2.js" crossorigin="anonymous"></script>
</body>

</html>
