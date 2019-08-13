@extends('layouts.app', ['title' => __('Restaurant Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Restaurants') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('restaurants.create') }}" class="btn btn-sm btn-primary">{{ __('Add restaurant') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('OPENING TIME') }}</th>
                                    <th scope="col">{{ __('CLOSING TIME') }}</th>
                                    <th scope="col">{{ __('DAYS OF OPERATION') }}</th>
                                    <th scope="col">{{ __('WEBSITE') }}</th>
                                    <th scope="col">{{ __('PHONE') }}</th>
                                    <th scope="col">{{ __('PHYSICAL ADDRESS') }}</th>
                                    
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($restaurants as $restaurant)
                                    <tr>
                                        <td>{{ $restaurant->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $restaurant->email }}">{{ $restaurant->email }}</a>
                                        </td>
                                        <td>{{ $restaurant->opening_time}}</td>
                                        <td>{{ $restaurant->closing_time}}</td>
                                        <td>{{ $restaurant->days_of_operation}}</td>
                                        <td>{{ $restaurant->website}}</td>
                                        <td>{{ $restaurant->phone}}</td>
                                        <td>{{ $restaurant->physical_address}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                        <form action="{{ route('restaurants.destroy', $restaurant) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('restaurants.edit',$restaurant)}}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this restaurant?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                  
                                                        {{-- <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edit') }}</a> --}}
                                                   
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $restaurants->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection