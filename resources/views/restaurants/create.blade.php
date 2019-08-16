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
                {{Form::label('opening_time','Opening time')}}
                {{Form::time('opening time','',['class'=>'form-control','placeholder'=>'Insert here'])}}
                </div>
                <div class="form-group">
                        {{Form::label('closing_time','Closing time')}}
                        {{Form::time('closing time','',['class'=>'form-control','placeholder'=>'Insert here'])}}
                        </div>
                <div class="form-group">
                        {{Form::label('days_of_operation','Days of operation')}}
                        {{Form::text('days_of_operation','',['class'=>'form-control','placeholder'=>'Insert here'])}}
                        </div>
                <div class="form-group">
                        {{Form::label('website','Website')}}
                        {{Form::text('website','',['class'=>'form-control','placeholder'=>'Insert here'])}}
                        </div>
                        

        <div class="form-group">
                {{Form::label('email','Email')}}
                {{Form::text('email',null,['class'=>'form-control','id'=>'menu','placeholder'=>'Insert here'])}}
        </div>
        <div class="form-group">
                        {{Form::label('phone','Phone')}}
                        {{Form::text('phone',null,['class'=>'form-control','id'=>'phone','placeholder'=>'Insert here'])}}
                </div>

                <div class="form-group">
                        {{Form::label('pysical_address','Physical address')}}
                        {{Form::textarea('physical_address','',['class'=>'form-control','placeholder'=>'Insert here'])}}
                        </div>
                        <div class="form-group">
                                {{Form::label('lat','Latitude')}}
                                {{Form::number('lat',null,['class'=>'form-control','id'=>'lat','placeholder'=>'Insert here'])}}
                        </div>
                        <div class="form-group">
                                {{Form::label('lon','Longitude')}}
                                {{Form::number('lon',null,['class'=>'form-control','id'=>'lon','placeholder'=>'Insert here'])}}
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