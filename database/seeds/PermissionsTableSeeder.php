<?php

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
                'title' => 'project_create',
            ],
            [
                'id'    => 18,
                'title' => 'project_edit',
            ],
            [
                'id'    => 19,
                'title' => 'project_show',
            ],
            [
                'id'    => 20,
                'title' => 'project_delete',
            ],
            [
                'id'    => 21,
                'title' => 'project_access',
            ],
            [
                'id'    => 22,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 23,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 24,
                'title' => 'news_create',
            ],
            [
                'id'    => 25,
                'title' => 'news_edit',
            ],
            [
                'id'    => 26,
                'title' => 'news_show',
            ],
            [
                'id'    => 27,
                'title' => 'news_delete',
            ],
            [
                'id'    => 28,
                'title' => 'news_access',
            ],
            [
                'id'    => 29,
                'title' => 'slider_create',
            ],
            [
                'id'    => 30,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 31,
                'title' => 'slider_show',
            ],
            [
                'id'    => 32,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 33,
                'title' => 'slider_access',
            ],
            [
                'id'    => 34,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 35,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 36,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 37,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 38,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 39,
                'title' => 'setting_create',
            ],
            [
                'id'    => 40,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 41,
                'title' => 'setting_show',
            ],
            [
                'id'    => 42,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 43,
                'title' => 'setting_access',
            ],
            [
                'id'    => 44,
                'title' => 'fajr_detail_access',
            ],
            [
                'id'    => 45,
                'title' => 'policy_create',
            ],
            [
                'id'    => 46,
                'title' => 'policy_edit',
            ],
            [
                'id'    => 47,
                'title' => 'policy_show',
            ],
            [
                'id'    => 48,
                'title' => 'policy_delete',
            ],
            [
                'id'    => 49,
                'title' => 'policy_access',
            ],
            [
                'id'    => 50,
                'title' => 'management_create',
            ],
            [
                'id'    => 51,
                'title' => 'management_edit',
            ],
            [
                'id'    => 52,
                'title' => 'management_show',
            ],
            [
                'id'    => 53,
                'title' => 'management_delete',
            ],
            [
                'id'    => 54,
                'title' => 'management_access',
            ],
            [
                'id'    => 55,
                'title' => 'section_create',
            ],
            [
                'id'    => 56,
                'title' => 'section_edit',
            ],
            [
                'id'    => 57,
                'title' => 'section_show',
            ],
            [
                'id'    => 58,
                'title' => 'section_delete',
            ],
            [
                'id'    => 59,
                'title' => 'section_access',
            ],
            [
                'id'    => 60,
                'title' => 'description_create',
            ],
            [
                'id'    => 61,
                'title' => 'description_edit',
            ],
            [
                'id'    => 62,
                'title' => 'description_show',
            ],
            [
                'id'    => 63,
                'title' => 'description_delete',
            ],
            [
                'id'    => 64,
                'title' => 'description_access',
            ],
            [
                'id'    => 65,
                'title' => 'success_partner_create',
            ],
            [
                'id'    => 66,
                'title' => 'success_partner_edit',
            ],
            [
                'id'    => 67,
                'title' => 'success_partner_show',
            ],
            [
                'id'    => 68,
                'title' => 'success_partner_delete',
            ],
            [
                'id'    => 69,
                'title' => 'success_partner_access',
            ],
            [
                'id'    => 70,
                'title' => 'crew_access',
            ],
            [
                'id'    => 71,
                'title' => 'crew_type_create',
            ],
            [
                'id'    => 72,
                'title' => 'crew_type_edit',
            ],
            [
                'id'    => 73,
                'title' => 'crew_type_show',
            ],
            [
                'id'    => 74,
                'title' => 'crew_type_delete',
            ],
            [
                'id'    => 75,
                'title' => 'crew_type_access',
            ],
            [
                'id'    => 76,
                'title' => 'fajr_crew_create',
            ],
            [
                'id'    => 77,
                'title' => 'fajr_crew_edit',
            ],
            [
                'id'    => 78,
                'title' => 'fajr_crew_show',
            ],
            [
                'id'    => 79,
                'title' => 'fajr_crew_delete',
            ],
            [
                'id'    => 80,
                'title' => 'fajr_crew_access',
            ],
            [
                'id'    => 81,
                'title' => 'jobresquest_create',
            ],
            [
                'id'    => 82,
                'title' => 'jobresquest_edit',
            ],
            [
                'id'    => 83,
                'title' => 'jobresquest_show',
            ],
            [
                'id'    => 84,
                'title' => 'jobresquest_delete',
            ],
            [
                'id'    => 85,
                'title' => 'jobresquest_access',
            ],
            [
                'id'    => 86,
                'title' => 'the_request_access',
            ],
            [
                'id'    => 87,
                'title' => 'quotation_request_create',
            ],
            [
                'id'    => 88,
                'title' => 'quotation_request_edit',
            ],
            [
                'id'    => 89,
                'title' => 'quotation_request_show',
            ],
            [
                'id'    => 90,
                'title' => 'quotation_request_delete',
            ],
            [
                'id'    => 91,
                'title' => 'quotation_request_access',
            ],
            [
                'id'    => 92,
                'title' => 'service_create',
            ],
            [
                'id'    => 93,
                'title' => 'service_edit',
            ],
            [
                'id'    => 94,
                'title' => 'service_show',
            ],
            [
                'id'    => 95,
                'title' => 'service_delete',
            ],
            [
                'id'    => 96,
                'title' => 'service_access',
            ],
            [
                'id'    => 97,
                'title' => 'said_about_us_create',
            ],
            [
                'id'    => 98,
                'title' => 'said_about_us_edit',
            ],
            [
                'id'    => 99,
                'title' => 'said_about_us_show',
            ],
            [
                'id'    => 100,
                'title' => 'said_about_us_delete',
            ],
            [
                'id'    => 101,
                'title' => 'said_about_us_access',
            ],
            [
                'id'    => 102,
                'title' => 'fa_q_create',
            ],
            [
                'id'    => 103,
                'title' => 'fa_q_edit',
            ],
            [
                'id'    => 104,
                'title' => 'fa_q_show',
            ],
            [
                'id'    => 105,
                'title' => 'fa_q_delete',
            ],
            [
                'id'    => 106,
                'title' => 'fa_q_access',
            ],
            [
                'id'    => 107,
                'title' => 'certificate_create',
            ],
            [
                'id'    => 108,
                'title' => 'certificate_edit',
            ],
            [
                'id'    => 109,
                'title' => 'certificate_show',
            ],
            [
                'id'    => 110,
                'title' => 'certificate_delete',
            ],
            [
                'id'    => 111,
                'title' => 'certificate_access',
            ],
            [
                'id'    => 112,
                'title' => 'contactu_access',
            ],
            [
                'id'    => 113,
                'title' => 'contact_create',
            ],
            [
                'id'    => 114,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 115,
                'title' => 'contact_show',
            ],
            [
                'id'    => 116,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 117,
                'title' => 'contact_access',
            ],
            [
                'id'    => 118,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
