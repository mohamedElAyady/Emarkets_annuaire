@extends('admin.admin_layout')

@section('content')
  <style>
    .profil_label{
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);}
  </style>
  <div class="pagetitle">
    <h1>Détails de la demande</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">demandes</a></li>
        <li class="breadcrumb-item active">Détails de la demande</li>
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
                        <h5 class="card-title" style="color: #51678f;">Détails de la demande</h5>
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
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 profil_label">Date de création</div>
                                  <div class="col-lg-9 col-md-8">{{ $demande->date_creation }}</div>
                                </div>
                              
                                <hr style="margin-top: 1rem">
                              
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 profil_label">Remarque</div>
                                  <div class="col-lg-9 col-md-8">{{ $demande->remarque }}</div>
                                </div>
                              
                                <hr style="margin-top: 1rem">
                              
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 profil_label">Pack</div>
                                  <div class="col-lg-9 col-md-8">{{ $demande->pack }}</div>
                                </div>
                              
                                <hr style="margin-top: 1rem">

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 profil_label">Entreprise ID</div>
                                  <div class="col-lg-9 col-md-8"><a href="{{ route('entreprises.show', $demande->entreprise_id) }}">{{ $demande->entreprise_id }}</a></div>
                                </div>

                                <hr style="margin-top: 1rem">
                              
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 profil_label">Status</div>
                                  <div class="col-lg-6 col-md-8"style="color: 
                                    <?php 
                                      if ($demande->status === 'en attente') {
                                        echo 'orange';
                                      } elseif ($demande->status === 'accepté') {
                                        echo 'green';
                                      } elseif ($demande->status === 'rejeté') {
                                        echo 'red';
                                      }
                                      ?>
                                    " >{{ $demande->status }}
                                  </div>
                                  <div class="col-3  d-flex justify-content-end">
                                    @if ($demande->status === 'en attente')
                                        <a href="{{ route('demandes.accepte', $demande->id) }}"><i class="bi bi-check-lg m-3" style="color: green; font-size: 20px"></i></a>
                                        <a href="{{ route('demandes.rejette', $demande->id) }}"><i class="bi bi-x-lg m-3" style="color: red; font-size: 20px;"></i></a>
                                    @endif
                                  </div>
                                
                                </div>
                              </div>
                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
          </div>
        </div>
  </section>

@endsection