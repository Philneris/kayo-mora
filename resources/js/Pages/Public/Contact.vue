<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    message: ''
});

const submit = () => {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Contact" />
    
    <PublicLayout>
        <div class="pt-40 md:pt-60 px-6 md:px-12 bg-kayo-black text-white min-h-screen">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-20">
                <div>
                    <h1 class="font-title text-7xl md:text-9xl tracking-tighter mb-12">HELLO.</h1>
                    <p class="text-kayo-beige/40 text-lg leading-relaxed max-w-sm mb-12">
                        Pour toute demande de collaboration, acquisition d’œuvres ou simple échange, n'hésitez pas à me contacter. 
                    </p>

                    <div class="space-y-8 uppercase tracking-widest text-[10px] font-bold">
                        <div>
                            <p class="text-kayo-orange mb-2">E-mail</p>
                            <a href="mailto:hello@kayomora.art" class="text-lg font-normal tracking-normal lowercase border-b border-white/10 hover:border-kayo-orange transition-colors">hello@kayomora.art</a>
                        </div>
                        <div>
                            <p class="text-kayo-orange mb-2">Studio</p>
                            <p class="text-lg font-normal tracking-normal lowercase">Paris / Remote</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 p-8 md:p-12 backdrop-blur-sm border border-white/10">
                    <form @submit.prevent="submit" class="space-y-10">
                        <div v-if="$page.props.flash?.success" class="bg-kayo-orange text-white p-4 text-xs font-bold uppercase tracking-widest text-center">
                            {{ $page.props.flash.success }}
                        </div>

                        <div class="group relative">
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-kayo-beige/30 group-focus-within:text-kayo-orange transition-colors mb-2">Nom complet</label>
                            <input 
                                v-model="form.name"
                                type="text" 
                                class="w-full bg-transparent border-0 border-b border-white/20 focus:ring-0 focus:border-kayo-orange transition-colors p-0 pb-4 text-white"
                                required
                            />
                            <div v-if="form.errors.name" class="text-red-500 text-[10px] mt-2 uppercase font-mono">{{ form.errors.name }}</div>
                        </div>

                        <div class="group relative">
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-kayo-beige/30 group-focus-within:text-kayo-orange transition-colors mb-2">Adresse E-mail</label>
                            <input 
                                v-model="form.email"
                                type="email" 
                                class="w-full bg-transparent border-0 border-b border-white/20 focus:ring-0 focus:border-kayo-orange transition-colors p-0 pb-4 text-white"
                                required
                            />
                            <div v-if="form.errors.email" class="text-red-500 text-[10px] mt-2 uppercase font-mono">{{ form.errors.email }}</div>
                        </div>

                        <div class="group relative">
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-kayo-beige/30 group-focus-within:text-kayo-orange transition-colors mb-2">Votre message</label>
                            <textarea 
                                v-model="form.message"
                                rows="4" 
                                class="w-full bg-transparent border-0 border-b border-white/20 focus:ring-0 focus:border-kayo-orange transition-colors p-0 pb-4 text-white resize-none"
                                required
                            ></textarea>
                            <div v-if="form.errors.message" class="text-red-500 text-[10px] mt-2 uppercase font-mono">{{ form.errors.message }}</div>
                        </div>

                        <button 
                            type="submit" 
                            class="w-full py-6 bg-white text-kayo-black uppercase text-xs font-black tracking-[0.3em] hover:bg-kayo-orange hover:text-white transition-all duration-500 disabled:opacity-50"
                            :disabled="form.processing"
                        >
                            <span v-if="form.processing">Envoi en cours...</span>
                            <span v-else>Envoyer le message</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
