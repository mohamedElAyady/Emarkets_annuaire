@extends('layouts.layout')

@section('content')
    <div class="container " style="margin-top: 102.75px;">
        <div class="content col-xs-12 col-lg-9 datatable ">
            <div class="row" style="margin-bottom: 10px">
                <input type="text" class="form-control" id="searchInput" placeholder="Search by name, sector, city, or address">
            </div>

            @foreach ($annonces as $item)
               <div class="card mt-3" style="background-image: url('assets/annuaire/img/cardbackground.png'); background-size:contain; background-repeat: no-repeat; background-position: right ">
                <div class="card-header " style="opacity: 0.5;">
                    <span class="skeleton" style="opacity: 0.5;"><i class="fa-solid fa-diagram-project" style="margin-right: 5px; font-size: 15px;"></i>  {{$item->entreprise->secteur_activite}}  </span>
                </div>



                <div class="card-body">
                    <h3 class="card-title skeleton">
                    <img src="{{$item->entreprise->logo_url}}" alt="" style="width: 50px; height: 50px; margin-right: 5px;">
                    <b>{{$item->entreprise->raison_sociale}}</b>
                    </h3>
                    <p class="nunito skeleton">
                    <i class="fa-sharp fa-solid fa-location-dot"style="" ></i>
                    {{$item->entreprise->adresse}}
                    </p>
                </div>
                <div class="card-footer bg-transparent">
                    <ul style="list-style: none; ">
                    <li class="nunito skeleton" style=" display: inline-block;  margin-top: 15px; margin-left: -25px">
                        <i class="fa-solid fa-comment"></i> | <span class="comments-count skeleton" >10</span> commentaire
                    </li>
                    <li style=" display: inline-block;  margin-top: 7px; float: right;">
                        <button onclick="window.location.href='{{ route('details', $item->entreprise->id) }}'"  class="button-21 nunito skeleton" role="button">
                        <b>details
                        </b>
                        </button>
                    </li>
                    </ul>
                </div>
            </div>
            
            @endforeach
           
   </div>


            

           
            

            
           

            
           
            </div>

            
        </div>
    </div>


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
      


@endsection