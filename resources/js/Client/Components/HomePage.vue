<template>
  <!-- Hero Section -->
  <section id="home"
    class="pt-24 pb-16 md:pt-32 md:pb-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-800 to-gray-900 relative overflow-hidden">
    <!-- Effet de particules ou de lumière en arrière-plan -->
    <div class="absolute inset-0 opacity-20">
      <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 animate-gradient-x"></div>
    </div>

    <div class="max-w-7xl mx-auto relative">
      <div class="md:flex md:items-center md:justify-between">
        <div class="md:w-1/2 mb-12 md:mb-0 animate-fade-in">
          <h1 class="text-4xl md:text-6xl font-bold mb-4">
            Axel <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 bg-clip-text text-transparent">Meryl</span>
          </h1>
          <h2 class="text-xl md:text-2xl text-gray-300 mb-6 font-light">Artiste Musicien & Comédien</h2>
          <p class="text-gray-300 mb-8 max-w-lg text-lg leading-relaxed">
            Découvrez l'univers artistique d'Axel Meryl, une fusion unique de musique et de comédie qui captive les sens et éveille les émotions.
          </p>
          <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="#music"
              class="px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-indigo-500/25 flex items-center justify-center group">
              <i class="fas fa-music mr-2 transform group-hover:rotate-12 transition-transform"></i>
              <span>Écouter ma musique</span>
            </a>
            <a href="#acting"
              class="px-8 py-4 bg-gray-700 hover:bg-gray-600 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-gray-500/25 flex items-center justify-center border border-gray-600 group">
              <i class="fas fa-theater-masks mr-2 transform group-hover:rotate-12 transition-transform"></i>
              <span>Evènements à venir</span>
            </a>
          </div>
          <!-- Réseaux sociaux -->
          <div class="mt-8 flex items-center space-x-4 sm:justify-start justify-center">
            <a href="https://spotify.com/artist/axelmeryl" target="_blank" 
              class="w-10 h-10 bg-green-600 hover:bg-green-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
              title="Suivre sur Spotify">
              <i class="fab fa-spotify text-lg"></i>
            </a>
            <a href="https://youtube.com/c/axelmeryl" target="_blank"
              class="w-10 h-10 bg-red-600 hover:bg-red-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
              title="Suivre sur YouTube">
              <i class="fab fa-youtube text-lg"></i>
            </a>
            <a href="https://instagram.com/axelmeryl" target="_blank"
              class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
              title="Suivre sur Instagram">
              <i class="fab fa-instagram text-lg"></i>
            </a>
            <a href="https://facebook.com/axelmeryl" target="_blank"
              class="w-10 h-10 bg-blue-600 hover:bg-blue-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
              title="Suivre sur Facebook">
              <i class="fab fa-facebook-f text-lg"></i>
            </a>
            <a href="https://tiktok.com/@axelmeryl" target="_blank"
              class="w-10 h-10 bg-black hover:bg-gray-800 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
              title="Suivre sur TikTok">
              <i class="fab fa-tiktok text-lg"></i>
            </a>
          </div>
        </div>

        <div class="md:w-1/2 animate-fade-in delay-1">
          <div class="relative">
            <div class="w-full h-96 md:h-[500px] bg-indigo-900/20 rounded-2xl overflow-hidden shadow-2xl relative group">
              <img
                src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="Axel Meryl" 
                class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-700">
              <!-- Overlay gradient -->
              <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-60"></div>
            </div>
            <!-- Bouton play flottant -->
            <button @click="playLatestVideo" 
              class="absolute -bottom-6 -right-6 w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center shadow-xl hover:shadow-2xl hover:from-indigo-600 hover:to-purple-700 transform hover:scale-110 transition-all duration-300 group">
              <i class="fas fa-play text-white text-2xl group-hover:text-3xl transition-all duration-300"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content -->
  <main>
    <!-- About Section -->
    <section id="about" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center animate-fade-in">Biographie</h2>

        <div class="md:flex md:items-center md:space-x-12">
          <div class="md:w-1/3 mb-8 md:mb-0 animate-fade-in delay-1">
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-1 rounded-2xl shadow-xl">
              <div class="bg-gray-800 rounded-xl overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80"
                  alt="Axel Meryl portrait" class="w-full h-full object-cover">
              </div>
            </div>
          </div>

          <div class="md:w-2/3 animate-fade-in delay-2">
            <div class="prose prose-invert max-w-none">
              <h3 class="text-2xl font-semibold mb-4">Parcours Artistique</h3>
              <p class="mb-4">Axel Merryl Sofonnou, plus connu sous le nom d'Axel Merryl, est un comédien, vidéaste et artiste chanteur compositeur
                béninois né le 1er juillet 1996. Il s'est fait connaître grâce à ses vidéos comiques sur YouTube, où son humour et son accent caractéristique ont conquis les internautes.</p>

              <h3 class="text-2xl font-semibold mb-4 mt-8">Carrière</h3>
              <ul class="mb-6 space-y-2">
                <li class="flex items-start">
                  <span class="text-indigo-400 mr-2">•</span>
                  <span>YouTubeur depuis 2014 avec plus de 1,32 million d'abonnés</span>
                </li>
                <li class="flex items-start">
                  <span class="text-indigo-400 mr-2">•</span>
                  <span>Études en télécommunications à l'ESMT (Dakar, Sénégal)</span>
                </li>
                <li class="flex items-start">
                  <span class="text-indigo-400 mr-2">•</span>
                  <span>Ambassadeur de l'humour au Bénin</span>
                </li>
              </ul>

              <h3 class="text-2xl font-semibold mb-4 mt-8">Récompenses</h3>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-700 p-4 rounded-lg">
                  <div class="text-indigo-400 text-xl mb-2">2023</div>
                  <h4 class="font-medium">Prix YouTube</h4>
                  <p class="text-sm text-gray-300">Plus de 1 million d'abonnés</p>
                </div>
                <div class="bg-gray-700 p-4 rounded-lg">
                  <div class="text-indigo-400 text-xl mb-2">2019</div>
                  <h4 class="font-medium">Prix YouTube</h4>
                  <p class="text-sm text-gray-300">Reconnaissance de sa popularité</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bouton En savoir plus -->
        <div class="text-center mt-12">
          <a href="/biographie"
            class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-700 rounded-full font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg group">
            <span>En savoir plus</span>
            <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
          </a>
        </div>
      </div>
    </section>

    <!-- Portfolio Sections -->
    <div class="portfolio-sections">
      <!-- Music Section -->
      <section id="music" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900">
        <div class="max-w-7xl mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center animate-fade-in">Musique</h2>

          <!-- Singles -->
          <div class="mb-12 animate-fade-in delay-1">
            <h3 class="text-2xl font-semibold mb-6 flex items-center">
              <i class="fab fa-spotify text-green-500 mr-3 text-3xl"></i>
              <span>Derniers Singles</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
              <!-- Dynamic Single Releases -->
              <div v-for="release in latestReleases.singles" :key="release.id"
                class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition group">
                <div class="relative">
                  <img :src="release.cover_image" :alt="release.title" class="w-full h-48 object-cover">
                  <div
                    class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                    <div class="flex space-x-3">
                      <a v-if="release.spotify_link" :href="release.spotify_link" target="_blank"
                        class="bg-green-500 hover:bg-green-600 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform"
                        :title="'Écouter sur Spotify - ' + release.title">
                        <i class="fab fa-spotify text-xl"></i>
                      </a>
                      <a v-if="release.youtube_link" :href="release.youtube_link" target="_blank"
                        class="bg-red-600 hover:bg-red-700 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform"
                        :title="'Regarder sur YouTube - ' + release.title">
                        <i class="fab fa-youtube text-xl"></i>
                      </a>
                      <a v-if="release.apple_music_link" :href="release.apple_music_link" target="_blank"
                        class="bg-gray-500 hover:bg-gray-600 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform"
                        :title="'Écouter sur Apple Music - ' + release.title">
                        <i class="fab fa-apple text-xl"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="p-4">
                  <h4 class="font-bold text-lg mb-1">{{ release.title }}</h4>
                  <p class="text-gray-400 text-sm mb-3">{{ release.type.charAt(0).toUpperCase() + release.type.slice(1) }} •
                    {{ formatDate(release.release_date) }}</p>
                  <div class="flex space-x-4 justify-center">
                    <a v-if="release.spotify_link" :href="release.spotify_link" target="_blank"
                      class="text-green-500 hover:text-green-400 transform hover:scale-110 transition-transform"
                      :title="'Écouter sur Spotify Music - ' + release.title">
                      <i class="fab fa-spotify text-2xl"></i>
                    </a>
                    <a v-if="release.apple_music_link" :href="release.apple_music_link" target="_blank"
                      class="text-gray-400 hover:text-gray-300 transform hover:scale-110 transition-transform"
                      :title="'Écouter sur Apple Music - ' + release.title">
                      <i class="fab fa-apple text-2xl"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Albums -->
          <div class="mb-12 animate-fade-in delay-2">
            <h3 class="text-2xl font-semibold mb-6 flex items-center">
              <i class="fas fa-compact-disc text-purple-500 mr-3 text-3xl"></i>
              <span>Derniers Albums</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Dynamic Album Releases -->
              <div v-for="release in latestReleases.albums" :key="release.id"
                class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition group">
                <div class="md:flex">
                  <div class="md:w-1/3 relative group">
                    <img :src="release.cover_image" :alt="release.title" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                      <div class="flex space-x-3">
                        <a v-if="release.spotify_link" :href="release.spotify_link" target="_blank"
                          class="bg-green-500 hover:bg-green-600 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform"
                          :title="'Écouter sur Spotify - ' + release.title">
                          <i class="fab fa-spotify text-xl"></i>
                        </a>
                        <a v-if="release.apple_music_link" :href="release.apple_music_link" target="_blank"
                          class="bg-gray-500 hover:bg-gray-600 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform"
                          :title="'Écouter sur Apple Music - ' + release.title">
                          <i class="fab fa-apple text-xl"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="md:w-2/3 p-4">
                    <h4 class="font-bold text-lg mb-1">{{ release.title }}</h4>
                    <p class="text-gray-400 text-sm mb-3">{{ formatDate(release.release_date) }}</p>
                    <p v-if="release.description" class="text-gray-300 mb-4 line-clamp-2">{{ release.description }}</p>
                    <div class="flex space-x-4 justify-center">
                      <a v-if="release.spotify_link" :href="release.spotify_link" target="_blank"
                        class="text-green-500 hover:text-green-400 transform hover:scale-110 transition-transform"
                        :title="'Écouter sur Spotify Music - ' + release.title">
                        <i class="fab fa-spotify text-2xl"></i>
                      </a>
                      <a v-if="release.apple_music_link" :href="release.apple_music_link" target="_blank"
                        class="text-gray-400 hover:text-gray-300 transform hover:scale-110 transition-transform"
                        :title="'Écouter sur Apple Music - ' + release.title">
                        <i class="fab fa-apple text-2xl"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center">
            <a href="/musique"
              class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-full font-medium transition shadow-lg">
              <i class="fas fa-music mr-2"></i> Voir toutes les sorties
            </a>
          </div>

          <!-- Section Comédies -->
          <div class="animate-fade-in delay-3 mt-8">
            <h3 class="text-2xl font-semibold mb-6 flex items-center">
              <i class="fab fa-youtube text-red-500 mr-3 text-3xl"></i>
              <span>Nos comédies</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <!-- Comedies dynamiques -->
              <div v-for="comedy in latestComedies" :key="comedy.id" 
                class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition group">
                <div class="relative pb-[56.25%] cursor-pointer"
                  @click="comedy.trailer_url ? window.open(comedy.trailer_url, '_blank') : null">
                  <img
                    :src="comedy.cover_image"
                    :alt="comedy.title" 
                    class="absolute h-full w-full object-cover">
                  <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center group-hover:bg-opacity-50 transition-all duration-300">
                    <a v-if="comedy.trailer_url" 
                      :href="comedy.trailer_url" 
                      target="_blank" 
                      class="bg-red-600 hover:bg-red-700 text-white rounded-full w-16 h-16 flex items-center justify-center shadow-lg transform group-hover:scale-110 transition-all duration-300"
                      :title="'Regarder ' + comedy.title + ' sur YouTube'">
                      <i class="fas fa-play text-2xl"></i>
                    </a>
                    <div v-else 
                      class="bg-gray-600 text-white rounded-full w-16 h-16 flex items-center justify-center shadow-lg"
                      :title="'Bientôt disponible'">
                      <i class="fas fa-theater-masks text-2xl"></i>
                    </div>
                  </div>
                  <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                    <h4 class="font-bold text-lg text-white mb-1">{{ comedy.title }}</h4>
                    <p class="text-gray-200 text-sm">{{ comedy.release_date ? formatDate(comedy.release_date) : 'Bientôt disponible' }}</p>
                  </div>
                </div>
                <div class="p-4">
                  <div class="flex justify-between items-center">
                    <a v-if="comedy.trailer_url" 
                      :href="comedy.trailer_url" 
                      target="_blank"
                      class="text-red-500 hover:text-red-400 flex items-center space-x-2 group/link">
                      <i class="fab fa-youtube text-2xl transform group-hover/link:scale-110 transition-transform"></i>
                      <span class="font-medium group-hover/link:text-red-400 transition-colors">Regarder</span>
                    </a>
                    <span v-else class="text-gray-400 flex items-center space-x-2">
                      <i class="fas fa-clock text-xl"></i>
                      <span>Bientôt disponible</span>
                    </span>
                    <span v-if="comedy.duration" class="text-gray-400 flex items-center space-x-2">
                      <i class="fas fa-clock text-sm"></i>
                      <span>{{ formatDuration(comedy.duration) }}</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="text-center mt-8">
              <a href="/musique" 
                class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                <i class="fas fa-video mr-2"></i> Voir plus
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Acting/Events Section -->
      <section id="acting" class="py-8 sm:mt-12 md:mt-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
        <div class="max-w-7xl mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center animate-fade-in">Événements</h2>
          <div class="mb-12 animate-fade-in delay-1">
            <h3 class="text-2xl font-semibold mb-6">Prochains événements</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <!-- Événements dynamiques -->
              <div 
                v-for="event in upcomingEvents" 
                :key="event.id" 
                class="bg-gray-700 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition group"
              >
                <div class="relative">
                  <img
                    :src="event.image"
                    :alt="event.title" 
                    class="w-full h-64 object-cover">
                  <div
                    class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <a 
                      v-if="event.ticket_link" 
                      :href="event.ticket_link" 
                      target="_blank"
                      class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-full px-6 py-3 font-medium shadow-lg transform hover:scale-105 transition-all duration-300"
                    >
                      Réserver maintenant
                    </a>
                    <span 
                      v-else 
                      class="bg-gray-600 text-white rounded-full px-6 py-3 font-medium shadow-lg"
                    >
                      Bientôt disponible
                    </span>
                  </div>
                  <div class="absolute top-4 right-4 bg-black bg-opacity-75 text-white text-sm font-bold px-4 py-2 rounded-full flex items-center space-x-2">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ formatDate(event.event_date) }}</span>
                  </div>
                </div>
                <div class="p-4">
                  <div class="flex items-start justify-between mb-3">
                    <h4 class="font-bold text-lg">{{ event.title }}</h4>
                    <div class="flex items-center space-x-1 text-gray-400 text-sm">
                      <i class="fas fa-clock"></i>
                      <span>{{ formatEventTime(event.event_date) }}</span>
                    </div>
                  </div>
                  <div class="flex items-center text-gray-400 text-sm mb-3">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <span>{{ event.city ? event.city + ', ' : '' }}{{ event.country }}</span>
                  </div>
                  <p class="text-gray-300 mb-4">{{ truncateContent(event.description) }}</p>
                  <div class="flex justify-between items-center">
                    <a 
                      v-if="event.ticket_link"
                      :href="event.ticket_link" 
                      target="_blank" 
                      class="inline-flex items-center space-x-2 text-indigo-400 hover:text-indigo-300 transition-colors group/link"
                    >
                      <i class="fas fa-ticket-alt transform group-hover/link:rotate-12 transition-transform"></i>
                      <span class="font-medium">Réserver</span>
                    </a>
                    <span v-else class="text-gray-400 flex items-center space-x-2">
                      <i class="fas fa-clock"></i>
                      <span>Bientôt disponible</span>
                    </span>
                    <div class="flex items-center space-x-2">
                      <i class="fas fa-users text-gray-500"></i>
                      <span class="text-gray-400 text-sm">
                        {{ event.is_sold_out ? 'Complet' : 'Places disponibles' }}
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="text-center mt-8">
              <a href="/evenements" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-full font-medium transition shadow-lg">
                <i class="fas fa-calendar-alt mr-2"></i> Voir tous les événements
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- News & Updates -->
    <div class="updates-section">
      <!-- News Section -->
      <section id="news" class="py-8 px-4 sm:px-6 lg:px-8 bg-gray-900">
        <div class="max-w-7xl mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center animate-fade-in">Actualités</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Dynamic Actualités -->
            <div
              v-for="(actuality, index) in latestActualities" 
              :key="actuality.id"
              class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group"
              :class="{'delay-1': index === 0, 'delay-2': index === 1, 'delay-3': index === 2}"
            >
              <div class="relative">
                <img
                  :src="actuality.image"
                  :alt="actuality.title" 
                  class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-80"></div>
                <div v-if="actuality.category" 
                  class="absolute top-4 right-4 text-white text-xs font-bold px-4 py-2 rounded-full flex items-center space-x-2"
                  :class="{
                    'bg-indigo-600': actuality.category === 'release',
                    'bg-purple-600': actuality.category === 'news',
                    'bg-yellow-600': actuality.category === 'event'
                  }"
                >
                  <i :class="{
                    'fas fa-music': actuality.category === 'release',
                    'fas fa-newspaper': actuality.category === 'news',
                    'fas fa-calendar-alt': actuality.category === 'event'
                  }"></i>
                  <span>{{ getCategoryLabel(actuality.category) }}</span>
                </div>
              </div>
              <div class="p-6 relative">
                <div class="flex items-center text-sm text-gray-400 mb-3 space-x-4">
                  <div class="flex items-center space-x-2">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ formatDate(actuality.date) }}</span>
                  </div>
                  <div v-if="actuality.readTime" class="flex items-center space-x-2">
                    <i class="fas fa-clock"></i>
                    <span>{{ actuality.readTime }} min de lecture</span>
                  </div>
                </div>
                <h3 class="text-xl font-bold mb-3 group-hover:text-indigo-400 transition-colors">{{ actuality.title }}</h3>
                <p class="text-gray-300 mb-4 line-clamp-3">{{ truncateContent(actuality.content, 150) }}</p>
                <div class="flex items-center justify-between">
                  <a href="/actualites" class="inline-flex items-center space-x-2 text-indigo-400 hover:text-indigo-300 transition-colors group/link">
                    <span class="font-medium">Lire la suite</span>
                    <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i>
                  </a>
                  <div class="flex items-center space-x-3">
                    <button 
                      v-if="actuality.shareLink"
                      @click="shareActuality(actuality)"
                      class="text-gray-400 hover:text-indigo-400 transition-colors"
                      :title="'Partager ' + actuality.title"
                    >
                      <i class="fas fa-share-alt"></i>
                    </button>
                    <button 
                      v-if="actuality.bookmarkable"
                      @click="toggleBookmark(actuality)"
                      class="text-gray-400 hover:text-yellow-400 transition-colors"
                      :title="actuality.isBookmarked ? 'Retirer des favoris' : 'Ajouter aux favoris'"
                    >
                      <i :class="['fas', actuality.isBookmarked ? 'fa-bookmark' : 'fa-bookmark-o']"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="text-center mt-12">
            <a href="/actualites"
              class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-700 rounded-full font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg group">
              <span>Voir toutes les actualités</span>
              <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
            </a>
          </div>
        </div>
      </section>

      <!-- Gallery Section -->
      <section id="gallery" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
        <div class="max-w-7xl mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center animate-fade-in">Galerie</h2>
          
          <!-- Carousel Navigation -->
          <div class="flex justify-center items-center mb-8 relative">
            <div class="absolute left-0 hidden md:block">
              <button 
                @click="scrollGallery('prev')" 
                class="w-10 h-10 rounded-full bg-gray-700 hover:bg-indigo-600 flex items-center justify-center transition"
                aria-label="Précédent"
              >
                <i class="fas fa-chevron-left"></i>
              </button>
            </div>
            
            <h3 class="text-xl font-semibold">Photos & Vidéos</h3>
            
            <div class="absolute right-0 hidden md:block">
              <button 
                @click="scrollGallery('next')" 
                class="w-10 h-10 rounded-full bg-gray-700 hover:bg-indigo-600 flex items-center justify-center transition"
                aria-label="Suivant"
              >
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>
          </div>
          
          <!-- Gallery Carousel -->
          <div class="carousel-container overflow-hidden">
            <div 
              ref="galleryContainer"
              class="carousel flex gap-4 transition-transform duration-500 pb-4"
              :style="{ transform: `translateX(-${carouselOffset}px)` }"
            >
              <div 
                v-for="item in galleryItems" 
                :key="item.id"
                class="carousel-item flex-shrink-0 bg-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition animate-fade-in cursor-pointer flex-grow-0"
                :class="{
                  'w-full sm:w-[calc(50%-8px)] md:w-[calc(33.333%-11px)] lg:w-[calc(25%-12px)]': true
                }"
                @click="openGalleryModal(item)"
              >
                <div class="relative aspect-square">
                  <!-- Image -->
                  <img 
                    v-if="item.type === 'image'" 
                    :src="item.thumbnail || item.url" 
                    :alt="item.title"
                    class="w-full h-full object-cover"
                  >
                  
                  <!-- Video Thumbnail with Play Icon -->
                  <div v-else-if="item.type === 'video'" class="relative w-full h-full">
                    <img 
                      :src="item.thumbnail || 'https://via.placeholder.com/300x300?text=Video'" 
                      :alt="item.title"
                      class="w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 flex items-center justify-center">
                      <div class="w-16 h-16 bg-indigo-600 bg-opacity-80 rounded-full flex items-center justify-center">
                        <i class="fas fa-play text-white text-2xl"></i>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="p-3">
                  <h4 class="font-medium text-base truncate">{{ item.title }}</h4>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Mobile Navigation -->
          <div class="mt-6 flex justify-center space-x-4 md:hidden">
            <button 
              @click="scrollGallery('prev')" 
              class="w-12 h-12 rounded-full bg-gray-700 hover:bg-indigo-600 flex items-center justify-center transition"
              aria-label="Précédent"
            >
              <i class="fas fa-chevron-left"></i>
            </button>
            <button 
              @click="scrollGallery('next')" 
              class="w-12 h-12 rounded-full bg-gray-700 hover:bg-indigo-600 flex items-center justify-center transition"
              aria-label="Suivant"
            >
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
          
          <!-- Pagination Dots -->
          <div class="flex justify-center mt-6">
            <div 
              v-for="(_, index) in paginationDots" 
              :key="index"
              @click="goToPage(index)"
              class="w-3 h-3 mx-1 rounded-full cursor-pointer transition-colors duration-300"
              :class="currentPage === index ? 'bg-indigo-600' : 'bg-gray-500 hover:bg-gray-400'"
            ></div>
          </div>
          
          <!-- View More -->
         <!--  <div class="text-center mt-10">
            <a 
              href="/galerie" 
              class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-full font-medium transition shadow-lg"
            >
              <i class="fas fa-images mr-2"></i> Voir toute la galerie
            </a>
          </div> -->
        </div>
        
        <!-- Gallery Modal -->
        <div v-if="modalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4">
          <!-- Backdrop -->
          <div 
            class="absolute inset-0 bg-black bg-opacity-90 backdrop-blur-sm"
            @click="modalOpen = false"
          ></div>
          
          <!-- Modal Content -->
          <div class="relative max-w-5xl w-full max-h-[90vh] overflow-hidden rounded-lg z-10">
            <!-- Close Button -->
            <button 
              @click="modalOpen = false" 
              class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-gray-800 bg-opacity-70 hover:bg-red-600 flex items-center justify-center transition"
            >
              <i class="fas fa-times text-white"></i>
            </button>
            
            <!-- Navigation Buttons -->
            <button 
              @click="navigateModal('prev')"
              class="absolute left-4 top-1/2 transform -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-gray-800 bg-opacity-70 hover:bg-indigo-600 flex items-center justify-center transition"
            >
              <i class="fas fa-chevron-left text-white"></i>
            </button>
            
            <button 
              @click="navigateModal('next')"
              class="absolute right-4 top-1/2 transform -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-gray-800 bg-opacity-70 hover:bg-indigo-600 flex items-center justify-center transition"
            >
              <i class="fas fa-chevron-right text-white"></i>
            </button>
            
            <!-- Content -->
            <div v-if="currentModalItem" class="bg-gray-900 rounded-lg overflow-hidden">
              <!-- Image -->
              <img 
                v-if="currentModalItem.type === 'image'" 
                :src="currentModalItem.url" 
                :alt="currentModalItem.title"
                class="w-full max-h-[70vh] object-contain"
              >
              
              <!-- Video -->
              <div v-else-if="currentModalItem.type === 'video'" class="relative w-full">
                <iframe 
                  :src="getEmbedUrl(currentModalItem.url)" 
                  class="w-full aspect-video"
                  frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen
                ></iframe>
              </div>
              
              <!-- Info -->
              <div class="p-6">
                <h3 class="text-xl font-bold mb-2">{{ currentModalItem.title }}</h3>
                <p v-if="currentModalItem.description" class="text-gray-300">{{ currentModalItem.description }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Contact Section -->
    <section id="contact" class="py-8 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900 to-gray-800">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center animate-fade-in">Contact</h2>

        <div class="bg-gray-700 rounded-2xl shadow-2xl overflow-hidden animate-fade-in">
          <div class="p-8 md:p-12">
            <div class="text-center mb-10">
              <h3 class="text-3xl font-bold text-white mb-4">Comment pouvons-nous vous aider ?</h3>
              <p class="text-gray-300 max-w-2xl mx-auto">Choisissez le moyen de communication qui vous convient le mieux pour entrer en contact avec Axel Meryl ou son équipe.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              <!-- Email Contact Card -->
              <div class="bg-gray-800 rounded-xl p-6 shadow-md transform transition-transform hover:scale-105 hover:shadow-blue-900/30 hover:shadow-xl">
                <div class="flex flex-col items-center text-center">
                  <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mb-4 shadow-lg">
                    <i class="fas fa-envelope text-white text-3xl"></i>
                  </div>
                  <h3 class="text-xl font-semibold text-white mb-2">Par Email</h3>
                  <p class="text-gray-300 mb-6">Envoyez-nous un email et nous vous répondrons dans les 48 heures</p>
                  <a href="mailto:contact@axelmeryl.com" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 flex items-center shadow-lg">
                    <i class="fas fa-envelope mr-2"></i> Nous écrire
                  </a>
                </div>
              </div>

              <!-- Phone Contact Card -->
              <div class="bg-gray-800 rounded-xl p-6 shadow-md transform transition-transform hover:scale-105 hover:shadow-purple-900/30 hover:shadow-xl">
                <div class="flex flex-col items-center text-center">
                  <div class="w-20 h-20 bg-purple-600 rounded-full flex items-center justify-center mb-4 shadow-lg">
                    <i class="fas fa-phone-alt text-white text-3xl"></i>
                  </div>
                  <h3 class="text-xl font-semibold text-white mb-2">Par Téléphone</h3>
                  <p class="text-gray-300 mb-6">Contactez directement notre bureau pour toute demande urgente</p>
                  <a href="tel:+33123456789" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 flex items-center shadow-lg">
                    <i class="fas fa-phone-alt mr-2"></i> Appeler
                  </a>
                </div>
              </div>

              <!-- Social Media Contact Card -->
              <div class="bg-gray-800 rounded-xl p-6 shadow-md transform transition-transform hover:scale-105 hover:shadow-red-900/30 hover:shadow-xl">
                <div class="flex flex-col items-center text-center">
                  <div class="w-20 h-20 bg-red-600 rounded-full flex items-center justify-center mb-4 shadow-lg">
                    <i class="fas fa-hashtag text-white text-3xl"></i>
                  </div>
                  <h3 class="text-xl font-semibold text-white mb-2">Réseaux Sociaux</h3>
                  <p class="text-gray-300 mb-6">Suivez Axel Meryl sur les réseaux sociaux et envoyez vos messages</p>
                  <div class="flex justify-center space-x-4">
                    <a href="https://instagram.com/axelmeryl" target="_blank" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white p-3 rounded-full transition duration-300 shadow-lg">
                      <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="https://twitter.com/axelmeryl" target="_blank" class="bg-blue-400 hover:bg-blue-500 text-white p-3 rounded-full transition duration-300 shadow-lg">
                      <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="https://facebook.com/axelmeryl" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full transition duration-300 shadow-lg">
                      <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Modals -->
  <div class="modals">
    <!-- Gallery Modal -->
    <div v-if="modalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4">
      <!-- Backdrop -->
      <div 
        class="absolute inset-0 bg-black bg-opacity-90 backdrop-blur-sm"
        @click="modalOpen = false"
      ></div>
      
      <!-- Modal Content -->
      <div class="relative max-w-5xl w-full max-h-[90vh] overflow-hidden rounded-lg z-10">
        <!-- Close Button -->
        <button 
          @click="modalOpen = false" 
          class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-gray-800 bg-opacity-70 hover:bg-red-600 flex items-center justify-center transition"
        >
          <i class="fas fa-times text-white"></i>
        </button>
        
        <!-- Navigation Buttons -->
        <button 
          @click="navigateModal('prev')"
          class="absolute left-4 top-1/2 transform -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-gray-800 bg-opacity-70 hover:bg-indigo-600 flex items-center justify-center transition"
        >
          <i class="fas fa-chevron-left text-white"></i>
        </button>
        
        <button 
          @click="navigateModal('next')"
          class="absolute right-4 top-1/2 transform -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-gray-800 bg-opacity-70 hover:bg-indigo-600 flex items-center justify-center transition"
        >
          <i class="fas fa-chevron-right text-white"></i>
        </button>
        
        <!-- Content -->
        <div v-if="currentModalItem" class="bg-gray-900 rounded-lg overflow-hidden">
          <!-- Image -->
          <img 
            v-if="currentModalItem.type === 'image'" 
            :src="currentModalItem.url" 
            :alt="currentModalItem.title"
            class="w-full max-h-[70vh] object-contain"
          >
          
          <!-- Video -->
          <div v-else-if="currentModalItem.type === 'video'" class="relative w-full">
            <iframe 
              :src="getEmbedUrl(currentModalItem.url)" 
              class="w-full aspect-video"
              frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
              allowfullscreen
            ></iframe>
          </div>
          
          <!-- Info -->
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">{{ currentModalItem.title }}</h3>
            <p v-if="currentModalItem.description" class="text-gray-300">{{ currentModalItem.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';

// Types and Interfaces
const props = defineProps({
  latestReleases: {
    type: Object,
    default: () => ({
      singles: [],
      albums: []
    })
  },
  latestComedies: {
    type: Array,
    default: () => []
  },
  latestActualities: {
    type: Array,
    default: () => []
  },
  upcomingEvents: {
    type: Array,
    default: () => []
  },
  galleryItems: {
    type: Array,
    default: () => []
  }
});

// State Management
const galleryContainer = ref(null);
const carouselOffset = ref(0);
const currentPage = ref(0);
const itemsPerPage = ref(4);
const modalOpen = ref(null);
const currentModalItem = ref(null);
const currentModalIndex = ref(0);

// Méthode pour gérer le clic sur le bouton play
const playLatestVideo = () => {
  // Vous pouvez remplacer cette URL par celle de votre dernière vidéo
  const latestVideoUrl = 'https://youtube.com/watch?v=VOTRE_ID_VIDEO';
  window.open(latestVideoUrl, '_blank');
};

// Utility Functions
const formatDate = (dateString) => {
  const date = new Date(dateString);
  return date.toLocaleDateString('fr-FR', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  });
};

const formatDuration = (durationInSeconds) => {
  const hours = Math.floor(durationInSeconds / 3600);
  const minutes = Math.floor((durationInSeconds % 3600) / 60);
  return hours > 0 ? `${hours}h${minutes > 0 ? ` ${minutes}m` : ''}` : `${minutes}m`;
};

const getCategoryLabel = (category) => {
  const labels = {
    'release': 'Sortie',
    'news': 'Actualité',
    'event': 'Événement'
  };
  return labels[category] || 'Autre';
};

const truncateContent = (content, maxLength = 100) => {
  if (!content) return '';
  return content.length > maxLength ? content.slice(0, maxLength) + '...' : content;
};

const formatEventTime = (eventDate) => {
  const date = new Date(eventDate);
  const now = new Date();
  const diff = Math.floor((date - now) / 1000);
  
  if (diff < 60) return 'À l\'instant';
  if (diff < 3600) return `${Math.floor(diff / 60)} minute(s)`;
  if (diff < 86400) return `${Math.floor(diff / 3600)} heure(s)`;
  return `${Math.floor(diff / 86400)} jour(s)`;
};

// Gallery Functions
const scrollGallery = (direction) => {
  if (!galleryContainer.value) return;
  
  if (direction === 'next' && currentPage.value < paginationDots.value.length - 1) {
    currentPage.value++;
  } else if (direction === 'prev' && currentPage.value > 0) {
    currentPage.value--;
  }
  
  updateCarouselPosition();
};

const goToPage = (pageIndex) => {
  currentPage.value = pageIndex;
  updateCarouselPosition();
};

const updateCarouselPosition = () => {
  if (!galleryContainer.value) return;
  
  const containerWidth = galleryContainer.value.offsetWidth;
  const itemWidth = containerWidth / itemsPerPage.value;
  carouselOffset.value = currentPage.value * itemsPerPage.value * itemWidth;
};

const openGalleryModal = (item) => {
  currentModalItem.value = item;
  currentModalIndex.value = props.galleryItems.findIndex(i => i.id === item.id);
  modalOpen.value = true;
};

const navigateModal = (direction) => {
  const items = props.galleryItems;
  if (items.length <= 1) return;
  
  const newIndex = direction === 'next'
    ? (currentModalIndex.value + 1) % items.length
    : (currentModalIndex.value - 1 + items.length) % items.length;
  
  currentModalIndex.value = newIndex;
  currentModalItem.value = items[newIndex];
};

const getEmbedUrl = (url) => {
  if (url.includes('youtube.com') || url.includes('youtu.be')) {
    let videoId = '';
    
    if (url.includes('youtube.com/watch?v=')) {
      videoId = url.split('v=')[1].split('&')[0];
    } else if (url.includes('youtu.be/')) {
      videoId = url.split('youtu.be/')[1];
    }
    
    return videoId ? `https://www.youtube.com/embed/${videoId}` : url;
  }
  return url;
};

// Computed Properties
const paginationDots = computed(() => {
  if (!props.galleryItems.length) return [];
  
  const screenWidth = window.innerWidth;
  if (screenWidth < 640) {
    itemsPerPage.value = 1;
  } else if (screenWidth < 768) {
    itemsPerPage.value = 2;
  } else if (screenWidth < 1024) {
    itemsPerPage.value = 3;
  } else {
    itemsPerPage.value = 4;
  }
  
  const totalPages = Math.ceil(props.galleryItems.length / itemsPerPage.value);
  return new Array(totalPages).fill(null);
});

// Animation function
function animateOnScroll() {
  const elements = document.querySelectorAll('.animate-fade-in');
  const screenPosition = window.innerHeight / 1.3;
  
  elements.forEach(element => {
    const elementPosition = element.getBoundingClientRect().top;
    if (elementPosition < screenPosition) {
      element.style.opacity = '1';
      element.style.transform = 'translateY(0)';
    }
  });
}

// Event Handlers
const handleResize = () => {
  updateCarouselPosition();
};

// Lifecycle Hooks
onMounted(() => {
  window.addEventListener('resize', handleResize);
  window.addEventListener('scroll', animateOnScroll);
  
  updateCarouselPosition();
  animateOnScroll();
  
  return () => {
    window.removeEventListener('resize', handleResize);
    window.removeEventListener('scroll', animateOnScroll);
  };
});

// Expose all necessary functions and refs to the template
defineExpose({
  // Refs
  galleryContainer,
  carouselOffset,
  currentPage,
  itemsPerPage,
  modalOpen,
  currentModalItem,
  currentModalIndex,
  
  // Functions
  playLatestVideo,
  formatDate,
  formatDuration,
  getCategoryLabel,
  truncateContent,
  formatEventTime,
  scrollGallery,
  goToPage,
  openGalleryModal,
  navigateModal,
  getEmbedUrl,
  
  // Computed
  paginationDots
});
</script>

<style>
/* Base Styles */
:root {
  --primary-color: #4F46E5;
  --secondary-color: #6B7280;
  --background-dark: #1F2937;
  --background-darker: #111827;
}

/* Layout & Containers */
.max-w-7xl {
  max-width: 80rem;
}

/* Animations */
.animate-fade-in {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.5s ease, transform 0.5s ease;
}

/* Carousel Styles */
.carousel-container {
  width: 100%;
  position: relative;
}

.carousel {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.carousel-item {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.carousel-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

/* Responsive Styles */
@media (max-width: 768px) {
  .carousel-container {
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
  }
  
  .carousel {
    transform: none !important;
  }
  
  .carousel-item {
    scroll-snap-align: center;
  }
}

/* Modal Styles */
.modal-backdrop {
  backdrop-filter: blur(4px);
}

/* Utility Classes */
.gradient-text {
  @apply bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-600;
}
</style> 