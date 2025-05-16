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
                    Êtes-vous sûr de vouloir supprimer cette actualité ? Cette action est irréversible.
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
    <div v-if="showAddForm || editingActuality" class="bg-white shadow-sm rounded-lg p-6">
      <h2 class="text-lg font-medium text-gray-900 mb-6">
        {{ editingActuality ? 'Modifier l\'actualité' : 'Ajouter une actualité' }}
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

        <!-- Contenu -->
        <div>
          <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
          <textarea
            id="content"
            v-model="form.content"
            rows="6"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
          ></textarea>
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
            <option value="event">Événement</option>
            <option value="news">Actualité</option>
            <option value="release">Sortie</option>
          </select>
        </div>

        <!-- Date -->
        <div>
          <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
          <input
            type="date"
            id="date"
            v-model="form.date"
            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
            required
          >
        </div>

        <!-- Image -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Image</label>
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
                ref="imageInput"
                @change="handleImageChange" 
                accept="image/*"
                class="hidden"
              >
              <button 
                type="button"
                @click="$refs.imageInput.click()"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
              >
                <i class="fas fa-upload mr-2"></i>
                {{ form.image ? 'Changer l\'image' : 'Choisir une image' }}
              </button>
            </div>
          </div>
        </div>

        <!-- Options -->
        <div class="space-y-4">
          <div class="flex items-center">
            <input
              type="checkbox"
              id="is_featured"
              v-model="form.is_featured"
              class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
            >
            <label for="is_featured" class="ml-2 block text-sm text-gray-900">
              Mettre en avant cette actualité
            </label>
          </div>

          <div class="flex items-center">
            <input
              type="checkbox"
              id="is_visible"
              v-model="form.is_visible"
              class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
            >
            <label for="is_visible" class="ml-2 block text-sm text-gray-900">
              Rendre cette actualité visible
            </label>
          </div>
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
            {{ editingActuality ? 'Mettre à jour' : 'Créer' }}
          </button>
        </div>
      </form>
    </div>

    <!-- Liste des actualités -->
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
            placeholder="Rechercher une actualité..."
          >
        </div>
        
        <div class="flex space-x-3">
          <div class="relative">
            <select
              v-model="categoryFilter"
              class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md"
            >
              <option value="">Toutes les catégories</option>
              <option value="event">Événements</option>
              <option value="news">Actualités</option>
              <option value="release">Sorties</option>
            </select>
          </div>
          
          <button 
            @click="showAddForm = true"
            class="flex items-center space-x-2 px-4 py-2 bg-primary text-white rounded-md shadow-sm text-sm font-medium hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-primary"
          >
            <i class="fas fa-plus"></i>
            <span>Ajouter une actualité</span>
          </button>
        </div>
      </div>

      <!-- Quick Stats -->
      <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Événements</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.events }}</h3>
            </div>
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
              <i class="fas fa-calendar-alt text-xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Actualités</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.news }}</h3>
            </div>
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
              <i class="fas fa-newspaper text-xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Sorties</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.releases }}</h3>
            </div>
            <div class="p-3 rounded-full bg-green-100 text-green-600">
              <i class="fas fa-bullhorn text-xl"></i>
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
                Image
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Titre
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Catégorie
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date
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
            <tr v-for="actuality in filteredActualities" :key="actuality.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <img 
                  :src="actuality.image" 
                  :alt="actuality.title"
                  class="h-12 w-12 rounded-lg object-cover"
                >
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">{{ actuality.title }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  :class="{
                    'bg-blue-100 text-blue-800': actuality.category === 'event',
                    'bg-purple-100 text-purple-800': actuality.category === 'news',
                    'bg-green-100 text-green-800': actuality.category === 'release'
                  }"
                >
                  {{ getCategoryLabel(actuality.category) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ formatDate(actuality.date) }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span :class="[
                  'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                  actuality.is_visible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
                ]">
                  {{ actuality.is_visible ? 'Visible' : 'Masqué' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button @click="editActuality(actuality)" class="text-primary hover:text-primary-dark mr-3">
                  <i class="fas fa-edit"></i>
                </button>
                <button @click="deleteActuality(actuality.id)" class="text-red-600 hover:text-red-900">
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
  actualities: {
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
const categoryFilter = ref('')
const showDeleteModal = ref(false)
const actualityToDelete = ref(null)
const showNotification = ref(false)
const notificationMessage = ref('')
const notificationType = ref('success')
const showAddForm = ref(false)
const editingActuality = ref(null)

// Form state
const form = ref({
  title: '',
  content: '',
  category: '',
  date: '',
  is_featured: false,
  is_visible: true,
  image: null
})

const imagePreview = ref(null)
const imageInput = ref(null)

// Computed
const filteredActualities = computed(() => {
  let actualities = props.actualities

  if (search.value) {
    const searchLower = search.value.toLowerCase()
    actualities = actualities.filter(actuality => 
      actuality.title.toLowerCase().includes(searchLower)
    )
  }

  if (categoryFilter.value) {
    actualities = actualities.filter(actuality => actuality.category === categoryFilter.value)
  }

  return actualities
})

const stats = computed(() => {
  return {
    events: props.actualities.filter(a => a.category === 'event').length,
    news: props.actualities.filter(a => a.category === 'news').length,
    releases: props.actualities.filter(a => a.category === 'release').length
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

const getCategoryLabel = (category) => {
  const labels = {
    'event': 'Événement',
    'news': 'Actualité',
    'release': 'Sortie'
  }
  return labels[category] || category
}

const handleImageChange = (e) => {
  const file = e.target.files[0]
  if (file) {
    form.value.image = file
    imagePreview.value = URL.createObjectURL(file)
  }
}

const editActuality = (actuality) => {
  editingActuality.value = actuality
  form.value = {
    title: actuality.title,
    content: actuality.content,
    category: actuality.category,
    date: formatDateForInput(actuality.date),
    is_featured: actuality.is_featured,
    is_visible: actuality.is_visible,
    image: null
  }
  imagePreview.value = actuality.image
}

const deleteActuality = (id) => {
  actualityToDelete.value = id
  showDeleteModal.value = true
}

const confirmDelete = () => {
  if (actualityToDelete.value) {
    router.delete(`/admin/actualities/${actualityToDelete.value}`, {
      onSuccess: () => {
        notificationMessage.value = 'Actualité supprimée avec succès'
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
  actualityToDelete.value = null
}

const handleFormSubmit = () => {
  const formData = new FormData()
  
  Object.keys(form.value).forEach(key => {
    if (key === 'image') {
      if (form.value.image) {
        formData.append('image', form.value.image)
      }
    } else if (key === 'is_featured' || key === 'is_visible') {
      formData.append(key, form.value[key] ? '1' : '0')
    } else {
      formData.append(key, form.value[key])
    }
  })

  if (editingActuality.value) {
    formData.append('_method', 'PUT')
    router.post(`/admin/actualities/${editingActuality.value.id}`, formData, {
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
    router.post('/admin/actualities', formData, {
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
  editingActuality.value = null
  form.value = {
    title: '',
    content: '',
    category: '',
    date: '',
    is_featured: false,
    is_visible: true,
    image: null
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