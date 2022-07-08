<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $categories = [
            'FPS','MOBA','Action RPG', 'Survival'
        ];

        foreach($categories as $category){
            $new_categoty = new Category();
            $new_categoty->name = $category;
            $new_categoty->slug = Str::slug($category, '-');
            $new_categoty->save();
        }
            
    }
}
