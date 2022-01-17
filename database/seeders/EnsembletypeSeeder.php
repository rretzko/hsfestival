<?php

namespace Database\Seeders;

use App\Models\Ensembletype;
use Illuminate\Database\Seeder;

class EnsembletypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = ['Mixed','Treble',"Men's"];

        foreach($seeds AS $seed){

            Ensembletype::create(['descr' => $seed]);
        }
    }
}
