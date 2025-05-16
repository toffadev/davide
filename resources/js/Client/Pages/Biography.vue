<template>
    <Head>
        <title>Axel Merryl - Biographie</title>
    </Head>

    <MainLayout>
            <!-- Hero Section -->
        <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-purple-900 to-gray-900">
            <div class="max-w-7xl mx-auto text-center animate-fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">La <span class="gradient-text">Biographie</span></h1>
                <h2 class="text-xl md:text-2xl text-gray-300 mb-6">Parcours d'un artiste aux multiples talents</h2>
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
                        <img src="/assets/images/axel.jpeg" 
                            alt="Axel Merryl" 
                            class="w-full rounded-xl shadow-2xl">
                    </div>
                    <div class="md:w-1/2">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">Qui est <span class="gradient-text">Axel Merryl</span> ?</h2>
                        <p class="text-gray-300 mb-6 text-lg leading-relaxed">
                            Axel Merryl Sofonnou, plus connu sous le nom d'Axel Merryl, est un comédien, vidéaste, chanteur et compositeur 
                            béninois qui s'est imposé comme une figure incontournable de la scène artistique africaine et francophone.
                            Son humour distinctif, marqué par son accent caractéristique, lui a permis de conquérir un large public.
                        </p>
                        <p class="text-gray-300 mb-6 text-lg leading-relaxed">
                            Né le 1er juillet 1996 au Bénin, Axel s'est fait connaître grâce à ses vidéos comiques publiées sur YouTube depuis 2014.
                            Ses parodies des habitudes africaines et ses sketches sur la vie quotidienne ont séduit les internautes, 
                            lui permettant d'atteindre plus de 1,32 million d'abonnés en décembre 2023.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center">
                                <div class="bg-purple-600 p-2 rounded-full mr-3">
                                    <i class="fas fa-theater-masks text-white"></i>
                                </div>
                                <span>Humoriste</span>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-blue-600 p-2 rounded-full mr-3">
                                    <i class="fas fa-music text-white"></i>
                                </div>
                                <span>Musicien</span>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-pink-600 p-2 rounded-full mr-3">
                                    <i class="fas fa-film text-white"></i>
                                </div>
                                <span>Vidéaste</span>
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
                    <p class="text-gray-400 max-w-2xl mx-auto">Les étapes clés qui ont marqué la carrière d'Axel Merryl</p>
                </div>
                
                <div class="relative timeline pl-8 md:pl-16">
                    <!-- Timeline Item 1 -->
                    <div class="relative timeline-item mb-12 animate-fade-in delay-1">
                        <div class="bg-gray-700 rounded-xl p-6 md:p-8 shadow-lg">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <h3 class="text-xl md:text-2xl font-bold text-purple-400">Les débuts à Dakar</h3>
                                <span class="bg-purple-900 text-purple-200 px-3 py-1 rounded-full text-sm mt-2 md:mt-0">2014 - 2015</span>
                            </div>
                            <p class="text-gray-300 mb-4">
                                Axel commence sa carrière de YouTubeur à Dakar au Sénégal où il poursuit ses études en télécommunications 
                                en cycle de master à l'ESMT. Aux côtés de Josué (Jojo Le Comédien), il publie ses premières vidéos comiques.
                                La vidéo "Si les films chinois étaient tournés en Afrique", sortie en juin 2015, leur permet d'acquérir 
                                une notoriété significative sur la toile.
                            </p>
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1547036965-6aad1d0d6e4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" 
                                        alt="Débuts sur YouTube" 
                                        class="w-full">
                                    <div class="polaroid-caption">Premiers contenus (2014)</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1571772996211-0d6dd0179c4b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" 
                                        alt="Collaboration avec Jojo" 
                                        class="w-full">
                                    <div class="polaroid-caption">Collaboration avec Jojo (2015)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline Item 2 -->
                    <div class="relative timeline-item mb-12 animate-fade-in delay-2">
                        <div class="bg-gray-700 rounded-xl p-6 md:p-8 shadow-lg">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <h3 class="text-xl md:text-2xl font-bold text-blue-400">Percée sur les réseaux sociaux</h3>
                                <span class="bg-blue-900 text-blue-200 px-3 py-1 rounded-full text-sm mt-2 md:mt-0">2016 - 2017</span>
                            </div>
                            <p class="text-gray-300 mb-4">
                                Présenté comme l'ambassadeur de l'humour au Bénin, Axel décide d'évoluer en solo. Il commence à publier 
                                des vidéos sur Facebook avant de migrer sur YouTube où sa chaîne atteint les cent mille abonnés en 2017.
                                Il s'exprime en français et en Fon (langue locale du Bénin), une combinaison qui lui permet de valoriser sa culture.
                                Cette période est aussi marquée par ses premières parodies musicales comme "Fanta" (parodie de "Panda" de Desiigner).
                            </p>
                            <div class="grid grid-cols-3 gap-4 mt-6">
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1551818255-e6e10975bc17?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                        alt="Croissance YouTube" 
                                        class="w-full">
                                    <div class="polaroid-caption">100K abonnés (2017)</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                        alt="Parodies musicales" 
                                        class="w-full">
                                    <div class="polaroid-caption">Parodies musicales</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                                        alt="Spectacles" 
                                        class="w-full">
                                    <div class="polaroid-caption">Like and Share (2017)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline Item 3 -->
                    <div class="relative timeline-item mb-12 animate-fade-in delay-3">
                        <div class="bg-gray-700 rounded-xl p-6 md:p-8 shadow-lg">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <h3 class="text-xl md:text-2xl font-bold text-pink-400">Reconnaissance internationale</h3>
                                <span class="bg-pink-900 text-pink-200 px-3 py-1 rounded-full text-sm mt-2 md:mt-0">2018 - 2019</span>
                            </div>
                            <p class="text-gray-300 mb-4">
                                La notoriété d'Axel Merryl dépasse les frontières africaines. Ses vidéos sont partagées par des célébrités 
                                internationales comme le rappeur français Booba, le producteur nigérian Don Jazzy et le rappeur Fababy. 
                                Il participe au "Parlement du rire" en 2019 et reçoit son premier prix YouTube. Ses parodies comme 
                                "This is Africa" (parodie de "This is America" de Childish Gambino) connaissent un grand succès.
                            </p>
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                        alt="Reconnaissance internationale" 
                                        class="w-full">
                                    <div class="polaroid-caption">Prix YouTube (2019)</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1514525253161-7a3d1f68d212?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                        alt="Parodies à succès" 
                                        class="w-full">
                                    <div class="polaroid-caption">This is Africa (2018)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timeline Item 4 -->
                    <div class="relative timeline-item animate-fade-in delay-1">
                        <div class="bg-gray-700 rounded-xl p-6 md:p-8 shadow-lg">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <h3 class="text-xl md:text-2xl font-bold text-yellow-400">Consécration artistique</h3>
                                <span class="bg-yellow-900 text-yellow-200 px-3 py-1 rounded-full text-sm mt-2 md:mt-0">2020 - Aujourd'hui</span>
                            </div>
                            <p class="text-gray-300 mb-4">
                                Axel Merryl diversifie son art en se lançant plus sérieusement dans la musique. Il sort plusieurs singles comme 
                                "Michael Jackson" (2019), "Ma première fois" avec Rijade (2022) et "Kimi" avec Kimi Makosso (2023). 
                                En 2024, il publie son album "Température" composé de 14 chansons avec de nombreuses collaborations artistiques.
                                Il reçoit également un second prix YouTube pour avoir dépassé le million d'abonnés en 2023.
                            </p>
                            <div class="grid grid-cols-3 gap-4 mt-6">
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                                        alt="Prix YouTube" 
                                        class="w-full">
                                    <div class="polaroid-caption">1M+ abonnés (2023)</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" 
                                        alt="Album Température" 
                                        class="w-full">
                                    <div class="polaroid-caption">Album Température (2024)</div>
                                </div>
                                <div class="polaroid">
                                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" 
                                        alt="Collaborations" 
                                        class="w-full">
                                    <div class="polaroid-caption">Collaborations musicales</div>
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
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Axel Merryl <span class="gradient-text">en chiffres</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Quelques statistiques qui résument une carrière exceptionnelle</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Stat 1 -->
                    <div class="stat-card rounded-xl p-8 text-center animate-fade-in delay-1">
                        <div class="text-5xl font-bold text-blue-400 mb-3">10+</div>
                        <h3 class="text-xl font-semibold mb-2">Années de carrière</h3>
                        <p class="text-gray-400">Depuis ses débuts en 2014 jusqu'à aujourd'hui</p>
                        <div class="mt-4">
                            <i class="fas fa-history text-blue-400 text-3xl"></i>
                        </div>
                    </div>
                    
                    <!-- Stat 2 -->
                    <div class="stat-card rounded-xl p-8 text-center animate-fade-in delay-2">
                        <div class="text-5xl font-bold text-purple-400 mb-3">100+</div>
                        <h3 class="text-xl font-semibold mb-2">Vidéos publiées</h3>
                        <p class="text-gray-400">Sketches, parodies et collaborations</p>
                        <div class="mt-4">
                            <i class="fas fa-video text-purple-400 text-3xl"></i>
                        </div>
                    </div>
                    
                    <!-- Stat 3 -->
                    <div class="stat-card rounded-xl p-8 text-center animate-fade-in delay-3">
                        <div class="text-5xl font-bold text-pink-400 mb-3">1.32M+</div>
                        <h3 class="text-xl font-semibold mb-2">Abonnés YouTube</h3>
                        <p class="text-gray-400">En décembre 2023</p>
                        <div class="mt-4">
                            <i class="fas fa-users text-pink-400 text-3xl"></i>
                        </div>
                    </div>
                    
                    <!-- Stat 4 -->
                    <div class="stat-card rounded-xl p-8 text-center animate-fade-in delay-1">
                        <div class="text-5xl font-bold text-yellow-400 mb-3">14</div>
                        <h3 class="text-xl font-semibold mb-2">Titres dans son album</h3>
                        <p class="text-gray-400">"Température" sorti en 2024</p>
                        <div class="mt-4">
                            <i class="fas fa-music text-yellow-400 text-3xl"></i>
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
                        <h3 class="text-xl font-bold mb-3">Valorisation culturelle</h3>
                        <p class="text-gray-300">
                            "J'aime mélanger le français et le Fon dans mes vidéos pour valoriser ma culture béninoise.
                            L'humour est un excellent moyen de partager nos traditions et de faire découvrir notre richesse culturelle au monde."
                        </p>
                    </div>
                    
                    <!-- Philosophy 2 -->
                    <div class="bg-gray-700 rounded-xl p-8 animate-fade-in delay-2">
                        <div class="text-purple-400 text-4xl mb-4">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Créativité sans limites</h3>
                        <p class="text-gray-300">
                            "Je ne veux pas me limiter à un seul domaine artistique. Comédie, musique, vidéo... 
                            Ces disciplines se nourrissent mutuellement et me permettent d'exprimer ma créativité sous différentes formes."
                        </p>
                    </div>
                    
                    <!-- Philosophy 3 -->
                    <div class="bg-gray-700 rounded-xl p-8 animate-fade-in delay-3">
                        <div class="text-pink-400 text-4xl mb-4">
                            <i class="fas fa-globe-africa"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Ambassadeur de l'humour</h3>
                        <p class="text-gray-300">
                            "En tant qu'ambassadeur de l'humour béninois, je souhaite montrer que l'Afrique est une terre de talents.
                            Notre accent, nos expressions, nos particularités culturelles sont une richesse à partager avec le monde entier."
                        </p>
                    </div>
                </div>
                
                <div class="mt-16 text-center animate-fade-in">
                    <a href="actualites.html" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 rounded-full font-medium transition shadow-lg">
                        <i class="fas fa-newspaper mr-2"></i> Voir ses actualités
                    </a>
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