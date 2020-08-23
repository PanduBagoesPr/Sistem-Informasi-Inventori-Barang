-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2020 pada 16.23
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipenjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_status`, `created_at`, `updated_at`) VALUES
(3, 'Raksusun', 'Active', '2020-06-26 11:31:22', '2020-06-26 11:31:22'),
(4, 'Cermin Kaca', 'Active', '2020-06-26 21:44:30', '2020-06-26 21:44:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `employee_code` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_datebirth` date NOT NULL,
  `employee_gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_zipcode` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_phone` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_email` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_role` enum('admin','employee') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_code`, `employee_name`, `employee_datebirth`, `employee_gender`, `employee_address`, `employee_zipcode`, `employee_phone`, `employee_email`, `employee_role`, `created_at`, `updated_at`) VALUES
(1, 'E01', 'Admin', '1998-06-28', 'male', 'Jl. Ababil', '67120', '08231233123', 'admin@gmail.com', 'admin', '2020-06-27 22:45:52', '2020-06-27 22:45:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `instocks`
--

CREATE TABLE `instocks` (
  `instock_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `instock_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instock_price` bigint(100) NOT NULL,
  `instock_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instocks`
--

INSERT INTO `instocks` (`instock_id`, `vendor_id`, `product_id`, `instock_total`, `instock_price`, `instock_date`, `created_at`, `updated_at`) VALUES
(4, 1, 2, '40', 400000, '2020-06-27', '2020-06-26 11:43:09', '2020-06-26 11:43:09'),
(5, 1, 5, '20', 120000, '2020-06-27', '2020-06-26 11:45:00', '2020-06-26 11:45:00'),
(7, 2, 7, '100', 10000000, '2020-06-27', '2020-06-26 21:51:01', '2020-06-26 21:51:01');

--
-- Trigger `instocks`
--
DELIMITER $$
CREATE TRIGGER `Add_stock` AFTER INSERT ON `instocks` FOR EACH ROW BEGIN
UPDATE products set total = total + NEW.instock_total
WHERE product_id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_08_053843_create_categories_table', 1),
(5, '2020_05_08_071042_create_employees_table', 1),
(6, '2020_05_08_071323_create_vendors_table', 1),
(7, '2020_05_08_072636_create_products_table', 1),
(8, '2020_05_08_073249_create_transactions_table', 1),
(9, '2020_05_19_232443_create_shipments_table', 1),
(10, '2020_05_26_234412_create_instocks_table', 1),
(11, '2020_06_03_184713_create_totalstocks_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` bigint(20) NOT NULL DEFAULT 0,
  `product_price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `vendor_id`, `product_name`, `product_status`, `total`, `product_price`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'Raksusun Tingkat 2', 'Active', 35, 75000, '2020-06-26 11:33:35', '2020-06-26 11:33:35'),
(3, 3, 1, 'Raksusun Tingkat 3', 'Active', 25, 120000, '2020-06-26 11:34:03', '2020-06-26 11:34:03'),
(5, 3, 1, 'Raksusun Tingkat 4', 'Active', 10, 150000, '2020-06-26 11:44:31', '2020-06-26 11:44:31'),
(7, 3, 2, 'Raksusun Tingkat 1', 'Active', 75, 50000, '2020-06-26 21:43:32', '2020-06-26 21:43:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipments`
--

CREATE TABLE `shipments` (
  `shipment_id` bigint(20) UNSIGNED NOT NULL,
  `trxtion_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `shipment_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipment_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipment_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `trxtion_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `trxtion_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trxtion_date` date NOT NULL,
  `total_out_stock` bigint(20) NOT NULL,
  `trxtion_price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`trxtion_id`, `product_id`, `trxtion_code`, `trxtion_date`, `total_out_stock`, `trxtion_price`, `created_at`, `updated_at`) VALUES
(8, 5, 'TR401', '2020-06-27', 10, 150000, '2020-06-26 11:49:06', '2020-06-26 11:49:06'),
(11, 7, 'TR101', '2020-06-27', 25, 50000, '2020-06-26 21:51:47', '2020-06-26 21:51:47'),
(12, 2, 'T201', '2020-05-28', 5, 75000, '2020-06-27 22:46:47', '2020-06-27 22:46:47');

--
-- Trigger `transactions`
--
DELIMITER $$
CREATE TRIGGER `Out_stock` AFTER INSERT ON `transactions` FOR EACH ROW BEGIN
UPDATE products set total = total - NEW.total_out_stock
WHERE product_id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$S99hDrvpTUazkzSd0gwBmu7Nmh3LFzrOgadjsxSYUgZ5UZAwtzwre', NULL, '2020-06-23 20:30:52', '2020-06-23 20:30:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_zipcode` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_email` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_phone` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `vendor_address`, `vendor_zipcode`, `vendor_email`, `vendor_phone`, `vendor_status`, `created_at`, `updated_at`) VALUES
(1, 'Jaya Abadi', 'coba tes', '67118', 'jayaabadi@gmail.id', '08231233120', 'Active', '2020-06-23 20:31:22', '2020-06-23 20:31:22'),
(2, 'Abadi Jaya', 'Jl. Ababil', '67118', 'admin@gmail.com', '08231233122', 'Active', '2020-06-26 21:42:20', '2020-06-26 21:42:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `instocks`
--
ALTER TABLE `instocks`
  ADD PRIMARY KEY (`instock_id`),
  ADD KEY `instocks_product_id_foreign` (`product_id`),
  ADD KEY `instocks_vendor_id_foreign` (`vendor_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`);

--
-- Indeks untuk tabel `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`shipment_id`),
  ADD KEY `shipments_trxtion_id_foreign` (`trxtion_id`),
  ADD KEY `shipments_product_id_foreign` (`product_id`),
  ADD KEY `shipments_employee_id_foreign` (`employee_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trxtion_id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `instocks`
--
ALTER TABLE `instocks`
  MODIFY `instock_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `shipments`
--
ALTER TABLE `shipments`
  MODIFY `shipment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trxtion_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `instocks`
--
ALTER TABLE `instocks`
  ADD CONSTRAINT `instocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `instocks_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);

--
-- Ketidakleluasaan untuk tabel `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `shipments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `shipments_trxtion_id_foreign` FOREIGN KEY (`trxtion_id`) REFERENCES `transactions` (`trxtion_id`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
