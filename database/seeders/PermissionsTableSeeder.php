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
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'membership_create',
            ],
            [
                'id'    => 19,
                'title' => 'membership_edit',
            ],
            [
                'id'    => 20,
                'title' => 'membership_show',
            ],
            [
                'id'    => 21,
                'title' => 'membership_delete',
            ],
            [
                'id'    => 22,
                'title' => 'membership_access',
            ],
            [
                'id'    => 23,
                'title' => 'membershiptype_create',
            ],
            [
                'id'    => 24,
                'title' => 'membershiptype_edit',
            ],
            [
                'id'    => 25,
                'title' => 'membershiptype_show',
            ],
            [
                'id'    => 26,
                'title' => 'membershiptype_delete',
            ],
            [
                'id'    => 27,
                'title' => 'membershiptype_access',
            ],
            [
                'id'    => 28,
                'title' => 'event_create',
            ],
            [
                'id'    => 29,
                'title' => 'event_edit',
            ],
            [
                'id'    => 30,
                'title' => 'event_show',
            ],
            [
                'id'    => 31,
                'title' => 'event_delete',
            ],
            [
                'id'    => 32,
                'title' => 'event_access',
            ],
            [
                'id'    => 33,
                'title' => 'location_create',
            ],
            [
                'id'    => 34,
                'title' => 'location_edit',
            ],
            [
                'id'    => 35,
                'title' => 'location_show',
            ],
            [
                'id'    => 36,
                'title' => 'location_delete',
            ],
            [
                'id'    => 37,
                'title' => 'location_access',
            ],
            [
                'id'    => 38,
                'title' => 'locationdate_create',
            ],
            [
                'id'    => 39,
                'title' => 'locationdate_edit',
            ],
            [
                'id'    => 40,
                'title' => 'locationdate_show',
            ],
            [
                'id'    => 41,
                'title' => 'locationdate_delete',
            ],
            [
                'id'    => 42,
                'title' => 'locationdate_access',
            ],
            [
                'id'    => 43,
                'title' => 'participant_create',
            ],
            [
                'id'    => 44,
                'title' => 'participant_edit',
            ],
            [
                'id'    => 45,
                'title' => 'participant_show',
            ],
            [
                'id'    => 46,
                'title' => 'participant_delete',
            ],
            [
                'id'    => 47,
                'title' => 'participant_access',
            ],
            [
                'id'    => 48,
                'title' => 'optiontype_create',
            ],
            [
                'id'    => 49,
                'title' => 'optiontype_edit',
            ],
            [
                'id'    => 50,
                'title' => 'optiontype_show',
            ],
            [
                'id'    => 51,
                'title' => 'optiontype_delete',
            ],
            [
                'id'    => 52,
                'title' => 'optiontype_access',
            ],
            [
                'id'    => 53,
                'title' => 'option_create',
            ],
            [
                'id'    => 54,
                'title' => 'option_edit',
            ],
            [
                'id'    => 55,
                'title' => 'option_show',
            ],
            [
                'id'    => 56,
                'title' => 'option_delete',
            ],
            [
                'id'    => 57,
                'title' => 'option_access',
            ],
            [
                'id'    => 58,
                'title' => 'organization_access',
            ],
            [
                'id'    => 59,
                'title' => 'eventversion_access',
            ],
            [
                'id'    => 60,
                'title' => 'school_management_access',
            ],
            [
                'id'    => 61,
                'title' => 'school_create',
            ],
            [
                'id'    => 62,
                'title' => 'school_edit',
            ],
            [
                'id'    => 63,
                'title' => 'school_show',
            ],
            [
                'id'    => 64,
                'title' => 'school_delete',
            ],
            [
                'id'    => 65,
                'title' => 'school_access',
            ],
            [
                'id'    => 66,
                'title' => 'ensemble_management_access',
            ],
            [
                'id'    => 67,
                'title' => 'ensembletype_create',
            ],
            [
                'id'    => 68,
                'title' => 'ensembletype_edit',
            ],
            [
                'id'    => 69,
                'title' => 'ensembletype_show',
            ],
            [
                'id'    => 70,
                'title' => 'ensembletype_delete',
            ],
            [
                'id'    => 71,
                'title' => 'ensembletype_access',
            ],
            [
                'id'    => 72,
                'title' => 'ensemble_create',
            ],
            [
                'id'    => 73,
                'title' => 'ensemble_edit',
            ],
            [
                'id'    => 74,
                'title' => 'ensemble_show',
            ],
            [
                'id'    => 75,
                'title' => 'ensemble_delete',
            ],
            [
                'id'    => 76,
                'title' => 'ensemble_access',
            ],
            [
                'id'    => 77,
                'title' => 'repertoire_create',
            ],
            [
                'id'    => 78,
                'title' => 'repertoire_edit',
            ],
            [
                'id'    => 79,
                'title' => 'repertoire_show',
            ],
            [
                'id'    => 80,
                'title' => 'repertoire_delete',
            ],
            [
                'id'    => 81,
                'title' => 'repertoire_access',
            ],
            [
                'id'    => 82,
                'title' => 'phonetype_create',
            ],
            [
                'id'    => 83,
                'title' => 'phonetype_edit',
            ],
            [
                'id'    => 84,
                'title' => 'phonetype_show',
            ],
            [
                'id'    => 85,
                'title' => 'phonetype_delete',
            ],
            [
                'id'    => 86,
                'title' => 'phonetype_access',
            ],
            [
                'id'    => 87,
                'title' => 'phone_create',
            ],
            [
                'id'    => 88,
                'title' => 'phone_edit',
            ],
            [
                'id'    => 89,
                'title' => 'phone_show',
            ],
            [
                'id'    => 90,
                'title' => 'phone_delete',
            ],
            [
                'id'    => 91,
                'title' => 'phone_access',
            ],
            [
                'id'    => 92,
                'title' => 'inventory_management_access',
            ],
            [
                'id'    => 93,
                'title' => 'inventorytype_create',
            ],
            [
                'id'    => 94,
                'title' => 'inventorytype_edit',
            ],
            [
                'id'    => 95,
                'title' => 'inventorytype_show',
            ],
            [
                'id'    => 96,
                'title' => 'inventorytype_delete',
            ],
            [
                'id'    => 97,
                'title' => 'inventorytype_access',
            ],
            [
                'id'    => 98,
                'title' => 'inventory_create',
            ],
            [
                'id'    => 99,
                'title' => 'inventory_edit',
            ],
            [
                'id'    => 100,
                'title' => 'inventory_show',
            ],
            [
                'id'    => 101,
                'title' => 'inventory_delete',
            ],
            [
                'id'    => 102,
                'title' => 'inventory_access',
            ],
            [
                'id'    => 103,
                'title' => 'cart_create',
            ],
            [
                'id'    => 104,
                'title' => 'cart_edit',
            ],
            [
                'id'    => 105,
                'title' => 'cart_show',
            ],
            [
                'id'    => 106,
                'title' => 'cart_delete',
            ],
            [
                'id'    => 107,
                'title' => 'cart_access',
            ],
            [
                'id'    => 108,
                'title' => 'payment_management_access',
            ],
            [
                'id'    => 109,
                'title' => 'paymenttype_create',
            ],
            [
                'id'    => 110,
                'title' => 'paymenttype_edit',
            ],
            [
                'id'    => 111,
                'title' => 'paymenttype_show',
            ],
            [
                'id'    => 112,
                'title' => 'paymenttype_delete',
            ],
            [
                'id'    => 113,
                'title' => 'paymenttype_access',
            ],
            [
                'id'    => 114,
                'title' => 'payment_create',
            ],
            [
                'id'    => 115,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 116,
                'title' => 'payment_show',
            ],
            [
                'id'    => 117,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 118,
                'title' => 'payment_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
