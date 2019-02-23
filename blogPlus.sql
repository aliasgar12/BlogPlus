-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 03:02 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(5, 'Java'),
(6, 'Bootstrap'),
(7, 'Data Structure'),
(8, 'Algorithms'),
(9, 'Operating System');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(4, 1, 'Chris', 'chris@gmail.com', 'I want to post something on your website.', 'approved', '2017-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 5, 'Beautiful pages with CSS', 'Ali', '2017-07-02', 'flashmo.jpg', '<p>I love this shit!</p>', 'ali, css, webpages', 5, 'published', 28),
(2, 5, 'Recursively reverse linked list.', 'Ravindra', '2017-07-02', 'siuslaw-sunset.jpg', '<p>Recursively go to the last node and then start reversing the links when the function starts to folds itself.</p>', 'linked list, data structures, ali, recursion', 1, 'published', 4),
(6, 5, 'Recursively reverse linked list.', 'Ravindra', '2017-07-02', 'siuslaw-sunset.jpg', '<p>Recursively go to the last node and then start reversing the links when the function starts to folds itself.</p>', 'linked list, data structures, ali, recursion', 1, 'published', 4),
(7, 5, 'Beautiful pages with CSS', 'Ali', '2017-07-02', 'flashmo.jpg', '<p>I love this shit!</p>', 'ali, css, webpages', 0, 'published', 0),
(8, 5, 'Beautiful pages with CSS', 'Ali', '2017-07-02', 'flashmo.jpg', '<p>I love this shit!</p>', 'ali, css, webpages', 0, 'published', 1),
(9, 5, 'Recursively reverse linked list.', 'Ravindra', '2017-07-02', 'siuslaw-sunset.jpg', '<p>Recursively go to the last node and then start reversing the links when the function starts to folds itself.</p>', 'linked list, data structures, ali, recursion', 0, 'published', 0),
(10, 5, 'Recursively reverse linked list.', 'Ravindra', '2017-07-02', 'siuslaw-sunset.jpg', '<p>Recursively go to the last node and then start reversing the links when the function starts to folds itself.</p>', 'linked list, data structures, ali, recursion', 0, 'published', 0),
(11, 5, 'Beautiful pages with CSS', 'Ali', '2017-07-02', 'flashmo.jpg', '<p>I love this shit!</p>', 'ali, css, webpages', 0, 'published', 0),
(12, 5, 'Beautiful pages with CSS', 'Ali', '2017-07-02', 'flashmo.jpg', '<p>I love this shit!</p>', 'ali, css, webpages', 0, 'published', 0),
(13, 5, 'Recursively reverse linked list.', 'Ravindra', '2017-07-02', 'siuslaw-sunset.jpg', '<p>Recursively go to the last node and then start reversing the links when the function starts to folds itself.</p>', 'linked list, data structures, ali, recursion', 0, 'published', 0),
(14, 5, 'Recursively reverse linked list.', 'Ravindra', '2017-07-02', 'siuslaw-sunset.jpg', '<p>Recursively go to the last node and then start reversing the links when the function starts to folds itself.</p>', 'linked list, data structures, ali, recursion', 0, 'published', 0),
(15, 5, 'Beautiful pages with CSS', 'Ali', '2017-07-02', 'flashmo.jpg', '<p>I love this shit!</p>', 'ali, css, webpages', 0, 'published', 0),
(16, 5, 'Beautiful pages with CSS', 'Ali', '2017-07-02', 'flashmo.jpg', '<p>I love this shit!</p>', 'ali, css, webpages', 0, 'published', 0),
(17, 5, 'Recursively reverse linked list.', 'Ravindra', '2017-07-02', 'siuslaw-sunset.jpg', '<p>Recursively go to the last node and then start reversing the links when the function starts to folds itself.</p>', 'linked list, data structures, ali, recursion', 0, 'published', 0),
(18, 5, 'Recursively reverse linked list.', 'Ravindra', '2017-07-02', 'siuslaw-sunset.jpg', '<p>Recursively go to the last node and then start reversing the links when the function starts to folds itself.</p>', 'linked list, data structures, ali, recursion', 0, 'published', 0),
(19, 5, 'Beautiful pages with CSS', 'Ali', '2017-07-02', 'flashmo.jpg', '<p>I love this shit!</p>', 'ali, css, webpages', 0, 'published', 0),
(20, 8, 'Some random post', 'Annu', '2017-07-09', 'siuslaw-sunset.jpg', '<p>This is some random post to check if images uploads properly or not.</p>', 'random, image check, annu', 8, 'published', 31),
(21, 6, 'Think and grow rich !!', 'Annu', '2017-07-09', 'image_1.jpg', '<p>This is a nice book !!</p>', 'book, ali', 0, 'published', 9),
(22, 5, 'Think and grow rich !!', 'Annu', '2017-07-09', 'siuslaw-sunset.jpg', '<p>kajsfkshfdkhsdlf</p>', 'random', 0, 'draft', 6),
(23, 9, 'Some random post', 'Annu', '2017-07-09', 'Data Structures Fall.jpg', '<p>assdfsafdsdf</p>', 'asd', 0, 'published', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(2, 'aliasgar', '$2y$10$0Q1Q4Ju449DImzuQ6a07HO6mFPFbGqQALmbsuGch177ND83/OzDqC', 'Ali', 'Asgar', 'ali.asgar@mail.usf.edu', '', 'admin', ''),
(3, 'christopher', '$2y$10$IzTSZk4LlE69ar/04ankrOR/WmJBtxoCRFYiw/lVmO91N5QT7Qdgq', 'Chris', 'Klein', 'chris@gmail.com', '', 'subscriber', ''),
(5, 'jpunjabi', '$2y$10$5Q6uAs35COoFhCppcqMI6uxQmxisYoey36ifFntGN3F/TE3Ed.yiu', 'Jiten', 'Punjabi', 'jpunjabi@gmail.com', '', 'subscriber', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(3) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'u95hmuno30ha3sb59inru9go20', 1499120539),
(2, 'lbthkd1c2nem2hrkndv61b9em7', 1499044565),
(3, 'l1i2soq6dgl96pva8g3omarpb1', 1499044774),
(4, 'ris61f593vb6hrjjhcohsin25r', 1499553876),
(5, 'lu0bufd88bcb35avjjc7j7m6er', 1499601632),
(6, 'tsmpkpb2a2e4d5027h153h8prt', 1499644073);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
