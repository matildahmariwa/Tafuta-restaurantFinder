{{-- <!doctype html> --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name','Tafuta') }}</title>
    <link rel="shortcut icon" href="css/favicon.ico"/>
        
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <style>
       .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
                
            }
      .right-title {
    float: left;
    margin-left: -50px;
}
            body{
            background: #f2f2f2;
            font-family: 'Open Sans', sans-serif;
}

          

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            #full-body{
                background-image:url(css/background.jpg);
                width: 100%;
                height: 100%;
                background-repeat: no-repeat;
                background-size: cover; /* or contain depending on what you want */
                background-position: center center;
                background-repeat: no-repeat;
            }
                .footer {
                background-color:black;
                color: #fff;
                font-size: 10px !important;
                padding-bottom: 10px;
                }

              .footer * {
              font-size: 15px;
              }



            .footer a {
                color: orange;
            }
            .banner-caption h1{
                color: #ffffff;
            }

            /* /* .footer>* {
                top: 50%;
                position: relative;
                transform: translateY(-50%);
                margin: 0 !important;
            } */
           .search-btn{
             margin-top:2%;
             
           }             */
</style> 
    </head>
    <body>
    <div class="flex-center position-ref full-height" id="full-body">
    <div class="top-right"> 
            <a href="#">Search by</a>
            <a href="#">add</a>
            <a href="#">My profile</a>
            {{-- <a class="btn" id="search" href="{{ route('search') }}">Search by</a>
            <a class="btn" id="create" href="{{ route('create') }}">Add</a>
            <a class="btn" id="profile" href="{{ route('profile') }}">My profile </a>       --}}
            <div class="right-title">
              <h1>{{ config('app.name','Tafuta') }}</h1>  
             </div>
    </div> {{--close of links div--}}
    
    <div class="banner-caption">
       <h1>Discover  places to eat and drink</h1>
        {{-- <h2 class="banner-sub-title">Get started in few clicks</h2> --}}
        <div class="search input-search input-icon">
          <input type="text" class="form-control" name="keyword" placeholder="Enter keyword...">
      <div class="search-btn">
          <button class="btn btn-secondary">Search</button>
      </div>
    </div>
  </div>      
    </div>
    <div class="footer">
        <h5 class="text-center">Copyright @<?php echo date("Y");?> <a href="#">Matildah mariwa</a> All Rights Reserved</h5>
    </div> {{-- Close of footer --}}
    </body>
</html>
