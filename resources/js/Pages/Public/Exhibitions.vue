<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    exhibitions: Array
});

// Mock if empty
const displayExhibitions = computed(() => {
    if (props.exhibitions && props.exhibitions.length > 0) return props.exhibitions;
    return [
        { id: 1, title: 'Urbain Chaos', location: 'Galerie L’Oeil, Paris', start_date: '2025-05-12', end_date: '2025-06-30', description: 'Une immersion dans la fragmentation urbaine.' },
        { id: 2, title: 'Mémoire Digitale', location: 'The Cube, Berlin', start_date: '2024-11-01', end_date: '2024-12-15', description: 'Exploration de la volatilité des données visuelles.' },
        { id: 3, title: 'Abstraire le Réel', location: 'MOMA Private Loft, NYC', start_date: '2024-03-20', end_date: '2024-04-10', description: 'Série de peintures grand format sur l\'équilibre.' }
    ];
});

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString('fr-FR', {
        month: 'long',
        year: 'numeric'
    }).toUpperCase();
};
</script>

<template>
    <Head title="Expositions" />
    
    <PublicLayout>
        <div class="pt-40 md:pt-60 px-6 md:px-12 bg-white min-h-screen">
            <div class="max-w-4xl mx-auto">
                <header class="mb-32">
                    <h1 class="font-title text-7xl md:text-9xl tracking-tighter mb-8">EXPO</h1>
                    <div class="h-2 w-40 bg-kayo-orange"></div>
                </header>

                <div class="space-y-32 pb-40">
                    <div v-for="expo in displayExhibitions" :key="expo.id" class="group">
                        <div class="flex flex-col md:flex-row gap-12 md:items-start">
                            <div class="md:w-1/3">
                                <span class="text-xs font-bold tracking-[0.3em] text-kayo-orange">{{ formatDate(expo.start_date) }}</span>
                                <p class="text-[10px] uppercase tracking-widest text-kayo-black/30 mt-2 font-bold">{{ expo.location }}</p>
                            </div>
                            <div class="md:w-2/3">
                                <h2 class="font-title text-4xl md:text-5xl group-hover:text-kayo-violet transition-colors duration-500 mb-6">{{ expo.title }}</h2>
                                <p class="text-kayo-black/60 leading-relaxed max-w-lg italic">
                                    {{ expo.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
