<?php

namespace Database\Seeders;

use App\Models\Membershiptype;
use Illuminate\Database\Seeder;

class MembershiptypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['active','industry', 'life', 'life-sustaining', 'retiree', 'student',];

        foreach($types AS $type) {

            Membershiptype::create([
                'descr' => $type,

            ]);
        }
    }
}
