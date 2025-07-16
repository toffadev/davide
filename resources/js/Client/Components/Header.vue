<template>
  <nav class="fixed w-full bg-gray-900 bg-opacity-90 z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <Link href="/" class="flex-shrink-0">
            <span class="text-2xl font-bold gradient-text">DNBEATZ</span>
          </Link>
        </div>
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <Link 
              href="/" 
              class="px-3 py-2 rounded-md text-sm font-medium" 
              :class="[$page.url === '/' ? 'text-white bg-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-800']"
            >
              Accueil
            </Link>
            
            <Link 
              href="/musique" 
              class="px-3 py-2 rounded-md text-sm font-medium" 
              :class="[$page.url === '/musique' ? 'text-white bg-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-800']"
            >
              Mes Œuvres
            </Link>
            <Link 
              href="/productions" 
              class="px-3 py-2 rounded-md text-sm font-medium" 
              :class="[$page.url === '/productions' ? 'text-white bg-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-800']"
            >
              Store
            </Link>
            <!-- <Link 
              href="/evenements" 
              class="px-3 py-2 rounded-md text-sm font-medium" 
              :class="[$page.url === '/evenements' ? 'text-white bg-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-800']"
            >
              Événements
            </Link> -->
            <Link 
              href="/actualites" 
              class="px-3 py-2 rounded-md text-sm font-medium" 
              :class="[$page.url === '/actualites' ? 'text-white bg-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-800']"
            >
              Actualités
            </Link>
            <Link 
              href="/biographie" 
              class="px-3 py-2 rounded-md text-sm font-medium" 
              :class="[$page.url === '/biographie' ? 'text-white bg-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-800']"
            >
              Biographie
            </Link>
            <Link 
              href="/contact" 
              class="px-3 py-2 rounded-md text-sm font-medium" 
              :class="[$page.url === '/contact' ? 'text-white bg-gray-800' : 'text-gray-300 hover:text-white hover:bg-gray-800']"
            >
              Contact
            </Link>
          </div>
        </div>
        <div class="md:hidden">
          <button @click="toggleMobileMenu" class="text-gray-300 hover:text-white focus:outline-none">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
    
    <!-- Mobile menu -->
    <div v-show="mobileMenuOpen" class="md:hidden bg-gray-800">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <Link 
          href="/" 
          class="block px-3 py-2 rounded-md text-base font-medium" 
          :class="[$page.url === '/' ? 'text-white bg-gray-700' : 'text-gray-300 hover:text-white hover:bg-gray-700']"
        >
          Accueil
        </Link>
       
        <Link 
          href="/musique" 
          class="block px-3 py-2 rounded-md text-base font-medium" 
          :class="[$page.url === '/musique' ? 'text-white bg-gray-700' : 'text-gray-300 hover:text-white hover:bg-gray-700']"
        >
          Mes Œuvres
        </Link>
        <Link 
          href="/productions" 
          class="block px-3 py-2 rounded-md text-base font-medium" 
          :class="[$page.url === '/productions' ? 'text-white bg-gray-700' : 'text-gray-300 hover:text-white hover:bg-gray-700']"
        >
          Store
        </Link>
        <!-- <Link 
          href="/evenements" 
          class="block px-3 py-2 rounded-md text-base font-medium" 
          :class="[$page.url === '/evenements' ? 'text-white bg-gray-700' : 'text-gray-300 hover:text-white hover:bg-gray-700']"
        >
          Événements
        </Link> -->
        <Link 
          href="/actualites" 
          class="block px-3 py-2 rounded-md text-base font-medium" 
          :class="[$page.url === '/actualites' ? 'text-white bg-gray-700' : 'text-gray-300 hover:text-white hover:bg-gray-700']"
        >
          Actualités
        </Link>
         <Link 
          href="/biographie" 
          class="block px-3 py-2 rounded-md text-base font-medium" 
          :class="[$page.url === '/biographie' ? 'text-white bg-gray-700' : 'text-gray-300 hover:text-white hover:bg-gray-700']"
        >
          Biographie
        </Link>
        <Link 
          href="/contact" 
          class="block px-3 py-2 rounded-md text-base font-medium" 
          :class="[$page.url === '/contact' ? 'text-white bg-gray-700' : 'text-gray-300 hover:text-white hover:bg-gray-700']"
        >
          Contact
        </Link>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const mobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value;
};
</script> 