# Documentation du Projet : Conversion d'un site statique vers Laravel + Inertia.js + Vue.js

## Table des matières
1. [Configuration initiale](#configuration-initiale)
2. [Installation des dépendances](#installation-des-dépendances)
3. [Configuration de Tailwind CSS](#configuration-de-tailwind-css)
4. [Architecture des composants](#architecture-des-composants)
5. [Gestion des styles](#gestion-des-styles)
6. [Problèmes rencontrés et solutions](#problèmes-rencontrés-et-solutions)
7. [Bonnes pratiques](#bonnes-pratiques)

## Configuration initiale

### Création du projet Laravel
```bash
composer create-project laravel/laravel nom-du-projet
cd nom-du-projet
```

### Installation d'Inertia.js
```bash
composer require inertiajs/inertia-laravel
php artisan inertia:middleware
```

Ajouter le middleware dans `app/Http/Kernel.php` :
```php
'web' => [
    // ...
    \App\Http\Middleware\HandleInertiaRequests::class,
],
```

### Installation de Vue.js et des dépendances frontend
```bash
npm install @inertiajs/vue3
npm install @vitejs/plugin-vue
npm install vue@next
```

## Installation des dépendances

### Configuration de vite.config.js
```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
```

### Configuration de resources/js/app.js
```javascript
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
```

## Configuration de Tailwind CSS

### Installation de Tailwind
```bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

### Configuration de tailwind.config.js
```javascript
module.exports = {
    content: [
        './resources/js/**/*.vue',
        './resources/**/*.blade.php',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
```

### Configuration de resources/css/app.css
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
@import './custom.css';
```

## Architecture des composants

### Structure des composants
```
resources/js/
├── Components/
│   ├── Header.vue
│   ├── Footer.vue
│   └── HomePage.vue
├── Layouts/
│   └── MainLayout.vue
└── Pages/
    └── Home.vue
```

### Bonnes pratiques pour les composants
- Créer des composants réutilisables (Header, Footer)
- Utiliser un layout principal pour la structure commune
- Séparer les composants par fonctionnalité
- Éviter la duplication de code

## Gestion des styles

### Organisation des styles CSS
- Création d'un fichier `custom.css` pour les styles personnalisés
- Import dans `app.css` pour une disponibilité globale
- Utilisation des classes Tailwind pour le styling de base
- Création d'animations et styles personnalisés dans `custom.css`

### Styles personnalisés (custom.css)
```css
/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Classes utilitaires */
.animate-fade-in {
    animation: fadeIn 0.8s ease-out forwards;
}

/* Styles spécifiques */
.gradient-text {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}
```

## Problèmes rencontrés et solutions

### 1. Problème de style dans les composants Vue
**Problème** : Styles définis dans les composants Vue ignorés
**Solution** : 
- Déplacer les styles dans un fichier CSS séparé
- Importer le fichier CSS dans app.css
- Utiliser les classes dans les composants

### 2. Configuration de PostCSS
**Problème** : Styles Tailwind non appliqués
**Solution** : 
- Vérifier la configuration de postcss.config.js
- S'assurer que les chemins dans tailwind.config.js sont corrects
- Redémarrer le serveur de développement

### 3. Animations au défilement
**Problème** : Animations non déclenchées
**Solution** : 
- Implémenter un script d'animation dans le composant
- Utiliser l'API Intersection Observer ou getBoundingClientRect()
- Ajouter les classes d'animation appropriées

## Bonnes pratiques

### Organisation du code
1. Séparer les composants logiquement
2. Utiliser des noms descriptifs
3. Maintenir une structure de fichiers cohérente
4. Commenter le code important

### Performance
1. Optimiser les images
2. Utiliser la lazy loading pour les composants lourds
3. Minimiser les appels HTTP
4. Utiliser le cache quand c'est possible

### Maintenance
1. Documenter les changements importants
2. Utiliser un système de versioning (Git)
3. Suivre les mises à jour des dépendances
4. Maintenir une documentation à jour

## Démarrer un nouveau projet

### Checklist de démarrage
1. Créer le projet Laravel
2. Installer et configurer Inertia.js
3. Installer Vue.js et les dépendances
4. Configurer Tailwind CSS
5. Mettre en place l'architecture des composants
6. Configurer les styles globaux
7. Implémenter les fonctionnalités de base

### Conseils pour le développement
1. Commencer par la structure de base
2. Implémenter les composants réutilisables
3. Ajouter les styles progressivement
4. Tester régulièrement
5. Optimiser à la fin

## Conclusion

Cette documentation servira de guide pour les futurs projets utilisant Laravel, Inertia.js et Vue.js. Elle couvre les aspects essentiels de la configuration, du développement et de la maintenance, tout en fournissant des solutions aux problèmes courants rencontrés lors du développement. 