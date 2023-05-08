@extends('layouts.layout')

@section('content')

    <div class="container" style="margin-top: 102.75px;">
        <div class="row">
            <div class="col-xs-12 col-lg-3 ">
                <div>
                    <div class="row">
                        <div class="col-12" style="opacity: 0.5; margin-bottom: 5px;">
                            <i class="fa-solid fa-filter" style="margin-right:5px"></i>Filter
                        </div>
                    </div>
                    <form action="">
                        <div class="row" style="margin-bottom: 10px">
                                   <input type="text" class="form-control" placeholder="label">
                        </div>
                        <div class="row" style="margin-bottom: 10px">
                                   <input type="text" class="form-control" placeholder="Ville">  
                        </div>
                        <div class="row" style="margin-bottom: 10px">
                            <select class="form-select" aria-label="Default select example" style="color: #495057;">
                                <option selected>Tout les sécteurs</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="row" style="margin-bottom: 10px">
                            <input type="text" class="form-control" placeholder="Ville">
                        </div>
                        <input type="submit" class="btn btn-success" value="Trouver">
                    </form>
                </div>
            </div>


            <div class="content col-xs-12 col-lg-9 " style="float: right">
                
                <div class="card mt-3" style="background-image: url('assets/img/cardbackground.png'); background-size:contain; background-repeat: no-repeat; background-position: right ">
                    <div class="card-header " style="opacity: 0.5;">
                       <span class="skeleton" style="opacity: 0.5;"><i class="fa-solid fa-diagram-project" style="margin-right: 5px; font-size: 15px;"></i>
                        secteur d'activité</span>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title skeleton">
                            <img src="assets/img/elogo.png" alt="" style="width: 50px; height: 50px; margin-right: 5px;">
                            <b>E-markets expo</b>
                        </h3>
                        <p class="nunito skeleton">
                            <i class="fa-sharp fa-solid fa-location-dot"style="" ></i>
                            59, Av Fal ouled oumeir, 3°et, app 6 Agdal - 10090 </p>

                    </div>
                    <div class="card-footer bg-transparent">
                        <ul style="list-style: none; ">
                            <li class="nunito skeleton" style=" display: inline-block;  margin-top: 15px; margin-left: -25px">
                                <i class="fa-solid fa-comment"></i> | <span class="comments-count skeleton" >10</span> commentaire
                            </li>
                            <li style=" display: inline-block;  margin-top: 7px; float: right;">
                                <button class="button-21 nunito skeleton" role="button">
                                    <b>Details</b>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card mt-3" style="background-image: url('assets/img/cardbackground.png'); background-size:contain; background-repeat: no-repeat; background-position: right ">
                    <div class="card-header " style="opacity: 0.5;">
                       <span class="skeleton" style="opacity: 0.5;"><i class="fa-solid fa-diagram-project" style="margin-right: 5px; font-size: 15px;"></i>
                        secteur d'activité</span>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title skeleton">
                            <img src="assets/img/elogo.png" alt="" style="width: 50px; height: 50px; margin-right: 5px;">
                            <b>E-markets expo</b>
                        </h3>
                        <p class="nunito skeleton">
                            <i class="fa-sharp fa-solid fa-location-dot"style="" ></i>
                            59, Av Fal ouled oumeir, 3°et, app 6 Agdal - 10090 </p>

                    </div>
                    <div class="card-footer bg-transparent">
                        <ul style="list-style: none; ">
                            <li class="nunito skeleton" style=" display: inline-block;  margin-top: 15px; margin-left: -25px">
                                <i class="fa-solid fa-comment"></i> | <span class="comments-count skeleton" >10</span> commentaire
                            </li>
                            <li style=" display: inline-block;  margin-top: 7px; float: right;">
                                <button class="button-21 nunito skeleton" role="button">
                                    <b>Details</b>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card mt-3" style="background-image: url('assets/img/cardbackground.png'); background-size:contain; background-repeat: no-repeat; background-position: right ">
                    <div class="card-header " style="opacity: 0.5;">
                       <span class="skeleton" style="opacity: 0.5;"><i class="fa-solid fa-diagram-project" style="margin-right: 5px; font-size: 15px;"></i>
                        secteur d'activité</span>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title skeleton">
                            <img src="assets/img/elogo.png" alt="" style="width: 50px; height: 50px; margin-right: 5px;">
                            <b>E-markets expo</b>
                        </h3>
                        <p class="nunito skeleton">
                            <i class="fa-sharp fa-solid fa-location-dot"style="" ></i>
                            59, Av Fal ouled oumeir, 3°et, app 6 Agdal - 10090 </p>

                    </div>
                    <div class="card-footer bg-transparent">
                        <ul style="list-style: none; ">
                            <li class="nunito skeleton" style=" display: inline-block;  margin-top: 15px; margin-left: -25px">
                                <i class="fa-solid fa-comment"></i> | <span class="comments-count skeleton" >10</span> commentaire
                            </li>
                            <li style=" display: inline-block;  margin-top: 7px; float: right;">
                                <button class="button-21 nunito skeleton" role="button">
                                    <b>Details</b>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        
    </div>




@endsection