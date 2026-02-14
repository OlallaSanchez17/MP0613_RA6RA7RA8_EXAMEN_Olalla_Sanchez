@extends('admin.layouts.admin')

@section('title', 'Pizza Details')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.pizzas.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <h1 class="h3 mb-0"><i class="fas fa-pizza-slice"></i> Pizza Details</h1>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white d-flex align-items-center justify-content-between">
                        <h2 class="h5 mb-0">{{ $pizza->name }}</h2>
                        <span class="badge bg-success">${{ $pizza->price }}</span>
                    </div>
                    <div class="card-body">
                        @if(!empty($pizza->image_url))
                            <div class="text-center mb-4">
                                <img class="img-fluid rounded" src="{{ $pizza->image_url }}" alt="Pizza image" style="max-width: 400px; height: auto;">
                            </div>
                        @endif

                        <div class="mb-3">
                            <h6 class="text-muted">Description</h6>
                            <p>{{ $pizza->description }}</p>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <p class="mb-1"><strong>Type:</strong> {{ $pizza->type }}</p>
                                    <p class="mb-1"><strong>Base:</strong> {{ $pizza->base }}</p>
                                    <p class="mb-0"><strong>Price:</strong> ${{ $pizza->price }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <p class="mb-1"><strong>Toppings:</strong></p>
                                    <ul class="mb-0">
                                        @forelse($pizza->toppings ?? [] as $topping)
                                            <li>{{ $topping }}</li>
                                        @empty
                                            <li class="text-muted">No extra toppings</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.pizzas.edit', $pizza->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit Pizza
                            </a>
                            <form action="{{ route('admin.pizzas.destroy', $pizza->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this pizza?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-trash"></i> Delete Pizza
                                </button>
                            </form>
                            <a href="{{ route('admin.pizzas.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-list"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
