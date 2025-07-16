<template>
  <MainLayout>
    <!-- Hero Section - Hauteur réduite -->
    <section class="pt-20 pb-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-900 to-gray-900">
      <div class="max-w-5xl mx-auto text-center animate-fade-in">
        <h1 class="text-3xl md:text-5xl font-bold mb-3">DNBEATZ <span class="gradient-text">Store</span></h1>
        <h2 class="text-lg md:text-xl text-gray-300 mb-4">Découvrez et achetez des beats exclusifs pour vos projets</h2>
        <div class="flex justify-center space-x-4">
          <a href="#premium" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-full font-medium transition shadow-lg flex items-center text-sm">
            <i class="fas fa-crown mr-2"></i> Beats Premium
          </a>
          <a href="#gratuit" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-full font-medium transition shadow-lg flex items-center text-sm">
            <i class="fas fa-gift mr-2"></i> Beats Gratuits
          </a>
        </div>
      </div>
    </section>

    <div class="container mx-auto px-4 py-8">
      <!-- Message de confirmation ou d'erreur -->
      <div v-if="$page.props.flash.success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
        <span class="block sm:inline">{{ $page.props.flash.success }}</span>
      </div>
      
      <div v-if="$page.props.flash.error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
        <span class="block sm:inline">{{ $page.props.flash.error }}</span>
      </div>
      
      <!-- Productions payantes - Design amélioré -->
      <section id="premium" class="mb-10">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-xl font-semibold">Beats Premium</h2>
          <div class="h-px bg-gray-300 flex-grow ml-4"></div>
        </div>
        
        <div v-if="paidProductions.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
          <div v-for="production in paidProductions" :key="production.id" 
               class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1 hover:scale-[1.02] flex flex-col">
            <div class="relative pb-[56%]">
              <img 
                v-if="production.cover_image"
                :src="production.cover_image" 
                :alt="production.title" 
                class="absolute inset-0 w-full h-full object-cover"
              >
              <div v-else class="absolute inset-0 w-full h-full bg-gray-200 flex items-center justify-center">
                <i class="fas fa-image text-gray-400 text-4xl"></i>
              </div>
              <div class="absolute top-2 right-2 bg-blue-600 text-white px-2 py-1 rounded-full text-xs font-medium">
                {{ formatPrice(production.price) }}
              </div>
            </div>
            
            <div class="p-3 flex-grow flex flex-col">
              <h3 class="text-lg font-semibold mb-1 line-clamp-1">{{ production.title }}</h3>
              <p v-if="production.description" class="text-gray-600 mb-3 text-sm line-clamp-2">{{ production.description }}</p>
              
              <div v-if="production.audio_sample_path" class="mb-3 mt-auto">
                <audio controls class="w-full h-8">
                  <source :src="production.audio_sample_path" type="audio/mpeg">
                  Votre navigateur ne supporte pas la lecture audio.
                </audio>
              </div>
              
              <button 
                class="w-full bg-primary text-white py-2 rounded-md hover:bg-primary-dark transition-colors text-sm"
                @click="checkout(production.id)"
                :disabled="loading === production.id"
              >
                <span v-if="loading === production.id">
                  <i class="fas fa-spinner fa-spin mr-1"></i> Chargement...
                </span>
                <span v-else>
                  <i class="fas fa-shopping-cart mr-1"></i> Acheter
                </span>
              </button>
            </div>
          </div>
        </div>
        
        <div v-else class="text-center py-6 text-gray-500 bg-gray-50 rounded-lg">
          <i class="fas fa-music text-4xl mb-3 text-gray-400"></i>
          <p>Aucun beat premium disponible pour le moment.</p>
        </div>
      </section>
      
      <!-- Productions gratuites - Design amélioré -->
      <section id="gratuit" class="mb-10">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-xl font-semibold">Beats Gratuits</h2>
          <div class="h-px bg-gray-300 flex-grow ml-4"></div>
        </div>
        
        <div v-if="freeProductions.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
          <div v-for="production in freeProductions" :key="production.id" 
               class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1 hover:scale-[1.02] flex flex-col">
            <div class="relative pb-[56%] bg-black">
              <div v-if="getYoutubeEmbedUrl(production.youtube_link)" class="youtube-container absolute inset-0">
                <!-- Thumbnail avec bouton play (affiché par défaut) -->
                <div 
                  v-if="!loadedVideos.has(production.id)"
                  class="youtube-thumbnail absolute inset-0 cursor-pointer flex items-center justify-center"
                  @click="loadYoutubeVideo(production)"
                >
                  <!-- Miniature YouTube (générée à partir de l'ID) -->
                  <img 
                    :src="getYoutubeThumbnail(production.youtube_link)" 
                    :alt="production.title" 
                    class="absolute inset-0 w-full h-full object-cover"
                  >
                  <!-- Bouton play -->
                  <div class="play-button-overlay absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center shadow-xl">
                      <i class="fas fa-play text-white text-2xl"></i>
                    </div>
                  </div>
                </div>
                
                <!-- iframe YouTube (chargé uniquement après clic) -->
                <iframe 
                  v-if="loadedVideos.has(production.id)"
                  :src="getYoutubeEmbedUrl(production.youtube_link)" 
                  frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen
                  class="absolute inset-0 w-full h-full youtube-iframe"
                ></iframe>
              </div>
              <div v-else class="absolute inset-0 w-full h-full bg-gray-200 flex items-center justify-center">
                <i class="fas fa-video text-gray-400 text-4xl"></i>
              </div>
              <div class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                GRATUIT
              </div>
            </div>
            
            <div class="p-3 flex-grow flex flex-col">
              <h3 class="text-lg font-semibold mb-1 line-clamp-1">{{ production.title }}</h3>
              <p v-if="production.description" class="text-gray-600 text-sm line-clamp-2 mb-3">{{ production.description }}</p>
              
              <div class="mt-auto flex justify-end">
                <a 
                  v-if="production.youtube_link"
                  :href="production.youtube_link"
                  target="_blank"
                  rel="noopener noreferrer"
                  class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded text-xs font-medium transition-colors"
                  @click.prevent="openYoutubeLink(production.youtube_link)"
                >
                  <i class="fab fa-youtube mr-1"></i> Voir sur YouTube
                </a>
              </div>
            </div>
          </div>
        </div>
        
        <div v-else class="text-center py-6 text-gray-500 bg-gray-50 rounded-lg">
          <i class="fas fa-headphones text-4xl mb-3 text-gray-400"></i>
          <p>Aucun beat gratuit disponible pour le moment.</p>
        </div>
      </section>

      <!-- Comment utiliser section - Design plus compact -->
      <section class="mt-10 bg-gray-50 rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 text-center">Comment utiliser nos beats</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
          <div class="bg-white p-4 rounded-lg shadow-sm">
            <div class="text-center mb-3">
              <div class="inline-block p-2 bg-blue-100 rounded-full text-blue-600 mb-2">
                <i class="fas fa-shopping-cart text-xl"></i>
              </div>
              <h3 class="text-base font-semibold">1. Achetez un beat</h3>
            </div>
            <p class="text-gray-600 text-sm text-center">
              Parcourez notre collection et choisissez le beat qui correspond à votre style.
            </p>
          </div>
          
          <div class="bg-white p-4 rounded-lg shadow-sm">
            <div class="text-center mb-3">
              <div class="inline-block p-2 bg-green-100 rounded-full text-green-600 mb-2">
                <i class="fas fa-download text-xl"></i>
              </div>
              <h3 class="text-base font-semibold">2. Téléchargez les fichiers</h3>
            </div>
            <p class="text-gray-600 text-sm text-center">
              Après l'achat, vous recevrez immédiatement les fichiers WAV et MP3 de haute qualité.
            </p>
          </div>
          
          <div class="bg-white p-4 rounded-lg shadow-sm">
            <div class="text-center mb-3">
              <div class="inline-block p-2 bg-purple-100 rounded-full text-purple-600 mb-2">
                <i class="fas fa-music text-xl"></i>
              </div>
              <h3 class="text-base font-semibold">3. Créez votre musique</h3>
            </div>
            <p class="text-gray-600 text-sm text-center">
              Utilisez nos beats pour créer votre propre musique selon les termes de la licence.
            </p>
          </div>
        </div>

        <div class="mt-6 text-center">
          <a href="/contact" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-md shadow-sm text-sm font-medium hover:bg-primary-dark transition-colors">
            <i class="fas fa-question-circle mr-2"></i>
            Questions sur les licences ?
          </a>
        </div>
      </section>
    </div>
  </MainLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useForm } from '@inertiajs/vue3'
