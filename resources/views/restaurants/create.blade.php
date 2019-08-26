@extends('layouts.app')
@section('content')

    <h3 class="text-center"><u>Create Restaurant</u></h3>
    <br><br>
    @if (Auth::check() && !Auth::user()->role == 'vendor') 
    <div class="col-4 text-left">
        <a href="{{ route('restaurants.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
    </div>
    @endif
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
            {{Form::number('phone',null,['class'=>'form-control','id'=>'description','placeholder'=>'Insert here'])}}
        </div>

        <div class="form-group">
            {{Form::label('pysical_address','Physical address')}}
            {{Form::textarea('physical_address','',['class'=>'form-control','placeholder'=>'Insert here'])}}
        </div>
        <div class="form-group">
                {{Form::label('lat','Lattitude')}}
                {{Form::number('lat',null,['class'=>'form-control','id'=>'lng','step'=>'any','placeholder'=>'Insert here'])}}
            </div>
            <div class="form-group">
                {{Form::label('lng','Longitude')}}
                {{Form::number('lng',null,['class'=>'form-control','id'=>'lng','step'=>'any','placeholder'=>'Insert here'])}}
            </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>

        {{-- {{Form::hidden('_method','POST')}} --}}
        {{Form::submit('submit',['class'=>'btn btn-primary','type'=>'submit','id'=>'submit'])}}

        {!! Form::close() !!}


    </div>


@endsection
