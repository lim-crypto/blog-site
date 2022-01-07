<?php

use App\Model\user\Tag;
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
        //fake word for name
        Tag::create([
            'name' => 'Lorem',
            'slug' => 'lorem',
        ]);
        Tag::create([
            'name' => 'Ipsum',
            'slug' => 'ipsum',
        ]);
        Tag::create([
            'name' => 'Dolor',
            'slug' => 'dolor',
        ]);
        Tag::create([
            'name' => 'Sit',
            'slug' => 'sit',
        ]);
        Tag::create([
            'name' => 'Amet',
            'slug' => 'amet',
        ]);
        Tag::create([
            'name' => 'Consectetur',
            'slug' => 'consectetur',
        ]);
        Tag::create([
            'name' => 'Adipiscing',
            'slug' => 'adipiscing',
        ]);
        Tag::create([
            'name' => 'Elit',
            'slug' => 'elit',
        ]);
        Tag::create([
            'name' => 'Etiam',
            'slug' => 'etiam',
        ]);
        Tag::create([
            'name' => 'Fusce',
            'slug' => 'fusce',
        ]);






    }
}
