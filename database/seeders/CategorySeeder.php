<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $c = new Category();
        $c->cat_name ="Foods";
        $c->save();

        $c = new Category();
        $c->cat_name ="Toys";
        $c->save();

        $c = new Category();
        $c->cat_name ="Electronics";
        $c->save();

    }
}
