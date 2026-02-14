@extends('layouts.app')

@section('title', 'Order List')

@section('content')
    <div class="pizza-list-background">
        <div class="container"> 
        <div class="card shadow-sm">
            <div class="card-body">
                @if(count($pizzas) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                            <tr>
                                <th scope="col"><i class="fas fa-pizza-slice"></i> Name</th>
                                <th scope="col"><i class="fa fa-tag"></i> Type</th>
                                <th scope="col"><i class="fa fa-layer-group"></i> Base</th>
                                <th scope="col"><i class="fa fa-coins"></i> Price</th>
                                <th scope="col"><i class="fa fa-image"></i> Image</th>
                                <th scope="col"><i class="fa fa-info-circle"></i> More info</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pizzas as $key => $pizza)
                                <tr>
                                    <td>{{ $pizza->name  }}</td>
                                    <td>{{ $pizza->type }}</td>
                                    <td>{{ $pizza->base  }}</td>
                                    <td>{{ $pizza->price }}</td>
                                    <td>
                                        @if(!empty($pizza->image_url))
                                            <img class="rounded" src="{{ $pizza->image_url }}" alt="Pizza image" style="max-width: 60px; height: auto;">
                                        @endif
                                    </td>
                                    <td >
                                        <a class="btn btn-sm btn-outline-info"
                                           href="{{ route('pizzas.show', $pizza->id) }}"
                                           title="See pizza details">
                                            <i class="fa fa-info"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info mb-0">{{ __('No data found!') }}</div>
                @endif
            </div>
        </div>

        @if(session('mssg'))
            <div class="alert alert-success mt-3 text-center">{{ session('mssg')  }}</div>
        @endif

        <div class="mt-3">
            <a class="btn btn-link" href="{{ url('/') }}"><i class="fa-solid fa-arrow-left"></i> Back to homepage</a>
        </div>
    </div>
    </div>
@endsection
