<?php

use App\Model\admin\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Jerald Lim',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'status' => 1,
        ]);
    }
}
