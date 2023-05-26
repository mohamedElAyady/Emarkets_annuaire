@extends('entreprise.entreprise_layout')

@section('content')
<style>
  .social_icons{
    font-size: 20px;
    margin-right: 10px;
    color : #023e8a;
  }  
  .social_icons:hover{
    font-size: 25px;
    margin-right: 12px;
  }
</style>
<div class="pagetitle">
    <h1>Annonce</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Annonce</a></li>
        <li class="breadcrumb-item active">Annonce</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="alert alert-info">
        Si vous souhaitez mettre à jour des informations, veuillez faire une demande sur la page de support.
    </div>
      
    <div class="content col-xs-12 col-lg-12 ">
        <div class="card mt-3" style="/*background-image: url('assets/annuaire/img/cardbackground.png'); background-size:contain; background-repeat: no-repeat; background-position: right*/ ">
          
          <div class="card-header">
              <div class=" hstack gap-3">
                <span class="skeleton  me-auto" style="opacity: 0.5;"><i class="fa-solid fa-diagram-project" style="margin-right: 5px; font-size: 15px;"></i>  {{$item->secteur_activite}}  </span>
                <div class="vr"></div>
                @php
                 use App\Models\Annonce;
                  $statut = Annonce::where('entreprise_id', $item->id)->value('statut');   
                @endphp 
                @if ($statut === "active")
                    <form action="{{ route('entreprise.annonce.toggleStatut') }}" method="POST" style="margin-bottom: 0px;">
                    @csrf
                        <input type="hidden" name="entreprise_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-outline-danger">Désactiver</button>
                    </form>
                @elseif($statut === "désactivé")
                    <form action="{{ route('entreprise.annonce.toggleStatut') }}" method="POST" style="margin-bottom: 0px;">
                    @csrf
                        <input type="hidden" name="entreprise_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-outline-success">Activer</button>
                    </form>
                @endif
                  
                </form>


              </div>  
          </div>



            <div class="card-body">
                <div class="row justify-content-center">
                        <img src="{{ asset( $item->logo_url ) }}" alt="" style="width: 200px; height: 200px;">
                </div>
                <h2 class="card-title skeleton" style="font-size: calc(1.325rem + .9vw);">
                    <b>{{$item->raison_sociale}}</b>
                </h2>
                <div class="row ">
                    <div class="col-12 col-lg-6">
                        <p class="nunito skeleton" style="line-height: 2rem; line-height: 2rem;" >
                          <b>Les informations</b><br>
                            <i class="fa-sharp fa-solid fa-location-dot" style="margin-right: 1rem"></i>{{$item->adresse}} <span style="color: coral">{{$item->ville}} </span>
                            <br>
                            <i class="fa-solid fa-envelope" style="margin-right: 1rem;"></i><a href="mailto:{{$item->email}}" style="color: coral">{{$item->email}}</a>
                            <br>
                            <i class="fa-solid fa-phone" style="margin-right: 1rem"></i><a href="tel:{{$item->telephone}}"  style="color: coral">{{$item->telephone}}</a>
                            
                        </p>
                    </div>
                    <div class="col-12 col-lg-6 ">
                        <div class="nunito" style="padding-left:20px">
                            <b>Social media</b>
                            <br>
                            <!-- Web site -->
                            <a href="{{ $simplifiedUrls['site_web'] }}" type="button" class="social_icons " data-bs-toggle="tooltip" data-bs-placement="bottom" title="site_web">
                                <i class="fas fa-globe"></i>
                            </a>
                            <!-- Facebook -->
                            <a href="{{ $simplifiedUrls['facebook'] }}" type="button" class="social_icons " data-bs-toggle="tooltip" data-bs-placement="bottom" title="facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <!-- Instagram -->
                            <a href="{{ $simplifiedUrls['instagram'] }}" type="button" class="social_icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <!-- LinkedIn -->
                            <a href="{{ $simplifiedUrls['linkedIn'] }}" type="button" class="social_icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="linkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <!-- Other -->
                            @foreach ($simplifiedUrls as $key => $url)
                                @if ($key != 'site_web' && $key != 'facebook' && $key != 'instagram' && $key != 'linkedIn')
                                    <a href="{{ $url }}" type="button" class="social_icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $key }}">
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
                <li class="nunito skeleton" style=" display: inline-block;  margin-top: 15px; margin-left: -25px; color: #000000">
                    <i class="fa-solid fa-comment"></i> | <span class="comments-count skeleton" >{{$counts}}</span> commentaires
                </li>
                <li class="nunito skeleton" style=" display: inline-block;  margin-top: 15px; margin-left: 20px; color: #000000">
                    <i class="fa-solid fa-eye"></i> | <span class="comments-count skeleton" >{{ \App\Models\Annonce::where('entreprise_id', $item->id)->value('vues') }}</span> vues
                </li>
                </ul>
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
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v" style="font-size: 1.3rem"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                           
                            <li>
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="margin-bottom: 0px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" style="padding-top: 0px;padding-bottom: 0px;">Supprimer</button>
                                 </form>
                            </li>
                            </ul>
                        </div>
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

</section>


@endsection

