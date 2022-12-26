<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home */
        Section::create(['page_id' => Page::where('name', 'home')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'home')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'home')->first()->id, 'name' => 'section_3']);
        Section::create(['page_id' => Page::where('name', 'home')->first()->id, 'name' => 'section_4']);
        Section::create(['page_id' => Page::where('name', 'home')->first()->id, 'name' => 'section_5']);

        /** Empresa */
        Section::create(['page_id' => Page::where('name', 'nosotros')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'nosotros')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'nosotros')->first()->id, 'name' => 'section_3']);
        Section::create(['page_id' => Page::where('name', 'nosotros')->first()->id, 'name' => 'section_4']);

        /** Calidad */
        Section::create(['page_id' => Page::where('name', 'calidad')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'calidad')->first()->id, 'name' => 'section_2']);

        /** Novedades */
        Section::create(['page_id' => Page::where('name', 'novedades')->first()->id, 'name' => 'section_1']);
    }
}
