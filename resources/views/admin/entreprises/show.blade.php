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
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                      </li>
                    </ul>
                    <div class="tab-content pt-2">
                      <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title" style="color: #51678f;">Détails de l'entreprise</h5>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row">
                          <div class="text-center">
                            <img src="{{ asset($entreprise->logo_url) }}" alt="Logo" class="img-fluid">
                          </div>
                          

                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Raison sociale</div>
                                <div class="col-lg-9 col-md-8">{{ $entreprise->raison_sociale }}</div>
                              </div>
                            
                              <hr style="margin-top: 1rem">

                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Type d'entreprise</div>
                                <div class="col-lg-9 col-md-8">{{ $entreprise->type_entreprise }}</div>
                              </div>

                              <hr style="margin-top: 1rem">
                            
                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Description</div>
                                <div class="col-lg-9 col-md-8">{{ $entreprise->description }}</div>
                              </div>

                              <hr style="margin-top: 1rem">
                            
                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Ville</div>
                                <div class="col-lg-9 col-md-8">{{ $entreprise->ville }}</div>
                              </div>

                              <hr style="margin-top: 1rem">
                            
                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Adresse</div>
                                <div class="col-lg-9 col-md-8">{{ $entreprise->adresse }}</div>
                              </div>

                              <hr style="margin-top: 1rem">
                            
                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ $entreprise->email }}</div>
                              </div>

                              <hr style="margin-top: 1rem">
                            
                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Téléphone</div>
                                <div class="col-lg-9 col-md-8">{{ $entreprise->telephone }}</div>
                              </div>

                              <hr style="margin-top: 1rem">
                            
                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Utilisateur ID</div>
                                <div class="col-lg-9 col-md-8"><a href="{{ route('utilisateurs.show', $entreprise->utilisateur_id) }}">{{ $entreprise->utilisateur_id }}</a></div>
                              </div>

                              <hr style="margin-top: 1rem">
                            
                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Site web</div>
                                <div class="col-lg-9 col-md-8">{{ $entreprise->site_web }}</div>
                              </div>

                              <hr style="margin-top: 1rem">
                            
                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Secteur d'activité</div>
                                <div class="col-lg-9 col-md-8">{{ $entreprise->secteur_activite }}</div>
                              </div>
                              
                              
                        </div>
                      </div>
                    </div><!-- End Bordered Tabs -->
                </div>
          </div>
        </div>
  </section>

@endsection