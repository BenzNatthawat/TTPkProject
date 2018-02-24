-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2018 at 08:17 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activity_name` varchar(45) NOT NULL,
  `price_adult` varchar(45) NOT NULL,
  `price_child` varchar(45) NOT NULL,
  `desciption` varchar(2000) NOT NULL,
  `start_time` time DEFAULT NULL,
  `finish_time` time DEFAULT NULL,
  `take_time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `destroy` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity_name`, `price_adult`, `price_child`, `desciption`, `start_time`, `finish_time`, `take_time`, `created_at`, `updated_at`, `destroy`) VALUES
(1, 'Khai Islands', '1200', '900', 'Koh Khai Nok, Koh Khai Nai and Khai Nui are very popular among tourists. Stunning fish are easily seen in shallow water. Quiet and peaceful Koh Khai Nai is an islet with a white sandy beach, fantastic coral reefs and turquoise blue clear water. Swimming is possible, but bewares of spiny murex.', NULL, NULL, NULL, '2018-02-23 17:43:19', '2018-02-23 10:43:04', 1),
(2, 'Phuket Bird Park', '300', '250', 'Phuket Bird Park is open for Thai tourists and foreigners. To pay attention Have visited about the livelihood of birds. Both birds are native to Thailand. And birds of foreign origin. Including rare birds as well. In addition, the Bird Park Phuket also has the ability to see a variety of birds to watch.', NULL, NULL, NULL, '2018-02-23 17:39:24', '2017-09-25 07:47:16', 1),
(3, 'Phuket Zoo', '230', '200', 'The small zoo has been popular with foreign tourists continuously since the year. 2540 natural atmosphere It is full of animals such as tigers, camels, birds, snakes, deer and monkeys, and can watch elephant shows, monkeys, crocodile shows. There is also a butterfly garden. The orchid garden is suitable for holiday breaks.', NULL, NULL, NULL, '2018-02-24 14:07:12', '2018-02-24 07:06:38', 1),
(4, 'Splash Jungle Water Park', '850', '750', 'Whether you are after a relaxing day in the water or an adrenaline rush, Splash Jungle Water Park has it all! Our park is a water oasis for your entire family, with our attractions, cool beverages and tasty energizing bites, we’re the place to be in Phuket Thailand.', NULL, NULL, NULL, '2018-02-23 17:39:30', '2017-10-07 07:50:05', 1),
(5, 'Flying Hanuman', '2900', '2500', 'Flying Hanuman is an adventure like no other on Phuket. It shows that the island’s beauty goes far beyond the sea, sun and sand that it is famous for. The hillsides of Phuket overflow with thick forest that is great for exploration and outdoor activities.', NULL, NULL, NULL, '2018-02-23 17:39:33', '2017-09-25 07:39:25', 1),
(6, 'Phuket Fantasea- Best theme park of Thailand', '1800', '2000', 'Phuket Fantasea is acknowledged together of Phuket’s most preferred traveler attractions, thus we often tend to plan our trips there. Set at the north finish of Kamala Beach that is a few 20-minute drives from Patong, this established to be a fun evening out with the youngsters. Phuket musical composition permits you to induce a feel of exotic Thailand culture, build over 140 acres the funfair empowers you to indulge in numerous activities and is filled with numerous multitude of activities sort of a carnival village with games, eating place with four thousand capaciousness to supply numerous Thai and international preparation with numerous handicraft outlets to form your searching simple.', NULL, NULL, NULL, '2018-02-23 17:39:35', '2017-11-08 12:37:20', 1),
(7, 'Nemo Dolphins Bay Phuket', '300', '250', 'There is a place where you can have a good time for adults and children. Want to experience a weekend or weekday holidays do? Come on show in Kharkov Dolphinarium «Nemo». Here you can feel like a kid and think, how can truly surprised and scream with delight. Program featuring charming dolphins, white whale, funny funny fur seals and sea lions.', NULL, NULL, NULL, '2018-02-23 17:42:55', '2018-02-23 10:40:58', 1),
(8, 'Phuket Simon Cabaret Show, Patong Beach', '900', '650', 'Dubbed the mother of all cabarets on the island, Phuket Simon Cabaret celebrates its 20th anniversery on 2010. A milestone of sort, given the kind of challenges it went through just to earn the respect and patronage of local and foreign guest. When we first started recalls a spokesman for Simon Cabaret, people won''t take us seriously. The Simon Group commenced operations in Phuket in 1991. The group interests are associated with meeting the demands of Phuket''s everexpanding tourism and entertainment industry.', NULL, NULL, NULL, '2018-02-24 14:39:40', '2018-02-24 07:39:29', 1),
(9, 'Siam Niramit Phuket', '1800', '1300', 'iam Niramit Phuket is a world-class performance of Thailand''s arts and cultural heritage. This must-see spectacular show features over 100 performers, lavish costumes and stunning set designs. Enhanced special effects and the world''s most advanced technology are used to produce a very realistic, stimulating and inspiring experience.\r\n\r\nThe show starts at 20.30hrs, and runs for 80 minutes, without intermission. Gates open at 17.30hrs. for access to attractions and facilities. Thai/International Buffet dinner is available from 18.00 to 20.00 hrs.', NULL, NULL, NULL, '2018-02-24 14:55:36', '2018-02-24 07:55:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activity_packagesservice`
--

