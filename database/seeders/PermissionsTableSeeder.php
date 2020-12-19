<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'user_management_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '17',
                'title'      => 'management_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '18',
                'title'      => 'category_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '19',
                'title'      => 'category_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '20',
                'title'      => 'category_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '21',
                'title'      => 'category_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '22',
                'title'      => 'category_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '23',
                'title'      => 'post_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '24',
                'title'      => 'post_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '25',
                'title'      => 'post_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '26',
                'title'      => 'post_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '27',
                'title'      => 'post_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '28',
                'title'      => 'tag_create',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '29',
                'title'      => 'tag_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '30',
                'title'      => 'tag_show',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '31',
                'title'      => 'tag_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => '32',
                'title'      => 'tag_access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Permission::insert($permissions);
    }
}
