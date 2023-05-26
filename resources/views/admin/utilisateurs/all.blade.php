@extends('admin.admin_layout')

@section('content')
<div class="pagetitle">
    <h1>Tous les utilisateurs</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Utlisateurs</a></li>
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
                  <th scope="col">Ville</th>
                  <th scope="col">User Type</th>
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
                  <td>
                    <select class="form-control usertype-select" data-userid="{{$item->id}}">
                      <option value="0" {{$item->usertype == 0 ? 'selected' : ''}}>User</option>
                      <option value="1" {{$item->usertype == 1 ? 'selected' : ''}}>Entreprise</option>
                      <option value="2" {{$item->usertype == 2 ? 'selected' : ''}}>Admin</option>
                    </select>
                  </td>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Set the CSRF token in the header for all AJAX requests
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  
      // Event listener for user type select change
      $('.usertype-select').change(function() {
        var userId = $(this).data('userid');
        var userType = $(this).val();
  
        // Send an AJAX request to update the user type
        $.ajax({
          url: '/update-usertype',
          method: 'POST',
          data: {
            user_id: userId,
            user_type: userType
          },
          success: function(response) {
            console.log(response);
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      });
    });
  </script>
  
@endsection