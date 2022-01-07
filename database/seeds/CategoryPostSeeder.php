<?php

use App\Model\user\Category_post;
use Illuminate\Database\Seeder;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category_post::create([
            'post_id' => 1,
            'category_id' => 1,
        ]);
        Category_post::create([
            'post_id' => 2,
            'category_id' => 2,
        ]);
        Category_post::create([
            'post_id' => 3,
            'category_id' => 3,
        ]);
        Category_post::create([
            'post_id' => 4,
            'category_id' => 4,
        ]);
        Category_post::create([
            'post_id' => 5,
            'category_id' => 5,
        ]);
        Category_post::create([
            'post_id' => 6,
            'category_id' => 6,
        ]);
        Category_post::create([
            'post_id' => 7,
            'category_id' => 7,
        ]);
        Category_post::create([
            'post_id' => 8,
            'category_id' => 8,
        ]);
        Category_post::create([
            'post_id' => 9,
            'category_id' => 9,
        ]);
        Category_post::create([
            'post_id' => 10,
            'category_id' => 10,
        ]);
        Category_post::create([
            'post_id' => 11,
            'category_id' => 11,
        ]);
        Category_post::create([
            'post_id' => 12,
            'category_id' => 12,
        ]);
        Category_post::create([
            'post_id' => 13,
            'category_id' => 13,
        ]);
        Category_post::create([
            'post_id' => 14,
            'category_id' => 1,
        ]);
        Category_post::create([
            'post_id' => 15,
            'category_id' => 2,
        ]);
        Category_post::create([
            'post_id' => 16,
            'category_id' => 3,
        ]);
        Category_post::create([
            'post_id' => 17,
            'category_id' => 4,
        ]);
        Category_post::create([
            'post_id' => 18,
            'category_id' => 5,
        ]);
        Category_post::create([
            'post_id' => 19,
            'category_id' => 6,
        ]);
        Category_post::create([
            'post_id' => 20,
            'category_id' => 7,
        ]);


    }
}
