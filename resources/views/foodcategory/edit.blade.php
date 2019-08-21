@extends('layouts.app')
@section('content')

    <h3 class="text-center"><u>Edit food menu category</u></h3>
    <br><br>
    <div class="col-4 text-left">
        <a href="{{ route('foodcategory.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
    </div>
    <div class="container">

        {!! Form::open(['action' => ['FoodCategoryController@update', $foodCategory->id],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('food_category','Food menu category')}}
            {{Form::text('food_category',$foodCategory->food_category, ['class'=>'form-control','placeholder'=>''])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('submit',['class'=>'btn btn-primary','type'=>'submit','id'=>'submit'])}}

        {!! Form::close() !!}


    </div>


@endsection
