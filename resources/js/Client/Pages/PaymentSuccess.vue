<template>
  <MainLayout>
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-green-900 to-gray-900">
      <div class="max-w-3xl mx-auto text-center">
        <div class="bg-white rounded-lg shadow-xl p-8">
          <div class="flex justify-center mb-6">
            <div class="bg-green-100 p-3 rounded-full">
              <i class="fas fa-check-circle text-green-500 text-5xl"></i>
            </div>
          </div>
          
          <h1 class="text-3xl font-bold text-gray-800 mb-4">Paiement réussi !</h1>
          <p class="text-gray-600 mb-6">Merci pour votre achat. Votre beat est maintenant disponible au téléchargement.</p>
          
          <div class="bg-gray-100 rounded-lg p-6 mb-6">
            <h2 class="font-semibold text-xl mb-2">Détails de votre achat</h2>
            <div class="flex items-center justify-between border-b pb-3 mb-3">
              <span class="text-gray-600">Produit:</span>
              <span class="font-medium text-gray-900">{{ production && production.title ? production.title : 'Produit non disponible' }}</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-gray-600">Prix:</span>
              <span class="font-medium text-blue-600">{{ production && production.price ? formatPrice(production.price) : 'Prix non disponible' }}</span>
            </div>
          </div>
          
          <div class="mb-8">
            <a :href="downloadLink" class="inline-flex items-center justify-center w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-md transition-colors">
              <i class="fas fa-download mr-2"></i>
              Télécharger votre beat
            </a>
            <p class="text-sm text-gray-500 mt-2">
              Le lien de téléchargement est valable jusqu'au {{ expirationDate || 'N/A' }}.
            </p>
          </div>
          
          <div class="border-t pt-6">
            <p class="text-gray-600 mb-4">Vous avez des questions sur votre achat ?</p>
            <a href="/contact" class="text-blue-600 hover:text-blue-800 font-medium">Contactez-nous</a>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<script setup>
import MainLayout from '../Layouts/MainLayout.vue'

const props = defineProps({
  production: Object,
  downloadLink: String,
  expirationDate: String
})

const formatPrice = (price) => {
  return new Intl.NumberFormat('fr-FR', {
    style: 'currency',
    currency: 'EUR'
  }).format(price)
}
</script> 