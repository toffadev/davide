<template>
  <div v-if="links.length > 3" class="flex flex-wrap justify-center mt-6 space-x-1">
    <template v-for="(link, key) in links" :key="key">
      <div
        v-if="link.url === null"
        class="px-4 py-2 text-sm text-gray-500 border border-gray-300 rounded-md cursor-not-allowed bg-gray-100"
        v-html="link.label"
      />
      <Link
        v-else
        :href="link.url"
        class="px-4 py-2 text-sm border rounded-md"
        :class="{
          'bg-primary text-white border-primary': link.active,
          'text-gray-700 border-gray-300 hover:bg-gray-50': !link.active
        }"
        v-html="link.label"
      />
    </template>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  links: Array
})
</script> 