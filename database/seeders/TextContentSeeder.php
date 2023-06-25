<?php

namespace Database\Seeders;

use App\Models\TextContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $text_contents = [
            [
                'section_name' => 'landing',
                'text_content' => "L'École Supérieure de Technologie de Fès offre|La filière DUT Systèmes Embarqués (SE)|Département Génie Électrique & Systèmes Intelligents",
            ],
            [
                'section_name' => 'PRÉSENTATION',
                'text_content' => 'La filière Systèmes Embarqués est une filière très attractive et à la pointe de la technologie actuelle sachant que la plupart des systèmes informatiques actuels sont embarqués dans les téléphones portables, les moyens de transport, les équipements médicaux, les appareils ménagers, les robots, etc. C’est une filière d’avenir et qui commence à faire son petit chemin et se faire connaitre. Elle offre plusieurs possibilités de poursuite des études au niveau national et international.',
            ],
            [
                'section_name' => 'MARCHÉ',
                'text_content' => "L'École Supérieure de Technologie de Fès offre|La filière DUT Systèmes Embarqués (SE)|Département Génie Électrique & Systèmes Intelligents",
            ],
            [
                'section_name' => 'OBJECTIF',
                'text_content' => "L'École Supérieure de Technologie de Fès offre|La filière DUT Systèmes Embarqués (SE)|Département Génie Électrique & Systèmes Intelligents",
            ],
            [
                'section_name' => 'landing',
                'text_content' => "L'École Supérieure de Technologie de Fès offre|La filière DUT Systèmes Embarqués (SE)|Département Génie Électrique & Systèmes Intelligents",
            ],
            [
                'section_name' => 'landing',
                'text_content' => "L'École Supérieure de Technologie de Fès offre|La filière DUT Systèmes Embarqués (SE)|Département Génie Électrique & Systèmes Intelligents",
            ],
            [
                'section_name' => 'landing',
                'text_content' => "L'École Supérieure de Technologie de Fès offre|La filière DUT Systèmes Embarqués (SE)|Département Génie Électrique & Systèmes Intelligents",
            ],
        ];
        foreach ($text_contents as $key => $text_content) {
            TextContent::create($text_content);
        };
    }
}