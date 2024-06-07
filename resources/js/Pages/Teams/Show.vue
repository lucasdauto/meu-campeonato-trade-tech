<script setup>
import { reactive, defineProps } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps(['team']);

const team = reactive(props.team);
</script>

<template>

    <Head title="Visualizar time" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Historico do time {{ team.team.name }}</h2>
        </template>

        <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
            <div v-for="(match, index) in team.matches" :key="index"
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Campeonato: {{ match.championship_name }}</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Equipe A</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ match.team_a_name }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Equipe B</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ match.team_b_name }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Gols Equipe A</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ match.team_a_score }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Gols Equipe B</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ match.team_b_score }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
