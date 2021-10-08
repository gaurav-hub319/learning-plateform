-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2021 at 06:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anu`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` bigint(20) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `quize_created` tinyint(1) NOT NULL,
  `passing_mark` int(11) NOT NULL,
  `quiz_time` varchar(255) NOT NULL,
  `quiz_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `quize_created`, `passing_mark`, `quiz_time`, `quiz_file`) VALUES
(36, 'english', 1, 20, '', 'english.php'),
(37, 'hindi', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `question_tag`
--

CREATE TABLE `question_tag` (
  `option_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `q_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_tag`
--

INSERT INTO `question_tag` (`option_id`, `question_id`, `course_id`, `q_option`) VALUES
(122, 93, 0, 'a3'),
(123, 93, 0, 'a3'),
(124, 93, 0, 'a4'),
(125, 94, 0, 'c1'),
(126, 94, 0, 'c6'),
(127, 94, 0, 'c4'),
(128, 94, 0, 'c5'),
(129, 95, 0, 'a1'),
(130, 95, 0, 'a2'),
(131, 95, 0, 'a3'),
(132, 95, 0, 'a4'),
(133, 96, 0, 'b1'),
(134, 96, 0, 'b2'),
(135, 96, 0, 'b3'),
(136, 96, 0, 'b4');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answer`
--

CREATE TABLE `quiz_answer` (
  `answer_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_answer`
--

INSERT INTO `quiz_answer` (`answer_id`, `question_id`, `course_id`, `answer`) VALUES
(63, 100, 0, 'a'),
(64, 101, 0, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `question_id` bigint(20) NOT NULL,
  `question_name` longtext NOT NULL,
  `points` int(11) NOT NULL,
  `c_id` bigint(20) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `op_one` varchar(255) NOT NULL,
  `op_two` varchar(255) NOT NULL,
  `op_three` varchar(255) NOT NULL,
  `op_four` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`question_id`, `question_name`, `points`, `c_id`, `tag`, `op_one`, `op_two`, `op_three`, `op_four`) VALUES
(100, 'question 1', 5, 36, 'dfghjkl', 'a1', 'a2', 'a3', 'a4'),
(101, 'question 2', 5, 36, 'sdfghjk', 'b1', 'b2', 'b3', 'b4');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `email`, `password`, `name`) VALUES
(1, 'student@gmail.com', 'student', 'student'),
(2, 'raj@gmail.com', '$2y$10$gZssXvUN8vlB2sQEE8g8Le7W1oTRSqC7p9ZEIn4.DhiepHm4Y17GW', 'english');

-- --------------------------------------------------------

--
-- Table structure for table `submit_answer`
--

CREATE TABLE `submit_answer` (
  `submit_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `course_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `email`, `password`, `name`) VALUES
(1, 'teacher@gmail.com', 'teacher', 'teacher'),
(2, 'teacher1@gmail.com', '$2y$10$6FX4/tA7hC/BlRLc4uj46eJS3tsh0IhJgVrzPe0q9hx6DGfaYyz/G', 'teacher1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `question_tag`
--
ALTER TABLE `question_tag`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `quiz_answer`
--
ALTER TABLE `quiz_answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `submit_answer`
--
ALTER TABLE `submit_answer`
  ADD PRIMARY KEY (`submit_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `question_tag`
--
ALTER TABLE `question_tag`
  MODIFY `option_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `quiz_answer`
--
ALTER TABLE `quiz_answer`
  MODIFY `answer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `question_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submit_answer`
--
ALTER TABLE `submit_answer`
  MODIFY `submit_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
