<template>
    <div v-if="$page.props.flash.notification" 
         class="fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg"
         :class="$page.props.flash.notification.type === 'error' ? 'bg-red-500 text-white' : 'bg-green-500 text-white'">
        {{ $page.props.flash.notification.message }}
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
const page = usePage();
</script> 