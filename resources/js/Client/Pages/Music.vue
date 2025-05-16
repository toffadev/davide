<template>
    <Head>
        <title>Axel Meryl - Musique</title>
    </Head>

    <MainLayout>
        <!-- Hero Section -->
        <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-indigo-900 to-gray-900">
            <div class="max-w-7xl mx-auto text-center animate-fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">L'Univers <span class="gradient-text">Musical</span></h1>
                <h2 class="text-xl md:text-2xl text-gray-300 mb-6">Découvrez les créations sonores d'Axel Meryl</h2>
                <div class="flex justify-center space-x-4">
                    <a href="#spotify" class="px-6 py-3 bg-green-600 hover:bg-green-700 rounded-full font-medium transition shadow-lg flex items-center">
                        <i class="fab fa-spotify mr-2"></i> Spotify
                    </a>
                    <a href="#youtube" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-full font-medium transition shadow-lg flex items-center">
                        <i class="fab fa-youtube mr-2"></i> YouTube
                    </a>
                </div>
            </div>
        </section>

        <!-- Spotify Section -->
        <section id="spotify" class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900 to-gray-800">
            <div class="max-w-7xl mx-auto">
                
                
                <!-- Featured Album -->
                <div class="mb-20 animate-fade-in delay-1">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-semibold text-indigo-400 flex items-center">
                            <i class="fas fa-star text-yellow-500 mr-3"></i>
                            Album à l'honneur
                        </h3>
                        <div class="flex items-center space-x-2 text-gray-400">
                            <i class="fas fa-headphones-alt"></i>
                            <div class="w-48 bg-gray-700 rounded-full h-2 ml-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>

                    <div v-if="featuredAlbum" 
                         class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden shadow-2xl md:flex group hover:shadow-green-900/20 hover:shadow-2xl transition-all duration-500">
                        <div class="md:w-1/3 relative aspect-square">
                            <img :src="featuredAlbum.cover_image" 
                                 :alt="featuredAlbum.title" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-60"></div>
                            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                                <div class="flex space-x-4">
                                    <a v-if="featuredAlbum.spotify_link" 
                                       :href="featuredAlbum.spotify_link" 
                                       target="_blank" 
                                       class="bg-green-500 hover:bg-green-600 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300 hover:shadow-green-500/50"
                                       title="Écouter sur Spotify">
                                        <i class="fab fa-spotify text-2xl"></i>
                                    </a>
                                    <a v-if="featuredAlbum.apple_music_link" 
                                       :href="featuredAlbum.apple_music_link" 
                                       target="_blank" 
                                       class="bg-gradient-to-br from-pink-600 to-purple-600 hover:from-pink-700 hover:to-purple-700 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300 hover:shadow-purple-500/50"
                                       title="Écouter sur Apple Music">
                                        <i class="fab fa-apple text-2xl"></i>
                                    </a>
                                    <a v-if="featuredAlbum.youtube_link" 
                                       :href="featuredAlbum.youtube_link" 
                                       target="_blank" 
                                       class="bg-red-600 hover:bg-red-700 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300 hover:shadow-red-500/50"
                                       title="Regarder sur YouTube">
                                        <i class="fab fa-youtube text-2xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-2/3 p-8 relative">
                            <div class="flex justify-between items-start mb-6">
                                <div>
                                    <div class="flex items-center mb-2">
                                        <h4 class="text-3xl font-bold group-hover:text-indigo-400 transition-colors">{{ featuredAlbum.title }}</h4>
                                        <div v-if="isNewRelease(featuredAlbum.release_date)" 
                                             class="ml-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm px-4 py-1 rounded-full shadow-lg">
                                            Nouveauté
                                        </div>
                                    </div>
                                    <p class="text-gray-400 text-lg">
                                        {{ featuredAlbum.type.charAt(0).toUpperCase() + featuredAlbum.type.slice(1) }} • 
                                        {{ new Date(featuredAlbum.release_date).toLocaleDateString('fr-FR', { 
                                            year: 'numeric',
                                            month: 'long',
                                            day: 'numeric'
                                        }) }}
                                    </p>
                                </div>
                            </div>

                            <div v-if="featuredAlbum.description" class="prose prose-invert max-w-none mb-8">
                                <p class="text-gray-300 text-lg leading-relaxed">{{ featuredAlbum.description }}</p>
                            </div>
                            
                            <div class="flex flex-wrap gap-6 mt-auto">
                                <a v-if="featuredAlbum.spotify_link" 
                                   :href="featuredAlbum.spotify_link" 
                                   target="_blank" 
                                   class="inline-flex items-center px-8 py-4 bg-green-600 hover:bg-green-700 rounded-full font-medium transition-all duration-300 shadow-lg group/btn hover:shadow-green-500/25">
                                    <i class="fab fa-spotify mr-3 text-xl transform group-hover/btn:scale-110 transition-transform"></i>
                                    Écouter sur Spotify
                                </a>
                                <a v-if="featuredAlbum.apple_music_link" 
                                   :href="featuredAlbum.apple_music_link" 
                                   target="_blank" 
                                   class="inline-flex items-center px-8 py-4 bg-gradient-to-br from-pink-600 to-purple-600 hover:from-pink-700 hover:to-purple-700 rounded-full font-medium transition-all duration-300 shadow-lg group/btn hover:shadow-purple-500/25">
                                    <i class="fab fa-apple mr-3 text-xl transform group-hover/btn:scale-110 transition-transform"></i>
                                    Écouter sur Apple Music
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    <div v-else class="bg-gray-800 rounded-2xl p-8 text-center">
                        <p class="text-gray-400">Aucun album disponible pour le moment.</p>
                    </div>
                </div>
                
                <!-- Singles -->
                <div class="animate-fade-in delay-2">
                    <h3 class="text-2xl font-semibold mb-6 text-indigo-400">Singles & Collaborations</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <!-- Single card -->
                        <div v-for="single in singles" :key="single.id" class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition group">
                            <div class="relative">
                                <img :src="single.cover_image" 
                                     :alt="single.title" 
                                     class="w-full h-48 object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                    <a :href="single.spotify_link" target="_blank" class="bg-green-500 hover:bg-green-600 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
                                        <i class="fab fa-spotify text-xl"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-lg mb-1 truncate">{{ single.title }}</h4>
                                <p class="text-gray-400 text-sm mb-3">Single • {{ new Date(single.release_date).getFullYear() }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-green-400">{{ Math.floor(Math.random() * 9) + 1 }}.{{ Math.floor(Math.random() * 9) }}M streams</span>
                                    <span class="text-gray-500">{{ Math.floor(Math.random() * 4) + 2 }}:{{ Math.floor(Math.random() * 60).toString().padStart(2, '0') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div v-if="singles.length > 12" class="text-center mt-10">
                        <a href="#" class="inline-flex items-center px-6 py-3 bg-gray-800 hover:bg-gray-700 rounded-full font-medium transition shadow-lg border border-gray-700">
                            <i class="fas fa-list mr-2"></i> Voir toute la discographie
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- YouTube Section -->
        <section id="youtube" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16 animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 flex items-center justify-center">
                        <i class="fab fa-youtube text-red-500 mr-3 text-4xl"></i>
                        <span>Sur YouTube</span>
                    </h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Clips officiels, performances live et sessions acoustiques - plongez dans l'univers visuel d'Axel Meryl.</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <!-- Video items -->
                    <div v-for="video in youtubeVideos" :key="video.id" class="bg-gray-700 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition animate-fade-in delay-1">
                        <div class="relative pb-[56.25%]">
                            <img :src="video.cover_image" 
                                 :alt="video.title" 
                                 class="absolute h-full w-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                <a :href="video.youtube_link" target="_blank" class="bg-red-600 hover:bg-red-700 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                                <span class="bg-red-600 text-white text-xs px-2 py-1 rounded">CLIP OFFICIEL</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="font-bold text-lg mb-2 truncate">{{ video.title }}</h4>
                            <div class="flex justify-between text-sm text-gray-400 mb-3">
                                <span>{{ Math.floor(Math.random() * 2) + 1 }}.{{ Math.floor(Math.random() * 9) }}M vues</span>
                                <span>{{ Math.floor(Math.random() * 12) + 1 }} {{ Math.random() > 0.5 ? 'mois' : 'ans' }}</span>
                            </div>
                            <p class="text-gray-300 line-clamp-2">{{ video.description }}</p>
                        </div>
                    </div>
                </div>
                
                <div v-if="youtubeVideos.length > 12" class="text-center mt-12">
                    <a href="https://www.youtube.com/" target="_blank" class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 rounded-full font-medium transition shadow-lg">
                        <i class="fab fa-youtube mr-2"></i> Voir plus de vidéos
                    </a>
                </div>
            </div>
        </section>

        <!-- Comedy Shows Section -->
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16 animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 flex items-center justify-center">
                        <i class="fas fa-theater-masks text-yellow-500 mr-3 text-4xl"></i>
                        <span>Spectacles de Comédie</span>
                    </h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Découvrez les spectacles d'humour d'Axel Meryl - Un mélange unique de rire et d'émotion.</p>
                </div>

                <!-- Filtres -->
                <div class="mb-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="flex gap-4">
                        <button 
                            @click="filterType = 'all'"
                            :class="['px-4 py-2 rounded-full transition', 
                                    filterType === 'all' 
                                        ? 'bg-yellow-600 text-white' 
                                        : 'bg-gray-700 text-gray-300 hover:bg-gray-600']">
                            Tous
                        </button>
                        <button 
                            @click="filterType = 'recent'"
                            :class="['px-4 py-2 rounded-full transition', 
                                    filterType === 'recent' 
                                        ? 'bg-yellow-600 text-white' 
                                        : 'bg-gray-700 text-gray-300 hover:bg-gray-600']">
                            Récents
                        </button>
                        <button 
                            @click="filterType = 'with-trailer'"
                            :class="['px-4 py-2 rounded-full transition', 
                                    filterType === 'with-trailer' 
                                        ? 'bg-yellow-600 text-white' 
                                        : 'bg-gray-700 text-gray-300 hover:bg-gray-600']">
                            Avec trailer
                        </button>
                    </div>
                    <div class="w-full sm:w-auto">
                        <input 
                            type="text"
                            v-model="searchQuery"
                            placeholder="Rechercher un spectacle..."
                            class="w-full sm:w-64 px-4 py-2 bg-gray-700 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        >
                    </div>
                </div>

                <!-- Message si aucun résultat -->
                <div v-if="filteredShows.length === 0" class="text-center py-12">
                    <p class="text-gray-400 text-lg">Aucun spectacle ne correspond à vos critères.</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <div v-for="show in filteredShows" 
                         :key="show.id" 
                         class="bg-gray-900 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition group">
                        <div class="relative">
                            <img :src="show.cover_image" 
                                 :alt="show.title" 
                                 class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105">
                            <div v-if="show.trailer_url" class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <a :href="show.trailer_url" 
                                   target="_blank" 
                                   class="bg-red-600 hover:bg-red-700 text-white rounded-full w-16 h-16 flex items-center justify-center shadow-lg transform transition hover:scale-110">
                                    <i class="fas fa-play text-2xl"></i>
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                                <div class="flex gap-2">
                                    <span class="bg-yellow-600 text-white text-xs px-2 py-1 rounded">SPECTACLE</span>
                                    <span v-if="isNewRelease(show.release_date)" 
                                          class="bg-green-600 text-white text-xs px-2 py-1 rounded animate-pulse">
                                        NOUVEAU
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 group-hover:text-yellow-500 transition-colors">{{ show.title }}</h3>
                            <p v-if="show.description" class="text-gray-400 text-sm mb-4 line-clamp-2">{{ show.description }}</p>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-400 flex items-center">
                                    <i class="far fa-calendar mr-1"></i>
                                    {{ formatDate(show.release_date) }}
                                </span>
                                <span v-if="show.duration" class="text-gray-400 flex items-center">
                                    <i class="far fa-clock mr-1"></i>
                                    {{ formatDuration(show.duration) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Upcoming Releases -->
        <section v-if="upcomingRelease" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Prochaines <span class="gradient-text">Sorties</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Découvrez ce qu'Axel Meryl prépare pour les mois à venir.</p>
                </div>
                
                <div class="bg-gray-800 rounded-2xl p-8 shadow-xl max-w-4xl mx-auto animate-fade-in">
                    <div class="md:flex items-center">
                        <div class="md:w-1/3 mb-6 md:mb-0">
                            <div class="bg-gradient-to-br from-purple-600 to-indigo-700 p-1 rounded-xl">
                                <div class="bg-gray-800 rounded-lg overflow-hidden">
                                    <img :src="upcomingRelease.cover_image" 
                                         :alt="upcomingRelease.title" 
                                         class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                        <div class="md:w-2/3 md:pl-8">
                            <div class="flex items-center mb-4">
                                <span class="bg-indigo-600 text-white text-xs px-3 py-1 rounded-full mr-3">NOUVEAU</span>
                                <span class="text-gray-400">Sortie prévue: {{ new Date(upcomingRelease.release_date).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' }) }}</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-2">{{ upcomingRelease.title }}</h3>
                            <p class="text-gray-300 mb-4">{{ upcomingRelease.description }}</p>
                            
                            <div class="flex flex-wrap gap-3 mb-6">
                                <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">{{ upcomingRelease.type === 'single' ? 'Single' : upcomingRelease.type === 'album' ? 'Album' : 'EP' }}</span>
                                <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-sm">Nouveauté</span>
                            </div>
                            
                            <div class="flex space-x-4">
                                <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-full font-medium transition shadow-lg flex items-center">
                                    <i class="far fa-bell mr-2"></i> Rappel
                                </button>
                                <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-full font-medium transition shadow-lg">
                                    En savoir plus
                                </button>
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
import { ref, computed } from 'vue';

// Props reçues du controller
const props = defineProps({
    featuredAlbum: Object,
    singles: Array,
    youtubeVideos: Array,
    upcomingRelease: Object,
    comedyShows: Array
});

// Fonction pour vérifier si une sortie est récente (moins de 30 jours)
const isNewRelease = (releaseDate) => {
    const release = new Date(releaseDate);
    const now = new Date();
    const diffTime = Math.abs(now - release);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    return diffDays <= 30;
};

// Formatage de la durée
const formatDuration = (duration) => {
    if (!duration) return 'Durée non spécifiée';
    const hours = Math.floor(duration / 60);
    const minutes = duration % 60;
    return hours > 0 
        ? `${hours}h${minutes > 0 ? ` ${minutes}min` : ''}`
        : `${minutes} min`;
};

// Formatage de la date
const formatDate = (date) => {
    if (!date) return 'Date non spécifiée';
    return new Date(date).toLocaleDateString('fr-FR', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
};

// Filtrer les spectacles
const filterType = ref('all');
const searchQuery = ref('');

const filteredShows = computed(() => {
    let shows = props.comedyShows || [];
    
    // Filtrer par recherche
    if (searchQuery.value) {
        const query = searchQuery.value.toLowerCase();
        shows = shows.filter(show => 
            show.title.toLowerCase().includes(query) ||
            (show.description && show.description.toLowerCase().includes(query))
        );
    }
    
    // Filtrer par type
    if (filterType.value === 'recent') {
        shows = shows.filter(show => isNewRelease(show.release_date));
    } else if (filterType.value === 'with-trailer') {
        shows = shows.filter(show => show.trailer_url);
    }
    
    return shows;
});

defineExpose({
    isNewRelease,
    formatDuration,
    formatDate
});
</script>

<style scoped>
.album-cover {
    transition: transform 0.3s ease;
}

.album-cover:hover {
    transform: scale(1.03);
}

.play-button {
    transition: all 0.3s ease;
    opacity: 0;
}

.album-container:hover .play-button {
    opacity: 1;
    transform: translateY(-10px);
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}
</style> 