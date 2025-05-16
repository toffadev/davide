<template>
  <HomePage 
    :latest-releases="latestReleases" 
    :latest-comedies="latestComedies" 
    :latest-actualities="latestActualities"
    :upcoming-events="upcomingEvents"
    :gallery-items="galleryItems" 
  />
</template>

<script setup>
import MainLayout from '../../Client/Layouts/MainLayout.vue';
import HomePage from '../../Client/Components/HomePage.vue';

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
  }
});

defineOptions({
  layout: MainLayout
});
</script> 