@extends('entreprise.entreprise_layout')

@section('content')
<div class="pagetitle">
    <h1>Tableau de board</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  
  <section class="section dashboard">

    
    <div class="row">
      <div class="col-xxl-4 col-md-4">
        <div class="card info-card sales-card">

          <div class="card-body">
            <h5 class="card-title">Clicks</h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-globe-europe-africa"></i>
              </div>
              <div class="ps-3">
                <h6>24</h6>
                <span class="text-success small pt-1 fw-bold">+5</span> <span class="text-muted small pt-2 ps-1">increase</span>

              </div>
            </div>
          </div>

        </div>
      </div>
      
      
      <div class="col-xxl-4 col-md-4">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Visiteurs</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6>
                  64
                </h6>
                <span class="text-success small pt-1 fw-bold">+22</span>
                <span class="text-muted small pt-2 ps-1">increase</span>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
      
      <div class="col-xxl-4 col-md-4">
        <div class="card info-card sales-card">

          <div class="card-body">
            <h5 class="card-title">commantaires</h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-book"></i>
              </div>
              <div class="ps-3">
                <h6>10</h6>
                <span class="text-success small pt-1 fw-bold">+1</span> <span class="text-muted small pt-2 ps-1">Ajouter il y a 2 heures</span>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


    </section>

@endsection