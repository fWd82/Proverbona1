-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 11:10 AM
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
(4, 'ur', 'Urdu', '2019-03-31 09:56:55');

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
  `proverb_contributors` varchar(45) DEFAULT NULL,
  `proverb_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_proverb`
--

INSERT INTO `table_proverb` (`proverb_id`, `proverb_lang`, `proverb_statement`, `proverb_latin_eng`, `proverb_introduction`, `proverb_eng_meaning`, `proverb_history`, `proverb_reference`, `proverb_tags`, `proverb_addedby`, `proverb_contributors`, `proverb_timestamp`) VALUES
(1, 2, 'په پکتو کيي به دلته سه وه', 'Che zy zy abazo la ba razy', 'مطلب چه سه د انسان ځاۓ وه هم هغه له رازي', 'Mean one can never forget his position from where he/she belongs', 'يو کلي کېي يو يو هلک اوسيدلو نو هغه نه چا تپوس اوکو چه۔۔۔۔', 1, '#life #humannature', 1, NULL, '2019-03-31 12:13:30'),
(3, 1, 'This is example proverb', '', '', '', '', 1, '#other', 3, NULL, '2019-04-01 16:18:22'),
(6, 1, 'asd', '', '', '', '', 1, '', 1, NULL, '2019-04-14 18:11:46');

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
(1, 1, NULL, '4', '2019-04-14 17:57:27'),
(2, 1, NULL, '5', '2019-04-14 17:58:49'),
(3, 1, NULL, '4', '2019-04-14 18:01:12'),
(4, 1, NULL, '4', '2019-04-14 18:01:29'),
(5, 1, NULL, '4', '2019-04-14 18:02:55'),
(6, 1, NULL, '4', '2019-04-14 18:04:41'),
(7, 1, NULL, '33', '2019-04-14 18:05:23'),
(8, 1, NULL, '5', '2019-04-14 18:05:57'),
(9, 1, NULL, '5', '2019-04-14 18:06:34'),
(10, 1, NULL, '4', '2019-04-14 18:06:53'),
(11, 1, NULL, '5', '2019-04-15 10:39:43'),
(12, 1, NULL, '4', '2019-04-16 17:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `table_reference`
--

CREATE TABLE `table_reference` (
  `reference_id` int(11) NOT NULL,
  `reference_title` text,
  `reference_category` varchar(45) DEFAULT NULL,
  `reference_author` varchar(45) DEFAULT NULL,
  `reference_introduction` varchar(45) DEFAULT NULL,
  `reference_published_year` varchar(45) DEFAULT NULL,
  `reference_img_path` varchar(45) DEFAULT NULL,
  `reference_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_reference`
--

INSERT INTO `table_reference` (`reference_id`, `reference_title`, `reference_category`, `reference_author`, `reference_introduction`, `reference_published_year`, `reference_img_path`, `reference_timestamp`) VALUES
(1, 'Matalona', 'Book', 'Dr. Sultan Room', 'The book was written in ...', '2012', 'imgpath', '2019-03-31 12:12:10');

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
  `user_address` varchar(45) DEFAULT NULL,
  `user_department` varchar(45) DEFAULT NULL,
  `user_bio` text,
  `user_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_id`, `user_fullname`, `user_email`, `user_name`, `user_password`, `user_nativelang`, `user_otherlang`, `user_country`, `user_address`, `user_department`, `user_bio`, `user_timestamp`) VALUES
(1, 'Fawad Iqbal', 'fwd82@live.com', 'fWd82', 'fawad82', 2, 'English, Urdu', 'Pakistan', 'Village & Post Office Manglawar District Swat', 'Volunteer at Proverbona', 'Hi I am Fawad I am volunteer at Proverbona and soem dummy text is No internet Try:\r\nChecking the network cables, modem, and router ing to Wi-Fi the network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fithe network cables, modem, and router ing to Wi-Fi\r\nReconnecting to Wi-Fi', '2019-03-31 10:00:17'),
(3, 'Ahmad Khan', 'fwd8282@live.com', 'fWd82Test', 'TestPass', 1, 'Pashto, Urdu', 'Pakistan', 'Village and Post Office Manglawar,, Mohallah ', 'IT', 'This is just bio', '2019-04-02 18:28:20'),
(4, 'Fawad Iqbal', 'fwd82821@live.com', 'fWd82Test1', 'TestPass', 1, 'Pashto, Urdu', 'Pakistan', 'Village and Post Office Manglawar,, Mohallah ', 'IT', 'This is just bio', '2019-04-02 18:29:09'),
(6, 'Fawad Iqbal', 'fwd8qwe2@live.com', 'Ahmad', '123123', 1, 'Pashto, Urdu', 'Pakistan', 'Village and Post Office Manglawar,, Mohallah ', '', '', '2019-04-02 19:40:21');

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
  ADD PRIMARY KEY (`reference_id`);

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
  MODIFY `favorite_proverb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_feedback`
--
ALTER TABLE `table_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_lang`
--
ALTER TABLE `table_lang`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `proverb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_rating_proverb`
--
ALTER TABLE `table_rating_proverb`
  MODIFY `rating_proverb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_reference`
--
ALTER TABLE `table_reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `fk_link_proverb` FOREIGN KEY (`proverb_id`) REFERENCES `table_proverb` (`proverb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_proverb`
--
ALTER TABLE `table_proverb`
  ADD CONSTRAINT `fk_addedby` FOREIGN KEY (`proverb_addedby`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proverb_lang` FOREIGN KEY (`proverb_lang`) REFERENCES `table_lang` (`lang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reference` FOREIGN KEY (`proverb_reference`) REFERENCES `table_reference` (`reference_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `table_rating_proverb`
--
ALTER TABLE `table_rating_proverb`
  ADD CONSTRAINT `fk_rating_proverb_id` FOREIGN KEY (`proverb_id`) REFERENCES `table_proverb` (`proverb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rating_user` FOREIGN KEY (`user_id`) REFERENCES `table_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
