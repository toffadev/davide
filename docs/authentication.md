# Guide d'Authentification Laravel 11 avec Vue.js et Inertia

Ce guide détaille la mise en place d'un système d'authentification dans une application Laravel 11 utilisant Vue.js et Inertia, avec un focus particulier sur une section administrative.

## Table des matières

1. [Installation initiale](#installation-initiale)
2. [Configuration des routes](#configuration-des-routes)
3. [Problèmes rencontrés et solutions](#problèmes-rencontrés-et-solutions)
4. [Structure finale](#structure-finale)

## Installation initiale

### Prérequis

-   Laravel 11
-   Vue.js 3
-   Inertia.js
-   Breeze (pour le scaffolding de l'authentification)

### Commandes d'installation

```bash
composer require laravel/breeze
php artisan breeze:install
```

## Configuration des routes

### 1. Structure des routes d'authentification

Dans `routes/auth.php`, nous avons préfixé toutes les routes avec 'admin' :

```php
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');
        // ... autres routes d'authentification
    });
});
```

### 2. Routes administratives

Dans `routes/web.php` :

```php
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');
        // ... autres routes administratives
    });
});
```

## Problèmes rencontrés et solutions

### 1. Problème de redirection après authentification

**Problème** : Route [login] not defined lors de la redirection.

**Solution** : Modification du middleware Authenticate.php pour utiliser le chemin direct :

```php
protected function redirectTo(Request $request): ?string
{
    if ($request->expectsJson()) {
        return null;
    }
    return '/admin/login';
}
```

### 2. Problème avec les routes dans les composants Vue

**Problème** : Erreur "\_ctx.route is not a function"

**Solution** : Configuration correcte de Ziggy dans le projet :

1. Dans `resources/js/admin.js` :

```javascript
import { route } from "ziggy-js";

createInertiaApp({
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.config.globalProperties.$route = route;
        app.use(plugin);
        return app.mount(el);
    },
});
```

2. Dans `app/Http/Middleware/HandleInertiaRequests.php` :

```php
public function share(Request $request): array
{
    return [
        ...parent::share($request),
        'ziggy' => [
            'url' => $request->url(),
            'port' => $request->getPort(),
            'defaults' => [],
            'routes' => fn() => Route::getRoutes()->getRoutesByName(),
        ],
    ];
}
```

### 3. Problème de middleware admin

**Problème** : "Target class [admin] does not exist"

**Solution** : Deux approches possibles :

1. Retirer le middleware 'admin' si pas nécessaire
2. Créer un middleware AdminMiddleware basique qui laisse passer toutes les requêtes

## Structure finale

### Organisation des fichiers

```
resources/
├── js/
│   ├── Admin/
│   │   └── Pages/
│   │       └── Auth/
│   │           ├── Login.vue
│   │           └── Register.vue
│   └── admin.js
routes/
├── auth.php
└── web.php
app/
└── Http/
    └── Middleware/
        ├── Authenticate.php
        └── HandleInertiaRequests.php
```

### Configuration Laravel 11

Dans `bootstrap/app.php` :

```php
return Application::configure(basePath: dirname(__DIR__))
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        ]);

        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
        ]);
    })
    ->create();
```

## Points importants à retenir

1. **Préfixage des routes** : Toujours utiliser un préfixe cohérent (ex: 'admin') pour toutes les routes liées à l'administration.

2. **Gestion des redirections** : Préférer les chemins directs aux noms de routes pour éviter les problèmes de résolution de routes.

3. **Configuration Inertia/Vue** : S'assurer que Ziggy est correctement configuré pour la gestion des routes côté client.

4. **Middleware** : Garder les middlewares simples et ne les implémenter que si nécessaire.

## Conseils pour les futurs projets

1. Commencer par installer Breeze avec l'option Vue + Inertia.
2. Configurer immédiatement les préfixes de routes pour l'administration.
3. Tester les redirections d'authentification dès le début.
4. Vérifier la configuration de Ziggy si des problèmes de routes surviennent côté client.
