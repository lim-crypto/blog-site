<?php

use App\Model\user\Category;
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
            'name' => 'Personal blogs',
            'slug' => 'personal-blogs',
        ]);
        Category::create([
            'name' => 'Travel blogs',
            'slug' => 'travel-blogs',
        ]);
        Category::create([
            'name' => 'Food blogs',
            'slug' => 'food-blogs',
        ]);
        Category::create([
            'name' => 'Health blogs',
            'slug' => 'health-blogs',
        ]);
        Category::create([
            'name' => 'Fashion blogs',
            'slug' => 'fashion-blogs',
        ]);
        Category::create([
            'name' => 'Lifestyle blogs',
            'slug' => 'lifestyle-blogs',
        ]);
        Category::create([
            'name' => 'Technology blogs',
            'slug' => 'technology-blogs',
        ]);
        Category::create([
            'name' => 'Business blogs',
            'slug' => 'business-blogs',
        ]);
        Category::create([
            'name' => 'Photography blogs',
            'slug' => 'photography-blogs',
        ]);
        Category::create([
            'name' => 'Music blogs',
            'slug' => 'music-blogs',
        ]);
        Category::create([
            'name' => 'Fitness blogs',
            'slug' => 'fitness-blogs',
        ]);
        Category::create([
            'name' => 'Education blogs',
            'slug' => 'education-blogs',
        ]);
        Category::create([
            'name' => 'News blogs',
            'slug' => 'news-blogs',
        ]);
    }
}
