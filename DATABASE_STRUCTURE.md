# Structure de la Base de Données - Site Axel Merryl

## Tables Principales

### 1. users
Table pour la gestion des administrateurs du dashboard
- `id` : bigint (clé primaire)
- `name` : varchar(255)
- `email` : varchar(255) unique
- `password` : varchar(255)
- `role` : enum('admin', 'editor')
- `remember_token` : varchar(100) nullable
- `timestamps` (created_at, updated_at)


### 3. actualities
Table pour gérer les actualités
- `id` : bigint (clé primaire)
- `title` : varchar(255)
- `content` : text
- `image` : varchar(255)
- `date` : date
- `is_featured` : boolean
- `category` : enum('event', 'news', 'release')
- `is_visible` : boolean
- `timestamps` (created_at, updated_at)

### 4. comedy_shows
Table pour gérer les spectacles de comédie
- `id` : bigint (clé primaire)
- `title` : varchar(255)
- `description` : text
- `cover_image` : varchar(255)
- `trailer_url` : varchar(255) nullable
- `duration` : integer (en minutes)
- `release_date` : date
- `is_visible` : boolean
- `timestamps` (created_at, updated_at)

### 5. music_releases
Table pour gérer les sorties musicales
- `id` : bigint (clé primaire)
- `title` : varchar(255)
- `description` : text
- `cover_image` : varchar(255)
- `release_date` : date
- `type` : enum('single', 'album', 'ep')
- `spotify_link` : varchar(255) nullable
- `apple_music_link` : varchar(255) nullable
- `youtube_link` : varchar(255) nullable
- `is_visible` : boolean
- `timestamps` (created_at, updated_at)

### 6. events
Table pour gérer les événements et dates de spectacle
- `id` : bigint (clé primaire)
- `title` : varchar(255)
- `description` : text nullable
- `venue` : varchar(255)
- `city` : varchar(255)
- `country` : varchar(255)
- `event_date` : datetime
- `ticket_link` : varchar(255) nullable
- `is_sold_out` : boolean
- `is_visible` : boolean
- `timestamps` (created_at, updated_at)

### 7. media_gallery
Table pour gérer les médias (photos, vidéos)
- `id` : bigint (clé primaire)
- `title` : varchar(255)
- `description` : text nullable
- `type` : enum('image', 'video')
- `url` : varchar(255)
- `thumbnail` : varchar(255) nullable
- `category` : enum('comedy', 'music', 'personal')
- `is_visible` : boolean
- `order` : integer
- `timestamps` (created_at, updated_at)


## Notes Importantes

1. Toutes les tables incluent les timestamps `created_at` et `updated_at` pour le suivi des modifications
2. Les champs `is_visible` permettent de contrôler l'affichage des éléments sans les supprimer
3. Les champs `order` permettent de gérer l'ordre d'affichage des éléments
5. Les images doivent être stockées dans le système de fichiers, seuls les chemins sont stockés en base de données

## Recommandations pour l'Implémentation

1. Utiliser les migrations Laravel pour créer ces tables
2. Implémenter des soft deletes sur les tables principales
3. Créer des modèles Eloquent avec les relations appropriées
4. Mettre en place des validations strictes pour les données entrantes
5. Utiliser des seeders pour les données initiales (notamment pour les utilisateurs admin) 