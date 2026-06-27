<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\ArtworkImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArtworkSeeder extends Seeder
{
    public function run(): void
    {
        $artworks = [
            [
                'title' => 'Urban Echoes',
                'description' => 'Une exploration des textures de la ville à travers l\'objectif d\'une caméra argentique modifiée. Capture l\'essence du mouvement perpétuel.',
                'type' => 'photo',
                'year' => 2024,
                'cover_image' => 'https://images.unsplash.com/photo-1514924013411-cbf25faa35bb?q=80&w=1587&auto=format&fit=crop',
                'is_published' => true,
            ],
            [
                'title' => 'Digital Decay',
                'description' => 'Manipulation de données corrompues créant des paysages fractals qui évoquent la fragilité de notre héritage numérique.',
                'type' => 'digital',
                'year' => 2023,
                'cover_image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=1664&auto=format&fit=crop',
                'is_published' => true,
            ],
            [
                'title' => 'Abstract Silence',
                'description' => 'Série de peintures minimalistes explorant le vide et la tension entre l\'ombre et la lumière dans un espace confiné.',
                'type' => 'painting',
                'year' => 2025,
                'cover_image' => 'https://images.unsplash.com/photo-1541701494587-cb58502866ab?q=80&w=1740&auto=format&fit=crop',
                'is_published' => true,
            ]
        ];

        foreach ($artworks as $data) {
            $artwork = Artwork::create($data + ['slug' => Str::slug($data['title'])]);
            
            // Add some detail images
            ArtworkImage::create([
                'artwork_id' => $artwork->id,
                'image_path' => 'https://images.unsplash.com/photo-1500462859194-cf8ca9938ff4?q=80&w=1664&auto=format&fit=crop',
                'position' => 0
            ]);
        }
    }
}
