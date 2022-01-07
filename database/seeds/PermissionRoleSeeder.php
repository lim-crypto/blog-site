<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into permission_role (role_id,permission_id) values (1,1)');
        DB::insert('insert into permission_role (role_id,permission_id) values (1,2)');
        DB::insert('insert into permission_role (role_id,permission_id) values (1,3)');
        DB::insert('insert into permission_role (role_id,permission_id) values (1,8)');
        DB::insert('insert into permission_role (role_id,permission_id) values (1,9)');

        DB::insert('insert into permission_role (role_id,permission_id) values (2,2)');
        DB::insert('insert into permission_role (role_id,permission_id) values (2,8)');
        DB::insert('insert into permission_role (role_id,permission_id) values (2,9)');

        DB::insert('insert into permission_role (role_id,permission_id) values (3,2)');
        DB::insert('insert into permission_role (role_id,permission_id) values (3,3)');
        DB::insert('insert into permission_role (role_id,permission_id) values (3,4)');
        DB::insert('insert into permission_role (role_id,permission_id) values (3,8)');
        DB::insert('insert into permission_role (role_id,permission_id) values (3,9)');

        DB::insert('insert into permission_role (role_id,permission_id) values (4,1)');
        DB::insert('insert into permission_role (role_id,permission_id) values (4,2)');
        DB::insert('insert into permission_role (role_id,permission_id) values (4,3)');
        DB::insert('insert into permission_role (role_id,permission_id) values (4,4)');
        DB::insert('insert into permission_role (role_id,permission_id) values (4,5)');
        DB::insert('insert into permission_role (role_id,permission_id) values (4,6)');
        DB::insert('insert into permission_role (role_id,permission_id) values (4,7)');
        DB::insert('insert into permission_role (role_id,permission_id) values (4,8)');
        DB::insert('insert into permission_role (role_id,permission_id) values (4,9)');
        DB::insert('insert into permission_role (role_id,permission_id) values (4,10)');
        DB::insert('insert into permission_role (role_id,permission_id) values (4,11)');


    }
}
