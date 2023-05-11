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
                <h5 class="card-title">Tous les utilisateurs</h5>
              @if ($message = Session::get('success'))
                <div class="alert alert-primary" role="alert">
                    {{$message}}
                </div>
              @endif
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom complet</th>
                  <th scope="col">Adresse e-mail</th>
                  <th scope="col">Téléphone</th>
                  <th scope="col">ville</th>
                  <th scope="col">Zip</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($utilisateurs as $item)
                <tr>
                  <th scope="row">{{$item->id}}</th>
                  <td>{{$item->prenom}} {{$item->nom}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->telephone}}</td>
                  <td>{{$item->ville}}</td>
                  <td>{{$item->zip}}</td>
                  <td>
                    <a href="{{route('utilisateurs.show',$item->id)}}"><i class="bi bi-eye m-3" style="color: black; font-size: 20px"></i></a>
                    <a href="{{route('utilisateurs.edit',$item->id)}}"><i class="bi bi-pencil-square m-3" style="color: black; font-size: 20px"></i></a>
                    <a href="{{route('utilisateurs.softdelete',$item->id )}}"><i class="bi bi-trash m-3" style="color: black; font-size: 20px"></i></a>
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