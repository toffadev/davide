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
                    Êtes-vous sûr de vouloir supprimer cette sortie musicale ? Cette action est irréversible.
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
    <div v-if="showAddForm || editingRelease" class="bg-white shadow-sm rounded-lg p-6">
      <h2 class="text-lg font-medium text-gray-900 mb-6">
        {{ editingRelease ? 'Modifier la sortie musicale' : 'Ajouter une sortie musicale' }}
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
            <option value="single">Single</option>
            <option value="album">Album</option>
            <option value="ep">EP</option>
          </select>
        </div>

        <!-- Date de sortie -->
        <div>
          <label for="release_date" class="block text-sm font-medium text-gray-700">Date de sortie</label>
          <input
            type="date"
            id="release_date"
            v-model="form.release_date"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
            required
          >
        </div>

        <!-- Image de couverture -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Image de couverture</label>
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
                ref="coverImageInput"
                @change="handleImageChange" 
                accept="image/*"
                class="hidden"
              >
              <button 
                type="button"
                @click="$refs.coverImageInput.click()"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
              >
                <i class="fas fa-upload mr-2"></i>
                {{ form.cover_image ? 'Changer l\'image' : 'Choisir une image' }}
              </button>
            </div>
          </div>
        </div>

        <!-- Liens -->
        <div class="space-y-4">
          <div>
            <label for="spotify_link" class="block text-sm font-medium text-gray-700">Lien Spotify</label>
            <input
              type="url"
              id="spotify_link"
              v-model="form.spotify_link"
              placeholder="https://open.spotify.com/..."
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
            >
          </div>

          <div>
            <label for="apple_music_link" class="block text-sm font-medium text-gray-700">Lien Apple Music</label>
            <input
              type="url"
              id="apple_music_link"
              v-model="form.apple_music_link"
              placeholder="https://music.apple.com/..."
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
            >
          </div>

          <div>
            <label for="youtube_link" class="block text-sm font-medium text-gray-700">Lien YouTube</label>
            <input
              type="url"
              id="youtube_link"
              v-model="form.youtube_link"
              placeholder="https://youtube.com/..."
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
            >
          </div>
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
            Rendre cette sortie visible
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
            {{ editingRelease ? 'Mettre à jour' : 'Créer' }}
          </button>
        </div>
      </form>
    </div>

    <!-- Liste des sorties -->
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
            placeholder="Rechercher une sortie..."
          >
        </div>
        
        <div class="flex space-x-3">
          <div class="relative">
            <select
              v-model="typeFilter"
              class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md"
            >
              <option value="">Tous les types</option>
              <option value="single">Single</option>
              <option value="album">Album</option>
              <option value="ep">EP</option>
            </select>
          </div>
          
          <button 
            @click="showAddForm = true"
            class="flex items-center space-x-2 px-4 py-2 bg-primary text-white rounded-md shadow-sm text-sm font-medium hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-primary"
          >
            <i class="fas fa-plus"></i>
            <span>Ajouter une sortie</span>
          </button>
        </div>
      </div>

      <!-- Quick Stats -->
      <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Singles</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.singles }}</h3>
            </div>
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
              <i class="fas fa-music text-xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Albums</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.albums }}</h3>
            </div>
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
              <i class="fas fa-compact-disc text-xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">EPs</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.eps }}</h3>
            </div>
            <div class="p-3 rounded-full bg-green-100 text-green-600">
              <i class="fas fa-record-vinyl text-xl"></i>
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
                Cover
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Titre
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Type
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date de sortie
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
            <tr v-for="release in filteredReleases" :key="release.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <img 
                  :src="release.cover_image" 
                  :alt="release.title"
                  class="h-12 w-12 rounded-lg object-cover"
                >
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">{{ release.title }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  :class="{
                    'bg-blue-100 text-blue-800': release.type === 'single',
                    'bg-purple-100 text-purple-800': release.type === 'album',
                    'bg-green-100 text-green-800': release.type === 'ep'
                  }"
                >
                  {{ release.type.toUpperCase() }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ formatDate(release.release_date) }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="[
                  'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                  release.is_visible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
                ]">
                  {{ release.is_visible ? 'Visible' : 'Masqué' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button @click="editRelease(release)" class="text-primary hover:text-primary-dark mr-3">
                  <i class="fas fa-edit"></i>
                </button>
                <button @click="deleteRelease(release.id)" class="text-red-600 hover:text-red-900">
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
  musicReleases: {
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
const showDeleteModal = ref(false)
const releaseToDelete = ref(null)
const showNotification = ref(false)
const notificationMessage = ref('')
const notificationType = ref('success')
const showAddForm = ref(false)
const editingRelease = ref(null)

// Form state
const form = ref({
  title: '',
  description: '',
  type: '',
  release_date: '',
  spotify_link: '',
  apple_music_link: '',
  youtube_link: '',
  is_visible: true,
  cover_image: null
})

const imagePreview = ref(null)
const coverImageInput = ref(null)

// Computed
const filteredReleases = computed(() => {
  let releases = props.musicReleases

  if (search.value) {
    const searchLower = search.value.toLowerCase()
    releases = releases.filter(release => 
      release.title.toLowerCase().includes(searchLower)
    )
  }

  if (typeFilter.value) {
    releases = releases.filter(release => release.type === typeFilter.value)
  }

  return releases
})

const stats = computed(() => {
  return {
    singles: props.musicReleases.filter(r => r.type === 'single').length,
    albums: props.musicReleases.filter(r => r.type === 'album').length,
    eps: props.musicReleases.filter(r => r.type === 'ep').length
  }
})

// Méthodes
const formatDate = (date) => {
  return new Date(date).toLocaleDateString('fr-FR', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  })
}

const formatDateForInput = (date) => {
  return new Date(date).toISOString().split('T')[0]
}

const handleImageChange = (e) => {
  const file = e.target.files[0]
  if (file) {
    form.value.cover_image = file
    imagePreview.value = URL.createObjectURL(file)
  }
}

const editRelease = (release) => {
  editingRelease.value = release
  form.value = {
    title: release.title,
    description: release.description,
    type: release.type,
    release_date: formatDateForInput(release.release_date),
    spotify_link: release.spotify_link,
    apple_music_link: release.apple_music_link,
    youtube_link: release.youtube_link,
    is_visible: release.is_visible,
    cover_image: null
  }
  imagePreview.value = release.cover_image
}

const deleteRelease = (id) => {
  releaseToDelete.value = id
  showDeleteModal.value = true
}

const confirmDelete = () => {
  if (releaseToDelete.value) {
    router.delete(`/admin/music-releases/${releaseToDelete.value}`, {
      onSuccess: () => {
        notificationMessage.value = 'Sortie musicale supprimée avec succès'
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
  releaseToDelete.value = null
}

const handleFormSubmit = () => {
  const formData = new FormData()
  
  Object.keys(form.value).forEach(key => {
    if (key === 'cover_image') {
      if (form.value.cover_image) {
        formData.append('cover_image', form.value.cover_image)
      }
    } else if (key === 'is_visible') {
      formData.append(key, form.value[key] ? '1' : '0')
    } else {
      formData.append(key, form.value[key])
    }
  })

  if (editingRelease.value) {
    formData.append('_method', 'PUT')
    router.post(`/admin/music-releases/${editingRelease.value.id}`, formData, {
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
    router.post('/admin/music-releases', formData, {
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
  editingRelease.value = null
  form.value = {
    title: '',
    description: '',
    type: '',
    release_date: '',
    spotify_link: '',
    apple_music_link: '',
    youtube_link: '',
    is_visible: true,
    cover_image: null
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