-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 09:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patong_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `atv_id` int(11) NOT NULL,
  `atv_name` text DEFAULT NULL,
  `atv_title` text NOT NULL,
  `atv_img1` text NOT NULL,
  `atv_img2` text NOT NULL,
  `atv_img3` text NOT NULL,
  `atv_img4` text NOT NULL,
  `atv_img5` text NOT NULL,
  `atv_img6` text NOT NULL,
  `atv_img7` text NOT NULL,
  `atv_img8` text NOT NULL,
  `atv_date` text NOT NULL,
  `atv_location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`atv_id`, `atv_name`, `atv_title`, `atv_img1`, `atv_img2`, `atv_img3`, `atv_img4`, `atv_img5`, `atv_img6`, `atv_img7`, `atv_img8`, `atv_date`, `atv_location`) VALUES
(3, 'หน่วยปฐมพยาบาลโรงพยาบาลป่าตอง', 'แข่งกีฬาเยาวชน', '20240117080133_96901.JPG', '20240117080133_40548.JPG', '20240117080133_02918.JPG', '20240117080133_08969.JPG', '20240117080133_22830.JPG', '20240117080134_46530.JPG', '20240117080134_82441.JPG', '20240120104145_14602.JPG', '2024-01-10', 'หาดป่าตอง'),
(4, 'รดน้ำดำหัวผู้สูงอายุ', 'สงกราน 2565', '20240117080502_10473.JPG', '20240117080502_11137.JPG', '20240117080502_14990.JPG', '20240117080502_16109.JPG', '20240117080502_62322.JPG', '20240117080502_44897.JPG', '20240117080502_69635.JPG', '20240117080502_67206.JPG', '2024-01-19', 'รพ.ป่าตองง'),
(6, 'ขับขี่ปลอดภัย', 'แง็นๆ', '20240117080621_03870.JPG', '20240117080621_39528.JPG', '20240117080621_34646.JPG', '20240117080621_55053.JPG', '20240117080621_82642.JPG', '20240117080621_88279.JPG', '20240117080621_60942.JPG', '20240117080621_59108.JPG', '2023-04-12', ''),
(7, 'ตรวจสุขภาพฟัน', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero rerum, magni accusamus sequi sint nostrum sit voluptatem qui laboriosam exercitationem ipsum cupiditate delectus, ipsam, pariatur quisquam ratione dicta quo enim.\r\n', '20240118031113_72404.JPG', '20240118031113_80084.JPG', '20240118031113_40329.JPG', '20240118031113_85749.JPG', '20240118031113_76976.JPG', '20240118031113_54533.JPG', '20240118031113_68488.JPG', '20240118031113_28605.JPG', '2024-01-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `buy_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `buy_name` text NOT NULL,
  `buy_title` text NOT NULL,
  `buy_pdf` text NOT NULL,
  `buy_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`buy_id`, `b_id`, `buy_name`, `buy_title`, `buy_pdf`, `buy_date`) VALUES
(1, 2, 'รายงานสรุปผลการจัดซื้อจัดจ้าง (สขร) ประจำเดือนธันวาคม 2567', 'รายงานสรุปผลการจัดซื้อจัดจ้าง (สขร) ประจำเดือนธันวาคม 2567', '44107.pdf', '2024-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `ceo`
--

CREATE TABLE `ceo` (
  `co_id` int(11) NOT NULL,
  `co_name` text NOT NULL,
  `co_position` text NOT NULL,
  `co_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ceo`
--

INSERT INTO `ceo` (`co_id`, `co_name`, `co_position`, `co_img`) VALUES
(1, 'แพทย์หญิงเหมือนแพร บุญล้อม', 'นายแพทย์ชำนาญการ', '20240123092744_88142.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ceo_manage`
--

