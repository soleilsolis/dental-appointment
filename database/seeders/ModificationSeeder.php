<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modification;

class ModificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modification::insert(
            [
                ['code' => 'Am', 'name' =>  'Amalgam'],
                ['code' => 'Co', 'name' =>  'Composite'],
                ['code' => 'JC', 'name' =>  'Jacket Crown'],
                ['code' => 'Ab', 'name' =>  'Abutment'],
                ['code' => 'P', 'name' =>  'Pontic'],
                ['code' => 'In/On', 'name' =>  'Inlay/Onlay'],
                ['code' => 'Imp', 'name' =>  'Implant'],
                ['code' => 'S', 'name' =>  'Sealants'],
                ['code' => 'Rm', 'name' =>  'Removable Denture'],
            ]
        );

    }
}
