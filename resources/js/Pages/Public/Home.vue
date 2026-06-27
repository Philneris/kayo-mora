<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    featuredArtwork: Object
});
</script>

<template>
    <Head title="Accueil" />
    
    <PublicLayout>
        <!-- Hero Section -->
        <section class="h-screen relative flex items-center px-6 md:px-12 overflow-hidden bg-kayo-black">
            <!-- Background Image (Gradient overlay) -->
            <div class="absolute inset-0 opacity-40">
                <img 
                    v-if="featuredArtwork" 
                    :src="featuredArtwork.cover_image" 
                    class="w-full h-full object-cover grayscale" 
                    alt="Hero background"
                >
                <div v-else class="w-full h-full bg-gradient-to-br from-kayo-black to-kayo-violet"></div>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-kayo-black via-transparent to-transparent"></div>

            <div class="relative z-10 w-full max-w-7xl mx-auto">
                <span class="text-kayo-orange text-xs md:text-sm font-bold uppercase tracking-[0.3em] mb-4 block animate-fade-in opacity-0 translate-y-4" style="animation-fill-mode: forwards; animation-delay: 0.2s;">Artiste Visuel Contemporain</span>
                <h1 class="text-white font-title text-6xl md:text-[10rem] leading-none tracking-tighter mb-8 animate-fade-in opacity-0 translate-y-4" style="animation-fill-mode: forwards; animation-delay: 0.4s;">
                    KAYO<br>
                    <span class="md:ml-40 text-kayo-orange italic">MORA</span>
                </h1>
                
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8 mt-12">
                    <p class="text-kayo-beige/80 text-lg md:text-xl max-w-xl animate-fade-in opacity-0 translate-y-4" style="animation-fill-mode: forwards; animation-delay: 0.6s;">
                        Explorer l'intersection du chaos urbain et du minimalisme abstrait à travers l'art numérique et la photographie.
                    </p>
                    <Link 
                        :href="route('gallery')" 
                        class="inline-block px-12 py-6 bg-kayo-orange text-white uppercase text-xs font-black tracking-widest hover:bg-white hover:text-kayo-black transition-all duration-500 animate-fade-in opacity-0 translate-y-4"
                        style="animation-fill-mode: forwards; animation-delay: 0.8s;"
                    >
                        Découvrir la Galerie
                    </Link>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-12 left-1/2 -translate-x-1/2 flex flex-col items-center opacity-40">
                <div class="w-px h-12 bg-kayo-beige animate-scroll"></div>
            </div>
        </section>

        <!-- Featured Section (Placeholder if no artwork) -->
        <section v-if="featuredArtwork" class="py-32 px-6 md:px-12 bg-kayo-beige">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2">
                    <img :src="featuredArtwork.cover_image" class="w-full aspect-[4/5] object-cover shadow-2xl" :alt="featuredArtwork.title">
                </div>
                <div class="w-full md:w-1/2">
                    <span class="text-xs uppercase font-bold tracking-widest text-kayo-orange">Œuvre en vedette</span>
                    <h2 class="font-title text-5xl md:text-7xl mt-4 mb-8">{{ featuredArtwork.title }}</h2>
                    <p class="text-kayo-black/70 text-lg leading-relaxed mb-12">
                        {{ featuredArtwork.description }}
                    </p>
                    <Link :href="route('artwork.show', featuredArtwork.slug)" class="group inline-flex items-center space-x-4">
                        <span class="uppercase text-xs font-bold tracking-widest border-b border-kayo-black pb-1">Voir les détails</span>
                        <span class="group-hover:translate-x-2 transition-transform">&rarr;</span>
                    </Link>
                </div>
            </div>
        </section>

        <!-- Categories Section -->
        <section class="py-32 bg-white px-6 md:px-12">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-end mb-16">
                    <h2 class="font-title text-5xl">Disciplines</h2>
                    <p class="text-xs uppercase font-bold tracking-widest text-kayo-black/40">01 — 03</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-kayo-black/10">
                    <div class="bg-white p-12 hover:bg-kayo-black hover:text-white transition-all group duration-500">
                        <span class="font-title text-5xl text-kayo-black/10 group-hover:text-white/10 mb-8 block transition-colors">01</span>
                        <h3 class="font-title text-3xl mb-4">Art Numérique</h3>
                        <p class="text-sm opacity-60 line-clamp-3">
                            Manipulation fractale et textures glitch explorant la mémoire volatile de l'espace urbain.
                        </p>
                    </div>
                    <div class="bg-white p-12 hover:bg-kayo-black hover:text-white transition-all group duration-500">
                        <span class="font-title text-5xl text-kayo-black/10 group-hover:text-white/10 mb-8 block transition-colors">02</span>
                        <h3 class="font-title text-3xl mb-4">Photographie</h3>
                        <p class="text-sm opacity-60 line-clamp-3">
                            Capturer le silence dans le bruit, la solitude dans la foule, l'ombre dans la lumière.
                        </p>
                    </div>
                    <div class="bg-white p-12 hover:bg-kayo-black hover:text-white transition-all group duration-500">
                        <span class="font-title text-5xl text-kayo-black/10 group-hover:text-white/10 mb-8 block transition-colors">03</span>
                        <h3 class="font-title text-3xl mb-4">Peinture Abstraite</h3>
                        <p class="text-sm opacity-60 line-clamp-3">
                            Une approche expressionniste de la structure et de la démolition, utilisant des couches brutes de couleurs sombres.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<style scoped>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation-name: fade-in;
    animation-duration: 1s;
    animation-timing-function: cubic-bezier(0.23, 1, 0.32, 1);
}
@keyframes scroll {
    0% { transform: translateY(-100%); opacity: 0; }
    50% { opacity: 1; }
    100% { transform: translateY(100%); opacity: 0; }
}
.animate-scroll {
    animation: scroll 2s infinite cubic-bezier(0.77, 0, 0.175, 1);
}
</style>
