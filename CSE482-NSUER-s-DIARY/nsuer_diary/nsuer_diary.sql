-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 20, 2022 at 02:19 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsuer_diary`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `body`, `created_at`) VALUES
(24, 4, 29, 'Great News', '2022-08-20 06:04:03'),
(25, 11, 29, 'Interested to join', '2022-08-20 06:04:56'),
(26, 11, 22, 'When will the next semester start?', '2022-08-20 06:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`email`, `message`) VALUES
('nazmul.hasan7@northsouth.edu', 'adadda'),
('nazmul.hasan7@northsouth.edu', 'Test Comment'),
('nazmul.hasan7@northsouth.edu', 'Test Comment'),
('nazmul.hasan7@northsouth.edu', 'This is a test message\r\n'),
('testuser@northsouth.edu', 'Sending a message without sigin'),
('anotheruser@northsouth.edu', 'Hey, One of my post is not published yet. Please publish it.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `views`, `image`, `body`, `published`, `created_at`, `updated_at`) VALUES
(11, 4, 'North South University Brief History', 'north-south-university-brief-history', 0, 'campus_2.jpg', '&lt;h3&gt;&lt;strong&gt;NORTH SOUTH UNIVERSITY&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;North South University (NSU), the first private university in Bangladesh, was established in 1992 by the then Foundation for Promotion of Education and Research (FPER), a charitable, non-profit, non-commercial and non-political organization. The FPER later was renamed as the NSU Foundation and is presently called The North South Foundation for Education and Research. The Foundation is comprised of a group of eminent industrialists, prominent patrons of education, notable philanthropists, widely experienced academics and senior civil servants of the country. In the early 1990s, they had a dream to set up a world-class university as a center of excellence in higher education in the private sector. Their dedication, tireless efforts, and hard work paved the way for the approval of the establishment of NSU.&lt;/p&gt;\r\n\r\n&lt;p&gt;Since, at that time, there was no relevant law in the country to set up and operate a university in the private sector, they took the entire burden on themselves and extended their best efforts in assisting the then government in formulating the relevant law and enacting it. Subsequently, the government, pursuant to the newly enacted law the Private University Act (PUA)-1992 (now repealed by PUA-2010), approved the establishment of NSU. The University was formally inaugurated on 10 February 1993 and started its journey in a very modest way. Later, in 2012, the NSU Foundation, in the light of the PUA 2010 and as instructed by the Ministry of Education and the University Grants Commission, formed the NSU Trust with the same group of people as the Foundation and vested the entire management and administration of NSU in its Board of Trustees (BOT). The Honorable President of the People&amp;#39;s Republic of Bangladesh is the Chancellor of NSU.&lt;/p&gt;\r\n', 1, '2022-08-20 05:45:39', '2022-08-18 14:38:01'),
(12, 4, 'North South University Fall 2022 Admission', 'north-south-university-fall-2022-admission', 0, 'campus_1.jpg', '&lt;h3&gt;&lt;strong&gt;FALL 2022 ADMISSION RESULT PUBLISHED&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p&gt;Result&amp;nbsp;&lt;a href=&quot;http://admissions.northsouth.edu/images/web/result/web_result_223_v1.pdf&quot; onclick=&quot;window.open(this.href, \'ResultFall2022\', \'resizable=yes,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=yes,dependent=no\'); return false;&quot;&gt;FALL 2022 Result PDF&lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;In general, NSU is modeled on US universities and follows their academic features such as semester systems, credit hours, letter grades, etc. When first introduced, its curricula of undergraduate programs such as Economics, Business, and Computer Science were largely modeled on the curricula of the University of Illinois at Urbana-Champaign and were duly approved by the University Grants Commission (UGC) of Bangladesh, the highest accrediting authority of higher education of the country. NSU has an International Advisory Board, comprised of scholars from all over the world, to counsel and to suggest improvements on academic matters of the university. The university is delivering a substantial general education curriculum, has a strategic plan, and has initiated and implemented student instructional learning assessment for degree programs and courses and is in the process of developing the infrastructure for evaluation of institutional effectiveness for its institutional accreditation.&lt;/p&gt;\r\n', 1, '2022-08-20 05:46:16', '2022-08-18 14:42:52'),
(13, 4, 'FIFA World Cup 2022 Official ball launched', 'fifa-world-cup-2022-official-ball-launched', 0, 'fifa2022.jpeg', '&lt;p&gt;The 2022 FIFA World Cup is scheduled to take place in Qatar from 21 November to 18 December 2022.&lt;br /&gt;\r\n&lt;br /&gt;\r\nThe Adidas Telstar 18 was the official match ball of the 2018 FIFA World Cup, which was held in Russia. It was designed by Adidas, a FIFA Partner and FIFA World Cup official match ball supplier since 1970, and based on the concept of the first Adidas World Cup match ball.&lt;/p&gt;\r\n', 1, '2022-08-20 05:46:16', '2022-08-18 14:45:04'),
(14, 4, 'North South University - Bangladesh', 'north-south-university---bangladesh', 0, 'NSU-maingate.jpg', '&lt;p&gt;North South University (NSU), the first private university in Bangladesh, was established in 1992 by the then Foundation for Promotion of Education and Research (FPER), a charitable, non-profit, non-commercial and non-political organization. The FPER later was renamed as the NSU Foundation and is presently called The North South Foundation for Education and Research. The Foundation is comprised of a group of eminent industrialists, prominent patrons of education, notable philanthropists, widely experienced academics and senior civil servants of the country. In the early 1990s, they had a dream to set up a world-class university as a center of excellence in higher education in the private sector. Their dedication, tireless efforts, and hard work paved the way for the approval of the establishment of NSU.&lt;/p&gt;\r\n', 1, '2022-08-20 05:46:16', '2022-08-18 14:46:06'),
(15, 4, 'North South University Ranks #1', 'north-south-university-ranks-1', 0, 'rank_1.jpg', '&lt;p&gt;North South University has emerged as the&amp;nbsp;&lt;strong&gt;#1 Private University in Bangladesh&lt;/strong&gt;. North South University has emerged as the #1 Private University in Bangladesh according to the latest QS Asia Rankings 2020.&lt;/p&gt;\r\n', 1, '2022-08-18 15:25:53', '2022-08-18 15:25:44'),
(22, 4, 'Important dates of Summer\'22', 'important-dates-of-summer-22', 0, 'important_dates.JPG', '&lt;h2&gt;&lt;strong&gt;Important Dates&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Holiday&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Ashura - 9th August&lt;/p&gt;\r\n\r\n&lt;p&gt;National Mouring Day - 15th August&lt;/p&gt;\r\n\r\n&lt;p&gt;Janmasthami - 18th August&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Academics&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Last date of faculty evaluation - 25th August&lt;/p&gt;\r\n\r\n&lt;p&gt;Fianl Exams - September 1 - September 7&lt;/p&gt;\r\n\r\n&lt;p&gt;Last date of grade submission - September 12&lt;/p&gt;\r\n', 1, '2022-08-19 09:33:33', '2022-08-19 09:33:02'),
(27, 11, 'NSU ranks top 500 in QS Graduate Employability', 'nsu-ranks-top-500-in-qs-graduate-employability', 0, 'rank_2.jpg', '&lt;p&gt;&lt;strong&gt;North South University, the first private university in the country, has ranked among the top 500 universities in the world in the QS Graduate Employability Rankings 2022&lt;/strong&gt;. The rankings were officially unveiled on Thursday, according to an NSU press release.&amp;nbsp;The QS Graduate Employability Rankings do not specify the exact ranking for universities outside the top 100, so NSU was ranked 301-500.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;NSU continues to solidify its position as the leader in higher education in Bangladesh. &amp;nbsp;North South University continues to make significant strides towards their goal of being among the top 100 universities in Asia and the top 1,000 in the World,&amp;rdquo; the press release added. The only other university from Bangladesh to make the rankings was Dhaka University, which also ranked 301-500&lt;/p&gt;\r\n', 1, '2022-08-20 03:07:50', '2022-08-20 01:19:00'),
(29, 11, 'NSU ACM TECHNOVATION 2.0 Starts', 'nsu-acm-technovation-2-0-starts', 0, 'technovation14.jpg', '&lt;p&gt;Our signature event, Technovation - a Beacon of Engineering Success, one of North South University&amp;rsquo;s largest and most anticipated tech fests, was hosted for the very first time by NSU ACM Student Chapter in February 2018 for consecutive 3 days where over 800 participants, from 22 different universities, competed against each other across six different competitions such as IT Business Challenge, Hackathon, App Development Contest and many more. It gave the participants an opportunity to upheaval in the meadow of tech. It was a resounding success in all areas ranging from programming and gaming to robotics.&lt;/p&gt;\r\n\r\n&lt;p&gt;After witnessing this grand event in 2018, it was again held in November 2019 as &amp;ldquo;Technovation 2.0&amp;rdquo;. One of the main goals of Technovation was to help students from the participating universities display the skills they will use in the future as engineers and entrepreneurs. Many of the contests revolved around applications in real-life technological fields that are currently being developed.&lt;/p&gt;\r\n', 1, '2022-08-20 05:49:46', '2022-08-20 05:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `post_topic`
--

CREATE TABLE `post_topic` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_topic`
--

