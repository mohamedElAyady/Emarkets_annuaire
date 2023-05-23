@extends('entreprise.entreprise_layout')

@section('content')

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="{{asset(Auth::user()->profile_photo_path)}}" alt="Profile" class="rounded-circle">
          <h2>{{Auth::user()->prenom}} {{Auth::user()->nom}}</h2>
        </div>
      </div>

    </div>

    <div class="col-xl-8">
      @if ($message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
            {{$message}}
        </div>
      @endif
      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              
              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Nom et Prénom</div>
                <div class="col-lg-9 col-md-8">{{Auth::user()->prenom}} {{Auth::user()->nom}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Ville</div>
                <div class="col-lg-9 col-md-8">{{Auth::user()->ville}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Telephone</div>
                <div class="col-lg-9 col-md-8">{{Auth::user()->telephone}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Zip</div>
                <div class="col-lg-9 col-md-8">{{Auth::user()->zip}}</div>
              </div>


            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
              
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img id="profileImage" src="assets/img/profile-img.jpg" alt="Profile">
                    <div class="pt-2">
                      <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" onclick="document.getElementById('fileInput').click(); return false;">
                        <i class="bi bi-upload"></i>
                      </a>
                      <input type="file" id="fileInput" name="profile_image" class="form-control" style="display: none;" onchange="showImagePreview(event)">
                    </div>
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="prenom" class="col-md-4 col-lg-3 col-form-label">Prenom</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="prenom" type="text" class="form-control" id="prenom" value="{{ Auth::user()->prenom }}">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="nom" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="nom" type="text" class="form-control" id="nom" value="{{ Auth::user()->nom }}">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="ville" class="col-md-4 col-lg-3 col-form-label">Ville</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="ville" type="text" class="form-control" id="ville" value="{{ Auth::user()->ville }}">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="telephone" class="col-md-4 col-lg-3 col-form-label">Telephone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="telephone" type="text" class="form-control" id="telephone" value="{{ Auth::user()->telephone }}">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="zip" class="col-md-4 col-lg-3 col-form-label">Zip</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="zip" type="text" class="form-control" id="zip" value="{{ Auth::user()->zip }}">
                  </div>
                </div>
              
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
              <!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">

              <!-- Settings Form -->
              <form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Information on new products and services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Marketing and promo offers
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                      <label class="form-check-label" for="securityNotify">
                        Security alerts
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </form><!-- End settings Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form action="{{ route('changePassword') }}" method="POST">
                @csrf
                
                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="current_password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="new_password" type="password" class="form-control" id="newPassword">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="new_password_confirmation" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>
              
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form>
              <!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>
<script>
  function showImagePreview(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      document.getElementById('profileImage').src = e.target.result;
    }

    reader.readAsDataURL(file);
  }
</script>
@endsection