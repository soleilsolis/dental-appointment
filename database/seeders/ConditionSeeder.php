<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condition::insert(
            [
                ['code' => '✓', 'name' =>  'Present teeth'],
                ['code' => 'C', 'name' =>  'Carious teeth'],
                ['code' => 'M', 'name' =>  'Missing Teeth'],
                ['code' => 'X', 'name' =>  'Extraction due to caries'],
                ['code' => 'X', 'name' =>  'Exo due to other causes'],
                ['code' => 'Im', 'name' =>  'Impacted'],
                ['code' => 'Un', 'name' =>  'Unerupted'],
            ]
        );
    }
}