INSERT INTO `post_topic` (`id`, `post_id`, `topic_id`) VALUES
(1, 11, 1),
(2, 12, 2),
(3, 13, 7),
(4, 14, 1),
(5, 15, 1),
(34, 22, 6),
(39, 27, 1),
(44, 29, 3);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`) VALUES
(1, 'North South University', 'north-south-university'),
(2, 'North South University Admission', 'north-south-university-admission'),
(3, 'NSU Campus Life', 'nsu-campus-life'),
(4, 'Exam Schedule', 'exam-schedule'),
(5, 'Academic Calender', 'academic-calender'),
(6, 'Important Notice', 'important-notice'),
(7, 'Sports', 'sports');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'nhnazmulhasan085@gmail.com', 'Admin', 'admin', '2022-06-29 04:31:52', '2022-06-19 04:31:52'),
(4, 'NazmulHasan7', 'nazmul.hasan7@northsouth.edu', 'Admin', 'ed77f311f801f2d976c3392791863d18', '2022-08-01 20:30:47', '2022-08-01 20:30:47'),
(7, 'admin_user', 'admin@northsouth.edu', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', '2022-08-18 05:13:44', '2022-08-18 05:13:44'),
(8, 'SamyaSunibirDas', 'samya.das@northsouth.edu', 'Admin', 'c2ed82b12b3cf8345aef1a74fc7f3948', '2022-08-18 05:52:18', '2022-08-18 05:52:18'),
(9, 'Testuser', 'testuser@northsouth.edu', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', '2022-08-18 14:22:22', '2022-08-18 14:22:22'),
(10, 'another_user', 'anotheruser@gmail.com', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', '2022-08-18 14:23:03', '2022-08-18 14:23:03'),
(11, 'normaluser', 'normaluser@northsouth.edu', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2022-08-18 15:08:53', '2022-08-18 15:08:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_topic`
--
ALTER TABLE `post_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `post_topic`
--
ALTER TABLE `post_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post_topic`
--
ALTER TABLE `post_topic`
  ADD CONSTRAINT `post_topic_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `post_topic_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
