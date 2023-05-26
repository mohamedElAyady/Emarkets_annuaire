@extends('admin.admin_layout')

@section('content')
<div class="pagetitle">
    <h1>Tous les entreprises</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Entreprise</a></li>
        <li class="breadcrumb-item active">Tous les entreprises</li>
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
                  <th scope="col">Raison sociale</th>
                  <th scope="col">Ville</th>
                  <th scope="col">Email</th>
                  <th scope="col">Téléphone</th>
                  <th scope="col">Utilisateur ID</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($entreprises as $item)
                <tr>
                  <th scope="row">{{ $item->id }}</th>
                  <td>{{ $item->raison_sociale }}</td>
                  <td>{{ $item->ville }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->telephone }}</td>
                  <td><a href="{{ route('utilisateurs.show', $item->utilisateur_id) }}">{{ $item->utilisateur_id }}</a></td>
                  <td>
                    <a href="{{ route('entreprises.show', $item->id) }}"><i class="bi bi-eye m-3" style="color: black; font-size: 20px"></i></a>
                    <a href="{{ route('entreprises.edit', $item->id) }}"><i class="bi bi-pencil-square m-3" style="color: black; font-size: 20px"></i></a>
                    <a href="{{ route('entreprises.softdelete', $item->id) }}"><i class="bi bi-trash m-3" style="color: black; font-size: 20px"></i></a>
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