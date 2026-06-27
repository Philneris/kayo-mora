<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    type: 'photo',
    year: new Date().getFullYear(),
    description: '',
    cover_image: '',
    is_published: false,
});

const submit = () => {
    form.post(route('admin.artworks.store'));
};
</script>

<template>
    <Head title="Ajouter une œuvre" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Ajouter une nouvelle œuvre
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                    <form @submit.prevent="submit" class="space-y-6">
                        <div>
                            <label class="block text-xs uppercase tracking-widest font-bold mb-2">Titre</label>
                            <input v-model="form.title" type="text" class="w-full bg-gray-50 dark:bg-gray-900 border-gray-200 dark:border-gray-700 rounded text-sm focus:border-kayo-orange focus:ring-0" required>
                            <div v-if="form.errors.title" class="text-red-500 text-xs mt-1">{{ form.errors.title }}</div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs uppercase tracking-widest font-bold mb-2">Type</label>
                                <select v-model="form.type" class="w-full bg-gray-50 dark:bg-gray-900 border-gray-200 dark:border-gray-700 rounded text-sm focus:border-kayo-orange focus:ring-0">
                                    <option value="photo">Photographie</option>
                                    <option value="painting">Peinture</option>
                                    <option value="digital">Digital Art</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs uppercase tracking-widest font-bold mb-2">Année</label>
                                <input v-model="form.year" type="number" class="w-full bg-gray-50 dark:bg-gray-900 border-gray-200 dark:border-gray-700 rounded text-sm focus:border-kayo-orange focus:ring-0" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs uppercase tracking-widest font-bold mb-2">Description</label>
                            <textarea v-model="form.description" rows="5" class="w-full bg-gray-50 dark:bg-gray-900 border-gray-200 dark:border-gray-700 rounded text-sm focus:border-kayo-orange focus:ring-0" required></textarea>
                            <div v-if="form.errors.description" class="text-red-500 text-xs mt-1">{{ form.errors.description }}</div>
                        </div>

                        <div>
                            <label class="block text-xs uppercase tracking-widest font-bold mb-2">URL Image de couverture</label>
                            <input v-model="form.cover_image" type="text" class="w-full bg-gray-50 dark:bg-gray-900 border-gray-200 dark:border-gray-700 rounded text-sm focus:border-kayo-orange focus:ring-0" placeholder="https://...">
                        </div>

                        <div class="flex items-center">
                            <input v-model="form.is_published" type="checkbox" id="published" class="rounded border-gray-300 text-kayo-orange shadow-sm focus:ring-kayo-orange">
                            <label for="published" class="ml-2 text-sm text-gray-600 dark:text-gray-400">Publier l'œuvre immédiatement</label>
                        </div>

                        <div class="flex justify-between items-center pt-6 border-t dark:border-gray-700">
                            <Link :href="route('admin.artworks.index')" class="text-xs uppercase font-bold text-gray-500 hover:text-gray-700">Annuler</Link>
                            <button 
                                type="submit" 
                                class="bg-kayo-orange text-white px-8 py-3 rounded text-xs font-bold uppercase tracking-widest hover:bg-black transition-colors"
                                :disabled="form.processing"
                            >
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
