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
                    Êtes-vous sûr de vouloir supprimer cet achat ? Cette action est irréversible.
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

    <!-- Modal de modification de statut -->
    <div v-if="showStatusModal" class="fixed inset-0 z-50 overflow-y-auto">
      <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                <i class="fas fa-edit text-blue-600"></i>
              </div>
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Modifier le statut de l'achat
                </h3>
                <div class="mt-4">
                  <select
                    v-model="selectedStatus"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md"
                  >
                    <option value="pending">En attente</option>
                    <option value="completed">Complété</option>
                    <option value="cancelled">Annulé</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button
              type="button"
              @click="confirmStatusChange"
              class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm"
            >
              Confirmer
            </button>
            <button
              type="button"
              @click="showStatusModal = false"
              class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
            >
              Annuler
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Liste des achats -->
    <div>
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
            placeholder="Rechercher un achat..."
          >
        </div>
        
        <div class="flex space-x-3">
          <div class="relative">
            <select
              v-model="statusFilter"
              class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md"
            >
              <option value="">Tous les statuts</option>
              <option value="pending">En attente</option>
              <option value="completed">Complété</option>
              <option value="cancelled">Annulé</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Quick Stats -->
      <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Achats complétés</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.completed }}</h3>
            </div>
            <div class="p-3 rounded-full bg-green-100 text-green-600">
              <i class="fas fa-check-circle text-xl"></i>
            </div>
          </div>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Achats en attente</p>
              <h3 class="text-2xl font-bold text-dark">{{ stats.pending }}</h3>
            </div>
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
              <i class="fas fa-clock text-xl"></i>
            </div>
          </div>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500">Revenu total</p>
              <h3 class="text-2xl font-bold text-dark">{{ formatPrice(stats.revenue) }}</h3>
            </div>
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
              <i class="fas fa-euro-sign text-xl"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- Indicateur de défilement -->
      <div class="mb-4 text-sm text-gray-500 lg:hidden">
        <i class="fas fa-arrows-alt-h mr-2"></i>
        Faites défiler horizontalement pour voir toutes les colonnes
      </div>

      <!-- Table avec défilement horizontal -->
      <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                  ID
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap min-w-[200px]">
                  Produit
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap min-w-[150px]">
                  Client
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                  Montant
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap min-w-[120px]">
                  Date
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap min-w-[120px]">
                  Expiration
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                  Statut
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap sticky right-0 bg-gray-50 z-10">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="purchase in purchases.data" :key="purchase.id" class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">#{{ purchase.id }}</div>
                  <div class="text-xs text-gray-500">{{ purchase.stripe_session_id ? purchase.stripe_session_id.substring(0, 10) + '...' : 'N/A' }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap min-w-[200px]">
                  <div v-if="purchase.production" class="flex items-center">
                    <img 
                      v-if="purchase.production.cover_image"
                      :src="purchase.production.cover_image" 
                      :alt="purchase.production.title"
                      class="h-8 w-8 rounded-full object-cover mr-2 flex-shrink-0"
                    >
                    <div v-else class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center mr-2 flex-shrink-0">
                      <i class="fas fa-music text-gray-400"></i>
                    </div>
                    <div class="text-sm font-medium text-gray-900 truncate">{{ purchase.production.title }}</div>
                  </div>
                  <div v-else class="text-sm text-gray-500">Produit supprimé</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap min-w-[150px]">
                  <div v-if="purchase.user" class="text-sm font-medium text-gray-900 truncate">
                    {{ purchase.user.name }}
                  </div>
                  <div class="text-xs text-gray-500 truncate">{{ purchase.email || 'Email non disponible' }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ formatPrice(purchase.amount_paid) }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap min-w-[120px]">
                  <div class="text-sm text-gray-900">{{ formatDate(purchase.created_at) }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap min-w-[120px]">
                  <div class="text-sm text-gray-900">{{ formatDate(purchase.download_expires_at) }}</div>
                  <div v-if="isExpired(purchase.download_expires_at)" class="text-xs text-red-500">Expiré</div>
                  <div v-else class="text-xs text-green-500">Valide</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span :class="[
                    'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                    purchase.status === 'completed' ? 'bg-green-100 text-green-800' : 
                    purchase.status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                    'bg-red-100 text-red-800'
                  ]">
                    {{ getStatusLabel(purchase.status) }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium sticky right-0 bg-white z-10">
                  <div class="flex space-x-2">
                    <button @click="openStatusModal(purchase)" class="text-primary hover:text-primary-dark p-1 rounded transition-colors">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button @click="deletePurchase(purchase.id)" class="text-red-600 hover:text-red-900 p-1 rounded transition-colors">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <!-- Message si aucun achat -->
              <tr v-if="purchases.data.length === 0">
                <td colspan="8" class="px-6 py-10 text-center text-gray-500">
                  <i class="fas fa-shopping-cart text-4xl mb-3"></i>
                  <p>Aucun achat trouvé</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pagination -->
      <Pagination :links="purchases.links" class="mt-6" />
    </div>
  </AdminLayout>
</template>

<script setup>
import { ref, watch } from 'vue'
import AdminLayout from '../Layouts/AdminLayout.vue'
import Pagination from '../Components/Pagination.vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  purchases: Object,
  filters: Object,
  stats: Object,
  flash: Object
})

