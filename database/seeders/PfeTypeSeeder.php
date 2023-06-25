<?php

namespace Database\Seeders;

use App\Models\PfeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PfeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pfe_types = [
            [
                'type_name' => 'Arduino',
            ],
            [
                'type_name' => 'Web',
            ],
            [
                'type_name' => 'AI',
            ],
            [
                'type_name' => 'ESP32',
            ],
        ];
        // $pfe_types = [
        //     [
        //         'type_name' => 'Arduino',
        //     ],
        // ];

        foreach ($pfe_types as $key => $pfe_type) {
            PfeType::create($pfe_type);
        };
    }
}