# Guide de déploiement - Laravel 11 avec Vue 3 et Inertia

Ce guide explique comment déployer une application Laravel 11 utilisant Vue 3 et Inertia.js sur un serveur de production.

## 1. Préparation locale

Avant de déployer votre application, vous devez préparer votre code pour la production.

### 1.1. Compilation des assets Vue.js

```bash
# Installez toutes les dépendances npm
npm install

# Compilez les assets pour la production
npm run build
```

Cette commande utilise Vite pour compiler tous vos fichiers JavaScript et CSS, et les place dans le dossier `/public/build`. Vérifiez que ce dossier a bien été créé après la compilation.

### 1.2. Vérification de la configuration

Assurez-vous que votre fichier `vite.config.js` est correctement configuré pour gérer vos entrées (inputs) et vos alias. Dans votre projet, il devrait ressembler à ceci:

```javascript
// vite.config.js
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { resolve } from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/client.js",
                "resources/js/admin.js",
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
    // ...autres configurations
});
```

## 2. Préparation du serveur

### 2.1. Exigences du serveur

-   PHP 8.1 ou supérieur
-   Composer
-   Serveur web (Apache ou Nginx)
-   Base de données (MySQL, PostgreSQL, etc.)
-   Extensions PHP requises pour Laravel

### 2.2. Configuration du serveur web

#### Apache

Créez un fichier `.htaccess` dans le dossier public (si ce n'est pas déjà fait):

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

#### Nginx

Exemple de configuration Nginx:

```nginx
server {
    listen 80;
    server_name votre-domaine.com;
    root /chemin/vers/votre/projet/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 3. Processus de déploiement

### 3.1. Transfert des fichiers

Transférez votre code sur le serveur en utilisant l'une des méthodes suivantes:

-   Git (recommandé)
-   FTP/SFTP
-   Déploiement automatisé (GitHub Actions, GitLab CI, etc.)

**Important**: N'incluez PAS les dossiers suivants dans votre déploiement:

-   `/node_modules`
-   `/vendor`
-   `.env`

### 3.2. Installation des dépendances

Sur le serveur, exécutez:

```bash
# Installation des dépendances PHP
composer install --optimize-autoloader --no-dev

# Si vous n'avez pas compilé les assets localement et que Node.js est disponible sur le serveur
npm install
npm run build
```

### 3.3. Configuration de l'environnement

```bash
# Copier le fichier d'environnement exemple
cp .env.example .env

# Générer une clé d'application
php artisan key:generate
```

Modifiez le fichier `.env` pour configurer:

-   La connexion à la base de données
-   L'environnement de production

```
APP_ENV=production
APP_DEBUG=false
```

-   Les informations de mail
-   Autres variables spécifiques à votre application

### 3.4. Préparation de la base de données

```bash
# Exécuter les migrations
php artisan migrate

# Exécuter les seeders si nécessaire
php artisan db:seed
```

### 3.5. Optimisation pour la production

```bash
# Mise en cache de la configuration
php artisan config:cache

# Mise en cache des routes
php artisan route:cache

# Mise en cache des vues
php artisan view:cache

# Optimisation de l'autoloader de Composer
composer dump-autoload --optimize
```

### 3.6. Permissions des fichiers

Assurez-vous que les dossiers de stockage sont accessibles en écriture:

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

Remplacez `www-data` par l'utilisateur de votre serveur web si nécessaire.

## 4. Spécificités Inertia.js

Avec Inertia.js, vous n'avez pas besoin de configurer une API séparée car Inertia sert de pont entre votre backend Laravel et votre frontend Vue.js.

### 4.1. Gestion du SSR (optionnel)

Si vous utilisez le Server-Side Rendering avec Inertia:

```bash
# Installez les dépendances Node.js sur le serveur
npm install

# Démarrez le serveur SSR
node bootstrap/ssr/ssr.mjs
```

Vous devrez configurer un gestionnaire de processus comme PM2 pour maintenir le serveur SSR en fonctionnement:

```bash
npm install pm2 -g
pm2 start bootstrap/ssr/ssr.mjs --name "inertia-ssr"
pm2 save
pm2 startup
```

## 5. Maintenance et mises à jour

### 5.1. Mode maintenance

Pour mettre votre site en mode maintenance pendant les mises à jour:

```bash
# Activer le mode maintenance
php artisan down

# Désactiver le mode maintenance
php artisan up
```

### 5.2. Procédure de mise à jour

Pour mettre à jour votre application:

```bash
# Mettre le site en maintenance
php artisan down

# Récupérer les dernières modifications (si vous utilisez Git)
git pull origin main

# Mettre à jour les dépendances
composer install --optimize-autoloader --no-dev
npm install
npm run build

# Mettre à jour la base de données
php artisan migrate

# Vider les caches
php artisan optimize:clear

# Recréer les caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Désactiver le mode maintenance
php artisan up
```

## 6. Dépannage

### 6.1. Problèmes courants

#### Les assets ne sont pas chargés correctement

-   Vérifiez que `npm run build` a été exécuté
-   Vérifiez que le dossier `/public/build` existe et contient les fichiers compilés
-   Vérifiez les chemins dans vos templates

#### Erreurs 500

-   Vérifiez les logs dans `storage/logs/laravel.log`
-   Activez temporairement `APP_DEBUG=true` dans `.env` pour voir les erreurs détaillées

#### Problèmes de base de données

-   Vérifiez les informations de connexion dans `.env`
-   Vérifiez que les migrations ont été exécutées

### 6.2. Vérification du déploiement

Pour vérifier que votre application fonctionne correctement:

```bash
# Vérifier la version de Laravel
php artisan --version

# Vérifier la connexion à la base de données
php artisan tinker
DB::connection()->getPdo();
```

## 7. Considérations de sécurité

-   Assurez-vous que `APP_DEBUG=false` en production
-   Utilisez HTTPS pour votre site
-   Configurez les en-têtes de sécurité appropriés
-   Effectuez régulièrement des mises à jour de sécurité
-   Utilisez des variables d'environnement pour les informations sensibles

---

Ce guide couvre les bases du déploiement d'une application Laravel avec Vue 3 et Inertia. Adaptez-le selon les spécificités de votre projet et de votre environnement de déploiement.
