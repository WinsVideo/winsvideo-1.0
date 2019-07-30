-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2019 at 11:41 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `VideoTube`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Film & Animation'),
(2, 'Autos & Vehicles'),
(3, 'Music'),
(4, 'Pets & Animals'),
(5, 'Sports'),
(6, 'Travel & Events'),
(7, 'Gaming'),
(8, 'People & Blogs'),
(9, 'Comedy'),
(10, 'Entertainment'),
(11, 'News & Politics'),
(12, 'Howto & Style'),
(13, 'Education'),
(14, 'Science & Technology'),
(15, 'Nonprofits & Activism');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postedBy` varchar(50) NOT NULL,
  `videoId` int(11) NOT NULL,
  `responseTo` int(11) NOT NULL,
  `body` text NOT NULL,
  `datePosted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postedBy`, `videoId`, `responseTo`, `body`, `datePosted`) VALUES
(1, 'reece-kenney', 155, 0, 'Hi everyone! ', '2018-10-06 14:25:14'),
(2, 'reece-kenney', 155, 0, 'Nice video!', '2018-10-06 14:42:27'),
(3, 'reece-kenney', 155, 0, 'test comment', '2018-10-06 15:09:34'),
(4, 'reece-kenney', 155, 0, 'test 123', '2018-10-06 15:12:27'),
(5, 'reece-kenney', 155, 0, 'Hi guys!', '2018-10-06 15:13:22'),
(6, 'reece-kenney', 155, 0, 'This is a dog', '2018-10-06 15:14:18'),
(7, 'reece-kenney', 155, 0, 'fsfsdsd', '2018-10-06 15:17:12'),
(8, 'reece-kenney', 155, 0, 'gdsfdsfg', '2018-10-06 15:19:05'),
(9, 'reece-kenney', 155, 0, 'hgvjkbj', '2018-10-06 15:30:55'),
(10, 'reece-kenney', 155, 0, 'test', '2018-10-06 15:32:06'),
(11, 'reece-kenney', 155, 0, 'Test comment', '2018-10-06 15:35:42'),
(12, 'reece-kenney', 155, 0, 'fdsasdfsdf', '2018-10-06 16:03:42'),
(13, 'reece-kenney', 155, 0, 'fsdfadsfsdf', '2018-10-06 16:43:47'),
(14, 'reece-kenney', 155, 0, 'Hi!', '2018-10-06 16:45:26'),
(15, 'reece-kenney', 155, 0, 'fdsfsdfd sdf ', '2018-10-06 16:46:05'),
(16, 'reece-kenney', 155, 0, 'dfsfasdf asdf ', '2018-10-06 16:56:15'),
(17, 'reece-kenney', 155, 0, 'fsdfsdfsdsdf asdf ', '2018-10-06 17:07:12'),
(18, 'reece-kenney', 155, 0, 'asfasdfas asdf ', '2018-10-06 17:07:33'),
(19, 'reece-kenney', 155, 0, 'Hello', '2018-10-06 17:08:05'),
(20, 'reece-kenney', 155, 0, 'fdsafasdf', '2018-10-06 17:24:44'),
(21, 'reece-kenney', 155, 0, 'fgdgdsfgfdsg  fgsd', '2018-10-07 11:12:40'),
(22, 'reece-kenney', 155, 0, 'fsdfd', '2018-10-07 11:20:01'),
(23, 'reece-kenney', 155, 0, 'dsfsdf', '2018-10-07 11:21:01'),
(24, 'reece-kenney', 155, 0, 'gdgdf', '2018-10-07 11:46:02'),
(25, 'reece-kenney', 155, 0, 'vxzvxcv', '2018-10-07 11:51:38'),
(26, 'reece-kenney', 155, 0, 'gdsgdsgs ', '2018-10-07 11:52:42'),
(27, 'reece-kenney', 155, 0, 'dsfasdfas', '2018-10-07 12:03:41'),
(28, 'reece-kenney', 155, 0, 'dfasdfasdf asdf ', '2018-10-07 12:03:54'),
(29, 'reece-kenney', 155, 0, 'fgsdfg sdfg ', '2018-10-07 12:09:11'),
(30, 'reece-kenney', 155, 0, 'sdfsdf sdf ', '2018-10-07 12:10:30'),
(31, 'reece-kenney', 155, 0, 'sdf sdaf ', '2018-10-07 12:10:55'),
(32, 'reece-kenney', 155, 31, 'response :)', '2018-10-07 12:17:53'),
(33, 'reece-kenney', 155, 0, 'Test', '2018-10-07 12:19:20'),
(34, 'reece-kenney', 155, 0, 'cvzxcv zv', '2018-10-07 12:27:35'),
(35, 'reece-kenney', 155, 0, 'dgfsdfg', '2018-10-07 12:51:32'),
(36, 'reece-kenney', 155, 0, 'dfsd sfd s', '2018-10-07 13:03:39'),
(37, 'reece-kenney', 155, 0, 'sdfsdfs', '2018-10-07 13:18:02'),
(38, 'reece-kenney', 155, 37, 'This is a response!!!', '2018-10-07 13:41:53'),
(39, 'reece-kenney', 155, 38, 'asdf asfd asdf ', '2018-10-07 13:55:31'),
(40, 'reece-kenney', 155, 39, 'HELLO EVERYONE', '2018-10-07 13:57:13'),
(41, 'reece-kenney', 155, 33, 'Hi there :) ', '2018-10-07 14:00:10'),
(42, 'reece-kenney', 155, 41, 'Hi to you too!', '2018-10-07 14:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `commentId` int(11) NOT NULL,
  `videoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `commentId` int(11) NOT NULL,
  `videoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `commentId`, `videoId`) VALUES
(22, 'reece-kenney', 0, 154),
(23, 'reece-kenney', 0, 155),
(31, 'reece-kenney', 42, 0),
(33, 'reece-kenney', 0, 161),
(36, 'Win\'sDominoes', 0, 160),
(37, 'Win\'sDominoes', 0, 168),
(38, 'Win\'sDominoes', 0, 166),
(39, 'Win\'sDominoes', 0, 167);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `userTo` varchar(50) NOT NULL,
  `userFrom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `userTo`, `userFrom`) VALUES
