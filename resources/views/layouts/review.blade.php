<html>
    {!!Form::open()!!}
    <div class="form-group">
            
            {{Form::textarea('body',null,['id'=>'body','placeholder'=>'Insert here','name'=>'menu'])}}
    </div>
    {{Form::submit('submit',['class'=>'btn btn-primary','type'=>'submit','id'=>'submit'])}}
    {!!Form::close()!!}

</html>