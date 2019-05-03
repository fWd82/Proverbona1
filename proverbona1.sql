-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 01:13 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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
  `favorite_proverb_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_favorite_proverb`
--

INSERT INTO `table_favorite_proverb` (`favorite_proverb_id`, `user_id`, `proverb_id`, `favorite_proverb_timestamp`) VALUES
(1, 1, 7, '2019-04-30 09:00:01'),
(5, 1, 6, '2019-04-30 09:23:53'),
(10, 1, 3, '2019-04-30 09:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `table_feedback`
--

CREATE TABLE `table_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_title` text,
  `feedback_body` text,
  `feedback_type` text,
  `feedback_by` int(11) DEFAULT NULL,
  `feedback_context` int(11) DEFAULT NULL,
  `feedback_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_feedback`
--

INSERT INTO `table_feedback` (`feedback_id`, `feedback_title`, `feedback_body`, `feedback_type`, `feedback_by`, `feedback_context`, `feedback_timestamp`) VALUES
(4, 'Feedback Test Title', 'Body', 'complaint', 1, 3, '2019-04-17 09:47:06'),
(5, 'Feedback Test Title', '2222', 'suggestion', 1, 1, '2019-04-17 10:24:55'),
(9, 'Feedback Test Title 3', 'Body 3', 'complaint', 1, 1, '2019-04-17 10:39:57'),
(11, 'Feedback Test Title 4', '4', 'bug', 1, 1, '2019-04-17 10:43:49'),
(12, 'Feedback Test Title 4', '4', 'bug', 1, 1, '2019-04-17 10:44:16'),
(15, 'Feedback Test Title', 'asd', 'complaint', 1, 1, '2019-04-17 18:45:40'),
(17, 'Feedback Test Title', 'asd', 'complaint', 1, 1, '2019-04-17 18:46:54'),
(19, 'Feedback Test Title', 'qweqe', 'complaint', 1, 1, '2019-04-17 18:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `table_lang`
--

CREATE TABLE `table_lang` (
  `lang_id` int(11) NOT NULL,
  `lang_locale` varchar(45) DEFAULT NULL,
  `lang_name` varchar(45) DEFAULT NULL,
  `lang_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `proverb_id` int(11) DEFAULT NULL,
  `linked_proverb_id` text,
  `linked_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_points`
--

INSERT INTO `table_points` (`points_id`, `points_add`, `points_link`, `points_update`, `points_rating`, `points_timestamp`) VALUES
(1, '20', '20', '20', '10', '2019-03-31 12:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `table_proverb`
--

CREATE TABLE `table_proverb` (
  `proverb_id` int(11) NOT NULL,
  `proverb_lang` int(11) DEFAULT NULL,
  `proverb_statement` text CHARACTER SET utf8 NOT NULL,
  `proverb_latin_eng` text,
  `proverb_introduction` text CHARACTER SET utf8,
  `proverb_eng_meaning` text,
  `proverb_history` text CHARACTER SET utf8,
  `proverb_reference` int(11) NOT NULL,
  `proverb_tags` varchar(45) DEFAULT NULL,
  `proverb_addedby` int(11) DEFAULT NULL,
  `proverb_contributors` int(11) DEFAULT NULL,
  `proverb_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_proverb`
--

INSERT INTO `table_proverb` (`proverb_id`, `proverb_lang`, `proverb_statement`, `proverb_latin_eng`, `proverb_introduction`, `proverb_eng_meaning`, `proverb_history`, `proverb_reference`, `proverb_tags`, `proverb_addedby`, `proverb_contributors`, `proverb_timestamp`) VALUES
(1, 2, 'په پختو کيي به دلته کیی وی', 'Pa pakhto k ba dalta ky v.', 'مطلب چه سه د انسان ځاۓ وه هم هغه له رازي', 'Mean one can never forget his position from where he/she belongs', 'يو کلي کېي يو يو هلک اوسيدلو نو هغه نه چا تپوس اوکو چه۔۔۔۔', 2, '#life #humannature', 1, NULL, '2019-03-31 12:13:30'),
(3, 1, 'The English Proverb will be here', 'Latin Eng is here', 'Proverb Intro here', 'Eng Meaning ', 'History', 1, '#someothers4', 3, NULL, '2019-04-01 16:18:22'),
(4, 1, 'Another Proverb', '', '', '', '', 1, '', 1, NULL, '2019-04-23 18:12:08'),
(5, 1, 'Just testing some features', 'saasdfa', '', '', '', 1, 'tags', 1, NULL, '2019-04-23 18:12:54'),
(6, 2, 'آس دې وي په لس دې وې', 'A\'s dy v pa las (10) dy v.', 'The implication is that the  wish is unrealistic, A good thing cannot be purchased at a low price. (Rohi Mataluna Page: 7)', 'Let there be a horse, but let it cost only ten rupees. ', '', 2, '#wish #horse', 1, NULL, '2019-04-25 12:35:55'),
(7, 2, 'بوډۍ اسپې ته ترپکې مه ښايه', 'Bodai aspi ta trapaky ma khaya.', 'An experienced person needs no advice.', 'Don\'t teach an old mare to gallop (Rohi Mataluna Page: 86)', '', 2, '#experienced #old #lady #mare #another', 1, NULL, '2019-04-25 12:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `table_proverb_contributors`
--

CREATE TABLE `table_proverb_contributors` (
  `tpc_id` int(11) NOT NULL,
  `tpc_proverb_id` int(11) DEFAULT NULL,
  `tpc_user_id` int(11) DEFAULT NULL,
  `tpc_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_proverb_contributors`
--

INSERT INTO `table_proverb_contributors` (`tpc_id`, `tpc_proverb_id`, `tpc_user_id`, `tpc_timestamp`) VALUES
(1, 7, 1, '2019-04-28 17:57:41'),
(2, 7, 1, '2019-04-28 18:14:50'),
(3, 7, 1, '2019-04-28 18:54:52');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `reference_title` text,
  `reference_category` varchar(45) DEFAULT NULL,
  `reference_author` varchar(45) DEFAULT NULL,
  `reference_introduction` text,
  `reference_published_year` varchar(45) DEFAULT NULL,
  `reference_img_path` varchar(45) DEFAULT NULL,
  `reference_addedby` int(11) DEFAULT NULL,
  `reference_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_reference`
--

INSERT INTO `table_reference` (`reference_id`, `reference_lang`, `reference_title`, `reference_category`, `reference_author`, `reference_introduction`, `reference_published_year`, `reference_img_path`, `reference_addedby`, `reference_timestamp`) VALUES
(1, 2, 'Matalona', 'Book', 'Dr. Sultan Room', 'The book was written in ...', '2012', 'imgpath', 1, '2019-03-31 12:12:10'),
(2, 2, 'Rohi Mataluna', 'Book', 'Muahammad Nawaz Tahir, Thomas C. Edwards', 'The book was written in both English and Pashto. Editors are: Leonard N. Bartlotti  and Raj Wali Shah Khattak. Book has total of 1350 Proverbs.', '1982', 'imgpath2', 1, '2019-04-21 13:40:06');

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
  `user_otherlang` text,
  `user_country` varchar(45) DEFAULT NULL,
  `user_address` text,
  `user_department` varchar(45) DEFAULT NULL,
  `user_bio` text,
  `user_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_id`, `user_fullname`, `user_email`, `user_name`, `user_password`, `user_nativelang`, `user_otherlang`, `user_country`, `user_address`, `user_department`, `user_bio`, `user_timestamp`) VALUES
(1, 'Fawad Iqbal', 'fwd82@live.com', 'fWd82', 'fawad82', 2, 'English, Urdu', 'Pakistan', 'Village &amp;amp;amp;amp;  Post Office Manglawar District Swat', 'Volunteer at Proverbona', 'Hi I am Fawad I am volunteer at Proverbona and soem dummy text is No internet Try:\r\nChecking the network cables, modem, and router ing to Wi-Fi the network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modsdsdfem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fi\r\nReconnecting to Wi-Fi', '2019-03-31 10:00:17'),
(3, 'Ahmad Khan', 'ahmadkhan3@live.com', 'ahmadkhan3', 'TestPass', 1, 'Pashto, Urdu', 'Pakistan', 'Village and Post Office Manglawar,, Mohallah ', 'IT', 'This is just bio', '2019-04-02 18:28:20'),
(4, 'Fawad Iqbal', 'fwd82821@live.com', 'fWd82Test1', 'TestPass', 1, 'Pashto, Urdu', 'Pakistan', 'Village and Post Office Manglawar,, Mohallah ', 'IT', 'This is just bio', '2019-04-02 18:29:09'),
(6, 'Fawad Iqbal', 'fwd8qwe2@live.com', 'Ahmad', '123123', 1, 'Pashto, Urdu', 'Pakistan', 'Village and Post Office Manglawar,, Mohallah ', '', '', '2019-04-02 19:40:21'),
(7, '1', '', '1', NULL, 1, '1', '1', '1', '1', '1', '2019-04-17 15:17:46');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `fk_link_proverb_idx` (`proverb_id`);

--
-- Indexes for table `table_points`
--
ALTER TABLE `table_points`
  ADD PRIMARY KEY (`points_id`);

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
  MODIFY `favorite_proverb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `linked_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_points`
--
ALTER TABLE `table_points`
  MODIFY `points_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_proverb`
--
ALTER TABLE `table_proverb`
  MODIFY `proverb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_proverb_contributors`
--
ALTER TABLE `table_proverb_contributors`
  MODIFY `tpc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_rating_proverb`
--
ALTER TABLE `table_rating_proverb`
  MODIFY `rating_proverb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `table_reference`
--
ALTER TABLE `table_reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `fk_link_proverb` FOREIGN KEY (`proverb_id`) REFERENCES `table_proverb` (`proverb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
