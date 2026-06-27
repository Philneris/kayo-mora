<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    artworks: Array
});

const deleteArtwork = (id) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette œuvre ?')) {
        router.delete(route('admin.artworks.destroy', id));
    }
};
</script>

<template>
    <Head title="Gestion des œuvres" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Gestion des œuvres
                </h2>
                <Link 
                    :href="route('admin.artworks.create')" 
                    class="bg-kayo-orange text-white px-4 py-2 rounded text-xs font-bold uppercase tracking-wider"
                >
                    + Nouvelle œuvre
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                                <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold">Aperçu</th>
                                <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold">Titre</th>
                                <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold">Type</th>
                                <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold">Année</th>
                                <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold">Statut</th>
                                <th class="px-6 py-4 text-xs uppercase tracking-widest font-bold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y dark:divide-gray-700">
                            <tr v-for="artwork in artworks" :key="artwork.id" class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4">
                                    <img :src="artwork.cover_image" class="h-12 w-12 object-cover rounded" alt="">
                                </td>
                                <td class="px-6 py-4 font-medium">{{ artwork.title }}</td>
                                <td class="px-6 py-4 text-xs uppercase opacity-60">{{ artwork.type }}</td>
                                <td class="px-6 py-4">{{ artwork.year }}</td>
                                <td class="px-6 py-4">
                                    <span 
                                        :class="[
                                            'px-2 py-1 text-[10px] uppercase font-bold rounded',
                                            artwork.is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-700'
                                        ]"
                                    >
                                        {{ artwork.is_published ? 'Publié' : 'Brouillon' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right space-x-4">
                                    <Link :href="route('admin.artworks.edit', artwork.id)" class="text-blue-500 hover:text-blue-700 font-bold text-xs uppercase">Éditer</Link>
                                    <button @click="deleteArtwork(artwork.id)" class="text-red-500 hover:text-red-700 font-bold text-xs uppercase">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
