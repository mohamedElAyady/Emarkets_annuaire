@extends('admin.admin_layout')

@section('content')
<div class="pagetitle">
    <h1>Tous les entreprises</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Boite de contacts</a></li>
        <li class="breadcrumb-item active">Tous les messages</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">Tous les messages</h5>
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
                  <th scope="col">Expéditeur</th>
                  <th scope="col">Date</th>
                  <th scope="col">Email</th>
                  <th scope="col">Vue</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($contacts as $item)
                <tr >
                  <th scope="row">{{ $item->id }}</th>
                  <td>{{ $item->prenom }} {{ $item->nom }}</td>
                  <td>{{ \Carbon\Carbon::parse($item->created_at)->locale('fr')->diffForHumans() }}</td>
                  <td>{{ $item->email }}</td>
                  <td><?php
                  if ($item->seen==='1')echo '<i class="bi bi-check2-all" style="color:deepskyblue; font-size:20px;"></i>';
                  else echo '<i class="bi bi-check2" style="font-size:20px;"></i>';
                   ?></td>
                  <td>
                    <a href="{{ route('contact.show', $item->id) }}"><i class="bi bi-eye m-3" style="color: black; font-size: 20px"></i></a>
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