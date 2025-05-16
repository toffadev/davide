<template>
    <Head>
        <title>Spectacles & Événements</title>
    </Head>

    <MainLayout>
        <!-- Hero Section -->
        <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-amber-900 to-gray-900">
            <div class="max-w-7xl mx-auto text-center animate-fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Spectacles & <span class="gradient-text">Événements</span></h1>
                <h2 class="text-xl md:text-2xl text-gray-300 mb-6">Découvrez nos prochains événements et spectacles</h2>
                <div class="flex justify-center space-x-4">
                    <a href="#spectacles" class="px-6 py-3 bg-amber-600 hover:bg-amber-700 rounded-full font-medium transition shadow-lg flex items-center">
                        <i class="fas fa-theater-masks mr-2"></i> Événements
                    </a>
                    <a href="#sketches" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-full font-medium transition shadow-lg flex items-center">
                        <i class="fas fa-video mr-2"></i> Evènement passés
                    </a>
                </div>
            </div>
        </section>

        <!-- Spectacles Section -->
        <section id="spectacles" class="py-4 px-4 sm:px-6 lg:px-8 bg-gray-900">
            <div class="max-w-7xl mx-auto">
                <!-- Current Show -->
                <div v-if="currentEvent" class="mb-20 animate-fade-in delay-1">
                    <h3 class="text-2xl font-semibold mb-6 text-amber-400">Spectacle Actuel</h3>
                    <div class="bg-gray-800 rounded-2xl overflow-hidden shadow-2xl md:flex">
                        <div class="md:w-1/3 relative">
                            <img :src="currentEvent.image" 
                                 :alt="currentEvent.title" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                <div class="bg-amber-500 hover:bg-amber-600 text-white rounded-full w-16 h-16 flex items-center justify-center shadow-lg">
                                    <i class="fas fa-play text-2xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-2/3 p-8">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h4 class="text-2xl font-bold mb-1">{{ currentEvent.title }}</h4>
                                    <p class="text-gray-400">One-man-show • Depuis {{ formatDate(currentEvent.event_date, 'YYYY') }}</p>
                                </div>
                                <span v-if="currentEvent.is_sold_out" class="bg-red-600 text-white text-sm px-3 py-1 rounded-full">Complet</span>
                                <span v-else class="bg-amber-600 text-white text-sm px-3 py-1 rounded-full">En tournée</span>
                            </div>
                            <p class="text-gray-300 mb-6">{{ currentEvent.description }}</p>
                            
                            <div class="mb-6">
                                <div class="flex items-center text-sm text-gray-400 mb-2">
                                    <i class="fas fa-map-marker-alt mr-2 text-amber-400"></i>
                                    <span>{{ currentEvent.address }}, {{ currentEvent.city }}, {{ currentEvent.country }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-400">
                                    <i class="fas fa-calendar-alt mr-2 text-amber-400"></i>
                                    <span>Date : {{ formatDate(currentEvent.event_date, 'DD MMMM YYYY à HH:mm') }}</span>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                                <div>
                                    <p class="text-gray-400 text-sm">Durée</p>
                                    <p class="text-xl font-bold">90 min</p>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Salles</p>
                                    <p class="text-xl font-bold">50+</p>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Spectateurs</p>
                                    <p class="text-xl font-bold">25K+</p>
                                </div>
                            </div>
                            
                            <div class="flex space-x-4">
                                <a :href="currentEvent.ticket_link" target="_blank" class="px-6 py-3 bg-amber-600 hover:bg-amber-700 rounded-full font-medium transition shadow-lg flex items-center">
                                    <i class="fas fa-ticket-alt mr-2"></i> Réserver
                                </a>
                                <a href="#" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 rounded-full font-medium transition shadow-lg">
                                    Voir toutes les dates
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Upcoming Shows -->
                <div v-if="upcomingEvents && upcomingEvents.length > 0" class="animate-fade-in delay-2">
                    <h3 class="text-2xl font-semibold mb-6 text-amber-400">Evènements à venir</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Show Card -->
                        <div v-for="event in upcomingEvents" :key="event.id" class="bg-gray-800 rounded-xl overflow-hidden shadow-lg comedy-card">
                            <div class="relative h-48">
                                <img :src="event.image" 
                                     :alt="event.title" 
                                     class="w-full h-full object-cover">
                                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                                    <span class="bg-amber-600 text-white text-xs px-2 py-1 rounded">À VENIR</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="font-bold text-lg">{{ event.title }}</h4>
                                    <span v-if="event.is_sold_out" class="text-xs bg-red-600 text-white px-2 py-1 rounded">Complet</span>
                                    <span v-else class="text-xs bg-green-600 text-white px-2 py-1 rounded">Places disponibles</span>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-amber-400 text-sm flex items-center">
                                        <i class="fas fa-calendar-alt mr-2"></i>
                                        {{ formatDate(event.event_date, 'DD MMM YYYY HH:mm') }}
                                    </p>
                                    <p class="text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        {{ event.address }}
                                    </p>
                                    <p class="text-gray-400 text-sm flex items-center">
                                        <i class="fas fa-location-dot mr-2"></i>
                                        {{ event.city }}, {{ event.country }}
                                    </p>
                                </div>
                                <p class="text-gray-300 text-sm mt-3 line-clamp-2">{{ event.description }}</p>
                                <div class="mt-4 flex justify-center">
                                    <a v-if="event.ticket_link" 
                                       :href="event.ticket_link" 
                                       target="_blank" 
                                       class="w-full px-4 py-2 bg-amber-600 hover:bg-amber-700 rounded-full text-sm font-medium transition text-center">
                                        <i class="fas fa-ticket-alt mr-2"></i>
                                        Réserver
                                    </a>
                                    <span v-else class="w-full px-4 py-2 bg-gray-600 rounded-full text-sm font-medium text-center cursor-not-allowed">
                                        Bientôt disponible
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sketches Section -->
        <section id="sketches" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16 animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 flex items-center justify-center">
                        <i class="fas fa-video text-red-500 mr-3 text-4xl"></i>
                        <span>Evènements passés</span>
                    </h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Revivez les meilleurs moments de nos événements passés.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Past Events with YouTube Links -->
                    <div v-for="(event, index) in pastEvents" :key="event.id" class="relative animate-fade-in" :class="'delay-' + (index + 1)">
                        <div class="scene-number">{{ index + 1 }}</div>
                        <div class="bg-gray-700 rounded-lg overflow-hidden shadow-lg comedy-card h-full">
                            <div class="relative video-thumbnail pb-[56.25%]">
                                <img :src="event.image" 
                                     :alt="event.title" 
                                     class="absolute h-full w-full object-cover">
                                <a :href="event.url_youtube" target="_blank" class="absolute inset-0 flex items-center justify-center">
                                    <div class="bg-red-600 hover:bg-red-700 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </a>
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                    <span class="bg-red-600 text-white text-xs px-2 py-1 rounded">VIDÉO</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <h4 class="font-bold text-lg mb-2">{{ event.title }}</h4>
                                <div class="flex justify-between text-sm text-gray-400 mb-3">
                                    <span>{{ formatDate(event.event_date, 'DD MMM YYYY') }}</span>
                                    <span>{{ event.city }}</span>
                                </div>
                                <p class="text-gray-300 text-sm">{{ event.description }}</p>
                                <div class="mt-4 flex flex-wrap gap-2">
                                    <span class="px-2 py-1 bg-gray-600 text-gray-200 rounded-full text-xs">{{ event.country }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div v-if="pastEvents.length > 3" class="text-center mt-12">
                    <a href="#" class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 rounded-full font-medium transition shadow-lg">
                        <i class="fas fa-list mr-2"></i> Voir tous les sketches
                    </a>
                </div>
            </div>
        </section>

        <!-- Testimonials - Static Section -->
        <!-- <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Ils parlent de <span class="gradient-text">nous</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Découvrez les avis de nos clients et participants.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <div class="bg-gray-800 rounded-xl p-6 shadow-lg animate-fade-in delay-1">
                        <div class="flex items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Client" class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Sarah Dubois</h4>
                                <p class="text-amber-400 text-sm">Cliente satisfaite</p>
                            </div>
                        </div>
                        <p class="text-gray-300 italic">"Une organisation parfaite et un événement inoubliable. Je recommande vivement !"</p>
                    </div>
                    
                    
                    <div class="bg-gray-800 rounded-xl p-6 shadow-lg animate-fade-in delay-2">
                        <div class="flex items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Client" class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Marc Laurent</h4>
                                <p class="text-amber-400 text-sm">Participant régulier</p>
                            </div>
                        </div>
                        <p class="text-gray-300 italic">"Des événements toujours bien organisés avec une ambiance exceptionnelle. Je participe à chaque édition !"</p>
                    </div>
                    
                    
                    <div class="bg-gray-800 rounded-xl p-6 shadow-lg animate-fade-in delay-3">
                        <div class="flex items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Client" class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <h4 class="font-bold">Marie Dupont</h4>
                                <p class="text-amber-400 text-sm">Nouvelle cliente</p>
                            </div>
                        </div>
                        <p class="text-gray-300 italic">"Ma première participation et certainement pas la dernière ! Un événement qui a dépassé toutes mes attentes."</p>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Next Performance - Same as Current Event -->
        <section v-if="currentEvent" class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900 to-amber-900">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-fade-in">Prochaine <span class="gradient-text">Représentation</span></h2>
                
                <div class="bg-gray-800 bg-opacity-70 rounded-2xl p-8 max-w-3xl mx-auto shadow-xl animate-fade-in delay-1">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="mb-6 md:mb-0 md:mr-8 text-center md:text-left">
                            <div class="text-amber-400 text-lg font-semibold">{{ formatDate(currentEvent.event_date, 'DD MMMM YYYY') }}</div>
                            <div class="text-2xl font-bold my-2">{{ currentEvent.city }}, {{ currentEvent.country }}</div>
                            <div class="text-gray-300">{{ formatDate(currentEvent.event_date, 'HH:mm') }} • Durée: 1h30</div>
                        </div>
                        <div class="flex-shrink-0">
                            <a :href="currentEvent.ticket_link" target="_blank" class="px-8 py-3 bg-amber-600 hover:bg-amber-700 rounded-full font-bold transition shadow-lg flex items-center text-lg">
                                <i class="fas fa-ticket-alt mr-2"></i> Réserver maintenant
                            </a>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-700">
                        <h3 class="text-xl font-semibold mb-4">{{ currentEvent.title }}</h3>
                        <p class="text-gray-300 mb-6">{{ currentEvent.description }}</p>
                        
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                            <div>
                                <div class="text-amber-400 font-bold text-xl">50+</div>
                                <div class="text-gray-400 text-sm">dates</div>
                            </div>
                            <div>
                                <div class="text-amber-400 font-bold text-xl">25K+</div>
                                <div class="text-gray-400 text-sm">spectateurs</div>
                            </div>
                            <div>
                                <div class="text-amber-400 font-bold text-xl">4.9/5</div>
                                <div class="text-gray-400 text-sm">moyenne</div>
                            </div>
                            <div>
                                <div class="text-amber-400 font-bold text-xl">98%</div>
                                <div class="text-gray-400 text-sm">salles pleines</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '../../Client/Layouts/MainLayout.vue';
import { ref } from 'vue';
import dayjs from 'dayjs';

const props = defineProps({
    currentEvent: Object,
    upcomingEvents: Array,
    pastEvents: Array
});

// Format date using dayjs
function formatDate(date, format) {
    return dayjs(date).format(format);
}
</script>

<style scoped>
.gradient-text {
    background: linear-gradient(45deg, #f59e0b, #ef4444);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.comedy-card {
    transition: all 0.3s ease;
    transform-style: preserve-3d;
}

.comedy-card:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
}

.video-thumbnail::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 50%);
    border-radius: 0.5rem;
}

.scene-number {
    position: absolute;
    top: -12px;
    left: -12px;
    width: 40px;
    height: 40px;
    background: #f59e0b;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2);
    z-index: 10;
}
</style> 