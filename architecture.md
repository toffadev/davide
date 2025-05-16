# Documentation : Restructuration d'une Application Laravel/Inertia.js pour Séparer Client et Admin

Cette documentation détaille les étapes suivies pour restructurer une application Laravel utilisant Inertia.js et Vue 3 afin de séparer clairement les parties client et admin. Cette approche permet d'avoir des designs différents (Tailwind pour le client, éventuellement Bootstrap pour l'admin) et une meilleure organisation du code.

## 1. Objectifs de la Restructuration

- Séparer clairement les composants, layouts et pages client et admin
- Permettre l'utilisation de différents frameworks CSS pour chaque partie
- Maintenir la fonctionnalité existante de la partie client
- Préparer l'infrastructure pour développer la partie admin ultérieurement

## 2. Création de la Nouvelle Structure de Dossiers

### 2.1 Créer les nouveaux points d'entrée pour les parties client et admin

```bash
# Créer les fichiers client.js et admin.js basés sur app.js existant
touch resources/js/client.js
touch resources/js/admin.js
```

Dans `resources/js/client.js` :
```javascript
import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Client/Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el);
  },
});
```

Dans `resources/js/admin.js` :
```javascript
import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Admin/Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el);
  },
});
```

### 2.2 Créer les dossiers pour la nouvelle structure

Créer les dossiers pour la structure client :
```bash
mkdir -p resources/js/Client/Pages
mkdir -p resources/js/Client/Components
mkdir -p resources/js/Client/Layouts
```

Créer les dossiers pour la structure admin :
```bash
mkdir -p resources/js/Admin/Pages
mkdir -p resources/js/Admin/Components
mkdir -p resources/js/Admin/Layouts
```

## 3. Déplacement des Fichiers Existants

Déplacer les composants, pages et layouts existants vers la nouvelle structure client :

```bash
# Sous Windows (PowerShell/CMD) :
robocopy "resources\js\Pages" "resources\js\Client\Pages" *.vue /MOVE
robocopy "resources\js\Components" "resources\js\Client\Components" *.vue /MOVE
robocopy "resources\js\Layouts" "resources\js\Client\Layouts" *.vue /MOVE

# Sous Linux/Mac :
# mv resources/js/Pages/* resources/js/Client/Pages/
# mv resources/js/Components/* resources/js/Client/Components/
# mv resources/js/Layouts/* resources/js/Client/Layouts/
```

Supprimer l'ancien fichier app.js car il est remplacé par client.js et admin.js :
```bash
rm resources/js/app.js
```

## 4. Mise à Jour de la Configuration Vite

Modifier `vite.config.js` pour ajouter les nouveaux points d'entrée et les alias :

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/client.js',
                'resources/js/admin.js'
            ],
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
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
            '@client': path.resolve(__dirname, './resources/js/Client'),
            '@admin': path.resolve(__dirname, './resources/js/Admin'),
            // Alias pour maintenir la compatibilité avec les imports existants
            '@/Components': path.resolve(__dirname, './resources/js/Client/Components'),
            '@/Layouts': path.resolve(__dirname, './resources/js/Client/Layouts'),
            '@/Pages': path.resolve(__dirname, './resources/js/Client/Pages'),
        },
    },
});
```

## 5. Mise à Jour des Routes

Modifier les routes dans `routes/web.php` pour avoir des sections distinctes pour client et admin :

```php
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/musique', function () {
    return Inertia::render('Music');
});

Route::get('/comedie', function () {
    return Inertia::render('Comedy');
});

Route::get('/biographie', function () {
    return Inertia::render('Biography');
});

