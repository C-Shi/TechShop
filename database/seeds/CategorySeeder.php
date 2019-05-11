<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name' => 'Laptop'
        ]);

        Category::create([
            'name' => 'Desktop'
        ]);

        Category::create([
            'name' => 'Tablet'
        ]);

        Category::create([
            'name' => 'Cellphone'
        ]);
    }
}
