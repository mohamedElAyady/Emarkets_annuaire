@extends('admin.admin_layout')

@section('content')
<style>
 .profil_label{
    font-weight: 600;
    color: rgba(1, 41, 112, 0.6);}
</style>
<div class="pagetitle">
    <h1>Contenu du message</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Messages</a></li>
        <li class="breadcrumb-item active">Contenu du message</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  
  <section class="section dashboard">

    <div class="row">
      <div class="col-lg-12">
                 <!-- content -->
                <div class="card">
                  <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
      
                      <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Contenu du message</button>
                      </li>
      
                    </ul>
                    <div class="tab-content pt-2">
                      <div class="tab-pane fade show active profile-overview pt-3" id="profile-edit">
      
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
          
                              @if ($contact->entreprise_id != null)
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 profil_label">Expéditeur</div>
                                  <div class="col-lg-9 col-md-8">
                                    <a href="{{ route('entreprises.show', $contact->entreprise->id) }}">{{$contact->entreprise->raison_sociale}}</a>
                                  </div>
                                </div>
                              @else
                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Expéditeur</div>
                                <div class="col-lg-9 col-md-8">{{ $contact->prenom }} {{ $contact->nom }}</a></div>
                              </div>
                              @endif
                              
                              <hr style="margin-top: 1rem">                          

                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">le  </div>
                                <div class="col-lg-9 col-md-8">{{ $contact->created_at }}</div>
                              </div>
                            
                              <hr style="margin-top: 1rem">                      

                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Sujet </div>
                                <div class="col-lg-9 col-md-8">{{ $contact->sujet }}</div>
                              </div>
                            
                              <hr style="margin-top: 1rem">
   

                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Message</div>
                                <div class="col-lg-9 col-md-8">
                                    <div>{!! nl2br(strip_tags($contact->message)) !!}</div>
                                </div>
                              </div>
                            @if ($contact->image_url != null)
                              <hr style="margin-top: 1rem">
   

                              <div class="row">
                                <div class="col-lg-3 col-md-4 profil_label">Fichier</div>
                                <div class="col-lg-9 col-md-8">
                                    <a href="{{url($contact->image_url)}}" download><img src="{{asset($contact->image_url)}}" alt="" srcset="" style="width: 200px; height: 200px;"></a>
                                </div>
                              </div>
                            @endif
                            
                            


                        </div>
                        <!-- End Profile Edit Form -->
      
                      </div>
                    </div><!-- End Bordered Tabs -->
      

          </div>
        </div>

      </div>
    </div>

    </section>

@endsection