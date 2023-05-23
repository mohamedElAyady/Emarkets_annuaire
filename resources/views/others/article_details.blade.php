<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets_acceuil/img/favicon.png "rel="icon">
  <link href="assets_acceuil/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <!-- Template Main CSS File -->
  <link href="{{asset('assets_acceuil/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/annuaire/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('assets_acceuil\css\header_style.css')}}" rel="stylesheet">
  <style>
        .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comment-header {
        display: flex;
        align-items: center;
        padding: 12px;
        border-bottom: 1px solid #e9ebee;
        }

        .comment-avatar {
        width: 40px;
        height: 40px;
        background-color: #ddd;
        border-radius: 50%;
        }

        .comment-username {
        margin-left: 10px;
        }

        .comment-content {
        padding: 12px;
        }

        .comment-text {
        background-color: #f0f2f5;
        border-radius: 10px;
        padding: 10px;
        margin: 0;
        }

        .dropdown-toggle {
    color: #333;
    }

    .dropdown-toggle:hover {
        color: #555;
    }

    .dropdown-menu {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
    }

    .dropdown-item {
        color: #333;
    }

    .dropdown-item:hover {
        background-color: #e6e6e6;
        color: #555;
    }
    .dropdown-toggle::after {
    display: none;
}


  </style>
</head>

