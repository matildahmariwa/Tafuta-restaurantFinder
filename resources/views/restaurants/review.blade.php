<html>
<head>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <style>
      fa-star {
   color: rgba(112, 111, 111, 0.856);
  
}

.fa-star:hover {
   color: #e2334c;
   
}

.fa-star.selected {
   color: #001628;
} 
      </style>
            </head>
            {!!Form::open(['action' => ['ReviewsController@store'],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">   
            <div class="form-group">   
                {{Form::textarea('value',null,['id'=>'value','placeholder'=>'Insert here','name'=>'value'])}}
            </div>
            {{ Form::hidden('restaurant_id', Request::route('restaurant_id'))}}
            
                    <!-- start the value at -1 so we know it hasn't been set yet -->
                    <input type="hidden" id="rating" name="rating" value="1">
                    <div class="rating">
                      <i class="ratings_stars fa fa-star" data-rating="1"></i>
                      <i class="ratings_stars fa fa-star" data-rating="2"></i>
                      <i class="ratings_stars fa fa-star" data-rating="3"></i>
                      <i class="ratings_stars fa fa-star" data-rating="4"></i>
                      <i class="ratings_stars fa fa-star" data-rating="5"></i>
                    </div>
                 
                    <script>
                            $('.ratings_stars').click(function () {
                                $('.ratings_stars').removeClass('selected'); // Removes the selected class from all of them
                                var rating = $(this).data('rating'); // Get the rating from the selected star
                                $('.ratings_stars').each(function(index, item){
                                  if (rating && index < rating) {
                                    $(this).addClass('selected');
                                  }
                                })
                      
                                $('#rating').val(rating); // Set the value of the hidden rating form element
                              });
                          </script>
                           
{{Form::submit('submit',['class'=>'btn btn-primary','type'=>'submit','id'=>'submit'])}}
{!!Form::close()!!}
</html>