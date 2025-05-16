<template>
  <div class="bg-gray-900 text-gray-100 font-sans">
    <Header />
    <main>
      <slot />
    </main>
    <Footer />
    <FlashMessage />
  </div>
</template>

<script setup>
import Header from '../../Client/Components/Header.vue';
import Footer from '../../Client/Components/Footer.vue';
import FlashMessage from '@/Components/FlashMessage.vue';
</script>

<style>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
</style> 