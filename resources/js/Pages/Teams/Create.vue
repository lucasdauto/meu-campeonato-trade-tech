<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
})

const form = useForm({
    name: ''
});

const submit = () => {
    form.post(route('teams.store'));
};
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Times" />

        <div class="container mx-auto mt-8 px-6">
            <form @submit.prevent="submit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
                    <input v-model="form.name" type="text" name="name" id="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
