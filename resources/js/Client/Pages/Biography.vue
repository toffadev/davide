<template>
    <Head>
        <title>DNBEATZ - Biographie</title>
    </Head>

    <MainLayout>
            <!-- Hero Section -->
        <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-purple-900 to-gray-900">
            <div class="max-w-7xl mx-auto text-center animate-fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">La <span class="gradient-text">Biographie</span></h1>
                <h2 class="text-xl md:text-2xl text-gray-300 mb-6">Parcours d'un beatmaker aux multiples talents</h2>
                <div class="flex justify-center space-x-4">
                    <a href="#histoire" class="px-6 py-3 bg-purple-600 hover:bg-purple-700 rounded-full font-medium transition shadow-lg flex items-center">
                        <i class="fas fa-book-open mr-2"></i> Son histoire
                    </a>
                    <a href="#chiffres" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-full font-medium transition shadow-lg flex items-center">
                        <i class="fas fa-chart-bar mr-2"></i> En chiffres
                    </a>
                </div>
            </div>
        </section>

        <!-- Introduction -->
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900">
            <div class="max-w-7xl mx-auto">
                <div class="md:flex items-center animate-fade-in delay-1">
                    <div class="md:w-1/2 mb-10 md:mb-0 md:pr-10">
                        <img src="/assets/images/davide.jpg" 
                            alt="DNBEATZ" 
                            class="w-full rounded-xl shadow-2xl">
                    </div>
                    <div class="md:w-1/2">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">Qui est <span class="gradient-text">DNBEATZ</span> ?</h2>
                        <p class="text-gray-300 mb-6 text-lg leading-relaxed">
                            Davide, plus connu sous le nom de DNBEATZ, est un producteur, beatmaker et ingénieur du son 
                            béninois qui s'est imposé comme une figure incontournable de la scène musicale africaine et francophone.
                            Son style distinctif, marqué par des sonorités uniques, lui a permis de collaborer avec de nombreux artistes.
                        </p>
                        <p class="text-gray-300 mb-6 text-lg leading-relaxed">
                            Né au Bénin, Davide s'est fait connaître grâce à ses productions musicales et ses collaborations avec des artistes comme Axel Meryl.
                            Ses beats mêlant influences africaines et sonorités modernes ont séduit les auditeurs,
                            lui permettant de développer une clientèle internationale.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center">
                                <div class="bg-purple-600 p-2 rounded-full mr-3">
                                    <i class="fas fa-music text-white"></i>
                                </div>
                                <span>Beatmaker</span>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-blue-600 p-2 rounded-full mr-3">
                                    <i class="fas fa-sliders-h text-white"></i>
                                </div>
                                <span>Producteur</span>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-pink-600 p-2 rounded-full mr-3">
                                    <i class="fas fa-headphones text-white"></i>
                                </div>
                                <span>Ingénieur du son</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timeline Section -->
        <section id="histoire" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16 animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Parcours <span class="gradient-text">Artistique</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Les étapes clés qui ont marqué la carrière de DNBEATZ</p>
                </div>
                
                <div class="relative timeline pl-8 md:pl-16">
                    <!-- Timeline Item 1 -->
                    <div class="relative timeline-item mb-12 animate-fade-in delay-1">
                        <div class="bg-gray-700 rounded-xl p-6 md:p-8 shadow-lg">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <h3 class="text-xl md:text-2xl font-bold text-purple-400">Les débuts</h3>
                                <span class="bg-purple-900 text-purple-200 px-3 py-1 rounded-full text-sm mt-2 md:mt-0">2015 - 2017</span>
                            </div>
                            <p class="text-gray-300 mb-4">
                                Davide commence sa carrière de beatmaker en autodidacte, apprenant à utiliser les logiciels de production musicale.
                                Il crée ses premiers beats et commence à collaborer avec des artistes locaux.
                                Sa passion pour les sonorités africaines mélangées aux tendances internationales lui permet de se démarquer rapidement.
                            </p>
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1547036965-6aad1d0d6e4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" 
                                        alt="Premiers beats" 
                                        class="w-full">
                                    <div class="polaroid-caption">Premiers beats (2015)</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1571772996211-0d6dd0179c4b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" 
                                        alt="Collaboration avec artistes locaux" 
                                        class="w-full">
                                    <div class="polaroid-caption">Premières collaborations (2016)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline Item 2 -->
                    <div class="relative timeline-item mb-12 animate-fade-in delay-2">
                        <div class="bg-gray-700 rounded-xl p-6 md:p-8 shadow-lg">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <h3 class="text-xl md:text-2xl font-bold text-blue-400">Percée sur la scène musicale</h3>
                                <span class="bg-blue-900 text-blue-200 px-3 py-1 rounded-full text-sm mt-2 md:mt-0">2018 - 2019</span>
                            </div>
                            <p class="text-gray-300 mb-4">
                                DNBEATZ commence à se faire un nom dans l'industrie musicale béninoise. Il produit plusieurs morceaux
                                qui connaissent un succès local. Sa collaboration avec Axel Meryl marque un tournant dans sa carrière,
                                lui permettant d'atteindre un public plus large. Il perfectionne ses compétences en mixage et mastering,
                                devenant un producteur complet.
                            </p>
                            <div class="grid grid-cols-3 gap-4 mt-6">
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1551818255-e6e10975bc17?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                        alt="Studio d'enregistrement" 
                                        class="w-full">
                                    <div class="polaroid-caption">Premier studio (2018)</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                        alt="Productions musicales" 
                                        class="w-full">
                                    <div class="polaroid-caption">Premières productions à succès</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                                        alt="Collaboration" 
                                        class="w-full">
                                    <div class="polaroid-caption">Collaboration avec Axel Meryl (2019)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline Item 3 -->
                    <div class="relative timeline-item mb-12 animate-fade-in delay-3">
                        <div class="bg-gray-700 rounded-xl p-6 md:p-8 shadow-lg">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <h3 class="text-xl md:text-2xl font-bold text-pink-400">Reconnaissance internationale</h3>
                                <span class="bg-pink-900 text-pink-200 px-3 py-1 rounded-full text-sm mt-2 md:mt-0">2020 - 2022</span>
                            </div>
                            <p class="text-gray-300 mb-4">
                                La notoriété de DNBEATZ dépasse les frontières africaines. Ses productions sont utilisées par des artistes
                                de différents pays. Il lance sa propre plateforme de vente de beats en ligne, permettant aux artistes du monde entier
                                d'accéder à ses créations. Sa signature sonore unique, mêlant influences africaines et sonorités modernes,
                                lui vaut une reconnaissance internationale.
                            </p>
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                        alt="Reconnaissance internationale" 
                                        class="w-full">
                                    <div class="polaroid-caption">Collaborations internationales (2021)</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1514525253161-7a3d1f68d212?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                        alt="Plateforme de beats" 
                                        class="w-full">
                                    <div class="polaroid-caption">Lancement de la plateforme (2022)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline Item 4 -->
                    <div class="relative timeline-item animate-fade-in delay-1">
                        <div class="bg-gray-700 rounded-xl p-6 md:p-8 shadow-lg">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <h3 class="text-xl md:text-2xl font-bold text-yellow-400">Consécration artistique</h3>
                                <span class="bg-yellow-900 text-yellow-200 px-3 py-1 rounded-full text-sm mt-2 md:mt-0">2023 - Aujourd'hui</span>
                            </div>
                            <p class="text-gray-300 mb-4">
                                DNBEATZ diversifie ses activités en créant son propre label de production. Il accompagne désormais de jeunes talents
                                dans leur parcours musical. Il continue de produire des beats pour des artistes établis tout en développant
                                sa propre identité sonore. Son studio professionnel lui permet d'offrir des services complets de production,
                                mixage et mastering.
                            </p>
                            <div class="grid grid-cols-3 gap-4 mt-6">
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                        alt="Studio professionnel" 
                                        class="w-full">
                                    <div class="polaroid-caption">Studio professionnel (2023)</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" 
                                        alt="Label de production" 
                                        class="w-full">
                                    <div class="polaroid-caption">Création du label (2023)</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" 
                                        alt="Mentorat" 
                                        class="w-full">
                                    <div class="polaroid-caption">Mentorat de jeunes talents</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section id="chiffres" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16 animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">DNBEATZ <span class="gradient-text">en chiffres</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Quelques statistiques qui résument une carrière exceptionnelle</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Stat 1 -->
                    <div class="stat-card rounded-xl p-8 text-center animate-fade-in delay-1">
                        <div class="text-5xl font-bold text-blue-400 mb-3">8+</div>
                        <h3 class="text-xl font-semibold mb-2">Années d'expérience</h3>
                        <p class="text-gray-400">Depuis ses débuts en 2015 jusqu'à aujourd'hui</p>
                        <div class="mt-4">
                            <i class="fas fa-history text-blue-400 text-3xl"></i>
                        </div>
                    </div>
                    
                    <!-- Stat 2 -->
                    <div class="stat-card rounded-xl p-8 text-center animate-fade-in delay-2">
                        <div class="text-5xl font-bold text-purple-400 mb-3">200+</div>
                        <h3 class="text-xl font-semibold mb-2">Beats produits</h3>
                        <p class="text-gray-400">Productions originales et collaborations</p>
                        <div class="mt-4">
                            <i class="fas fa-music text-purple-400 text-3xl"></i>
                        </div>
                    </div>
                    
                    <!-- Stat 3 -->
                    <div class="stat-card rounded-xl p-8 text-center animate-fade-in delay-3">
                        <div class="text-5xl font-bold text-pink-400 mb-3">50+</div>
                        <h3 class="text-xl font-semibold mb-2">Artistes collaborateurs</h3>
                        <p class="text-gray-400">Artistes ayant utilisé ses productions</p>
                        <div class="mt-4">
                            <i class="fas fa-users text-pink-400 text-3xl"></i>
                        </div>
                    </div>
                    
                    <!-- Stat 4 -->
                    <div class="stat-card rounded-xl p-8 text-center animate-fade-in delay-1">
                        <div class="text-5xl font-bold text-yellow-400 mb-3">10+</div>
                        <h3 class="text-xl font-semibold mb-2">Hits produits</h3>
                        <p class="text-gray-400">Productions ayant connu un succès majeur</p>
                        <div class="mt-4">
                            <i class="fas fa-chart-line text-yellow-400 text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Philosophy Section -->
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16 animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Sa <span class="gradient-text">Philosophie</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Les valeurs et convictions qui guident son travail</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Philosophy 1 -->
                    <div class="bg-gray-700 rounded-xl p-8 animate-fade-in delay-1">
                        <div class="text-blue-400 text-4xl mb-4">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Authenticité culturelle</h3>
                        <p class="text-gray-300">
                            "J'aime intégrer des sonorités africaines dans mes productions pour valoriser notre culture béninoise.
                            La musique est un excellent moyen de partager nos traditions et de faire découvrir notre richesse culturelle au monde."
                        </p>
                    </div>
                    
                    <!-- Philosophy 2 -->
                    <div class="bg-gray-700 rounded-xl p-8 animate-fade-in delay-2">
                        <div class="text-purple-400 text-4xl mb-4">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Innovation sonore</h3>
                        <p class="text-gray-300">
                            "Je ne veux pas me limiter à un seul style musical. Afrobeat, hip-hop, R&B... 
                            Ces genres se nourrissent mutuellement et me permettent d'exprimer ma créativité sous différentes formes."
                        </p>
                    </div>
                    
                    <!-- Philosophy 3 -->
                    <div class="bg-gray-700 rounded-xl p-8 animate-fade-in delay-3">
                        <div class="text-pink-400 text-4xl mb-4">
                            <i class="fas fa-globe-africa"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Transmission du savoir</h3>
                        <p class="text-gray-300">
                            "En tant que producteur béninois, je souhaite partager mon expérience avec la nouvelle génération.
                            Notre musique, nos techniques, notre créativité sont une richesse à transmettre pour faire grandir la scène musicale africaine."
                        </p>
                    </div>
                </div>
                

            </div>
        </section>
    </MainLayout>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';
import MainLayout from '../../Client/Layouts/MainLayout.vue';
</script>
<style scoped>
.gradient-text {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -38px;
    top: 0;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #8b5cf6;
    border: 3px solid #3b82f6;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 7px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
}

.polaroid {
    background: white;
    padding: 15px 15px 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    transform: rotate(2deg);
    transition: all 0.3s ease;
}

.polaroid:hover {
    transform: rotate(0deg) scale(1.05);
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.polaroid-caption {
    text-align: center;
    margin-top: 15px;
    color: #333;
    font-family: 'Courier New', monospace;
    font-size: 0.9rem;
}

.stat-card {
    transition: all 0.3s ease;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(139, 92, 246, 0.1));
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}
</style>