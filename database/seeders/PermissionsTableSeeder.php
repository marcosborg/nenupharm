<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'navigation_create',
            ],
            [
                'id'    => 18,
                'title' => 'navigation_edit',
            ],
            [
                'id'    => 19,
                'title' => 'navigation_show',
            ],
            [
                'id'    => 20,
                'title' => 'navigation_delete',
            ],
            [
                'id'    => 21,
                'title' => 'navigation_access',
            ],
            [
                'id'    => 22,
                'title' => 'banner_create',
            ],
            [
                'id'    => 23,
                'title' => 'banner_edit',
            ],
            [
                'id'    => 24,
                'title' => 'banner_show',
            ],
            [
                'id'    => 25,
                'title' => 'banner_delete',
            ],
            [
                'id'    => 26,
                'title' => 'banner_access',
            ],
            [
                'id'    => 27,
                'title' => 'feature_create',
            ],
            [
                'id'    => 28,
                'title' => 'feature_edit',
            ],
            [
                'id'    => 29,
                'title' => 'feature_show',
            ],
            [
                'id'    => 30,
                'title' => 'feature_delete',
            ],
            [
                'id'    => 31,
                'title' => 'feature_access',
            ],
            [
                'id'    => 32,
                'title' => 'quote_create',
            ],
            [
                'id'    => 33,
                'title' => 'quote_edit',
            ],
            [
                'id'    => 34,
                'title' => 'quote_show',
            ],
            [
                'id'    => 35,
                'title' => 'quote_delete',
            ],
            [
                'id'    => 36,
                'title' => 'quote_access',
            ],
            [
                'id'    => 37,
                'title' => 'about_create',
            ],
            [
                'id'    => 38,
                'title' => 'about_edit',
            ],
            [
                'id'    => 39,
                'title' => 'about_show',
            ],
            [
                'id'    => 40,
                'title' => 'about_delete',
            ],
            [
                'id'    => 41,
                'title' => 'about_access',
            ],
            [
                'id'    => 42,
                'title' => 'doctor_create',
            ],
            [
                'id'    => 43,
                'title' => 'doctor_edit',
            ],
            [
                'id'    => 44,
                'title' => 'doctor_show',
            ],
            [
                'id'    => 45,
                'title' => 'doctor_delete',
            ],
            [
                'id'    => 46,
                'title' => 'doctor_access',
            ],
            [
                'id'    => 47,
                'title' => 'contact_create',
            ],
            [
                'id'    => 48,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 49,
                'title' => 'contact_show',
            ],
            [
                'id'    => 50,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 51,
                'title' => 'contact_access',
            ],
            [
                'id'    => 52,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
