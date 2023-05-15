@extends('admin.admin_layout')

@section('content')
<style>
 .profil_label{
    font-weight: 600;
    color: rgba(1, 41, 112, 0.6);}
</style>
<div class="pagetitle">
    <h1>informations de l'entreprise</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">entreprises</a></li>
        <li class="breadcrumb-item active">informations de l'entreprise</li>
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
      
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Profile Edit Form -->
                        <form class="row g-3" method="POST" action="{{ route('entreprises.update', $entreprise->id) }}" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="text-center">
                            <img src="{{ $entreprise->logo_url }}" alt="Logo" class="img-fluid">
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="raison_sociale" placeholder="Raison sociale" value="{{ $entreprise->raison_sociale }}">
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="type_entreprise" placeholder="Type d'entreprise" value="{{ $entreprise->type_entreprise }}">
                          </div>
                          <div class="col-md-6">
                            <textarea class="form-control" name="description" placeholder="Description">{{ $entreprise->description }}</textarea>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="ville" placeholder="Ville" value="{{ $entreprise->ville }}">
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="adresse" placeholder="Adresse" value="{{ $entreprise->adresse }}">
                          </div>
                          <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $entreprise->email }}">
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="telephone" placeholder="Numéro de téléphone" value="{{ $entreprise->telephone }}">
                          </div>
                          <div class="col-md-6">
                            <input type="file" class="form-control" name="logo_url">
                          </div>
                          <div class="col-md-6">
                            <input type="number" class="form-control" name="utilisateur_id" placeholder="ID de l'utilisateur" value="{{ $entreprise->utilisateur_id }}">
                          </div>
                          <div class="col-md-6">
                            <input type="url" class="form-control" name="site_web" placeholder="Site Web" value="{{ $entreprise->site_web }}">
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="secteur_activite" placeholder="Secteur d'activité" value="{{ $entreprise->secteur_activite }}">
                          </div>
                        
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                          </div>
                        </form>
                        <!-- End Profile Edit Form -->
      
                      </div>


                      <div class="tab-pane fade pt-3" id="profile-change-password">
                        <!-- Change Password Form -->
                        <form class="row g-3" method="POST" action="{{ route('entreprises.changePassword', $entreprise->id) }}">
                          @csrf
                          @method('POST')
                          <div class="col-md-6">
                            <input type="password" class="form-control" name="currentpassword" placeholder="Mot de passe actuel">
                          </div>
                          <div class="col-md-6">
                            <input type="password" class="form-control"  name="newpassword" placeholder="nouveau mot de passe">
                          </div>
                          <div class="col-md-6">
                            <input type="password" class="form-control"  name="repeatpassword" placeholder="Ré-entrez le nouveau mot de passe">
                          </div>
                          
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Enregistre</button>
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