<template>
    <Head title="Gallery of projects" />
    <div class="min-h-screen bg-gray-100">
        <nav
            class="bg-white border-b border-gray-100 h-24 flex items-center justify-between px-4 py-4"
        >
            <h1 class="font-extrabold text-black text-3xl">
                Gallery of projects
            </h1>
            <div v-if="canLogin">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="font-semibold text-black"
                    >Account</Link
                >
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="font-semibold text-black"
                        >Log in</Link
                    >

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="ml-4 font-semibold text-black"
                        >Register</Link
                    >
                </template>
            </div>
        </nav>
        <main>
            <div class="flex gap-2 px-2 py-2">
                <div
                    v-for="project in projects"
                    class="max-w-sm bg-white border-2 h-64 w-64 border-gray-200 rounded-lg shadow"
                >
                    <a href="#">
                        <img
                            class="rounded-t-lg w-32 h-32"
                            :src="project.image"
                            alt=""
                        />
                    </a>
                    <hr />
                    <div class="p-5">
                        <a href="#">
                            <h5
                                class="mb-2 text-2xl font-bold tracking-tight text-black"
                            >
                                {{ project.title }}
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-black">
                            {{ project.description }}
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    projects: {
        type: Array,
    },
});
</script>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
