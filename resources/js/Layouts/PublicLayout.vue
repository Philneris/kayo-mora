<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';

const isScrolled = ref(false);

const handleScroll = () => {
    isScrolled.value = window.scrollY > 50;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <div class="min-h-screen bg-kayo-beige text-kayo-black font-sans selection:bg-kayo-orange selection:text-white">
        <!-- Navigation -->
        <nav 
            :class="[
                'fixed top-0 w-full z-50 transition-all duration-500 px-6 py-4 md:px-12 md:py-8 flex justify-between items-center',
                isScrolled ? 'bg-kayo-beige/80 backdrop-blur-md py-4 md:py-4 shadow-sm' : 'bg-transparent'
            ]"
        >
            <Link :href="route('home')" class="text-2xl md:text-3xl font-title tracking-tighter hover:text-kayo-orange transition-colors">
                KAYO MORA
            </Link>

            <div class="hidden md:flex space-x-12 items-center uppercase tracking-widest text-xs font-semibold">
                <Link :href="route('gallery')" class="hover:text-kayo-orange transition-colors" :class="{ 'text-kayo-orange': $page.component.startsWith('Public/Gallery') }">Galerie</Link>
                <Link :href="route('exhibitions')" class="hover:text-kayo-orange transition-colors" :class="{ 'text-kayo-orange': $page.component.startsWith('Public/Exhibitions') }">Expositions</Link>
                <Link :href="route('about')" class="hover:text-kayo-orange transition-colors" :class="{ 'text-kayo-orange': $page.component.startsWith('Public/About') }">À propos</Link>
                <Link :href="route('contact')" class="hover:text-kayo-orange transition-colors border border-kayo-black px-4 py-2 hover:bg-kayo-black hover:text-white transition-all">Contact</Link>
            </div>

            <!-- Mobile Menu Toggle (Simplified) -->
            <button class="md:hidden text-xl">
                <span>//</span>
            </button>
        </nav>

        <!-- Page Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-kayo-black text-kayo-beige py-20 px-6 md:px-12 mt-20">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <h2 class="font-title text-3xl mb-6">KAYO MORA</h2>
                    <p class="text-sm text-kayo-beige/60 max-w-xs">
                        Art numérique, photographie contemporaine et peinture abstraite. Explorer les limites de l'identité et du chaos urbain.
                    </p>
                </div>
                <div>
                    <h3 class="uppercase tracking-widest text-xs font-bold mb-6">Navigation</h3>
                    <ul class="space-y-4 text-sm">
                        <li><Link :href="route('gallery')" class="hover:text-kayo-orange transition-colors">Galerie</Link></li>
                        <li><Link :href="route('exhibitions')" class="hover:text-kayo-orange transition-colors">Expositions</Link></li>
                        <li><Link :href="route('about')" class="hover:text-kayo-orange transition-colors">À propos</Link></li>
                        <li><Link :href="route('contact')" class="hover:text-kayo-orange transition-colors">Contact</Link></li>
                    </ul>
                </div>
                <div>
                    <h3 class="uppercase tracking-widest text-xs font-bold mb-6">Suivez l'artiste</h3>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="hover:text-kayo-orange transition-colors">Instagram</a>
                        <a href="#" class="hover:text-kayo-orange transition-colors">Behance</a>
                        <a href="#" class="hover:text-kayo-orange transition-colors">Twitter</a>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto border-t border-kayo-beige/10 mt-20 pt-8 flex justify-between items-center text-[10px] uppercase tracking-widest text-kayo-beige/40">
                <p>&copy; 2026 KAYO MORA. Tous droits réservés.</p>
                <p>Développé par Antigravity</p>
            </div>
        </footer>
    </div>
</template>
