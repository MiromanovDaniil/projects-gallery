<template>
    <Head title="Projects" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects List
            </h2>
        </template> -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link
                        href="/projects/create"
                        class="px-2 py-2 bg-indigo-100 rounded hover:bg-indigo-200"
                        >Create</Link
                    >
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-black">
                        <thead
                            class="text-xs border-b text-black uppercase bg-gray-50 dark:bg-gray-50"
                        >
                            <tr>
                                <th scope="col" class="p-4"></th>
                                <th scope="col" class="px-6 py-3">
                                    Title of the Project
                                </th>
                                <th scope="col" class="px-6 py-3">Image</th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="project in projects"
                                :key="project.id"
                                class="bg-white border-b"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-1"
                                            type="checkbox"
                                            class="w-4 h-4 bg-gray-100 rounded"
                                        />
                                        <label
                                            for="checkbox-table-search-1"
                                            class="sr-only"
                                            >checkbox</label
                                        >
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                >
                                    {{ project.title }}
                                </th>
                                <td class="px-6 py-4">
                                    <img :src="project.image" class="w-12 h-12 rounded" />
                                </td>
                                <td class="px-6 py-4">
                                    {{ project.description }}
                                </td>
                                <td class="px-6 py-4">
                                    <a
                                        href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        >Edit</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    projects: Array,
});
</script>
