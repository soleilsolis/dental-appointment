<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ToothType;

class ToothTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ToothType::insert([
            ['id' => '01', "name" => "Wisdom teeth", "type" => 'permanent'],
            ['id' => '02', "name" => "Second molar", "type" => 'permanent'],
            ['id' => '03', "name" => "First molar", "type" => 'permanent'],
            ['id' => '04', "name" => "Second premolar", "type" => 'permanent'],
            ['id' => '05', "name" => "First premolar", "type" => 'permanent'],
            ['id' => '06', "name" => "Canine", "type" => 'permanent'],
            ['id' => '07', "name" => "Lateral incisor", "type" => 'permanent'],
            ['id' => '08', "name" => "Central incisor", "type" => 'permanent'],
            ['id' => '09', "name" => "Central incisor", "type" => 'permanent'],
            ['id' => '10', "name" => "Lateral incisor", "type" => 'permanent'],
            ['id' => '11', "name" => "Canine", "type" => 'permanent'],
            ['id' => '12', "name" => "First premolar", "type" => 'permanent'],
            ['id' => '13', "name" => "Second premolar", "type" => 'permanent'],
            ['id' => '14', "name" => "First molar", "type" => 'permanent'],
            ['id' => '15', "name" => "Second molar", "type" => 'permanent'],
            ['id' => '16', "name" => "Wisdom teeth", "type" => 'permanent'],
            ['id' => '17', "name" => "Wisdom teeth", "type" => 'permanent'],
            ['id' => '18', "name" => "Second molar", "type" => 'permanent'],
            ['id' => '19', "name" => "First molar", "type" => 'permanent'],
            ['id' => '20', "name" => "Second premolar", "type" => 'permanent'],
            ['id' => '21', "name" => "First premolar", "type" => 'permanent'],
            ['id' => '22', "name" => "Canine", "type" => 'permanent'],
            ['id' => '23', "name" => "Lateral incisor", "type" => 'permanent'],
            ['id' => '24', "name" => "Central incisor", "type" => 'permanent'],
            ['id' => '25', "name" => "Central incisor", "type" => 'permanent'],
            ['id' => '26', "name" => "Lateral incisor", "type" => 'permanent'],
            ['id' => '27', "name" => "Canine", "type" => 'permanent'],
            ['id' => '28', "name" => "First premolar", "type" => 'permanent'],
            ['id' => '29', "name" => "Second premolar", "type" => 'permanent'],
            ['id' => '30', "name" => "First molar", "type" => 'permanent'],
            ['id' => '31', "name" => "Second molar", "type" => 'permanent'],
            ['id' => '32', "name" => "Wisdom teeth", "type" => 'permanent'],
            ['id' => 'A', "name" => 'Second molar', 'type' => 'baby'],
            ['id' => 'B', "name" => 'First molar', 'type' => 'baby'],
            ['id' => 'C', "name" => 'Canine', 'type' => 'baby'],
            ['id' => 'D', "name" => 'Lateral incisor', 'type' => 'baby'],
            ['id' => 'E', "name" => 'Central incisor', 'type' => 'baby'],
            ['id' => 'F', "name" => 'Central incisor', 'type' => 'baby'],
            ['id' => 'G', "name" => 'Lateral incisor', 'type' => 'baby'],
            ['id' => 'H', "name" => 'Canine', 'type' => 'baby'],
            ['id' => 'I', "name" => 'First molar', 'type' => 'baby'],
            ['id' => 'J', "name" => 'Second molar', 'type' => 'baby'],
        ]);
    }
}
