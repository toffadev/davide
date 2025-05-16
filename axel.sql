-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 16 mai 2025 à 09:59
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `axel`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualities`
--

CREATE TABLE `actualities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `category` enum('event','news','release') NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `actualities`
--

INSERT INTO `actualities` (`id`, `title`, `content`, `image`, `date`, `is_featured`, `category`, `is_visible`, `created_at`, `updated_at`) VALUES
(2, 'Axel Merryl est rentré en clash', 'Axel Merryl est rentré en clash avec Ghix', '/storage/actualities/zPy0Sip7GUZIwCmMa63fR92SoQG83E09yUWu9EXy.jpg', '2017-12-05', 1, 'news', 1, '2025-05-12 17:52:27', '2025-05-15 22:28:32'),
(3, 'Rencontre Axel Merryl avec POGBA', 'Axel merryl rencontre le footbaleur Paul POGBA', '/storage/actualities/yHWNbxnM7VLD1xRDhQ7cD5j0fEqZh7QyVyZ5CmQQ.jpg', '2023-10-22', 1, 'news', 1, '2025-05-12 17:55:01', '2025-05-15 22:25:34'),
(4, 'Rencontre Toofan et Axel Merryl', 'Aliquip ut rerum min', '/storage/actualities/nqEQke76UfL1fzoJypdtLDNeeoZraNl2WcllxLao.jpg', '2025-03-31', 1, 'news', 1, '2025-05-12 17:55:25', '2025-05-15 22:30:02');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comedy_shows`
--

CREATE TABLE `comedy_shows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `cover_image` varchar(255) NOT NULL,
  `trailer_url` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comedy_shows`
--

INSERT INTO `comedy_shows` (`id`, `title`, `description`, `cover_image`, `trailer_url`, `duration`, `release_date`, `is_visible`, `created_at`, `updated_at`) VALUES
(2, 'LE FOYER - ÉPISODE 8 - MA GRANDE SŒUR', 'Quisquam alias facer', '/storage/comedy-shows/RDwOOcltZTdEozFSWzHw0KCKuLA2e4fvGfxfn8vq.jpg', 'https://www.youtube.com/watch?v=C7Kffy9BzuE', 94, '2022-12-03', 1, '2025-05-12 17:40:25', '2025-05-15 22:03:37'),
(3, 'LE FOYER - EPISODE 7 - LE PETIT FRÈRE', 'Libero in quo debiti', '/storage/comedy-shows/aGcMxhZ4dwhMYjlDhSwJCg65JgxvHFHv5oelo4GW.jpg', 'https://www.youtube.com/watch?v=cXVeLuevtGU', 17, '2022-11-27', 1, '2025-05-12 17:40:50', '2025-05-15 22:04:51'),
(4, 'LE FOYER - EPISODE 6 - IPHONE 14 PRO MAX', 'Rerum ut esse ipsam', '/storage/comedy-shows/XbU0T5aaLhZu4cbRmOdAb1Tq0zxCekwRFPeasgCs.jpg', 'https://www.youtube.com/watch?v=Y-GpP89b1Jw', 76, '2022-11-20', 1, '2025-05-12 17:41:08', '2025-05-15 22:05:59'),
(5, 'LE FOYER - EPISODE 5 - LE VENDEUR DE MÉDICAMENT', 'At dolor commodi sed', '/storage/comedy-shows/BOJ3yTWTGKsRbLuhtepAV3hceg8cwsWmIohNSGIM.jpg', 'https://www.youtube.com/watch?v=szKVoPbKpmk', 39, '2022-11-13', 1, '2025-05-15 22:08:54', '2025-05-15 22:08:54');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `event_date` datetime NOT NULL,
  `ticket_link` varchar(255) DEFAULT NULL,
  `url_youtube` varchar(255) DEFAULT NULL,
  `is_sold_out` tinyint(1) NOT NULL DEFAULT 0,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `address`, `city`, `country`, `event_date`, `ticket_link`, `url_youtube`, `is_sold_out`, `is_visible`, `created_at`, `updated_at`) VALUES
(2, 'Casino', 'Distinctio Recusand', '/storage/events/c2FLxRKbCPAyzt1oUx6oNo82dRmiaN4A61AcMff1.jpg', 'Casino de paris', 'Paris', 'France', '2025-10-07 23:00:00', 'https://www.kugurizyfyqoxa.in', NULL, 1, 1, '2025-05-12 18:03:40', '2025-05-15 22:19:30'),
(3, 'Vodoun day', 'Sint ipsum aut ipsa', '/storage/events/1xYXxDgjLKc8R9kIOCzJcSvd2mBHTJrRpuV5rPLQ.jpg', 'Temple des pytons', 'Ouidah', 'Benin', '2026-01-10 16:00:00', 'https://www.jecidudu.in', NULL, 1, 1, '2025-05-12 18:04:07', '2025-05-15 22:22:48'),
(4, 'Concert Température', 'Vel et quas quia imp', '/storage/events/5yQrMO02pBAMaJZaAHsB45MQ7e8A8Ofj52dQVs4y.jpg', 'Palais des congrès', 'Cotonou', 'Benin', '2025-08-19 22:00:00', 'https://www.juzohemeta.net', NULL, 1, 1, '2025-05-12 18:04:33', '2025-05-15 22:18:44');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `media_gallery`
--

CREATE TABLE `media_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('image','video') NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `category` enum('comedy','music','personal') NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media_gallery`
--

INSERT INTO `media_gallery` (`id`, `title`, `description`, `type`, `url`, `thumbnail`, `category`, `is_visible`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Nihil quia et amet', 'Nostrum temporibus e', 'image', 'A deserunt illum ex', '/storage/media-gallery/wzqyqCsnFapJgn1eUKs6XoDpoaHhfZDWDSHwYK8y.jpg', 'comedy', 1, 78, '2025-05-08 18:48:05', '2025-05-15 22:31:13'),
(2, 'Aut aliquip sed odio', 'Pariatur Quibusdam', 'image', 'Iure enim eos maior', '/storage/media-gallery/R0M18Mqin4vpG4yhFn3VIoJgteZPT2HNYxavm6Z9.jpg', 'comedy', 1, 85, '2025-05-12 18:18:33', '2025-05-12 18:18:33'),
(3, 'Porro et cumque et i', 'Rem error sed provid', 'image', 'Fugit exercitatione', '/storage/media-gallery/5ziiISpra1oSkG2r0ejM87Df7BBiF2QdG29iOG25.jpg', 'personal', 1, 58, '2025-05-12 18:18:55', '2025-05-12 18:18:55'),
(4, 'Vero voluptates et q', 'Veniam aliquam cons', 'image', 'Id non fugit numqua', '/storage/media-gallery/Ft9MvnXvaTjQFFNLRSy2oWJ34mVaUn4UOgximFqA.jpg', 'music', 1, 92, '2025-05-12 18:19:20', '2025-05-12 18:19:20'),
(5, 'Et quos consectetur', 'Ullam minim exceptur', 'image', 'Corrupti et ipsum q', '/storage/media-gallery/MOkwxdNRqAKdhcRr9Qe4HyHhhfLNVpfUoG29glt0.jpg', 'personal', 1, 70, '2025-05-12 18:19:44', '2025-05-12 18:19:44'),
(6, 'Exercitation iure vo', 'Qui reprehenderit s', 'image', 'Inventore rerum tene', '/storage/media-gallery/laet9eXz3oJpHgUjKfoEGVoSCKRDxDCIciII2rIn.jpg', 'comedy', 1, 92, '2025-05-12 18:20:11', '2025-05-12 18:20:11');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_07_233914_create_actualities_table', 1),
(5, '2025_05_07_233922_create_comedy_shows_table', 1),
(6, '2025_05_07_233929_create_music_releases_table', 1),
(7, '2025_05_07_233936_create_events_table', 1),
(8, '2025_05_07_233946_create_media_gallery_table', 1),
(9, '2025_05_15_061810_create_new_projects_table', 2),
(10, '2025_05_15_073419_add_url_youtube_to_events_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `music_releases`
--

CREATE TABLE `music_releases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `cover_image` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `type` enum('single','album','ep') NOT NULL,
  `spotify_link` varchar(255) DEFAULT NULL,
  `apple_music_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `music_releases`
--

INSERT INTO `music_releases` (`id`, `title`, `description`, `cover_image`, `release_date`, `type`, `spotify_link`, `apple_music_link`, `youtube_link`, `is_visible`, `created_at`, `updated_at`) VALUES
(2, 'Température', 'Non dolore dolorum r', '/storage/music-releases/hsjYQDMEwrx9wAaeems77UNGDVXhwnWOTBovrJt9.jpg', '2024-06-14', 'album', 'https://open.spotify.com/intl-fr/album/5O5uQ1b3zwofgQAWEaWes7', 'https://www.zipucizen.in', 'https://www.youtube.com/watch?v=D3YMFFbn520&list=PL8McaVjUJmWz-RnrDtjL1PCiVIVijzgiQ', 1, '2025-05-08 10:30:08', '2025-05-15 21:28:13'),
(3, 'Transition', 'Id totam lorem nobis', '/storage/music-releases/ZIjCd6FsWjMpUvzz9WZzNtvKdaqNbBnjIe1mu7dR.jpg', '2023-09-12', 'album', 'https://open.spotify.com/intl-fr/album/7dX69yIwQCZfg1bvqW6wg7?si=vm4itWsVRYuZFXlZX289vQ', 'https://www.rabi.us', 'https://www.youtube.com/watch?v=H1RKW2g4IUc', 1, '2025-05-08 10:31:48', '2025-05-15 21:50:46'),
(4, 'Axel Merryl feat Toofan \"GBA GBA\" (TOUT DOUX C\'EST BON)', 'Descriptin', '/storage/music-releases/wF0xyuWX9DWYLfXvtnPSb5AjL66QmSoQTi3Uq7ih.jpg', '2025-04-08', 'single', 'https://open.spotify.com/intl-fr/track/0KZn7SdWR2wRZ1XdW7DU89', 'https://chat.deepseek.com/', 'https://www.youtube.com/watch?v=ht2SPFqXZ_o', 1, '2025-05-08 10:33:05', '2025-05-15 21:52:02'),
(6, 'Axel Merryl \"Je m\'en fous\"', 'Alias non a explicab', '/storage/music-releases/yp9rDbrbwxR466bS29ZXNTJX3lJOSmgi4SC33noT.jpg', '2025-01-17', 'single', 'https://open.spotify.com/intl-fr/track/3Xnbu5hvLpPNrtmVPWVA1o', 'https://www.wizumuqusidyr.info', 'https://www.youtube.com/watch?v=TPsNDs8AhXA', 1, '2025-05-08 10:38:56', '2025-05-15 21:59:22'),
(7, 'AXEL MERRYL \"PETIT BISOU\"', 'Veniam incididunt n', '/storage/music-releases/8eDKc5IcVI2mKYh8XfFxBN0pFDnWi6gwzTMUCizq.jpg', '2025-02-07', 'single', 'https://open.spotify.com/intl-fr/track/70ANRcBICQYLOoRGfc9aPL', 'https://www.zyfyge.com', 'https://www.youtube.com/watch?v=K0f8CTfVU00', 1, '2025-05-08 10:42:58', '2025-05-15 21:52:57'),
(8, 'Axel Merryl \"Titulaire\"', 'Dolorem et velit eni', '/storage/music-releases/bfXaOL7hc01PQEnLpSI7nzRopqSmTAY8LNAPbPg9.jpg', '2024-10-11', 'single', 'https://open.spotify.com/intl-fr/track/5lFV7YMeEtxCN3kDo20oWL', 'https://www.nubenydawozafi.org', 'https://www.youtube.com/watch?v=StMspmx9Knk', 1, '2025-05-15 22:12:59', '2025-05-15 22:12:59');

-- --------------------------------------------------------

--
-- Structure de la table `new_projects`
--

CREATE TABLE `new_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `cover_image` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `type` enum('single','album','ep') NOT NULL,
  `spotify_link` varchar(255) DEFAULT NULL,
  `apple_music_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `singleton` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `new_projects`
--

INSERT INTO `new_projects` (`id`, `title`, `description`, `cover_image`, `release_date`, `type`, `spotify_link`, `apple_music_link`, `youtube_link`, `is_visible`, `created_at`, `updated_at`, `singleton`) VALUES
(2, 'Romeo', 'Nulla fuga Occaecat', '/storage/new-projects/S1xINXPrCyoSG0Vgcp9DS2lgTBWAiqaYqwIPDmd6.jpg', '2025-05-24', 'single', 'https://www.fidygahi.org.uk', 'https://www.sici.com', 'https://www.konohukutosiran.me', 1, '2025-05-15 04:41:08', '2025-05-15 17:08:52', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8TlOjANyGdlSDyMrx4srQ6G5KWwCB0eaAIMppsXa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1Byamw4MjJqTnpXYjNLWGVnbGZuWEtjcjVEZ3dJdXBvZDNTTjlUWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1747356492),
('SEsJ3Ft8Kb7j19zQ1tuw0AsIAy3VFWIbz5AQjxRG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekRDbHNaSzFQYzBmbFMzcER0YjVtcUNDOEEzQWJsWTd6ZkFSYW5zTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747377186),
('Udw01ly9c0Xq8k8HMeUnfPcl9eF5gbeKw02eyn3E', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVm9SMWNkY3hDVjU0YjJrdTBwTERla3ZFYXdpV0gzQ3VSSUJtYTlCcSI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vbG9naW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1747377505),
('ZnSbELjazbzTZrf9kH4xZGn0gFn0nnmYV4O0sYX5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib2l2bXppUUlsb0dCWk1SQUVhMXhjTW9NdW90NFJjRG5yaGNQWUFzSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1747355473);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'devince toffa', 'devincetoffa2@gmail.com', NULL, '$2y$12$/oo8uFXBmfhrxCHVGM2Q5egJcOO0hvtJuwD2DdxtPCjK2avHBZaVy', NULL, '2025-05-09 16:45:03', '2025-05-09 16:45:03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualities`
--
ALTER TABLE `actualities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `comedy_shows`
--
ALTER TABLE `comedy_shows`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media_gallery`
--
ALTER TABLE `media_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `music_releases`
--
ALTER TABLE `music_releases`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `new_projects`
--
ALTER TABLE `new_projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `new_projects_singleton_unique` (`singleton`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualities`
--
ALTER TABLE `actualities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comedy_shows`
--
ALTER TABLE `comedy_shows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `media_gallery`
--
ALTER TABLE `media_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `music_releases`
--
ALTER TABLE `music_releases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `new_projects`
--
ALTER TABLE `new_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
