<template>
    <Transition
        enter-active-class="transition duration-300 ease-out"
        enter-from-class="transform translate-x-full opacity-0"
        enter-to-class="transform translate-x-0 opacity-100"
        leave-active-class="transition duration-300 ease-in"
        leave-from-class="transform translate-x-0 opacity-100"
        leave-to-class="transform translate-x-full opacity-0"
    >
        <div v-if="show && $page.props.flash.notification" 
             class="fixed top-4 right-4 z-50 p-4 pr-10 rounded-lg shadow-lg flex items-center"
             :class="$page.props.flash.notification.type === 'error' ? 'bg-red-500 text-white' : 'bg-green-500 text-white'">
            {{ $page.props.flash.notification.message }}
            <button 
                @click="show = false"
                class="absolute top-2 right-2 text-white hover:text-gray-200 focus:outline-none"
                aria-label="Fermer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </Transition>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const show = ref(false);

// Fonction pour réinitialiser le timer
const resetTimer = () => {
    show.value = true;
    setTimeout(() => {
        show.value = false;
    }, 5000); // Disparaît après 5 secondes
};

// Observer les changements dans les notifications
watch(() => page.props.flash.notification, (newVal) => {
    if (newVal) {
        resetTimer();
    }
}, { immediate: true });
</script> 