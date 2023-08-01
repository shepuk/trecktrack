<script setup>
import TreckTrackLayout from "@/Layouts/TreckTrackLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import NewTreckForm from "@/Components/NewTreckForm.vue";

import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const msg = computed(() => page.props.msg);
</script>

<template>
    <TreckTrackLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        {{ msg }}
        <NewTreckForm />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </TreckTrackLayout>
</template>
