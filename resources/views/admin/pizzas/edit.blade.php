@extends('admin.layouts.admin')

@section('title', 'Edit Pizza')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('admin.pizzas.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <h1 class="h3 mb-0"><i class="fas fa-edit"></i> Edit Pizza</h1>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.pizzas.update', $pizza->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label" for="name">Pizza Name</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Enter pizza name" value="{{ old('name', $pizza->name) }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="type">Pizza Type</label>
                                    <select class="form-select" name="type" id="type" required>
                                        <option value="" disabled>--- choose type ---</option>
                                        <option value="Margherita" {{ old('type', $pizza->type) === 'Margherita' ? 'selected' : '' }}>Margherita</option>
                                        <option value="Pepperoni" {{ old('type', $pizza->type) === 'Pepperoni' ? 'selected' : '' }}>Pepperoni</option>
                                        <option value="Hawaiian" {{ old('type', $pizza->type) === 'Hawaiian' ? 'selected' : '' }}>Hawaiian</option>
                                        <option value="Veggie" {{ old('type', $pizza->type) === 'Veggie' ? 'selected' : '' }}>Veggie</option>
                                        <option value="Veg Supreme" {{ old('type', $pizza->type) === 'Veg Supreme' ? 'selected' : '' }}>Veg Supreme</option>
                                        <option value="Volcano" {{ old('type', $pizza->type) === 'Volcano' ? 'selected' : '' }}>Volcano</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="base">Base Type</label>
                                    <select class="form-select" name="base" id="base" required>
                                        <option value="" disabled>--- choose base ---</option>
                                        <option value="Classic" {{ old('base', $pizza->base) === 'Classic' ? 'selected' : '' }}>Classic</option>
                                        <option value="Thin" {{ old('base', $pizza->base) === 'Thin' ? 'selected' : '' }}>Thin</option>
                                        <option value="Thick" {{ old('base', $pizza->base) === 'Thick' ? 'selected' : '' }}>Thick</option>
                                        <option value="Cheesy Crust" {{ old('base', $pizza->base) === 'Cheesy Crust' ? 'selected' : '' }}>Cheesy Crust</option>
                                        <option value="Garlic Crust" {{ old('base', $pizza->base) === 'Garlic Crust' ? 'selected' : '' }}>Garlic Crust</option>
                                        <option value="Thin & Crispy" {{ old('base', $pizza->base) === 'Thin & Crispy' ? 'selected' : '' }}>Thin & Crispy</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter pizza description" required>{{ old('description', $pizza->description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="price">Price ($)</label>
                                <input class="form-control" type="number" name="price" id="price" min="0" step="0.01" value="{{ old('price', $pizza->price) }}" placeholder="Enter price" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Extra Toppings</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="mozzarella" id="mozzarella" {{ in_array('mozzarella', old('toppings', $pizza->toppings ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="mozzarella">Mozzarella</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="mushrooms" id="mushrooms" {{ in_array('mushrooms', old('toppings', $pizza->toppings ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="mushrooms">Mushrooms</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="pepperoni" id="pepperoni" {{ in_array('pepperoni', old('toppings', $pizza->toppings ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="pepperoni">Pepperoni</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="peppers" id="peppers" {{ in_array('peppers', old('toppings', $pizza->toppings ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="peppers">Peppers</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="basil" id="basil" {{ in_array('basil', old('toppings', $pizza->toppings ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="basil">Basil</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="garlic" id="garlic" {{ in_array('garlic', old('toppings', $pizza->toppings ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="garlic">Garlic</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="olives" id="olives" {{ in_array('olives', old('toppings', $pizza->toppings ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="olives">Olives</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toppings[]" value="onions" id="onions" {{ in_array('onions', old('toppings', $pizza->toppings ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="onions">Onions</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="image_url">Image</label>
                                <select class="form-select" name="image_url" id="image_url" required>
                                    <option value="" disabled>--- choose image ---</option>
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="/img/pizza{{ $i }}.png" {{ old('image_url', $pizza->image_url) === "/img/pizza{$i}.png" ? 'selected' : '' }}>Pizza {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa-solid fa-save"></i> Update Pizza
                                </button>
                                <a class="btn btn-light" href="{{ route('admin.pizzas.index') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
