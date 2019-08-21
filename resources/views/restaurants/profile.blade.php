@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.profile')
    <style>
        <style>
      fa-star {
   color: rgba(112, 111, 111, 0.856);
  
}

.fa-star:hover {
   color: #e2334c;
   
}

.fa-star.selected {
   color: #001628;
} 
      
    </style>
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white text-uppercase display-2">{{ $restaurant->name }}</h1>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                         aria-labelledby="tabs-icons-text-1-tab">
                        {{-- <img src="{{\App\Http\Controllers\ImageUploadController::getFilePath($restaurant->cover_image)}}" alt="No Cover image"/> --}}
                        <img style="width:100%" src="Tafuta_restaurant\storage\app\public\cover_images/{{$restaurant->cover_image}}"> 
                        <h1 class="display-4">Email</h1>

                        <p>{{$restaurant->email}}</p>
                        <h1 class="display-4">Phone</h1>
                        <p>{{$restaurant->phone}}</p>
                        <h1 class="display-4">Physical address</h1>
                        <p>{{$restaurant->physical_address}}</p>
                        <h1 class="display-4">Website</h1>
                        <a href="{{$restaurant->website}}">{{$restaurant->website}}</a>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <h1 class="display-4">Opening days</h1>
                                <p>{{$restaurant->days_of_operation}}</p>
                            </div>
                            <div class="col-sm">
                                <h1 class="display-4">Opening Time</h1>
                                <p>{{ date('h:i a', strtotime($restaurant->opening_time))}}</p>
                            </div>
                            <div class="col-sm">
                                <h1 class="display-4">Closing time</h1>
                                <p>{{date('h:i a', strtotime($restaurant->closing_time))}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                         aria-labelledby="tabs-icons-text-2-tab">   
                         gsvcxbjhcsasa,bhcscsak,bscahbcsasbcbcscjsscbhshccbs
                        <p class="description"><a href="{{ route('restaurants.menu',$restaurant->id)}}">Add food item </a
                            </p>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                         aria-labelledby="tabs-icons-text-3-tab">
                        <p class="description">  <a href="{{ route('restaurants.review',$restaurant->id)}}">Add review</a></p>
                        <?php
    $reviews=App\Review::all();

    $sortedReviews = array();

    

    $theID = $restaurant->id;

    foreach($reviews as $review){
        $restaurantID = $review->restaurant_id;
      
        if($restaurantID==$theID){
          array_push($sortedReviews,$review);
        }

    }
    //@endforeach

    ?>
   <div>
        <h1>Reviews</h1>
        @foreach($sortedReviews as $review)
  <hr>
  <div class="row">
    <div class="col-md-12">
    @for ($i=1; $i <= 5 ; $i++)
      <span class="fa fa-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
    @endfor
    {{ $review->user ? $review->user->name : 'Anonymous'}}

    <p>{{{$review->value}}}</p>
    </div>
  </div>
@endforeach
    <div>   

    

    
      </div>
                    <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                         aria-labelledby="tabs-icons-text-4-tab">
                        <div id="map"></div>
                        <script type="text/javascript">
                            var map;
                            function initMap() {
                                map = new google.maps.Map(document.getElementById('map'), {
                                    center: {lat: -1.1032047, lng:37.0132 },
                                    zoom: 8
                                });
                            }
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAwHxhzoVjT3Qp7DBvRh_Y7ga_6Ud11&pocallback=initMap">
    </script>
                        </script>

                    </div>
                </div>
            </div>
        </div>
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                       href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                            class="fa fa-info-circle"></i> Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                       href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                            class="fa fa-list"></i> Menu</a>
                </li>
                <li class="nav-item">
    
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                       href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
                            class="fa fa-star"></i>Reviews </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab"
                       href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i
                            class="fa fa-map"></i> Map</a>
                </li>
            </ul>
        </div>
        </div>
    </div>
@endsection