// État local
const search = ref(props.filters?.search || '')
const statusFilter = ref(props.filters?.status || '')
const showDeleteModal = ref(false)
const purchaseToDelete = ref(null)
const showNotification = ref(false)
const notificationMessage = ref('')
const notificationType = ref('success')
const showStatusModal = ref(false)
const purchaseToUpdate = ref(null)
const selectedStatus = ref('')

// Méthodes
const formatPrice = (price) => {
  return new Intl.NumberFormat('fr-FR', {
    style: 'currency',
    currency: 'EUR'
  }).format(price)
}

const formatDate = (dateString) => {
  if (!dateString) return 'N/A'
  
  const date = new Date(dateString)
  return new Intl.DateTimeFormat('fr-FR', {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  }).format(date)
}

const isExpired = (dateString) => {
  if (!dateString) return true
  
  const expirationDate = new Date(dateString)
  const now = new Date()
  
  return expirationDate < now
}

const getStatusLabel = (status) => {
  switch (status) {
    case 'completed':
      return 'Complété'
    case 'pending':
      return 'En attente'
    case 'cancelled':
      return 'Annulé'
    default:
      return status
  }
}

const deletePurchase = (id) => {
  purchaseToDelete.value = id
  showDeleteModal.value = true
}

const confirmDelete = () => {
  if (purchaseToDelete.value) {
    router.delete(`/admin/purchases/${purchaseToDelete.value}`, {
      onSuccess: () => {
        notificationMessage.value = 'Achat supprimé avec succès'
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
  purchaseToDelete.value = null
}

const openStatusModal = (purchase) => {
  purchaseToUpdate.value = purchase
  selectedStatus.value = purchase.status
  showStatusModal.value = true
}

const confirmStatusChange = () => {
  if (purchaseToUpdate.value) {
    router.put(`/admin/purchases/${purchaseToUpdate.value.id}/status`, {
      status: selectedStatus.value
    }, {
      onSuccess: () => {
        notificationMessage.value = 'Statut mis à jour avec succès'
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
  showStatusModal.value = false
  purchaseToUpdate.value = null
}

// Ajouter un watcher pour les messages flash
watch(() => props.flash, (newFlash) => {
  if (newFlash?.success) {
    notificationMessage.value = newFlash.success
    notificationType.value = 'success'
    showNotification.value = true
    setTimeout(() => showNotification.value = false, 3000)
  }
  if (newFlash?.error) {
    notificationMessage.value = newFlash.error
    notificationType.value = 'error'
    showNotification.value = true
    setTimeout(() => showNotification.value = false, 3000)
  }
}, { immediate: true })

// Gérer la recherche et le filtrage
watch([search, statusFilter], () => {
  router.get('/admin/purchases', {
    search: search.value,
    status: statusFilter.value
  }, {
    preserveState: true,
    replace: true
  })
}, { debounce: 300 })
</script>