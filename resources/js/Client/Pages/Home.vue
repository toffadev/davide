<template>
  <HomePage 
    :latest-releases="latestReleases" 
    :latest-comedies="latestComedies" 
    :latest-actualities="latestActualities"
    :upcoming-events="upcomingEvents"
    :gallery-items="galleryItems"
    :paid-productions="paidProductions"
    :free-productions="freeProductions"
    ref="homePageComponent"
  />
</template>

<script setup>
import { ref, onMounted } from 'vue';
import MainLayout from '../../Client/Layouts/MainLayout.vue';
import HomePage from '../../Client/Components/HomePage.vue';

const homePageComponent = ref(null);

defineProps({
  latestReleases: {
    type: Object,
    required: true
  },
  latestComedies: {
    type: Array,
    required: true
  },
  latestActualities: {
    type: Array,
    required: true
  },
  upcomingEvents: {
    type: Array,
    required: true
  },
  galleryItems: {
    type: Array,
    required: true
  },
  paidProductions: {
    type: Array,
    required: true
  },
  freeProductions: {
    type: Array,
    required: true
  }
});

// Assurez-vous que les événements sont correctement attachés
onMounted(() => {
  console.log('Home page mounted');
  
  // Attacher manuellement les événements après le rendu complet
  setTimeout(() => {
    // Initialiser les boutons d'achat
    const buyButtons = document.querySelectorAll('.buy-button');
    buyButtons.forEach(button => {
      button.style.cursor = 'pointer';
      button.style.zIndex = '10';
      
      // Assurer que le clic fonctionne
      button.addEventListener('click', (event) => {
        event.stopPropagation();
        
        // Obtenir l'ID de production à partir de l'attribut data
        const productionId = button.getAttribute('data-production-id');
        if (productionId && homePageComponent.value) {
          homePageComponent.value.checkout(parseInt(productionId));
        }
      });
    });
    
    // S'assurer que les miniatures YouTube sont cliquables
    const thumbnails = document.querySelectorAll('.youtube-thumbnail');
    thumbnails.forEach(thumbnail => {
      thumbnail.style.cursor = 'pointer';
      thumbnail.style.zIndex = '10';
    });
    
    // Initialiser les lecteurs audio
    const audioPlayers = document.querySelectorAll('.audio-player');
    console.log('Found', audioPlayers.length, 'audio players in Home component');
    
    audioPlayers.forEach(player => {
      // Ajouter des styles pour s'assurer que le lecteur est cliquable
      player.style.cursor = 'pointer';
      player.style.zIndex = '20';
      player.style.position = 'relative';
      
      // Réinitialiser le lecteur pour s'assurer qu'il fonctionne correctement
      try {
        player.load();
      } catch (e) {
        console.error('Error loading audio player:', e);
      }
      
      // Ajouter un gestionnaire d'événements pour le clic direct
      player.addEventListener('click', (event) => {
        console.log('Audio player clicked');
        event.stopPropagation();
      });
      
      // Ajouter des gestionnaires d'événements pour les erreurs
      player.addEventListener('error', (event) => {
        console.error('Audio player error:', event);
      });
      
      // Ajouter des gestionnaires pour les événements de lecture
      player.addEventListener('play', () => {
        console.log('Audio started playing');
      });
      
      player.addEventListener('pause', () => {
        console.log('Audio paused');
      });
    });
    
    // Ajouter des gestionnaires pour les contrôles audio
    const audioControls = document.querySelectorAll('audio::-webkit-media-controls');
    console.log('Found', audioControls.length, 'audio controls');
    
  }, 500);
});

defineOptions({
  layout: MainLayout
});
</script> 