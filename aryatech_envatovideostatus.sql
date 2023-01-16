-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2023 at 05:43 AM
-- Server version: 10.3.37-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aryatech_envatovideostatus`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_name` varchar(512) NOT NULL,
  `user_type` varchar(256) NOT NULL,
  `ip` varchar(128) NOT NULL,
  `on_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_ignore` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='Global Activities';

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_name`, `user_type`, `ip`, `on_date`, `is_ignore`) VALUES
('login_try', 'admin', '49.36.80.208', '2022-05-22 05:25:04', 0),
('login_try', 'admin', '49.36.80.208', '2022-05-22 05:51:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `sid` int(11) NOT NULL,
  `setting_name` varchar(256) NOT NULL,
  `setting_value` text NOT NULL,
  `autoload` varchar(5) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='Global Settings';

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`sid`, `setting_name`, `setting_value`, `autoload`) VALUES
(1, 'site_name', 'Video Status', 'yes'),
(2, 'unlock_login_interval', '24', 'yes'),
(3, 'no_of_login_attampt', '3', 'yes'),
(4, 'site_status', 'online', 'yes'),
(5, 'request_token', 'li58W70knA6n7aY', 'yes'),
(6, 'admin_email', 'admin@gmail.com', 'no'),
(7, 'admin_password', 'e10adc3949ba59abbe56e057f20f883e', 'no'),
(8, 'admin_forgotpassword_token', 'CyHaIt7oQLkmdXu', 'no'),
(9, 'support_email', 'alpll.1328@gmail.com', 'no'),
(10, 'api_server_url', 'https://envatomarket.aryatechlabs.com/digitalposter/api', 'no'),
(11, 'latest_apk_version_name', 'v1', 'no'),
(12, 'latest_apk_version_code', '1', 'no'),
(13, 'apk_file_url', 'https://www.google.com', 'no'),
(14, 'whats_new_on_latest_apk', 'Bug Fix.', 'no'),
(15, 'update_skipable', '1', 'no'),
(16, 'ads_enable', '0', 'no'),
(17, 'ads_network', 'AdMob', 'no'),
(18, 'admob_open_id', '', 'no'),
(19, 'admob_banner_ads_id', '', 'no'),
(20, 'admob_interstitial_ads_id', '', 'no'),
(21, 'admob_native_ads_placement_id', '', 'no'),
(22, 'ads_clicks', '', 'no'),
(23, 'adx_open_id', '', 'no'),
(24, 'adx_banner_ads_id', '', 'no'),
(25, 'adx_interstitial_ads_id', '', 'no'),
(26, 'adx_native_ads_placement_id', '', 'no'),
(27, 'fcm_url', 'https://fcm.googleapis.com/fcm/send', 'no'),
(28, 'fcm_key', 'AIzaSyBox0qjps3Px5jvFLDMp4AqsaqUUSNFHW8', 'no'),
(29, 'privacy_policy_url', 'https://www.google.com/', 'no'),
(30, 'share_app_link', 'https://www.google.com/', 'no'),
(31, 'postman_collection', '0e60f6ce5bd1a11188fcbed8ddd3425b.json', 'no'),
(32, 'logo', 'logo.png', 'no'),
(33, 'logo_wide', 'logo_wide.png', 'no'),
(34, 'favicon', 'favicon.ico', 'no'),
(35, 'protocol', 'smtp', 'no'),
(36, 'smtp_host', 'mail.aryatechlabs.com', 'no'),
(37, 'smtp_user', '_mainaccount@aryatechlabs.com', 'no'),
(38, 'smtp_pass', 'Devkurba@3360', 'no'),
(39, 'smtp_port', '465', 'no'),
(40, 'smtp_crypto', 'ssl', 'no'),
(41, 'mailpath', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `sh_businesscategory`
--

CREATE TABLE `sh_businesscategory` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `image` varchar(256) NOT NULL,
  `detail_display` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = No, 1 = Yes',
  `detail_message` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_businesscategory`
--

