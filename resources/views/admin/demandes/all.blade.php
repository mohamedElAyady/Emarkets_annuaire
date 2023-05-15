@extends('admin.admin_layout')

@section('content')
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
                  <th scope="col">Remarque</th>
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
                    <td>
                      @if (Str::length($demande->remarque) > 20)
                        {{ Str::limit($demande->remarque, 15) }}...
                      @else
                        {{ $demande->remarque }}
                      @endif
                    </td>
                    <td>{{ $demande->pack }}</td>
                    <td><a href="{{ route('entreprises.show', $demande->entreprise_id) }}">{{ $demande->entreprise_id }}</a></td>
                    <td style="color: 
                    <?php 
                      if ($demande->status === 'en attente') {
                        echo 'orange';
                      } elseif ($demande->status === 'accepté') {
                        echo 'green';
                      } elseif ($demande->status === 'rejeté') {
                        echo 'red';
                      }
                    ?>
                  " >{{ $demande->status }}</td>

                    <td>
                      @if ($demande->status === 'en attente')
                          <a href="{{ route('demandes.show', $demande->id) }}"><i class="bi bi-eye m-3" style="color: black; font-size: 20px"></i></a>
                          <a href="{{ route('demandes.accepte', $demande->id) }}"><i class="bi bi-check-lg m-3" style="color: green; font-size: 20px"></i></a>
                          <a href="{{ route('demandes.rejette', $demande->id) }}"><i class="bi bi-x-lg m-3" style="color: red; font-size: 20px;"></i></a>
                      @else
                          <a href="{{ route('demandes.show', $demande->id) }}"><i class="bi bi-eye m-3" style="color: black; font-size: 20px"></i></a>
                      @endif
                      
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

 

@endsection