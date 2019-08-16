<html>
      
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

<style>
    .restaurant-img {
    width: 71%;
    height: 200px;
    float: left;
    position: relative;
    display: block;
}
.restaurant-img {
    background-size: cover;
    border-radius:10px;
    opacity: 1;
    transition: all 500ms linear 0ms;
}
.well h3{
    float:left;
    width: 100%;
    margin-top:10px;
    display: block;
    position: relative;
}
.restaurant-img:hover{
     opacity: 0.5;
}
.well .col-md-12.col-sm-12 {
    float: left;
}

</style>
{{-- @extends('layouts.app')
@section('content')
@include('inc.messages') --}}
<h1 class="text-center">Restaurants</h1>
<hr>
<div class="container">
<?php  
 $restaurants=App\Restaurant::all(); 
?>
@if(count($restaurants)>0)
<div class="well">
<div class="row">
@foreach($restaurants as $restaurant)
   <div class="col-md-4 col-sm-4"> 
    <div class="col-md-12 col-sm-12">
    <div class="restaurant-img" style="background-image:url('/Tafuta_restaurant/storage/app/public/cover_images/{{$restaurant->cover_image}}')">
 
    </div>
    </div>
    <div class="col-md-12 col-sm-12">
    <h3><a href="/Tafuta_restaurant/public/restaurants/{{$restaurant->id}}">{{$restaurant->name}}</h3>
    <small>{{$restaurant->days_of_operation}}</small> </br>
    <small>{{number_format($restaurant->rating_count,2)}}</small>  
    {{-- <small>Written on {{$recipe->created_at }} by {{$recipe->user->name}}</small>  --}}
    </div>
</div>  
@endforeach
 
</div>
</div>
@else
<p>no restaurants found</p>
@endif
</div>
{{-- @endsection --}}
</html>