(9, 'donkey-kong', 'reece-kenney'),
(11, 'littlemac', 'reece-kenney');

-- --------------------------------------------------------

--
-- Table structure for table `thumbnails`
--

CREATE TABLE `thumbnails` (
  `id` int(11) NOT NULL,
  `videoId` int(11) NOT NULL,
  `filePath` varchar(250) NOT NULL,
  `selected` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thumbnails`
--

INSERT INTO `thumbnails` (`id`, `videoId`, `filePath`, `selected`) VALUES
(25, 154, 'uploads/videos/thumbnails/154-5bb0ba5aa936c.jpg', 1),
(26, 154, 'uploads/videos/thumbnails/154-5bb0ba5ad39b8.jpg', 0),
(27, 154, 'uploads/videos/thumbnails/154-5bb0ba5b1b7a3.jpg', 0),
(28, 155, 'uploads/videos/thumbnails/155-5bb7a68e7dccb.jpg', 1),
(29, 155, 'uploads/videos/thumbnails/155-5bb7a68e9fa5f.jpg', 0),
(30, 155, 'uploads/videos/thumbnails/155-5bb7a68ecb38c.jpg', 0),
(31, 156, 'uploads/videos/thumbnails/156-5bba23fbd942d.jpg', 0),
(32, 156, 'uploads/videos/thumbnails/156-5bba23fc048bd.jpg', 0),
(33, 156, 'uploads/videos/thumbnails/156-5bba23fc30d48.jpg', 1),
(34, 157, 'uploads/videos/thumbnails/157-5bba24337107c.jpg', 1),
(35, 157, 'uploads/videos/thumbnails/157-5bba243393bec.jpg', 0),
(36, 157, 'uploads/videos/thumbnails/157-5bba2433c32f8.jpg', 0),
(37, 158, 'uploads/videos/thumbnails/158-5bba245c7fee8.jpg', 1),
(38, 158, 'uploads/videos/thumbnails/158-5bba245c9c372.jpg', 0),
(39, 158, 'uploads/videos/thumbnails/158-5bba245cbf323.jpg', 0),
(40, 159, 'uploads/videos/thumbnails/159-5bba247ebfcc4.jpg', 1),
(41, 159, 'uploads/videos/thumbnails/159-5bba247ee4ad9.jpg', 0),
(42, 159, 'uploads/videos/thumbnails/159-5bba247f22bfa.jpg', 0),
(43, 160, 'uploads/videos/thumbnails/160-5bba2c7c483e6.jpg', 1),
(44, 160, 'uploads/videos/thumbnails/160-5bba2c7c77d22.jpg', 0),
(45, 160, 'uploads/videos/thumbnails/160-5bba2c7cbc94b.jpg', 0),
(46, 161, 'uploads/videos/thumbnails/161-5bba2cb995c1d.jpg', 1),
(47, 161, 'uploads/videos/thumbnails/161-5bba2cba21a63.jpg', 0),
(48, 161, 'uploads/videos/thumbnails/161-5bba2cbae6700.jpg', 0),
(49, 162, 'uploads/videos/thumbnails/162-5bba2cdb87604.jpg', 1),
(50, 162, 'uploads/videos/thumbnails/162-5bba2cdbc068a.jpg', 0),
(51, 162, 'uploads/videos/thumbnails/162-5bba2cdc29934.jpg', 0),
(52, 163, 'uploads/videos/thumbnails/163-5bba2d59ae676.jpg', 1),
(53, 163, 'uploads/videos/thumbnails/163-5bba2d59d15fb.jpg', 0),
(54, 163, 'uploads/videos/thumbnails/163-5bba2d5a0cd2b.jpg', 0),
(55, 164, 'uploads/videos/thumbnails/164-5bba2d7cb0414.jpg', 1),
(56, 164, 'uploads/videos/thumbnails/164-5bba2d7ccc263.jpg', 0),
(57, 164, 'uploads/videos/thumbnails/164-5bba2d7cf3ce6.jpg', 0),
(58, 165, 'uploads/videos/thumbnails/165-5cdad5de0d770.jpg', 1),
(59, 165, 'uploads/videos/thumbnails/165-5cdad5dec18c2.jpg', 0),
(60, 165, 'uploads/videos/thumbnails/165-5cdad5e011471.jpg', 0),
(61, 166, 'uploads/videos/thumbnails/166-5cdadaea0a6c3.jpg', 1),
(62, 166, 'uploads/videos/thumbnails/166-5cdadaea55243.jpg', 0),
(63, 166, 'uploads/videos/thumbnails/166-5cdadaeac76a6.jpg', 0),
(64, 167, 'uploads/videos/thumbnails/167-5cdade33e0cb9.jpg', 1),
(65, 167, 'uploads/videos/thumbnails/167-5cdade34de34c.jpg', 0),
(66, 167, 'uploads/videos/thumbnails/167-5cdade36a2fd4.jpg', 0),
(67, 168, 'uploads/videos/thumbnails/168-5cdb73eb6ef1f.jpg', 1),
(68, 168, 'uploads/videos/thumbnails/168-5cdb73ec43255.jpg', 0),
(69, 168, 'uploads/videos/thumbnails/168-5cdb73edb66b5.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signUpDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profilePic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(1, 'Reece', 'Kenney', 'reece-kenney', 'Reece@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2018-09-30 11:35:09', 'assets/images/profilePictures/default-male.png'),
(2, 'Donkey', 'Kong', 'donkey-kong', 'dk@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2018-09-30 11:50:41', 'assets/images/profilePictures/default.png'),
(3, 'Super', 'Mario', 'mario-sunshine', 'mario@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2018-10-05 19:57:05', 'assets/images/profilePictures/default-female.png'),
(4, 'Mike', 'Wazowski', 'mike123', 'mk@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2018-10-07 17:52:49', 'assets/images/profilePictures/default.png'),
(5, 'Little', 'Mac', 'littlemac', 'mac@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2018-10-07 17:52:49', 'assets/images/profilePictures/default-male.png'),
(6, 'Mickey', 'Mouse', 'mickey-mouse', 'mouse@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2018-10-07 17:52:49', 'assets/images/profilePictures/default.png'),
(7, 'Bugs', 'Bunny', 'bugsbunny', 'bugs@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2018-10-07 17:52:49', 'assets/images/profilePictures/default.png'),
(8, 'Thanawin', 'Pattanaphol', 'Win\'sDominoes', 'winsdominoes2018@gmail.com', '470491c71719d953cc827a490648cc7f557319acb2bb898dceb4131e59fd1451c5903959cde68ccfc054438ceb71ae9b5a12a3c67542f4367c6f27e770b7ad72', '2019-05-14 21:48:48', 'assets/images/profilePictures/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `uploadedBy` varchar(50) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `privacy` int(11) NOT NULL,
  `filePath` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `uploadDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL,
  `duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `uploadedBy`, `title`, `description`, `privacy`, `filePath`, `category`, `uploadDate`, `views`, `duration`) VALUES
(154, 'reece-kenney', 'This is a car video', 'Here is a video of my car', 1, 'uploads/videos/5bb0ba5665d24.mp4', 2, '2018-09-30 13:58:14', 101, '00:08'),
(155, 'mario-sunshine', 'Dog plays in the sand on the beach', 'This is a video of my dog playing in the sand. He\'s awesome!', 1, 'uploads/videos/5bb7a68bd6276.mp4', 4, '2018-10-05 19:59:39', 95, '00:05'),
(156, 'reece-kenney', 'Man playing guitar having fun', 'Some guy playing the guitar', 1, 'uploads/videos/5bba23f8e2f8c.mp4', 4, '2018-10-07 17:19:20', 10, '00:10'),
(157, 'donkey-kong', 'Woman in front of the computer', '', 1, 'uploads/videos/5bba243098e18.mp4', 14, '2018-10-07 17:20:16', 2, '00:06'),
(158, 'donkey-kong', 'Woman walking with phone', 'This is some stock footage I found', 1, 'uploads/videos/5bba245a573a3.mp4', 8, '2018-10-07 17:20:58', 11, '00:04'),
(159, 'mike123', 'Ducks! Awesome!', 'Here are some ducks. Enjoy!', 1, 'uploads/videos/5bba247a83798.mp4', 4, '2018-10-07 17:21:30', 3, '00:05'),
(160, 'reece-kenney', 'Table tennis with my friends', 'My friends an I playing tennis', 1, 'uploads/videos/5bba2c77ae7d8.mp4', 5, '2018-10-07 17:55:35', 23, '00:09'),
(161, 'mickey-mouse', 'Card peeking', 'Playing poker', 1, 'uploads/videos/5bba2ca8896ee.mp4', 7, '2018-10-07 17:56:24', 4, '00:07'),
(162, 'mickey-mouse', 'Kid playing ice hockey', 'He\'s awsome', 1, 'uploads/videos/5bba2cd313ebd.mp4', 5, '2018-10-07 17:57:07', 3, '00:13'),
(163, 'littlemac', 'Clown fish ', 'Here is a video of a clown fish in water', 1, 'uploads/videos/5bba2d55ee97e.mp4', 4, '2018-10-07 17:59:17', 5, '00:05'),
(164, 'mickey-mouse', 'Some funny man swimming', '', 1, 'uploads/videos/5bba2d7a09460.mp4', 15, '2018-10-07 17:59:54', 1, '00:09'),
(166, 'Win\'sDominoes', 'KornAA', 'KornAA', 1, 'uploads/videos/5cdadade04480.mp4', 13, '2019-05-14 22:12:30', 9760, '00:02'),
(167, 'Win\'sDominoes', 'This Video is going to beat KornAA Video Views', 'Most Viewed Video on WinsVideo. Almost There!! Only Few Views left to pass Korn AA Video!!', 1, 'uploads/videos/5cdade08e6535.mp4', 1, '2019-05-14 22:26:00', 9712, '00:10'),
(168, 'Win\'sDominoes', '10,000 Views Battle', 'KornAA vs T.V.I.G.T.B.K.A.V.S vs This Video', 1, 'uploads/videos/5cdb73c7df14a.mp4', 1, '2019-05-15 09:04:55', 10003, '00:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
