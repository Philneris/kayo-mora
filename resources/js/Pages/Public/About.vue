<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="À propos" />
    
    <PublicLayout>
        <div class="pt-40 md:pt-60 px-6 md:px-12 bg-kayo-beige min-h-screen">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-20">
                <div class="md:w-1/2">
                    <h1 class="font-title text-7xl md:text-9xl tracking-tighter mb-12 uppercase italic text-kayo-orange">KAYO</h1>
                    <div class="aspect-[4/5] bg-kayo-black overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1588&auto=format&fit=crop" class="w-full h-full object-cover grayscale opacity-80" alt="Artist portrait">
                    </div>
                </div>
                <div class="md:w-1/2 flex flex-col justify-end pb-20">
                    <span class="text-xs font-bold uppercase tracking-[0.3em] text-kayo-orange mb-8 block">Vision Artistique</span>
                    <h2 class="font-title text-4xl md:text-6xl mb-12 tracking-tight">Fusionner l'analogue et le digital pour révéler l'invisible.</h2>
                    
                    <div class="prose prose-lg text-kayo-black/70 leading-relaxed font-light">
                        <p class="mb-8 font-bold text-kayo-black uppercase tracking-widest text-xs">Qui suis-je ?</p>
                        <p class="mb-6 italic">
                            Basé à Paris, KAYO MORA est un artiste visuel contemporain dont le travail explore la tension entre la rigidité structurelle des environnements urbains et la fluidité organique de la psyché humaine.
                        </p>
                        <p class="mb-6">
                            Utilisant une combinaison de photographie argentique et de manipulation numérique avancée, MORA crée des paysages oniriques où le familier devient étrange, et le chaos devient équilibre.
                        </p>
                        <p>
                            Ses œuvres ont été exposées dans diverses galeries indépendantes en Europe et font partie de collections privées internationales.
                        </p>
                    </div>

                    <div class="mt-20 grid grid-cols-2 gap-8 border-t border-kayo-black/10 pt-12 uppercase tracking-widest text-[10px] font-bold">
                        <div>
                            <p class="text-kayo-orange mb-4 italic">Expériences</p>
                            <ul class="space-y-2 opacity-60">
                                <li>Beaux-Arts de Paris</li>
                                <li>Design Digital @ Gobelins</li>
                                <li>Indépendant depuis 2018</li>
                            </ul>
                        </div>
                        <div>
                            <p class="text-kayo-orange mb-4 italic">Focus</p>
                            <ul class="space-y-2 opacity-60">
                                <li>Art Génératif</li>
                                <li>Macro-Photographie</li>
                                <li>Post-Minimalisme</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
