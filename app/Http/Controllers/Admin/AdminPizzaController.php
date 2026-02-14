<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;

class AdminPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::latest()->paginate(10);
        return view('admin.pizzas.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'base' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'toppings' => 'nullable|array',
            'toppings.*' => 'string|max:255',
            'image_url' => 'required|string|max:255',
        ]);

        $pizza = new Pizza();
        $pizza->name = $validated['name'];
        $pizza->type = $validated['type'];
        $pizza->base = $validated['base'];
        $pizza->description = $validated['description'];
        $pizza->price = $validated['price'];
        $pizza->toppings = $validated['toppings'] ?? [];
        $pizza->image_url = $validated['image_url'];
        $pizza->save();

        return redirect()->route('admin.pizzas.index')->with('success', 'Pizza created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('admin.pizzas.show', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('admin.pizzas.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'base' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'toppings' => 'nullable|array',
            'toppings.*' => 'string|max:255',
            'image_url' => 'required|string|max:255',
        ]);

        $pizza = Pizza::findOrFail($id);
        $pizza->name = $validated['name'];
        $pizza->type = $validated['type'];
        $pizza->base = $validated['base'];
        $pizza->description = $validated['description'];
        $pizza->price = $validated['price'];
        $pizza->toppings = $validated['toppings'] ?? [];
        $pizza->image_url = $validated['image_url'];
        $pizza->save();

        return redirect()->route('admin.pizzas.index')->with('success', 'Pizza updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect()->route('admin.pizzas.index')->with('success', 'Pizza deleted successfully');
    }
}
