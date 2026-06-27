<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    artwork: Object
});
</script>

<template>
    <Head :title="artwork.title" />
    
    <PublicLayout>
        <div class="pt-40 md:pt-60 bg-kayo-beige min-h-screen">
            <!-- Main Hero Image -->
            <div class="max-w-[1600px] mx-auto px-6 overflow-hidden">
                <div class="aspect-video w-full bg-kayo-black overflow-hidden relative group">
                    <img 
                        :src="artwork.cover_image" 
                        class="w-full h-full object-cover scale-100 group-hover:scale-105 transition-transform duration-[3000ms] ease-out" 
                        :alt="artwork.title"
                    >
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6 md:px-12 py-32 grid grid-cols-1 md:grid-cols-12 gap-20">
                <!-- Info -->
                <div class="md:col-span-4 sticky top-40 h-fit">
                    <span class="text-kayo-orange text-[10px] font-bold uppercase tracking-[0.4em] mb-4 block">{{ artwork.type }} // {{ artwork.year }}</span>
                    <h1 class="font-title text-6xl md:text-8xl leading-[0.9] tracking-tighter mb-12">{{ artwork.title }}</h1>
                    
                    <div class="space-y-12">
                        <div>
                            <p class="uppercase text-[10px] font-bold tracking-widest text-kayo-black/40 mb-4 opacity-50 underline decoration-kayo-orange decoration-2 underline-offset-8 inline-block italic">Dimensions & Support</p>
                            <p class="text-sm font-medium">Format Variable, Impression Fine Art sur Papier Baryté, Contre-collage Aluminium.</p>
                        </div>
                        
                        <div class="flex gap-4">
                            <Link :href="route('contact')" class="px-8 py-3 border border-kayo-black text-[10px] uppercase font-bold tracking-widest hover:bg-kayo-black hover:text-white transition-all">Acquérir</Link>
                            <Link :href="route('gallery')" class="px-8 py-3 text-[10px] uppercase font-bold tracking-widest opacity-40 hover:opacity-100 transition-opacity flex items-center gap-2">
                                <span>Retour</span>
                            </Link>
                        </div>
                    </div>
                </div>

                <!-- Description & Gallery -->
                <div class="md:col-span-8">
                    <div class="prose prose-xl text-kayo-black/80 font-light leading-[1.8] mb-32 max-w-2xl">
                        <p>{{ artwork.description }}</p>
                    </div>

                    <!-- Additional Images -->
                    <div class="space-y-40">
                        <div v-for="image in artwork.images" :key="image.id" class="relative group">
                            <img :src="image.image_path" class="w-full grayscale hover:grayscale-0 transition-all duration-1000 shadow-xl" alt="Artwork detail">
                            <div class="absolute -bottom-8 left-0 text-[10px] uppercase tracking-[0.5em] font-bold opacity-0 group-hover:opacity-30 transition-opacity">Detail View 0{{ image.position + 1 }}</div>
                        </div>
                    </div>

                    <!-- Next Link -->
                    <div class="mt-60 border-t border-kayo-black/10 pt-20 flex justify-center">
                        <Link :href="route('gallery')" class="group text-center">
                            <span class="text-[10px] uppercase tracking-[0.5em] font-bold text-kayo-orange block mb-8">Continuer l'exploration</span>
                            <span class="font-title text-6xl md:text-9xl tracking-tighter hover:italic transition-all duration-500 underline decoration-1 underline-offset-[20px]">GALERIE &rarr;</span>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
