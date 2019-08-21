@extends('layouts.app')
@section('content')

    <h3 class="text-center"><u>Create Restaurant</u></h3>
    <br><br>
    <div class="col-4 text-left">
        <a href="{{ route('restaurants.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
    </div>
    <div class="container">

        {!! Form::open(['action' => ['RestaurantsController@update',$restaurant->id],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name',$restaurant->name,['class'=>'form-control','placeholder'=>'Insert here'])}}
        </div>
        <div class="form-group">
            {{Form::label('opening_time','Opening time')}}
            {{Form::text('opening time',$restaurant->opening_time,['class'=>'form-control','placeholder'=>'Insert here'])}}
        </div>
        <div class="form-group">
            {{Form::label('closing_time','Closing time')}}
            {{Form::text('closing time',$restaurant->closing_time,['class'=>'form-control','placeholder'=>'Insert here'])}}
        </div>
        <div class="form-group">
            {{Form::label('days_of_operation','Days of operation')}}
            {{Form::text('days_of_operation',$restaurant->days_of_operation,['class'=>'form-control','placeholder'=>'Insert here'])}}
        </div>
        <div class="form-group">
            {{Form::label('website','Website')}}
            {{Form::text('website',$restaurant->website,['class'=>'form-control','placeholder'=>'Insert here'])}}
        </div>


        <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email',$restaurant->email,['class'=>'form-control','id'=>'menu','placeholder'=>'Insert here'])}}
        </div>
        <div class="form-group">
            {{Form::label('phone','Phone')}}
            {{Form::text('phone',$restaurant->phone,['class'=>'form-control','id'=>'description','placeholder'=>'Insert here'])}}
        </div>

        <div class="form-group">
            {{Form::label('pysical_address','Physical address')}}
            {{Form::textarea('physical_address',$restaurant->physical_address,['class'=>'form-control','placeholder'=>'Insert here'])}}
        </div>

        {{-- <div class="form-group">
                        {{Form::file('cover_image')}}
        </div> --}}
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('submit',['class'=>'btn btn-primary','type'=>'submit','id'=>'submit'])}}

        {!! Form::close() !!}


    </div>



@endsection
