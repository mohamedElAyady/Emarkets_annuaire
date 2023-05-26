@extends('entreprise.entreprise_layout')

@section('content')
<div class="pagetitle">
    <h1>Support technique</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  
  <section class="section dashboard">


        <div class="card">
          <div class="card-body">
              <h5 class="card-title">Contacter le support</h5>
            
            <!-- No Labels Form -->
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
            <div class="row">
              <select name="type_de_demande" id="type_de_demande" class="form-control">
                <option value="signaler_un_problème">Signaler un problème</option>
                <option value="update_information">Mettre à jour les informations</option>
                <option value="change_logo">Changer le logo</option>
                <!-- Add more options as needed -->
              </select>
            </div>
            <form class="row mt-4" action="{{route('entreprises.supportContact')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <input type="text" class="form-control" name="sujet" placeholder="Sujet" required>
              </div>
              <div class="row">
                <textarea class="form-control mt-4" name="message" id="content" cols="30" rows="10" required></textarea>
              </div>
              <div class="row mt-4">
                <input type="file" class="form-control" name="image" accept="image/*">
              </div>
              <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Envoyer</button>
                <button type="reset" class="btn btn-secondary">Réinitialiser</button>
              </div>
            </form><!-- End No Labels Form -->

           
            

          </div>
        </div>



    </section>
    <script>
      // Event listener for mail type select change
      document.getElementById('type_de_demande').addEventListener('change', function() {
        var contentTextarea = document.getElementById('content');
        var selectedMailType = this.value;

        // Set the content based on the selected mail type
        switch (selectedMailType) {
          case 'signaler_un_problème':
            contentTextarea.value = "";
            break;
          case 'change_logo':
            contentTextarea.value = "Bonjour,\n\nJe souhaite changer le logo de mon entreprise.\n\nCordialement,";
            break;
          case 'update_information':
            contentTextarea.value = "Bonjour,\n\nJe souhaite mettre à jour [champ] de mon entreprise.\n\nAncien : \n\nNouvelle : \n\nCordialement,";
            break;
          // Add more cases and corresponding mail content as needed
          default:
            contentTextarea.value = ""; // Clear the textarea if no mail type is selected
            break;
        }
      });
    </script>

@endsection