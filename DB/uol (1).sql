-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 01:30 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uol`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_isbn` text NOT NULL,
  `b_title` text NOT NULL,
  `b_author` text NOT NULL,
  `bp_id` int(11) NOT NULL,
  `b_chapters` int(4) NOT NULL,
  `b_pages` int(5) NOT NULL,
  `b_copies` int(3) NOT NULL,
  `issued_copies` int(11) NOT NULL DEFAULT '0',
  `b_row` int(5) NOT NULL,
  `b_stand` int(5) NOT NULL,
  `b_shelf` int(5) NOT NULL,
  `b_publishing_year` text NOT NULL,
  `bc_id` int(11) NOT NULL,
  `b_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_isbn`, `b_title`, `b_author`, `bp_id`, `b_chapters`, `b_pages`, `b_copies`, `issued_copies`, `b_row`, `b_stand`, `b_shelf`, `b_publishing_year`, `bc_id`, `b_img`) VALUES
('978-3-16-110110-2', 'book one', 'test author 2', 2, 12, 900, 7, 6, 7, 12, 4, '2017-11-05', 2, ''),
('978-3-16-110110-5', 'LAW book', 'test author 2', 5, 4, 3223, 4, 0, 5, 3, 1, '2017-11-08', 6, ''),
('978-3-16-110110-6', 'DSA book', 'test author 2', 3, 9, 6547, 4, 0, 2, 3, 5, '2017-11-08', 6, ''),
('978-3-16-110110-9', 'C++ book', 'test author 1', 3, 3, 16, 4, 0, 2, 2, 1, '2017-11-08', 6, ''),
('978-3-16-110119-1', 'Introduction To Algebra', 'Daitel and daitel', 6, 0, 287, 1, 1, 5, 2, 6, '2017-04-07', 4, ''),
('978-3-16-110119-6', 'GOT Book', 'GOT author', 3, 0, 5567, 2, 2, 3, 5, 2, '2018-03-08', 13, 'a.jpg'),
('978-3-16-308308-1', 'test title x', 'test author x', 0, 0, 125, 4, 1, 18, 6, 2, '2017-11-29', 0, ''),
('978-3-16-308398-2', 'asdf', 'asdf', 2, 0, 34, 6, 0, 6, 5, 6, '2018-02-27', 6, ''),
('978-4-16-110111-4', 'hj', 'hgj', 2, 0, 55, 3, 0, 3, 3, 3, '1996-01-12', 3, '111.jpg'),
('978-4-16-110111-9', 'test1', 'test1', 2, 0, 432, 4, 0, 5, 5, 5, '2018-01-29', 5, '1111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `bc_id` int(11) NOT NULL,
  `bc_name` text NOT NULL,
  `bc_department` text NOT NULL,
  `bc_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`bc_id`, `bc_name`, `bc_department`, `bc_description`) VALUES
(3, 'Law book', 'LAW', 'sample description here'),
(4, 'Mathematics', 'Engineering', 'sample description here about Math'),
(5, 'Chemistery', 'Pharmacy ', 'sample description here about pharmacy'),
(6, 'English grammer', 'Literature ', 'sample description here about literature '),
(7, 'URDU', 'Latrature', 'discription'),
(8, 'Physics', 'Physics', 'discription'),
(9, 'Biology', 'Medican', 'discription'),
(10, 'Medicen', 'health sciences', 'dummy description'),
(11, 'Islamic Studies', 'Social sciences ', 'dummy description'),
(13, 'Arts', 'Arts and Literature', 'dummy description'),
(14, 'Social Science', 'Arts and Literature', 'dummy description'),
(15, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book_publisher`
--

CREATE TABLE `book_publisher` (
  `bp_id` int(11) NOT NULL,
  `bp_name` text NOT NULL,
  `bp_contact` text NOT NULL,
  `bp_email` text NOT NULL,
  `bp_country` text NOT NULL,
  `bp_postal_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_publisher`
--

INSERT INTO `book_publisher` (`bp_id`, `bp_name`, `bp_contact`, `bp_email`, `bp_country`, `bp_postal_code`) VALUES
(2, 'test', 'test', 'test@gmail.com', 'test', 'test'),
(3, 'Pearson', '+923086773308', 'pearson@info.com', 'United state of America', '00332'),
(4, 'Ghazali Publisher', '+923086773308', 'ghazali@info.com', 'Pakistan', '+092'),
(5, 'A-ONE publisher', '+923086773308', 'aone@info.com', 'Pakistan', '01234'),
(6, 'Iqbal publisher', '+923086773308', 'iqbal@info.com', 'Pakistan', '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

CREATE TABLE `borrow_book` (
  `bb_id` int(11) NOT NULL,
  `b_isbn` text NOT NULL,
  `s_cnic` text NOT NULL,
  `bb_date_issued` date NOT NULL,
  `bb_date_returned` date NOT NULL,
  `bb_fine_status` varchar(6) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_book`
--

INSERT INTO `borrow_book` (`bb_id`, `b_isbn`, `s_cnic`, `bb_date_issued`, `bb_date_returned`, `bb_fine_status`) VALUES
(123, '978-3-16-110110-2', '14525-8596324-8', '2018-03-04', '2018-03-05', 'paid'),
(129, '978-3-16-110110-2', '52416-9645857-9', '2018-03-15', '2018-03-27', 'unpaid'),
(130, '978-3-16-110110-2', '78965-3697415-5', '2018-03-15', '2018-03-27', 'unpaid'),
(131, '978-3-16-110110-2', '78965-3697415-5', '2018-03-15', '2018-03-27', 'unpaid'),
(132, '978-3-16-110119-6', '14525-8596324-8', '2018-03-29', '2018-04-10', 'paid'),
(133, '978-3-16-110119-6', '52416-9645857-9', '2018-03-29', '2018-04-10', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_name`, `user_pass`) VALUES
(1, 'umer', '123'),
(2, 'usman', '123'),
(3, 'Farooq', '123');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_cnic` text NOT NULL,
  `s_first_name` text NOT NULL,
  `s_last_name` text NOT NULL,
  `s_address` text NOT NULL,
  `s_city` text NOT NULL,
  `s_postal_code` text NOT NULL,
  `s_email` text NOT NULL,
  `s_pass` varchar(50) NOT NULL,
  `s_cell1` text NOT NULL,
  `s_cell2` text NOT NULL,
  `s_department` text NOT NULL,
  `s_gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_cnic`, `s_first_name`, `s_last_name`, `s_address`, `s_city`, `s_postal_code`, `s_email`, `s_pass`, `s_cell1`, `s_cell2`, `s_department`, `s_gender`) VALUES
('14525-8596324-8', 'Fahad', 'Altaf', 'Canal Gardens, Lahore', 'Lahore', '57400', 'a@b.com', '123', '0308-6773308', '', 'Arts', 'male'),
('52416-9645857-9', 'Usman', 'Farooq', 'KALOYA. Toba Tek Singh', 'TOBA', '3214', 'usman@example.com', '789', '0308-6773308', '', 'CS', 'male'),
('78965-3697415-5', 'UMER', 'FAROOQ', 'Kaloya', 'Lahore', '74125', 'umer93379@gmail.com', '123', '0308-6773308', '', 'Computerscience', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`b_isbn`(17));

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`bc_id`);

--
-- Indexes for table `book_publisher`
--
ALTER TABLE `book_publisher`
  ADD PRIMARY KEY (`bp_id`);

--
-- Indexes for table `borrow_book`
--
ALTER TABLE `borrow_book`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_cnic`(15));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `bc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `book_publisher`
--
ALTER TABLE `book_publisher`
  MODIFY `bp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrow_book`
--
ALTER TABLE `borrow_book`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
