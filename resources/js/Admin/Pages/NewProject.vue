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
                    Êtes-vous sûr de vouloir supprimer ce projet ? Cette action est irréversible.
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

    <!-- Carte de projet existant -->
    <div v-if="hasProject && !isEditing" class="bg-white shadow-sm rounded-lg p-6 mb-6">
      <div class="flex justify-between items-start">
        <div class="flex items-start space-x-6">
          <img 
            :src="newProject.cover_image" 
            :alt="newProject.title"
            class="h-32 w-32 rounded-lg object-cover shadow-md"
          >
          <div>
            <h2 class="text-2xl font-bold text-gray-900">{{ newProject.title }}</h2>
            <div class="flex items-center space-x-2 mt-2">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                :class="{
                  'bg-blue-100 text-blue-800': newProject.type === 'single',
                  'bg-purple-100 text-purple-800': newProject.type === 'album',
                  'bg-green-100 text-green-800': newProject.type === 'ep'
                }"
              >
                {{ newProject.type.toUpperCase() }}
              </span>
              <span :class="[
                'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                newProject.is_visible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
              ]">
                {{ newProject.is_visible ? 'Visible' : 'Masqué' }}
              </span>
            </div>
            <p class="text-sm text-gray-600 mt-2">Date de sortie : {{ formatDate(newProject.release_date) }}</p>
            <p class="text-sm text-gray-500 mt-1 max-w-2xl">{{ newProject.description }}</p>
            
            <div class="flex space-x-3 mt-4">
              <a v-if="newProject.spotify_link" :href="newProject.spotify_link" target="_blank" class="text-green-600 hover:text-green-800">
                <i class="fab fa-spotify text-xl"></i>
              </a>
              <a v-if="newProject.apple_music_link" :href="newProject.apple_music_link" target="_blank" class="text-pink-600 hover:text-pink-800">
                <i class="fab fa-apple text-xl"></i>
              </a>
              <a v-if="newProject.youtube_link" :href="newProject.youtube_link" target="_blank" class="text-red-600 hover:text-red-800">
                <i class="fab fa-youtube text-xl"></i>
              </a>
            </div>
          </div>
        </div>
        
        <div class="flex space-x-3">
          <button 
            @click="startEditing" 
            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
          >
            <i class="fas fa-edit mr-2"></i>
            Modifier
          </button>
          <button 
            @click="showDeleteConfirmation" 
            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
          >
            <i class="fas fa-trash mr-2"></i>
            Supprimer
          </button>
        </div>
      </div>
    </div>

    <!-- Formulaire d'ajout/modification -->
    <div v-if="!hasProject || isEditing" class="bg-white shadow-sm rounded-lg p-6">
      <h2 class="text-lg font-medium text-gray-900 mb-6">
        {{ isEditing ? 'Modifier le projet' : 'Créer un nouveau projet' }}
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
                {{ imagePreview ? 'Changer l\'image' : 'Choisir une image' }}
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
            Rendre ce projet visible
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
            {{ isEditing ? 'Mettre à jour' : 'Créer' }}
          </button>
        </div>
      </form>
    </div>

    <!-- Message d'absence de projet -->
    <div v-if="!hasProject && !form.title" class="bg-white shadow-sm rounded-lg p-6 text-center">
      <div class="py-12">
        <i class="fas fa-music text-gray-300 text-6xl mb-4"></i>
        <h3 class="text-xl font-medium text-gray-900 mb-2">Aucun projet configuré</h3>
        <p class="text-gray-500 mb-6">Vous pouvez ajouter un nouveau projet musical en utilisant le formulaire ci-dessus.</p>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import AdminLayout from '../Layouts/AdminLayout.vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  newProject: {
    type: Object,
    default: () => null
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
const showDeleteModal = ref(false)
const showNotification = ref(false)
const notificationMessage = ref('')
const notificationType = ref('success')
const isEditing = ref(false)

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
const hasProject = computed(() => {
  return props.newProject !== null
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

const startEditing = () => {
  isEditing.value = true
  form.value = {
    title: props.newProject.title,
    description: props.newProject.description,
    type: props.newProject.type,
    release_date: formatDateForInput(props.newProject.release_date),
    spotify_link: props.newProject.spotify_link,
    apple_music_link: props.newProject.apple_music_link,
    youtube_link: props.newProject.youtube_link,
    is_visible: props.newProject.is_visible,
    cover_image: null
  }
  imagePreview.value = props.newProject.cover_image
}

const showDeleteConfirmation = () => {
  showDeleteModal.value = true
}

const confirmDelete = () => {
  if (props.newProject) {
    router.delete(`/admin/new-project/${props.newProject.id}`, {
      onSuccess: () => {
        notificationMessage.value = 'Projet supprimé avec succès'
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

  if (isEditing.value && props.newProject) {
    formData.append('_method', 'PUT')
    router.post(`/admin/new-project/${props.newProject.id}`, formData, {
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
    router.post('/admin/new-project', formData, {
      preserveScroll: true,
      onSuccess: (page) => {
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
  if (hasProject.value) {
    isEditing.value = false
  }
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