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
            ['id' => '01', "image_path" => "/storage/tooth/1.png","name" => "Wisdom teeth", "type" => 'permanent'],
            ['id' => '02', "image_path" => "/storage/tooth/2.png","name" => "Second molar", "type" => 'permanent'],
            ['id' => '03', "image_path" => "/storage/tooth/3.png","name" => "First molar", "type" => 'permanent'],
            ['id' => '04', "image_path" => "/storage/tooth/4.png","name" => "Second premolar", "type" => 'permanent'],
            ['id' => '05', "image_path" => "/storage/tooth/5.png","name" => "First premolar", "type" => 'permanent'],
            ['id' => '06', "image_path" => "/storage/tooth/6.png","name" => "Canine", "type" => 'permanent'],
            ['id' => '07', "image_path" => "/storage/tooth/7.png","name" => "Lateral incisor", "type" => 'permanent'],
            ['id' => '08', "image_path" => "/storage/tooth/8.png","name" => "Central incisor", "type" => 'permanent'],
            ['id' => '09', "image_path" => "/storage/tooth/9.png","name" => "Central incisor", "type" => 'permanent'],
            ['id' => '10', "image_path" => "/storage/tooth/10.png","name" => "Lateral incisor", "type" => 'permanent'],
            ['id' => '11', "image_path" => "/storage/tooth/11.png","name" => "Canine", "type" => 'permanent'],
            ['id' => '12', "image_path" => "/storage/tooth/12.png","name" => "First premolar", "type" => 'permanent'],
            ['id' => '13', "image_path" => "/storage/tooth/13.png","name" => "Second premolar", "type" => 'permanent'],
            ['id' => '14', "image_path" => "/storage/tooth/14.png","name" => "First molar", "type" => 'permanent'],
            ['id' => '15', "image_path" => "/storage/tooth/15.png","name" => "Second molar", "type" => 'permanent'],
            ['id' => '16', "image_path" => "/storage/tooth/16.png","name" => "Wisdom teeth", "type" => 'permanent'],
            ['id' => '17', "image_path" => "/storage/tooth/17.png","name" => "Wisdom teeth", "type" => 'permanent'],
            ['id' => '18', "image_path" => "/storage/tooth/18.png","name" => "Second molar", "type" => 'permanent'],
            ['id' => '19', "image_path" => "/storage/tooth/19.png","name" => "First molar", "type" => 'permanent'],
            ['id' => '20', "image_path" => "/storage/tooth/20.png","name" => "Second premolar", "type" => 'permanent'],
            ['id' => '21', "image_path" => "/storage/tooth/21.png","name" => "First premolar", "type" => 'permanent'],
            ['id' => '22', "image_path" => "/storage/tooth/22.png","name" => "Canine", "type" => 'permanent'],
            ['id' => '23', "image_path" => "/storage/tooth/23.png","name" => "Lateral incisor", "type" => 'permanent'],
            ['id' => '24', "image_path" => "/storage/tooth/24.png","name" => "Central incisor", "type" => 'permanent'],
            ['id' => '25', "image_path" => "/storage/tooth/25.png","name" => "Central incisor", "type" => 'permanent'],
            ['id' => '26', "image_path" => "/storage/tooth/26.png","name" => "Lateral incisor", "type" => 'permanent'],
            ['id' => '27', "image_path" => "/storage/tooth/27.png","name" => "Canine", "type" => 'permanent'],
            ['id' => '28', "image_path" => "/storage/tooth/28.png","name" => "First premolar", "type" => 'permanent'],
            ['id' => '29', "image_path" => "/storage/tooth/29.png","name" => "Second premolar", "type" => 'permanent'],
            ['id' => '30', "image_path" => "/storage/tooth/30.png","name" => "First molar", "type" => 'permanent'],
            ['id' => '31', "image_path" => "/storage/tooth/31.png","name" => "Second molar", "type" => 'permanent'],
            ['id' => '32', "image_path" => "/storage/tooth/32.png","name" => "Wisdom teeth", "type" => 'permanent'],
            ['id' => 'A', "image_path" => null,"name" => 'Second molar', 'type' => 'baby'],
            ['id' => 'B', "image_path" => null,"name" => 'First molar', 'type' => 'baby'],
            ['id' => 'C', "image_path" => null,"name" => 'Canine', 'type' => 'baby'],
            ['id' => 'D', "image_path" => null,"name" => 'Lateral incisor', 'type' => 'baby'],
            ['id' => 'E', "image_path" => null,"name" => 'Central incisor', 'type' => 'baby'],
            ['id' => 'F', "image_path" => null,"name" => 'Central incisor', 'type' => 'baby'],
            ['id' => 'G', "image_path" => null,"name" => 'Lateral incisor', 'type' => 'baby'],
            ['id' => 'H', "image_path" => null,"name" => 'Canine', 'type' => 'baby'],
            ['id' => 'I', "image_path" => null,"name" => 'First molar', 'type' => 'baby'],
            ['id' => 'J', "image_path" => null,"name" => 'Second molar', 'type' => 'baby'],
        ]);
    }
}
