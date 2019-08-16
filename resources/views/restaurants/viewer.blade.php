{{-- @extends('layouts.app')
@section('content')
@endsection --}}
<!DOCTYPE html>
<html>
  <head>
    <title>Restaurant profile</title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"
      name="viewport"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
     @import url("https://fonts.googleapis.com/css?family=Raleway:400,500,600,700&display=swap");

span.rating {
  background: #35dd99;
  padding: 15px;
  border-top-left-radius: 8px;
  border-bottom-right-radius: 8px;
  float: right;
  position: absolute;
  right: 0;
  transform: translate(-450%, -222%);
  color: #fff;
  font-weight: 600;
  box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.25);
}

section {
  width: 100%;
  position: relative;
}

body {
  max-width: 1000px;
  margin: auto;
  font-family: "Raleway", sans-serif;
}

section > img {
  width: 80%;
}

h3.name {
}

.content {
  padding: 30px;
}

.name > span {
  width: 100%;
  float: left;
  font-size: 11px;
  margin-top: 15px;
  margin-bottom: 15px;
}

.features {
  float: left;
  width: 100%;
  margin: 15px 0;
}

.features > i {
  width: 30%;
 
}

.features > i:nth-child(1) {
}

.features > i:nth-child(1):before {
  content: "\f017";
  color: purple;
}

.features > i:nth-child(2):before {
  content: "\f4c0";
  color: orange;
}

.features > i:nth-child(3):before {
  content: "\f095";
  color: rgb(35, 169, 255);
}
/* .features > i:nth-child(2):before {
  content: "\f4c0";
  color: rgb(35, 169, 255);
  float: left;
 
} */

.features > i:before {
  float: left;
  display: block;
  position: relative;
  font-size: 20px;
  left: 50%;
  transform: translateX(-50%);
}

.features > i > span {
  width: 100%;
  float: left;
  text-align: center;
  margin-top: 10px;
  font-family: "Raleway", sans-serif;
  font-size: 12px;
}

p.desc {
  float: left;
  margin-top: 15px;
  margin-bottom: 15px;
}

nav {
  float: left;
  width: 100%;
  box-shadow: 0px 0px 30px -19px #000;
  margin-top: 30px;
}

nav > ul {
  list-style: none;
  float: left;
  width: 100%;
  margin: 0;
  padding: 0;
}

nav > ul > li {
  width: calc(33.33333% - 10px);
  float: left;
  text-align: center;
  text-transform: uppercase;
  font-weight: 400;
  padding: 15px 0px 15px 0px;
  border-top: 3px solid white;
  cursor: pointer !important;
  margin: 0 5px;
}

nav > ul > li.active {
  border-top: 3px solid #35dd99;
}

nav > ul > li:hover {
  border-top: 3px solid #35dd99 !important;
  transition: all 500ms ease-in-out 0ms;
}
   
     </style>   
  </head>
  <body>
    <?php
      $restaurants=App\Restaurant::all(); 
      //$restaurant=App\Restaurant::find($id);
    ?>
    <div class="details">
    <section>
      <img
        class="pic"
        src="/Tafuta_restaurant/storage/app/public/cover_images/{{$restaurant->cover_image}}"
         />
      <div class="content">
         
      <h3 class="name"><span>{{$restaurant->name}}</span></h3>
        <span class="rating">{{$restaurant->rating_count}}</span> <span class="stars"></span>
        <div class="features">
          <i class="fa"><span>9AM - 9PM</span></i>
          <i class="fa fa-car"><span>Mpesa/cash</span></i>
          <i class="fa fa-car"><span>0702 011 022</span></i>
        </div>
        <p class="desc">
         {{$restaurant->description}}
        </p>
        
      <a href="{{ route('restaurants.review',$restaurant->id)}}">Add review</a>
    </div>
   
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
      <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
    @endfor

    {{ $review->user ? $review->user->name : 'Anonymous'}}

    <p>{{{$review->value}}}</p>
    </div>
  </div>
@endforeach
    <div>   
    </section>
    <nav>
      <ul>
        <li class="active">Details</li>
        <li>Menu</li>
        <li>Reviews</li>
      </ul>
    </nav>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </body>
</html>
