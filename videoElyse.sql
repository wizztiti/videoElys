-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 20, 2018 at 11:54 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `nini_videoElys`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(49, 'Categoria', 'categoria', '2018-09-17 08:17:29', '2018-09-18 14:12:22'),
(50, 'categorie 2', 'categorie-2', '2018-09-17 08:17:35', '2018-09-17 08:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_26_144935_create_videos_table', 1),
(4, '2018_06_26_150111_create_categories_table', 1),
(5, '2018_06_26_150229_create_posts_table', 1),
(6, '2018_06_26_151338_create_tags_table', 1),
(7, '2018_06_26_153151_create_tag_video_table', 1),
(8, '2018_06_26_155538_create_post_tag_table', 1),
(9, '2018_06_26_155810_create_videos_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(42, 'La pareja y el efecto espejo', '¿Cuántas veces has pensado en huir de tu relación? \r\n\r\n¿Y si la persona con quien sueño me está esperando?\r\n\r\nLa relación de pareja es uno de los mayores desafíos con los que vamos a encontrarnos a lo largo de nuestra Vida. Hay muchas miradas que, actualmente, se cuestionan los modelos establecidos y ponen en tela de juicio su validez, ya sea como formato práctico, o como dinámica de realización individual.\r\n\r\nMás allá de preservar, o no, la monogamia, la familia nuclear y el modelo mainstream imperante, el que me gustaría poner encima de la mesa con estas líneas es todo aquello que nos sucede cuando nos abrimos a compartir en lo profundo de un vínculo.\r\n\r\nMirar a otra persona a través de nuestros ojos, tiene una implicación muy interesante en la forma en cómo conceptualizamos aquello que vemos; cuando te miro a través mío, lo que veo, la mayor parte de la veces, tiene más que ver conmigo que contigo. Mi mirada ­las gafas que visto cuando te observo­ hablan de mi forma de leer la Vida, las emociones, los movimientos corporales, las relaciones, etc. Comprender que lo que veo en ti soy yo, es un movimiento necesario para poder sostener lo que lx otrx nos devuelve como reflejo de lo que proyecto.\r\n\r\nComprender que quien tengo delante – en un contexto de abertura sincera y profunda­ actúa como espejo donde reflejar mis profundidades y estructuras internas, me aporta un espacio de sinceridad donde poder recoger aquello que me incomoda y me inquieta; aceptar que la imagen que se me devuelve es una oportunidad de descubrirme a través de lx otrx.\r\n\r\nLas relaciones de pareja ­siempre y cuando estén establecidas en un contexto de una mínima implicación emocional­ en tanto que espacios de apertura personal, hacen emergen la memoria arcaica de nuestro primer vínculo: la historia infantil con mamá y/o papá.\r\n\r\n¿Qué recibí? ¿Cómo?\r\n\r\n¿Quién me lo daba?\r\n\r\n¿Se esperaba algo de mi para ser merecedorx de amor?\r\n\r\nLa forma como hemos aprendido a recibir amor, mirada, vínculo y presencia se pone de manifiesto cuando volvemos a establecer un espacio de comunión con otra persona. Las vivencias no resueltas de nuestra relación materno/ paterno­filial florecen en el vínculo de pareja y, a menudo, al no encontrar en lx otrx lo que seguimos esperando que venga de fuera, volvemos a reaccionar tal y como lo aprendimos a hacer en nuestra etapa infantil: nos enfadamos, nos protegemos, nos escapamos, nos volvemos inhertes, etc. Cada persona puede llegar a descubrir cuál es el comportamiento interno que vertebra su esqueleto de supervivencia.\r\n\r\nAbrirte a recibir esta imagen que te devuelve la otra persona es aventurarte a crecer, a reconquistar tu espacio de Vida, a reescribir tu merecimiento de amor y respeto por el solo hecho de existir. La pareja se torna, desde este espacio de madurez, un entorno seguro donde poder transformarse y abrazar nuestro camino.\r\n\r\nElisenda Pascual', 'la-pareja-y-el-efecto-espejo', 49, '2018-09-17 08:18:03', '2018-09-18 15:18:22'),
(43, 'article 2', 'sdqsdqsdsqd', 'article-2', 49, '2018-09-17 08:18:21', '2018-09-17 08:18:21'),
(44, 'article 3', 'sqdsqdqsqd', 'article-3', 50, '2018-09-17 08:18:38', '2018-09-17 08:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`tag_id`, `post_id`) VALUES
(49, 43),
(50, 44),
(51, 42);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_count` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `post_count`) VALUES
(49, 'tag 2', 'tag-2', 1),
(50, 'tag 3', 'tag-3', 1),
(51, 'acompanyment', 'acompanyment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag_video`
--

CREATE TABLE `tag_video` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `confirmed`, `confirmation_token`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thierry', 'thierry@del-castillo.eu', 0, 'PRQtZWNnCLPj0C74kuKceNifl1ntyP9fcn0fnErv9oNJgTi5u7XxoNqvrkbE', '$2y$10$161xqcZyeiQWVwwP3mcMZehIbUSQwgqB97aavU37dSegLaA4iic4a', NULL, '2018-09-17 08:50:14', '2018-09-17 08:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` smallint(5) UNSIGNED NOT NULL,
  `teaser_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos_users`
--

CREATE TABLE `videos_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_index` (`category_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD KEY `post_tag_tag_id_index` (`tag_id`),
  ADD KEY `post_tag_post_id_index` (`post_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `tag_video`
--
ALTER TABLE `tag_video`
  ADD KEY `tag_video_tag_id_foreign` (`tag_id`),
  ADD KEY `tag_video_video_id_foreign` (`video_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `videos_title_unique` (`title`),
  ADD UNIQUE KEY `videos_slug_unique` (`slug`),
  ADD UNIQUE KEY `videos_teaser_url_unique` (`teaser_url`),
  ADD UNIQUE KEY `videos_video_file_unique` (`video_file`);

--
-- Indexes for table `videos_users`
--
ALTER TABLE `videos_users`
  ADD PRIMARY KEY (`user_id`,`video_id`),
  ADD KEY `videos_users_video_id_foreign` (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_video`
--
ALTER TABLE `tag_video`
  ADD CONSTRAINT `tag_video_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_video_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos_users`
--
ALTER TABLE `videos_users`
  ADD CONSTRAINT `videos_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `videos_users_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`);