import axios from 'axios'
import MainLayout from '../Layouts/MainLayout.vue'

const props = defineProps({
  paidProductions: {
    type: Array,
    default: () => []
  },
  freeProductions: {
    type: Array,
    default: () => []
  }
})

const loading = ref(null)
const stripe = ref(null)
const iframeErrors = ref(new Set()) // Pour suivre les iframes en erreur
const loadedVideos = ref(new Set()) // Pour suivre les vidéos chargées

onMounted(() => {
  if (window.Stripe) {
    stripe.value = window.Stripe(import.meta.env.VITE_STRIPE_KEY)
  }
})

// Gestion des iframes YouTube
const handleIframeLoad = (event) => {
  // Iframe chargée avec succès
  const iframe = event.target
  const iframeId = iframe.getAttribute('data-id')
  if (iframeId && iframeErrors.value.has(iframeId)) {
    iframeErrors.value.delete(iframeId)
  }
}

const handleIframeError = (event) => {
  // Erreur de chargement de l'iframe
  const iframe = event.target
  const iframeId = iframe.getAttribute('data-id')
  if (iframeId) {
    iframeErrors.value.add(iframeId)
  }
  // Masquer l'iframe en erreur
  iframe.style.display = 'none'
  
  // Afficher un message d'erreur plus discret
  const parent = iframe.parentElement
  if (parent) {
    const errorDiv = document.createElement('div')
    errorDiv.className = 'absolute inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50'
    errorDiv.innerHTML = '<div class="text-center p-4"><i class="fas fa-exclamation-circle text-yellow-500 text-2xl mb-2"></i><p class="text-white text-sm">Cliquez pour voir sur YouTube</p></div>'
    errorDiv.style.cursor = 'pointer'
    errorDiv.onclick = () => {
      // Récupérer l'URL YouTube originale
      const productionId = iframe.getAttribute('data-production-id')
      const production = props.freeProductions.find(p => p.id.toString() === productionId)
      if (production && production.youtube_link) {
        window.open(production.youtube_link, '_blank')
      }
    }
    parent.appendChild(errorDiv)
  }
}

