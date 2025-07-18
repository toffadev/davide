<template>
    <Head>
        <title>DNBEATZ - Actualités</title>
    </Head>

    <MainLayout>
        <!-- Hero Section -->
        <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-900 via-blue-800 to-gray-900">
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl md:text-6xl font-extrabold mb-6 animate__animated animate__fadeIn">Toutes les <span class="gradient-text">Actualités</span></h1>
                <h2 class="text-xl md:text-2xl text-gray-300 mb-10 max-w-3xl mx-auto animate__animated animate__fadeIn animate__delay-1s">Suivez l'actualité de DNBEATZ : productions, sorties, collaborations et plus encore</h2>
                <div class="flex flex-wrap justify-center gap-4 animate__animated animate__fadeInUp animate__delay-1s">
                    <a href="#articles" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-blue-500/30 flex items-center">
                        <i class="fas fa-newspaper mr-2"></i> Derniers articles
                    </a>
                    <a href="#agenda" class="px-8 py-3 bg-purple-600 hover:bg-purple-700 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-purple-500/30 flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i> Agenda
                    </a>
                </div>
            </div>
        </section>

        <!-- Featured Article -->
        <section v-if="featuredActuality" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-900 relative">
            <div class="absolute inset-0 bg-pattern opacity-5"></div>
            <div class="max-w-7xl mx-auto relative z-10">
                <h2 class="text-3xl font-bold mb-12 text-center animate__animated animate__fadeIn">
                    <i class="fas fa-star text-yellow-400 mr-3"></i>Article à la Une
                </h2>
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl overflow-hidden shadow-2xl animate__animated animate__fadeIn animate__delay-1s transform hover:scale-[1.01] transition-all duration-300">
                    <div class="md:flex">
                        <div class="md:w-1/2 relative news-overlay">
                            <img :src="featuredActuality.image" 
                                alt="Featured article" 
                                class="w-full h-full object-cover news-image">
                            <div class="absolute bottom-0 left-0 right-0 p-8 z-10">
                                <span class="bg-blue-600 text-white text-xs px-3 py-1 rounded-full font-medium">À LA UNE</span>
                            </div>
                        </div>
                        <div class="md:w-1/2 p-8 md:p-10">
                            <div class="flex items-center text-sm text-gray-400 mb-4">
                                <span class="flex items-center"><i class="far fa-calendar-alt mr-2"></i>{{ formatDate(featuredActuality.date) }}</span>
                                <span class="read-time"><i class="far fa-clock mr-2"></i>{{ estimateReadingTime(featuredActuality.content) }} min de lecture</span>
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold mb-4 leading-tight">{{ featuredActuality.title }}</h3>
                            <p class="text-gray-300 mb-8 leading-relaxed">{{ truncateText(featuredActuality.content, 250) }}</p>
                            
                            <div class="flex flex-wrap gap-2 mb-8">
                                <span class="px-4 py-1 bg-gray-700 text-gray-200 rounded-full text-xs flex items-center">
                                    <i class="fas fa-tag mr-1"></i> {{ getCategoryLabel(featuredActuality.category) }}
                                </span>
                            </div>
                            
                            <a href="#" class="inline-flex items-center px-8 py-3 bg-blue-600 hover:bg-blue-700 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-blue-500/30">
                                Lire l'article complet <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles Section -->
        <section id="articles" class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-800 to-gray-900 relative">
            <div class="absolute inset-0 bg-pattern opacity-5"></div>
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-16 animate__animated animate__fadeIn">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 flex items-center justify-center">
                        <i class="fas fa-newspaper text-blue-500 mr-3 text-4xl"></i>
                        <span>Dernières Actualités</span>
                    </h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Toute l'actualité récente autour de DNBEATZ : productions, collaborations, projets et événements.</p>
                </div>
                
                <!-- Category filters -->
                <div class="flex flex-wrap justify-center gap-3 mb-16">
                    <button @click="selectedCategory = ''" 
                            class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300"
                            :class="selectedCategory === '' ? 'bg-blue-600 text-white shadow-lg' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'">
                        Tous
                    </button>
                    <button @click="selectedCategory = 'event'" 
                            class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300"
                            :class="selectedCategory === 'event' ? 'bg-green-600 text-white shadow-lg' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'">
                        <i class="fas fa-calendar-day mr-1"></i> Événements
                    </button>
                    <button @click="selectedCategory = 'news'" 
                            class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300"
                            :class="selectedCategory === 'news' ? 'bg-blue-600 text-white shadow-lg' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'">
                        <i class="fas fa-newspaper mr-1"></i> Actualités
                    </button>
                    <button @click="selectedCategory = 'release'" 
                            class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300"
                            :class="selectedCategory === 'release' ? 'bg-indigo-600 text-white shadow-lg' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'">
                        <i class="fas fa-music mr-1"></i> Productions
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Articles dynamiques avec filtres -->
                    <article v-for="(actuality, index) in filteredActualities" :key="actuality.id" 
                             class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-xl overflow-hidden shadow-xl news-card animate__animated animate__fadeIn" 
                             :class="getDelayClass(index)">
                        <div class="relative news-overlay">
                            <img :src="actuality.image" 
                                :alt="actuality.title" 
                                class="w-full h-56 object-cover news-image">
                            <div class="category-badge">
                                <span class="text-white text-xs px-3 py-1 rounded-full font-medium" :class="getCategoryClass(actuality.category)">
                                    {{ getCategoryLabel(actuality.category) }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center text-sm text-gray-400 mb-3">
                                <span class="flex items-center"><i class="far fa-calendar-alt mr-2"></i>{{ formatDate(actuality.date) }}</span>
                                <span class="read-time"><i class="far fa-clock mr-2"></i>{{ estimateReadingTime(actuality.content) }} min</span>
                            </div>
                            <h3 class="font-bold text-xl mb-3 leading-tight line-clamp-2">{{ actuality.title }}</h3>
                            <p class="text-gray-300 text-sm mb-6 leading-relaxed line-clamp-3">{{ truncateText(actuality.content, 120) }}</p>
                            <div class="flex justify-between items-center">
                                <a href="#" class="text-blue-400 hover:text-blue-300 text-sm font-medium flex items-center transition-all duration-300 group">
                                    Lire plus <i class="fas fa-chevron-right ml-1 text-xs group-hover:translate-x-1 transition-transform"></i>
                                </a>
                                <div class="flex items-center text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                
                <div v-if="filteredActualities.length === 0" class="text-center py-16 text-gray-400 bg-gray-800/50 rounded-xl mt-8">
                    <i class="fas fa-search text-5xl mb-4 opacity-50"></i>
                    <p>Aucun article trouvé dans cette catégorie.</p>
                </div>
            </div>
        </section>

        <!-- Agenda Section -->
        <section id="agenda" class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900 to-gray-800 relative">
            <div class="absolute inset-0 bg-pattern-2 opacity-5"></div>
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-16 animate__animated animate__fadeIn">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-purple-500 mr-3 text-4xl"></i>
                        <span>Agenda des Événements</span>
                    </h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Retrouvez toutes les dates à venir : sessions studio, masterclass, collaborations...</p>
                </div>
                
                <!-- Month selector -->
                <div class="flex flex-wrap justify-center gap-3 mb-16">
                    <button @click="selectedMonth = ''" 
                            class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300"
                            :class="selectedMonth === '' ? 'bg-purple-600 text-white shadow-lg' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'">
                        Tous les mois
                    </button>
                    <button v-for="(month, index) in availableMonths" :key="index"
                            @click="selectedMonth = month" 
                            class="px-6 py-2 rounded-full text-sm font-medium transition-all duration-300"
                            :class="selectedMonth === month ? 'bg-purple-600 text-white shadow-lg' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'">
                        {{ getMonthName(month) }}
                    </button>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Events dynamiques avec filtres -->
                    <div v-for="(event, index) in filteredEvents" :key="event.id" 
                         class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 shadow-xl flex animate__animated animate__fadeIn hover:shadow-2xl hover:shadow-purple-500/10 transition-all duration-300 transform hover:translate-y-[-2px]" 
                         :class="getDelayClass(index)">
                        <div class="flex-shrink-0 mr-6 text-center">
                            <div class="text-white rounded-lg py-3 px-5 shadow-lg" :class="getEventColorClass(index)">
                                <div class="text-3xl font-bold">{{ formatEventDay(event.event_date) }}</div>
                                <div class="text-sm font-medium">{{ formatEventMonth(event.event_date) }}</div>
                            </div>
                            <div class="mt-3 text-sm text-gray-400 font-medium">{{ formatEventTime(event.event_date) }}</div>
                        </div>
                        <div class="flex-grow">
                            <h3 class="text-xl font-bold mb-3 leading-tight">{{ event.title }}</h3>
                            <p class="text-gray-300 mb-4 leading-relaxed">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                                {{ event.city }}, {{ event.country }} - {{ event.description }}
                            </p>
                            <div class="flex flex-wrap gap-2 mb-5">
                                <span v-if="event.is_sold_out" class="px-3 py-1 bg-red-700 text-gray-200 rounded-full text-xs flex items-center font-medium">
                                    <i class="fas fa-ticket-alt mr-1"></i> COMPLET
                                </span>
                                <span class="px-3 py-1 bg-gray-700 text-gray-200 rounded-full text-xs flex items-center font-medium">
                                    <i class="fas fa-city mr-1"></i> {{ event.city }}
                                </span>
                            </div>
                            <div class="mt-4">
                                <a v-if="event.ticket_link" 
                                   :href="event.ticket_link" 
                                   target="_blank" 
                                   rel="noopener" 
                                   class="inline-block px-6 py-2 bg-purple-600 hover:bg-purple-700 rounded-full text-sm font-medium transition-all duration-300 text-white text-center shadow-md hover:shadow-purple-500/30">
                                    <i class="fas fa-ticket-alt mr-2"></i> Réserver
                                </a>
                                <span v-else class="inline-block px-6 py-2 bg-gray-600 rounded-full text-sm font-medium text-center text-gray-300 cursor-not-allowed">
                                    Bientôt disponible
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div v-if="filteredEvents.length === 0" class="text-center py-16 text-gray-400 bg-gray-800/50 rounded-xl mt-8">
                    <i class="fas fa-calendar-times text-5xl mb-4 opacity-50"></i>
                    <p>Aucun événement prévu pour cette période.</p>
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <!-- <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-800 to-gray-900">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 animate__animated animate__fadeIn">Restez <span class="gradient-text">informés</span></h2>
                <p class="text-gray-400 mb-8 animate__animated animate__fadeIn animate__delay-1s">Abonnez-vous à notre newsletter pour recevoir toutes les actualités de DNBEATZ directement dans votre boîte mail.</p>
                
                <form @submit.prevent="subscribeNewsletter" class="animate__animated animate__fadeIn animate__delay-2s">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <input v-model="newsletter.email" type="email" placeholder="Votre adresse email" 
                               class="flex-grow px-6 py-4 bg-gray-700 border border-gray-600 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                        <button type="submit" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 rounded-full font-bold transition-all duration-300 shadow-lg hover:shadow-blue-500/30">
                            <i class="fas fa-paper-plane mr-2"></i> S'abonner
                        </button>
                    </div>
                    <p class="text-gray-500 text-xs mt-3">Nous ne partagerons jamais votre email avec des tiers.</p>
                </form>
            </div>
        </section> -->
    </MainLayout>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '../../Client/Layouts/MainLayout.vue';
import { ref, computed } from 'vue';

// Receiving props from Inertia controller
const props = defineProps({
    featuredActuality: Object,
    actualities: Array,
    upcomingEvents: Array
});

// State variables for filters
const selectedCategory = ref('');
const selectedMonth = ref('');
const newsletter = ref({ email: '' });

// Format date to French locale
const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
};

