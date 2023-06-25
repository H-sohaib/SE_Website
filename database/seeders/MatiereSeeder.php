<?php

namespace Database\Seeders;

use App\Models\Matiere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matieres = [
            [
                'semestre_id' => 1,
                'module_id' => 1,
                'matiere_name' => "Technique d'expression et de Communication",
            ],
            [
                'semestre_id' => 1,
                'module_id' => 1,
                'matiere_name' => 'Francais',
            ],
            [
                'semestre_id' => 1,
                'module_id' => 1,
                'matiere_name' => 'Anglais',
            ],
            // M2
            [
                'semestre_id' => 1,
                'module_id' => 2,
                'matiere_name' => 'Circuit Electriques',
            ],
            [
                'semestre_id' => 1,
                'module_id' => 2,
                'matiere_name' => 'Electronique Analogique',
            ],
            [
                'semestre_id' => 1,
                'module_id' => 2,
                'matiere_name' => 'Electronique Numérique',
            ],
            // M3
            [
                'semestre_id' => 1,
                'module_id' => 3,
                'matiere_name' => 'Algèbre',
            ],
            [
                'semestre_id' => 1,
                'module_id' => 3,
                'matiere_name' => 'Analyse',
            ],
            // M4
            [
                'semestre_id' => 1,
                'module_id' => 4,
                'matiere_name' => 'Algorithmique',
            ],
            [
                'semestre_id' => 1,
                'module_id' => 4,
                'matiere_name' => 'Programmation C',
            ],
            [
                'semestre_id' => 1,
                'module_id' => 4,
                'matiere_name' => 'Programmation Python',
            ],
            // M5
            [
                'semestre_id' => 2,
                'module_id' => 5,
                'matiere_name' => 'Mathématique Appliquée',
            ],
            [
                'semestre_id' => 2,
                'module_id' => 5,
                'matiere_name' => 'Programmation Matlab',
            ],
            [
                'semestre_id' => 2,
                'module_id' => 5,
                'matiere_name' => 'Réseaux Informatiques',
            ],
            // M6
            [
                'semestre_id' => 2,
                'module_id' => 6,
                'matiere_name' => 'Architecture des Systèmes et Microprocesseurs',
            ],
            [
                'semestre_id' => 2,
                'module_id' => 6,
                'matiere_name' => 'Microcontrôleurs',
            ],
            // M7
            [
                'semestre_id' => 2,
                'module_id' => 7,
                'matiere_name' => 'Automatismes et API',
            ],
            [
                'semestre_id' => 2,
                'module_id' => 7,
                'matiere_name' => 'Capteurs et Actionneurs',
            ],
            // M8
            [
                'semestre_id' => 2,
                'module_id' => 8,
                'matiere_name' => 'Electronique Avancée',
            ],
            [
                'semestre_id' => 2,
                'module_id' => 8,
                'matiere_name' => 'Instrumentation Classique et Virtuelle',
            ],
            [
                'semestre_id' => 2,
                'module_id' => 8,
                'matiere_name' => 'Travaux de Réalisation',
            ],
            // M9
            [
                'semestre_id' => 3,
                'module_id' => 9,
                'matiere_name' => 'Noyau Embarqué et Programmation Temps Réel',
            ],
            [
                'semestre_id' => 3,
                'module_id' => 9,
                'matiere_name' => 'Programmation Embarquée',
            ],
            // M10
            [
                'semestre_id' => 3,
                'module_id' => 10,
                'matiere_name' => 'Traitement de Signal',
            ],
            [
                'semestre_id' => 3,
                'module_id' => 10,
                'matiere_name' => 'Traitement d’Image',
            ],
            // M11
            [
                'semestre_id' => 3,
                'module_id' => 11,
                'matiere_name' => 'Automatique des Systèmes Linéaires',
            ],
            [
                'semestre_id' => 3,
                'module_id' => 11,
                'matiere_name' => 'Réseaux Locaux Industriels',
            ],
            // M12
            [
                'semestre_id' => 3,
                'module_id' => 12,
                'matiere_name' => 'Programmation Mobile',
            ],
            [
                'semestre_id' => 3,
                'module_id' => 12,
                'matiere_name' => 'Internet des Objet (Iot) et Technologie Web',
            ],
            [
                'semestre_id' => 3,
                'module_id' => 12,
                'matiere_name' => 'Introduction à La Sécurité des Systèmes Embarqués',
            ],
            // M13
            [
                'semestre_id' => 4,
                'module_id' => 13,
                'matiere_name' => 'Culture de l’Entreprise',
            ],
            [
                'semestre_id' => 4,
                'module_id' => 13,
                'matiere_name' => 'Anglais',
            ],
            [
                'semestre_id' => 4,
                'module_id' => 13,
                'matiere_name' => 'Tec et Pava',
            ],
            // M14
            [
                'semestre_id' => 4,
                'module_id' => 14,
                'matiere_name' => 'Système Embarqué Automobile et Aéronautique',
            ],
            [
                'semestre_id' => 4,
                'module_id' => 14,
                'matiere_name' => 'VHDL et FPGA',
            ],
            // // M15
            // [
            //     'semestre_id' => 4,
            //     'module_id' => 15,
            // ],
            // // M16
            // [
            //     'semestre_id' => 4,
            //     'module_id' => 16,
            // ],
        ];

        foreach ($matieres as $key => $matiere) {
            Matiere::create($matiere);
        };
    }
}