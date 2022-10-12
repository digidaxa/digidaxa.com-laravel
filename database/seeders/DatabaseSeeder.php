<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Decorunic',
            'username' => 'decorunic',
            'email' => 'decorunic.wall@gmail.com',
            'password' => Hash::make('sehatkayabahagia')
        ]);

        // Animals, Architecture, Art, Cars & Vehicles, Character, Electronic, Fashion, Furniture, Places & Travels, Plants & Nature, Retail, Sci-Fi & Game, Weapons

        Category::create([
            'name' => 'Animals',
            'slug' => 'animals',
            'icon' => 'animals.png'
        ]);

        Category::create([
            'name' => 'Architecture',
            'slug' => 'architecture',
            'icon' => 'architecture.png'
        ]);

        Category::create([
            'name' => 'Art',
            'slug' => 'art',
            'icon' => 'art.png'
        ]);

        Category::create([
            'name' => 'Cars & Vehicles',
            'slug' => 'cars-vehicles',
            'icon' => 'cars-vehicles.png'
        ]);

        Category::create([
            'name' => 'Character',
            'slug' => 'character',
            'icon' => 'character.png'
        ]);

        Category::create([
            'name' => 'Electronic',
            'slug' => 'electronic',
            'icon' => 'electronic.png'
        ]);

        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'icon' => 'fashion.png'
        ]);

        Category::create([
            'name' => 'Furniture',
            'slug' => 'furniture',
            'icon' => 'furniture.png'
        ]);

        Category::create([
            'name' => 'Places & Travels',
            'slug' => 'places-travels',
            'icon' => 'places-travels.png'
        ]);
    }
}
