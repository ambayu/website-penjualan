<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use App\Models\Level;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Level::factory(3)->create();


        User::create([
   
    'name' => 'admin',
    'user_name' => 'admin',
    'level_id' => mt_rand(1, 3),
    'email' => 'bayuichifo@gmail.com',
    'email_verified_at' => now(),
    'password' => bcrypt('123123'), // password


        ]);


        Menu::create([
            'name' => 'Bakso',
            'slug' => 'bakso',
            'category_id' => 2,
            'harga' => '10000',

        ]);


        Category::create([
            'name' => 'Minuman',
            'slug' => 'minuman',
            

        ]);

        Category::create([
            'name' => 'Makanan',
            'slug' => 'makanan',
           

        ]);


        // \App\Models\User::factory(10)->create();
    }
}
