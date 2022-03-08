<?php

namespace Database\Seeders;

use App\Models\Timeslot;
use Illuminate\Database\Seeder;

class TimeslotSeeder extends Seeder
{
    private $seeds;

    public function __construct()
    {
        $this->seeds = $this->buildSeeds();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->seeds AS $seed){

            Timeslot::create([
               'duration' => $seed[0],
               'descr' => $seed[1],
               'order_by' => $seed[2],
            ]);
        }
    }

    private function buildSeeds()
    {
        return [
            [20,'8:00',1,],
            [20,'8:20',2,],
            [20,'8:40',3,],
            [20,'9:00',4,],
            [20,'9:20',5,],
            [20,'9:40',6,],
            [20,'10:00',7,],
            [20,'10:20',8,],
            [20,'10:40',9,],
            [20,'11:00',10,],
            [20,'11:20',11,],
            [20,'11:40',12,],
            [20,'12:00',13,],
            [20,'12:20',14,],
            [20,'12:40',15,],
            [20,'1:00',16,],
            [20,'1:20',17,],
            [20,'1:40',18,],
            [20,'2:00',19,],
            [20,'2:20',20,],
            [20,'2:40',21,],
            [20,'3:00',22,],
            [20,'3:20',23,],
            [20,'3:40',24,],
            [20,'4:00',25,],
            [20,'4:20',26,],
            [20,'4:40',27,],
            [20,'5:00',28,],
            [20,'5:20',29,],
            [20,'5:40',30,],
            [20,'6:00',31,],
            [20,'6:20',32,],
            [20,'6:40',33,],
        ];
    }
}
