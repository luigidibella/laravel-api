<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use App\Functions\Helper;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['HTML', 'CSS', 'JavaScript', 'php', 'C++'];
        foreach($data as $item ){
            $new_item = new Technology();
            $new_item->name = $item;
            $new_item->slug = Helper::generateSlug($item, Technology::class);
            $new_item->save();
        }
    }
}
