@extends('admin.admin_layout')

@section('content')
<style>
 .profil_label{
    font-weight: 600;
    color: rgba(1, 41, 112, 0.6);}
</style>
<div class="pagetitle">
    <h1>informations de l'utilisateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Utilisateurs</a></li>
        <li class="breadcrumb-item active">informations de l'utilisateur</li>
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
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                      </li>
      
                    </ul>
                    <div class="tab-content pt-2">
      
                      <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title" style="color: #51678f;">Détails du profil</h5>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 profil_label ">Nom complet</div>
                          <div class="col-lg-9 col-md-8">{{$utilisateur->prenom}} {{$utilisateur->nom}}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 profil_label">Adresse email</div>
                          <div class="col-lg-9 col-md-8">{{$utilisateur->email}}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 profil_label">Téléphone</div>
                          <div class="col-lg-9 col-md-8">{{$utilisateur->telephone}}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 profil_label">Ville</div>
                          <div class="col-lg-9 col-md-8">{{$utilisateur->ville}}</div>
                        </div>
      
                        <div class="row">
                          <div class="col-lg-3 col-md-4 profil_label">Zip</div>
                          <div class="col-lg-9 col-md-8">{{$utilisateur->zip}}</div>
                        </div>
                      </div>
      
                      </div>
      
                    </div><!-- End Bordered Tabs -->
      

          </div>
        </div>

      </div>
    </div>

    </section>

@endsection