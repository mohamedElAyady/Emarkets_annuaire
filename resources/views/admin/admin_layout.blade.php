<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <title>Administration</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
  
    <!-- Favicons -->
    <link href="{{asset('admin_assets/img/favicon.png ')}}" rel="icon">
    
  
    <link href="{{asset('admin_assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"><!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    
  
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"><!-- Vendor CSS Files -->

    <link href="{{asset('admin_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet">
    
  <link href="{{asset('admin_assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('assets/annuaire/img/logo.png')}}" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

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
              Vous avez {{ $count }} nouvelles notifications
            </li>
            @foreach ($notifications as $index => $notification)
              @if ($index < 4)
                <li>
                  <hr class="dropdown-divider">
                </li>

              <!-- Notification Items -->
                <a style="color: #6F6C6D" href="{{ route('demandes.show', $notification['demande_id']) }}">
                  <li class="notification-item">
                    <i class="bi bi-info-circle text-primary"></i>
                    <div>
                      <h4>{{ $notification['raison_sociale'] }}</h4>
                      <p>{{ $notification['telephone'] }}</p>
                      <p>{{ $notification['date_soumission'] }}</p>
                    </div>
                  </li>
                </a>
                <li>
                  <hr class="dropdown-divider">
                </li>
              @else
                @break
              @endif
            @endforeach
            <li class="dropdown-footer">
              <a href="{{ route('demandes.index') }}">Afficher toutes les demandes</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('admin_assets/img/messages-1.jpg')}}" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('admin_assets/img/messages-2.jpg')}}" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('admin_assets/img/messages-3.jpg')}}" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('admin_assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/dashboard') ? '' : 'collapsed' }}" href="{{ url('/admin/dashboard') }}">
          <i class="bi bi-house"></i>
          <span>tableau de bord</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/demandes') ? '' : 'collapsed' }}" href="/admin/demandes">
          <i class="bi bi-file-earmark-plus"></i>
          <span>Demandes d'inscription</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link 
        <?php 
        if (Request::is('admin/utilisateurs') || Request::is('admin/utilisateurs/create') || Request::is('admin/utilisateurs/poubelle') ) {
        } else {
          echo 'collapsed';
        }
        
        ?>
        " data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people " ></i><span>Utilisateurs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-nav" class="nav-content collapse <?php 
        if (Request::is('admin/utilisateurs') || Request::is('admin/utilisateurs/create') || Request::is('admin/utilisateurs/poubelle') ) {echo 'show';
        } 
        
        ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Request::is('admin/utilisateurs') ? 'active' : '' }}" href="/admin/utilisateurs" >
              <i class="bi bi-circle"></i><span>Tous les utilisateurs</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('admin/utilisateurs/create') ? 'active' : '' }}" href="{{ route('utilisateurs.create') }}" >
              <i class="bi bi-circle"></i><span>Ajouter un utilisateur</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('admin/utilisateurs/poubelle') ? 'active' : '' }}" href="{{ route('utilisateurs.poubelle') }}">
              <i class="bi bi-circle"></i><span>Poubelle</span>
            </a>
          </li>
          
          </li>
        </ul>
      </li><!-- End Utilisateurs Nav -->

      <li class="nav-item">
        <a class="nav-link 
        <?php 
        if (Request::is('admin/entreprises') || Request::is('admin/entreprises/create') || Request::is('admin/entreprises/poubelle') ) {
        } else {
          echo 'collapsed';
        }
        
        ?>
        " data-bs-target="#entrepriser-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-code-slash" ></i><span>Entreprises</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="entrepriser-nav" class="nav-content collapse <?php 
        if (Request::is('admin/entreprises') || Request::is('admin/entreprises/create') || Request::is('admin/entreprises/poubelle') ) {echo 'show';
        } 
        
        ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Request::is('admin/entreprises') ? 'active' : '' }}" href="/admin/entreprises" >
              <i class="bi bi-circle"></i><span>Tous les entreprises</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('admin/entreprises/create') ? 'active' : '' }}" href="{{ route('entreprises.create') }}" >
              <i class="bi bi-circle"></i><span>Ajouter un entreprises</span>
            </a>
          </li>
          <li>
            <a class="{{ Request::is('admin/entreprises/poubelle') ? 'active' : '' }}" href="{{ route('entreprises.poubelle') }}">
              <i class="bi bi-circle"></i><span>Poubelle</span>
            </a>
          </li>
          
          </li>
        </ul>
      </li><!-- End Entreprises Nav -->


      <li class="nav-item">
        <a class="nav-link 
        <?php 
        if (Request::is('admin/annonces') ) {
        } else {
          echo 'collapsed';
        }
        
        ?>" data-bs-target="#annonce-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Annonces</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="annonce-nav" class="nav-content collapse <?php 
        if (Request::is('admin/annonces')) {echo 'show';
        } 
        
        ?> " data-bs-parent="#sidebar-nav">
          <li>
            <a class="{{ Request::is('admin/annonces') ? 'active' : '' }}"  href="/admin/annonces">
              <i class="bi bi-circle"></i><span>Tous les annonces</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Ajouter une annonce</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Poubelle</span>
            </a>
          </li>
          
          </li>
        </ul>
      </li><!-- End Annonces Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#categorie-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid"></i><span>Catégories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="categorie-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Tous les catégories</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Ajouter une catégorie</span>
            </a>
          </li>
          
          </li>
        </ul>
      </li><!-- End category Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#autre-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-three-dots"></i><span>Autre</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="autre-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Bloquer un commentaire</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Boîte de Contacts</span>
            </a>
          </li>
          
          </li>
        </ul>
      </li><!-- End demandes Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->



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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-circle-fill"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('admin_assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{asset('admin_assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('admin_assets/js/main.js')}}"></script>

</body>

</html>