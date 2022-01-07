<?php

use App\Model\admin\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Create-Post',
            'for' => 'Post',
        ]);
        Permission::create([
            'name' => 'Update-Post',
            'for' => 'Post',
        ]);
        Permission::create([
            'name' => 'Delete-Post',
            'for' => 'Post',
        ]);

        Permission::create([
            'name' => 'Publish-Post',
            'for' => 'Post',
        ]);



        Permission::create([
            'name' => 'Create-User',
            'for' => 'User',
        ]);
        Permission::create([
            'name' => 'Update-User',
            'for' => 'User',
        ]);
        Permission::create([
            'name' => 'Delete-User',
            'for' => 'User',
        ]);



        Permission::create([
            'name' => 'Tag-CRUD',
            'for' => 'Other',
        ]);
        Permission::create([
            'name' => 'Category-CRUD',
            'for' => 'Other',
        ]);

        Permission::create([
            'name' => 'Role-CRUD',
            'for' => 'Other',
        ]);
        Permission::create([
            'name' => 'Permission-CRUD',
            'for' => 'Other',
        ]);
    }
}
