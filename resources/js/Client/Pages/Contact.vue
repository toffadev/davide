<template>
    <Head>
        <title>Axel Meryl - Contact</title>
    </Head>

    <MainLayout>
        <!-- Hero Section -->
        <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-900 to-gray-900">
            <div class="max-w-7xl mx-auto text-center animate-fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Contactez <span class="gradient-text">Axel Meryl</span></h1>
                <h2 class="text-xl md:text-2xl text-gray-300 mb-6">Une question sur les spectacles ? Une proposition de collaboration ? N'hésitez pas à nous contacter !</h2>
            </div>
        </section>

        <!-- Contact Cards Section -->
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="bg-gray-700 rounded-2xl shadow-2xl overflow-hidden animate-fade-in">
                    <div class="p-8 md:p-12">
                        <div class="text-center mb-10">
                            <h2 class="text-3xl font-bold text-white mb-4">Comment pouvons-nous vous aider ?</h2>
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
                        
                        <!-- Business Hours Section -->
                        <div class="mt-16">
                            <div class="flex items-center justify-center mb-6">
                                <div class="h-0.5 bg-gray-600 flex-1"></div>
                                <h3 class="text-xl font-bold text-white px-4">Horaires du Bureau</h3>
                                <div class="h-0.5 bg-gray-600 flex-1"></div>
                            </div>
                            
                            <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex justify-between p-3 border-b border-gray-700">
                                        <span class="font-medium text-gray-300">Lundi - Vendredi</span>
                                        <span class="text-blue-400">10h00 - 18h00</span>
                                    </div>
                                    <div class="flex justify-between p-3 border-b border-gray-700">
                                        <span class="font-medium text-gray-300">Samedi</span>
                                        <span class="text-blue-400">Sur rendez-vous</span>
                                    </div>
                                    <div class="flex justify-between p-3 border-b border-gray-700 md:border-b-0">
                                        <span class="font-medium text-gray-300">Dimanche</span>
                                        <span class="text-red-400">Fermé</span>
                                    </div>
                                    <div class="flex justify-between p-3">
                                        <span class="font-medium text-gray-300">Jours fériés</span>
                                        <span class="text-red-400">Fermé</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Management Section -->
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12 animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Collaboration <span class="gradient-text">Professionnelle</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Pour les demandes professionnelles, merci de contacter directement l'agence qui représente Axel Meryl.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Booking Card -->
                    <div class="bg-gray-800 rounded-xl p-8 shadow-xl animate-fade-in delay-1 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-b from-blue-500/20 to-transparent rounded-bl-full"></div>
                        <h3 class="text-2xl font-bold text-white mb-4 flex items-center">
                            <i class="fas fa-ticket-alt text-blue-500 mr-3"></i>
                            Réservations &amp; Booking
                        </h3>
                        <p class="text-gray-300 mb-6">Pour toute demande de spectacle, réservation ou information sur les tournées en cours.</p>
                        
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <i class="fas fa-user-tie mt-1 text-blue-400 mr-3"></i>
                                <div>
                                    <p class="font-semibold text-white">Sophie Martin</p>
                                    <p class="text-gray-400">Responsable booking</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-envelope mt-1 text-blue-400 mr-3"></i>
                                <p class="text-gray-300">booking@axelmeryl.com</p>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-phone-alt mt-1 text-blue-400 mr-3"></i>
                                <p class="text-gray-300">+33 1 23 45 67 89</p>
                            </div>
                        </div>
                    </div>

                    <!-- Press & Media Card -->
                    <div class="bg-gray-800 rounded-xl p-8 shadow-xl animate-fade-in delay-2 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-b from-purple-500/20 to-transparent rounded-bl-full"></div>
                        <h3 class="text-2xl font-bold text-white mb-4 flex items-center">
                            <i class="fas fa-newspaper text-purple-500 mr-3"></i>
                            Presse &amp; Médias
                        </h3>
                        <p class="text-gray-300 mb-6">Pour les demandes d'interviews, de photos ou tout autre contact médias.</p>
                        
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <i class="fas fa-user-tie mt-1 text-purple-400 mr-3"></i>
                                <div>
                                    <p class="font-semibold text-white">Jean Dubois</p>
                                    <p class="text-gray-400">Attaché de presse</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-envelope mt-1 text-purple-400 mr-3"></i>
                                <p class="text-gray-300">presse@axelmeryl.com</p>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-phone-alt mt-1 text-purple-400 mr-3"></i>
                                <p class="text-gray-300">+33 1 98 76 54 32</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="bg-gray-800 py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-8 animate-fade-in">
                    <h2 class="text-3xl font-bold text-white mb-4">Notre Bureau</h2>
                    <p class="text-gray-400">Les bureaux d'Axel Meryl sont situés en plein cœur de Paris</p>
                </div>
                
                <div class="bg-gray-700 rounded-xl overflow-hidden shadow-2xl animate-fade-in">
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937604!2d2.2922926!3d48.8583698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1621536624582!5m2!1sfr!2sfr" 
                            class="w-full h-full" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                    <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-xl font-bold text-white mb-3">Adresse</h3>
                            <p class="text-gray-300 mb-1">123 Avenue des Comédiens</p>
                            <p class="text-gray-300 mb-4">75008 Paris, France</p>
                            <p class="text-gray-400 text-sm"><i class="fas fa-subway mr-2 text-blue-400"></i>Métro : Charles de Gaulle - Étoile (lignes 1, 2, 6)</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-3">Accès</h3>
                            <ul class="space-y-2 text-gray-300">
                                <li class="flex items-start">
                                    <i class="fas fa-parking mt-1 text-blue-400 mr-2"></i>
                                    <span>Parking public à 100m</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-bus mt-1 text-blue-400 mr-2"></i>
                                    <span>Bus : lignes 22, 30, 31</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-bicycle mt-1 text-blue-400 mr-2"></i>
                                    <span>Station Vélib à proximité</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-12 animate-fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Questions <span class="gradient-text">Fréquentes</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Retrouvez les réponses aux questions les plus souvent posées.</p>
                </div>

                <div class="space-y-6 animate-fade-in delay-1">
                    <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
                        <h3 class="text-xl font-bold text-white mb-3">Comment réserver des places pour un spectacle ?</h3>
                        <p class="text-gray-300">Les billets pour les spectacles d'Axel Meryl sont disponibles sur les plateformes habituelles de billetterie (Fnac, Ticketmaster, etc.) ainsi que sur les sites des salles de spectacle. Vous pouvez également consulter la section "Agenda" de notre site pour des liens directs vers la billetterie.</p>
                    </div>

                    <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
                        <h3 class="text-xl font-bold text-white mb-3">Peut-on rencontrer Axel après un spectacle ?</h3>
                        <p class="text-gray-300">Axel organise régulièrement des séances de dédicaces après ses spectacles. Ces informations sont communiquées sur ses réseaux sociaux et sur notre site internet. Pour des raisons d'organisation, ces rencontres ne sont pas systématiques.</p>
                    </div>

                    <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
                        <h3 class="text-xl font-bold text-white mb-3">Comment proposer une collaboration artistique ?</h3>
                        <p class="text-gray-300">Pour toute proposition de collaboration, merci d'envoyer un email détaillé à notre service booking. Nous étudions toutes les propositions mais ne pouvons malheureusement pas donner suite à chacune d'entre elles en raison du volume reçu.</p>
                    </div>

                    <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
                        <h3 class="text-xl font-bold text-white mb-3">Comment obtenir des photos ou visuels pour la presse ?</h3>
                        <p class="text-gray-300">Notre attaché de presse peut vous fournir un kit média complet avec des photos haute résolution et la biographie officielle d'Axel. Veuillez contacter notre service presse par email en précisant votre média et l'usage prévu.</p>
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

/* Aspect ratio utility for map */
.aspect-w-16 {
    position: relative;
    padding-bottom: calc(var(--tw-aspect-h) / var(--tw-aspect-w) * 100%);
    --tw-aspect-w: 16;
}

.aspect-h-9 {
    --tw-aspect-h: 9;
}

.aspect-w-16 > * {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
</style> 