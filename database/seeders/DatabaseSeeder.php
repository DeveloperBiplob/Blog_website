<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        // \App\Models\Admin::factory(10)->create();

        Admin::create([
            'name' => 'Biplob',
            'email' => 'biplob@gmial.com',
            'password' => bcrypt('laravel'),
        ]);
    }
}
