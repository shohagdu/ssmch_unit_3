<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\AllSetting;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DistrictSeeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        $this->call([
            DistrictSeeder::class,
        ]);

        // Disable foreign key checks (optional but useful if you have constraints)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the table
        DB::table('all_settings')->truncate();

        // Enable foreign key checks again
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $settings=[
        // 1= Religion, 2 = Occupations, 3 = Education Status, 4= Monthly Income, 5 =  Blood Group
            [
            'title'         => 'Islam',
            'type'          => 1,
            'display_order' => 1,
            'is_active'     => 1
            ],[
            'title'         => 'Hindus',
            'type'          => 1,
            'display_order' => 2,
            'is_active'     => 1,
            ],[
            'title'         => 'Buddhists',
            'type'          => 1,
            'display_order' => 3,
            'is_active'     => 1,
            ],[
            'title'         => 'Christianity',
            'type'          => 1,
            'display_order' => 4,
            'is_active'     => 1,
            ],[
            'title'         => 'Other Religions',
            'type'          => 1,
            'display_order' => 5,
            'is_active'     => 1,
            ],[
            'title'         => 'Housewife',
            'type'          => 2,
            'display_order' => 1,
            'is_active'     => 1,
            ],[
            'title'         => 'Farmer',
            'type'          => 2,
            'display_order' => 2,
            'is_active'     => 1,
            ],[
            'title'         => 'Day Labour',
            'type'          => 2,
            'display_order' => 3,
            'is_active'     => 1,
            ],[
            'title'         => 'Business',
            'type'          => 2,
            'display_order' => 4,
            'is_active'     => 1,
            ],[
            'title'         => 'Student',
            'type'          => 2,
            'display_order' => 5,
            'is_active'     => 1,
            ],[
            'title'         => 'Govt. Service',
            'type'          => 2,
            'display_order' => 6,
            'is_active'     => 1,
            ],[
            'title'         => 'Private Service',
            'type'          => 2,
            'display_order' => 7,
            'is_active'     => 1,
            ],[
            'title'         => 'Others',
            'type'          => 2,
            'display_order' => 8,
            'is_active'     => 1,
            ],[
            'title'         => 'Garments Worker',
            'type'          => 2,
            'display_order' => 9,
            'is_active'     => 1,
            ],[
            'title'         => 'Journalist',
            'type'          => 2,
            'display_order' => 10,
            'is_active'     => 1,
            ],

            [
            'title'         => 'Primary',
            'type'          => 3,
            'display_order' => 1,
            'is_active'     => 1,
            ],[
            'title'         => 'Secondary',
            'type'          => 3,
            'display_order' => 2,
            'is_active'     => 1,
            ],[
            'title'         => 'SSC',
            'type'          => 3,
            'display_order' => 2,
            'is_active'     => 1,
            ],[
            'title'         => 'HSC',
            'type'          => 3,
            'display_order' => 2,
            'is_active'     => 1,
            ],[
            'title'         => 'Graduate',
            'type'          => 3,
            'display_order' => 2,
            'is_active'     => 1,
            ],[
            'title'         => 'Illiterate ',
            'type'          => 3,
            'display_order' => 2,
            'is_active'     => 1,
            ],[
            'title'         => 'Post graduate',
            'type'          => 3,
            'display_order' => 2,
            'is_active'     => 1,
            ],[
            'title'         => 'Masters',
            'type'          => 3,
            'display_order' => 2,
            'is_active'     => 1,
            ],

            [
            'title'         => '<5000',
            'type'          => 4,
            'display_order' => 1,
            'is_active'     => 1,
            ],[
            'title'         => '>5000',
            'type'          => 4,
            'display_order' => 2,
            'is_active'     => 1,
            ],

            [
            'title'         => 'A+',
            'type'          => 5,
            'display_order' => 1,
            'is_active'     => 1
            ],[
            'title'         => 'A-',
            'type'          => 5,
            'display_order' => 2,
            'is_active'     => 1
            ],[
            'title'         => 'B+',
            'type'          => 5,
            'display_order' => 3,
            'is_active'     => 1
            ],[
            'title'         => 'B-',
            'type'          => 5,
            'display_order' => 4,
            'is_active'     => 1
            ],[
            'title'         => 'AB+',
            'type'          => 5,
            'display_order' => 5,
            'is_active'     => 1
            ],[
            'title'         => 'AB-',
            'type'          => 5,
            'display_order' => 6,
            'is_active'     => 1
            ],[
            'title'         => 'O+',
            'type'          => 5,
            'display_order' => 7,
            'is_active'     => 1
            ],[
            'title'         => 'O-',
            'type'          => 5,
            'display_order' => 8,
            'is_active'     => 1
            ],
        ];

        foreach ($settings as $setting) {
            AllSetting::create($setting);
        }
    }
}