// Format event date parts
const formatEventDay = (dateString) => {
    const date = new Date(dateString);
    return date.getDate();
};

const formatEventMonth = (dateString) => {
    const date = new Date(dateString);
    const months = ['JAN', 'FEV', 'MAR', 'AVR', 'MAI', 'JUIN', 'JUIL', 'AOÛT', 'SEPT', 'OCT', 'NOV', 'DEC'];
    return months[date.getMonth()];
};

const formatEventTime = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleTimeString('fr-FR', {
        hour: '2-digit',
        minute: '2-digit'
    });
};

// Get month name from month number
const getMonthName = (monthStr) => {
    const monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 
                        'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    const [year, month] = monthStr.split('-');
    return `${monthNames[parseInt(month) - 1]} ${year}`;
};

// Estimate reading time based on content length
const estimateReadingTime = (content) => {
    if (!content) return 1;
    // Average reading speed: 200 words per minute
    const words = content.split(/\s+/).length;
    return Math.max(1, Math.ceil(words / 200));
};

// Truncate text for previews
const truncateText = (text, maxLength) => {
    if (!text) return '';
    if (text.length <= maxLength) return text;
    return text.substring(0, maxLength) + '...';
};

// Get category label
const getCategoryLabel = (category) => {
    const labels = {
        'event': 'Événement',
        'news': 'Actualité',
        'release': 'Production'
    };
    return labels[category] || 'Actualité';
};

