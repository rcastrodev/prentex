<?php

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'order' => 'A1', 
            'name'  => 'Abrasión', 
            'slug'  => Str::of('Abrasión')->slug('-'), 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A2', 
            'name'  => 'Corte', 
            'slug'  => Str::of('Corte')->slug('-'), 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A3', 
            'name'  => 'Desgarre', 
            'slug'  => Str::of('Desgarre')->slug('-'), 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A4', 
            'slug'  =>  Str::of('Perforación')->slug('-'), 
            'name'  => 'Perforación', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A5', 
            'slug'  => Str::of('Fuego')->slug('-'), 
            'name'  => 'Fuego', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A6', 
            'slug'  => Str::of('Eléctrico')->slug('-'), 
            'name'  => 'Eléctrico', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A7', 
            'slug'  => Str::of('Soldador')->slug('-'), 
            'name'  => 'Soldador', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A8', 
            'slug'  => Str::of('Calor')->slug('-'), 
            'name'  => 'Calor', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A9', 
            'slug'  => Str::of('Bajas temperaturas')->slug('-'), 
            'name'  => 'Bajas temperaturas', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A10', 
            'slug'  => Str::of('Liquidos Abrasivos')->slug('-'), 
            'name'  => 'Liquidos Abrasivos', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A11', 
            'slug'  => Str::of('Lluvia')->slug('-'), 
            'name'  => 'Lluvia', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A12', 
            'slug'  => Str::of('Lumbar')->slug('-'), 
            'name'  => 'Lumbar', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A13', 
            'slug'  => Str::of('Altura')->slug('-'), 
            'name'  => 'Altura', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);

        Tag::create([
            'order' => 'A14', 
            'slug'  => Str::of('Ruido')->slug('-'), 
            'name'  => 'Ruido', 
            'image' => 'images/tags/healthicons.svg',
            'outstanding' => 1
        ]);
    }
}
