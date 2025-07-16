<template>
    <Head>
        <title>DNBEATZ - Mes Œuvres</title>
    </Head>

    <MainLayout>
        <!-- Hero Section -->
        <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-indigo-900 to-gray-900">
            <div class="max-w-7xl mx-auto text-center animate-fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-4"><span class="gradient-text">Prod By DNBEATZ</span></h1>
                <h2 class="text-xl md:text-2xl text-gray-300 mb-6">Les Productions de DNBEATZ</h2>
                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4">
                    <a href="#albums" class="px-6 py-3 bg-purple-600 hover:bg-purple-700 rounded-full font-medium transition shadow-lg flex items-center justify-center">
                        <i class="fas fa-compact-disc mr-2"></i> Albums
                    </a>
                    <a href="#singles" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-full font-medium transition shadow-lg flex items-center justify-center">
                        <i class="fas fa-music mr-2"></i> Singles
                    </a>
                    <a href="#youtube" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-full font-medium transition shadow-lg flex items-center justify-center">
                        <i class="fab fa-youtube mr-2"></i> YouTube
                    </a>
                </div>
            </div>
        </section>

        <!-- Albums Section -->
        <section id="albums" class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900 to-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-semibold text-purple-400 flex items-center">
                        <i class="fas fa-compact-disc text-purple-500 mr-3"></i>
                        Albums Produits
                    </h3>
                </div>
                
                <div v-if="albums.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="album in albums" :key="album.id" 
                         class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden shadow-2xl group hover:shadow-purple-900/20 hover:shadow-2xl transition-all duration-500">
                        <div class="relative h-48 md:h-64">
                            <img :src="album.cover_image" 
                                 :alt="album.title" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-60"></div>
                            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                                <div class="flex space-x-4">
                                    <a v-if="album.spotify_link" 
                                       :href="album.spotify_link" 
                                       target="_blank" 
                                       class="bg-green-500 hover:bg-green-600 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300 hover:shadow-green-500/50"
                                       title="Écouter sur Spotify">
                                        <i class="fab fa-spotify text-2xl"></i>
                                    </a>
                                    <a v-if="album.apple_music_link" 
                                       :href="album.apple_music_link" 
                                       target="_blank" 
                                       class="bg-gradient-to-br from-pink-600 to-purple-600 hover:from-pink-700 hover:to-purple-700 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300 hover:shadow-purple-500/50"
                                       title="Écouter sur Apple Music">
                                        <i class="fab fa-apple text-2xl"></i>
                                    </a>
                                    <a v-if="album.youtube_link" 
                                       :href="album.youtube_link" 
                                       target="_blank" 
                                       class="bg-red-600 hover:bg-red-700 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300 hover:shadow-red-500/50"
                                       title="Regarder sur YouTube">
                                        <i class="fab fa-youtube text-2xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-2">
                                <h4 class="text-2xl font-bold group-hover:text-purple-400 transition-colors">{{ album.title }}</h4>
                                <div v-if="isNewRelease(album.release_date)" 
                                     class="ml-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm px-4 py-1 rounded-full shadow-lg">
                                    Nouveauté
                                </div>
                            </div>
                            <p class="text-gray-400 text-lg mb-4">
                                Album • {{ formatDate(album.release_date) }}
                            </p>
                            <p v-if="album.description" class="text-gray-300 line-clamp-2 mb-4">{{ album.description }}</p>
                            
                            <div class="flex space-x-3">
                                <a v-if="album.spotify_link" 
                                   :href="album.spotify_link" 
                                   target="_blank" 
                                   class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 rounded-full text-sm font-medium transition-all duration-300 shadow-lg">
                                    <i class="fab fa-spotify mr-2"></i>
                                    Spotify
                                </a>
                                <a v-if="album.apple_music_link" 
                                   :href="album.apple_music_link" 
                                   target="_blank" 
                                   class="inline-flex items-center px-6 py-3 bg-gradient-to-br from-pink-600 to-purple-600 hover:from-pink-700 hover:to-purple-700 rounded-full text-sm font-medium transition-all duration-300 shadow-lg">
                                    <i class="fab fa-apple mr-2"></i>
                                    Apple
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="bg-gray-800 rounded-2xl p-8 text-center">
                    <p class="text-gray-400">Aucun album disponible pour le moment.</p>
                </div>
            </div>
        </section>
                
        <!-- Singles Section -->
        <section id="singles" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <h3 class="text-2xl font-semibold mb-8 text-blue-400 flex items-center">
                    <i class="fas fa-music text-blue-500 mr-3"></i>
                    Singles & Collaborations
                </h3>
                
                <div v-if="singles.length > 0" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Single card -->
                    <div v-for="single in singles" :key="single.id" class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition group">
                        <div class="relative">
                            <img :src="single.cover_image" 
                                 :alt="single.title" 
                                 class="w-full h-40 object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                <div class="flex space-x-3">
                                    <a v-if="single.spotify_link" :href="single.spotify_link" target="_blank" class="bg-green-500 hover:bg-green-600 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
                                        <i class="fab fa-spotify text-xl"></i>
                                    </a>
                                    <a v-if="single.apple_music_link" :href="single.apple_music_link" target="_blank" class="bg-gradient-to-br from-pink-600 to-purple-600 hover:from-pink-700 hover:to-purple-700 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
                                        <i class="fab fa-apple text-xl"></i>
                                    </a>
                                    <a v-if="single.youtube_link" :href="single.youtube_link" target="_blank" class="bg-red-600 hover:bg-red-700 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
                                        <i class="fab fa-youtube text-xl"></i>
                                    </a>
                                </div>
                            </div>
                            <div v-if="isNewRelease(single.release_date)" class="absolute top-2 right-2">
                                <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded-full">NOUVEAU</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-lg mb-1 group-hover:text-blue-400 transition-colors">{{ single.title }}</h4>
                            <p class="text-gray-400 text-sm mb-3">Single • {{ formatDate(single.release_date) }}</p>
                            <p v-if="single.description" class="text-gray-300 line-clamp-2 text-sm mb-4">{{ single.description }}</p>
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-2">
                                    <a v-if="single.spotify_link" :href="single.spotify_link" target="_blank" class="text-green-500 hover:text-green-400">
                                        <i class="fab fa-spotify"></i>
                                    </a>
                                    <a v-if="single.apple_music_link" :href="single.apple_music_link" target="_blank" class="text-pink-500 hover:text-pink-400">
                                        <i class="fab fa-apple"></i>
                                    </a>
                                    <a v-if="single.youtube_link" :href="single.youtube_link" target="_blank" class="text-red-500 hover:text-red-400">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                                <span class="text-gray-500 text-sm">Prod by DNBEATZ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="bg-gray-800 rounded-2xl p-8 text-center">
                    <p class="text-gray-400">Aucun single disponible pour le moment.</p>
                </div>
            </div>
        </section>

        <!-- YouTube Section -->
        <section id="youtube" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12 animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 flex items-center justify-center">
                        <i class="fab fa-youtube text-red-500 mr-3 text-4xl"></i>
                        <span>Sur YouTube</span>
                    </h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Beats, instrumentals et sessions studio - plongez dans l'univers sonore de DNBEATZ.</p>
                </div>
                
                <div v-if="youtubeVideos.length > 0" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <!-- Video items -->
                    <div v-for="video in youtubeVideos" :key="video.id" class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition animate-fade-in delay-1">
                        <div class="relative pb-[40%]">
                            <img :src="video.cover_image" 
                                 :alt="video.title" 
                                 class="absolute h-full w-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                <a :href="video.youtube_link" target="_blank" class="bg-red-600 hover:bg-red-700 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                                <span class="bg-red-600 text-white text-xs px-2 py-1 rounded">BEAT</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="font-bold text-lg mb-2 truncate">{{ video.title }}</h4>
                            <p class="text-gray-300 line-clamp-2 mb-3">{{ video.description }}</p>
                            <div class="flex justify-between items-center">
                                <a :href="video.youtube_link" target="_blank" class="text-red-500 hover:text-red-400 flex items-center">
                                    <i class="fab fa-youtube mr-1"></i>
                                    <span>Voir sur YouTube</span>
                                </a>
                                <span class="text-gray-500 text-sm">{{ formatDate(video.release_date) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="bg-gray-800 rounded-2xl p-8 text-center">
                    <p class="text-gray-400">Aucune vidéo YouTube disponible pour le moment.</p>
                </div>
                
                <div v-if="youtubeVideos.length > 0" class="text-center mt-12">
                    <a href="https://www.youtube.com/" target="_blank" class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 rounded-full font-medium transition shadow-lg">
                        <i class="fab fa-youtube mr-2"></i> Voir plus de vidéos
                    </a>
                </div>
            </div>
        </section>

        <!-- Commented out: Collaborations Section -->
        <!--
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16 animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 flex items-center justify-center">
                        <i class="fas fa-users text-yellow-500 mr-3 text-4xl"></i>
                        <span>Collaborations</span>
                    </h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Découvrez les artistes avec qui DNBEATZ a collaboré.</p>
                </div>

               
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
                            placeholder="Rechercher une collaboration..."
                            class="w-full sm:w-64 px-4 py-2 bg-gray-700 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        >
                    </div>
                </div>

                
                <div v-if="filteredShows.length === 0" class="text-center py-12">
                    <p class="text-gray-400 text-lg">Aucune collaboration ne correspond à vos critères.</p>
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
                                    <span class="bg-yellow-600 text-white text-xs px-2 py-1 rounded">COLLABORATION</span>
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
        -->

        <!-- Upcoming Releases - Kept but can be commented if not needed -->
        <!-- <section v-if="upcomingRelease" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Prochaines <span class="gradient-text">Sorties</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Découvrez ce que DNBEATZ prépare pour les mois à venir.</p>
                </div>
                
                <div class="bg-gray-900 rounded-2xl p-8 shadow-xl max-w-4xl mx-auto animate-fade-in">
                    <div class="md:flex items-center">
                        <div class="md:w-1/3 mb-6 md:mb-0">
                            <div class="bg-gradient-to-br from-purple-600 to-indigo-700 p-1 rounded-xl">
                                <div class="bg-gray-900 rounded-lg overflow-hidden">
                                    <img :src="upcomingRelease.cover_image" 
                                         :alt="upcomingRelease.title" 
                                         class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                        <div class="md:w-2/3 md:pl-8">
                            <div class="flex items-center mb-4">
                                <span class="bg-indigo-600 text-white text-xs px-3 py-1 rounded-full mr-3">NOUVEAU</span>
                                <span class="text-gray-400">Sortie prévue: {{ formatDate(upcomingRelease.release_date) }}</span>
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
        </section> -->
    </MainLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '../../Client/Layouts/MainLayout.vue';
import { ref, computed } from 'vue';

// Props reçues du controller
const props = defineProps({
    featuredAlbum: Object,
    albums: Array,
    singles: Array,
    youtubeVideos: Array,
    upcomingRelease: Object,
    comedyShows: Array
});

// Computed pour les albums (déjà fourni par le controller, on supprime celui existant)
// const albums = computed(() => {
//     return props.featuredAlbum ? [props.featuredAlbum] : [];
// });

// Fonction pour vérifier si une sortie est récente (moins de 30 jours)
const isNewRelease = (releaseDate) => {
    if (!releaseDate) return false;
    const release = new Date(releaseDate);
    const now = new Date();
    const diffTime = Math.abs(now - release);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    return diffDays <= 30;
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

// Formatage de la durée (gardé pour référence future)
const formatDuration = (duration) => {
    if (!duration) return 'Durée non spécifiée';
    const hours = Math.floor(duration / 60);
    const minutes = duration % 60;
    return hours > 0 
        ? `${hours}h${minutes > 0 ? ` ${minutes}min` : ''}`
        : `${minutes} min`;
};

// Variables pour la section des collaborations (commentée mais gardée au cas où)
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