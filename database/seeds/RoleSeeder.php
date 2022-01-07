<?php

use App\Model\admin\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Writer'
        ]);
        Role::create([
            'name' => 'Editor'
        ]);
        Role::create([
            'name' => 'Publisher'
        ]);
        Role::create([
            'name' => 'Super Admin'
        ]);
    }
}