CREATE TABLE `ceo_manage` (
  `ceo_id` int(11) NOT NULL,
  `ceo_name` text NOT NULL,
  `ceo_img` text NOT NULL,
  `ceo_position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ceo_manage`
--

INSERT INTO `ceo_manage` (`ceo_id`, `ceo_name`, `ceo_img`, `ceo_position`) VALUES
(1, 'ทพ.ปรเมศวรี รุ่งแสงอโนทัย', '20240115101255_54164.jpg', 'ทันตแพทย์ชำนาญการ'),
(2, 'พญ.ทัศนันท์ ง่วนสน', '35448.jpg', 'นายแพทย์ชำนาญการ'),
(3, 'นพ.ธนวรรธน์ ฟองศรี', 'ceo-3.jpg', 'นายแพทย์ชำนาญการ'),
(4, 'นพ.ชาติชาย ตั้งวินิต', '20240116030121_96269.jpg', 'นายแพทย์ชำนาญการ'),
(5, 'พญ.สุนันทา ขจรรุ่งเรือง', '90127.jpg', 'นายแพทย์ชำนาญการ'),
(6, 'ภญ.อชุพร คพวิเศษณ์', '20240116030107_56464.jpg', 'เภสัชกรชำนาญการพิเศษ'),
(7, 'นางอุทุมพร ชนะรัตน์', '20240116030334_87742.jpg', 'พยาบาลวิชาชีพชำนาญการ'),
(8, 'นส.หทัยรัตน์ รังสรรค์สฤษดิ์', '20240116030348_01870.jpg', 'พยาบาลวิชาชีพชำนาญการ'),
(9, 'นางรังษี เดสโร', '20240116030425_23142.jpg', 'เจ้าพนักงานธุรการชำนาญงาน');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `cn_id` int(11) NOT NULL,
  `cn_name` text NOT NULL,
  `cn_title` text NOT NULL,
  `cn_img` text NOT NULL,
  `img_1` text NOT NULL,
  `img_2` text NOT NULL,
  `img_3` text NOT NULL,
  `cn_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`cn_id`, `cn_name`, `cn_title`, `cn_img`, `img_1`, `img_2`, `img_3`, `cn_details`) VALUES
(1, 'คลินิกผิวหนัง', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum deleniti reiciendis eveniet voluptates numquam necessitatibus animi mollitia expedita nemo! Unde modi ea magni nemo quod ipsam provident sint, similique quaerat.', '5.jpg', '6.jpg', '49471.jpg', '59417.jpg', '        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure minus rerum eaque facilis. Exercitationem omnis, ipsum modi, sed tenetur minus nisi, quia velit praesentium ratione possimus error illum neque non.Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia cum, deleniti velit maxime necessitatibus sit obcaecati magni, et ea iure pariatur hic repudiandae reiciendis doloribus inventore molestiae numquam quos repellat sint. Ad dolores est cumque sit repudiandae, minus maxime assumenda officiis? Illo repudiandae quo est dignissimos repellat asperiores provident quos, odit, perferendis commodi eveniet cupiditate dolores. Ex, saepe accusamus? Asperiores blanditiis, laborum ducimus, aut quasi quis iste ipsa doloribus atque libero illo repellat, odit eos explicabo dignissimos veritatis! Quasi natus explicabo delectus placeat eaque facere, odit suscipit beatae eum obcaecati nulla provident soluta aspernatur quis sint quidem voluptate? Aut, impedit?'),
(2, 'คลินิกเวชศาสตร์ฟื้นฟู', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum deleniti reiciendis eveniet voluptates numquam necessitatibus animi mollitia expedita nemo! Unde modi ea magni nemo quod ipsam provident sint, similique quaerat.', '6.jpg', '', '', '', ''),
(3, 'คลินิกศัลยกรรมกระดูกและข้อ', '', '7.jpg', '', '', '', ''),
(4, 'คลินิก หู คอ จมูก', '', '8.jpg', '', '', '', ''),
(5, 'คลินิกอายุรกรรมระบบประสาท', '', '9.jpg', '', '', '', ''),
(6, 'คลินิกอายุรกรรม', '', '10.jpg', '', '', '', ''),
(7, 'คลินิกวาฟาร์ริน', '', '11.jpg', '', '', '', ''),
(8, 'คลินิกเบาหวาน', '', '12.jpg', '', '', '', ''),
(9, 'คลินิกความดันโลหิต', '', '13.jpg', '', '', '', ''),
(10, 'คลินิกชะลอไตเสื่อม', '', '14.jpg', '', '', '', ''),
(11, 'คลินิกสุขภาพจิต', '', '15.jpg', '', '', '', ''),
(12, 'คลินิก Ultra Sounl', '', '16.jpg', '', '', '', ''),
(13, 'คลินิกเด็ก', '', '17.jpg', '', '', '', ''),
(14, 'คลินิกสูตินรีเวช', '', '18.jpg', '', '', '', ''),
(15, 'คลินิกสุขภาพเพศที่หลากหลาย', '', '19.jpg', '', '', '', ''),
(16, 'คลินิกฝากครรภ์และวางแผนครอบครัว', '', '20.jpg', '', '', '', ''),
(17, 'คลินิกสุขภาพเด็กดี', '', '21.jpg', '', '', '', ''),
(18, 'คลินิกกายภาพบำบัด', '', '22.jpg', '', '', '', ''),
(19, 'คลินิกแพทย์แผนไทย', '', '23.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ct_id` int(11) NOT NULL,
  `ct_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ct_id`, `ct_name`) VALUES
