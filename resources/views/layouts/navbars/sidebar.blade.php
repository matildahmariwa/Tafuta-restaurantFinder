<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#users-nav" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="users-nav">
                        <i class="fa fa-users" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Users') }}</span>
                    </a>

                    <div class="collapse show" id="users-nav">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('User Profile') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#restaurants-nav" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="restaurants-nav">
                        <i class="ni ni-shop" style="color: #5E72E4;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Restaurants') }}</span>
                    </a>

                    <div class="collapse show" id="restaurants-nav">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    {{ __('Restaurant Reviews') }}
                                </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('restaurants.index')}}">
                                    {{ __('Restaurant Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("foodcategory.index")}}">
                        <i class="ni ni-bullet-list-67 text-green"></i> {{ __('Food Categories') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-cart text-info"></i> {{ __('Orders') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-money-coins text-blue"></i> {{ __('Payments') }}
                    </a>
                </li>
                
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">OTHER LINKS</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-support-16"></i>Support
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
