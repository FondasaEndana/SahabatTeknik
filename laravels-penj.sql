-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2023 pada 08.30
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravels-penj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE `image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parrent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `prefix`, `kode`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Tools', 'label', 'tools', NULL, '2023-03-03 00:13:38', '2023-03-03 00:13:38'),
(2, 'Material', 'label', 'material', NULL, '2023-03-03 00:13:39', '2023-03-03 00:13:39'),
(3, 'Furnitur', 'label', 'furnitur', NULL, '2023-03-03 00:13:39', '2023-03-03 00:13:39'),
(4, 'Aksesoris', 'label', 'aksesoris', NULL, '2023-03-03 00:13:39', '2023-03-03 00:13:39'),
(5, 'Listrik', 'label', 'listrik', NULL, '2023-03-03 00:13:39', '2023-03-03 00:13:39'),
(6, 'Lainnya', 'label', 'lainnya', NULL, '2023-03-03 00:13:39', '2023-03-03 00:13:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `label`
--

CREATE TABLE `label` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parrent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_19_012158_create_settings_table', 1),
(6, '2022_02_22_014329_create_kategori_table', 1),
(7, '2022_02_22_084924_create_portofolio_table', 1),
(8, '2022_02_22_085102_create_label_table', 1),
(9, '2022_02_22_085112_create_image_table', 1),
(10, '2022_03_07_143337_create_produk_table', 1),
(11, '2022_03_07_143618_create_produkdetail_table', 1),
(12, '2022_03_07_144322_create_pelanggan_table', 1),
(13, '2022_03_07_144520_create_transaksi_table', 1),
(14, '2022_03_07_144921_create_transaksidetail_table', 1),
(15, '2022_03_08_043703_create_restok_table', 1),
(16, '2022_03_17_055044_add_bank_on_settings_table', 1),
(17, '2022_03_19_070852_add_desc_on_settings_table', 1),
(18, '2022_06_12_130348_add_some_field_on_transaksi_table', 1);

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
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jk`, `alamat`, `telp`, `users_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Salmon', 'Laki-laki', 'malang', '08123456789', '3', NULL, '2023-03-03 00:13:35', '2023-03-03 00:13:35'),
(2, 'Sri', 'Perempuan', 'malang', '08123456799', '4', NULL, '2023-03-03 00:13:36', '2023-03-03 00:13:36'),
(3, 'Joko', 'Laki-laki', 'malang', '08234123123', '5', NULL, '2023-03-03 00:13:36', '2023-03-03 00:13:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `berat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga_jual`, `slug`, `desc`, `satuan`, `deleted_at`, `created_at`, `updated_at`, `berat`) VALUES
(1, 'Paku kayu tembok dinding', 14000, 'paku-kayu-tembok-dinding', 'Kondisi: Baru, Berat:50gr', 'Gram', NULL, '2023-03-03 00:13:40', '2023-03-03 00:13:40', '100'),
(2, 'Keramik 40x40 krem ivory motif marble marmer asap', 42000, 'keramik-40x40-krem-ivory-motif-marble-marmer-asap', 'Kondisi: Baru, Berat :200gr', 'Gram', NULL, '2023-03-03 00:13:40', '2023-03-03 00:13:40', '100'),
(3, 'Tang toho professional cutting pliers 7 kualitas bagus', 105000, 'tang-toho-professional-cutting-pliers-7-kualitas-bagus', 'Kondisi: Baru, Berat:500gr', 'Pcs', NULL, '2023-03-03 00:13:40', '2023-03-03 00:13:40', '100'),
(4, 'Palu Tukang kombinasi konde bulat kambing pencabut Paku', 27000, 'palu-tukang-kombinasi-konde-bulat-kambing-pencabut-paku', 'Kondisi: Baru, Berat:450gr', 'Pcs', NULL, '2023-03-03 00:13:40', '2023-03-03 00:13:40', '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produkdetail`
--

CREATE TABLE `produkdetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `restok_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `restok`
--

CREATE TABLE `restok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodetrans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namatoko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglbeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `penanggungjawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_namapendek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paginationjml` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lembaga_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lembaga_jalan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lembaga_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lembaga_kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lembaga_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `app_nama`, `app_namapendek`, `paginationjml`, `lembaga_nama`, `lembaga_jalan`, `lembaga_telp`, `lembaga_kota`, `lembaga_logo`, `created_at`, `updated_at`, `bank_nama`, `bank_rekening`, `desc`, `desc2`) VALUES
(1, 'Nama App', 'Bae', '10', 'PT Baemon Indonesia', 'Jl.Raya Ramai Sekali No 2 Kav. B', '0341-123456', 'Malang', 'assets/upload/logo.png', '2023-03-03 00:13:34', '2023-03-03 00:13:34', 'Bank BRI', '5252-123456-123', 'Termurah, Terpercaya dan Terlengkap.', 'Semua ada semua bisa.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodetrans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelanggan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pelanggan_tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglbeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppn` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_konfirmasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalbayar` int(11) NOT NULL,
  `penanggungjawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provinsi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '11',
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '255',
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '100',
  `courir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'jne',
  `ongkir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `totaltagihan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksidetail`
--

CREATE TABLE `transaksidetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_akhir` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jml_berat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomerinduk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipeuser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `nomerinduk`, `tipeuser`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '123', 'admin', NULL, '$2y$10$vVPZCUJae8PfGA2W/sByN.OBHmijF6h5HtqMPnVGUYTzb5WQEV9u.', NULL, '2023-03-03 00:13:32', '2023-03-03 00:13:32'),
(2, 'Owner', 'owner@gmail.com', 'owner', '123', 'owner', NULL, '$2y$10$c13pkhRpupM0S2zJiwRw1OibZB6CCOlau8T/v627OTa0tmmn6LK2a', NULL, '2023-03-03 00:13:32', '2023-03-03 00:13:32'),
(3, 'Salmon', 'pelanggan@gmail.com', 'pelanggan', NULL, 'pelanggan', NULL, '$2y$10$gdE9QPaELXHOQJo.XswgCugMvNENhLA/V4ddyy9objeZikzfwc/jK', NULL, '2023-03-03 00:13:35', '2023-03-03 00:13:35'),
(4, 'Sri', 'sri@gmail.com', 'sri', NULL, 'pelanggan', NULL, '$2y$10$r/4swP75iOZxSkd70V1TkO3dWXl3YnXHL9YR4NhC2GVCQMc8MkMSq', NULL, '2023-03-03 00:13:36', '2023-03-03 00:13:36'),
(5, 'Joko', 'joko@gmail.com', 'joko', NULL, 'pelanggan', NULL, '$2y$10$wMnB.5VsZYRXRIJ2afpoFurAkCnYGR/R9xM5yt3Il9LAwgW8ejvge', NULL, '2023-03-03 00:13:36', '2023-03-03 00:13:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `label`
--
ALTER TABLE `label`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produkdetail`
--
ALTER TABLE `produkdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `restok`
--
ALTER TABLE `restok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksidetail`
--
ALTER TABLE `transaksidetail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `label`
--
ALTER TABLE `label`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produkdetail`
--
ALTER TABLE `produkdetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `restok`
--
ALTER TABLE `restok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksidetail`
--
ALTER TABLE `transaksidetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