<body>
    <!-- ======= Header ======= -->
    @include('layouts.navbar')
    <!-- End #header -->
    <div class="container " style="margin-top: 102.75px;">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        <div class="content col-xs-12 col-lg-9 ">
            <div class="card mt-3" style="/*background-image: url('assets/annuaire/img/cardbackground.png'); background-size:contain; background-repeat: no-repeat; background-position: right*/ ">
                <div class="card-header " style="opacity: 0.5;">
                    <span class="skeleton" style="opacity: 0.5;"><i class="fa-solid fa-diagram-project" style="margin-right: 5px; font-size: 15px;"></i>  {{$item->secteur_activite}}  </span>
                </div>



                <div class="card-body">
                    <div class="row justify-content-center">
                            <img src="{{ asset( $item->logo_url ) }}" alt="" style="width: 200px; height: 200px;">
                    </div>
                    <h2 class="card-title skeleton">
                        <b>{{$item->raison_sociale}}</b>
                    </h2>
                    <div class="row ">
                        <div class="col-12 col-lg-6">
                            <p class="nunito skeleton" style="line-height: 2rem;" >
                                <b>Les informations</b><br>
                                <i class="fa-sharp fa-solid fa-location-dot" style="margin-right: 1rem"></i>{{$item->adresse}} <span style="color: coral">{{$item->ville}} </span>
                                <br>
                                <i class="fa-solid fa-envelope" style="margin-right: 1rem;"></i><a href="mailto:{{$item->email}}" style="color: coral">{{$item->email}}</a>
                                <br>
                                <i class="fa-solid fa-phone" style="margin-right: 1rem"></i><a href="tel:{{$item->telephone}}"  style="color: coral">{{$item->telephone}}</a>
                                
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 ">
                            <div class="nunito" style="padding-left:20px; line-height: 2rem;">
                                <b>Social media</b>
                                <br>
                                <!-- Web site -->
                                <a href="{{ $simplifiedUrls['site_web'] }}" type="button" class="btn btn-floating btn-dark btn-lg" style="font-size: 0.8rem" data-bs-toggle="tooltip" data-bs-placement="bottom" title="site_web">
                                    <i class="fas fa-globe"></i>
                                </a>
                                <!-- Facebook -->
                                <a href="{{ $simplifiedUrls['facebook'] }}" type="button" class="btn btn-floating btn-dark btn-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <!-- Instagram -->
                                <a href="{{ $simplifiedUrls['instagram'] }}" type="button" class="btn btn-floating btn-dark btn-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <!-- LinkedIn -->
                                <a href="{{ $simplifiedUrls['linkedIn'] }}" type="button" class="btn btn-floating btn-dark btn-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="linkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <!-- Other -->
                                @foreach ($simplifiedUrls as $key => $url)
                                    @if ($key != 'site_web' && $key != 'facebook' && $key != 'instagram' && $key != 'linkedIn')
                                        <a href="{{ $url }}" type="button" class="btn btn-floating btn-dark btn-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $key }}">
                                            <i class="fas fa-link"></i>
                                        </a>
                                    @endif
                                @endforeach
                            </div>                     

                            <div class="mt-3 nunito" style="padding-left:20px">
                                <b>À propos</b>
                                <p>
                                    {{$item->description}} 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <ul style="list-style: none; ">
                    <li class="nunito skeleton" style=" display: inline-block;  margin-top: 15px; margin-left: -25px">
                        <i class="fa-solid fa-comment"></i> | <span class="comments-count skeleton" >{{$counts}}</span> commentaires
                    </li>
                    <li class="nunito skeleton" style=" display: inline-block;  margin-top: 15px; margin-left: 20px">
                        <i class="fa-solid fa-eye"></i> | <span class="comments-count skeleton" >{{ \App\Models\Annonce::where('entreprise_id', $item->id)->value('vues') }}</span> vues
                    </li>
                    <li style=" display: inline-block;  margin-top: 7px; float: right;">
                        <!--<button class="button-21 nunito skeleton" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <b>Ajouter un commentaire
                            </b>
                        </button>-->
                        <button class="button-21 nunito skeleton" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <b>Ajouter un commentaire</b>
                          </button>
                    </li>
                    </ul>
                </div>
            </div>
            
            <!-- Comment Form -->
            <div class="collapse" id="collapseExample">
                <div class="card mt-3">
                    <div class="card-body">
                        <form  action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="entreprise_id" value="{{$item->id}}">
                            <div class="form-group">
                                <label for="comment">Add Comment:</label>
                                <textarea class="form-control" id="comment" name="content" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn nunito skeleton" style="background-color: #D4DFEC; margin-top: 15px; float: right;"><b>Ajouter</b></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Comments -->
            @foreach($comments as $comment)
            <div class="card mt-3">
                <div class="comment-header d-flex justify-content-between">
                    <div class="comment-username">
                        <i class="fas fa-user"></i>  <span class="skeleton">{{ $comment->utilisateur->prenom }} {{ $comment->utilisateur->nom }}  – {{ $comment->created_at->format('d F Y') }}</span>
                    </div>
                    <div class="comment-options">
                        @if ($comment->utilisateur_id == Auth::id() )
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="font-size: 1.3rem"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <button class="dropdown-item" type="button" data-bs-toggle="collapse" data-bs-target="#updatecomment" aria-expanded="false" aria-controls="updatecomment">
                                        Modifier
                                      </button></li>
                                <li>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Supprimer</button>
                                     </form>
                                </li>
                                </ul>
                            </div>
                          @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="comment-content">
                        <p class="comment-text">{{ $comment->content }}</p>
                        <div class="row collapse mt-2" id="updatecomment">
                            <form  action="{{ route('comments.update') }}" method="POST">
                                @csrf
                                <div class="col-10">
                                    <input type="hidden" name="id" value="{{ $comment->id }}">
                                    <textarea class="form-control" id="comment" name="content" rows="1" >{{ $comment->content }}</textarea>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-secondary">Enter</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
            @endforeach

        </div>
        
    </div>

    @include('layouts.footer')

    <script>
        // Get the search input element
        const searchInput = document.querySelector('#searchInput');
    
        // Get all the cards
        const cards = document.querySelectorAll('.content .card');
    
        // Add an event listener to the input element
        searchInput.addEventListener('input', function() {
        const searchValue = this.value.toLowerCase().trim();
    
        // Loop through each card and check if it matches the search criteria
        cards.forEach(card => {
            const cardTitle = card.querySelector('.card-title');
            const cardLocation = card.querySelector('.card-body p');
            const cardHeader = card.querySelector('.card-header');
    
            // Hide or show the card based on the search criteria
            card.style.display = (
            cardTitle.textContent.toLowerCase().includes(searchValue) ||
            cardLocation.textContent.toLowerCase().includes(searchValue) ||
            cardHeader.textContent.toLowerCase().includes(searchValue)
            ) ? 'block' : 'none';
        });
        });
    </script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
        <!-- Template Main JS File -->

    
    <script src="{{ asset('assets/annuaire/js/index.js') }}"></script>
    <script src="https://kit.fontawesome.com/badbb472a2.js" crossorigin="anonymous"></script>
</body>
    <!-- Initialize tooltips -->

</html>
    

