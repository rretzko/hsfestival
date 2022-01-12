<?php

namespace Database\Seeders;

use App\Models\Optiontype;
use Illuminate\Database\Seeder;

class OptiontypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Optiontype::create(['descr' => 'boolean']);
        Optiontype::create(['descr' => 'checkbox']);
    }
}
