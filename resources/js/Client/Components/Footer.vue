<template>
  <footer class="bg-gray-900 py-8 px-4 sm:px-6 lg:px-8 border-t border-gray-800">
    <div class="max-w-7xl mx-auto">
      <div class="md:flex md:items-center md:justify-between">
        <div class="flex justify-center md:justify-start mb-6 md:mb-0">
          <span class="text-2xl font-bold gradient-text">AXEL MERYL</span>
        </div>
        
        <div class="flex justify-center md:justify-end space-x-6">
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition">
            <i class="fab fa-spotify"></i>
          </a>
        </div>
      </div>
      
      <div class="mt-8 text-center md:text-left">
        <p class="text-gray-400 text-sm">&copy; {{ new Date().getFullYear() }} Axel Meryl. Tous droits réservés.</p>
        <p class="text-gray-500 text-xs mt-2">Site réalisé avec passion pour mettre en lumière l'artiste.</p>
      </div>
    </div>
  </footer>
</template>

<script setup>
// No additional logic needed
</script> 