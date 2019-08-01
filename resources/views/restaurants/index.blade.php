@extends('layouts.app')
@section('content')
<h1 class="text-center">Restaurants</h1>
<hr>
<div class="container">
<?php
$restaurant=Restaurant::find($id); 
?> 
@if(count( $restaurants)>0)
<div class="well">
<div class="row">
@foreach($restaurants as $restaurant)
    <div class="col-md-12 col-sm-12">
    <h3><a href="/restaurantFinder/public/restaurants/{{$restaurant->id}}">{{$restaurant->name}}</h3>
    <small>Written on {{$restaurant->created_at }} </small>
    </div>
</div>  
@endforeach
</div>
</div>
else
<p>no recipes found</p>
@endif
</div>
@endsection
