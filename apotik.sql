-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2015 at 02:14 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `detil_catalogue`
--

CREATE TABLE IF NOT EXISTS `detil_catalogue` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_catalogue`
--

INSERT INTO `detil_catalogue` (`id`, `name`, `type`, `Quantity`, `Price`, `Description`, `Image`) VALUES
(1, 'awdawdawd', 'Madu', 24, 254215235, 'awdawdawdawd', 'Chrysanthemum.jpg'),
(2, 'coba2', 'Madu', 24, 24214124, 'awdawdawd', 'Tulips.jpg'),
(3, 'awdawdawdawd', 'asem', 24, 2134235124, 'awdawdawdawd', 'Jellyfish.jpg'),
(4, 'cobaz', 'Capsule', 24, 235235235, 'adawdawdawdawd', 'Chrysanthemum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detil_transale`
--

CREATE TABLE IF NOT EXISTS `detil_transale` (
  `id` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_transale`
--

INSERT INTO `detil_transale` (`id`, `idbarang`, `name`, `quantity`, `price`) VALUES
(1, 5, 'TEPUNG TALBINAH AL KHODRY', 1, 400000),
(1, 7, 'SPASMOLDIN ', 1, 200000),
(2, 4, 'LOSTERIN 100 PIL ', 3, 300000),
(3, 3, 'JELI TIMUN LAUT', 2, 200000),
(4, 2, 'Kapsul HULBAH - FENUGREEK - (Herbal', 1, 350000),
(5, 3, 'JELI TIMUN LAUT ', 1, 200000),
(6, 6, 'RENALCIDON ', 1, 230000);

-- --------------------------------------------------------

--
-- Table structure for table `ms_barang`
--

CREATE TABLE IF NOT EXISTS `ms_barang` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_barang`
--

INSERT INTO `ms_barang` (`id`, `name`, `type`, `quantity`, `price`, `description`, `image`) VALUES
(1, 'BLACK HONEY GOLD (Madu Hitam Pahit Super) - (Madu)', 'Madu', 45, 200000, ' Manfaat Black Honey Gold\r\n- Sangat baik untuk terapi DIABETES, karena berguna menurunkan kadar gula darah.\r\n- Mengatasi nyeri sendi akibat asam urat & rematik\r\n- Meningkatkan daya tahan tubuh\r\n- Memperkuat kerja liver (hati)\r\n- Pengobatan penyakit jantung\r\n- Membantu menurunkan demam tinggi\r\n- Membantu proses detoksifikasi (membuang racun)\r\n- Mengatasi Hipertensi dan stroke\r\n- Meningkatkan kekuatan dan daya tahan sex\r\n- Membantu proses penyembuhan malaria, dbd, typus, maag, alergi, gatal-gatal\r\n- Untuk masker\r\n\r\nKomposisi : \r\nMadu Pahit Herbal\r\n\r\nAturan Pakai :\r\n- Untuk menjaga kesehatan : 3 x 1sdm / hari\r\n- Untuk pengobatan : 3 x 2-3sdm / hari\r\n', 'BlackHoney.png'),
(2, 'Kapsul HULBAH - FENUGREEK - (Herbal)', 'Capsule', 50, 350000, ' Khasiat Fenugreek (Hulbah) antara lain:\r\n- Meningkatkan produksi ASI hingga 300%,\r\n- Merangsang pembesaran payudara,\r\n- Melancarkan persalinan,\r\n- Mengobati berbagai penyakit akibat gangguan hormon,\r\n- Meningkatkan libido pria dan wanita,\r\n- Mencegah dan mengobati impotensi,\r\n- Melancarkan dan mengatasi nyeri Haid,\r\n- Meningkatkan kinerja Jantung, Ginjal, dan Paru ï¿½ paru,\r\n- Mengatasi kekurangan serat alami dan mencegah sembelit, \r\n- Melancarkan sirkulasi darah.\r\n', 'hulbah.png'),
(3, 'JELI TIMUN LAUT ', 'Capsule', 50, 200000, '     Penggunaan teripang atau gamat sebagai antiseptik tradisional dan obat serbaguna untuk berbagai penyakit sudah dikenal sejak 500 tahun lalu oleh masyarakat pulau Langkawi, Malaysia. Air teripang biasanya diminumkan kepada ibu-ibu yang habis melahirkan untuk menghentikan pendarahan, atau juga untuk mempercepat proses penyembuhan luka pada anak-anak mereka yang habis dikhitan. \r\n\r\nTeripang dapat meningkatkan daya tahan tubuh, mengurangi rasa sakit dan gatal pada permukaan kulit, menurunkan kadar gula, menurunkan kolesterol, merontokkan racun pada hati, menurunkan tekanan darah, melancarkan peredaran darah, menyembuhkan maag, serta dapat menyembuhkan asma kronis. Selain itu teripang juga dapat digunakan untuk bahan perawatan kecantikan dan penyembuh luka bagi para ibu usai bersalin, karena kandungan protein dan kolagen teripang yang tinggi.\r\n', 'jelitimunlaut.png'),
(4, 'LOSTERIN 100 PIL ', 'Capsule', 50, 300000, '   Mengurangi Kadar Lemak Dalam Darah\r\n\r\nKomposisi :\r\nCurcumae Rhizoma 168.75 mg\r\nMurrayae Folium 33.75 mg\r\nGuazumae Folium 22.50 mg\r\n\r\nKhasiat dan Kegunaan :\r\nMembantu mengurangi lemak darah.\r\n\r\nCara Pemakaian :\r\nMinumlah secara teratur 2 kali sehari @ 5 pil. Dosis dapat ditingkatkan atu dikurangi sesuai kebutuhan.\r\n\r\nAnjuran :\r\nSebaiknya kurangi makanan yang berlemak.\r\n', 'losterin.png'),
(5, 'TEPUNG TALBINAH AL KHODRY', 'Tepung', 50, 400000, ' Talbinah adalah air rebusan biji gandum, yang nilai gizinya lebih banyak dari tepung gandum. Talbinah banyak dijual dalam bentuk bubuk. Talbinah merupakan salah satu obat yang terkenal sebagai obat bagi penderita maag, tetapi ternyata kegunaan talbinah tidak hanya terbatas pada maag, bahkan banyak sekali penyakit yang membutuhkan talbinah dalam pengobatannya.\r\n\r\nRasulullaah shallaallaah `alayhi wa sallam bersabda:\r\n"Talbinah melegakan sanubari orang yang sakit dan menghilangkan sebagian kesedihan".\r\n\r\nKomposisi Talbinah Al ï¿½ Khodry\r\n- 100% tepung biji gandum\r\n\r\nKhasiat Talbinah Al ï¿½ Khodry\r\n- Membantu mengobati semua gangguan lambung\r\n- Mengenyahkan sakit maag secara herbal, alami dan nabawi\r\n\r\nCara Penyajian\r\n- Rebus air secukupnya hingga mendidih\r\n- Ambil 4 sendok makan Talbinah Al ï¿½ Khodry lalu campur dengan air secukupnya hingga rata\r\n- Masukkan campuran Talbinah Al ï¿½ Khodry ke dalam ari mendidih aduk hingga mengental\r\n- Dapat ditambahkan gula, garam, kuah daging atau buah ï¿½ buahan sesuai selera\r\n- Hidangkan dalam keadaan hangat / dingin\r\n\r\nAturan Minum\r\n- Untuk Penderita Maag dapat dikonsumsi dalam keadaan hangat 3 x sehari sebelum makan\r\n- Untuk Pemeliharaan kesehatan dapat dikonsumsi 3 x sehari sebelum / sesudah makan\r\n', 'talbinah.png'),
(6, 'RENALCIDON ', 'Capsule', 50, 230000, ' Batu ginjal adalah massa keras seperti batu yang terbentuk di dalam ginjal maupun di dalam kandung kemih dan di sepanjang saluran kemih yang bisa menyebabkan nyeri, pendarahan, penyumbatan aliran kemih, dan infeksi.\r\n\r\nbatu didalam kandung kemih bisa menyebabkan nyeri di perut bagian bawah, batu yang menyumbat ureter, pelvisrenalis maupun tubulus renalis bisa menyebabkan kolik renalis yang ditandai dengan nyeri hebat pada daerah antara tulang rusuk dan tulang pinggang yang menjalar ke perut, daerah kemaluan, mual, muntah, perut menggelembung, demam dan ada darah di dalam air kemih.\r\n\r\nBatu yang menyumbat aliran kemih menyebabkan bakteri terperangkap didalam air kemih sehingga bisa terjadi infeksi dan jika penyumbatan ini berlangsung lama maka air kemih akan mengalir balik ke saluran di dalam ginjal yang meyebabkan terjadinya penekanan yang menggelembungkan ginjal dan pada akhirnya bisa terjadi kerusakan ginjal.\r\n\r\nKegunaan :\r\nMembantu meluruhkan batu urin di saluran kemih dan melancarkan buang air kecil\r\n\r\nAturan Pakai :\r\n3 kali sehari 2 kapsul\r\n\r\nKOMPOSISI\r\nTiap kapsul mengendung:\r\n- Sunchus arvensis folim extractum 45mg\r\n- Phylantus niruri herba extractum 50mg\r\n- Gynura Procumbents Folium extractum 50mg\r\n- Orthosiphonis aristatus folium extractum 45mg\r\n- Centella Asiatica herba extractum 25mg\r\n- Plantago Major folium extractum 35mg\r\n', 'renalcidon.png'),
(7, 'SPASMOLDIN ', 'Capsule', 50, 200000, ' Diare adalah feses yang encer, berair dan sering disertai keram perut, nyeri perut yang kadang juga disertai demam ringan, sakit atau keram otot dan sakit kepala. Penyebab diare yang paling umum adalah infeksi virus pada saluran cerna. Bakteri dan parasit juga dapat menyebabkan diare, kadang dengan feses berdarah dan demam tinggi. Diare jenis ini akibat infeksi dan sangat menular. Diare kronis seperti ini manandakan ada masalah medis serius di saluran cerna seperti infeksi kronis, penyakit inflamasi usus, radang usus atau jenis kanker tertentu.\r\n\r\nRadang pencernaan atau radang usus merupakan kondisi serius dan kronis dimana satu atau beberapa bagian usus mengalami radang yang dapat berakibat fatal pada kasu yang sangat parah. Radang usus menyebabkan sel-sel yang melapisi dinding usus mengelupas sehingga terjadi luka terbuka pada dinding usus yang kemudian mengeluarkan lendir/nanah. Jika tidak diobati dapat menyebabkan kebocoran pada jaringan sehingga bakteri jahat yang ada dalam usus bisa menyebar ke organ tubuh lainnya yang bisa berakibat fata.\r\n\r\nHasil penelitian terbaru dari mayo klinis menyebutkan bahwa radang usus dapat menyebabkan kanker karena penyakit ini menyebabkan sel-sel selaput lendir usus yang luka menjadi embrio kanker (displasia) dan juga dapat menurunkan sistem kekebalan tubuh.\r\n\r\nSpasmoldin membantu meringankan gangguan lambung, mengatasi diare, radang usus dan membantu menjaga kesehatan saluran pencernaan anda.\r\n\r\nKEGUNAAN :\r\nMembantu meringankan gangguan lambung dan radang pencernaan\r\n\r\nKOMPOSISI :\r\nTiap kapsul mengandung Ekstrak :\r\n- Curcumae Xanthoriza Rhizoma 40 mg\r\n- Andrographis Paniculata Herba 50 mg\r\n- Euphorbia Hirta herba 35 mg\r\n- Curcumae Domestica Rhizoma 45 mg\r\n- Zingiber Officinle Rhizoma 50 mg\r\n- Alstonia Scholaris Cortex 30 mg\r\n\r\nAturan Pakai :\r\n3 X sehari 2 kapsul\r\n', 'spasmoldin.png');

-- --------------------------------------------------------

--
-- Table structure for table `ms_catalogue`
--

CREATE TABLE IF NOT EXISTS `ms_catalogue` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_catalogue`
--

INSERT INTO `ms_catalogue` (`id`, `userid`, `status`, `date`) VALUES
(1, 4, 'published', '2015-01-20'),
(2, 4, 'published', '2015-01-21'),
(3, 4, 'rejected', '2015-01-21'),
(4, 4, 'waiting for approval', '2015-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `ms_guest`
--

CREATE TABLE IF NOT EXISTS `ms_guest` (
  `id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Address` text NOT NULL,
  `DateBirth` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `MobilePhone` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `IDcard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_guest`
--

INSERT INTO `ms_guest` (`id`, `Name`, `Address`, `DateBirth`, `Gender`, `email`, `MobilePhone`, `Phone`, `IDcard`) VALUES
(2, 'budiman', 'jalan awjdklawjdl', '1994-5-20', 'male', 'ajwkdjaD@gmawdil.com', '9258258', '29582590', 2147483647),
(5, 'budy', 'jawdlkj', '2015-12-5', 'awdaw@gmai', 'male', '21541251', '125125', 124124),
(6, 'Gorilaz', 'awdawd', '2015-12-24', 'jawdklaw@g', 'male', '12142141', '25425', 252352),
(7, 'awdawdawdawd', 'adwawdadw', '2015-12-21', 'awdaw@gmai', 'male', '1251251', '126126123', 1251);

-- --------------------------------------------------------

--
-- Table structure for table `ms_transale`
--

CREATE TABLE IF NOT EXISTS `ms_transale` (
`id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `status` varchar(25) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Total` int(11) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_transale`
--

INSERT INTO `ms_transale` (`id`, `iduser`, `tanggal`, `status`, `Image`, `Total`, `role`) VALUES
(1, 3, '2015-01-15', 'completed', 'Blank.png', 600000, 'user'),
(2, 3, '2015-01-15', 'Wait Payment', 'Blank.png', 900000, 'user'),
(3, 5, '2015-01-22', 'completed', 'Koala.jpg', 300000, 'Guest'),
(4, 6, '2015-01-22', 'Wait Payment', 'Blank.png', 350000, 'Guest'),
(5, 7, '2015-01-22', 'Wait Payment', 'Blank.png', 200000, 'Guest'),
(6, 5, '2015-01-22', 'Wait Payment', 'Blank.png', 230000, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
`id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`id`, `username`, `password`, `name`, `address`, `email`, `phone`, `role`) VALUES
(1, 'admin', '25f9e794323b453885f5181f1b624d0b', 'administrator', '', 'admin@crusadelife.com', '0682589275', 'admin'),
(2, 'aaaa', '25d55ad283aa400af464c76d713c07ad', 'Guest', 'null', 'null', 'null', 'user'),
(3, 'Furyday', '25d55ad283aa400af464c76d713c07ad', 'Fredy Joseph', 'Binus Street', 'awdawd@gmail.com', '08967845623', 'user'),
(4, 'cobaz', '25f9e794323b453885f5181f1b624d0b', 'cobaz', 'awdawdaw street', 'awdawd@gma.com', '124126126', 'supplier'),
(5, 'freddiew', '25d55ad283aa400af464c76d713c07ad', 'freddie wong', 'los angles', 'freddiew@gmail.com', '058284284', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_catalogue`
--
ALTER TABLE `detil_catalogue`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `detil_transale`
--
ALTER TABLE `detil_transale`
 ADD PRIMARY KEY (`id`,`idbarang`);

--
-- Indexes for table `ms_barang`
--
ALTER TABLE `ms_barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_catalogue`
--
ALTER TABLE `ms_catalogue`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_guest`
--
ALTER TABLE `ms_guest`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_transale`
--
ALTER TABLE `ms_transale`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_catalogue`
--
ALTER TABLE `detil_catalogue`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ms_barang`
--
ALTER TABLE `ms_barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ms_catalogue`
--
ALTER TABLE `ms_catalogue`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ms_transale`
--
ALTER TABLE `ms_transale`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ms_user`
--
ALTER TABLE `ms_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
