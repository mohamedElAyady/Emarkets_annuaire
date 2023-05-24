@extends('admin.admin_layout')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<div class="pagetitle">
    <h1>Demandes d'inscription</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Demandes d'inscription</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">Tous les entreprises</h5>
              @if ($message = Session::get('success'))
                <div class="alert alert-primary" role="alert">
                    {{$message}}
                </div>
              @endif
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Date de création</th>
                  <th scope="col">Raison Social</th>
                  <th scope="col">Pack</th>
                  <th scope="col">Entreprise ID</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($demandes as $demande)
                <tr>
                    <td>{{ $demande->id }}</td>
                    <td>{{$new_date = date("d-m-Y",strtotime($demande->date_creation))}}</td>
                    <td>{{ $demande->entreprise->raison_sociale }}
                    </td>
                    <td>{{ $demande->pack->name }}</td>
                    <td><a href="{{ route('entreprises.show', $demande->entreprise_id) }}">{{ $demande->entreprise_id }}</a></td>
                    <td><span  class="badge" style="background-color : <?php
                      if ($demande->status === 'en attente') {
                        echo 'orange';
                      } elseif ($demande->status === 'accepté') {
                        echo 'green';
                      } elseif ($demande->status === 'rejeté') {
                        echo 'red';
                      }?>">{{ $demande->status }}</span></td>

                    <td><div style="text-align: center">
                      @if ($demande->status === 'en attente')
                          <a href="{{ route('demandes.show', $demande->id) }}"><i class="bi bi-eye m-3" style="color: black; font-size: 20px"></i></a>
                          <a href="{{ route('demandes.accepte', $demande->id) }}"><i class="bi bi-check-lg m-3" style="color: green; font-size: 20px"></i></a>
                          <a href="#" class="reject-link" data-demande-id="{{ $demande->id }}">
                            <i class="bi bi-x-lg m-3" style="color: red; font-size: 20px;"></i>
                          </a>
                          @else
                          <a href="{{ route('demandes.show', $demande->id) }}"><i class="bi bi-eye m-3" style="color: black; font-size: 20px"></i></a>
                      @endif
                      </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <form id="motif_form" action="#" method="POST" style="display: none;">
              @csrf
              <div class="row">
                <div class="col-2"><b>Motif de refus:</b></div>
                <div class="col-9"><input type="text" name="motif" class="form-control"></div>
                <button class="col-1" type="submit" style="background: none; border: none;">
                  <i class="bi bi-plus-circle m-3" style="color: black; font-size: 25px;"></i>
                </button>
              </div>
            </form>
            
            
            <!-- End Table with stripped rows -->

          </div>
        </div>
      </div>
    </div>
  </section>
  

  <script>
    $(document).ready(function() {
      $('.reject-link').click(function(e) {
        e.preventDefault();
        var demandeId = $(this).data('demande-id');
        var form = $('#motif_form');
    
        // Update the form action URL with the demande ID
        form.attr('action', "{{ route('demandes.rejette', '') }}" + '/' + demandeId);
    
        form.slideToggle();
      });
    });
    </script>
    

@endsection