(1, '57 ถ.ไสน้ำเย็น ต.ป่าตอง อ.กะทู้ จ.ภูเก็ต 83150 <br> Patong Hospital : 57 sainamyen Rd., Patong, Kathu, Phuket 83150 Thailand'),
(2, '076-342-633-4'),
(3, '076-340-617');

-- --------------------------------------------------------

--
-- Table structure for table `head`
--

CREATE TABLE `head` (
  `head_id` int(11) NOT NULL,
  `moit_id` int(11) NOT NULL,
  `head_name` text NOT NULL,
  `head_pdf` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `head`
--

INSERT INTO `head` (`head_id`, `moit_id`, `head_name`, `head_pdf`) VALUES
(100, 11, 'ขอส่งรายงานผลกำกับติดตามแจ้งประกาศแนวทางการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์', 'ขอส่งรายงานผลกำกับติดตามแจ้งประกาศแนวทางการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์.pdf'),
(101, 11, 'แบบฟอร์มการขอเผยแพร่ข้อมูลานเว็บไซต์โรงพยาบาลป่าตอง', 'แบบฟอร์มการขอเผยแพร่ข้อมูลานเว็บไซต์โรงพยาบาลป่าตอง.pdf'),
(103, 12, 'หน้าที่ตามกฎกระทรวง', 'ita.1.1.pdf'),
(104, 13, 'นโยบายและยุทธศาสตร์โรงพยาบาลป่าตอง', 'ita.1.1.pdf'),
(105, 13, 'กฎหมายที่เกี่ยวข้องับการดำเนินงาน', 'ita.1.1.pdf'),
(151, 15, 'ขอส่งรายงานผลกำกับติดตามแจ้งประกาศแนวทางการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์', '20240114164400_89597.pdf'),
(152, 15, 'กฎหมายที่เกี่ยวข้องับการดำเนินงาน', '20240114170826_97555.pdf'),
(153, 15, 'กฎหมายที่เกี่ยวข้องับการดำเนินงาน1', '20240114170826_44215.pdf'),
(165, 11, 'ขอส่งรายงานผลกำกับติดตามแจ้งประกาศ', '20240123050005_77583.pdf'),
(167, 245, 'ขอส่งรายงานผลกำกับติดตามแจ้งประกาศ 11', 'ขอส่งรายงานผลกำกับติดตามแจ้งประกาศ 11.pdf'),
(168, 245, 'เผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์', 'เผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์.pdf'),
(169, 246, 'ขอส่งรายงานผลกำกับติดตามแจ้งประกาศ', 'ขอส่งรายงานผลกำกับติดตามแจ้งประกาศ.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `h_id` int(11) NOT NULL,
  `h_name` text NOT NULL,
  `h_title` text NOT NULL,
  `h_pdf` text NOT NULL,
  `h_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`h_id`, `h_name`, `h_title`, `h_pdf`, `h_date`) VALUES
(1, 'ประกาศผู้ชนะการเสนอราคาประกวดราคาซื้อตู้เย็นเก็บรักษาศพ ', 'ชนิด 2 ช่อง จำนวน 4 ตู้ ด้วยวิธีประกวดราคาอิ', 'win.pdf', '2024-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `index_img`
--

CREATE TABLE `index_img` (
  `index_id` int(11) NOT NULL,
  `index_name` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `index_img`
--

INSERT INTO `index_img` (`index_id`, `index_name`, `img`) VALUES
(1, 'img', '20240119114957_28793.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `index_pag`
--

CREATE TABLE `index_pag` (
  `b_id` int(11) NOT NULL,
  `b_name` text DEFAULT NULL,
  `b_logo` text DEFAULT NULL,
  `b_time` text NOT NULL,
  `b_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `index_pag`
--

INSERT INTO `index_pag` (`b_id`, `b_name`, `b_logo`, `b_time`, `b_link`) VALUES
(1, 'ประกาศการรับสมัครงาน', 'job.jpg', '', 'job.php'),
(2, 'ประกาศการจัดซื้อ', 'buy.jpg', '2024-01-10', 'buy.php'),
(3, 'บริจาค', 'public.jpg', '2024-01-10', 'support.php'),
(4, 'ข่าวประชาสัมพันธ์', 'other.jpg', '2024-01-17', 'news.php');

-- --------------------------------------------------------

--
-- Table structure for table `ip_user`
--

CREATE TABLE `ip_user` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ip_user`
--

INSERT INTO `ip_user` (`id`, `ip_address`, `timestamp`) VALUES
(1, '::1', '2024-01-22 02:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `ita`
--

CREATE TABLE `ita` (
  `ita_id` int(11) NOT NULL,
  `year` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ita`
--

INSERT INTO `ita` (`ita_id`, `year`) VALUES
(1, '2566'),
(13, '2565');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `job_name` text NOT NULL,
  `job_title` text NOT NULL,
  `job_pdf` text NOT NULL,
  `job_img` text NOT NULL,
  `job_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_work`
--

CREATE TABLE `job_work` (
  `jw_id` int(11) NOT NULL,
  `jw_name` text NOT NULL,
  `jw_title` text NOT NULL,
  `jw_pdf` text NOT NULL,
  `jw_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_work`
--

INSERT INTO `job_work` (`jw_id`, `jw_name`, `jw_title`, `jw_pdf`, `jw_date`) VALUES
(1, 'รับเข้าทำงานพนักงานราชการทั่วไป ตำแหน่งเภสัชกร 3 อัตรา', 'ตำแหน่งเเภสัชกร 3 อัตรา', '20240118044644_36860.pdf', '2024-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `moit`
--

CREATE TABLE `moit` (
  `moit_id` int(11) NOT NULL,
  `ita_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `moit_name` text NOT NULL,
  `moit_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `moit`
--

INSERT INTO `moit` (`moit_id`, `ita_id`, `head_id`, `moit_name`, `moit_title`) VALUES
(11, 1, 166, 'MOIT 1', 'รายงานผลการดำเนินการตามแผนการจัดซื้อจัดจ้าง'),
(12, 1, 101, 'MOIT 2', 'รายงานผลการดำเนินการ'),
(13, 1, 103, 'MOIT 3', 'รายงานผลการดำเนินการตามแผนการจัดซื้อจัดจ้างและการจัดหาพัสดุ ประจำปี 2567 ไตรมาสที่ 1'),
(14, 1, 104, 'MOIT 4', 'รายงานผลการดำเนินการตามแผนการจัดซื้อจัดจ้างและการจัดหาพัสดุ ประจำปี 2567 ไตรมาสที่ 1'),
(245, 13, 168, 'MOIT 1', 'นโยบายและยุทธศาสตร์โรงพยาบาลป่าตอง'),
(246, 13, 169, 'MOIT 2', 'รายงานผลการดำเนินการตามแผน'),
(247, 13, 0, 'MOIT 3', 'รายงานผลการดำเนินการ'),
(248, 1, 0, 'MOIT 5', 'นโยบายและยุทธศาสตร์โรงพยาบาลป่าตอง'),
(249, 1, 0, 'MOIT 6', 'รายงานผลการดำเนินการตามแ'),
(250, 1, 0, 'MOIT 7', 'รายงานผลการดำเนินการตามแผนการจัดซื้อ'),
(251, 1, 0, 'MOIT 8', 'รายงานผลการดำเนินการตามแผนการจัดซื้');

-- --------------------------------------------------------

--
-- Table structure for table `news_pag`
--

CREATE TABLE `news_pag` (
  `np_id` int(11) NOT NULL,
  `np_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `np_title` text NOT NULL,
  `np_img` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_1` text NOT NULL,
  `img_2` text NOT NULL,
  `img_3` text NOT NULL,
  `np_details` text NOT NULL,
  `np_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `news_pag`
--

INSERT INTO `news_pag` (`np_id`, `np_name`, `np_title`, `np_img`, `img_1`, `img_2`, `img_3`, `np_details`, `np_date`) VALUES
(1, 'news_1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ea commodi accusamus optio accusantium a voluptatem dolorem eum at laudantium architecto fugit repellendus pariatur, laborum, nisi possimus. Unde, a ipsam.', 'news_2.jpg', '04595.JPG', '77618.JPG', '01013.JPG', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ea commodi accusamus optio accusantium a voluptatem dolorem eum at laudantium architecto fugit repellendus pariatur, laborum, nisi possimus. Unde, a ipsam.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Hic ea commodi accusamus optio accusantium a voluptatem dolorem eum at laudantium architecto fugit repellendus pariatur, laborum, nisi possimus. Unde, a ipsam.', '2024-01-17'),
(24, 'news_2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ea commodi accusamus optio accusantium a voluptatem dolorem eum at laudantium architecto fugit repellendus pariatur, laborum, nisi possimus. Unde, a ipsam.', 'news_1_06188.jpg', '17360.JPG', '19796.JPG', '27557.JPG', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum veritatis doloribus non. Quo quaerat veritatis dicta, optio minus eum ipsam dolorum provident repudiandae quod, assumenda quisquam reprehenderit nam rerum sed! Dolor fugiat tempora aspernatur nemo? Maiores sed temporibus aliquid illo deserunt labore ea qui reprehenderit. Facere ea ipsa placeat, porro facilis repudiandae eius voluptas expedita modi quis fuga obcaecati fugit veritatis? Modi, quas explicabo aperiam voluptas expedita tempora alias ducimus fuga veritatis corporis iusto reiciendis aliquid repellendus doloribus blanditiis quasi aut deleniti voluptate porro iste fugit libero praesentium aliquam numquam! Rem tenetur in possimus deleniti unde alias vitae error iste!\r\n', '2024-01-16'),
(25, 'news_3', 'หนังตะลุงน้องเดียว ลูกทุ่งวัฒนธรรม เรื่อง กลหลคนสองเพศ ตอนที่ 8', 'news_3_96494.jpg', '', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum veritatis doloribus non. Quo quaerat veritatis dicta, optio minus eum ipsam dolorum provident repudiandae quod, assumenda quisquam reprehenderit nam rerum sed! Dolor fugiat tempora aspernatur nemo? Maiores sed temporibus aliquid illo deserunt labore ea qui reprehenderit. Facere ea ipsa placeat, porro facilis repudiandae eius voluptas expedita modi quis fuga obcaecati fugit veritatis? Modi, quas explicabo aperiam voluptas expedita tempora alias ducimus fuga veritatis corporis iusto reiciendis aliquid repellendus doloribus blanditiis quasi aut deleniti voluptate porro iste fugit libero praesentium aliquam numquam! Rem tenetur in possimus deleniti unde alias vitae error iste!\r\n', '2024-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `sv_id` int(11) NOT NULL,
  `sv_name` text NOT NULL,
  `sv_title` text NOT NULL,
  `sv_img` text DEFAULT NULL,
  `img_1` text NOT NULL,
  `img_2` text NOT NULL,
  `img_3` text NOT NULL,
  `sv_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`sv_id`, `sv_name`, `sv_title`, `sv_img`, `img_1`, `img_2`, `img_3`, `sv_details`) VALUES
(1, 'งานผู้ป่วยนอก', '        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis velit consequatur iusto repellendus dolores at? Mollitia, architecto deleniti. Ullam, quo mollitia ipsum, commodi cum placeat accusamus nam numquam deleniti reprehenderit sint odit recusandae omnis! Voluptatum, tempora molestias! Autem ab ea possimus alias, quisquam optio consequuntur fugit ipsum tenetur eos est?\r\n', '1.jpg', '51066.JPG', '20240120105010.JPG', '20240120105216.JPG', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis velit consequatur iusto repellendus dolores at? Mollitia, architecto deleniti. Ullam, quo mollitia ipsum, commodi cum placeat accusamus nam numquam deleniti reprehenderit sint odit recusandae omnis! Voluptatum, tempora molestias! Autem ab ea possimus alias, quisquam optio consequuntur fugit ipsum tenetur eos est?\r\n'),
(2, 'ห้องฉุกเฉิน', 'ให้บริการรักษาผู้ป่วยฉุกเฉิน', '2.jpg', '', '', '', ''),
(3, 'ห้องคลอด', '', '3.jpg', '', '', '', ''),
(4, 'ห้องผ่าตัด', '', '4.jpg', '', '', '', ''),
(5, 'งานผู้ป่วยใน', '', '5.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `sp_id` int(11) NOT NULL,
  `sp_name` text NOT NULL,
  `sp_title` text NOT NULL,
  `sp_date` text NOT NULL,
  `sp_img` text NOT NULL,
  `img_1` text NOT NULL,
  `img_2` text NOT NULL,
  `img_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`sp_id`, `sp_name`, `sp_title`, `sp_date`, `sp_img`, `img_1`, `img_2`, `img_3`) VALUES
(1, 'บริจาคครั้งที่ 1', 'เนื่องจาก....', '2024-01-10', '20240115091001_31371.JPG', '20240112142320_66054.JPG', '20240112143358_71824.JPG', '20240115091126_36736.JPG'),
(2, 'บริจาคครั้งที่ 2', 'เนื่อง...', '0', '20240112142320_66054.JPG', '', '', ''),
(3, 'บริจาคครั้งที่ 3', 'เนื่อง...', '0', '20240112143358_71824.JPG', '', '', ''),
(4, 'บริจาคครั้งที่ 4', 'เนื่อง...', '0', '20240115091126_36736.JPG', '', '', ''),
(5, 'บริจาคครั้งที่ 5', 'เนื่อง...', '0', '20240115091137_97128.JPG', '', '', ''),
(6, 'บริจาคครั้งที่ 6', 'เนื่อง...', '2024-01-10', '20240115091145_00444.JPG', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_doctor`
--

CREATE TABLE `table_doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` text DEFAULT NULL,
  `doctor_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_doctor`
--

INSERT INTO `table_doctor` (`doctor_id`, `doctor_name`, `doctor_img`) VALUES
(1, 'ตารางตรวจแพทย์', '63775.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_doctordental`
--

CREATE TABLE `table_doctordental` (
  `dental_id` int(11) NOT NULL,
  `dental_name` text DEFAULT NULL,
  `dental_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_doctordental`
--

INSERT INTO `table_doctordental` (`dental_id`, `dental_name`, `dental_img`) VALUES
(1, 'ตารางตรวจทันตแพทย์', '57510.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(13) NOT NULL,
  `user_pass` varchar(13) NOT NULL,
  `user_class` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_pass`, `user_class`) VALUES
(1, 'admin', '123321', 'a'),
(2, 'user01', '123321', 'b'),
(3, 'user02', '123321', 'c'),
(4, 'user03', '123321', 'd'),
(5, 'user04', '123321', 'e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`atv_id`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`buy_id`);

--
-- Indexes for table `ceo`
--
ALTER TABLE `ceo`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `ceo_manage`
--
ALTER TABLE `ceo_manage`
  ADD PRIMARY KEY (`ceo_id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`cn_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `head`
--
ALTER TABLE `head`
  ADD PRIMARY KEY (`head_id`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `index_img`
--
ALTER TABLE `index_img`
  ADD PRIMARY KEY (`index_id`);

--
-- Indexes for table `index_pag`
--
ALTER TABLE `index_pag`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `ip_user`
--
ALTER TABLE `ip_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ita`
--
ALTER TABLE `ita`
  ADD PRIMARY KEY (`ita_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_work`
--
ALTER TABLE `job_work`
  ADD PRIMARY KEY (`jw_id`);

--
-- Indexes for table `moit`
--
ALTER TABLE `moit`
  ADD PRIMARY KEY (`moit_id`);

--
-- Indexes for table `news_pag`
--
ALTER TABLE `news_pag`
  ADD PRIMARY KEY (`np_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`sv_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `table_doctor`
--
ALTER TABLE `table_doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `table_doctordental`
--
ALTER TABLE `table_doctordental`
  ADD PRIMARY KEY (`dental_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `atv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ceo`
--
ALTER TABLE `ceo`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ceo_manage`
--
ALTER TABLE `ceo_manage`
  MODIFY `ceo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `head`
--
ALTER TABLE `head`
  MODIFY `head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `index_img`
--
ALTER TABLE `index_img`
  MODIFY `index_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `index_pag`
--
ALTER TABLE `index_pag`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ip_user`
--
ALTER TABLE `ip_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ita`
--
ALTER TABLE `ita`
  MODIFY `ita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_work`
--
ALTER TABLE `job_work`
  MODIFY `jw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `moit`
--
ALTER TABLE `moit`
  MODIFY `moit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `news_pag`
--
ALTER TABLE `news_pag`
  MODIFY `np_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `sv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `table_doctor`
--
ALTER TABLE `table_doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_doctordental`
--
ALTER TABLE `table_doctordental`
  MODIFY `dental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
