-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2024 a las 22:22:21
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foro_proyecto`
--
CREATE DATABASE IF NOT EXISTS `foro_proyecto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `foro_proyecto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `event_role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `topic` varchar(500) DEFAULT NULL,
  `mesa` int(5) DEFAULT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `folio` varchar(100) NOT NULL,
  `qrUrl` varchar(500) NOT NULL,
  `registration_date` date NOT NULL,
  `valid_until` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `badges`
--

INSERT INTO `badges` (`id`, `user_id`, `university_id`, `event_role_id`, `topic`, `mesa`, `imagen`, `folio`, `qrUrl`, `registration_date`, `valid_until`, `created_at`, `updated_at`) VALUES
(49, 89, 3, 3, NULL, NULL, '/storage/img/QZUi9bAzH4D3yiLm8TkdyWDOp49w3CZbi1Z4Xe3L.png', '24-003-089', '89_qr.png', '2024-03-31', '2025-03-31', '2024-03-31 07:21:50', '2024-03-31 07:21:50'),
(50, 90, 2, 2, 'vlvgcuc', NULL, '/storage/img/tdURz2DcyRTXxU0njOKJ7jlYjuk5AIgPL03EjjtL.png', '24-002-090', '90_qr.png', '2024-03-31', '2025-03-31', '2024-03-31 07:23:24', '2024-03-31 07:23:24'),
(51, 91, 3, 3, NULL, NULL, '/storage/img/8lxdDzEouLB9BwTjuxE6eZGEKKp1RF1Sxpgg73NC.png', '24-003-091', '91_qr.png', '2024-03-31', '2025-03-31', '2024-03-31 07:28:31', '2024-03-31 07:28:31'),
(52, 92, 2, 1, NULL, NULL, '/storage/img/rda3uIvDJvmwoQeRO8FoHStvmvEQ6vovnN1jMgl9.png', '24-002-092', '92_qr.png', '2024-04-08', '2025-04-08', '2024-04-08 17:57:18', '2024-04-08 17:57:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_roles`
--

CREATE TABLE `event_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `event_roles`
--

INSERT INTO `event_roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Participante', NULL, '2024-03-15 11:15:40', '2024-03-15 11:15:40'),
(2, 'Ponente', NULL, '2024-03-15 11:16:10', '2024-03-15 11:16:10'),
(3, 'Expositor', NULL, '2024-03-15 11:16:21', '2024-03-15 11:16:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `nombre`) VALUES
(1, 'Turismo de bienestar, salud e inclusivo'),
(2, 'Turismo, gastronomía y ecología.'),
(3, 'Turismo rural, ecoturismo y turismo comunitario'),
(4, 'Gentrificación, población flotante y turístificación'),
(5, 'Experiencias turísticas y pueblos mágicos'),
(6, 'Gestión, competividad y mercadotecnia turística');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_13_233946_create_universities_table', 1),
(6, '2024_03_13_235358_create_event_roles_table', 1),
(7, '2024_03_14_002542_create_badges_table', 2),
(8, '2024_03_14_004532_add_fields_to_users_table', 3),
(9, '2024_04_03_030429_create_user_taller_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallers`
--

CREATE TABLE `tallers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `capacidad` int(3) NOT NULL,
  `img` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tallers`
--

INSERT INTO `tallers` (`id`, `name`, `description`, `capacidad`, `img`, `updated_at`, `created_at`) VALUES
(1, 'Cocina maritima', 'Un curso de cocina impartida por veracruzanos', 42, '/storage/assets/imgTaller/7eKpTzGd4fABHDFoNlwzxVJaj8h4hskSaWr6p9eU.png', '2024-04-09 23:08:50', '2024-04-03 05:21:21'),
(3, 'Higiene en el trabajo', 'Un curso sobre como mantener limpio el espacio de trabajo', 72, '/storage/assets/imgTaller/PdqLeAnsoF8gU8HjyZtIucXAlCR3B6kKP8uN61yl.jpg', '2024-04-09 23:08:50', '2024-04-07 03:45:48'),
(4, 'Estadisticas inteligentes', 'Un taller en el cual los participantes aprenderan sobre como manejar de manera eficiente sus proyectos', 49, '/storage/assets/imgTaller/We74ZpQxyVqaEHrf3DkDKd9uqKLu5Ilc9KbdFtKL.png', '2024-04-07 08:15:22', '2024-04-07 03:49:01'),
(5, 'Hoteleria', 'un taller sobre la hoteleria', 33, '/storage/assets/imgTaller/7jjOkKdXSj7XFEWrnJJqEN1FOVJ0XGPAU6Nur5gh.png', '2024-04-09 23:08:50', '2024-04-07 03:50:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `img` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `universities`
--

INSERT INTO `universities` (`id`, `name`, `domain`, `img`, `created_at`, `updated_at`) VALUES
(2, 'Universidad Politecnica de Chiapas', '@upch.edu.mx', NULL, '2024-03-15 09:50:53', '2024-03-15 09:50:53'),
(3, 'Universidad Politecnica de QuintanaRoo', '@upqroo.edu.mx', NULL, '2024-03-15 09:52:31', '2024-03-15 09:52:31'),
(4, 'Universidad Politecnica de Valadolid', '@upv.edu.mx', NULL, '2024-04-02 08:51:47', '2024-04-02 08:51:47'),
(7, 'Universidad Politecnica de Bacalar', '@upb.edu.mx', '/storage/assets/imgUniversity/Dp2rfJuFBVZcZaHTIF50yoh8E7gk2CkjEA4qEYQl.jpg', '2024-04-02 09:18:46', '2024-04-02 09:18:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `apellidoPaterno` varchar(255) NOT NULL,
  `apellidoMaterno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` int(2) NOT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellidoPaterno`, `apellidoMaterno`, `email`, `email_verified_at`, `password`, `telefono`, `remember_token`, `role`, `university_id`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'Jezer', '', '', 'j3z3rsamuel@gmail.com', NULL, '$2y$10$pQTqBr0YmL5EW1xuyjtrre3uuLGaccokck2MHMbU4NVaiMv82X/6m', NULL, NULL, 1, NULL, 1, '2024-03-14 06:59:24', '2024-03-14 06:59:24'),
(2, 'Rafael', '', '', 'rafael@gmail.com', NULL, '$2y$10$B86zXiNyqJGs2ubNIFEKBuzyCDBR/wcZCfcs/6MpdtkaZPlNc4FHi', NULL, NULL, 1, NULL, 0, '2024-03-15 09:02:15', '2024-03-15 09:02:15'),
(88, 'Josue', 'Chi', 'Castro', 'josue@upb.edu.mx', NULL, '$2y$10$z0y/0b3K3aQkS7cSDReLI.xiBwGWP2OoiJnDiPtyb2QGGXLLYLagS', '+52 983 752 2509', NULL, 1, NULL, 0, '2024-03-31 07:20:44', '2024-03-31 07:20:44'),
(89, 'Josue', 'Chi', 'Castro', 'dennis@upqroo.edu.mx', NULL, '$2y$10$XQ1jrQ1h1YSzBs/aXJaFkuvrTD4pF7NrrRaj6H.l0RSLv7.Z0y6Xm', '+52 983 752 2509', NULL, 3, 3, 0, '2024-03-31 07:21:50', '2024-03-31 07:21:50'),
(90, 'Josue', 'Cervantes', 'Palacios', 'pablo@upb.edu.mx', NULL, '$2y$10$K5wyb8wOumDh5CHYi/VM.OKRSC6AYn.nDoBVs1hiVNRthKAbOboc.', '+52 983 752 2509', NULL, 2, 2, 0, '2024-03-31 07:23:24', '2024-03-31 07:23:24'),
(91, 'Dennis', 'Rios', 'Palacios', '2022012367@upb.edu.mx', NULL, '$2y$10$gbWFilRhfTf5MQ0d3dSMH.mdVbNfZq48qgEd5fePOCL08bQwPVIxi', '+52 983 752 2509', NULL, 3, 3, 0, '2024-03-31 07:28:31', '2024-03-31 07:28:31'),
(92, 'Josue', 'Chi', 'Castro', 'josue2@upb.edu.mx', NULL, '$2y$10$qnDCeGoWlmz000dpU8eMoO6IVEC5lMpdL6PEwddoeZLmZYrylbM.u', '+52 983 752 2509', NULL, 1, 2, 0, '2024-04-08 17:57:16', '2024-04-08 17:57:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_taller`
--

CREATE TABLE `user_taller` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `taller_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_taller`
--

INSERT INTO `user_taller` (`user_id`, `taller_id`) VALUES
(89, 1),
(89, 3),
(89, 5),
(92, 1),
(92, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `folio` (`folio`),
  ADD KEY `badges_user_id_foreign` (`user_id`),
  ADD KEY `badges_university_id_foreign` (`university_id`),
  ADD KEY `badges_event_role_id_foreign` (`event_role_id`);

--
-- Indices de la tabla `event_roles`
--
ALTER TABLE `event_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `tallers`
--
ALTER TABLE `tallers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `universities_domain_unique` (`domain`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_university_id_foreign` (`university_id`);

--
-- Indices de la tabla `user_taller`
--
ALTER TABLE `user_taller`
  ADD PRIMARY KEY (`user_id`,`taller_id`),
  ADD KEY `user_taller_taller_id_foreign` (`taller_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `event_roles`
--
ALTER TABLE `event_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tallers`
--
ALTER TABLE `tallers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `badges`
--
ALTER TABLE `badges`
  ADD CONSTRAINT `badges_event_role_id_foreign` FOREIGN KEY (`event_role_id`) REFERENCES `event_roles` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `badges_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `badges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `user_taller`
--
ALTER TABLE `user_taller`
  ADD CONSTRAINT `user_taller_taller_id_foreign` FOREIGN KEY (`taller_id`) REFERENCES `tallers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_taller_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
