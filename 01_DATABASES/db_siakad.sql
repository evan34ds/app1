-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2024 at 12:30 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `slug_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `slug_kategori`) VALUES
(1, 'Prestasi', 'Prestasi'),
(4, 'Pengumuman', 'Pengumuman'),
(5, 'Programming', 'Programming'),
(6, 'Aktifitas', 'Aktifitas');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1604578826, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kd_prodi` int(10) NOT NULL,
  `prodi` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `singkat` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ketua_prodi` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nik` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `akreditasi` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kd_prodi`, `prodi`, `singkat`, `ketua_prodi`, `nik`, `akreditasi`) VALUES
(2, 'Pendidikan Agama Kristen', 'PAK', 'Yanwar Pranowo, S.Pd', '2093837365756567', 'A'),
(5, 'Mate', 'z', 'Jem', '7201021810960002', 'qa'),
(9, 'TIKOM', 'z', 'Jem', '7201021810960002', 'A'),
(23, 'Biologi', 'Bio', 'Des', '7201021810960002', 'A'),
(1212, 'Bahasa Ingris', 'BI', 'ERNAS', '7201053003020001', 'A'),
(233349, 'Matematika', 'z', 'Jem', '7201041302970004', 'qa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akses_fitur`
--

CREATE TABLE `tbl_akses_fitur` (
  `id_akses_fitur_mhs` int(4) NOT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_khs` int(1) DEFAULT '1',
  `id_krs` int(11) DEFAULT '0',
  `id_ta` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_akses_fitur`
--

INSERT INTO `tbl_akses_fitur` (`id_akses_fitur_mhs`, `id_mhs`, `id_khs`, `id_krs`, `id_ta`) VALUES
(182, 24, 1, 0, 7),
(188, 25, 0, 1, 5),
(191, 0, 1, 0, NULL),
(195, 26, 1, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `berita_id` int(11) NOT NULL,
  `judul_berita` varchar(150) DEFAULT NULL,
  `slug_berita` varchar(150) DEFAULT NULL,
  `isi` longtext,
  `gambar` varchar(150) DEFAULT NULL,
  `tgl_berita` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`berita_id`, `judul_berita`, `slug_berita`, `isi`, `gambar`, `tgl_berita`, `status`, `kategori_id`, `id_user`) VALUES
(21, 'Kenaikan Gaji', 'kenaikan-gaji', '<p style=\"margin-left:0px; margin-right:0px\">siakad adalah singkatan dari sistem informasi akademik, sistem ini adalah judul tugas akhir saya ketika kuliah di salah satu politeknik di bandung tahun 2014 lalu, walaupun hanya sebatas tugas akhir tapi aplikasi yang saya buat punya banyak fitur layaknya sistem informasi premium yang ditawarkan oleh perusahaan.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\">karena ketika itu saya membuatya memang berdasarkan&nbsp;permintaan pihak yang berkewenangan dikampus untuk fitur yang bersangkutan, misalnya untuk fitur keuangan saya langsung interview bagian keuangan untuk mendapatkan informasi dan kendala yang ditemukan agar aplikasi ini menjadi jawaban atas kendala tersebut.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\">sistem informasi ini dibuat menggunakan framework codeigniter 2.x, untuk databasenya menggunakan framework Bootsrap dan beberapa proses dalam mengelola data menggunakan Ajax agar lebih menarik dan interaktif.</p>\r\n', '2A0AD922-E971-459B-875B-C2D3EE036F42-250x250.jpeg', '2022-06-23', 'published', 5, 1),
(22, 'Level Pengguna Sistem', 'level-pengguna-sistem', '<h3 style=\"font-family: Quicksand; line-height: 40px; color: rgb(51, 51, 51); margin-top: 20px; font-size: 35px; text-align: justify;\">Level Pengguna Sistem</h3><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; color: rgb(85, 85, 85); font-family: \"Open Sans\"; font-size: 14px; text-align: justify;\">ada 4 level pengguna dalam sistem informasi ini:</p><ol style=\"margin: 30px 0px; padding-left: 25px; color: rgb(85, 85, 85); font-family: \"Open Sans\"; font-size: 14px;\"><li style=\"margin: 0px 0px 10px; text-align: justify;\">level administrator, level ini adalah level teringgi, dia  mempunyai hak akses penuh terhadap sistem informasi akademik.</li><li style=\"margin: 0px 0px 10px; text-align: justify;\">level jurusan, level ini hanya mempunyai hak akses mengelola informasi yang berhubungan dengan jurusan nya sendiri, level jurusan sendiri ditentukan oleh administrator.</li><li style=\"margin: 0px 0px 10px; text-align: justify;\">level dosen, level ini hanya bisa mengakses jadwal perkuliahan dan memberi nilai sesuai matakuliah yang di aajr oleh dosen yang bersangkutan.</li><li style=\"margin: 0px 0px 10px; text-align: justify;\">level keuangan yang hanya mempunyai hak akses untuk module keuangan saja seperti pembayaran SSP, laporan keuangan dan lai nya.</li></ol>', '1651448681_d8cab8ea6dfc23ed723d.jpg', '2022-03-27', 'published', 5, 1),
(52, 'Sejarah Gerakan Mahasiswa di Indonesia', 'sejarah-gerakan-mahasiswa-di-indonesia', 'Pada tahun ini, terdapat gerakan mahasiswa bernama Boedi Oetomo.  Boedi Oetomo adalah wadah perjuangan yang pertama kali memiliki struktur pengorganisasian modern, bertujuan untuk menjamin kehidupan bangsa yang terhormat.  Gerakan ini didirikan di Jakarta, 20 Mei 1908 oleh para pemuda STOVIA atau sekolah dokter di Jawa.  Pada kongres pertama, 5 Oktober 1908 di Yogyakarta, ditetapkan tujuan perkumpulan yaitu untuk kemajuan selaras buat negeri dan bangsa, terutama dengan memajukan pengajaran, pertanian, peternakan dan dagang, teknik dan industri, serta kebudayaan. Fokus utama dari BU adalah pengembangan generasi muda di bidang sosial, pendidikan, pengajaran, dan kebudayaan.  Sejak saat itu, Budi Utomo mengalami perkembangan yang sangat pesat. Tercatat akhir tahun 1909, BU telah memiliki sebanyak 40 cabang dengan kurang lebih 10.000 anggota\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul \"Sejarah Gerakan Mahasiswa di Indonesia, Sejak 1908 hingga Reformasi\", Klik untuk baca: https://www.kompas.com/stori/read/2021/08/29/110000279/sejarah-gerakan-mahasiswa-di-indonesia-sejak-1908-hingga-reformasi?page=all.\r\nPenulis : Verelladevanka Adryamarthanino\r\nEditor : Nibras Nada Nailufar\r\n\r\nDownload aplikasi Kompas.com untuk akses berita lebih mudah dan cepat:\r\nAndroid: https://bit.ly/3g85pkA\r\niOS: https://apple.co/3hXWJ0L', '1651448897_5c276cf1e9ef3183cbb7.jpg', '2022-04-15', 'published', 5, 9),
(54, 'Kunjungan Bapak Bupati Bannggai', 'kunjungan-bapak-bupati-bannggai', '<p style=\"text-align:justify\">DKISP BANGGAI – Mewakili Bupati Banggai, Asisten Administrasi Perekonomian dan Pembangunan (Asisten II) Sekretariat Daerah, Ferlyn Yunice Theodora Monggesang, M.Si menjadi narasumber (narsum) dalam seminar nasional yang digelar di Aula Dinas TPHP Banggai, Kelurahan Tanjung Tuwis, Kecamatan Luwuk, pada Kamis (28/4/22).</p>\r\n\r\n<p style=\"text-align:justify\">Kegiatan yang dirangkaian dengan pelaksanaan Paskah itu, diselenggarakan oleh Badan Pengurus Cabang (BPC) Gerakan Mahasiswa Kristen Indonesia (GMKI) Luwuk dengan mengusung tema “Arah Kebijakan Strategis Pemerintah dalam Investasi pada Sektor Sumber Daya Alam sebagai Pembangunan Ekonomi Nasional menuju Indonesia Emas 2045”.</p>\r\n\r\n<p style=\"text-align:justify\">Sebelum Asisten II Setda Banggai memaparkan materi, ia terlebih dahulu menyampaikan salam hangat dan permohonan maaf Bupati Ir. H Amirudin atas ketidakhadiran karena pada saat yang sama beliau sedang melaksanakan tugas yang sama</p>\r\n', '1651413486_a6938f51ad9b36f34572.jpg', '2022-04-28', 'published', 5, 9),
(56, 'Contoh Artikel Pendidikan Linguistik', 'contoh-artikel-pendidikan-linguistik', '<p style=\"text-align:justify\">Bahasa verbal merupakan suatu bahasa yang dituangkan dalam bentuk ucapan atau tulisan. Sementara itu, menurut Mulyana (2005) bahasa verbal merupakan bahasa yang penggunaannya menggunakan simbol-simbol agar dipahami oleh suatu komunitas.</p>\r\n\r\n<p style=\"text-align:justify\">Apabila terjadi permasalahan dalam perkembangan bahasa verbal maka bisa jadi individu mengalami gangguan-gangguan pada perkembangan bahasa verbal. Pada artikel kali ini kita akan mengulas lebih jauh tentang gangguan, tanda-tanda gangguan, faktor yang berpengaruh dan juga terapi untuk memaksimalkan perkembangan bahasa verbal.</p>\r\n', '1651420455_521e4e070ae6ffd75c53.jpg', '2022-04-29', 'published', 5, 1),
(57, 'Kelap-kelip Bintang Menemaniku  ', 'kelap-kelip-bintang-menemaniku', '<p style=\"text-align:justify\">Detik ini tak biasanya ku menepi dermaga malam menjadi tumpuan tuk beranjak pergi Aku dengan setumpuk keyakinan meninggalkan hiruk-pikuk urban yang sumpek ini</p>\r\n\r\n<p style=\"text-align:justify\">Malam diatas sampan seadanya aku berlayar membelah samudera&nbsp; Kubiarkan udara dingin membelai tubuhku yang ringkih&nbsp; tak masalah, sepanjang lisanku masih lincah berucap khidmat&nbsp;<br />\r\nmaka biarlah kegigilan ini menyayat hati</p>\r\n\r\n<p style=\"text-align:justify\">Diatas langit yang bertabur bintang<br />\r\nKelap-kelip cahaya menghiasi angkasa raya&nbsp;<br />\r\njagad malam ku lukiskan melalui untaian kata, sebuah puisi yang tak seberapa<br />\r\ntapi sudah cukup untuk mewakili jiwa yang nestapa</p>\r\n\r\n<p style=\"text-align:justify\">Konten ini telah tayang di Kompasiana.com dengan judul &quot;Kelap-kelip Bintang Menemaniku&quot;, Klik untuk baca:<br />\r\nhttps://www.kompasiana.com/musafar54317/626c177f3794d11edf6f6c63/kelap-kelip-bintang-menemani-ku</p>\r\n\r\n<p style=\"text-align:justify\">Kreator: Musafar</p>\r\n\r\n<p style=\"text-align:justify\">Kompasiana adalah platform blog, setiap konten menjadi tanggungjawab kreator.</p>\r\n\r\n<p style=\"text-align:justify\">Tulis opini Anda seputar isu terkini di Kompasiana.com</p>\r\n', '1651329640_f1288c2593522ac0a7a9.jpg', '2022-04-20', 'published', 1, 1),
(60, 'Manajemen Pendidikan dan Ilmu Sosial (JMPIS) ', 'manajemen-pendidikan-dan-ilmu-sosial-jmpis', '<p> </p>\r\n\r\n<p><strong>Jurnal Manajemen Pendidikan dan Ilmu Sosial (JMPIS)</strong> merupakan jurnal penelitian manajemen diterbitkan sejak tahun 2020 oleh Dinasti Riview.  Jurnal ini bertujuan untuk menyebarluaskan hasil penelitian kepada para akademisi, praktisi, mahasiswa, dan pihak lain yang berminat di bidang Manajemen Pendidikan dan Ilmu Sosial yang meliputi Pengelolaan Kurikulum,  Pengelolaan Lulusan, Pengelolaan Proses Pembelajaran, Pengelolaan Sarana dan Prasarana, Pengelolaan Pendidikan, Pengelolaan Pembiayaan, Pengelolaan Penilaian, Pengelolaan Pendidik dan Tenaga Kependidikan, Pendidikan Kepemimpinan, Kebijakan dan Perencanaan Pendidikan, Ekonomi Pendidikan, Politik Pendidikan, Hukum, Manajemen, Ekonomi, Psikologi, dll.</p>\r\n', '1651419861_d79ef0b6b494b2c4ad67.jpg', '2022-05-01', 'published', 5, 1),
(61, 'Pandemi Covid-19 Tuntut Mahasiswa Bersikap Mental Belajar Mandiri', 'pandemi-covid-19-tuntut-mahasiswa-bersikap-mental-belajar-mandiri', '<p style=\"text-align:justify\"><strong>BANJARMASIN</strong> - Rektor Universitas Lambung Mangkurat (ULM), Prof Dr H Sutarto Hadi mengatakan, pandemi Covid-19 menuntut mahasiswa harus menumbuhkan sikap mental belajar secara mandiri, mengingat saat ini perkuliahan dilakukan secara<strong><a href=\"https://www.okezone.com/tag/kuliah-daring\"> daring.</a></strong></p>\r\n\r\n<p style=\"text-align:justify\">\"Mahasiswa bisa memanfaatkan media belajar yang beragam. Belajar bisa di mana saja dan kapan saja. Sesungguhnya itulah keunggulan teknologi informasi dan komunikasi yang bisa menggantikan perkuliahan tatap muka langsung,\" kata dia saat membuka Pengenalan Kehidupan Kampus Mahasiswa Baru (PKKMB) di Banjarmasin, Rabu (11/8/2021).</p>\r\n', '1651579087_01e6952cbfeadf7b71c9.jpg', '2022-06-23', 'published', 5, 1),
(62, 'Pengalaman Kuliah Online di Masa Pandemi: Apa Sih Keuntungannya?', 'pengalaman-kuliah-online-di-masa-pandemi-apa-sih-keuntungannya', '<p style=\"text-align:justify\">Salah satu istilah yang paling sering digunakan akibat pandemi adalah &ldquo;new normal&rdquo;. Fenomena ini juga terlihat jelas di dunia pendidikan di mana adanya peningkatan tajam dari pembelajaran online. Pelajar dari tingkat dasar sampai mahasiswa pun pasti mengalami ini! Nah, tapi sebenernya apa aja sih keuntungan dari&nbsp;pengalaman kuliah online di masa pandemi? Baca terus ya!</p>\r\n\r\n<p style=\"text-align:justify\">Pandemi Covid-19 memicu cara belajar yang baru. Di seluruh dunia, institusi pendidikan mencari platform terbaik untuk menyelenggarakan pembelajaran online agar kegiatan belajar-mengajar tetap berjalan.</p>\r\n\r\n<p style=\"text-align:justify\">Ini juga pasti jadi salah satu pertimbangan bagi kamu yang mau kuliah di luar negeri. Meskipun udah ada beberapa negara dan daerah yang membuka perbatasan mereka untuk turis luar negeri, menurut situs berita&nbsp;<a href=\"https://www.cnbc.com/2022/02/10/australia-new-zealand-bali-malaysia-philippines-reopen-for-travel.html\">CNBC</a>, masih banyak negara yang belum membuka border buat mahasiswa asing demi mencegah potensi penularan virus dari luar negeri.</p>\r\n\r\n<p style=\"text-align:justify\"><em>But we&rsquo;re here to tell you that online learning doesn&rsquo;t suck!</em>&nbsp;Kamu masih bisa menikmati kuliah di universitas internasional dan melakukan kegiatan belajar via online lho!</p>\r\n\r\n<p style=\"text-align:justify\">Seperti kebanyakan metode pengajaran, pembelajaran online juga memiliki sisi positif dan negatifnya sendiri. Untuk tau lebih banyak mengenai keuntungan dari&nbsp;pengalaman kuliah online di masa pandemi,&nbsp;<em>scroll</em>&nbsp;terus ya!</p>\r\n', '1651579196_617911670355192e1292.jpg', '2022-05-03', 'published', 6, 1),
(63, 'Bagaimana Cara Belajar bagi Mahasiswa yang Unggul ?', 'bagaimana-cara-belajar-bagi-mahasiswa-yang-unggul', '<p style=\"text-align:justify\">Bagaimana Cara Belajar bagi Mahasiswa yang Unggul ?</p>\r\n\r\n<p style=\"text-align:justify\">Kegiatan belajar mahasiswa memang bertujuan untuk mendapatkan ilmu juga meraih nilai akademis yang bagus. Tentunya semua mahasiswa menginginkan mendapatkan nilai akademis yang tinggi sehingga memperoleh hasil yang baik pula. Maka dari itu banyak mahasiswa yang berlomba &ndash; lomba untuk belajar agar berhasil menjadi mahasiswa yang cerdas. Namun semua itu kembali kepada pribadi masing-masing.</p>\r\n\r\n<p style=\"text-align:justify\">Ada beberapa cara untuk menjadi mahasiswa yang top dalam akademis, yaitu :</p>\r\n\r\n<p style=\"text-align:justify\">1. Mempersiapkan Pikiran dan Tubuh untuk Belajar<br />\r\nDengan mempersiapkan dan tubuh, mahasiswa akan lebih rileks dan lebih leluasa dalam menyerap ilmu dan materi yang diberikan oleh dosen di dalam kelas. Selain itu kondisi tubuh yang bugar dapat meningkatkan daya ingat sehingga materi yang diserap tidak cepat lupa.</p>\r\n', '1651579255_a0bf763c13c93e4cf021.jpg', '2022-05-03', 'published', 6, 1),
(64, 'Seberapa Betah Mahasiswa Belajar dari Rumah di Masa Pandemi?', 'seberapa-betah-mahasiswa-belajar-dari-rumah-di-masa-pandemi', '<p style=\"text-align:justify\"><strong>JAKARTA - </strong>Tepat pada Januari 2021, para mahasiswa dipastikan akan kembali<a href=\"https://www.okezone.com/tag/kuliah-tatap-muka-2021\"> <strong>kuliah tatap muka</strong></a>. Kuliah tatap muka dilakukan setelah berbulan-bulan menjalani proses belajar di rumah.</p>\r\n\r\n<p style=\"text-align:justify\">Kuliah tatap muka sudah tercantum dalam SKB Nomor 04/KB/2020, Nomor 737 Tahun 2020, Nomor HK.01.08/Menkes/7093/2020, dan Nomor 402-3987 Tahun 2020.</p>\r\n\r\n<p style=\"text-align:justify\"><iframe frameborder=\"0\" height=\"1\" id=\"google_ads_iframe_/7108725/Desktop-Detail-Parallax_0\" name=\"google_ads_iframe_/7108725/Desktop-Detail-Parallax_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"1\"></iframe></p>\r\n\r\n<p style=\"text-align:justify\">Menurut Survei Gaya Hidup Mahasiswa Indonesia yang dilakukan Lifepal pada Triwulan IV 2020, tanggapan mahasiswa terkait usainya <strong><a href=\"https://www.okezone.com/tag/kuliah-tatap-muka-2021\">kuliah tatap muka</a></strong> memang cukup variatif. Namun sebagian besar responden menyatakan bahwa cukup senang dengan kegiatan belajar di rumah.</p>\r\n\r\n<p style=\"text-align:justify\">Survei Gaya Hidup Mahasiswa Indonesia 2020 dilakukan dengan metode random sampling terhadap 443 responden yang merupakan mahasiswa di seluruh wilayah Indonesia. Survei berlangsung pada 6 Oktober hingga 4 Desember 2020. Perbandingan jumlah responden dalam survei ini adalah, pria 144 dan wanita 299.</p>\r\n\r\n<p style=\"text-align:justify\">Berikut adalah hasil survei seputar aktivitas <em>e-learning </em>atau belajar <em>online </em>dari mahasiswa di Indonesia, seperti dikutip <strong>Okezone,</strong> Sabtu (19/12/2020).</p>\r\n', '1651579304_e9ee13d2c43c4e69adca.jpg', '2022-05-03', 'archived', 5, 1),
(65, 'MAHASISWA HARUS MANFAATKAN PROGRAM MERDEKA BELAJAR KAMPUS MERDEKA', 'mahasiswa-harus-manfaatkan-program-merdeka-belajar-kampus-merdeka', '<p style=\"text-align:justify\">MENTERI Pendidikan Kebudayaan Riset dan Teknologi (Mendikbudristek) Nadiem Anwar Makarim meminta seluruh mahasiswa untuk ambil bagian dalam program Merdeka Belajar Kampus Merdeka (MB-KM).</p>\r\n\r\n<p style=\"text-align:justify\">Program tMB-KM memberikan kesempatan kepada mahasiswa untuk belajar di luar kampusnya selama 3 semester tanpa harus dirugikan oleh aturan yang ada.</p>\r\n\r\n<p style=\"text-align:justify\">“Kemendikbudristek memberikan hak dan kesempatan kepada seluruh mahasiswa untuk belajar baik di luar prodinya maupun di luar kampusnya selama tiga semester,” ujar Menteri Nadiem pada keterangan pers, Selasa (14/9). Pernyataan Mendikbudiristek disampaikan dalam video sambutan pembukaan Pengenalan Kehidupan Kampus Mahasiswa Baru (PKKMB) Universitas Krisnadwipayana (Unkris). PKKMB Unkris tahun ajaran 2021-2022 digelar secara virtual. Lebih dari 1.000 mahasiswa baru dari berbagai program studi dan fakultas mengikuti rangkaian PKKMB yang berlangsung selama tiga hari tersebut. Ikut hadir secara virtual Rektor Unkris Dr. Ir. Ayub Muktiono, M.SIP, CIQaR, anggota Komisi X DPR RI Ferdiansyah, para wakil rektor, para dekan, dosen dan ketua lembaga yang ada di lingkungan Unkris.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nMenurut Nadiem, ada banyak program yang bisa diikuti oleh mahasiswa melalui MB-KM tersebut. Mulai dari magang di perusahaan atau organisasi-organisasi sosial, membangun desa, melakukan riset dan mengerjakan proyek kemanusiaan. Selain itu, mahasiswa dapat merancang dan merintis wirausaha, melakukan pertukaran di dalam maupun luar negeri atau mengajar di sekolah SD dan SMP melalui program Kampus Mengajar. “Semua program ini kami rangcang untuk memberikan peluang kepada mahasiswa dengan keragaman minat dan ketertarikan untuk mendapatkan pengalaman-pengalaman yang tidak didapatkan dalam kelas. Pengalaman-pengalaman itu akan menjadi kendaraan dan bekal kalian untuk meraih mimpi masa depan,” lanjut Nadiem.</p>\r\n', '1651579366_3357f3bd1ab8690d94d3.jpg', '2022-06-11', 'published', 5, 1),
(66, 'FAKTOR MAHASISWA MALAS KULIAH', 'faktor-mahasiswa-malas-kuliah', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Roboto,sans-serif\"><span style=\"color:#777777\"><span style=\"background-color:#ffffff\"><span style=\"font-family:&quot;Times New Roman&quot;\">Kuliah adalah rutinitas yang dilakukan oleh seorang mahasiswa. Ada sebagian mahasiswa yang rajin, namun tak sedikit juga yang bermalas-malasan. Banyak aktivitas yang dapat dilakukan di kampus, mulai dari belajar, mengikuti organisasi dan lain-lain. Sangat disayangkan sekali jika seorang mahasiswa malas untuk kuliah.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Roboto,sans-serif\"><span style=\"color:#777777\"><span style=\"background-color:#ffffff\"><span style=\"font-family:&quot;Times New Roman&quot;\">Ada banyak faktor yang menyebabkan seorang mahasiswa malas pergi kuliah. Padahal, kuliah itu penting untuk masa depan mereka. Berikut, beberapa faktor mahasiswa malas kuliah yang telah kami rangkum:</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:&quot;Times New Roman&quot;\"><strong>Salah Jurusan</strong></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:start\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Roboto,sans-serif\"><span style=\"color:#777777\"><span style=\"background-color:#ffffff\"><span style=\"font-family:&quot;Times New Roman&quot;\">Faktor yang paling banyak dipermasalahkan adalah salah jurusan. Mereka yang salah jurusan umumnya hanya ikut-ikutan temannya untuk daftar pada suatu fakultas yang mereka sendiri tidak memahami mengenai fakultas atau jurusan tersebut. Setelah belajar beberapa minggu, mereka baru menyadari bahwa jurusan tersebut sulit dan merasa tidak mampu sehingga malah untuk pergi kuliah.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Roboto,sans-serif\"><span style=\"color:#777777\"><span style=\"background-color:#ffffff\"><span style=\"font-family:&quot;Times New Roman&quot;\">Hal ini sangat tidak nyaman sekali, karena dimana orang lain bersusah payah untuk masuk jurusan tersebut dan kita yang masuk kedalam jurusan tersebut malah bermalas-malasan. Untuk itu, pilihlah jurusan di perguruan tinggi sesuai dengan kemampuan anda.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:&quot;Times New Roman&quot;\"><strong>Tidak Sesuai Dengan Keadaan Sekitar</strong></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:start\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Roboto,sans-serif\"><span style=\"color:#777777\"><span style=\"background-color:#ffffff\"><span style=\"font-family:&quot;Times New Roman&quot;\">Kenyamanan dalam kuliah juga perlu kita bangun. Jika kita sudah nyaman dengan rutinitas kita, maka semua hal yang membuat kita malas akan pergi dan kita pun akan rajin masuk kuliah. &nbsp;Kalau kita merasa tidak cocok dengan keadaan sekitar, itu menyebabkan kita untuk datang kuliah.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:&quot;Times New Roman&quot;\"><strong>&nbsp;Tidak Menemukan Teman Yang Sehobi</strong></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:start\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Roboto,sans-serif\"><span style=\"color:#777777\"><span style=\"background-color:#ffffff\"><span style=\"font-family:&quot;Times New Roman&quot;\">Dalam dunia perkuliahan, sangat diperlukan teamwork yang kompak dan solid. Jika kita telah menemukan teman yang solid, kita akan lebih semangat untuk datang kuliah dan menjalani kegiatan bersamanya. Tapi, jangan cari teman yang hobinya bolos atau yang membawa kamu kedalam prilaku buruk. Rasa jenuh juga akan menghampiri kita jika tidak ada teman yang sepemikiran. Bingung ingin melakukan aktivitas, dan akhirnya memilih untuk bolos kuliah.</span></span></span></span></span></p>\r\n', '1652091955_294cd1a1fe73ed31142b.jpg', '2022-05-09', 'published', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `kode_dosen` varchar(10) DEFAULT NULL,
  `nidn` varchar(10) DEFAULT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `foto_dosen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `kode_dosen`, `nidn`, `nama_dosen`, `foto_dosen`, `password`) VALUES
(13, '12345', 'DSN0001', 'DJENDRI A. TUKAEDJA, M.Teol', '1607307167_0f5729de6874be957c58.png', '12345'),
(14, '123456', 'DSN0002', 'YANWAR PRAWONO, S.Th, M.Pd', '1607307206_b5e59b930a76c4583114.png', 'DSN0002'),
(15, 'DSN0003', 'DSN0003', 'JEFERSON SIAMA, M.Pd', '1611985571_738863daa702ee8b91e1.png', 'DSN0003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` int(2) NOT NULL,
  `fakultas` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`id_fakultas`, `fakultas`) VALUES
(17, 'ILMU PENDIDIKAN'),
(18, 'ILMU TEOLOGI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gedung`
--

CREATE TABLE `tbl_gedung` (
  `id_gedung` int(2) NOT NULL,
  `gedung` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_gedung`
--

INSERT INTO `tbl_gedung` (`id_gedung`, `gedung`) VALUES
(10, 'Gedung A'),
(11, 'Gedung B'),
(12, 'Gedung C'),
(13, 'GEDUNG C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grafik`
--

CREATE TABLE `tbl_grafik` (
  `id` int(4) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jumlah` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_grafik`
--

INSERT INTO `tbl_grafik` (`id`, `tahun`, `jumlah`) VALUES
(1, '2010', 700),
(2, '2011', 200),
(3, '2014', 800),
(4, '2013', 400);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_prodi` int(2) DEFAULT NULL,
  `id_ta` int(4) DEFAULT NULL,
  `id_kelas_perkuliahan` int(30) DEFAULT NULL,
  `id_matkul` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `id_ruangan` int(2) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_prodi`, `id_ta`, `id_kelas_perkuliahan`, `id_matkul`, `id_dosen`, `hari`, `waktu`, `id_ruangan`, `quota`) VALUES
(68, 13, 7, 5, NULL, 15, 'Selasa', '07.00-09.00', 15, 30),
(69, 13, 7, 6, NULL, 14, 'Rabu', '07.00-09.00', 13, 12),
(70, 13, 5, 7, NULL, 14, 'Selasa', '08.00 - 10.00', 13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_pembayaran`
--

CREATE TABLE `tbl_kategori_pembayaran` (
  `id_kategori_pembayaran` int(11) NOT NULL COMMENT 'Primary Key',
  `nama_kategori_pembayaran` varchar(60) DEFAULT NULL,
  `kode_kategori_pembayaran` varchar(30) NOT NULL,
  `singkatan_kategori_pembayaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kategori_pembayaran`
--

INSERT INTO `tbl_kategori_pembayaran` (`id_kategori_pembayaran`, `nama_kategori_pembayaran`, `kode_kategori_pembayaran`, `singkatan_kategori_pembayaran`) VALUES
(5, 'PRAKTEK PENGALAMAN LAPANGAN', '001', 'PPL'),
(6, 'PENERIMAAN MAHASISWA BARU', '002', 'PMB'),
(7, 'WISUDA', '003', 'WISUDA'),
(8, 'SUMBANGAN BIAYA PENDIDIKAN', '004', 'SPP'),
(9, 'JAS ALMAMATER', '005', 'JAS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `id_prodi` int(2) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `tahun_angkatan` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `id_prodi`, `id_dosen`, `tahun_angkatan`) VALUES
(27, 'PAK002_2020', 13, 13, 2021),
(28, 'TEOL001-2020', 12, 13, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas_pembayaran`
--

CREATE TABLE `tbl_kelas_pembayaran` (
  `id_kelas_pembayaran` int(10) NOT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_pembayaran` int(10) DEFAULT NULL,
  `nama_kelas_pembayaran` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `kode_kelas_pembayaran` varchar(30) NOT NULL,
  `pelunasan` decimal(65,0) DEFAULT NULL,
  `kode_pembayaran_mhs` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `waktu_pembayaran_mhs` timestamp NULL DEFAULT NULL,
  `id_user` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kelas_pembayaran`
--

INSERT INTO `tbl_kelas_pembayaran` (`id_kelas_pembayaran`, `id_mhs`, `id_pembayaran`, `nama_kelas_pembayaran`, `id_prodi`, `kode_kelas_pembayaran`, `pelunasan`, `kode_pembayaran_mhs`, `waktu_pembayaran_mhs`, `id_user`) VALUES
(379, NULL, 3, 'PEMB2019', 12, 'TEOL01', NULL, NULL, NULL, 0),
(387, NULL, 8, 'WISUDA21', 12, 'TEOL02', NULL, NULL, NULL, 0),
(388, 32, 8, 'WISUDA21', 12, 'TEOL02', NULL, NULL, NULL, 0),
(389, 24, 8, 'WISUDA21', 12, 'TEOL02', NULL, NULL, '0000-00-00 00:00:00', 0),
(391, 32, NULL, 'WISUDA21', 12, 'TEOL02', '200000', '210324-22-8240', '2024-03-21 14:02:00', 1),
(392, 32, NULL, 'WISUDA21', 12, 'TEOL02', '20000', '210324-22-1938', '2024-03-21 14:03:00', 1),
(393, 24, NULL, 'WISUDA21', 12, 'TEOL02', '200000', '220324-18-5701', '2024-03-22 10:14:00', 1),
(421, 24, 3, 'PEMB2019', 12, 'TEOL01', NULL, NULL, NULL, 0),
(426, 32, 3, 'PEMB2019', 12, 'TEOL01', NULL, NULL, NULL, 0),
(427, 32, NULL, 'PEMB2019', 12, 'TEOL01', '400000', '230324-21-8455', '2024-03-23 13:36:00', 1),
(428, 24, NULL, 'WISUDA21', 12, 'TEOL02', '200000', '240324-20-4315', '2024-03-24 12:53:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas_perkuliahan`
--

CREATE TABLE `tbl_kelas_perkuliahan` (
  `id_kelas_perkuliahan` int(12) NOT NULL,
  `kode_kelas_perkuliahan` varchar(15) NOT NULL,
  `nama_kelas_perkuliahan` varchar(30) NOT NULL,
  `id_kurikulum` int(4) NOT NULL,
  `id_prodi` int(12) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_ta` int(4) NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `tanggal_mulai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kelas_perkuliahan`
--

INSERT INTO `tbl_kelas_perkuliahan` (`id_kelas_perkuliahan`, `kode_kelas_perkuliahan`, `nama_kelas_perkuliahan`, `id_kurikulum`, `id_prodi`, `id_dosen`, `id_ta`, `tanggal_akhir`, `tanggal_mulai`) VALUES
(5, 'S5P22', 'S5P22', 8, 13, 15, 7, '2023-07-06', '2023-06-28'),
(6, 'S2T22', 'S2P221', 9, 13, 14, 7, '2023-10-28', '2023-10-18'),
(7, 'S8P23', 'S8P23', 9, 13, 14, 5, '2024-01-18', '2024-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `konfigurasi_id` int(11) NOT NULL,
  `nama_web` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `visi` text,
  `misi` text,
  `instagram` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`konfigurasi_id`, `nama_web`, `deskripsi`, `visi`, `misi`, `instagram`, `facebook`, `whatsapp`, `email`, `alamat`, `logo`, `icon`) VALUES
(1, 'SMAN 1 Blackexpo', 'SMAN 1 Blackexpo Indonesia adalah salah satu sekolah menengah atas berstatus negeri yang terletak di Kelurahan Lolong Belanti, Kecamatan Padang Utara, Kota Padang, Sumatra Barat. Sekolah ini beralamat di Jalan Belanti Raya No. 11, beberapa puluh meter ke arah barat dari Jalan Khatib Sulaiman, Padang', 'Berwawasan sains, berkarakter bangsa dan peduli lingkungan', 'Melaksanakan IPTEK berlandaskan IMTAQ. Melaksanakan peningkatan kualitas SDM yang mengikuti perkembangan. Menerapkan, mengembangkan pendidikan berbasis karakter bangsa, Mewujudkan sekolah bernuansa lingkungan (green school), Melaksanakan program pengembangan sekolah ramah sosial dan ramah lingkungan.', 'https://instagram.com/mycodingxd', 'https://facebook.com/mycodingxd', '082377823390', '401xdssh@gmail.com', 'Jl. Belanti Raya, Lolong Belanti, Kec. Padang Utara, Kota Padang, Sumatera Barat', 'MycodingLogo180.png', 'MycodingLogo180.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `id_krs` int(11) NOT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `p1` int(1) DEFAULT '0',
  `p2` int(1) DEFAULT '0',
  `p3` int(1) DEFAULT '0',
  `p4` int(1) DEFAULT '0',
  `p5` int(1) DEFAULT '0',
  `p6` int(1) DEFAULT '0',
  `p7` int(1) DEFAULT '0',
  `p8` int(1) DEFAULT '0',
  `p9` int(1) DEFAULT '0',
  `p10` int(1) DEFAULT '0',
  `p11` int(1) DEFAULT '0',
  `p12` int(1) DEFAULT '0',
  `p13` int(1) DEFAULT '0',
  `p14` int(1) DEFAULT '0',
  `p15` int(1) DEFAULT '0',
  `p16` int(1) DEFAULT '0',
  `nilai` varchar(3) DEFAULT '0',
  `ceklis_transkrip` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_krs`
--

INSERT INTO `tbl_krs` (`id_krs`, `id_mhs`, `id_jadwal`, `id_ta`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `nilai`, `ceklis_transkrip`) VALUES
(418, 25, 70, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0),
(421, 26, 68, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '90', 1),
(422, 25, 68, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum`
--

CREATE TABLE `tbl_kurikulum` (
  `id_kurikulum` int(4) NOT NULL,
  `nama_kurikulum` varchar(30) NOT NULL,
  `id_ta` int(4) NOT NULL,
  `id_prodi` int(2) NOT NULL,
  `id_matkul` int(11) DEFAULT NULL,
  `smstr` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kurikulum`
--

INSERT INTO `tbl_kurikulum` (`id_kurikulum`, `nama_kurikulum`, `id_ta`, `id_prodi`, `id_matkul`, `smstr`) VALUES
(7, 'S1P005', 7, 13, NULL, ''),
(8, 'S1P005', 7, 13, 25, '3'),
(9, 'S1P005', 7, 13, 20, '2'),
(10, 'S1P005', 7, 13, 23, '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(10) DEFAULT NULL,
  `matkul` varchar(225) DEFAULT NULL,
  `sks` int(1) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `smt` int(1) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `id_prodi` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`id_matkul`, `kode_matkul`, `matkul`, `sks`, `kategori`, `smt`, `semester`, `id_prodi`) VALUES
(20, 'MKP0001', 'PSIKOLOGI PENDIDIKAN', 2, 'Wajib', 4, 'Genap', 13),
(21, 'MKT0001', 'OIKUMENIKA', 2, 'Pilihan', 2, 'Genap', 12),
(23, 'MKP0002', 'PRESENTASE KELAS', 2, 'Pilihan', 8, 'Genap', 13),
(25, 'MKP0004', 'PERJANJIAN LAMA 1', 2, 'Wajib', 1, 'Ganjil', 13),
(27, 'MKT00062', 'PERJANJIAN LAMA 1', 3, 'Wajib', 3, 'Ganjil', 12),
(28, 'MKT0010', 'PRAKTIKA', 2, 'Wajib', 3, 'Ganjil', 12),
(29, 'MK0002', 'TAFSIRAN PL I', 3, 'Wajib', 2, 'Genap', 12),
(31, 'MKT0009', 'AGAMA SUKU', 3, 'Pilihan', 3, 'Ganjil', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `id_mhs` int(11) NOT NULL,
  `id_ta` int(4) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nama_mhs` varchar(50) DEFAULT NULL,
  `id_prodi` int(2) DEFAULT NULL,
  `tgl_masuk` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto_mhs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`id_mhs`, `id_ta`, `nim`, `nama_mhs`, `id_prodi`, `tgl_masuk`, `password`, `foto_mhs`, `id_kelas`) VALUES
(24, 7, '20232', 'Frendi', 12, NULL, '20232', '1692048007_159c708de18db834e3a7.png', 28),
(25, 1, '20221', 'Saldi Paeri', 13, NULL, '20221', '1692048030_c74ed31f83ffc6d61b51.png', 27),
(26, 1, '20232', 'Resa', 13, NULL, '20232', '1692658910_3014b428538a9fb29eb0.png', 27),
(32, 7, '20232', 'Stev', 12, NULL, 'ASDSA', '1709027178_3177cb3948429307b94b.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `nama_pembayaran` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `biaya` decimal(65,0) DEFAULT NULL,
  `id_ta` int(10) DEFAULT NULL,
  `id_prodi` int(2) DEFAULT NULL,
  `Penerima` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_kategori_pembayaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `nama_pembayaran`, `biaya`, `id_ta`, `id_prodi`, `Penerima`, `id_kategori_pembayaran`) VALUES
(1, 'SPP', '300009', 1, 13, NULL, 8),
(3, 'PMB', '50000', 7, 12, NULL, 6),
(4, 'PPL', '50000', 5, 12, NULL, 5),
(8, 'Wisuda', '200000', 7, 13, NULL, 7),
(10, 'Jas', '2500090', 7, 13, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(2) NOT NULL,
  `id_fakultas` int(2) DEFAULT NULL,
  `kode_prodi` varchar(10) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `jenjang` varchar(10) NOT NULL,
  `ka_prodi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `id_fakultas`, `kode_prodi`, `prodi`, `jenjang`, `ka_prodi`) VALUES
(12, 18, 'TEOL', 'TEOLOGI (AKADEMIK)', 'S1', 'Djendri A. Tukaedja, M.Teol'),
(13, 17, 'PAK', 'PENDIDIKAN AGAMA KRISTEN', 'S1', 'YANWAR PRAWONO, S.Th, M.Pd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_range_nilai`
--

CREATE TABLE `tbl_range_nilai` (
  `id_range_nilai` int(4) NOT NULL,
  `id_prodi` int(2) NOT NULL,
  `nilai_huruf` varchar(2) NOT NULL,
  `nilai_index` varchar(4) NOT NULL,
  `bobot_minimum` int(4) NOT NULL,
  `bobot_maksimum` int(4) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `Keterangan` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_range_nilai`
--

INSERT INTO `tbl_range_nilai` (`id_range_nilai`, `id_prodi`, `nilai_huruf`, `nilai_index`, `bobot_minimum`, `bobot_maksimum`, `tanggal_mulai`, `tanggal_akhir`, `Keterangan`) VALUES
(1, 13, 'A', '4.0', 90, 100, '2022-06-17', '2022-12-15', 'L'),
(2, 13, 'B', '3.0', 80, 89, '2022-06-17', '2022-12-15', 'L'),
(3, 13, 'C', '2.0', 60, 79, '2022-07-15', '2023-08-26', 'L'),
(4, 13, 'D', '1.0', 40, 59, '2022-06-17', '2022-12-15', 'M'),
(5, 12, 'A', '4.0', 90, 100, '2022-06-17', '2022-12-15', 'L'),
(6, 12, 'B', '3.0', 80, 89, '2022-06-17', '2022-12-15', 'L'),
(7, 12, 'C', '2.0', 60, 79, '2022-07-15', '2023-08-26', 'L'),
(8, 12, 'D', '1.0', 40, 59, '2022-06-17', '2022-12-15', 'M'),
(9, 13, 'E', '0.0', 0, 39, '2022-06-17', '2022-12-15', 'T'),
(10, 12, 'E', '0.0', 0, 39, '2022-06-17', '2022-12-15', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(2) NOT NULL,
  `id_gedung` int(2) DEFAULT NULL,
  `ruangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `id_gedung`, `ruangan`) VALUES
(13, 12, 'C1'),
(15, 12, 'C2'),
(21, 12, 'C3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `isi` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `judul`, `foto`, `isi`) VALUES
(47, 'Utama', '1650284606_2b4b094c419a3a3877f2.jpg', 'Pertama'),
(48, 'df', '1650284625_e28030360fe3bb273266.jpg', 'dsf'),
(49, 'dfd', '1650364633_40ab9b0e5a0e8ad2f68a.jpg', 'df'),
(54, 'Pemograman Java', '1650373821_c59e8317874352f8aef6.jpg', 'Gurun'),
(60, 'Mobil', '1650374016_2e71452d67586329bbea.jpg', 'Gurun G');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_mhs`
--

CREATE TABLE `tbl_status_mhs` (
  `id_status` int(4) NOT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_ta` int(4) DEFAULT NULL,
  `status_mhs` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ta`
--

CREATE TABLE `tbl_ta` (
  `id_ta` int(4) NOT NULL,
  `ta` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_ta`
--

INSERT INTO `tbl_ta` (`id_ta`, `ta`, `semester`, `status`) VALUES
(1, '2020/2021', 'Genap', 1),
(2, '2020/2021', 'Ganjil', 0),
(5, '2019/2020', 'Genap', 0),
(7, '2019/2020', 'Ganjil', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `foto`) VALUES
(1, 'Steven', 'admin', 'admin', 'steven.jpg'),
(9, 'Tandri', 'tandri', 'tandri', '1606356710_4dde48f20230fca3378d.png'),
(10, 'Jeferson Siama', 'jeferson siama', 'tandri G', '1650368573_b37e7343de2f09d84b9e.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'renungkan25@gmail.com', 'vin456', '$2y$10$F74nK2lTJz7QppoXAkaCfOgUqZyxIWfqIBVdxXGI9bgGz9oRYmDJW', '79993ac5ab95d00c8cc639aac746583a', NULL, '2020-11-05 09:21:54', NULL, NULL, NULL, 1, 0, '2020-11-05 08:03:42', '2020-11-05 08:21:54', NULL),
(12, 'pinalinge@gmail.com', 'admin', '$2y$10$ae6BAdPKrkXpnuPxa5AW6ua1zv28qzskNbj/pkKSwKqMpN7LR27XK', NULL, NULL, NULL, '1b2d09f0fa18359060c7f144e3e9d40c', NULL, NULL, 0, 0, '2020-11-05 18:35:51', '2020-11-05 18:35:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `tbl_akses_fitur`
--
ALTER TABLE `tbl_akses_fitur`
  ADD PRIMARY KEY (`id_akses_fitur_mhs`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`berita_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `user_id` (`id_user`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `tbl_grafik`
--
ALTER TABLE `tbl_grafik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_kategori_pembayaran`
--
ALTER TABLE `tbl_kategori_pembayaran`
  ADD PRIMARY KEY (`id_kategori_pembayaran`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_kelas_pembayaran`
--
ALTER TABLE `tbl_kelas_pembayaran`
  ADD PRIMARY KEY (`id_kelas_pembayaran`);

--
-- Indexes for table `tbl_kelas_perkuliahan`
--
ALTER TABLE `tbl_kelas_perkuliahan`
  ADD PRIMARY KEY (`id_kelas_perkuliahan`);

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`konfigurasi_id`);

--
-- Indexes for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tbl_range_nilai`
--
ALTER TABLE `tbl_range_nilai`
  ADD PRIMARY KEY (`id_range_nilai`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status_mhs`
--
ALTER TABLE `tbl_status_mhs`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_ta`
--
ALTER TABLE `tbl_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `kd_prodi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233363;

--
-- AUTO_INCREMENT for table `tbl_akses_fitur`
--
ALTER TABLE `tbl_akses_fitur`
  MODIFY `id_akses_fitur_mhs` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  MODIFY `id_fakultas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  MODIFY `id_gedung` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_grafik`
--
ALTER TABLE `tbl_grafik`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_kategori_pembayaran`
--
ALTER TABLE `tbl_kategori_pembayaran`
  MODIFY `id_kategori_pembayaran` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_kelas_pembayaran`
--
ALTER TABLE `tbl_kelas_pembayaran`
  MODIFY `id_kelas_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=429;

--
-- AUTO_INCREMENT for table `tbl_kelas_perkuliahan`
--
ALTER TABLE `tbl_kelas_perkuliahan`
  MODIFY `id_kelas_perkuliahan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `konfigurasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

--
-- AUTO_INCREMENT for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  MODIFY `id_kurikulum` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_range_nilai`
--
ALTER TABLE `tbl_range_nilai`
  MODIFY `id_range_nilai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_status_mhs`
--
ALTER TABLE `tbl_status_mhs`
  MODIFY `id_status` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_ta`
--
ALTER TABLE `tbl_ta`
  MODIFY `id_ta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
