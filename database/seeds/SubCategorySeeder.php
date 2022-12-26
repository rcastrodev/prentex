<?php

use App\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        SubCategory::create([
            'category_id'       => 2,
            'order'             => 'A1',
            'name'              => 'Guantes',
            'slug'              => Str::slug('Guantes', '-'),
        ]);

        SubCategory::create([
            'category_id'       => 2,
            'order'             => 'A1',
            'name'              => 'Mangas',
            'slug'              => Str::slug('Mangas', '-'),
        ]);
        
    }
}
