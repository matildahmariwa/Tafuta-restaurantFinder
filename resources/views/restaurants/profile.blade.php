@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.profile')
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white text-uppercase display-2">{{ $restaurant->name }}</h1>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                         aria-labelledby="tabs-icons-text-1-tab">
                        <h1 class="display-4">Email</h1>
                        <p>{{$restaurant->email}}</p>
                        <h1 class="display-4">Phone</h1>
                        <p>{{$restaurant->phone}}</p>
                        <h1 class="display-4">Physical address</h1>
                        <p>{{$restaurant->physical_address}}</p>
                        <h1 class="display-4">Website</h1>
                        <a href="{{$restaurant->website}}">{{$restaurant->website}}</a>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <h1 class="display-4">Opening days</h1>
                                <p>{{$restaurant->days_of_operation}}</p>
                            </div>
                            <div class="col-sm">
                                <h1 class="display-4">Opening Time</h1>
                                <p>{{ date('h:i a', strtotime($restaurant->opening_time))}}</p>
                            </div>
                            <div class="col-sm">
                                <h1 class="display-4">Closing time</h1>
                                <p>{{date('h:i a', strtotime($restaurant->closing_time))}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                         aria-labelledby="tabs-icons-text-2-tab">
                        <p class="description">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
                            placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher
                            voluptate nisi qui.</p>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                         aria-labelledby="tabs-icons-text-3-tab">
                        <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                            tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg
                            carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                         aria-labelledby="tabs-icons-text-4-tab">
                        <div id="map"></div>
                        <script type="text/javascript">
                            var map;
                            function initMap() {
                                map = new google.maps.Map(document.getElementById('map'), {
                                    center: {lat: -34.397, lng: 150.644},
                                    zoom: 8
                                });
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                       href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                            class="fa fa-info-circle"></i> Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                       href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                            class="fa fa-list"></i> Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                       href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i
                            class="fa fa-star"></i> Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab"
                       href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i
                            class="fa fa-map"></i> Map</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
