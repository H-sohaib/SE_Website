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
                'image_path' => 'public/pfe_exemples/1.jpg',
                'filter_type' => 'filter-app'
            ],
            [
                'name' => 'test2',
                'description' => 'ckbskuboyvquyvqouycez',
                'image_path' => 'public/pfe_exemples/1.jpg',
                'filter_type' => 'filter-card'
            ],
            [
                'name' => 'test3',
                'description' => 'ckbskuboyvquyvqouycez',
                'image_path' => 'public/pfe_exemples/1.jpg',
                'filter_type' => 'filter-web'
            ],
            [
                'name' => 'test4',
                'description' => 'ckbskuboyvquyvqouycez',
                'image_path' => 'public/pfe_exemples/1.jpg',
                'filter_type' => 'filter-app'
            ]
        ];

        foreach ($pfe as $key => $pfe_exemple) {
            PfeExemple::create($pfe_exemple);
        };
    }
}