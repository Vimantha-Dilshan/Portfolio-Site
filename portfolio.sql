-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 12:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `access_level` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `email`, `username`, `access_level`, `password`) VALUES
(1, 'admin@gmail.com', 'Developer Channel', 'Super Admin', 'vima@123');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `project` varchar(100) NOT NULL,
  `stars` varchar(10) NOT NULL,
  `feedback` varchar(1000) NOT NULL,
  `approve` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `project`, `stars`, `feedback`, `approve`) VALUES
(7, 'Pathum Madhawa', 'Online Mobile', '5', 'Vimantha designed my business website and inventory management system. It is very user friendly and complete my full requirement. Also, he is a friendly guy to contact at any time!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(100) NOT NULL,
  `degree_name` varchar(400) NOT NULL,
  `institute` varchar(400) NOT NULL,
  `year` varchar(20) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `degree_name`, `institute`, `year`, `description`) VALUES
(4, 'School Education (Sri Lanka)', 'Central Collage, Kuliyapitiya', '2018', 'Physical Stream, English Medium'),
(5, 'Microsoft Office Package & Computer Hardware Full Course', 'Academy of Information Technology Affiliated with the Chief Ministry of North-Western Province', '2016', 'Ranked as Top Performer in the course (Certificate)'),
(6, 'Certificate Course About Fundamentals of Digital Marketing', 'Google Digital Garage', '2021', 'Master the basics of digital marketing with our free course accredited by Interactive Advertising Bureau Europe and The Open University.'),
(7, 'Bachelor\'s Degree in Computer Science & Software Engineering', 'University of Bedfordshire', '2020-2022', 'Foundation in databases and computer networks, software engineering, computational thinking, programming, and data structures.');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `job` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_01` varchar(20) NOT NULL,
  `mobile_02` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `image` varchar(40) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `github_link` varchar(500) NOT NULL,
  `linkedin_link` varchar(500) NOT NULL,
  `instagram_link` varchar(500) NOT NULL,
  `facebook_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `full_name`, `job`, `email`, `mobile_01`, `mobile_02`, `address`, `country`, `image`, `bio`, `github_link`, `linkedin_link`, `instagram_link`, `facebook_link`) VALUES
(1, 'Vimantha Dilshan', 'Software Engineer', 'vimantha.0323@gmail.com', '(+94) 77 872 3616', '(+94) 70 201 6686', 'Kuliyapitiya, Sri Lanka', 'Sri Lanka', 'profile.jpg', 'I am Vimantha Dilshan, And I am a super addictive and focused person when comes to software development, whether it may be a web application or a system side application. My passion is collecting experiences for my career by working in different places with a high level of learning.', 'Pending', 'https://www.linkedin.com/in/vimantha-dilshan-6b64501b6/', 'Pending', 'https://www.facebook.com/iamVimantha');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(60) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `doc_link` varchar(200) NOT NULL,
  `git_link` varchar(200) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `image`, `client_name`, `contact_no`, `doc_link`, `git_link`, `start_date`, `end_date`, `description`, `status`) VALUES
(11, 'UNACADEMIE Learning Management System', '20221028110109.png', 'University Project', '+94 77 872 3616', '#', '#', '2021-07-05', '2021-10-20', 'PPA Group Project', 'Completed'),
(12, 'Burger Shop Business Website', '20221028111922.png', 'Kuliyapitiya', '+94 77 872 3616', '#', '#', '2021-11-16', '2021-11-30', 'Official website for the burger shop situated in kuliyapitiya city.', 'Completed'),
(13, 'Bosai Empire Pot Site', '20221028112124.png', 'Kuliyapitiya', '+94 77 872 3616', '#', '#', '2021-12-01', '2021-12-10', 'Official business website for bonsai pots shop', 'Completed'),
(14, 'Owis Technologies Website', '20221028112710.png', 'Mr. Saminda', '+94 77 351 0165', '#', '#', '2022-01-07', '2022-01-14', 'Official website for owis technologies CCTV shop in Maharagama, Sri Lanka', 'Completed'),
(15, 'Online Mobile Business Website', '20221028112934.png', 'Mr. Pathum Madhawa', '+94 70 126 6253', '#', '#', '2022-09-01', '2022-10-20', 'Official business website for the Online Mobile electronic shop situated in the Polgahawela, Sri Lanka', 'Completed'),
(16, 'Online Mobile Inventory Management System', '20221028121147.png', 'Mr. Pathum Madhawa', '+94 70 126 6253', '#', '#', '2022-09-01', '2022-10-20', 'Inventory management system for Online Mobile electronic shop', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(100) NOT NULL,
  `title` varchar(300) NOT NULL,
  `icon_text` varchar(100) NOT NULL,
  `sub_text` varchar(500) NOT NULL,
  `description` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon_text`, `sub_text`, `description`) VALUES
(4, 'Website Development', 'las la-feather', 'Design, redesign and continuously support customer-facing and enterprise web apps to achieve high conversion and adoption rates.', 'None'),
(5, 'POS System Development', 'las la-pencil-ruler', 'point-of-sale solution at both small and larger businesses with hooks to enterprise-class back-ends and a wide variety of hardware options.', 'None'),
(6, 'Business Branding/Social Media', 'las la-laptop-code', 'Branding services approaches from numerous angles, helping businesses establish, maintain or expand their brand in every possible way.', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(100) NOT NULL,
  `position` varchar(60) NOT NULL,
  `company` varchar(50) NOT NULL,
  `year` varchar(20) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `position`, `company`, `year`, `description`) VALUES
(3, 'Game Developer', 'Planet Cricket', 'Since 2016', 'Engage on cricket game mods developments in all the cricket games. '),
(4, 'Freelancer', 'ENIGMA', '2020-Onwards', 'Worked as front-end and back-end web developer in small scale to large scale projects.'),
(5, 'Trainee Software Engineer', 'Arimac, Sri Lanka', '2022', 'Worked on RESTful API development in server-side PHP and laravel lumen environment'),
(6, 'Associated Software Engineer', 'Arimac, Sri Lanka', '2022-Onwards', 'Worked on RESTful API development in server-side PHP and laravel lumen environment. Also collaborate with front-end development with Vue.JS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
