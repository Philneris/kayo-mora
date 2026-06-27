<?php

namespace Database\Seeders;

use App\Models\Exhibition;
use Illuminate\Database\Seeder;

class ExhibitionSeeder extends Seeder
{
    public function run(): void
    {
        Exhibition::create([
            'title' => 'Urbain Chaos',
            'location' => 'Galerie L’Oeil, Paris',
            'start_date' => '2025-05-12',
            'end_date' => '2025-06-30',
            'description' => 'Une immersion dans la fragmentation urbaine et la beauté du désordre programmé.',
            'is_published' => true,
        ]);

        Exhibition::create([
            'title' => 'Mémoire Digitale',
            'location' => 'The Cube, Berlin',
            'start_date' => '2024-11-01',
            'end_date' => '2024-12-15',
            'description' => 'Exploration de la volatilité des données visuelles et de l\'obsolescence esthétique.',
            'is_published' => true,
        ]);

        Exhibition::create([
            'title' => 'Abstraire le Réel',
            'location' => 'MOMA Private Loft, NYC',
            'start_date' => '2024-03-20',
            'end_date' => '2024-04-10',
            'description' => 'Série de peintures grand format sur l\'équilibre entre silence et tumulte.',
            'is_published' => true,
        ]);
    }
}