INSERT INTO `sh_businesscategory` (`id`, `name`, `image`, `detail_display`, `detail_message`, `created_date`, `modified_date`, `is_del`) VALUES
(1, 'INSURANCE AGENT', 'PDOVicuAr2RhhsbtjKXdrmOD673O6OSBvwIpzdVe.png', 0, '', '2022-04-24 16:16:13', '0000-00-00 00:00:00', 0),
(2, 'Jewellery', 'yPFcY7NVrC7Sver0ye3QqaH49pddYYu1z8p6psJV.png', 0, '', '2022-04-24 16:16:13', '0000-00-00 00:00:00', 0),
(3, 'Courier Service', 'lQebO5g01QzUbSC68Ow3Ze8cAnBaEbIZD6yEQeUM.png', 0, '', '2022-04-24 16:16:13', '0000-00-00 00:00:00', 0),
(4, 'Hotel', 'B041wUHXnilxrxeQVN3njTWpqJMYSXn1WAzyENuO.png', 0, '', '2022-04-24 16:16:13', '0000-00-00 00:00:00', 0),
(5, 'Hospital', 'nfMrIl7ZnKOanBW7inVIhIoVo1sWOMIN0k4BgYHz.png', 0, '', '2022-04-24 16:16:13', '0000-00-00 00:00:00', 0),
(6, 'Advocate', 'CmcbxxCkhBlRAeorZqwYLO2eSN4ulqALDNDwY4FR.png', 0, '', '2022-04-24 16:16:13', '0000-00-00 00:00:00', 0),
(7, 'Education Business', 'O0njpMHUa8YN9fAJWvI1tgWDUGsJj3tyWybUFuZs.png', 0, '', '2022-04-24 16:16:13', '0000-00-00 00:00:00', 0),
(9, 'Restaurant and Catering', 'cRQ1XZD4RV8s1q0ZapTJBU7K5ef8npyKfhglIUdI.png', 0, '', '2022-04-24 16:16:13', '0000-00-00 00:00:00', 0),
(13, 'Kargil Vijay Diwas', 'UbPEXcEWF1IV9B3VkGK4W6cjIWHjBVr7ZCCsOL7C.png', 0, '', '2022-04-24 16:16:13', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_businessimage`
--

CREATE TABLE `sh_businessimage` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `language_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_businessimage`
--

INSERT INTO `sh_businessimage` (`id`, `name`, `description`, `category_id`, `image`, `language_id`, `created_date`, `modified_date`, `is_del`) VALUES
(33, 'Advocate', 'Advocate', 6, 'EHgRerOjPfJ3c7xldJ0wz216GLjuCZIHxlPYR147.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(34, 'Advocate', 'Advocate', 6, 'FBcE2iLwP4Wrb2wch6h7qQPtX5zEhN7DkNqUYYPK.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(35, 'Advocate', 'Advocate', 6, 'zB7uDiEcqFheesmdsGbp5PAlcYuk3PlCavEELopU.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(36, 'Advocate', 'Advocate', 6, 'YCIYEGgu1xSjrPfOkwoK1YnlUxBV4JmpkDjovg1f.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(37, 'Advocate', 'Advocate', 6, 'TPFuiWjXCWUcGYF1nJmpMWLXUqMDzuHvqUx6vAj9.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(38, 'Courier Service', 'Courier Service', 3, 'wyUtJZEC1xSVrlzb70Zm2Jzxjcanxs29QYY87kN2.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(39, 'Courier Service', 'Courier Service', 3, 'YkMHSlqsagS9paDtiaFMxjAXOISC8y1oMbcUY0DV.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(40, 'Courier Service', 'Courier Service', 3, 'e5qg7IoVGRBh5p0uuGrfIuObAqzZ6tDuHZAiqeXS.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(41, 'Courier Service', 'Courier Service', 3, 'AXVIJ8hSJCBgQ7L5qXQakFXVX0AN5ALsJsWSQfVA.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(42, 'Courier Service', 'Courier Service', 3, 'uTYJvVsoftrkul5YVAg8aBjpaZ70mkHCwMsE6O7Q.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(43, 'Courier Service', 'Courier Service', 3, '2R4dsALmGffWLXW6jXeBI5z0JRZyJReUNIMiDbro.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(44, 'Insurance Agent', 'Insurance Agent', 1, '6XoL3gUfVQSYYB41Dl1xy9z0tJ2pJ3c2IqBIJKNB.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(45, 'Insurance Agent', 'Insurance Agent', 1, 'hSFDTxjQXCCdmgnzGTyPsLwdp4CmcTPHrJ2Y5unm.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(46, 'Insurance Agent', 'Insurance Agent', 1, 'HPHvwjuGDLUfH8Y5YK4qr406uvwXoN1fljkuypag.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(47, 'Insurance Agent', 'Insurance Agent', 1, 'oX8nOolm0sfKMeXZqvoJllRujlJ6ejp4EcRpIvHm.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(48, 'Insurance Agent', 'Insurance Agent', 1, 'I7Vo48pvWIpiMH6jlUqqrYmzorCcWAdemU7tZbBo.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(49, 'Insurance Agent', 'Insurance Agent', 1, 'ePmqEJl5oFoEU4QRxEmeyofFmF51bv54ED7Eq04n.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(50, 'Insurance Agent', 'Insurance Agent', 1, 'zrMhfnyWCtJIwV2Un32CmLon5GR4KcscSZCMS8sC.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(51, 'Jewellery', 'Jewellery', 2, 'iLHzYL96DXI6UKRwpnJJ3BGH2kDnavDYfBTqnDoQ.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(52, 'Jewellery', 'Jewellery', 2, 'kJJoxtgCgub99t6sHbUJGikLpW7lzZwnf8xb4jw2.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(53, 'Jewellery', 'Jewellery', 2, 'giVPhFM8mCucHQflVRZwPOP91uTUvqPhgqMelj2s.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(54, 'Jewellery', 'Jewellery', 2, 'OfFG0jclSvMjTYHAY8AowtMyvvASICF1bahlxc9v.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(55, 'Jewellery', 'Jewellery', 2, 'wwS8C1Hg5MXxvA7QQrNhtKVLsszdel2brfEW2G1c.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(56, 'Jewellery', 'Jewellery', 2, 'G1EGZu7hRZGYNYJPseXTyfXzDKSjXrcfQ2gya7jI.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(57, 'Jewellery', 'Jewellery', 2, 'qbRfSyNZMgPBwT54gZAinGSLbjJDcSm4HSVG04ZC.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(58, 'Jewellery', 'Jewellery', 2, '0rRv6Vi9bH2fn7SebHinyaJbJ0xhPA16rRfxEHoL.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(59, 'Hotel', 'Hotel', 4, 'HoOcZYwppYYlE0y16umFVwpVRBg9ZkHGL7JVZRTW.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(60, 'Hotel', 'Hotel', 4, 'AbxhmZo5VSC9NtAbQ18K9Uu6ZkLgUosS36QBYebA.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(61, 'Hotel', 'Hotel', 4, 'QgIzQEaUw1a9AQNgmGgSLd0qztsu44BIfEupGMma.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(62, 'Hotel', 'Hotel', 4, 'ea1UfknlV5QQfoMlD1tNNYq151WK4G3Am6PKV5OG.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(63, 'Education', 'Education', 7, 'y9FhBLFueBLQTzTO431nTSfY0PacngvfOlTA9hiY.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(64, 'Education', 'Education', 7, '5TP4o15V2O73PCqesIPc5rGC0uM0qm7AHr7CgOfZ.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(65, 'Education', 'Education', 7, '4t3zrq6ym65e0XaBssnbP0EoiUl6xT2NRPLxpWq0.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(66, 'Education', 'Education', 7, 'a0znPjiCMoQgY1F3WyDuvMFeFYoFrY6X390fAz6B.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(67, 'Education', 'Education', 7, '1Hi3OoeSS8ZmdN34cU392IXmOc7DdQgR6CL3JTLx.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(68, 'Restaurant and catering', 'Restaurant and catering', 9, 'WmyfAMBDfUOKRGfanxcn1F3QjV1tKBwZVXsPWrgB.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(69, 'Restaurant and catering', 'Restaurant and catering', 9, 'xV8p7Vqgs1s1goSEuttvsMKEIIeLulANJOxaiCTe.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(70, 'Restaurant and catering', 'Restaurant and catering', 9, 'JzHH68nkm4xBzItJpxlYiTdzz79UriI51iIF8vXo.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(71, 'Restaurant and catering', 'Restaurant and catering', 9, 'uBkiFRrNws14wE9cXsDh0p864tYhipLcGl0MX67T.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(72, 'Hospital', 'Hospital', 5, 'nFTZtnFp3C4zxNliruW0UdtekeglsAyn8jrVt7q9.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(73, 'Hospital', 'Hospital', 5, 'gwgPaj6GLUFqKzh7lDD5CdrSyoT8MMNKItcTJb6I.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(74, 'Hospital', 'Hospital', 5, 'URoewH8E6Q6EwwK1hoGDEnO1N7vJ90RtaJQMRnbr.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(75, 'Hospital', 'Hospital', 5, '0hXaqoUKkRkbhTNJ6YTYlBLnvUvZnf5kfcmfxdYj.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(76, 'Hospital', 'Hospital', 5, 'hCsWYCVmwbNFaVmjRi0duPIgoKg5g5xZzqAsKWDH.png', 1, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0),
(78, 'test', 'test', 1, 'V6nmhDXHdCAnZ0CFRfPaFLc0PMOWntF8Shi4g4Q7.jpeg', 2, '2022-04-24 16:22:57', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_businessvideo`
--

CREATE TABLE `sh_businessvideo` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `language_id` varchar(128) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_businessvideo`
--

INSERT INTO `sh_businessvideo` (`id`, `name`, `description`, `category_id`, `image`, `language_id`, `created_date`, `modified_date`, `is_del`) VALUES
(3, 'Restaurant and Catering', 'Restaurant and Catering', 1, 'DOz1agIouZ3oBczMyQnTxCRfvYeAxeA4OA4XM9H9.mp4', '2', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(8, 'Kargil Vijay Diwas', 'Kargil Vijay Diwas', 13, 'MVncxi3t3b2umh7Py0s4RwC6mleo6EKuD2VJpZCd.mp4', '3', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(9, 'Kargil Vijay Diwas', 'Kargil Vijay Diwas', 13, 'wOCndQkEIhg3zQ1uBRVP81vHIRMSLCrztOT8GWXQ.mp4', '1', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(10, 'Kargil Vijay Diwas', 'Kargil Vijay Diwas', 13, 'EUlIAI8LpDlbFyJjYThjO6JnPg8cuvA8hdrnBNtk.mp4', '1', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(11, 'Kargil Vijay Diwas', 'Kargil Vijay Diwas', 13, 'w52Q26aIbKnuPjmhUOQROg28g5cSY9SmLrZDSTz2.mp4', '2', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(12, 'Restaurant and Catering', 'Restaurant and Catering', 9, 'VwBgWi3LjXAedUeqoEyhIRvA1ijtNABmZOflvUuj.mp4', '2', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(13, 'Restaurant and Catering', 'Restaurant and Catering', 9, 'q5pt0dWdESOpnMMUdHKNypupPnMa4mquCUl4OncS.mp4', '1', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(14, 'Restaurant and Catering', 'Restaurant and Catering', 9, 'ZaIFpWpVRecnOS8i7HcUU4UYqaQGb2sXYCcya5xu.mp4', '2', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(15, 'Restaurant and Catering', 'Restaurant and Catering', 6, 'xjWFWAhOVECJoQkEoFdML9g3m58bcwzuMbdsW7be.mp4', '2', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(16, 'Restaurant and Catering', 'Restaurant and Catering', 5, 'cWuAwQGP017oULDLIEW61zNAkANAfp9YuDvQkbKK.mp4', '2', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(17, 'Restaurant and Catering', 'Restaurant and Catering', 1, 'beVwGQakze2c1tpeVfwhFzPQd80DyXcysdSf5yhC.mp4', '1', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0),
(18, 'Hospital', 'Hospital', 5, 'W3jDqEgiiW9Ip2Lt0YC6nU3MevsA4RCFeFqqeydR.mp4', '3', '2022-04-24 16:26:44', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_contact_us`
--

CREATE TABLE `sh_contact_us` (
  `cnt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `subject` text NOT NULL,
  `description` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_contact_us`
--

INSERT INTO `sh_contact_us` (`cnt_id`, `user_id`, `name`, `email`, `subject`, `description`, `created_date`) VALUES
(1, 4, 'AAA BBB', 'aaabbb@gmail.com', 'This is test..', 'This is description..', '2022-05-18 22:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `sh_databasebackup`
--

CREATE TABLE `sh_databasebackup` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `size` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sh_festivalcategory`
--

CREATE TABLE `sh_festivalcategory` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `image` varchar(256) NOT NULL,
  `festival_date` date NOT NULL,
  `active_from` date NOT NULL,
  `detail_display` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = No, 1 = Yes',
  `detail_message` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_festivalcategory`
--

INSERT INTO `sh_festivalcategory` (`id`, `name`, `image`, `festival_date`, `active_from`, `detail_display`, `detail_message`, `created_date`, `modified_date`, `is_del`) VALUES
(3, 'Makar Sankranti', 'qfLDJrKyk9dp21d3xmPtflazTgaSLEXpxFwkHp6X.png', '2022-12-24', '2021-11-30', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(4, 'Republic Day', 'kMOhDemRp2mzYRzcQuCkUsxqR0qt3jjGgAE4lTSd.png', '2022-12-16', '2021-11-30', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(5, 'Teacher\'s Day', 'O30SQhBzGohRv5jkVaTT6vV10uOiRuONpL5GgpSs.png', '2022-11-10', '2021-11-16', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(6, 'Father\'s Day', 'WgAGVemQFbxRwsmaInw3nBpJJllZhWDXLlan7DcZ.png', '2022-11-09', '2021-11-01', 1, '', '2022-04-24 02:19:57', '0000-00-00 00:00:00', 0),
(7, 'Dhanteras', 'd7bOSo1XC589dvmQE2FCNzhMfX3MONsgm5oEbqar.png', '2022-11-10', '2021-11-23', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(8, 'Indian Navy Day', 'yGCgJijrKPgDo9XvfM1hlBCRc3MZPyQwViJnQ2mS.png', '2022-12-12', '2021-12-31', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(9, 'Kargil Vijay Diwas', 'KF82pv9N3650kYO8qLnzZJDp6xtC3VeUKh8syVXO.png', '2022-12-22', '2021-11-25', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(10, 'Mothers Day', '1LwDH7uOcKnxipyXqmMivYJ0aJPjb9b6bgjfrw92.png', '2022-11-30', '2021-11-30', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(11, 'Friendship Day', 'JZf6m1btBwH0rsFniWDtwJ4mBHAWEd5IsUpw6Iig.png', '2022-11-27', '2021-11-29', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(12, 'Women\'s Day', 'b2Ai8EpMLHZ1PiwLRRQgxWqbV4doEi2Yj7Gs8loI.png', '2022-11-27', '2021-11-30', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(13, 'Ramnavami', 'KLm6SpU2ySLgfjNoBbBqXMVBOi7nvZAWhHhmgRao.png', '2022-11-26', '2021-11-29', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(14, 'Rathyatra', 'xyJriqq1B4xUbf8OIGJ4rNYxDuXyGLYKHVqofOLO.png', '2022-11-23', '2021-12-01', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0),
(15, 'Gandhi Jayanti', '2KF82n4mPvomQ7BPUODpe6etOafjgQyzdit036dZ.png', '2022-11-29', '2021-11-30', 1, '', '2022-04-24 02:20:19', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_festivalimage`
--

CREATE TABLE `sh_festivalimage` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `language_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_festivalimage`
--

INSERT INTO `sh_festivalimage` (`id`, `name`, `description`, `category_id`, `image`, `language_id`, `created_date`, `modified_date`, `is_del`) VALUES
(3, 'Makar Sankranti', 'Makar Sankranti', 3, 'YWS3xPJPLatZymeAF5fDOFql6gyGVj2jtUv36M0q.png', 1, '2022-04-24 15:52:56', '0000-00-00 00:00:00', 0),
(4, 'Makar Sankranti', 'Makar Sankranti', 3, 'MeDzRuNBqVKpJLDkPKdhesJciPtRD6eyR5JWgmHZ.png', 2, '2022-04-24 15:52:56', '0000-00-00 00:00:00', 0),
(5, 'Makar Sankranti', 'Makar Sankranti', 3, 'oVnXiHPW1i9iWRvIaq9We1tvHNX5ZUeIC1HySJ26.png', 1, '2022-04-24 15:52:56', '0000-00-00 00:00:00', 0),
(6, 'Makar Sankranti', 'Makar Sankranti', 3, 'NBunBbgZ4VJDhp7fVqR4mKNBRMIBQpe40EuFd54q.png', 3, '2022-04-24 15:52:56', '0000-00-00 00:00:00', 0),
(7, 'Makar Sankranti', 'Makar Sankranti', 3, 'vpIPAnLAVrYk7Gwgr7AaOr1VHXkVA8B9MMMGBD1c.png', 2, '2022-04-24 15:52:56', '0000-00-00 00:00:00', 0),
(8, 'Makar Sankranti', 'Makar Sankranti', 3, 'WeXiXZjwJW7n4YbRgRuuwgeE53nvodbYmwBiSoYC.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(9, 'Makar Sankranti', 'Makar Sankranti', 3, '6InrasyxA58TNLwBrSR098rvGXM7Mprj1SQjt5C6.png', 2, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(10, 'Makar Sankranti', 'Makar Sankranti', 3, '7ilDt2BYjX0IFv11gdVqxHlklvwxEYMXQxylpFui.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(11, 'Makar Sankranti', 'Makar Sankranti', 3, 'ix7dZnKqKzowBCPyuPUsA3zWuJzlk2VVF73n5dN3.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(12, 'Makar Sankranti', 'Makar Sankranti', 3, 'uTlhf5indpMabKARA3CS1ePhFEPv24loYUNvVqTC.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(13, 'Republic Day', 'Republic Day', 4, 'pIVr52uVEt5pBVmLuyMz4tKcMdxOGulSnbl9Jd2r.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(14, 'Republic Day', 'Republic Day', 4, 'BoH8DUG5BMeuo1mRIbGJqrgDSnaME5cUh8lpxarZ.png', 2, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(15, 'Republic Day', 'Republic Day', 4, 'N6lveZqN16zSelAehoBORyyKbOnzJBqPuO1SdChU.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(16, 'Republic Day', 'Republic Day', 4, '3yC08R40tQrU2Xw3txbETZz98lMJdHFGwiqgH5Ln.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(17, 'Republic Day', 'Republic Day', 4, 'oDYtdlWuppEzin6ZIB1Nu1gVdr3Q2TXniTLCHABj.png', 2, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(18, 'Republic Day', 'Republic Day', 4, '5iV9Mh3NsRXp3sknAO1e1H5bQARHcZIlJ93NoYID.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(19, 'Republic Day', 'Republic Day', 4, 'HHvyLHAyUnceSEN1xiAi1XmWn5UCodXMUigoj9FM.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(20, 'Republic Day', 'Republic Day', 4, '2GqRpPy1H1dtIntijTb7hTIMTQ01Apae0ifukM0l.png', 2, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(21, 'Republic Day', 'Republic Day', 4, 'QhtDqVFwTu2xyjzchqS9F1oFYDVgAV8T6G6jDts2.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(22, 'Republic Day', 'Republic Day', 4, '8wKbzPDqNoN1Qh0qy8sCeSmxHwiuBbWIxywxtw5C.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(23, 'Teacher\'s Day', 'Teacher\'s Day', 5, 'zuXfT7l3rDiXeF7vBRJxA2uvNbmszExGk3S1y8Lt.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(24, 'Teacher\'s Day', 'Teacher\'s Day', 5, 'TRCXICucQRbpm0JWokRmZsbIXvrwuz1jzNZYS8rA.png', 2, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(25, 'Teacher\'s Day', 'Teacher\'s Day', 5, 'jQmyVpeRl1uRiB1VDCrNUAQezI2LDvQG8VCke2nr.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(26, 'Teacher\'s Day', 'Teacher\'s Day', 5, 'd1xmwmMi3SHw2Rsmn6Ly2saPbFN3PZReFG0Xj4Pe.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(27, 'Teacher\'s Day', 'Teacher\'s Day', 5, 'hj0HXR3SZ3vH4ACmTT3ZdTw0kKYXSTi9UlWOy0lj.png', 2, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(28, 'Teacher\'s Day', 'Teacher\'s Day', 5, 'LSj5kAHILbj2JoQguZKL1WboCVhgfMPzbHDRBGcu.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(29, 'Father\'s Day', 'Father\'s Day', 6, 'dGtHH7TtYZMokmHrgyleHZrAbPhDp35mo6ZuDFq6.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(30, 'Father\'s Day', 'Father\'s Day', 6, 'GUHHqxJk5lHUiEJ4ywjUAjv4Q2Xlj2zsqier6VYO.png', 2, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(31, 'Father\'s Day', 'Father\'s Day', 6, 'X3fXlhQOocXpKfMbeKjOBPrs5lDw27zYmAhstiiD.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(32, 'Father\'s Day', 'Father\'s Day', 6, 'Su8LJaVNZhXWnNWpJ0ReKos28X16HTyCpGlbh2hz.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(33, 'Father\'s Day', 'Father\'s Day', 6, 'zp6qyQBV2v81F9G2yDQABjzHOjSw4A4e0MTLMHHq.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(34, 'Father\'s Day', 'Father\'s Day', 6, '0EOiBmsrLVvIYnPlKMIDQ7KuN0vcm0hxccepGmmc.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(35, 'Dhanteras', 'Dhanteras', 7, 'k4iyoJupUZ42nlYNVFOUd5kEguuvY7TOj1dwabit.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(36, 'Dhanteras', 'Dhanteras', 7, 'oTFlxr9Fp561dtw6vo2mjWLURRWid5ZP0YBzlYUq.png', 2, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(37, 'Dhanteras', 'Dhanteras', 7, 'GbFkI0UdUj647DS7tmnmifWP8rnyjoVe3bvGcY5S.png', 1, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(38, 'Dhanteras', 'Dhanteras', 7, '0UCWhPKJ92kY3S7iJ8iiynw1Goz5uZY2Cl1m2NAT.png', 3, '2022-04-24 15:52:55', '0000-00-00 00:00:00', 0),
(39, 'Dhanteras', 'Dhanteras', 7, 'qQiTBPFSPSA7Nb5V1SAcK3bqdNiJojhbsvgBdXpG.png', 3, '2022-04-24 15:52:36', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_festivalvideo`
--

CREATE TABLE `sh_festivalvideo` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `language_id` varchar(128) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sh_greetingcategory`
--

CREATE TABLE `sh_greetingcategory` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `image` varchar(256) NOT NULL,
  `detail_display` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = No, 1 = Yes',
  `detail_message` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_greetingcategory`
--

INSERT INTO `sh_greetingcategory` (`id`, `name`, `image`, `detail_display`, `detail_message`, `created_date`, `modified_date`, `is_del`) VALUES
(2, 'Happy Birthday', 'XwFD0frwE1ShxnLvCopINqs8I9tBcGQ3wywG7Pik.png', 0, '', '2022-04-24 16:20:30', '0000-00-00 00:00:00', 0),
(3, 'Thank you', 'u6R2Yhnh4EZVlcGSLNqRPnANpJNgepnhxMVBWfAK.png', 0, '', '2022-04-24 16:20:30', '0000-00-00 00:00:00', 0),
(6, 'Womes Day', '7TzYcs6VXG5rPc6XEXFEIlXzuruooH66eXGtAKrN.png', 0, '', '2022-04-24 16:20:30', '0000-00-00 00:00:00', 0),
(7, 'National Day', 'a3U4IxYRBPZ84H5OseQa4meFwCP4nD85HqVOvPeA.png', 0, '', '2022-04-24 16:20:30', '0000-00-00 00:00:00', 0),
(8, 'Monther\'s Day', '6PRv7CKT5yI4i6hgglR6PNN72u5MXNjNbQn5twXL.png', 0, '', '2022-04-24 16:20:18', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_greetingimage`
--

CREATE TABLE `sh_greetingimage` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `language_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_greetingimage`
--

INSERT INTO `sh_greetingimage` (`id`, `name`, `description`, `category_id`, `image`, `language_id`, `created_date`, `modified_date`, `is_del`) VALUES
(7, 'Happy Birthday', 'Happy Birthday', 2, 'sLH3gB1XW4WIWI1Gl4cTDbWdJFPsfKJG1vzWSI3f.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(8, 'Happy Birthday', 'Happy Birthday', 2, 'BRgNegV6ZT8jkdh96a6N8oDbGSuOS7QR0LazPtUF.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(9, 'Happy Birthday', 'Happy Birthday', 2, 'EB5UH6b90decJVCPUU9ALAOBAgsnGXAOisvkm1db.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(10, 'Happy Birthday', 'Happy Birthday', 2, 'fNfkdFobk1U9Nz3PcDedkA4eXHsEiNChsNFIEDas.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(14, 'FRAME1', 'FRAME', 2, 'OQs8MG2uRGSb4LytuT6Hrpsstg4B72JvqLDjgYeT.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(15, 'f1', 'f', 2, 'jU3ny3yZBWhBCnRkhwYYitGf2zHupE9csgVMQoNi.jpeg', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(16, 'f new', 'new', 2, 'FA6Cfgxkh4aZ7kw7E5ouesvuZ1QG0K2TC9JplOCp.png', 3, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(23, 't', 'tt', 2, 'iLarX8m2lJB81Cr91R6RlE9lmPsSllwqDuituyzJ.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(25, 'aa', 'aaaa', 2, 'x6BnqvEcoJlBMCyFWctUd89hQXoFgEgPWc53wU6O.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(26, 'BIRTHDAY', 'BIRTHDAY1', 2, 'RQg6xQpdyVN4GxUvq7WuEvGLMug8AdUB0UWSD11e.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(27, 'BIRTHDAY', 'BIRTHDAY2', 2, 'TUV5F3C5rW5lBeVQzugjDez8CTf8byNOHQLQQ5im.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(28, 'BIRTHDAY', 'BIRTHDAY3', 2, 'p6M62lGIPC7FFBlB2W6LvQ1ac24w2X1LX6e69vbW.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(29, 'BIRTHDAY', 'BIRTHDAY4', 2, 'e48nL3K27iPHDlxR3LLHWOHrWv3lKkViqMMtcSXT.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(30, 'BIRTHDAY', 'BIRTHDAY5', 2, 'LMmlWcGyBbKKOeUt8lpIjyLty57xsZEGXLnLnf6e.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(47, 'womes day', 'womes day', 6, 'tbAMXQVboH72uoB73Io3U6ljKhVxCIjaQl7UZoUl.png', 3, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(48, 'womes day', 'womes day', 6, 'oom5BgYsFtxh1xbRs7C09zFzN7gEi4v1Fp8Z65aR.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(49, 'womes day', 'womes day', 6, 'WZWumd8jR9WEHUpZUemRNCpztLH6S6gfYjm94GbG.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(50, 'womes day', 'womes day', 6, 'mZixUk3AGQErFw1fGkPLKnDoFMYKsrU8wEDrPJkn.png', 3, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(51, 'womes day', 'womes day', 6, 'UzXiwQOpz3FreUSlbQqQs32jdPRMw2l0Nc6Llsmy.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(52, 'National Day', 'National Day', 7, 'l8eDcgVrCapR3M2ZZ6klROgD6s8kGddqejc1jftc.png', 3, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(53, 'National Day', 'National Day', 7, 'MjWgNLSrhQp3qlYZFYNd9QFQhJFn9LjpqNA5iuuZ.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(54, 'National Day', 'National Day', 7, '2157wHxDoysRzz3utYmJGIWZlqUYULbOKjgQsaBM.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(55, 'National Day', 'National Day', 7, 'viExQ1JqjTvgxH50u4qZT6oKlN8jyWAnFZOtc5sJ.png', 3, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(56, 'National Day', 'National Day', 7, 'Pq1iVPA7bzFLf0bpSuPi4ZcqjobDTXyFKFiJvqiv.png', 3, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(57, 'National Day', 'National Day', 7, 'tT6l6O1LTm9Sspe3bxGfnqZH5HacCrM2xvXb6iUl.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(58, 'Monther\'s Day', 'Monther\'s Day', 8, 'yTu75TtrhaWLN9D20yW7YUq3QYemNsO3K0YDJ2ng.png', 3, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(59, 'Monther\'s Day', 'Monther\'s Day', 8, 'TRdGPXMhbI5LBAxJgAGRZo4h6ErPmrEKBlpTvr21.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(60, 'Monther\'s Day', 'Monther\'s Day', 8, 'RlcbI1WUh4NavCdlIhx3DfVhopOneGjl72LsG91z.png', 2, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(61, 'Monther\'s Day', 'Monther\'s Day', 8, 'tzUvCyWXAjsaqSUkcID5iOeCCUf4nUOKSNNMd6SB.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0),
(62, 'Monther\'s Day', 'Monther\'s Day', 8, 'vNhg1a2TN4UCdn7NZKlTnD55bP5MkK0uvpDVatYB.png', 1, '2022-04-24 16:32:14', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_greetingvideo`
--

CREATE TABLE `sh_greetingvideo` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `language_id` varchar(128) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sh_language`
--

CREATE TABLE `sh_language` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_language`
--

INSERT INTO `sh_language` (`id`, `name`, `created_date`, `modified_date`, `is_del`) VALUES
(1, 'English', '2022-04-17 04:47:14', '0000-00-00 00:00:00', 0),
(2, 'Hindi', '2022-04-17 04:47:14', '0000-00-00 00:00:00', 0),
(3, 'Gujarati', '2022-04-24 03:11:57', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_sliders`
--

CREATE TABLE `sh_sliders` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `image` varchar(256) NOT NULL,
  `link` varchar(512) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted, 0 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_sliders`
--

INSERT INTO `sh_sliders` (`id`, `name`, `image`, `link`, `created_date`, `modified_date`, `is_del`) VALUES
(1, 'Banner 1', 'c4ca4238a0b923820dcc509a6f75849b.jpg', 'https://www.google.com/', '2022-04-16 10:51:17', '0000-00-00 00:00:00', 0),
(3, 'Banner 2', 'eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 'https://www.google.com/', '2022-04-16 11:29:57', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_users`
--

CREATE TABLE `sh_users` (
  `uid` int(11) NOT NULL,
  `google_id` varchar(500) NOT NULL,
  `facebook_id` varchar(500) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `change_email` varchar(500) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `invite_code` int(11) NOT NULL,
  `invite_by` int(11) NOT NULL,
  `enable_push` int(11) NOT NULL DEFAULT 1 COMMENT '0 = Disable,1 = Enable',
  `badge_count` int(11) NOT NULL DEFAULT 0,
  `push_count` int(11) NOT NULL DEFAULT 0,
  `last_seen` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'en',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL,
  `is_first_login` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = First Login Complete',
  `is_create_profile` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = Create Profile Complete',
  `is_active_profile` int(11) NOT NULL DEFAULT 1 COMMENT '0 = Deactivate Profile, 1 = Active',
  `is_active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = Inactive,1 = Active',
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sh_users`
--

INSERT INTO `sh_users` (`uid`, `google_id`, `facebook_id`, `first_name`, `last_name`, `email`, `change_email`, `avatar`, `mobile_number`, `invite_code`, `invite_by`, `enable_push`, `badge_count`, `push_count`, `last_seen`, `language`, `created_date`, `modified_date`, `is_first_login`, `is_create_profile`, `is_active_profile`, `is_active`, `is_del`) VALUES
(4, '1234565456465456465416', '', 'Master', 'Admin', 'admin@gmail.com', '', '', '', 50, 50, 1, 0, 0, '1652878372', 'en', '2022-05-18 22:22:52', '2022-05-18 18:22:52', 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_users_device`
--

CREATE TABLE `sh_users_device` (
  `login_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `device_id` text NOT NULL,
  `device_token` text NOT NULL,
  `device_type` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL,
  `is_del` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 = Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sh_users_device`
--

INSERT INTO `sh_users_device` (`login_id`, `user_id`, `auth_token`, `device_id`, `device_token`, `device_type`, `created_date`, `modified_date`, `is_del`) VALUES
(5, 4, 'vd4FXnb6deqbNUU', '', '', 'other', '2022-05-22 14:45:24', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_users_meta`
--

CREATE TABLE `sh_users_meta` (
  `umid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_meta_key` varchar(40) NOT NULL,
  `user_meta_value` mediumtext NOT NULL,
  `autoload` tinyint(4) NOT NULL DEFAULT 1,
  `is_del` tinyint(4) NOT NULL COMMENT '1 = Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sh_users_meta`
--

INSERT INTO `sh_users_meta` (`umid`, `user_id`, `user_meta_key`, `user_meta_value`, `autoload`, `is_del`) VALUES
(12, 4, 'last_login', '1653196524', 1, 0),
(13, 4, 'last_login_ip', '49.36.80.208', 0, 0),
(14, 4, 'last_action', '1653196524', 1, 0),
(15, 4, 'last_login_device', '', 0, 0),
(16, 4, 'user_activation_token', 'hIQJQLk5gYqnyjj', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `sh_businesscategory`
--
ALTER TABLE `sh_businesscategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_businessimage`
--
ALTER TABLE `sh_businessimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_businessvideo`
--
ALTER TABLE `sh_businessvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_contact_us`
--
ALTER TABLE `sh_contact_us`
  ADD PRIMARY KEY (`cnt_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sh_databasebackup`
--
ALTER TABLE `sh_databasebackup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_festivalcategory`
--
ALTER TABLE `sh_festivalcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_festivalimage`
--
ALTER TABLE `sh_festivalimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_festivalvideo`
--
ALTER TABLE `sh_festivalvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_greetingcategory`
--
ALTER TABLE `sh_greetingcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_greetingimage`
--
ALTER TABLE `sh_greetingimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_greetingvideo`
--
ALTER TABLE `sh_greetingvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_language`
--
ALTER TABLE `sh_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_sliders`
--
ALTER TABLE `sh_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_users`
--
ALTER TABLE `sh_users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `sh_users_device`
--
ALTER TABLE `sh_users_device`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sh_users_meta`
--
ALTER TABLE `sh_users_meta`
  ADD PRIMARY KEY (`umid`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sh_businesscategory`
--
ALTER TABLE `sh_businesscategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sh_businessimage`
--
ALTER TABLE `sh_businessimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `sh_businessvideo`
--
ALTER TABLE `sh_businessvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sh_contact_us`
--
ALTER TABLE `sh_contact_us`
  MODIFY `cnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sh_databasebackup`
--
ALTER TABLE `sh_databasebackup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sh_festivalcategory`
--
ALTER TABLE `sh_festivalcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sh_festivalimage`
--
ALTER TABLE `sh_festivalimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sh_festivalvideo`
--
ALTER TABLE `sh_festivalvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sh_greetingcategory`
--
ALTER TABLE `sh_greetingcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sh_greetingimage`
--
ALTER TABLE `sh_greetingimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sh_greetingvideo`
--
ALTER TABLE `sh_greetingvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sh_language`
--
ALTER TABLE `sh_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sh_sliders`
--
ALTER TABLE `sh_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sh_users`
--
ALTER TABLE `sh_users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sh_users_device`
--
ALTER TABLE `sh_users_device`
  MODIFY `login_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sh_users_meta`
--
ALTER TABLE `sh_users_meta`
  MODIFY `umid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sh_users_device`
--
ALTER TABLE `sh_users_device`
  ADD CONSTRAINT `sh_users_device_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sh_users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sh_users_meta`
--
ALTER TABLE `sh_users_meta`
  ADD CONSTRAINT `sh_users_meta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sh_users` (`uid`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