// Get category CSS class
const getCategoryClass = (category) => {
    const classes = {
        'event': 'bg-green-600',
        'news': 'bg-blue-600',
        'release': 'bg-indigo-600'
    };
    return classes[category] || 'bg-blue-600';
};

// Get event color class based on index
const getEventColorClass = (index) => {
    const colors = ['bg-purple-600', 'bg-blue-600', 'bg-green-600', 'bg-red-600', 'bg-yellow-600', 'bg-pink-600'];
    return colors[index % colors.length];
};

// Get event text color class
const getEventColorTextClass = (index) => {
    const colors = ['text-purple-400 hover:text-purple-300', 'text-blue-400 hover:text-blue-300', 
                   'text-green-400 hover:text-green-300', 'text-red-400 hover:text-red-300', 
                   'text-yellow-400 hover:text-yellow-300', 'text-pink-400 hover:text-pink-300'];
    return colors[index % colors.length];
};

// Get animation delay class
const getDelayClass = (index) => {
    const delays = ['animate__delay-1s', 'animate__delay-2s', 'animate__delay-3s'];
    return delays[index % delays.length];
};

// Filter actualities by category
const filteredActualities = computed(() => {
    if (!selectedCategory.value) return props.actualities;
    return props.actualities.filter(actuality => actuality.category === selectedCategory.value);
});

