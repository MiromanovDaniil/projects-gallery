<template>
    <Head title="Gallery" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">List of projects</h2>
        </template>

        <div class="flex gap-2 px-2 py-2">
            <div v-for="project in projects"
                class="max-w-sm bg-white border-2 h-64 w-64 border-gray-200 rounded-lg shadow"
            >
                <a href="#">
                    <img
                        class="rounded-t-lg w-32 h-32"
                        :src="project.image"
                        alt=""
                    />
                </a>
                <hr>
                <div class="p-5">
                    <a href="#">
                        <h5
                            class="mb-2 text-2xl font-bold tracking-tight text-black"
                        >
                            {{project.title}}
                        </h5>
                    </a>
                    <p
                        class="mb-3 font-normal text-black"
                    >
                    {{project.description}}
                    </p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    projects: Array,
});
</script>
