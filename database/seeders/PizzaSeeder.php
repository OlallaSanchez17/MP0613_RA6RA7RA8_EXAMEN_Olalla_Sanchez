<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            [
                'type' => 'Margherita',
                'base' => 'Classic',
                'name' => 'Margherita',
                'description' => 'The classic Italian pizza with fresh mozzarella and basil on a traditional tomato sauce base.',
                'price' => 12,
                'toppings' => json_encode(['mozzarella', 'basil']),
                'image_url' => '/img/pizza1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Pepperoni',
                'base' => 'Thin',
                'name' => 'Pepperoni Feast',
                'description' => 'Loaded with slices of pepperoni on a thin crust for a crispy, flavorful experience.',
                'price' => 15,
                'toppings' => json_encode(['mozzarella', 'pepperoni']),
                'image_url' => '/img/pizza2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Veggie',
                'base' => 'Classic',
                'name' => 'Garden Veggie',
                'description' => 'A fresh and healthy option packed with colorful vegetables including peppers, onions, and olives.',
                'price' => 13,
                'toppings' => json_encode(['mozzarella', 'peppers', 'onions', 'olives']),
                'image_url' => '/img/pizza3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Hawaiian',
                'base' => 'Thick',
                'name' => 'Hawaiian Delight',
                'description' => 'A sweet and savory combination of ham and pineapple on a thick, fluffy crust.',
                'price' => 16,
                'toppings' => json_encode(['mozzarella', 'ham', 'pineapple']),
                'image_url' => '/img/pizza4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Volcano',
                'base' => 'Thin & Crispy',
                'name' => 'Volcano Heat',
                'description' => 'An intensely spicy pizza for heat lovers with chili peppers and pepperoni on a crispy crust.',
                'price' => 17,
                'toppings' => json_encode(['mozzarella', 'chili', 'pepperoni']),
                'image_url' => '/img/pizza5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Margherita',
                'base' => 'Garlic Crust',
                'name' => 'Garlic Margherita',
                'description' => 'The timeless Margherita with aromatic garlic added to the crust for an extra layer of flavor.',
                'price' => 14,
                'toppings' => json_encode(['mozzarella', 'basil', 'garlic']),
                'image_url' => '/img/pizza6.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Veg Supreme',
                'base' => 'Classic',
                'name' => 'Supreme Veg',
                'description' => 'The ultimate vegetarian choice with mushrooms, peppers, olives and more fresh vegetables.',
                'price' => 15,
                'toppings' => json_encode(['mozzarella', 'mushrooms', 'peppers', 'olives']),
                'image_url' => '/img/pizza7.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Pepperoni',
                'base' => 'Cheesy Crust',
                'name' => 'Cheesy Pepperoni',
                'description' => 'Double the cheese with a pepperoni topping and a cheesy crust for the ultimate cheese and pepperoni lover.',
                'price' => 17,
                'toppings' => json_encode(['mozzarella', 'pepperoni', 'extra cheese']),
                'image_url' => '/img/pizza8.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Hawaiian',
                'base' => 'Thin & Crispy',
                'name' => 'Crispy Hawaiian',
                'description' => 'The tropical flavors of ham and pineapple on a thin, crispy crust for a lighter Hawaiian experience.',
                'price' => 16,
                'toppings' => json_encode(['mozzarella', 'ham', 'pineapple']),
                'image_url' => '/img/pizza9.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Volcano',
                'base' => 'Thick',
                'name' => 'Lava Blast',
                'description' => 'Maximum heat and spice with chili and garlic on a thick, robust crust that can handle the intensity.',
                'price' => 18,
                'toppings' => json_encode(['mozzarella', 'chili', 'garlic']),
                'image_url' => '/img/pizza10.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
