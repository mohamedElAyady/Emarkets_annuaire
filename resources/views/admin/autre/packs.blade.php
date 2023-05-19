@extends('admin.admin_layout')

@section('content')
<div class="pagetitle">
    <h1>Les packs</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Autre</a></li>
        <li class="breadcrumb-item active">Les packs</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">Les packs</h5>
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
                  <th scope="col">Nom</th>
                  <th scope="col">Durée(jrs)</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($packs as $item)
                <tr >
                  <th scope="row">{{ $item->id }}</th>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->duree }}</td>
                  <td>{{ $item->prix }}</td>
                  <td>
                    <a href="{{ route('contact.show', $item->id) }}"><i class="bi bi-eye m-3" style="color: black; font-size: 20px"></i></a>
                  </td>
                
                </tr>
                @endforeach
                
              </tbody>
            </table>
            
            <form action="{{route('admin.pack.storeData')}}" method="POST" >
              @csrf
              <div class="row">
              <div class="col-2"><b>Ajouter un pack</b></div>
              <div class="col-2"><input type="text" name="id" class="form-control"></div>
              <div class="col-2"><input type="text" name="name" class="form-control"></div>
              <div class="col-2"><input type="text" name="duree" class="form-control"></div>
              <div class="col-2"><input type="text" name="prix" class="form-control "></div>
              
                <button class="col-1" type="submit" style="background: none; border: none;"><i class="bi bi-plus-circle m-3" style="color: black; font-size:25px"></i></button>
              
            </div>
              </form>
            
            <!-- End Table with stripped rows -->

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection