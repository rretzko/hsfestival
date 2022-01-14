<?php

namespace Database\Seeders;

use App\Models\Phonetype;
use Illuminate\Database\Seeder;

class PhonetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phonetype::create([
           'descr' => 'mobile',
        ]);

        Phonetype::create([
            'descr' => 'work',
        ]);

        Phonetype::create([
            'descr' => 'home',
        ]);
    }
}
