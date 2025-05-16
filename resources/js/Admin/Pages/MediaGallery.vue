<template>
  <AdminLayout>
    <!-- Notification -->
    <div 
      v-if="showNotification"
      :class="[
        'fixed top-4 right-4 px-4 py-2 rounded-lg shadow-lg z-50',
        notificationType === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
      ]"
    >
      {{ notificationMessage }}
    </div>

    <!-- Modal de confirmation de suppression -->
    <div v-if="showDeleteModal" class="fixed inset-0 z-50 overflow-y-auto">
      <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <i class="fas fa-exclamation-triangle text-red-600"></i>
              </div>
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Confirmer la suppression
                </h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">
                    Êtes-vous sûr de vouloir supprimer ce média ? Cette action est irréversible.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button
              type="button"
              @click="confirmDelete"
              class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
            >
              Supprimer
            </button>
            <button
              type="button"
              @click="showDeleteModal = false"
              class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
            >
              Annuler
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Formulaire d'ajout/modification -->
    <div v-if="showAddForm || editingMedia" class="bg-white shadow-sm rounded-lg p-6">
      <h2 class="text-lg font-medium text-gray-900 mb-6">
        {{ editingMedia ? 'Modifier le média' : 'Ajouter un média' }}
      </h2>
      
      <form @submit.prevent="handleFormSubmit" class="space-y-6">
        <!-- Titre -->
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
          <input
            type="text"
            id="title"
            v-model="form.title"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
            required
          >
        </div>

        <!-- Description -->
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
          <textarea
            id="description"
            v-model="form.description"
            rows="4"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
          ></textarea>
        </div>

        <!-- Type -->
        <div>
          <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
          <select
            id="type"
            v-model="form.type"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
            required
          >
            <option value="">Sélectionner un type</option>
            <option value="image">Image</option>
            <option value="video">Vidéo</option>
          </select>
        </div>
        
        <!-- URL -->
        <div>
          <label for="url" class="block text-sm font-medium text-gray-700">URL du média</label>
          <input
            type="text"
            id="url"
            v-model="form.url"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
            required
          >
          <p class="mt-1 text-sm text-gray-500">
            Pour les images, entrez l'URL de l'image ou téléchargez une image.
            Pour les vidéos, entrez l'URL de la vidéo (YouTube, Vimeo, etc.)
          </p>
        </div>
        
        <!-- Catégorie -->
        <div>
          <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
          <select
            id="category"
            v-model="form.category"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
            required
          >
            <option value="">Sélectionner une catégorie</option>
            <option value="comedy">Comédie</option>
            <option value="music">Musique</option>
            <option value="personal">Personnel</option>
          </select>
        </div>

        <!-- Miniature -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Miniature</label>
          <div class="mt-1 flex items-center space-x-4">
            <div class="flex-shrink-0">
              <div 
                v-if="imagePreview" 
                class="h-32 w-32 rounded-lg bg-gray-100 flex items-center justify-center overflow-hidden"
              >
                <img 
                  :src="imagePreview" 
                  alt="Preview" 
                  class="h-32 w-32 object-cover"
                >
              </div>
              <div 
                v-else 
                class="h-32 w-32 rounded-lg bg-gray-100 flex items-center justify-center"
              >
                <i class="fas fa-image text-gray-400 text-3xl"></i>
              </div>
            </div>
            <div class="flex-1">
              <input 
                type="file" 
                ref="thumbnailInput"
                @change="handleImageChange" 
                accept="image/*"
                class="hidden"
              >
              <button 
                type="button"
                @click="$refs.thumbnailInput.click()"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
              >
                <i class="fas fa-upload mr-2"></i>
                {{ form.thumbnail ? 'Changer la miniature' : 'Choisir une miniature' }}
              </button>
            </div>
          </div>
        </div>
        
        <!-- Ordre -->
        <div>
          <label for="order" class="block text-sm font-medium text-gray-700">Ordre d'affichage</label>
          <input
            type="number"
            id="order"
            v-model="form.order"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
          >
        </div>

        <!-- Visibilité -->
        <div class="flex items-center">
          <input
            type="checkbox"
            id="is_visible"
            v-model="form.is_visible"
            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
          >
          <label for="is_visible" class="ml-2 block text-sm text-gray-900">
            Rendre ce média visible
          </label>
        </div>

        <!-- Boutons -->
        <div class="flex justify-end space-x-3">
          <button 
            type="button" 
            @click="cancelForm" 
            class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
          >
            Annuler
          </button>
          <button
            type="submit"
            class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
          >
            {{ editingMedia ? 'Mettre à jour' : 'Créer' }}
          </button>
        </div>
      </form>
    </div>

    <!-- Liste des médias -->
    <div v-else>
      <!-- Actions Bar -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 space-y-4 md:space-y-0">
        <div class="relative w-full md:w-64">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-search text-gray-400"></i>
          </div>
          <input 
            type="text" 
            v-model="search" 
            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm" 
            placeholder="Rechercher un média..."
          >
        </div>
        
        <div class="flex space-x-3">
          <div class="relative">
            <select
              v-model="typeFilter"
              class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md"
            >
              <option value="">Tous les types</option>
              <option value="image">Images</option>
              <option value="video">Vidéos</option>
            </select>
          </div>
          
          <div class="relative">
            <select
              v-model="categoryFilter"
              class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md"
            >
              <option value="">Toutes les catégories</option>
              <option value="comedy">Comédie</option>
              <option value="music">Musique</option>
              <option value="personal">Personnel</option>
            </select>
          </div>
          
          <button 
            @click="showAddForm = true"
            class="flex items-center space-x-2 px-4 py-2 bg-primary text-white rounded-md shadow-sm text-sm font-medium hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-primary"
          >
            <i class="fas fa-plus"></i>
            <span>Ajouter un média</span>
          </button>
        </div>
      </div>

      <!-- Quick Stats -->
      <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Images</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.images }}</h3>
            </div>
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
              <i class="fas fa-image text-xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Vidéos</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.videos }}</h3>
            </div>
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
              <i class="fas fa-video text-xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Total</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.total }}</h3>
            </div>
            <div class="p-3 rounded-full bg-green-100 text-green-600">
              <i class="fas fa-photo-video text-xl"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- Table -->
      <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Média
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Titre
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Type
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Catégorie
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Ordre
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Statut
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="media in filteredMedia" :key="media.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <div v-if="media.type === 'image'" class="h-12 w-12 rounded-lg overflow-hidden">
                  <img 
                    :src="media.thumbnail || media.url" 
                    :alt="media.title"
                    class="h-12 w-12 object-cover"
                  >
                </div>
                <div v-else class="h-12 w-12 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                  <i class="fas fa-video text-gray-400"></i>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">{{ media.title }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  :class="{
                    'bg-blue-100 text-blue-800': media.type === 'image',
                    'bg-purple-100 text-purple-800': media.type === 'video'
                  }"
                >
                  {{ media.type === 'image' ? 'Image' : 'Vidéo' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  :class="{
                    'bg-yellow-100 text-yellow-800': media.category === 'comedy',
                    'bg-green-100 text-green-800': media.category === 'music',
                    'bg-indigo-100 text-indigo-800': media.category === 'personal'
                  }"
                >
                  {{ 
                    media.category === 'comedy' ? 'Comédie' : 
                    media.category === 'music' ? 'Musique' : 'Personnel' 
                  }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ media.order }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="[
                  'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                  media.is_visible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
                ]">
                  {{ media.is_visible ? 'Visible' : 'Masqué' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button @click="editMedia(media)" class="text-primary hover:text-primary-dark mr-3">
                  <i class="fas fa-edit"></i>
                </button>
                <button @click="deleteMedia(media.id)" class="text-red-600 hover:text-red-900">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import AdminLayout from '../Layouts/AdminLayout.vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  mediaGallery: {
    type: Array,
    required: true
  },
  flash: {
    type: Object,
    default: () => ({
      success: null,
      error: null
    })
  }
})

