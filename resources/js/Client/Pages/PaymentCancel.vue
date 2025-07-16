<template>
  <MainLayout>
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-red-900 to-gray-900">
      <div class="max-w-3xl mx-auto text-center">
        <div class="bg-white rounded-lg shadow-xl p-8">
          <div class="flex justify-center mb-6">
            <div class="bg-red-100 p-3 rounded-full">
              <i class="fas fa-times-circle text-red-500 text-5xl"></i>
            </div>
          </div>
          
          <h1 class="text-3xl font-bold text-gray-800 mb-4">Paiement annulé</h1>
          <p class="text-gray-600 mb-6">Votre paiement a été annulé et aucun montant n'a été prélevé.</p>
          
          <div class="mb-8">
            <p class="text-gray-600">
              Vous pouvez retourner à la boutique pour continuer vos achats ou réessayer le paiement.
            </p>
          </div>
          
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a 
              href="/productions" 
              class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-md transition-colors"
            >
              <i class="fas fa-shopping-cart mr-2"></i>
              Retour à la boutique
            </a>
            
            <a 
              href="/contact" 
              class="inline-flex items-center justify-center bg-gray-600 hover:bg-gray-700 text-white font-medium py-3 px-6 rounded-md transition-colors"
            >
              <i class="fas fa-question-circle mr-2"></i>
              Besoin d'aide ?
            </a>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<script setup>
import MainLayout from '../Layouts/MainLayout.vue'
</script> 