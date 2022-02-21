<?php

namespace Database\Seeders;

use App\Models\Sightreading;
use Illuminate\Database\Seeder;

class SightreadingSeeder extends Seeder
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

            Sightreading::create([
               'name' => $seed['name'],
               'year_of' => $seed['year_of'],
               'cost' => $seed['cost'],
            ]);
        }
    }

    private function buildSeeds()
    {
        $a = [
          ['name' => '1999 Examples', 'year_of' => 1999, 'cost' => 40.00],
            ['name' => '2000 Examples', 'year_of' => 2000, 'cost' => 40.00],
            ['name' => '2001 Examples', 'year_of' => 2001, 'cost' => 40.00],
            ['name' => '2002 Examples', 'year_of' => 2002, 'cost' => 40.00],
            ['name' => '2003 Examples', 'year_of' => 2003, 'cost' => 40.00],
            ['name' => '2004 Examples', 'year_of' => 2004, 'cost' => 40.00],
            ['name' => '2005 Examples', 'year_of' => 2005, 'cost' => 40.00],
            ['name' => '2006 Examples', 'year_of' => 2006, 'cost' => 40.00],
            ['name' => '2007 Examples', 'year_of' => 2007, 'cost' => 40.00],
            ['name' => '2008 Examples', 'year_of' => 2008, 'cost' => 40.00],
            ['name' => '2009 Examples', 'year_of' => 2009, 'cost' => 40.00],
            ['name' => '2010 Examples', 'year_of' => 2010, 'cost' => 40.00],
            ['name' => '2011 Examples', 'year_of' => 2011, 'cost' => 40.00],
            ['name' => '2012 Examples', 'year_of' => 2012, 'cost' => 40.00],
            ['name' => '2013 Examples', 'year_of' => 2013, 'cost' => 40.00],
            ['name' => '2014 Examples', 'year_of' => 2014, 'cost' => 40.00],
            ['name' => '2015 Examples', 'year_of' => 2015, 'cost' => 40.00],
            ['name' => '2016 Examples', 'year_of' => 2016, 'cost' => 40.00],
            ['name' => '2017 Examples', 'year_of' => 2017, 'cost' => 40.00],
            ['name' => '2018 Examples', 'year_of' => 2018, 'cost' => 40.00],
            ['name' => '2019 Examples', 'year_of' => 2019, 'cost' => 40.00],
            ['name' => '2020 Examples', 'year_of' => 2020, 'cost' => 40.00],
            ['name' => '2021 Examples', 'year_of' => 2021, 'cost' => 40.00],
            ['name' => '2022 Examples', 'year_of' => 2022, 'cost' => 40.00],
        ];

        return $a;
    }
}
