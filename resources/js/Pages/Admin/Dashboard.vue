<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    stats: Object
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard Admin — KAYO MORA
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-kayo-orange">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-widest">Œuvres</div>
                        <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ stats.artworks_count }}</div>
                        <Link :href="route('admin.artworks.index')" class="mt-4 text-xs text-kayo-orange hover:underline inline-block">Gérer les œuvres &rarr;</Link>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-kayo-violet">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-widest">Expositions</div>
                        <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ stats.exhibitions_count }}</div>
                        <Link :href="route('admin.exhibitions.index')" class="mt-4 text-xs text-kayo-violet hover:underline inline-block">Gérer les expos &rarr;</Link>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-emerald-500">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-widest">Messages récents</div>
                        <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ stats?.unread_messages_count || 0 }}</div>
                        <Link :href="route('admin.messages.index')" class="mt-4 text-xs text-emerald-500 hover:underline inline-block">Voir les messages &rarr;</Link>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-bold mb-4">Actions rapides</h3>
                        <div class="flex gap-4">
                            <Link 
                                :href="route('admin.artworks.create')" 
                                class="bg-kayo-orange text-white px-6 py-2 rounded text-sm font-bold uppercase tracking-wider hover:opacity-90 transition-opacity"
                            >
                                + Ajouter une œuvre
                            </Link>
                            <Link 
                                :href="route('admin.exhibitions.create')" 
                                class="bg-kayo-violet text-white px-6 py-2 rounded text-sm font-bold uppercase tracking-wider hover:opacity-90 transition-opacity"
                            >
                                + Ajouter une exposition
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
