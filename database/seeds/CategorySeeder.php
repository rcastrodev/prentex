<?php

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'order'             => 'A1',
            'image'             => 'images/category/Group12.png',
            'name'              => 'PROTECCIÓN CRANEANA',
            'slug'              => Str::slug('PROTECCIÓN CRANEANA', '-'),
            'outstanding'       => '1',
        ]);


        Category::create([
            'order'             => 'A2',
            'image'             => 'images/category/Group12.png',
            'name'              => 'MIEMBROS SUPERIORES',
            'slug'              => Str::slug('MIEMBROS SUPERIORES', '-'),
            'outstanding'       => '1',
        ]);

        Category::create([
            'order'             => 'A3',
            'image'             => 'images/category/Group12.png',
            'name'              => 'MIEMBROS INFERIORES',
            'slug'              => Str::slug('MIEMBROS INFERIORES', '-'),
            'outstanding'       => '1',
        ]);

        Category::create([
            'order'             => 'A4',
            'image'             => 'images/category/Group12.png',
            'name'              => 'PROTECCIÓN AUDITIVA',
            'slug'              => Str::slug('PROTECCIÓN AUDITIVA', '-'),
            'outstanding'       => '1',
        ]);

        Category::create([
            'order'             => 'A5',
            'image'             => 'images/category/Group12.png',
            'name'              => 'PROTECCIÓN VISUAL Y FACIAL',
            'slug'              => Str::slug('PROTECCIÓN VISUAL Y FACIAL', '-'),
            'outstanding'       => '1',
        ]);

        Category::create([
            'order'             => 'A6',
            'image'             => 'images/category/Group12.png',
            'name'              => 'PROTECCIÓN RESPIRATORIA',
            'slug'              => Str::slug('PROTECCIÓN RESPIRATORIA', '-'),
            'outstanding'       => '1',
        ]);

        Category::create([
            'order'             => 'A7',
            'image'             => 'images/category/Group12.png',
            'name'              => 'INDUMENTARIA',
            'slug'              => Str::slug('INDUMENTARIA', '-'),
            'outstanding'       => '1',
        ]);

        Category::create([
            'order'             => 'A8',
            'image'             => 'images/category/Group12.png',
            'name'              => 'ERGONÓMICOS',
            'slug'              => Str::slug('ERGONÓMICOS', '-'),
            'outstanding'       => '1',
        ]);

        Category::create([
            'order'             => 'A9',
            'image'             => 'images/category/Group12.png',
            'name'              => 'ACCESORIOS',
            'slug'              => Str::slug('ACCESORIOS', '-'),
            'outstanding'       => '1',
        ]);
    }
}
