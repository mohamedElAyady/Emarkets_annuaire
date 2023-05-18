@extends('admin.admin_layout')

@section('content')
<div class="pagetitle">
    <h1>Tous les entreprises</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Tous les entreprises</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  
  <section class="section dashboard">

    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
                <h5 class="card-title">Ajouter un entreprise</h5>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                 <!-- No Labels Form -->
                 <form class="row g-3" action="{{route('entreprises.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="raison_sociale" placeholder="Raison sociale">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="type_entreprise" placeholder="Type d'entreprise">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="ville" placeholder="Ville">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                  </div>
                  <div class="col-md-6">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="telephone" placeholder="Numéro téléphone">
                  </div>
                  <div class="col-md-6">
                    <input type="file" class="form-control" name="logo_url" accept="image/*">
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control" name="utilisateur_id" placeholder="ID de l'utilisateur">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="site_web" placeholder="Site web">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="secteur_activite" placeholder="Secteur d'activité">
                  </div>
                  <div class="col-md-6">
                    <textarea class="form-control" name="description" placeholder="Description"></textarea>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </form>
                <!-- End No Labels Form -->

          </div>
        </div>

      </div>
    </div>

    </section>

@endsection