// État local
const search = ref('')
const typeFilter = ref('')
const categoryFilter = ref('')
const showDeleteModal = ref(false)
const mediaToDelete = ref(null)
const showNotification = ref(false)
const notificationMessage = ref('')
const notificationType = ref('success')
const showAddForm = ref(false)
const editingMedia = ref(null)

// Form state
const form = ref({
  title: '',
  description: '',
  type: '',
  url: '',
  thumbnail: null,
  category: '',
  is_visible: true,
  order: 0
})

const imagePreview = ref(null)
const thumbnailInput = ref(null)

// Computed
const filteredMedia = computed(() => {
  let media = props.mediaGallery

  if (search.value) {
    const searchLower = search.value.toLowerCase()
    media = media.filter(item => 
      item.title.toLowerCase().includes(searchLower) || 
      (item.description && item.description.toLowerCase().includes(searchLower))
    )
  }

  if (typeFilter.value) {
    media = media.filter(item => item.type === typeFilter.value)
  }
  
  if (categoryFilter.value) {
    media = media.filter(item => item.category === categoryFilter.value)
  }

  return media
})

const stats = computed(() => {
  return {
    images: props.mediaGallery.filter(m => m.type === 'image').length,
    videos: props.mediaGallery.filter(m => m.type === 'video').length,
    total: props.mediaGallery.length
  }
})

