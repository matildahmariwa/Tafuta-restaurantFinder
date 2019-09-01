
@extends('layouts.LayoutCart')

@section('title', 'Cart')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
         
 
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
 
        <?php $total = 0 ?>
 
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            
 
                <?php $total += (int)$details['price'] *(int)$details['quantity'] ?>
 
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            {{-- <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div> --}}
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{(int) $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{(int) $details['price'] *(int) $details['quantity'] }}</td>
                    <td class="actions" data-th="">                       
                        {{-- <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button> --}}

                        <div class="form-group ">
                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                            <a href="{{route('removeCart',$id)}}"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $loop->iteration }}').submit();">
                                <i class="os-icon os-icon-signs-11"></i>
                                <span><button class="btn btn-danger btn-sm remove-from-cart" ><i class="fa fa-trash-o"></i></button></span>
                            </a>
                            <form id="delete-form-{{ $loop->iteration }}" action="{{route('removeCart',$id)}}" method="POST"
                                  style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
        @endif
 
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total }}</strong></td>
        </tr>
        <tr>
            
            <td><form>
                <input class="btn btn-default" type="button" value="Back to restaurant" onclick="history.back()">
              </form>
            </td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
   Submit Order
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @foreach( $errors->all() as $message )
        <li>{{ $message }}</li>
      @endforeach
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Enter delivery info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['action' => 'FoodsController@OrderItem','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                    <label for="user_name">Name</label>
                    <input type="user_name" class="form-control" id="user_name"  placeholder="Insert here" value="{{auth()->user()->name}}" disabled>
                            
                {{-- {{Form::label('user_name','Name')}}
                {{Form::text('user_name','',['class'=>'form-control','placeholder'=>'Insert here','value'=>'auth()->user()->name'])}} --}}
            </div>
            <div class="form-group">
                {{Form::label('delivery_address','Delivery address')}}
                {{Form::text('delivery_address','',['class'=>'form-control','placeholder'=>'Insert here'])}}
            </div>
            <div class="form-group">
                {{Form::label('city','City')}}
                {{Form::text('city','',['class'=>'form-control','placeholder'=>'Insert city'])}}
            </div>
            <div class="form-group">
                {{Form::label('phone_number','Phone number')}}
                {{Form::text('phone_number','',['class'=>'form-control','placeholder'=>'Insert phone','value'=>'auth()->user->phone'])}} 
            </div>
        </div>
        {{Form::submit('submit',['class'=>'btn btn-primary','type'=>'submit','id'=>'submit'])}}

        {!! Form::close() !!}

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         
        </div>
      </div>
    </div>
  </div>
    @section('scripts')
    <script type="text/javascript">
 
        $(".update-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>
 
@endsection
@endsection
