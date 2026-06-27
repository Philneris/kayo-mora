<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
    artworks: Array
});

const activeFilter = ref('all');

const filters = [
    { label: 'Tous', value: 'all' },
    { label: 'Photo', value: 'photo' },
    { label: 'Peinture', value: 'painting' },
    { label: 'Digital', value: 'digital' },
];

const filteredArtworks = computed(() => {
    if (activeFilter.value === 'all') return props.artworks;
    return props.artworks.filter(a => a.type === activeFilter.value);
});
</script>

<template>
    <Head title="Galerie" />
    
    <PublicLayout>
        <div class="pt-40 md:pt-60 px-6 md:px-12 bg-kayo-beige min-h-screen">
            <div class="max-w-7xl mx-auto">
                <header class="flex flex-col md:flex-row md:items-end md:justify-between gap-8 mb-20">
                    <div>
                        <h1 class="font-title text-7xl md:text-9xl leading-none">GALERIE</h1>
                        <p class="text-kayo-black/40 mt-6 uppercase tracking-widest font-bold text-xs">Œuvres sélectionnées // 2018 — 2026</p>
                    </div>

                    <!-- Filters -->
                    <div class="flex flex-wrap gap-4 uppercase tracking-widest text-[10px] font-bold">
                        <button 
                            v-for="filter in filters" 
                            :key="filter.value"
                            @click="activeFilter = filter.value"
                            :class="[
                                'px-6 py-2 border transition-all duration-300',
                                activeFilter === filter.value ? 'bg-kayo-black text-white border-kayo-black' : 'border-kayo-black/10 hover:border-kayo-black'
                            ]"
                        >
                            {{ filter.label }}
                        </button>
                    </div>
                </header>

                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16 pb-40">
                    <div 
                        v-for="(artwork, index) in filteredArtworks" 
                        :key="artwork.id"
                        class="group"
                    >
                        <Link :href="route('artwork.show', artwork.slug)">
                            <div class="relative overflow-hidden mb-6 aspect-[4/5] bg-kayo-black/5">
                                <img 
                                    :src="artwork.cover_image" 
                                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700 ease-out"
                                    :alt="artwork.title"
                                >
                                <div class="absolute inset-0 bg-kayo-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="absolute bottom-6 left-6 text-white translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                                    <span class="text-[10px] uppercase tracking-widest font-bold bg-kayo-orange px-2 py-1">Explorer</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-title text-2xl group-hover:text-kayo-orange transition-colors">{{ artwork.title }}</h3>
                                    <p class="text-xs uppercase text-kayo-black/40 mt-1 tracking-widest">{{ artwork.type }} — {{ artwork.year }}</p>
                                </div>
                                <span class="text-[10px] opacity-20 group-hover:opacity-100 transition-opacity">0{{ index + 1 }}</span>
                            </div>
                        </Link>
                    </div>

                    <!-- Empty State -->
                    <div v-if="filteredArtworks.length === 0" class="col-span-full py-40 text-center">
                        <p class="font-title text-3xl opacity-20 italic">Aucune œuvre ne correspond à votre recherche.</p>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
