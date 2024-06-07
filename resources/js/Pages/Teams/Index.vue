<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';

const props = defineProps(['teams', 'errors', 'auth']);

const teams = reactive(props.teams);
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Times" />

        <div class="container mx-auto mt-8">
            <div class="flex justify-between mb-4">
                <h1 class="text-2xl font-bold">Times</h1>
                <a href="/teams/create" class="bg-blue-500 text-white px-4 py-2 rounded">Adicionar Time</a>
            </div>
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="w-2/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="teams.length === 0">
                            <td colspan="2" class="text-center py-3 px-4">Nenhum time encontrado</td>
                        </tr>
                        <tr v-else v-for="team in teams" :key="team.id" class="hover:bg-gray-100">
                            <td class="w-1/3 text-left py-3 px-4">{{ team.name }}</td>
                            <td class="text-left py-3 px-4">
                                <a :href="`/teams/${team.id}`"
                                    class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Ver</a>
                                <a :href="`/teams/${team.id}/edit`"
                                    class="bg-green-500 text-white px-4 py-2 rounded mr-2">Editar</a>
                                <form :action="`/teams/${team.id}`" method="POST" class="inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" :value="props.csrfToken">
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
