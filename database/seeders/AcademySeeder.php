<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Academy;
class AcademySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $academies = [
            [
                "name"=> "Securium Academy",
                "country"=> "Sector 1, Noida, India",
                "description"=> "Securium Academy",
                "website_url"=> "https://www.securiumacademy.com/",
                "status"=> "active",
            ]
        ];

        foreach ($academies as $academy) {
            Academy::create($academy);
        }
        $this->command->info('Academies seeding completed successfully.');
    }
}
