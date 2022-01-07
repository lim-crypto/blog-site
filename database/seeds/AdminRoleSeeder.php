<?php

use App\Model\admin\Admin_role;
use Illuminate\Database\Seeder;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Admin_role::create([
            'admin_id' => 1,
            'role_id' => 4,
            ]);
    }
}
