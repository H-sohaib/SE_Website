<?php

namespace Database\Seeders;

use App\Models\PfeExemple;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PfeExempleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pfe = [
            [
                'name' => 'test1',
                'description' => 'ckbskuboyvquyvqouycez',
                'image_path' => 'public/pfe_exemples/imgs/station2.jpg',
                'pdf_path' => 'public/pfe_exemples/pdf/testpdf.pdf',
                'filter_type' => 'Web'
            ],
            [
                'name' => 'test2',
                'description' => 'ckbskuboyvquyvqouycez',
                'image_path' => 'public/pfe_exemples/imgs/station2.jpg',
                'pdf_path' => 'public/pfe_exemples/pdf/testpdf.pdf',
                'filter_type' => 'AI'
            ],
            [
                'name' => 'test3',
                'description' => 'ckbskuboyvquyvqouycez',
                'image_path' => 'public/pfe_exemples/imgs/station2.jpg',
                'pdf_path' => 'public/pfe_exemples/pdf/testpdf.pdf',
                'filter_type' => 'AI'
            ],
            [
                'name' => 'test4',
                'description' => 'ckbskuboyvquyvqouycez',
                'image_path' => 'public/pfe_exemples/imgs/station2.jpg',
                'pdf_path' => 'public/pfe_exemples/pdf/testpdf.pdf',
                'filter_type' => 'ESP32'
            ]
        ];
        // $pfe = [
        //     [
        //         'name' => 'Suiveur Solaire Commande par IOT',
        //         'description' => "Ce projet de fin d'études (PFE) vise à concevoir et à réaliser un suiveur
        //         solaire commandé par l'Internet des objets (IoT) qui est constitué de 2 axes et qui suivre
        //         automatiquement le soleil à l’aide des capteurs LDR, ou manuellement par l’utilisateur via le
        //         tableau de bord d’une application IOT",
        //         'image_path' => 'public/pfe_exemples/imgs/suiveur_solaire.jpg',
        //         'pdf_path' => 'public/pfe_exemples/pdf/RapportPFE EDDOUCHE-HARRAOUI_FinalVersion.pdf',
        //         'filter_type' => 'Arduino'
        //     ],
        // ];

        foreach ($pfe as $key => $pfe_exemple) {
            PfeExemple::create($pfe_exemple);
        };
    }
}