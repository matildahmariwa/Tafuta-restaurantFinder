@extends('layouts.app')
@section('content')

    <h3 class="text-center"><u>Create menu</u></h3>
    <br><br>
    <div class="col-4 text-left">
        <a href="{{ route('restaurants.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
    </div>
    <div class="container">

        {!! Form::open(['action' => 'FoodsController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('food_item','Food item')}}
            {{Form::text('food_item','',['class'=>'form-control','placeholder'=>'Insert food here'])}}
        </div>
        <div class="form-group">
                {{Form::label('price','Price')}}
                {{Form::text('price','',['class'=>'form-control','placeholder'=>'Insert price here'])}}
            </div>
            {{ Form::hidden('restaurant_id', Request::route('restaurant_id'))}}
       
        {{-- {{Form::hidden('_method','POST')}} --}}
        {{Form::submit('submit',['class'=>'btn btn-primary','type'=>'submit','id'=>'submit'])}}

        {!! Form::close() !!}


    </div>


@endsection
