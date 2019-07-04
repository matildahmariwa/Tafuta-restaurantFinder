@extends('layouts.app')
        @section('content')
        
        <html>
        <head>
       
        </head>
        <body>
        <h3 class="text-center"><u>Create Restaurant</u></h3>
        <div class="container">
        
        {!! Form::open(['action' => 'RestaurantsController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Insert here'])}}
        </div>
        <div class="form-group">
                {{Form::label('hours','Hours')}}
                {{Form::text('hours','',['class'=>'form-control','placeholder'=>'Insert here'])}}
                </div>
                <div class="form-group">
                        {{Form::label('contact','Contact')}}
                        {{Form::text('contact','',['class'=>'form-control','placeholder'=>'Insert here'])}}
                        </div>
                <div class="form-group">
                        {{Form::label('payment','Payment')}}
                        {{Form::text('payment','',['class'=>'form-control','placeholder'=>'Insert here'])}}
                        </div>

        <div class="form-group">
                {{Form::label('menu','Menu')}}
                {{Form::textarea('menu',null,['id'=>'menu','placeholder'=>'Insert here','name'=>'menu'])}}
        </div>
        <div class="form-group">
                        {{Form::label('description','Description')}}
                        {{Form::textarea('description',null,['id'=>'description','placeholder'=>'Insert here','name'=>'description'])}}
                </div>
        
        <div class="form-group">
                        {{Form::file('cover_image')}}
        </div>
        {{-- {{Form::hidden('_method','POST')}} --}}
        {{Form::submit('submit',['class'=>'btn btn-primary','type'=>'submit','id'=>'submit'])}}
        
        {!! Form::close() !!} 


        </div>

        </body>
       
       
        </html>

        @endsection