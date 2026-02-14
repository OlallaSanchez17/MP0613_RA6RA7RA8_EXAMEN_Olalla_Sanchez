@extends('admin.layouts.admin')

@section('title', 'Manage Pizzas')

@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0"><i class="fas fa-pizza-slice"></i> Manage Pizzas</h1>
            <a class="btn btn-primary" href="{{ route('admin.pizzas.create') }}">
                <i class="fa-solid fa-plus"></i> Add New Pizza
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                @if($pizzas->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Base</th>
                                <th scope="col">Price</th>
                                <th scope="col" class="text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pizzas as $pizza)
                                <tr>
                                    <th scope="row">{{ $pizza->id }}</th>
                                    <td>
                                        @if(!empty($pizza->image_url))
                                            <img class="rounded" src="{{ $pizza->image_url }}" alt="Pizza image" style="max-width: 60px; height: auto;">
                                        @endif
                                    </td>
                                    <td><strong>{{ $pizza->name }}</strong></td>
                                    <td>{{ $pizza->type }}</td>
                                    <td>{{ $pizza->base }}</td>
                                    <td><span class="badge bg-success">${{ $pizza->price }}</span></td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-sm btn-outline-info" href="{{ route('admin.pizzas.show', $pizza->id) }}" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-warning" href="{{ route('admin.pizzas.edit', $pizza->id) }}" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.pizzas.destroy', $pizza->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this pizza?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger" type="submit" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $pizzas->links() }}
                    </div>
                @else
                    <div class="alert alert-info mb-0">
                        <i class="fas fa-info-circle"></i> No pizzas found. <a href="{{ route('admin.pizzas.create') }}">Create your first pizza</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
