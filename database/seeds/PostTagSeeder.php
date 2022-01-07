<?php

use App\Model\user\Post;
use App\Model\user\Post_tag;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post_tag::create([
            'post_id' => 1,
            'tag_id' => 1,
        ]);
        Post_tag::create([
            'post_id' => 2,
            'tag_id' => 2,
        ]);
        Post_tag::create([
            'post_id' => 3,
            'tag_id' => 3,
        ]);
        Post_tag::create([
            'post_id' => 4,
            'tag_id' => 4,
        ]);
        Post_tag::create([
            'post_id' => 5,
            'tag_id' => 5,
        ]);
        Post_tag::create([
            'post_id' => 6,
            'tag_id' => 6,
        ]);
        Post_tag::create([
            'post_id' => 7,
            'tag_id' => 7,
        ]);
        Post_tag::create([
            'post_id' => 8,
            'tag_id' => 8,
        ]);
        Post_tag::create([
            'post_id' => 9,
            'tag_id' => 9,
        ]);
        Post_tag::create([
            'post_id' => 10,
            'tag_id' => 10,
        ]);
        Post_tag::create([
            'post_id' => 11,
            'tag_id' => 1,
        ]);
        Post_tag::create([
            'post_id' => 12,
            'tag_id' => 2,
        ]);
        Post_tag::create([
            'post_id' => 13,
            'tag_id' => 3,
        ]);
        Post_tag::create([
            'post_id' => 14,
            'tag_id' => 4,
        ]);
        Post_tag::create([
            'post_id' => 15,
            'tag_id' => 5,
        ]);
        Post_tag::create([
            'post_id' => 16,
            'tag_id' => 6,
        ]);
        Post_tag::create([
            'post_id' => 17,
            'tag_id' => 7,
        ]);
        Post_tag::create([
            'post_id' => 18,
            'tag_id' => 8,
        ]);
        Post_tag::create([
            'post_id' => 19,
            'tag_id' => 9,
        ]);
        Post_tag::create([
            'post_id' => 20,
            'tag_id' => 10,
        ]);


    }
}
