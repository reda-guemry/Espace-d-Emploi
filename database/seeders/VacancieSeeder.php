<?php

namespace Database\Seeders;

use App\Models\Vacancie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacancieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vacancie::factory(100) -> create() ;
    }
}