CREATE TABLE `activity_packagesservice` (
  `activities_id` int(11) NOT NULL,
  `packagesservices_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `prefix` varchar(10) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `number_adult` int(11) DEFAULT NULL,
  `number_child` int(11) DEFAULT NULL,
  `number_baby` int(11) DEFAULT NULL,
  `telephone` char(10) NOT NULL,
  `booking_date` varchar(20) DEFAULT NULL,
  `town_city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `booking_status` enum('Wait','Confirm') NOT NULL,
  `shuttles_id` int(11) DEFAULT NULL,
  `packageservices_id` int(11) DEFAULT NULL,
  `activities_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `prefix`, `first_name`, `last_name`, `email`, `number_adult`, `number_child`, `number_baby`, `telephone`, `booking_date`, `town_city`, `country`, `booking_status`, `shuttles_id`, `packageservices_id`, `activities_id`, `created_at`, `updated_at`) VALUES
(28, 'Mr.', 'Natthawat', 'Singkala', 'toey@gmail.com', 1, NULL, 0, '0874746612', '02/24/2018', 'Phuket', 'Thailand', 'Confirm', NULL, 1, NULL, '2018-02-24 17:58:03', '2018-02-24 10:58:03'),
(29, 'Mr.', 'Benz', 'Sing', 'toey@gmail.com', 1, NULL, 0, '0874746612', '11/06/2017', 'Phuket', 'Thailand', 'Wait', NULL, NULL, 9, '2018-02-24 08:55:33', '2018-02-24 08:55:33'),
(30, 'Mr.', 'tom', 'john', 'toey@gmail.com', 1, NULL, 0, '0874746612', '02/25/2018', 'Phuket', 'Thailand', 'Wait', NULL, 1, NULL, '2018-02-24 08:57:40', '2018-02-24 08:57:40'),
(31, 'Mr.', 'Benz', 'Singkala', 'toey@gmail.com', NULL, NULL, NULL, '0874746612', NULL, 'Phuket', 'Thailand', 'Confirm', 22, NULL, NULL, '2018-02-24 17:57:56', '2018-02-24 10:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `booking_user`
--

CREATE TABLE `booking_user` (
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_user`
--

INSERT INTO `booking_user` (`user_id`, `booking_id`) VALUES
(3, 28),
(3, 29),
(3, 30),
(3, 31);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_name`, `created_at`, `updated_at`, `activities_id`) VALUES
(1, '43046415.jpg', '2017-09-23 08:20:17', '2017-09-23 08:20:17', 1),
(2, '1309450937.jpg', '2017-09-23 08:20:17', '2017-09-23 08:20:17', 1),
(3, '445252437.jpg', '2017-09-23 08:42:48', '2017-09-23 08:42:48', 2),
(4, '2098454576.jpg', '2017-09-23 08:42:48', '2017-09-23 08:42:48', 2),
(5, '1354884464.jpg', '2017-09-23 08:43:39', '2017-09-23 08:43:39', 3),
(6, '966665280.jpg', '2017-09-23 08:43:39', '2017-09-23 08:43:39', 3),
(7, '332360344.jpg', '2017-09-23 08:44:28', '2017-09-23 08:44:28', 4),
(8, '1502363367.jpg', '2017-09-23 08:44:28', '2017-09-23 08:44:28', 4),
(9, '2111262882.jpg', '2017-09-23 08:45:22', '2017-09-23 08:45:22', 5),
(10, '1841740456.jpg', '2017-09-23 08:45:22', '2017-09-23 08:45:22', 5),
(11, '180796625.jpg', '2017-11-08 12:37:20', '2017-11-08 12:37:20', 6),
(12, '231025262.jpg', '2017-11-08 12:37:20', '2017-11-08 12:37:20', 6),
(13, '1222399259.jpg', '2017-11-08 12:37:20', '2017-11-08 12:37:20', 6),
(14, '1704264666.jpg', '2017-11-18 13:19:14', '2017-11-18 13:19:14', 7),
(15, '929373733.jpg', '2017-11-18 13:19:14', '2017-11-18 13:19:14', 7),
(16, '1526744704.jpg', '2017-11-18 13:19:14', '2017-11-18 13:19:14', 7),
(17, '1211963434.jpg', '2018-01-30 23:15:04', '2018-01-30 23:15:04', 8),
(18, '1328471694.jpg', '2018-01-30 23:15:04', '2018-01-30 23:15:04', 8),
(19, '176701170.jpg', '2018-01-30 23:15:04', '2018-01-30 23:15:04', 8),
(20, '390546121.jpg', '2018-01-30 23:19:56', '2018-01-30 23:19:56', 9),
(21, '423560267.jpg', '2018-01-30 23:19:56', '2018-01-30 23:19:56', 9),
(22, '1262963996.jpg', '2018-01-30 23:19:56', '2018-01-30 23:19:56', 9);

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` int(11) NOT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activities_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `location_name`, `latitude`, `longitude`, `created_at`, `updated_at`, `activities_id`, `users_id`) VALUES
(2, 'Phuket zoo', 7.84275, 98.3585, '2017-12-10 03:24:28', '0000-00-00 00:00:00', 3, NULL),
(3, 'Flying Hanuman', 7.92476, 98.3227, '2017-12-10 03:54:10', '0000-00-00 00:00:00', 5, NULL),
(4, 'Khai Islands', 7.89118, 98.5155, '2017-12-10 03:55:05', '0000-00-00 00:00:00', 1, NULL),
(5, 'Phuket Fantasea', 7.95731, 98.2876, '2017-12-10 03:56:07', '0000-00-00 00:00:00', 6, NULL),
(6, 'Phuket Bird Park', 7.86421, 98.344, '2017-12-10 03:57:03', '0000-00-00 00:00:00', 2, NULL),
(7, 'Splash Jungle Water Park', 8.11676, 98.3063, '2017-12-10 03:57:43', '0000-00-00 00:00:00', 4, NULL),
(9, 'Nemo Dolphins Bay Phuket', 7.84227, 98.3568, '2017-12-10 03:58:45', '0000-00-00 00:00:00', 7, NULL),
(10, 'tom', 7.9, 98.36, '2018-02-22 16:40:40', '0000-00-00 00:00:00', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `packagesservices`
--

CREATE TABLE `packagesservices` (
  `id` int(11) NOT NULL,
  `package_name` varchar(45) NOT NULL,
  `price_package` int(11) NOT NULL,
  `desciption` varchar(500) NOT NULL,
  `start_time` time DEFAULT NULL,
  `finish_time` time DEFAULT NULL,
  `take_time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packagesservices`
--

INSERT INTO `packagesservices` (`id`, `package_name`, `price_package`, `desciption`, `start_time`, `finish_time`, `take_time`, `created_at`, `updated_at`) VALUES
(1, 'SAVER PACKAGE 1: Free & Easy 3 days & 2 night', 5000, 'Phuket, in Thailand’s stunning south, is a haven of sandy white beaches, crystal clear water and swaying palm trees. The activities offered here are both diverse and numerous. Join a sea kayak tour to the dramatic limestone islands of Phang-Nga Bay, ride an elephant or relax with a soothing massage. For family fun, Fantasea cannot be beaten. And for shopaholics, Patong Markets is certain to provide ultimate satisfaction.', NULL, NULL, NULL, '2017-12-09 18:04:32', '2017-11-16 08:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` varchar(1000) DEFAULT NULL,
  `score_review` enum('Excellent','Very good','Average','Poor','Terrible') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `users_id` int(11) NOT NULL,
  `activities_id` int(11) DEFAULT NULL,
  `packagesservices_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `score_review`, `created_at`, `updated_at`, `users_id`, `activities_id`, `packagesservices_id`) VALUES
(1, 'I like very much\r\nIt''s a great trip.', 'Excellent', '2018-02-18 14:40:55', '0000-00-00 00:00:00', 2, 1, NULL),
(2, 'I like very much', 'Very good', '2018-02-17 16:12:44', '0000-00-00 00:00:00', 3, 3, NULL),
(3, 'It''s a great trip.', 'Very good', '2018-02-18 14:39:30', '0000-00-00 00:00:00', 3, 1, NULL),
(4, 'good.', 'Excellent', '2018-02-18 14:41:06', '0000-00-00 00:00:00', 3, 1, NULL),
(5, 'Very fun', 'Very good', '2018-02-18 18:47:38', '2018-02-18 11:46:43', 1, 9, NULL),
(6, 'Beautiful Girl.', 'Average', '2018-02-18 11:59:34', '2018-02-18 11:59:34', 4, 8, NULL),
(7, 'Very bad.', 'Terrible', '2018-02-18 12:01:14', '2018-02-18 12:01:14', 3, 8, NULL),
(8, 'I go to Siam Niramit Phuket. I have vary happy.', 'Very good', '2018-02-19 05:01:35', '2018-02-19 05:01:35', 4, 9, NULL),
(9, '5555.', 'Excellent', '2018-02-21 04:02:27', '2018-02-21 04:02:27', 3, 9, NULL),
(10, 'scdscsd', 'Very good', '2018-02-21 04:06:57', '2018-02-21 04:06:57', 3, 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'member', '2017-10-26 13:58:28', '0000-00-00 00:00:00'),
(2, 'admin', '2017-10-26 13:58:23', '0000-00-00 00:00:00'),
(3, 'diver', '2017-10-27 13:10:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shuttles`
--

CREATE TABLE `shuttles` (
  `id` int(11) NOT NULL,
  `room_number` varchar(45) DEFAULT NULL,
  `pick_up` varchar(45) NOT NULL,
  `drop_off` varchar(45) NOT NULL,
  `depart_date` varchar(10) NOT NULL,
  `return_date` varchar(10) NOT NULL,
  `depart_time` varchar(10) NOT NULL,
  `return_time` varchar(10) NOT NULL,
  `vehicle_type` varchar(45) NOT NULL,
  `round` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `maps_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shuttles`
--

INSERT INTO `shuttles` (`id`, `room_number`, `pick_up`, `drop_off`, `depart_date`, `return_date`, `depart_time`, `return_time`, `vehicle_type`, `round`, `created_at`, `updated_at`, `maps_id`, `users_id`) VALUES
(5, '1', 'ในเมือง', 'ป่าตอง', '12/12/2017', '12/12/2017', '11:30 PM', '11:30 PM', 'Taxi', 'Round-Trip', '2018-02-23 19:46:26', '2017-12-10 19:30:46', NULL, NULL),
(6, NULL, 'กะระ', 'กะตะ', '02/02/2018', '02/03/2018', '03:47 AM', '03:47 AM', 'Van', 'Round-Trip', '2018-01-30 23:47:25', '2018-01-30 23:47:25', NULL, NULL),
(7, NULL, 'กะตะ', 'กะรน', '02/23/2018', '02/22/2018', '01:42 AM', '01:42 AM', 'Van', 'Round-Trip', '2018-02-04 04:43:25', '2018-02-04 04:43:25', NULL, NULL),
(8, NULL, 'กะตะ', 'กะรน', '02/23/2018', '02/22/2018', '01:42 AM', '01:42 AM', 'Van', 'Round-Trip', '2018-02-04 04:44:35', '2018-02-04 04:44:35', NULL, NULL),
(9, NULL, 'กะตะ', 'กะรน', '02/06/2018', '02/10/2018', '01:50 AM', '01:50 AM', 'Van', 'One-Way', '2018-02-04 04:51:07', '2018-02-04 04:51:07', NULL, NULL),
(10, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/11/2018', '02/13/2018', '11:08 PM', '11:08 PM', 'Taxi', 'One-Way', '2018-02-11 02:10:56', '2018-02-11 02:10:56', NULL, NULL),
(11, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/12/2018', '02/27/2018', '11:13 PM', '11:13 PM', 'No Preference', 'Round-Trip', '2018-02-11 02:14:11', '2018-02-11 02:14:11', NULL, NULL),
(12, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/13/2018', '02/14/2018', '09:01 PM', '09:01 PM', 'Taxi', 'Round-Trip', '2018-02-12 00:02:07', '2018-02-12 00:02:07', NULL, NULL),
(13, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/14/2018', '02/21/2018', '10:09 PM', '10:10 PM', 'Van', 'Round-Trip', '2018-02-12 01:28:35', '2018-02-12 01:28:35', NULL, NULL),
(14, '10', 'โรงแรมกะตะ', 'โลตัส', '02/12/2018', '02/12/2018', '10:28 PM', '10:28 PM', 'Van', 'One-Way', '2018-02-23 19:50:38', '2018-02-12 01:29:12', NULL, 4),
(15, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/24/2018', '02/27/2018', '03:08 AM', '03:08 AM', 'Van', 'Round-Trip', '2018-02-23 20:14:13', '2018-02-23 13:11:15', NULL, 4),
(16, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/24/2018', '02/27/2018', '03:08 AM', '03:08 AM', 'Van', 'Round-Trip', '2018-02-23 20:27:01', '2018-02-23 13:26:15', NULL, 4),
(17, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/24/2018', '02/27/2018', '03:08 AM', '03:08 AM', 'Van', 'Round-Trip', '2018-02-23 13:27:06', '2018-02-23 13:27:06', NULL, 5),
(18, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/24/2018', '02/27/2018', '03:08 AM', '03:08 AM', 'Van', 'Round-Trip', '2018-02-23 13:29:51', '2018-02-23 13:29:51', NULL, 3),
(19, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/24/2018', '02/27/2018', '03:08 AM', '03:08 AM', 'Van', 'Round-Trip', '2018-02-23 20:31:59', '2018-02-23 13:30:08', NULL, 4),
(20, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/24/2018', '02/27/2018', '03:08 AM', '03:08 AM', 'Van', 'Round-Trip', '2018-02-23 13:32:03', '2018-02-23 13:32:03', NULL, 5),
(21, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/24/2018', '02/27/2018', '03:08 AM', '03:08 AM', 'Van', 'Round-Trip', '2018-02-23 13:32:13', '2018-02-23 13:32:13', NULL, 3),
(22, NULL, 'โรงแรมกะตะ', 'โลตัส', '02/25/2018', '02/25/2018', '11:02 PM', '11:02 PM', 'Taxi', 'One-Way', '2018-02-24 09:02:48', '2018-02-24 09:02:48', NULL, 4),
(23, NULL, 'โลตัส', 'กะรน', '02/14/2018', '02/08/2018', '10:58 PM', '04:03 AM', 'Van', 'One-Way', '2018-02-24 11:01:22', '2018-02-24 11:01:22', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` char(10) DEFAULT NULL,
  `town_city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `roles_id` int(11) NOT NULL,
  `queue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `telephone`, `town_city`, `country`, `remember_token`, `created_at`, `updated_at`, `roles_id`, `queue`) VALUES
(1, 'Natthawat', 'Singkala', 'Benz', '$2y$10$u59uPcG36aESglQJFTrhqejxL7rWqte5s5hDGfWabM5DfSpXbDGni', 'banz_222@windowslive.com', '0874746612', 'Phuket', 'Thailand', 'uW9c9350NvjlskdCzILatLDQvJLiEPTpUvcHXwrOLDBiZWtdlDq5yQb0rucA', '2018-02-24 11:22:10', '2017-12-09 10:12:32', 2, NULL),
(2, 'Game', 'Panich', 'zero', '$2y$10$oLxgSmIxsY1ZkH.hp5biB.D3i8EeM/NMnHwPBXmgevqe.BotQHwHm', 'game_supichaya@hotmail.com', '0812345678', 'Hat Yai', 'Songkhla', 'AtJCjt9IDnWC75QZK5jpuJTfxdT3NqiP8sH9zNxEQWStPqU0XBItdv7075F8', '2018-02-24 11:23:11', '2017-12-10 19:39:29', 1, NULL),
(3, NULL, NULL, 'BLT', '$2y$10$MgGY7KMs3FUiPWapNzKtjOBJRNuaxtSfSX7.mHjc6qTuxssIeHmdi', 'toey@gmail.com', NULL, NULL, NULL, 'wSi900umpl02vD1D4uTmqFNXPZCZaMXMVKtfodgmBS7akHxHQem4yPhLwEzz', '2018-02-23 20:09:39', '2018-02-03 00:50:20', 3, 3),
(4, NULL, NULL, 'tom', '$2y$10$qIXRiMT9ZPoXLmqR4LClCudsNkkS/sIPcLmAIn.AL9k81Ybgx.UuG', 'tom@gmail.com', NULL, NULL, NULL, 'j7MG48qHiLsyRWht1D0ZeiiP3bVk4562XR0WvAGwrXwIUIutjld4ztMWChEO', '2018-02-23 14:43:51', '2018-02-10 01:32:05', 3, 1),
(5, NULL, NULL, 'tomme', '$2y$10$3oJe0FqgtyjjW/99hLsaNeC5uB/9HiH3P2h7SqFTalz5QkvM2sCbS', 'tom@mail.com', NULL, NULL, NULL, 'Dp1rmyzvzMhlQptY96CI7Mp2qPMuFWmSUd0GuE5P0wkRGWpQE0BXV0Rqan7o', '2018-02-21 19:48:23', '2018-02-13 20:35:58', 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_packagesservice`
--
ALTER TABLE `activity_packagesservice`
  ADD PRIMARY KEY (`packagesservices_id`,`activities_id`),
  ADD KEY `fk_activities_has_packagesservices_packagesservices1_idx` (`packagesservices_id`),
  ADD KEY `fk_activities_has_packagesservices_activities1_idx` (`activities_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_booking_shuttles1_idx` (`shuttles_id`),
  ADD KEY `fk_booking_packageservices1_idx` (`packageservices_id`),
  ADD KEY `fk_booking_activities1_idx` (`activities_id`);

--
-- Indexes for table `booking_user`
--
ALTER TABLE `booking_user`
  ADD PRIMARY KEY (`user_id`,`booking_id`),
  ADD KEY `fk_users_has_bookings_bookings1_idx` (`booking_id`),
  ADD KEY `fk_users_has_bookings_users1_idx` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_name_UNIQUE` (`image_name`),
  ADD KEY `fk_images_activities1_idx` (`activities_id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_maps_activities1_idx` (`activities_id`),
  ADD KEY `fk_maps_users1_idx` (`users_id`);

--
-- Indexes for table `packagesservices`
--
ALTER TABLE `packagesservices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_name_UNIQUE` (`package_name`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reviews_users1_idx` (`users_id`),
  ADD KEY `fk_reviews_activities1_idx` (`activities_id`),
  ADD KEY `fk_reviews_packagesservices1_idx` (`packagesservices_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name_UNIQUE` (`role_name`);

--
-- Indexes for table `shuttles`
--
ALTER TABLE `shuttles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shuttles_maps1_idx` (`maps_id`),
  ADD KEY `fk_shuttles_users1_idx` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_UNIQUE` (`user_name`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_users_roles1_idx` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `packagesservices`
--
ALTER TABLE `packagesservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shuttles`
--
ALTER TABLE `shuttles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_packagesservice`
--
ALTER TABLE `activity_packagesservice`
  ADD CONSTRAINT `fk_activities_has_packagesservices_activities1` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activities_has_packagesservices_packagesservices1` FOREIGN KEY (`packagesservices_id`) REFERENCES `packagesservices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_booking_activities1` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_booking_packageservices1` FOREIGN KEY (`packageservices_id`) REFERENCES `packagesservices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_booking_shuttles1` FOREIGN KEY (`shuttles_id`) REFERENCES `shuttles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `booking_user`
--
ALTER TABLE `booking_user`
  ADD CONSTRAINT `fk_users_has_bookings_bookings1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_bookings_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_activities1` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `maps`
--
ALTER TABLE `maps`
  ADD CONSTRAINT `fk_maps_activities1` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_maps_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_activities1` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reviews_packagesservices1` FOREIGN KEY (`packagesservices_id`) REFERENCES `packagesservices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shuttles`
--
ALTER TABLE `shuttles`
  ADD CONSTRAINT `fk_shuttles_maps1` FOREIGN KEY (`maps_id`) REFERENCES `maps` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_shuttles_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
