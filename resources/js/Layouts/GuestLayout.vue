<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gradient-to-br from-indigo-50 via-white to-purple-50 pt-6 sm:justify-center sm:pt-0"
    >
        <div class="mt-4 transform transition-all duration-300 hover:scale-105">
            <Link href="/" class="text-center">
                <h1 class="text-3xl font-bold tracking-tight text-indigo-700">
                    <span class="block font-extrabold bg-gradient-to-r from-indigo-600 to-purple-700 bg-clip-text text-transparent">
                        Administration
                    </span>
                    
                </h1>
            </Link>
        </div>

        <div
            class="mt-6 w-full overflow-hidden bg-white px-8 py-6 shadow-xl sm:max-w-md sm:rounded-xl border border-gray-100"
        >
            <slot />
        </div>
    </div>
</template>
