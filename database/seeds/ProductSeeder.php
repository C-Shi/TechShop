<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'name' => 'Macbook Pro 2019',
            'description' => 'The latest powered laptop. Desired for work and gaming. The most powerful laptop in the world',
            'price' => 249999,
            'stock' => 14
        ]);

        Product::create([
            'name' => 'Macbook Air Traditional',
            'description' => 'Entry level apple laptop. Good for student and younger developer',
            'price' => 129999,
            'stock' => 15
        ]);

        Product::create([
            'name' => 'Lenovo Y530',
            'description' => 'This 15.6-inch laptop gives you exactly what you need for a gaming experience that balances performance and portability. It\'s breathtakingly sleek design includes a three-sided narrow bezel for a more immersive gaming experience. The latest-generation specs include GTX graphics and Intel Core i7 six core processors, which guarantee you serious gaming power. Thermally optimized to run cooler and quieter with a full-sized white-backlit keyboard, the Lenovo Legion Y530 Laptop is primed for those who demand gaming wherever life takes them',
            'price' => 109999,
            'stock' => 10
        ]);
    }
}
