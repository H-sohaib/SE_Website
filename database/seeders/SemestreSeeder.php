<?php

namespace Database\Seeders;

use App\Models\Semestre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semestres = [
            [
                'semestre_name' => 'semestre 1',
            ],
            [
                'semestre_name' => 'semestre 2',
            ],
            [
                'semestre_name' => 'semestre 3',
            ],
            [
                'semestre_name' => 'semestre 4',
            ],
        ];
        foreach ($semestres as $key => $semestre) {
            Semestre::create($semestre);
        };
    }
}