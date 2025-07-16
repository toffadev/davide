<template>
  <!-- Hero Section avec animations améliorées -->
  <section id="home"
    class="pt-20 pb-12 md:pt-24 md:pb-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-800 to-gray-900 relative overflow-hidden">
    <!-- Effet de particules en arrière-plan amélioré -->
    <div class="absolute inset-0 opacity-20 overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 animate-gradient-x"></div>
      <!-- Particules musicales -->
      <div class="particles">
        <span v-for="n in 20" :key="n" class="particle"></span>
      </div>
    </div>

    <div class="max-w-7xl mx-auto relative">
      <div class="md:flex md:items-center md:justify-between">
        <div class="md:w-1/2 mb-8 md:mb-0 animate-slide-up">
          <h1 class="text-4xl md:text-5xl font-bold mb-3 text-reveal">
            DN<span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 bg-clip-text text-transparent animate-pulse-slow">BEATZ</span>
          </h1>
          <h2 class="text-xl md:text-2xl text-gray-300 mb-4 font-light text-reveal delay-200">Producteur, Beatmaker & Ingénieur Son</h2>
          <p class="text-gray-300 mb-6 max-w-lg text-lg leading-relaxed text-reveal delay-400">
            Découvrez l'univers sonore de DNBEATZ, créateur de beats uniques et ingénieur son qui donne vie à vos projets musicaux avec passion et expertise.
          </p>
          <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 btn-container">
            <a href="#music"
              class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 rounded-full font-medium transition-all duration-500 shadow-lg hover:shadow-indigo-500/40 flex items-center justify-center group btn-hover-effect">
              <i class="fas fa-music mr-2 transform group-hover:rotate-12 transition-transform duration-500"></i>
              <span>Écouter mes productions</span>
            </a>
            <a href="#store"
              class="px-6 py-3 bg-gray-700 hover:bg-gray-600 rounded-full font-medium transition-all duration-500 shadow-lg hover:shadow-gray-500/40 flex items-center justify-center border border-gray-600 group btn-hover-effect">
              <i class="fas fa-shopping-cart mr-2 transform group-hover:rotate-12 transition-transform duration-500"></i>
              <span>Acheter mes beats</span>
            </a>
          </div>
          <!-- Réseaux sociaux avec animations améliorées -->
          <div class="mt-6 flex items-center space-x-4 sm:justify-start justify-center social-icons">
            <a href="https://www.instagram.com/dnbeatz_r?igsh=MTdsa3l2anQwMnowaw==" target="_blank" 
              class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 rounded-full flex items-center justify-center transition-all duration-500 hover:scale-110 social-icon-hover"
              title="Suivre sur Instagram">
              <i class="fab fa-instagram text-lg"></i>
            </a>
            <a href="https://www.tiktok.com/@dn08460?_t=ZN-8wjhwzv8bBe&_r=1" target="_blank"
              class="w-10 h-10 bg-black hover:bg-gray-800 rounded-full flex items-center justify-center transition-all duration-500 hover:scale-110 social-icon-hover"
              title="Suivre sur TikTok">
              <i class="fab fa-tiktok text-lg"></i>
            </a>
            <a href="https://www.facebook.com/share/1PBnT5jCgV/" target="_blank"
              class="w-10 h-10 bg-blue-600 hover:bg-blue-700 rounded-full flex items-center justify-center transition-all duration-500 hover:scale-110 social-icon-hover"
              title="Suivre sur Facebook">
              <i class="fab fa-facebook-f text-lg"></i>
            </a>
            <a href="https://www.snapchat.com/add/dav_dnbeatz?share_id=_7pD7cCnh1I&locale=fr-FR" target="_blank"
              class="w-10 h-10 bg-yellow-400 hover:bg-yellow-500 rounded-full flex items-center justify-center transition-all duration-500 hover:scale-110 social-icon-hover"
              title="Suivre sur Snapchat">
              <i class="fab fa-snapchat-ghost text-lg"></i>
            </a>
          </div>
        </div>

        <div class="md:w-1/2 animate-slide-up delay-500">
          <div class="relative">
            <div class="w-full h-72 md:h-96 bg-indigo-900/20 rounded-2xl overflow-hidden shadow-2xl relative group perspective-card">
              <img
                src="https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="DNBEATZ en studio" 
                class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-700">
              <!-- Overlay gradient amélioré -->
              <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-40"></div>
            </div>
            <!-- Bouton play flottant amélioré -->
            <button @click="playLatestVideo" 
              class="absolute -bottom-6 -right-6 w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center shadow-xl hover:shadow-2xl hover:from-indigo-600 hover:to-purple-700 transform hover:scale-110 transition-all duration-500 group play-btn-pulse">
              <i class="fas fa-play text-white text-2xl group-hover:text-3xl transition-all duration-500"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content -->
  <main>
    <!-- Store Section avec cartes améliorées -->
    <section id="store" class="pt-8 pb-4 px-4 sm:px-6 lg:px-8 bg-gray-800 section-fade-in">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center animate-fade-in">DNBEATZ <span class="gradient-text">Store</span></h2>
        
        <!-- Productions payantes avec cartes améliorées -->
        <div class="mb-8 animate-fade-in delay-1">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-semibold">Beats Premium</h3>
            <div class="h-px bg-gray-300 flex-grow ml-4 heading-line"></div>
          </div>
          
          <div v-if="props.paidProductions && props.paidProductions.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 card-grid">
            <div v-for="production in props.paidProductions" :key="production.id" 
                 class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-500 hover:shadow-lg hover:-translate-y-2 hover:scale-[1.03] flex flex-col card-hover">
              <div class="relative pb-[56%]">
                <img 
                  v-if="production.cover_image"
                  :src="production.cover_image" 
                  :alt="production.title" 
                  class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-700 hover:scale-105"
                >
                <div v-else class="absolute inset-0 w-full h-full bg-gray-200 flex items-center justify-center">
                  <i class="fas fa-image text-gray-400 text-4xl"></i>
                </div>
                <div class="absolute top-2 right-2 bg-blue-600 text-white px-2 py-1 rounded-full text-xs font-medium price-tag">
                  {{ formatPrice(production.price) }}
                </div>
              </div>
              
              <div class="p-3 flex-grow flex flex-col">
                <h4 class="text-lg font-semibold mb-1 line-clamp-1 text-gray-800">{{ production.title }}</h4>
                <p v-if="production.description" class="text-gray-600 mb-3 text-sm line-clamp-2">{{ production.description }}</p>
                
                <div v-if="production.audio_sample_path" class="mb-3 mt-auto audio-container">
                  <audio 
                    controls 
                    class="w-full h-8 audio-player" 
                    preload="metadata"
                    :data-production-id="production.id"
                    style="z-index: 20; position: relative; cursor: pointer;"
                  >
                    <source :src="production.audio_sample_path" type="audio/mpeg">
                    Votre navigateur ne supporte pas la lecture audio.
                  </audio>
                </div>
                
                <button 
                  class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-colors duration-300 text-sm buy-button"
                  @click="checkout(production.id)"
                  :disabled="loading === production.id"
                  type="button"
                  :data-production-id="production.id"
                  style="cursor: pointer !important; z-index: 10; position: relative;"
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

          <div class="text-center mt-6">
            <a href="/productions" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-full font-medium transition duration-300 shadow-lg btn-hover-effect">
              <i class="fas fa-shopping-cart mr-2"></i> Voir tous les beats premium
            </a>
          </div>
        </div>
        
        <!-- Productions gratuites -->
        <div class="mb-8 animate-fade-in delay-2">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-semibold">Beats Gratuits</h3>
            <div class="h-px bg-gray-300 flex-grow ml-4"></div>
          </div>
          
          <div v-if="props.freeProductions && props.freeProductions.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <div v-for="production in props.freeProductions" :key="production.id" 
                 class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1 hover:scale-[1.02] flex flex-col">
              <div class="relative pb-[56%] bg-black">
                <div v-if="getYoutubeEmbedUrl(production.youtube_link)" class="youtube-container absolute inset-0">
                  <!-- Thumbnail avec bouton play (affiché par défaut) -->
                  <div 
                    v-if="!loadedVideos.has(production.id)"
                    class="youtube-thumbnail absolute inset-0 cursor-pointer flex items-center justify-center"
                    @click="loadYoutubeVideo(production)"
                    :data-production-id="production.id"
                    style="cursor: pointer !important; z-index: 10; position: relative;"
                  >
                    <!-- Miniature YouTube (générée à partir de l'ID) -->
                    <img 
                      :src="getYoutubeThumbnail(production.youtube_link)" 
                      :alt="production.title" 
                      class="absolute inset-0 w-full h-full object-cover"
                    >
                    <!-- Bouton play avec animation améliorée -->
                    <div class="play-button-overlay absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center hover:bg-opacity-50 transition-all duration-300">
                      <div class="w-16 h-16 bg-red-600 hover:bg-red-700 rounded-full flex items-center justify-center shadow-xl transform transition-transform duration-300 hover:scale-110 pulse-animation">
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
                <h4 class="text-lg font-semibold mb-1 line-clamp-1 text-gray-800">{{ production.title }}</h4>
                <p v-if="production.description" class="text-gray-600 text-sm line-clamp-2 mb-3">{{ production.description }}</p>
                
                <div class="mt-auto flex justify-end">
                  <a 
                    v-if="production.youtube_link"
                    :href="production.youtube_link"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded text-xs font-medium transition-colors"
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

          <div class="text-center mt-6">
            <a href="/productions" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 rounded-full font-medium transition shadow-lg">
              <i class="fas fa-gift mr-2"></i> Voir tous les beats gratuits
            </a>
          </div>
        </div>

        <!-- Comment utiliser section -->
        <!-- <div class="mt-10 bg-gray-700 rounded-lg p-6 animate-fade-in delay-3">
          <h3 class="text-xl font-semibold mb-4 text-center">Comment utiliser nos beats</h3>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
            <div class="bg-gray-800 p-4 rounded-lg shadow-sm">
              <div class="text-center mb-4">
                <div class="inline-block p-2 bg-blue-100 rounded-full text-blue-600 mb-3">
                  <i class="fas fa-shopping-cart text-xl"></i>
                </div>
                <h4 class="text-base font-semibold">1. Achetez un beat</h4>
              </div>
              <p class="text-gray-300 text-sm text-center">
                Parcourez notre collection et choisissez le beat qui correspond à votre style.
              </p>
            </div>
            
            <div class="bg-gray-800 p-4 rounded-lg shadow-sm">
              <div class="text-center mb-3">
                <div class="inline-block p-2 bg-green-100 rounded-full text-green-600 mb-2">
                  <i class="fas fa-download text-xl"></i>
                </div>
                <h4 class="text-base font-semibold">2. Téléchargez les fichiers</h4>
              </div>
              <p class="text-gray-300 text-sm text-center">
                Après l'achat, vous recevrez immédiatement les fichiers WAV et MP3 de haute qualité.
              </p>
            </div>
            
            <div class="bg-gray-800 p-4 rounded-lg shadow-sm">
              <div class="text-center mb-3">
                <div class="inline-block p-2 bg-purple-100 rounded-full text-purple-600 mb-2">
                  <i class="fas fa-music text-xl"></i>
                </div>
                <h4 class="text-base font-semibold">3. Créez votre musique</h4>
              </div>
              <p class="text-gray-300 text-sm text-center">
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
        </div> -->
      </div>
    </section>

    <!-- Portfolio Sections -->
    <div class="portfolio-sections">
      <!-- Music Section -->
      <section id="music" class="pt-8 pb-4 px-4 sm:px-6 lg:px-8 bg-gray-700">
        <div class="max-w-7xl mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center animate-fade-in">Prod By <span class="gradient-text">DNBEATZ</span></h2>

          <!-- Singles -->
          <div class="mb-8 animate-fade-in delay-1">
            <h3 class="text-2xl font-semibold mb-6 flex items-center">
              <i class="fab fa-spotify text-green-500 mr-3 text-3xl"></i>
              <span>Dernières Productions</span>
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
                  <div class="absolute top-2 right-2 bg-indigo-600 text-white text-xs px-2 py-1 rounded-full">
                    Prod by DNBEATZ
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
          <div class="mb-8 animate-fade-in delay-2">
            <h3 class="text-2xl font-semibold mb-6 flex items-center">
              <i class="fas fa-compact-disc text-purple-500 mr-3 text-3xl"></i>
              <span>Albums Produits</span>
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
                    <div class="absolute top-2 right-2 bg-indigo-600 text-white text-xs px-2 py-1 rounded-full">
                      Prod by DNBEATZ
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
          <!-- Comedy section removed -->
        </div>
      </section>

      <!-- News & Updates -->
      <div class="updates-section">
        <!-- News Section -->
        <section id="news" class="pt-8 pb-4 px-4 sm:px-6 lg:px-8 bg-gray-900">
          <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center animate-fade-in">Actualités</h2>
            
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
            
            <div class="text-center mt-4 mb-4">
              <a href="/actualites"
                class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-700 rounded-full font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg group">
                <span>Voir toutes les actualités</span>
                <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
              </a>
            </div>
          </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="pt-8 pb-4 px-4 sm:px-6 lg:px-8 bg-gray-700">
          <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center animate-fade-in">Galerie</h2>
            
            <!-- Carousel Navigation -->
            <div class="flex justify-center items-center mb-10 relative">
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
        </section>
      </div>

      <!-- About Section -->
    <section id="about" class="pt-8 pb-4 px-4 sm:px-6 lg:px-8 bg-gray-900">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center animate-fade-in">Biographie</h2>

        <div class="md:flex md:items-center md:space-x-12">
          <div class="md:w-1/3 mb-8 md:mb-0 animate-fade-in delay-1">
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-1 rounded-2xl shadow-xl">
              <div class="bg-gray-800 rounded-xl overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1571330735066-03aaa9429d89?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                  alt="DNBEATZ portrait" class="w-full h-full object-cover">
              </div>
            </div>
          </div>

          <div class="md:w-2/3 animate-fade-in delay-2">
            <div class="prose prose-invert max-w-none">
              <p class="mb-6 text-lg">Davide, connu sous le nom de DNBEATZ, est un producteur de musique, beatmaker et ingénieur son passionné, créant des beats qui transcendent les genres et inspirent les artistes.</p>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                <div class="bg-gray-800 p-4 rounded-lg">
                  <div class="text-indigo-400 text-xl mb-2">Production</div>
                  <p class="text-sm text-gray-300">Création de beats personnalisés et originaux</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg">
                  <div class="text-indigo-400 text-xl mb-2">Ingénierie</div>
                  <p class="text-sm text-gray-300">Mix & Master professionnel</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bouton En savoir plus -->
        <div class="text-center mt-8">
          <a href="/biographie"
            class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-700 rounded-full font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg group">
            <span>En savoir plus</span>
            <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
          </a>
        </div>
      </div>
    </section>
      <!-- Contact Section -->
      <section id="contact" class="pt-8 pb-4 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900 to-gray-800">
        <div class="max-w-7xl mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center animate-fade-in">Contact</h2>

          <div class="bg-gray-700 rounded-2xl shadow-2xl overflow-hidden animate-fade-in">
            <div class="p-8 md:p-12">
              <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-white mb-4">Comment pouvons-nous vous aider ?</h3>
                <p class="text-gray-300 max-w-2xl mx-auto">Choisissez le moyen de communication qui vous convient le mieux pour entrer en contact avec DNBEATZ.</p>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Email Contact Card -->
                <div class="bg-gray-800 rounded-xl p-6 shadow-md transform transition-transform hover:scale-105 hover:shadow-blue-900/30 hover:shadow-xl">
                  <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mb-4 shadow-lg">
                      <i class="fas fa-envelope text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Par Email</h3>
                    <p class="text-gray-300 mb-6">Envoyez-nous un email et nous vous répondrons dans les 48 heures</p>
                    <a href="mailto:dnbeatzz@gmail.com" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 flex items-center shadow-lg">
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
                    <h3 class="text-xl font-semibold text-white mb-3">Par Téléphone</h3>
                    <p class="text-gray-300 mb-6">Contactez directement notre bureau pour toute demande urgente</p>
                    <a href="tel:+33669228862" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 flex items-center shadow-lg">
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
                    <h3 class="text-xl font-semibold text-white mb-3">Réseaux Sociaux</h3>
                    <p class="text-gray-300 mb-6">Suivez DNBEATZ sur les réseaux sociaux et envoyez vos messages</p>
                    <div class="flex justify-center space-x-4">
                      <a href="https://www.instagram.com/dnbeatz_r?igsh=MTdsa3l2anQwMnowaw==" target="_blank" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white p-3 rounded-full transition duration-300 shadow-lg">
                        <i class="fab fa-instagram text-xl"></i>
                      </a>
                      <a href="https://www.facebook.com/share/1PBnT5jCgV/" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full transition duration-300 shadow-lg">
                        <i class="fab fa-facebook-f text-xl"></i>
                      </a>
                      <a href="https://www.tiktok.com/@dn08460?_t=ZN-8wjhwzv8bBe&_r=1" target="_blank" class="bg-black hover:bg-gray-800 text-white p-3 rounded-full transition duration-300 shadow-lg">
                        <i class="fab fa-tiktok text-xl"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
        </div>
      </section>
    </div> <!-- Closing tag for portfolio-sections -->
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
            <div v-if="currentModalItem.type === 'image'" class="relative w-full h-[70vh] flex items-center justify-center bg-gray-800">
              <img 
                :src="currentModalItem.thumbnail || currentModalItem.url" 
                :alt="currentModalItem.title"
                class="max-w-full max-h-full object-contain"
                @error="handleImageError"
                @load="handleImageLoad"
              >
              <div v-if="imageLoadError" class="absolute inset-0 flex items-center justify-center text-gray-400">
                <span>Impossible de charger l'image</span>
              </div>
            </div>
            
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
              <!-- <p class="text-sm text-gray-400 mt-2">
                Source de l'image: {{ currentModalItem.thumbnail || currentModalItem.url || 'Non disponible' }}
              </p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { ref, computed, onMounted, onUnmounted, nextTick } from 'vue';
  import axios from 'axios';

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
      default: () => [],
      validator: (items) => {
        return items.every(item => {
          if (item.type === 'image') {
            return item.thumbnail || item.url; // Vérifie qu'au moins une source d'image est disponible
          }
          return true;
        });
      }
    },
    paidProductions: {
      type: Array,
      default: () => []
    },
    freeProductions: {
      type: Array,
      default: () => []
    }
  });

  // State Management
  const galleryContainer = ref(null);
  const carouselOffset = ref(0);
  const currentPage = ref(0);
  const itemsPerPage = ref(4);
  const modalOpen = ref(false); // Changé de null à false pour éviter des problèmes
  const currentModalItem = ref(null);
  const currentModalIndex = ref(0);
  const imageLoadError = ref(false);
  const stripe = ref(null);
  const iframeErrors = ref(new Set()); // Pour suivre les iframes en erreur
  const loadedVideos = ref(new Set()); // Pour suivre les vidéos chargées
  const loading = ref(null); // Ajout de cette variable pour suivre l'état de chargement

  // Initialiser Stripe au chargement du composant
  onMounted(() => {
    console.log('HomePage component mounted');
    
    // Initialiser Stripe
    if (window.Stripe) {
      stripe.value = window.Stripe(import.meta.env.VITE_STRIPE_KEY);
      console.log('Stripe initialized');
    } else {
      console.warn('Stripe not available');
    }
    
    // Attacher les événements
    window.addEventListener('resize', handleResize);
    window.addEventListener('scroll', animateOnScroll);
    
    // Initialiser les animations
    updateCarouselPosition();
    animateOnScroll();
    initializeParticles();
    
    // Initialiser les effets de carte après le rendu du DOM
    nextTick(() => {
      initializeCardEffects();
      setupButtonEvents();
    });
    
    // Trigger initial animation
    setTimeout(animateOnScroll, 100);
  });
  
  // Fonction pour configurer les événements de bouton
  const setupButtonEvents = () => {
    // S'assurer que les boutons d'achat sont cliquables
    const buyButtons = document.querySelectorAll('.buy-button');
    buyButtons.forEach(button => {
      button.style.cursor = 'pointer';
      button.addEventListener('mouseover', () => {
        button.style.backgroundColor = '#2563EB'; // blue-700
      });
      button.addEventListener('mouseout', () => {
        button.style.backgroundColor = '#3B82F6'; // blue-600
      });
    });
    
    // S'assurer que les miniatures YouTube sont cliquables
    const thumbnails = document.querySelectorAll('.youtube-thumbnail');
    thumbnails.forEach(thumbnail => {
      thumbnail.style.cursor = 'pointer';
    });
    
    // S'assurer que les lecteurs audio sont correctement initialisés
    const audioPlayers = document.querySelectorAll('.audio-player');
    console.log('Found', audioPlayers.length, 'audio players');
    
    audioPlayers.forEach(player => {
      // Ajouter des styles pour s'assurer que le lecteur est cliquable
      player.style.cursor = 'pointer';
      player.style.zIndex = '20';
      player.style.position = 'relative';
      
      // Réinitialiser le lecteur pour s'assurer qu'il fonctionne correctement
      player.load();
      
      // Ajouter un gestionnaire d'événements pour le clic
      player.addEventListener('click', (event) => {
        // Empêcher la propagation de l'événement pour éviter les conflits
        event.stopPropagation();
        
        // Si le lecteur est en pause, le démarrer
        if (player.paused) {
          // Pause tous les autres lecteurs
          audioPlayers.forEach(otherPlayer => {
            if (otherPlayer !== player && !otherPlayer.paused) {
              otherPlayer.pause();
            }
          });
          
          // Démarrer ce lecteur
          player.play().catch(error => {
            console.error('Error playing audio:', error);
          });
        } else {
          // Sinon, mettre en pause
          player.pause();
        }
      });
      
      // Ajouter des gestionnaires d'événements pour les erreurs
      player.addEventListener('error', (event) => {
        console.error('Audio player error:', event);
      });
    });
  };

  // Méthode pour gérer le clic sur le bouton play
  const playLatestVideo = () => {
    console.log('Play latest video clicked');
    // Vous pouvez remplacer cette URL par celle de votre dernière vidéo
    const latestVideoUrl = 'https://youtube.com/watch?v=VOTRE_ID_VIDEO';
    window.open(latestVideoUrl, '_blank');
  };

  // Gestion des iframes YouTube
  const handleIframeLoad = (event) => {
    // Iframe chargée avec succès
    const iframe = event.target;
    const iframeId = iframe.getAttribute('data-id');
    if (iframeId && iframeErrors.value.has(iframeId)) {
      iframeErrors.value.delete(iframeId);
    }
  };

  const handleIframeError = (event) => {
    // Erreur de chargement de l'iframe
    const iframe = event.target;
    const iframeId = iframe.getAttribute('data-id');
    if (iframeId) {
      iframeErrors.value.add(iframeId);
    }
    // Masquer l'iframe en erreur
    iframe.style.display = 'none';
    
    // Afficher un message d'erreur plus discret
    const parent = iframe.parentElement;
    if (parent) {
      const errorDiv = document.createElement('div');
      errorDiv.className = 'absolute inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50';
      errorDiv.innerHTML = '<div class="text-center p-4"><i class="fas fa-exclamation-circle text-yellow-500 text-2xl mb-2"></i><p class="text-white text-sm">Cliquez pour voir sur YouTube</p></div>';
      errorDiv.style.cursor = 'pointer';
      errorDiv.onclick = () => {
        // Récupérer l'URL YouTube originale
        const productionId = iframe.getAttribute('data-production-id');
        const productions = [...props.freeProductions];
        const production = productions.find(p => p.id.toString() === productionId);
        if (production && production.youtube_link) {
          window.open(production.youtube_link, '_blank');
        }
      };
      parent.appendChild(errorDiv);
    }
  };

  // Fonctions pour le chargement différé des vidéos YouTube
  const getYoutubeThumbnail = (url) => {
    if (!url) return null;
    
    // Extraire l'ID de la vidéo YouTube
    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
    const match = url.match(regExp);
    
    if (match && match[2].length === 11) {
      const videoId = match[2];
      // Utiliser l'image de prévisualisation de qualité maximale
      return `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;
    }
    
    return 'https://via.placeholder.com/480x360?text=Video+YouTube';
  };

  const loadYoutubeVideo = (production) => {
    console.log('Loading YouTube video for production:', production.id);
    // Ajouter l'ID de la production à l'ensemble des vidéos chargées
    loadedVideos.value.add(production.id);
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

  // Fonctions pour le Store
  const formatPrice = (price) => {
    return new Intl.NumberFormat('fr-FR', {
      style: 'currency',
      currency: 'EUR'
    }).format(price);
  };

  const getYoutubeEmbedUrl = (url) => {
    if (!url) return null;
    
    // Extraire l'ID de la vidéo YouTube
    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
    const match = url.match(regExp);
    
    if (match && match[2].length === 11) {
      return `https://www.youtube.com/embed/${match[2]}?rel=0&showinfo=0&autoplay=0&modestbranding=1`;
    }
    
    return null;
  };

  const checkout = async (productionId) => {
    console.log('Checkout clicked for production:', productionId);
    loading.value = productionId;
    
    try {
      console.log('Sending POST request to /create-checkout-session');
      const response = await axios.post('/create-checkout-session', {
        production_id: productionId
      });
      console.log('Response received:', response.data);
      
      // S'assurer que Stripe est initialisé
      if (!stripe.value && window.Stripe) {
        console.log('Initializing Stripe with key:', import.meta.env.VITE_STRIPE_KEY);
        stripe.value = window.Stripe(import.meta.env.VITE_STRIPE_KEY);
      }
      
      if (!stripe.value) {
        console.error('Stripe n\'est pas initialisé');
        alert('Une erreur est survenue lors de l\'initialisation de Stripe.');
        return;
      }
      
      console.log('Redirecting to Stripe checkout with sessionId:', response.data.id);
      const result = await stripe.value.redirectToCheckout({
        sessionId: response.data.id
      });
      
      if (result.error) {
        console.error('Erreur lors de la redirection vers Stripe:', result.error);
        alert('Une erreur est survenue lors de la redirection vers la page de paiement.');
      }
    } catch (error) {
      console.error('Erreur lors de la création de la session Stripe:', error);
      alert('Une erreur est survenue lors de la création de la session de paiement.');
    } finally {
      loading.value = null;
    }
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
    console.log('Opening gallery modal for item:', item);
    if (!item.thumbnail && !item.url) {
      console.error('Aucune image disponible pour:', item.title);
      return;
    }
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

  // Animation functions améliorées
  function animateOnScroll() {
    const elements = document.querySelectorAll('.animate-fade-in, .section-fade-in');
    const screenPosition = window.innerHeight / 1.1;
    
    elements.forEach(element => {
      const elementPosition = element.getBoundingClientRect().top;
      if (elementPosition < screenPosition) {
        element.style.opacity = '1';
        element.style.transform = 'translateY(0)';
        element.classList.add('in-view');
      }
    });
  }

  // Fonction pour initialiser les particules
  function initializeParticles() {
    const particles = document.querySelectorAll('.particle');
    
    particles.forEach((particle, index) => {
      const delay = Math.random() * 8;
      const duration = 5 + Math.random() * 10;
      const x = Math.random() * 100;
      const y = Math.random() * 100;
      
      particle.style.top = `${y}%`;
      particle.style.left = `${x}%`;
      particle.style.animationDelay = `${delay}s`;
      particle.style.animationDuration = `${duration}s`;
    });
  }

  // Effet 3D subtil pour les cartes
  function initializeCardEffects() {
    console.log('Initializing card effects');
    const cards = document.querySelectorAll('.perspective-card');
    console.log('Found', cards.length, 'perspective cards');
    
    cards.forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const xRotation = ((y - rect.height / 2) / rect.height) * 10;
        const yRotation = ((x - rect.width / 2) / rect.width) * -10;
        
        card.style.transform = `perspective(1000px) rotateX(${xRotation}deg) rotateY(${yRotation}deg)`;
      });
      
      card.addEventListener('mouseout', () => {
        card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
      });
    });
  }

  // Event Handlers
  const handleResize = () => {
    updateCarouselPosition();
  };

  const handleImageError = () => {
    imageLoadError.value = true;
  };

  const handleImageLoad = () => {
    imageLoadError.value = false;
  };

  // Fonction pour partager une actualité
  const shareActuality = (actuality) => {
    if (navigator.share && actuality.shareLink) {
      navigator.share({
        title: actuality.title,
        text: truncateContent(actuality.content, 100),
        url: actuality.shareLink
      })
      .catch((error) => console.log('Erreur de partage', error));
    } else if (actuality.shareLink) {
      window.open(actuality.shareLink, '_blank');
    }
  };
  
  // Fonction pour ajouter/retirer des favoris
  const toggleBookmark = (actuality) => {
    actuality.isBookmarked = !actuality.isBookmarked;
    // Implémentation à compléter selon votre système de gestion des favoris
  };

  // Lifecycle Hooks
  onUnmounted(() => {
    window.removeEventListener('resize', handleResize);
    window.removeEventListener('scroll', animateOnScroll);
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
    loading,
    loadedVideos,
    
    // Functions
    playLatestVideo,
    formatDate,
    formatDuration,
    getCategoryLabel,
    truncateContent,
    formatEventTime,
    formatPrice,
    getYoutubeEmbedUrl,
    checkout,
    scrollGallery,
    goToPage,
    openGalleryModal,
    navigateModal,
    getEmbedUrl,
    shareActuality,
    toggleBookmark,
    loadYoutubeVideo,
    
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

  /* Animations améliorées */
  .animate-fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.6s ease, transform 0.6s ease;
  }

  .section-fade-in {
    opacity: 0;
    transform: translateY(10px);
    transition: opacity 0.8s ease, transform 0.8s ease;
    animation: sectionFadeIn 0.8s forwards;
    animation-play-state: paused;
  }

  .section-fade-in.in-view {
    animation-play-state: running;
  }

  @keyframes sectionFadeIn {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-slide-up {
    opacity: 0;
    transform: translateY(30px);
    animation: slideUp 0.8s forwards;
  }

  @keyframes slideUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .delay-200 {
    animation-delay: 0.2s;
  }

  .delay-400 {
    animation-delay: 0.4s;
  }

  .delay-500 {
    animation-delay: 0.5s;
  }

  .text-reveal {
    clip-path: inset(0 100% 0 0);
    animation: textReveal 1s forwards;
  }

  @keyframes textReveal {
    to {
      clip-path: inset(0 0 0 0);
    }
  }

  .animate-pulse-slow {
    animation: pulseSlow 3s infinite;
  }

  @keyframes pulseSlow {
    0%, 100% {
      opacity: 1;
    }
    50% {
      opacity: 0.8;
    }
  }

  /* Améliorations des boutons */
  .btn-hover-effect {
    position: relative;
    overflow: hidden;
    z-index: 1;
  }

  .btn-hover-effect:after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.1);
    transition: all 0.5s ease;
    z-index: -1;
  }

  .btn-hover-effect:hover:after {
    left: 0;
  }

  .btn-container {
    opacity: 0;
    animation: fadeIn 0.5s 0.6s forwards;
  }

  /* Améliorations des icônes sociales */
  .social-icons {
    opacity: 0;
    animation: fadeIn 0.5s 0.8s forwards;
  }

  .social-icon-hover {
    position: relative;
    overflow: hidden;
  }

  .social-icon-hover::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: scale(0);
    transition: all 0.4s ease;
  }

  .social-icon-hover:hover::before {
    transform: scale(1.4);
  }

  /* Amélioration du bouton Play */
  .play-btn-pulse {
    position: relative;
  }

  .play-btn-pulse::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 50%;
    background: linear-gradient(145deg, #4f46e5, #9333ea);
    opacity: 0.8;
    z-index: -1;
    animation: pulsate 2s ease-out infinite;
  }

  @keyframes pulsate {
    0% {
      transform: scale(0.9);
      opacity: 0.8;
    }
    50% {
      transform: scale(1.1);
      opacity: 0.2;
    }
    100% {
      transform: scale(0.9);
      opacity: 0.8;
    }
  }

  /* Effet de perspective sur les cartes */
  .perspective-card {
    perspective: 1000px;
    transition: transform 0.8s;
  }

  .perspective-card:hover {
    transform: rotateY(5deg);
  }

  /* Amélioration du style des cartes */
  .card-hover {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
  }

  .card-hover::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0;
    background: linear-gradient(to bottom, rgba(79, 70, 229, 0.1), transparent);
    transition: height 0.5s ease;
  }

  .card-hover:hover::after {
    height: 100%;
  }

  .price-tag {
    transform: translateY(-20px);
    opacity: 0;
    animation: slideDown 0.5s 0.3s forwards;
  }

  @keyframes slideDown {
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  /* Animation pour le carousel */
  .carousel-container {
    width: 100%;
    position: relative;
  }

  .carousel {
    display: flex;
    transition: transform 0.7s cubic-bezier(0.25, 1, 0.5, 1);
  }

  .carousel-item {
    transition: transform 0.5s ease, box-shadow 0.5s ease;
  }

  .carousel-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 25px -3px rgba(0, 0, 0, 0.15), 0 8px 10px -4px rgba(0, 0, 0, 0.1);
  }

  /* Animations des particules */
  .particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }

  .particle {
    position: absolute;
    display: block;
    pointer-events: none;
    width: 6px;
    height: 6px;
    background: white;
    border-radius: 50%;
    opacity: 0;
    animation: particle 8s linear infinite;
  }

  .particle:nth-child(even) {
    background: linear-gradient(90deg, #4f46e5, #9333ea);
    width: 8px;
    height: 8px;
  }

  .particle:nth-child(3n) {
    background: linear-gradient(90deg, #9333ea, #ec4899);
    width: 5px;
    height: 5px;
  }

  .particle:nth-child(5n) {
    background: linear-gradient(90deg, #ec4899, #4f46e5);
    width: 4px;
    height: 4px;
  }

  @keyframes particle {
    0% {
      transform: translateY(0) translateX(0);
      opacity: 0;
    }
    10% {
      opacity: 0.5;
    }
    50% {
      opacity: 0.2;
    }
    90% {
      opacity: 0.5;
    }
    100% {
      transform: translateY(calc(-100vh - 10px)) translateX(100px);
      opacity: 0;
    }
  }

  @keyframes fadeIn {
    to {
      opacity: 1;
    }
  }

  /* Améliorations des titres */
  .heading-highlight {
    position: relative;
    display: inline-block;
  }

  .heading-highlight::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #4f46e5, #9333ea);
    animation: headingUnderline 1s 0.5s forwards;
  }

  @keyframes headingUnderline {
    to {
      width: 100%;
    }
  }

  .heading-line {
    transform: scaleX(0);
    transform-origin: left;
    animation: scaleX 1s 0.3s cubic-bezier(0.17, 0.67, 0.83, 0.67) forwards;
  }

  @keyframes scaleX {
    to {
      transform: scaleX(1);
    }
  }

  /* Amélioration des lecteurs audio */
  .audio-player {
    border-radius: 4px;
    overflow: visible;
    transition: all 0.3s ease;
    cursor: pointer !important;
    min-height: 30px;
    z-index: 20;
    position: relative;
  }

  .audio-player:hover {
    transform: scale(1.01);
  }
  
  .audio-container {
    position: relative;
    z-index: 20;
    cursor: pointer;
    padding: 2px;
    border-radius: 4px;
    transition: all 0.3s ease;
  }
  
  .audio-container:hover {
    background-color: rgba(255, 255, 255, 0.05);
  }
  
  /* Styles pour les contrôles audio - simplifiés */
  audio::-webkit-media-controls-panel {
    background-color: transparent;
  }
  
  audio::-webkit-media-controls-play-button {
    /* Styles par défaut du navigateur */
  }
  
  audio::-webkit-media-controls-play-button:hover {
    /* Styles par défaut du navigateur */
  }

  /* Améliorations pour le bouton d'achat */
  .buy-button {
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
  }

  .buy-button::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: all 0.4s ease;
  }

  .buy-button:hover::after {
    left: 100%;
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
    backdrop-filter: blur(8px);
  }

  /* Utility Classes */
  .gradient-text {
    @apply bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-600;
    background-size: 200% 200%;
    animation: gradientFlow 3s ease infinite;
  }

  @keyframes gradientFlow {
    0% {
      background-position: 0% 50%;
    }
    50% {
      background-position: 100% 50%;
    }
    100% {
      background-position: 0% 50%;
    }
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

  .youtube-iframe:not([src]) + .youtube-error-message {
    display: block; /* Affiche le message d'erreur si l'iframe est masqué */
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
    display: none; /* Masqué par défaut */
  }

  /* Styles pour les vidéos YouTube */
  .youtube-thumbnail {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .play-button-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .play-button-overlay:hover {
    opacity: 1;
  }

  .play-button-overlay i {
    font-size: 2em;
    color: #fff;
  }

  /* Styles pour le bouton de lecture YouTube */
  .pulse-animation {
    animation: pulse 1s infinite;
  }

  @keyframes pulse {
    0%, 100% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.1);
    }
  }

  .audio-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    transition: background-color 0.3s ease;
  }

  .audio-container:hover {
    background-color: #f0f0f0;
  }

  .audio-player {
    width: 100%;
    margin-bottom: 10px;
  }

  .audio-player:hover {
    transform: scale(1.02);
  }

  .audio-controls {
    display: flex;
    justify-content: space-between;
    width: 100%;
  }

  .audio-controls button {
    background: none;
    border: none;
    font-size: 1.5em;
    cursor: pointer;
    transition: color 0.3s ease;
  }

  .audio-controls button:hover {
    color: #4f46e5;
  }

  .audio-controls .play-pause-btn {
    font-size: 2em;
  }

  .audio-controls .time-display {
    font-size: 0.9em;
    color: #6b7280;
  }
</style> 