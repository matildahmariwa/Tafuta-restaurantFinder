@extends('layouts.app')
@section('content')


    <h3 class="text-center"><u>Add food category</u></h3>
    <br><br>
    <div class="col-4 text-left">
        <a href="{{ route('foodcategory.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
    </div>
    <div class="container">

        {!! Form::open(['action' => 'FoodCategoryController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('food_category','Food Category')}}
            {{Form::text('food_category','',['class'=>'form-control','placeholder'=>'E.g. dinner, breakfast, dessert, drinks etc'])}}
        </div>

        {{Form::submit('submit',['class'=>'btn btn-primary','type'=>'submit','id'=>'submit'])}}

        {!! Form::close() !!}


    </div>

@endsection
