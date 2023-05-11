@extends('admin.admin_layout')

@section('content')
<style>
 .profil_label{
    font-weight: 600;
    color: rgba(1, 41, 112, 0.6);}
</style>
<div class="pagetitle">
    <h1>Tous les utilisateurs</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Tous les utilisateurs</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  
  <section class="section dashboard">

    <div class="row">
      <div class="col-lg-12">
                 <!-- content -->
                <div class="card">
                  <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
      
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer le profil</button>
                      </li>
      
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer le mot de passe</button>
                      </li>
      
                    </ul>
                    <div class="tab-content pt-2">
                      <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
      
                        <!-- Profile Edit Form -->
                        <form action="{{ route('utilisateurs.update', $utilisateur->id)}}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-lg-3 col-form-label">Prenom</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="prenom" type="text" class="form-control" id="prenom" value="{{$utilisateur->prenom}}">
                            </div>
                          </div>
                          
                          <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-lg-3 col-form-label">nom</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="nom" type="text" class="form-control" id="nom" value="{{$utilisateur->nom}}">
                            </div>
                          </div>
                          
                          <div class="row mb-3">
                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="email" type="text" class="form-control" id="email" value="{{$utilisateur->email}}">
                            </div>
                          </div>
                          
                          <div class="row mb-3">
                            <label for="telephone" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="telephone" type="text" class="form-control" id="telephone" value="{{$utilisateur->telephone}}">
                            </div>
                          </div>
                          
                          <div class="row mb-3">
                            <label for="ville" class="col-md-4 col-lg-3 col-form-label">Ville</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="ville" type="text" class="form-control" id="ville" value="{{$utilisateur->ville}}">
                            </div>
                          </div>
                          
                          <div class="row mb-3">
                            <label for="zip" class="col-md-4 col-lg-3 col-form-label">Zip</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="zip" type="text" class="form-control" id="zip" value="{{$utilisateur->zip}}">
                            </div>
                          </div>
      
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Enregistre</button>
                          </div>
                        </form><!-- End Profile Edit Form -->
      
                      </div>


                      <div class="tab-pane fade pt-3" id="profile-change-password">
                        <!-- Change Password Form -->
                        <form>
      
                          <div class="row mb-3">
                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="password" type="text" class="form-control" id="currentPassword" value="{{$utilisateur->password}}">
                            </div>
                          </div>
      
                          <div class="row mb-3">
                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">nouveau mot de passe</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="newpassword" type="password" class="form-control" id="newPassword">
                            </div>
                          </div>
      
                          <div class="row mb-3">
                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Ré-entrez le nouveau mot de passe</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                            </div>
                          </div>
      
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                          </div>
                        </form><!-- End Change Password Form -->
      
                      </div>
      
                    </div><!-- End Bordered Tabs -->
      

          </div>
        </div>

      </div>
    </div>

    </section>

@endsection