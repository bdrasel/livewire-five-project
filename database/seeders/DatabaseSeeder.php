<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $continents = [
            ['name' => 'Africa'],
            ['name' => 'Antarctica'],
            ['name' => 'Asia'],
            ['name' => 'Australia'],
            ['name' => 'Europe'],
            ['name' => 'North America'],
            ['name' => 'South America'],
        ];
        
        foreach ($continents as $continent) {
            \App\Models\Continent::factory()->create($continent)
                ->each(function ($c) {
                    $c->countries()->saveMany(Country::factory(10)->make());
                });
        }

        Product::factory(100)->create();
    }
}