const formatPrice = (price) => {
  return new Intl.NumberFormat('fr-FR', {
    style: 'currency',
    currency: 'EUR'
  }).format(price)
}

const getYoutubeEmbedUrl = (url) => {
  if (!url) return null
  
  // Extraire l'ID de la vidéo YouTube
  const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/
  const match = url.match(regExp)
  
  if (match && match[2].length === 11) {
    return `https://www.youtube.com/embed/${match[2]}?rel=0&showinfo=0&autoplay=0&modestbranding=1`
  }
  
  return null
}

const getYoutubeThumbnail = (url) => {
  if (!url) return null
  const videoId = url.split('v=')[1] || url.split('youtu.be/')[1] || url.split('/')[3] || url.split('?v=')[1]
  return `https://img.youtube.com/vi/${videoId}/mqdefault.jpg`
}

const loadYoutubeVideo = (production) => {
  loadedVideos.value.add(production.id)
}

const checkout = async (productionId) => {
  loading.value = productionId
  
  try {
    const response = await axios.post('/create-checkout-session', {
      production_id: productionId
    })
    
    if (!stripe.value) {
      stripe.value = window.Stripe(import.meta.env.VITE_STRIPE_KEY)
    }
    
    const result = await stripe.value.redirectToCheckout({
      sessionId: response.data.id
    })
    
    if (result.error) {
      console.error('Erreur lors de la redirection vers Stripe:', result.error)
      alert('Une erreur est survenue lors de la redirection vers la page de paiement.')
    }
  } catch (error) {
    console.error('Erreur lors de la création de la session Stripe:', error)
    alert('Une erreur est survenue lors de la création de la session de paiement.')
  } finally {
    loading.value = null
  }
}

const openYoutubeLink = (url) => {
  if (url) {
    window.open(url, '_blank', 'noopener,noreferrer');
  }
}
</script>

<style scoped>
.gradient-text {
  background: linear-gradient(45deg, #3b82f6, #8b5cf6);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
}

.animate-fade-in {
  animation: fadeIn 0.8s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.aspect-w-16 {
  position: relative;
  padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
}

.aspect-h-9 {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.line-clamp-1 {
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Styles pour les iframes YouTube */
.youtube-iframe {
  width: 100%;
  height: 100%;
  border: none;
  border-radius: 8px;
  background-color: #000; /* Fond noir pour l'iframe */
}

.youtube-iframe:not([src]) {
  display: none; /* Masque l'iframe si aucune source n'est définie */
}

.youtube-error-message {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  font-size: 1.2em;
  text-align: center;
  z-index: 10;
  display: none;
}

/* Styles pour la miniature et le bouton play */
.youtube-thumbnail {
  cursor: pointer;
  overflow: hidden;
}

.youtube-thumbnail img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.youtube-thumbnail:hover img {
  transform: scale(1.05);
}

.play-button-overlay {
  background: rgba(0, 0, 0, 0.3);
  transition: background 0.3s ease;
}

.youtube-thumbnail:hover .play-button-overlay {
  background: rgba(0, 0, 0, 0.5);
}

.youtube-thumbnail .w-16 {
  transition: transform 0.3s ease;
}

.youtube-thumbnail:hover .w-16 {
  transform: scale(1.1);
}
</style> 