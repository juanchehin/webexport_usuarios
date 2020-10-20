-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 03:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usuarios`
--
CREATE DATABASE IF NOT EXISTS `usuarios` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `usuarios`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `bsp_alta_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_alta_usuario` (`pApellido` VARCHAR(60), `pNombre` VARCHAR(60), `pEdad` TINYINT(4), `pEmail` VARCHAR(120), `pTelefono` VARCHAR(20))  SALIR:BEGIN
	/*
    Permite dar de alta un usuario controlando que el email no exista ya. 
    Devuelve OK o el mensaje de error en Mensaje.
    */
	DECLARE pIdUsuario int;
	-- Manejo de error en la transacción
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SHOW ERRORS;
		-- SELECT 'Error en la transacción. Contáctese con el administrador.' Mensaje;
		-- NULL AS Id;
		ROLLBACK;
	END;
    -- Controla que el correo sea obligatorio 
	IF pEmail = '' OR pEmail IS NULL THEN
		SELECT 'Debe proveer un nombre para el correo' AS Mensaje;
		LEAVE SALIR;
    END IF;

    -- Controla que no exista un Email
	IF EXISTS (SELECT Email FROM usuarios WHERE Email = pEmail) THEN
			SELECT 'Ya existe un Email igual' AS Mensaje;
			LEAVE SALIR;
    END IF;
    
	START TRANSACTION;
		SET pIdUsuario = 1 + (SELECT COALESCE(MAX(IdUsuario),0) FROM usuarios);

		INSERT INTO usuarios(IdUsuario,Apellido,Nombre,Edad,Email,Telefono) VALUES(pIdUsuario,pApellido,pNombre,pEdad,pEmail,pTelefono);

    SELECT 'Ok' AS Mensaje;
    COMMIT;

END$$

DROP PROCEDURE IF EXISTS `bsp_borra_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_borra_usuario` (`pIdUsuario` INT)  SALIR:BEGIN
	/*
    Permite borrar un usuario. 
    Devuelve OK o el mensaje de error en Mensaje.
	*/
    
    DELETE FROM usuarios WHERE IdUsuario = pIdUsuario;
    
    SELECT 'OK' AS Mensaje;
END$$

DROP PROCEDURE IF EXISTS `bsp_dame_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_dame_usuario` (`pIdUsuario` INT)  SALIR:BEGIN
	/*
	Permite listar un usuarios de la BD.
    */
    
-- Controla que el usuario exista
	IF NOT EXISTS(SELECT IdUsuario FROM usuarios WHERE IdUsuario = pIdUsuario) THEN
		SELECT 'Usuario Inexistente' AS Mensaje;
		LEAVE SALIR;
    END IF;
    
	SELECT		IdUsuario,Apellido,Nombre,Edad,Email,Telefono
    FROM		usuarios
    where		IdUsuario = pIdUsuario;

END$$

DROP PROCEDURE IF EXISTS `bsp_dame_usuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_dame_usuarios` ()  SALIR:BEGIN
	/*
	Permite listar los usuarios ordenadas por Apellido.
    */
    
	SELECT		IdUsuario,Apellido,Nombre,Edad,Email,Telefono
    FROM		usuarios
    ORDER BY	Apellido asc;


	-- SELECT COUNT(IdUsuario) AS cantUsuarios
	-- FROM usuarios;

END$$

DROP PROCEDURE IF EXISTS `bsp_modifica_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `bsp_modifica_usuario` (`pIdUsuario` INT, `pApellido` VARCHAR(60), `pNombre` VARCHAR(60), `pEdad` TINYINT(4), `pEmail` VARCHAR(120), `pTelefono` VARCHAR(20))  SALIR:BEGIN
	/*
    Permite modificar un usuario existente controlando que el email no exista ya. 
    Devuelve OK o el mensaje de error en Mensaje.
    */
	-- Manejo de error en la transacción
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		-- SHOW ERRORS;
		SELECT 'Error en la transacción. Contáctese con el administrador.' Mensaje;
		ROLLBACK;
	END;
-- Controla que exista el usuario
	IF NOT EXISTS(SELECT IdUsuario FROM usuarios WHERE IdUsuario = pIdUsuario) THEN
		SELECT 'Usuario inexistente' AS Mensaje;
		LEAVE SALIR;
    END IF;

    -- Controla que el correo sea obligatorio 
	IF pEmail = '' OR pEmail IS NULL THEN
		SELECT 'Debe proveer un nombre para el correo' AS Mensaje;
		LEAVE SALIR;
    END IF;
    -- Controla que no exista un email con el mismo nombre
	IF EXISTS(SELECT email FROM usuarios WHERE email = pEmail
				AND IdUsuario != pIdUsuario) THEN
		SELECT 'Ya existe una email con ese nombre' AS Mensaje;
		LEAVE SALIR;
    END IF;


	UPDATE usuarios SET Apellido = pApellido WHERE IdUsuario = pIdUsuario;
    UPDATE usuarios SET Nombre = pNombre WHERE IdUsuario = pIdUsuario;
    UPDATE usuarios SET Edad = pEdad WHERE IdUsuario = pIdUsuario;
    UPDATE usuarios SET Email = pEmail WHERE IdUsuario = pIdUsuario;
	UPDATE usuarios SET Telefono = pTelefono WHERE IdUsuario = pIdUsuario;

	SELECT 'Ok' AS Mensaje;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2020_10_20_101140_create_usuarios_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `Apellido` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Edad` int(11) NOT NULL,
  `Email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `Apellido`, `Nombre`, `Edad`, `Email`, `Telefono`, `updated_at`) VALUES
(2, 'Maradona lopo', 'Diego', 90, 'diegoMarado@gamail.com', '4566', '2020-10-20'),
(3, 'Batistura', 'Roman', 33, 'batigol@gmail.com', '1234', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
