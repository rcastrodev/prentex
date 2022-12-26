<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'order'     => 'A1', 
            'name'      => 'Prentex', 
            'slug'      => Str::slug('Prentex', '-'), 
            'image'     => 'images/brands/Nomex.png',
        ]);

        Brand::create([
            'order'     => 'A2', 
            'name'      => 'De Pascale', 
            'slug'      => Str::slug('De Pascale', '-'), 
            'image'     => 'images/brands/Nomex.png',
        ]);

        Brand::create([
            'order'     => 'A3', 
            'name'      => '3M', 
            'slug'      => Str::slug('3M', '-'), 
            'image'     => 'images/brands/Nomex.png',
        ]);

        Brand::create([
            'order'     => 'A4', 
            'name'      => 'DuPont', 
            'slug'      => Str::slug('DuPont', '-'), 
            'image'     => 'images/brands/Nomex.png',
        ]);

        Brand::create([
            'order'     => 'A5', 
            'name'      => 'Mapa', 
            'slug'      => Str::slug('Mapa', '-'), 
            'image'     => 'images/brands/Nomex.png',
        ]);

        Brand::create([
            'order'     => 'A6', 
            'name'      => 'Libus', 
            'slug'      => Str::slug('Libus', '-'), 
            'image'     => 'images/brands/Nomex.png',
        ]);

        Brand::create([
            'order'     => 'A7', 
            'name'      => 'MSA', 
            'slug'      => Str::slug('MSA', '-'), 
            'image'     => 'images/brands/Nomex.png',
        ]);

        Brand::create([
            'order'     => 'A8', 
            'name'      => 'X - Urban', 
            'slug'      => Str::slug('X - Urban', '-'), 
            'image'     => 'images/brands/Nomex.png',
        ]);
    }
}
