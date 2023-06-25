<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [
                'semestre_id' => 1,
                'module_num' => 1,
                'module_name' => 'LANGUES ET TEC',
            ],
            [
                'semestre_id' => 1,
                'module_num' => 2,
                'module_name' => 'ELECTRONIQUE ANALOGIQUE ET NUMERIQUE',
            ],
            [
                'semestre_id' => 1,
                'module_num' => 3,
                'module_name' => 'MATHEMATIQUES',
            ],
            [
                'semestre_id' => 1,
                'module_num' => 4,
                'module_name' => 'INFORMATIQUE',
            ],
            // S2
            [
                'semestre_id' => 2,
                'module_num' => 5,
                'module_name' => 'MATHS-INFO ET RESEAUX',
            ],
            [
                'semestre_id' => 2,
                'module_num' => 6,
                'module_name' => 'ARCHITECTURE DES SYSTEMES EMBARQUÉS',
            ],
            [
                'semestre_id' => 2,
                'module_num' => 7,
                'module_name' => 'AUTOMATISMES INDUSTRIELS',
            ],
            [
                'semestre_id' => 2,
                'module_num' => 8,
                'module_name' => 'ELECTRONIQUE ET INSTRUMENTATION',
            ],
            // S3
            [
                'semestre_id' => 3,
                'module_num' => 9,
                'module_name' => 'INFORMATIQUE EMBARQUÉE',
            ],
            [
                'semestre_id' => 3,
                'module_num' => 10,
                'module_name' => 'TRAITEMENT DE L’INFORMATION',
            ],
            [
                'semestre_id' => 3,
                'module_num' => 11,
                'module_name' => 'AUTOMATIQUE ET RESEAUX LOCAUX',
            ],
            [
                'semestre_id' => 3,
                'module_num' => 12,
                'module_name' => 'PROGRAMMATION ET SECURITE DES SYSTEMES EMBARQUÉS',
            ],
            // S4
            [
                'semestre_id' => 4,
                'module_num' => 13,
                'module_name' => 'COMMUNICATION ET CULTURE DE L’ENTREPRISE',
            ],
            [
                'semestre_id' => 4,
                'module_num' => 14,
                'module_name' => 'SYSTEME EMBARQUES AVANCES',
            ],
            [
                'semestre_id' => 4,
                'module_num' => 15,
                'module_name' => 'PROJET DE FIN D’ÉTUDES',
            ],
            [
                'semestre_id' => 4,
                'module_num' => 16,
                'module_name' => 'STAGE DE FIN D’ETUDES',
            ],
        ];

        foreach ($modules as $key => $module) {
            Module::create($module);
        };
    }
}