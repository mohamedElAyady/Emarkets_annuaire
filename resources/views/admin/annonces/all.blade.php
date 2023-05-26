@extends('admin.admin_layout')

@section('content')
                
<div class="pagetitle">
    <h1>Tous les annonces</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Annonce</a></li>
        <li class="breadcrumb-item active">Tous les annonces</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">Tous les annonces</h5>
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
                  <th scope="col">Date de publication</th>
                  <th scope="col">Date d'expiration</th>
                  <th scope="col">Pack</th>
                  <th scope="col">Raison Sociale</th>
                  <th scope="col">Entreprise ID</th>
                  <th scope="col">Statut</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($annonces as $annonce)
                <tr>
                    <td>{{ $annonce->id }}</td>
                    <td>{{$new_date = date("d-m-Y",strtotime($annonce->datePublication))}}</td>
                    <td>{{$new_date = date("d-m-Y",strtotime($annonce->dateExpiration))}}</td>
                    <td>{{ $annonce->entreprise->pack->name }}</td>
                    <td>{{ $annonce->entreprise->raison_sociale }}</td>
                    <td><div style="text-align: center"><a href="{{ route('entreprises.show', $annonce->entreprise_id) }}">{{ $annonce->entreprise_id }}</a></div></td>
                    <td><!-- Default switch -->
                      <div>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" role="switch" id="check" 
                          <?php if ($annonce->statut === 'active') {
                            echo 'checked';
                          }?> onclick="toggleStatus(<?php echo $annonce->id; ?>)"
                          >
                         </div>
                      </div>
                    </td>

                </tr>
                @endforeach
              </tbody>
            </table>
            
            <!-- End Table with stripped rows -->

          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    
    function toggleStatus(id) {
        var id = id;
        $.ajax({
            type: "GET",
            url: '/admin/annonces/adminChangeStatus',
            data: {
                AnnId: id
            },
            success: function(result) {
                if (result === 'active' ) {
                  Swal.fire({
                  title: "Done!",
                  text: "Annonce est active",
                  icon: "success",
                });
                } else {
                  Swal.fire({
                    title: "Done!",
                    text: "Annonce est désactivé",
                    icon: "success",
                  });
                }
            },
            error: function() {
                Swal.fire({
                  title: "Error!",
                  text: "Une erreur s'est produite",
                  icon: "error",
                });
            }
        });
    }
        

  </script>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
@endsection