// Méthodes
const handleImageChange = (e) => {
  const file = e.target.files[0]
  if (file) {
    form.value.thumbnail = file
    imagePreview.value = URL.createObjectURL(file)
  }
}

const editMedia = (media) => {
  editingMedia.value = media
  form.value = {
    title: media.title,
    description: media.description,
    type: media.type,
    url: media.url,
    thumbnail: null,
    category: media.category,
    is_visible: media.is_visible,
    order: media.order
  }
  imagePreview.value = media.thumbnail
}

const deleteMedia = (id) => {
  mediaToDelete.value = id
  showDeleteModal.value = true
}

const confirmDelete = () => {
  if (mediaToDelete.value) {
    router.delete(`/admin/media-gallery/${mediaToDelete.value}`, {
      onSuccess: () => {
        notificationMessage.value = 'Média supprimé avec succès'
        notificationType.value = 'success'
        showNotification.value = true
        setTimeout(() => showNotification.value = false, 3000)
      },
      onError: (errors) => {
        notificationMessage.value = Object.values(errors)[0]
        notificationType.value = 'error'
        showNotification.value = true
        setTimeout(() => showNotification.value = false, 3000)
      }
    })
  }
  showDeleteModal.value = false
  mediaToDelete.value = null
}

const handleFormSubmit = () => {
  const formData = new FormData()
  
  Object.keys(form.value).forEach(key => {
    if (key === 'thumbnail') {
      if (form.value.thumbnail && typeof form.value.thumbnail !== 'string') {
        formData.append('thumbnail', form.value.thumbnail)
      }
    } else if (key === 'is_visible') {
      formData.append(key, form.value[key] ? '1' : '0')
    } else {
      formData.append(key, form.value[key])
    }
  })

  if (editingMedia.value) {
    formData.append('_method', 'PUT')
    router.post(`/admin/media-gallery/${editingMedia.value.id}`, formData, {
      preserveScroll: true,
      onSuccess: (page) => {
        cancelForm()
        if (page.props.flash.success) {
          notificationMessage.value = page.props.flash.success
          notificationType.value = 'success'
          showNotification.value = true
          setTimeout(() => showNotification.value = false, 3000)
        }
      },
      onError: (errors) => {
        notificationMessage.value = Object.values(errors)[0]
        notificationType.value = 'error'
        showNotification.value = true
        setTimeout(() => showNotification.value = false, 3000)
      }
    })
  } else {
    router.post('/admin/media-gallery', formData, {
      preserveScroll: true,
      onSuccess: (page) => {
        cancelForm()
        if (page.props.flash.success) {
          notificationMessage.value = page.props.flash.success
          notificationType.value = 'success'
          showNotification.value = true
          setTimeout(() => showNotification.value = false, 3000)
        }
      },
      onError: (errors) => {
        notificationMessage.value = Object.values(errors)[0]
        notificationType.value = 'error'
        showNotification.value = true
        setTimeout(() => showNotification.value = false, 3000)
      }
    })
  }
}

const cancelForm = () => {
  showAddForm.value = false
  editingMedia.value = null
  form.value = {
    title: '',
    description: '',
    type: '',
    url: '',
    thumbnail: null,
    category: '',
    is_visible: true,
    order: 0
  }
  imagePreview.value = null
}

// Ajouter un watcher pour les messages flash
watch(() => props.flash, (newFlash) => {
  if (newFlash.success) {
    notificationMessage.value = newFlash.success
    notificationType.value = 'success'
    showNotification.value = true
    setTimeout(() => showNotification.value = false, 3000)
  }
  if (newFlash.error) {
    notificationMessage.value = newFlash.error
    notificationType.value = 'error'
    showNotification.value = true
    setTimeout(() => showNotification.value = false, 3000)
  }
}, { immediate: true })
</script> 