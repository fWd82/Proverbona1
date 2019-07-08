-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2019 at 04:35 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proverbona1`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_favorite_proverb`
--

CREATE TABLE `table_favorite_proverb` (
  `favorite_proverb_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `proverb_id` int(11) DEFAULT NULL,
  `proverb_lang` int(11) NOT NULL,
  `favorite_proverb_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_favorite_proverb`
--

INSERT INTO `table_favorite_proverb` (`favorite_proverb_id`, `user_id`, `proverb_id`, `proverb_lang`, `favorite_proverb_timestamp`) VALUES
(16, 1, 7, 2, '2019-05-18 21:12:56'),
(17, 1, 7, 2, '2019-05-18 23:04:06'),
(19, 1, 6, 2, '2019-05-18 23:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `table_feedback`
--

CREATE TABLE `table_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_title` mediumtext,
  `feedback_body` mediumtext,
  `feedback_type` mediumtext,
  `feedback_by` int(11) DEFAULT NULL,
  `feedback_context` int(11) DEFAULT NULL,
  `feedback_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_feedback`
--

INSERT INTO `table_feedback` (`feedback_id`, `feedback_title`, `feedback_body`, `feedback_type`, `feedback_by`, `feedback_context`, `feedback_timestamp`) VALUES
(4, 'Feedback Test Title 8', 'Body', 'complaint', 1, 3, '2019-04-17 09:47:06'),
(5, 'Feedback Test Title 7', '2222', 'suggestion', 1, 1, '2019-04-17 10:24:55'),
(9, 'Feedback Test Title 6', 'Body 3', 'complaint', 1, 1, '2019-04-17 10:39:57'),
(11, 'Feedback Test Title 5', '4', 'bug', 1, 1, '2019-04-17 10:43:49'),
(12, 'Feedback Test Title 4', '4', 'bug', 1, 1, '2019-04-17 10:44:16'),
(15, 'Feedback Test Title 3', 'asd', 'complaint', 1, 1, '2019-04-17 18:45:40'),
(17, 'Feedback Test Title 2', 'asd', 'complaint', 1, 1, '2019-04-17 18:46:54'),
(19, 'Feedback Test Title 1', 'qweqe', 'complaint', 1, 1, '2019-04-17 18:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `table_lang`
--

CREATE TABLE `table_lang` (
  `lang_id` int(11) NOT NULL,
  `lang_locale` varchar(45) DEFAULT NULL,
  `lang_name` varchar(45) DEFAULT NULL,
  `lang_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_lang`
--

INSERT INTO `table_lang` (`lang_id`, `lang_locale`, `lang_name`, `lang_timestamp`) VALUES
(1, 'en', 'English', '2019-03-31 09:55:10'),
(2, 'ps', 'Pashto', '2019-03-31 09:56:14'),
(3, 'ur', 'Urdu', '2019-03-31 09:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `table_linked`
--

CREATE TABLE `table_linked` (
  `linked_id` int(11) NOT NULL,
  `from_proverb_id` int(11) DEFAULT NULL,
  `to_proverb_id` int(11) DEFAULT NULL,
  `linked_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_linked`
--

INSERT INTO `table_linked` (`linked_id`, `from_proverb_id`, `to_proverb_id`, `linked_timestamp`) VALUES
(1, 4, 5, '2019-06-26 12:22:55'),
(2, 5, 3, '2019-06-26 12:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `table_points`
--

CREATE TABLE `table_points` (
  `points_id` int(11) NOT NULL,
  `points_add` varchar(45) DEFAULT NULL,
  `points_link` varchar(45) DEFAULT NULL,
  `points_update` varchar(45) DEFAULT NULL,
  `points_rating` varchar(45) DEFAULT NULL,
  `points_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_points`
--

INSERT INTO `table_points` (`points_id`, `points_add`, `points_link`, `points_update`, `points_rating`, `points_timestamp`) VALUES
(1, '20', '20', '20', '10', '2019-03-31 12:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `table_preferences`
--

CREATE TABLE `table_preferences` (
  `pref_id` int(11) NOT NULL,
  `pref_user_id` int(11) DEFAULT NULL,
  `pref_show_email` tinyint(4) NOT NULL DEFAULT '1',
  `pref_show_address` tinyint(1) NOT NULL DEFAULT '1',
  `pref_show_bio` tinyint(1) NOT NULL DEFAULT '1',
  `pref_dont_show_lang` varchar(45) DEFAULT NULL,
  `pref_email` varchar(45) DEFAULT NULL,
  `pref_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pref_last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_proverb`
--

CREATE TABLE `table_proverb` (
  `proverb_id` int(11) NOT NULL,
  `proverb_lang` int(11) DEFAULT NULL,
  `proverb_statement` text NOT NULL,
  `proverb_latin_eng` mediumtext,
  `proverb_introduction` text,
  `proverb_eng_meaning` mediumtext,
  `proverb_history` text,
  `proverb_reference` int(11) NOT NULL,
  `proverb_tags` varchar(45) DEFAULT NULL,
  `proverb_addedby` int(11) DEFAULT NULL,
  `proverb_contributors` int(11) DEFAULT NULL,
  `proverb_is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `proverb_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proverb_last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_proverb`
--

INSERT INTO `table_proverb` (`proverb_id`, `proverb_lang`, `proverb_statement`, `proverb_latin_eng`, `proverb_introduction`, `proverb_eng_meaning`, `proverb_history`, `proverb_reference`, `proverb_tags`, `proverb_addedby`, `proverb_contributors`, `proverb_is_protected`, `proverb_timestamp`, `proverb_last_updated`) VALUES
(1, 2, 'په پختو کيي به دلته کیی وی', 'Pa pakhto k ba dalta ky v.', 'مطلب چه سه د انسان ځاۓ وه هم هغه له رازي', 'Mean one can never forget his position from where he/she belongs', 'يو کلي کېي يو يو هلک اوسيدلو نو هغه نه چا تپوس اوکو چه۔۔۔۔', 2, '#life #humannature', 1, NULL, 0, '2019-03-31 12:13:30', '2019-05-31 09:34:19'),
(3, 1, 'The English Proverb will be here', 'Latin Eng is heree', 'Proverb Intro here', 'Eng Meaning ', 'History', 1, '#someothers4', 3, NULL, 0, '2019-01-03 16:18:22', '2019-05-31 09:50:00'),
(4, 1, 'Another Proverb', '', '', '', '', 1, '', 1, NULL, 0, '2019-04-23 18:12:08', '2019-05-31 09:34:19'),
(5, 1, 'Just testing some features', 'saasdfa', '', '', '', 1, 'tags', 1, NULL, 0, '2019-04-23 18:12:54', '2019-05-31 09:34:19'),
(6, 2, 'آس دې وي په لس دې وې', 'A\'s dy v pa las (10) dy v.', 'The implication is that the  wish is unrealistic, A good thing cannot be purchased at a low price. (Rohi Mataluna Page: 7)', 'Let there be a horse, but let it cost only ten rupees. ', '', 2, '#wish #horse', 1, NULL, 0, '2019-04-25 12:35:55', '2019-05-31 09:34:19'),
(7, 2, 'بوډۍ اسپې ته ترپکې مه ښايه', 'Bodai aspi ta trapaky ma khaya.', 'An experienced person needs no advice.', 'Don\'t teach an old mare to gallop (Rohi Mataluna Page: 86)', '', 2, '#experienced #old #lady #mare #another', 1, NULL, 0, '2019-04-25 12:42:22', '2019-05-31 09:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `table_proverb_contributors`
--

CREATE TABLE `table_proverb_contributors` (
  `tpc_id` int(11) NOT NULL,
  `tpc_proverb_id` int(11) DEFAULT NULL,
  `tpc_user_id` int(11) DEFAULT NULL,
  `tpc_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_proverb_contributors`
--

INSERT INTO `table_proverb_contributors` (`tpc_id`, `tpc_proverb_id`, `tpc_user_id`, `tpc_timestamp`) VALUES
(1, 7, 1, '2019-04-28 17:57:41'),
(2, 7, 1, '2019-04-28 18:14:50'),
(3, 7, 1, '2019-04-28 18:54:52'),
(4, 3, 1, '2019-05-31 09:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_rating_proverb`
--

CREATE TABLE `table_rating_proverb` (
  `rating_proverb_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `proverb_id` int(11) DEFAULT NULL,
  `rating_proverb_rating_value` varchar(45) DEFAULT NULL,
  `rating_proverb_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_rating_proverb`
--

INSERT INTO `table_rating_proverb` (`rating_proverb_id`, `user_id`, `proverb_id`, `rating_proverb_rating_value`, `rating_proverb_timestamp`) VALUES
(1, 1, 5, '5', '2019-04-23 19:00:02'),
(2, 1, 5, '4', '2019-04-23 19:00:12'),
(3, 1, 5, '4', '2019-04-23 19:00:21'),
(4, 1, 5, '3', '2019-04-23 19:00:31'),
(5, 1, 5, '5', '2019-04-23 19:00:35'),
(6, 1, 5, '4', '2019-04-23 19:00:40'),
(7, 1, 5, '5', '2019-04-23 19:00:44'),
(8, 1, 5, '5', '2019-04-23 19:01:35'),
(9, 1, 5, '5', '2019-04-23 19:01:40'),
(10, 1, 3, '5', '2019-04-24 07:35:37'),
(11, 1, 3, '4', '2019-04-24 07:40:31'),
(12, 1, 3, '5', '2019-04-24 07:40:37'),
(13, 1, 1, '3', '2019-04-24 07:48:33'),
(14, 1, 1, '5', '2019-04-24 07:49:10'),
(15, 1, 1, '5', '2019-04-24 07:49:23'),
(16, 1, 1, '5', '2019-04-24 07:49:29'),
(17, 1, 1, '3', '2019-04-24 07:52:46'),
(20, 1, 4, '5', '2019-04-24 18:34:01'),
(21, 1, 4, '4', '2019-04-24 18:38:52'),
(22, 1, 5, '4', '2019-04-25 10:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `table_reference`
--

CREATE TABLE `table_reference` (
  `reference_id` int(11) NOT NULL,
  `reference_lang` int(11) DEFAULT NULL,
  `reference_title` mediumtext,
  `reference_category` varchar(45) DEFAULT NULL,
  `reference_author` varchar(45) DEFAULT NULL,
  `reference_introduction` mediumtext,
  `reference_published_year` varchar(45) DEFAULT NULL,
  `reference_img_path` text,
  `reference_addedby` int(11) DEFAULT NULL,
  `reference_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `reference_last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_reference`
--

INSERT INTO `table_reference` (`reference_id`, `reference_lang`, `reference_title`, `reference_category`, `reference_author`, `reference_introduction`, `reference_published_year`, `reference_img_path`, `reference_addedby`, `reference_timestamp`, `reference_last_updated`) VALUES
(1, 2, 'Matalona', 'Book', 'Dr. Sultan Room', 'The book was written in ...', '2012', 'http://localhost/proverbona1/uploads/Capturessdsdd.PNG', 1, '2019-03-31 12:12:10', '2019-05-31 09:35:54'),
(2, 2, 'Rohi Mataluna', 'Book', 'Muahammad Nawaz Tahir, Thomas C. Edwards', 'The book was written in both English and Pashto. Editors are: Leonard N. Bartlotti  and Raj Wali Shah Khattak. Book has total of 1350 Proverbs..', '1982', 'http://localhost/proverbona1/uploads/Capturessdsdd.PNG', 1, '2019-04-21 13:40:06', '2019-05-31 09:53:34'),
(7, 1, 'چار زبانی ضرب الامثال', 'Book', '', '', '', 'http://localhost/proverbona1/uploads/Capturessdsdd.PNG', 1, '2019-05-17 23:40:11', '2019-05-31 09:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `table_team_members`
--

CREATE TABLE `table_team_members` (
  `tm_id` int(11) NOT NULL,
  `tm_user_id` int(11) DEFAULT NULL,
  `tm_username` varchar(500) NOT NULL,
  `tm_title` text,
  `tm_description` text,
  `tm_image_link` varchar(500) NOT NULL DEFAULT 'dp.jpg',
  `tm_organization` text,
  `tm_personal_website` text,
  `tm_org_website` text,
  `tm_org_email` text,
  `tm_personal_email` text,
  `tm_facebook` text,
  `tm_twitter` text,
  `tm_github` text,
  `tm_other_link` text,
  `tm_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tm_last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_team_members`
--

INSERT INTO `table_team_members` (`tm_id`, `tm_user_id`, `tm_username`, `tm_title`, `tm_description`, `tm_image_link`, `tm_organization`, `tm_personal_website`, `tm_org_website`, `tm_org_email`, `tm_personal_email`, `tm_facebook`, `tm_twitter`, `tm_github`, `tm_other_link`, `tm_timestamp`, `tm_last_updated`) VALUES
(1, 1, 'fWd82', 'Software Engineer', 'Worked on:  \r\n- Frontend design and also some more \r\n- Should be added here so that everyone know contribution of our team members \r\n- Who helped us volunteerly in this public project', 'dp.jpg', 'Proverbona', 'www.fawadiqbal.com', 'www.proverbona.fawadiqbal.com', 'fawad@raideit.com', 'me@fawadiqbal.com', 'fb.com/fwd2012', 'twitter.com/fwd82', 'github.com/fwd82', 'otherlink.com', '2019-05-28 09:52:40', '2019-05-31 10:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(45) DEFAULT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_password` varchar(45) DEFAULT NULL,
  `user_nativelang` int(11) DEFAULT NULL,
  `user_otherlang` mediumtext,
  `user_country` varchar(45) DEFAULT NULL,
  `user_address` mediumtext,
  `user_department` varchar(45) DEFAULT NULL,
  `user_bio` mediumtext,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `user_can_contribute` tinyint(4) NOT NULL DEFAULT '1',
  `user_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_id`, `user_fullname`, `user_email`, `user_name`, `user_password`, `user_nativelang`, `user_otherlang`, `user_country`, `user_address`, `user_department`, `user_bio`, `user_type`, `user_can_contribute`, `user_timestamp`, `user_last_updated`) VALUES
(1, 'Fawad Iqbal', 'fwd82@live.com', 'fWd82', 'fawad82', 2, 'English, Urdu', 'Pakistan', 'Village &amp;amp;amp;amp;amp;amp;  Post Office Manglawar District Swat', 'Volunteer at Proverbona', 'Hi I am Fawad I am volunteer at Proverbona and soem dummy text is No int the network cables, modem, and router ing to Wi-Fi the network cables, modem,  and router ing to Wi-Fithe network  les, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modsdsdfem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fi\r\nReconnecting to Wi-Fi', 'admin', 1, '2019-01-01 10:00:17', '2019-05-31 09:45:07'),
(3, 'Ahmad Khan', 'ahmadkhan3@live.com', 'ahmadkhan3', 'TestPass', 1, 'Pashto, Urdu', 'Pakistan', 'Village and Post Office Manglawar,, Mohallah ', 'IT, CS', 'This is just bio', 'user', 1, '2019-04-02 18:28:20', '2019-05-31 09:29:15'),
(4, 'Fawad Iqbal', 'fwd82821@live.com', 'fWd82Test1', 'TestPass', 1, 'Pashto, Urdu', 'Pakistan', 'Village and Post Office Manglawar,, Mohallah ', 'IT', 'This is just bio', 'user', 1, '2019-04-02 18:29:09', '2019-05-31 09:26:15'),
(6, 'Fawad Iqbal', 'fwd8qwe2@live.com', 'Ahmad', '123123', 1, 'Pashto, Urdu', 'Pakistan', 'Village and Post Office Manglawar,, Mohallah ', '', '', 'user', 0, '2019-04-02 19:40:21', '2019-05-31 09:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `table_user_points`
--

CREATE TABLE `table_user_points` (
  `user_points_id` int(11) NOT NULL,
  `user_points_value` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_points_givenby` int(11) DEFAULT NULL,
  `user_points_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_favorite_proverb`
--
ALTER TABLE `table_favorite_proverb`
  ADD PRIMARY KEY (`favorite_proverb_id`),
  ADD KEY `fk_fav_pro_id_idx` (`proverb_id`),
  ADD KEY `fk_fav_pro_user_id_idx` (`user_id`);

--
-- Indexes for table `table_feedback`
--
ALTER TABLE `table_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_addedby_userid_idx` (`feedback_by`),
  ADD KEY `fk_context_proverb_id_idx` (`feedback_context`);

--
-- Indexes for table `table_lang`
--
ALTER TABLE `table_lang`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `table_linked`
--
ALTER TABLE `table_linked`
  ADD PRIMARY KEY (`linked_id`),
  ADD KEY `fk_link_proverb_idx` (`from_proverb_id`),
  ADD KEY `fk_to_proverb_id_idx` (`to_proverb_id`);

--
-- Indexes for table `table_points`
--
ALTER TABLE `table_points`
  ADD PRIMARY KEY (`points_id`);

--
-- Indexes for table `table_preferences`
--
ALTER TABLE `table_preferences`
  ADD PRIMARY KEY (`pref_id`),
  ADD KEY `fk_user_preferences_idx` (`pref_user_id`);

--
-- Indexes for table `table_proverb`
--
ALTER TABLE `table_proverb`
  ADD PRIMARY KEY (`proverb_id`),
  ADD KEY `fk_proverb_lang_idx` (`proverb_lang`),
  ADD KEY `fk_addedby_idx` (`proverb_addedby`),
  ADD KEY `fk_reference_idx` (`proverb_reference`);

--
-- Indexes for table `table_proverb_contributors`
--
ALTER TABLE `table_proverb_contributors`
  ADD PRIMARY KEY (`tpc_id`),
  ADD KEY `fk_tpc_user_id_idx` (`tpc_user_id`),
  ADD KEY `fk_tpc_proverb_id_idx` (`tpc_proverb_id`);

--
-- Indexes for table `table_rating_proverb`
--
ALTER TABLE `table_rating_proverb`
  ADD PRIMARY KEY (`rating_proverb_id`),
  ADD KEY `fk_rating_user_idx` (`user_id`),
  ADD KEY `fk_rating_proverb_id_idx` (`proverb_id`);

--
-- Indexes for table `table_reference`
--
ALTER TABLE `table_reference`
  ADD PRIMARY KEY (`reference_id`),
  ADD KEY `fk_ref_lang_idx` (`reference_lang`),
  ADD KEY `fk_ref_addedby_idx` (`reference_addedby`);

--
-- Indexes for table `table_team_members`
--
ALTER TABLE `table_team_members`
  ADD PRIMARY KEY (`tm_id`),
  ADD KEY `fk_team_userid_idx` (`tm_user_id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`),
  ADD UNIQUE KEY `table_usercol_UNIQUE` (`user_email`),
  ADD KEY `fk_nativelang_lang_idx` (`user_nativelang`);

--
-- Indexes for table `table_user_points`
--
ALTER TABLE `table_user_points`
  ADD PRIMARY KEY (`user_points_id`),
  ADD KEY `fk_userpoints_user_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_favorite_proverb`
--
ALTER TABLE `table_favorite_proverb`
  MODIFY `favorite_proverb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `table_feedback`
--
ALTER TABLE `table_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `table_lang`
--
ALTER TABLE `table_lang`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_linked`
--
ALTER TABLE `table_linked`
  MODIFY `linked_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_points`
--
ALTER TABLE `table_points`
  MODIFY `points_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_preferences`
--
ALTER TABLE `table_preferences`
  MODIFY `pref_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_proverb`
--
ALTER TABLE `table_proverb`
  MODIFY `proverb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_proverb_contributors`
--
ALTER TABLE `table_proverb_contributors`
  MODIFY `tpc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_rating_proverb`
--
ALTER TABLE `table_rating_proverb`
  MODIFY `rating_proverb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `table_reference`
--
ALTER TABLE `table_reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_team_members`
--
ALTER TABLE `table_team_members`
  MODIFY `tm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_user_points`
--
ALTER TABLE `table_user_points`
  MODIFY `user_points_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_favorite_proverb`
--
ALTER TABLE `table_favorite_proverb`
  ADD CONSTRAINT `fk_fav_pro_id` FOREIGN KEY (`proverb_id`) REFERENCES `table_proverb` (`proverb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fav_pro_user_id` FOREIGN KEY (`user_id`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_feedback`
--
ALTER TABLE `table_feedback`
  ADD CONSTRAINT `fk_addedby_userid` FOREIGN KEY (`feedback_by`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_context_proverb_id` FOREIGN KEY (`feedback_context`) REFERENCES `table_proverb` (`proverb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_linked`
--
ALTER TABLE `table_linked`
  ADD CONSTRAINT `fk_from_proverb_id` FOREIGN KEY (`from_proverb_id`) REFERENCES `table_proverb` (`proverb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_to_proverb_id` FOREIGN KEY (`to_proverb_id`) REFERENCES `table_proverb` (`proverb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_preferences`
--
ALTER TABLE `table_preferences`
  ADD CONSTRAINT `fk_user_preferences` FOREIGN KEY (`pref_user_id`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_proverb`
--
ALTER TABLE `table_proverb`
  ADD CONSTRAINT `fk_addedby` FOREIGN KEY (`proverb_addedby`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proverb_lang` FOREIGN KEY (`proverb_lang`) REFERENCES `table_lang` (`lang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reference` FOREIGN KEY (`proverb_reference`) REFERENCES `table_reference` (`reference_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_proverb_contributors`
--
ALTER TABLE `table_proverb_contributors`
  ADD CONSTRAINT `fk_tpc_proverb_id` FOREIGN KEY (`tpc_proverb_id`) REFERENCES `table_proverb` (`proverb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tpc_user_id` FOREIGN KEY (`tpc_user_id`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_rating_proverb`
--
ALTER TABLE `table_rating_proverb`
  ADD CONSTRAINT `fk_rating_proverb_id` FOREIGN KEY (`proverb_id`) REFERENCES `table_proverb` (`proverb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rating_user` FOREIGN KEY (`user_id`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_reference`
--
ALTER TABLE `table_reference`
  ADD CONSTRAINT `fk_ref_addedby` FOREIGN KEY (`reference_addedby`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ref_lang` FOREIGN KEY (`reference_lang`) REFERENCES `table_lang` (`lang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_team_members`
--
ALTER TABLE `table_team_members`
  ADD CONSTRAINT `fk_team_userid` FOREIGN KEY (`tm_user_id`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_user`
--
ALTER TABLE `table_user`
  ADD CONSTRAINT `fk_nativelang_lang` FOREIGN KEY (`user_nativelang`) REFERENCES `table_lang` (`lang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_user_points`
--
ALTER TABLE `table_user_points`
  ADD CONSTRAINT `fk_pointgivenby_user` FOREIGN KEY (`user_id`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_userpoints_user` FOREIGN KEY (`user_id`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