// Get available months from events
const availableMonths = computed(() => {
    if (!props.upcomingEvents || props.upcomingEvents.length === 0) return [];
    
    const months = new Set();
    props.upcomingEvents.forEach(event => {
        const date = new Date(event.event_date);
        const monthStr = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
        months.add(monthStr);
    });
    
    return Array.from(months).sort();
});

// Filter events by month
const filteredEvents = computed(() => {
    if (!selectedMonth.value) return props.upcomingEvents;
    
    return props.upcomingEvents.filter(event => {
        const date = new Date(event.event_date);
        const eventMonth = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
        return eventMonth === selectedMonth.value;
    });
});

// Handle newsletter subscription
const subscribeNewsletter = () => {
    // Implementation would go here
    alert(`Merci de vous être abonné avec l'email: ${newsletter.value.email}`);
    newsletter.value.email = '';
};
</script>
<style scoped>
.gradient-text {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: 0 2px 15px rgba(59, 130, 246, 0.15);
}

.news-card {
    transition: all 0.3s ease;
    transform-style: preserve-3d;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
    border-color: rgba(255, 255, 255, 0.1);
}

.category-badge {
    position: absolute;
    top: 16px;
    right: 16px;
    z-index: 10;
}

.news-image {
    height: 200px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.news-card:hover .news-image {
    transform: scale(1.05);
}

.news-overlay {
    position: relative;
    overflow: hidden;
}

.news-overlay::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 50%);
}

.read-time::before {
    content: '•';
    margin: 0 6px;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.bg-pattern {
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.bg-pattern-2 {
    background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'%3E%3Ccircle cx='3' cy='3' r='3'/%3E%3Ccircle cx='13' cy='13' r='3'/%3E%3C/g%3E%3C/svg%3E");
}

/* Ajoutez ces classes pour les animations */
@import 'animate.css';
</style>