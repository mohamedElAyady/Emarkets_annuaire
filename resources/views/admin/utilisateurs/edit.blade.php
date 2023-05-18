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
                        <button class="nav-link  active" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer le profil</button>
                      </li>
      
                    </ul>
                    <div class="tab-content pt-2">
                      <div class="tab-pane fade show active profile-overview pt-3" id="profile-edit">
      

                        <!-- Profile Edit Form -->
                        <form class="row g-3" method="POST" action="{{ route('utilisateurs.updateUser', $utilisateur->id) }}">
                          @csrf
                          @method('POST')
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="prenom" placeholder="Prenom" value="{{$utilisateur->prenom}}">
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control"  name="nom" placeholder="Nom" value="{{$utilisateur->nom}}">
                          </div>
                          <div class="col-md-6">
                            <input type="email" class="form-control"  name="email" placeholder="Email" value="{{$utilisateur->email}}">
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control"  name="telephone" placeholder="Numéro téléphone" value="{{$utilisateur->telephone}}">
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control"  name="ville" placeholder="Ville" value="{{$utilisateur->ville}}">
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control"  name="zip" placeholder="Zip" value="{{$utilisateur->zip}}">
                          </div>
      
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Enregistre</button>
                          </div>
                        </form><!-- End Profile Edit Form -->
      
                      </div>
      
                    </div><!-- End Bordered Tabs -->
      

          </div>
        </div>

      </div>
    </div>

    </section>

@endsection