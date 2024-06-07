<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

// Recebe a propriedade `team` do controlador
const props = defineProps({
    team: Object
});

// Configura o formulário com os dados do time
const form = useForm({
    name: props.team?.team?.name || ''
});

// Função para submeter o formulário
const submit = () => {
    if (props.team?.team?.id) {
        form.put(route('teams.update', props.team.team.id));
    }
};
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Editar Time" />

        <div class="container mx-auto mt-8 px-6">
            <form @submit.prevent="submit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" v-if="props.team">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
                    <input v-model="form.name" type="text" name="name" id="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Atualizar
                    </button>
                </div>
            </form>
            <div v-else class="text-red-500">Erro: Time não encontrado.</div>
        </div>
    </AuthenticatedLayout>
</template>
