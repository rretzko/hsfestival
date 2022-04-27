<?php

namespace Database\Seeders;

use App\Models\Vaccinationtype;
use Illuminate\Database\Seeder;

class VaccinationtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['none','one vaccination', 'two vaccinations', 'one booster', 'two boosters'];

        foreach($types AS $type) {

            Vaccinationtype::create([
                'descr' => $type,

            ]);
        }
    }
}
