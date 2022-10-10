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
            
        User::factory(3)->create();

        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized'
        ]);

        Category::create([
            'name' => 'Meja TV',
            'slug' => 'meja-tv'
        ]);

        Category::create([
            'name' => 'Meja Tamu',
            'slug' => 'meja-tamu'
        ]);

        Products::factory(10)->create();
        
        // Products::create([
        //     'name' => 'Meja TV Minimalis Kekinian Ishana - TV Table Modern Multifungsi',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'meja-tv-minimalis-kekinian-ishana-tv-table-modern-multifungsi',
        //     'image_url' => 'https://decorunic.id/wp-content/uploads/2021/10/2-7-scaled.jpg',
        //     'file' => 'ishana.glb'
        // ]);

        // Products::create([
        //     'name' => 'Lina Lift Up Table - Meja Tamu Meja Kerja Minimalis',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'slug' => 'lina-lift-up-table-meja-tamu-minimalis',
        //     'image_url' => 'https://decorunic.id/wp-content/uploads/2021/10/2-7-scaled.jpg',
        //     'file' => 'luna-lift-up.glb'
        // ]);
    }
}
