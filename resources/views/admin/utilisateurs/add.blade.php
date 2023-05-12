@extends('admin.admin_layout')

@section('content')
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

        <div class="card">
          <div class="card-body">
                <h5 class="card-title">Ajouter un utilisateur</h5>
            
                 <!-- No Labels Form -->
              <form class="row g-3" action="{{route('utilisateurs.store')}}" method="POST">
                @csrf
                <div class="col-md-6">
                  <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control"  name="nom" placeholder="Nom">
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control"  name="email" placeholder="Email">
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control"  name="password" placeholder="Password">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control"  name="telephone" placeholder="Numéro téléphone">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control"  name="ville" placeholder="Ville">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control"  name="zip" placeholder="Zip">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End No Labels Form -->

          </div>
        </div>

      </div>
    </div>

    </section>

@endsection