@extends('layouts.layout')

@section('content')
    <div class="container " style="margin-top: 102.75px;">
        <div class="content col-xs-12 col-lg-9 datatable ">
            <div class="card mt-3" style="background-image: url('assets/annuaire/img/cardbackground.png'); background-size: contain; background-repeat: no-repeat; background-position: right;">
                <div class="card-header" style="opacity: 0.5;">
                    <span class="skeleton" style="opacity: 0.5;"><i class="fa-solid fa-diagram-project" style="margin-right: 5px; font-size: 15px;"></i>  Details </span>
                </div>

                <div class="card-body d-flex flex-wrap">
                    <div class="logo-wrapper" style="width: 25%;">
                        <img src="assets/annuaire/img/elogo.png" alt="" style="width: 50px; height: 50px; margin-right: 5px;">
                    </div>
                    <div class="info-wrapper" style="">
                        <h3 class="card-title skeleton" style="text-align: center">
                            <b>{{$info->raison_sociale}}</b>
                        </h3>
                        <div class="website-info d-flex flex-wrap">
                            <p class="nunito skeleton" style="margin-right: 198px;">
                                <i class="fa-sharp fa-solid fa-building" style=""></i>
                                {{$info->type_entreprise}}
                            </p>
                            <p class="nunito skeleton" style="margin-right: 50px;">
                                <i class="fa-sharp fa-solid fa-location-dot" style=""></i>
                                {{$info->adresse}}
                            </p>
                        </div>
                        <div class="website-info d-flex flex-wrap">
                            <p class="nunito skeleton" style="margin-right: 45px;">
                                <i class="fa-sharp fa-solid fa-envelope" style=""></i>
                                {{$info->email}}
                            </p>
                            <p class="nunito skeleton" style="">
                                <i class="fa-sharp fa-solid fa-phone-alt" style=""></i>
                                {{$info->telephone}}
                            </p>
                        </div>
                        <div class="website-info d-flex flex-wrap">
                            <p class="nunito skeleton" style=" margin-right: 225px;">
                                <i class="fa-sharp fa-brands fa-globe" style=""></i>
                                {{$info->site_web}}
                            </p>
                            <p class="nunito skeleton" >
                                <i class="fa-sharp fa-solid fa-align-left" style=""></i>
                                {{$info->description}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-transparent">
                    <ul style="list-style: none;">
                        <li class="nunito skeleton" style="display: inline-block; margin-top: 15px; margin-left: -25px;">
                            <i class="fa-solid fa-comment"></i> | <span class="comments-count skeleton">10</span> commentaire
                        </li>
                        <li style="display: inline-block; margin-top: 7px; float: right;">
                            <button class="button-21 nunito skeleton" role="button">
                                <b>ajouter un commentaire</b>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Comment Form -->
            <div class="card mt-3" style="display: none;" id="commentForm">
                <div class="card-body">
                    <form  action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Add Comment:</label>
                            <textarea class="form-control" id="comment" name="content" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #f9b044; margin-top: 15px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get the button and comment form elements
        var commentButton = document.querySelector('.button-21');
        var commentForm = document.querySelector('#commentForm');

        // Add event listener to the button
        commentButton.addEventListener('click', function () {
            commentForm.style.display = 'block'; // Show the comment form
        });
    </script>
@endsection
