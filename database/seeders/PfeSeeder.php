<?php

namespace Database\Seeders;

use App\Models\Pfe;
use Illuminate\Database\Seeder;

class PfeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $pfe = [
        //     [
        //         'name' => 'test1',
        //         'description' => 'ckbskuboyvquyvqouycez',
        //         'image_path' => 'uploads/pfe_exemples/imgs/station2.jpg',
        //         'pdf_path' => 'uploads/pfe_exemples/pdf/testpdf.pdf',
        //         'types' => 'web|ai'
        //     ],
        //     [
        //         'name' => 'test2',
        //         'description' => 'ckbskuboyvquyvqouycez',
        //         'image_path' => 'uploads/pfe_exemples/imgs/station2.jpg',
        //         'pdf_path' => 'uploads/pfe_exemples/pdf/testpdf.pdf',
        //         'types' => 'ai|arduino'
        //     ],
        //     [
        //         'name' => 'test3',
        //         'description' => 'ckbskuboyvquyvqouycez',
        //         'image_path' => 'uploads/pfe_exemples/imgs/station2.jpg',
        //         'pdf_path' => 'uploads/pfe_exemples/pdf/testpdf.pdf',
        //         'types' => 'ai|web'
        //     ],
        //     [
        //         'name' => 'test4',
        //         'description' => 'ckbskuboyvquyvqouycez',
        //         'image_path' => 'uploads/pfe_exemples/imgs/station2.jpg',
        //         'pdf_path' => 'uploads/pfe_exemples/pdf/testpdf.pdf',
        //         'types' => 'esp32'
        //     ]
        // ];


        $pfe = [
            [
                'name' => 'Suiveur Solaire Commande par IOT',
                'description' => "Ce projet de fin d'études (PFE) vise à concevoir et à réaliser un suiveur
                solaire commandé par l'Internet des objets (IoT) qui est constitué de 2 axes et qui suivre
                automatiquement le soleil à l’aide des capteurs LDR, ou manuellement par l’utilisateur via le
                tableau de bord d’une application IOT",
                'image_path' => 'uploads/pfe_exemples/imgs/suiveur_solaire.jpg',
                'pdf_path' => 'uploads/pfe_exemples/pdf/RapportPFE EDDOUCHE-HARRAOUI_FinalVersion.pdf',
                'types' => 'arduino|web'
            ],
        ];

        foreach ($pfe as $pfe_exemple) {
            Pfe::create($pfe_exemple);
        };
    }
}