Route::get('/actualites', function () {
    return Inertia::render('Actuality');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('admin.dashboard');
    
    // Ici seront ajoutées vos futures routes admin
});
```

## 6. Mise à Jour du Template Principal

Modifier `resources/views/app.blade.php` pour charger le bon script en fonction du contexte (client ou admin) :

```php
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Axel Meryl - Artiste Comédien & Musicien">
  <title>{{ config('app.name', 'Axel Meryl - Artiste Comédien & Musicien') }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  @if (Request::is('admin*'))
    @vite(['resources/js/admin.js', 'resources/css/app.css'])
  @else
    @vite(['resources/js/client.js', 'resources/css/app.css'])
  @endif
  @inertiaHead
</head>
<body class="@if(Request::is('admin*')) bg-white @else bg-gray-900 @endif">
  @inertia
</body>
</html>
```

## 7. Correction des Imports dans les Fichiers Vue

Les chemins d'importation dans les fichiers Vue doivent être mis à jour pour fonctionner avec la nouvelle structure.

### 7.1 Correction des imports dans les fichiers Pages

Pour chaque fichier dans `resources/js/Client/Pages/`, remplacer les imports comme :
```javascript
// Ancien
import MainLayout from '@/Layouts/MainLayout.vue';

// Nouveau
import MainLayout from '../../Client/Layouts/MainLayout.vue';
```

### 7.2 Correction des imports dans les layouts

Pour `resources/js/Client/Layouts/MainLayout.vue` :
```javascript
// Ancien
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';

// Nouveau
import Header from '../../Client/Components/Header.vue';
import Footer from '../../Client/Components/Footer.vue';
```

## 8. Configuration des fichiers Vue dans client.js et admin.js

Pour une configuration correcte, il est important que les chemins de résolution dans client.js et admin.js soient cohérents :

Dans `client.js` :
```javascript
resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Client/Pages/**/*.vue')),
```

Dans `admin.js` :
```javascript
resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Admin/Pages/**/*.vue')),
```

## 9. Problèmes Rencontrés et Solutions

### 9.1 Problème : Duplication des préfixes dans les chemins de pages

**Problème** : Erreur "Page not found: ./Client/Pages/Client/Pages/Home.vue"  
**Solution** : Ne pas ajouter le préfixe "Client/Pages/" dans les routes et le laisser uniquement dans la fonction resolve().

### 9.2 Problème : Imports avec alias '@' non résolus

**Problème** : "Failed to resolve import '@/Layouts/MainLayout.vue'"  
**Solution** : Deux approches possibles :
1. Utiliser des chemins relatifs (`../../Client/Layouts/MainLayout.vue`)
2. Configurer des alias dans vite.config.js (voir étape 4)

## 10. Vérification et Test

Pour tester que tout fonctionne correctement :
1. Démarrer le serveur de développement : `npm run dev`
2. Accéder à l'application client : `http://localhost`
3. Vérifier que toutes les pages s'affichent sans erreur
4. Accéder à l'admin (qui sera vide pour l'instant) : `http://localhost/admin`

## 11. Remarques Importantes

- Cette approche permet d'avoir deux applications distinctes (client et admin) partageant la même base de code
- La partie admin peut être développée indépendamment avec des composants et styles différents
- Pour ajouter Bootstrap à la partie admin, il faudra créer un fichier CSS spécifique et l'inclure uniquement pour l'admin
- Les composants peuvent être partagés entre client et admin si nécessaire (en créant un dossier `resources/js/Shared/`)

## 12. Commandes Utilisées (Résumé)

```bash
# Création des fichiers et dossiers
touch resources/js/client.js
touch resources/js/admin.js
mkdir -p resources/js/Client/Pages resources/js/Client/Components resources/js/Client/Layouts
mkdir -p resources/js/Admin/Pages resources/js/Admin/Components resources/js/Admin/Layouts

# Déplacement des fichiers
robocopy "resources\js\Pages" "resources\js\Client\Pages" *.vue /MOVE
robocopy "resources\js\Components" "resources\js\Client\Components" *.vue /MOVE
robocopy "resources\js\Layouts" "resources\js\Client\Layouts" *.vue /MOVE

# Suppression de l'ancien fichier
rm resources/js/app.js

# Redémarrage du serveur de développement
npm run dev
``` 