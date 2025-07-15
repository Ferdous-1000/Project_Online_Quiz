-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correct_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`) VALUES
(1, 1, 'Which data structure follows the LIFO principle?', 'Queue', 'Array', 'Stack', 'Linked List', 3),
(2, 1, 'What is the time complexity of accessing an element in an array?', 'O(1)', 'O(n)', 'O(log n)', 'O(n²)', 1),
(3, 1, 'Which data structure uses FIFO principle?', 'Stack', 'Queue', 'Tree', 'Graph', 2),
(4, 1, 'What is the maximum number of children in a binary tree node?', '1', '2', '3', 'Unlimited', 2),
(5, 1, 'Which searching algorithm requires the data to be sorted?', 'Linear Search', 'Binary Search', 'Depth First Search', 'Breadth First Search', 2),
(6, 1, 'Which data structure is used for implementing recursion?', 'Queue', 'Stack', 'Array', 'Tree', 2),
(7, 1, 'What is the time complexity of inserting at the end of a linked list?', 'O(1)', 'O(n)', 'O(log n)', 'O(n²)', 1),
(8, 1, 'Which of these is a non-linear data structure?', 'Array', 'Linked List', 'Tree', 'Stack', 3),
(9, 1, 'What data structure is used for undo functionality in text editors?', 'Queue', 'Stack', 'Array', 'Tree', 2),
(10, 1, 'Which algorithm uses divide and conquer approach?', 'Bubble Sort', 'Merge Sort', 'Selection Sort', 'Insertion Sort', 2),
(11, 2, 'What is the time complexity of linear search?', 'O(1)', 'O(log n)', 'O(n)', 'O(n²)', 3),
(12, 2, 'Which sorting algorithm has the worst-case time complexity of O(n²)?', 'Merge Sort', 'Quick Sort', 'Bubble Sort', 'Heap Sort', 3),
(13, 2, 'What data structure uses FIFO (First-In-First-Out) principle?', 'Stack', 'Queue', 'Tree', 'Graph', 2),
(14, 2, 'Which algorithm uses divide and conquer approach?', 'Bubble Sort', 'Binary Search', 'Linear Search', 'Selection Sort', 2),
(15, 2, 'What is the best data structure for checking balanced parentheses?', 'Queue', 'Stack', 'Array', 'Linked List', 2),
(16, 2, 'Which searching algorithm requires the data to be sorted first?', 'Linear Search', 'Binary Search', 'Depth-First Search', 'Breadth-First Search', 2),
(17, 2, 'What is the time complexity of accessing an element in an array by index?', 'O(1)', 'O(n)', 'O(log n)', 'O(n log n)', 1),
(18, 2, 'Which algorithm always gives the shortest path in an unweighted graph?', 'Depth-First Search', 'Breadth-First Search', 'Dijkstra\'s Algorithm', 'Binary Search', 2),
(19, 2, 'What is the space complexity of a recursive Fibonacci algorithm without memoization?', 'O(1)', 'O(n)', 'O(log n)', 'O(2ⁿ)', 4),
(20, 2, 'Which data structure uses LIFO (Last-In-First-Out) principle?', 'Queue', 'Stack', 'Heap', 'Tree', 2),
(31, 3, 'What does HTML stand for?', 'Hyper Text Markup Language', 'High Tech Modern Language', 'Hyperlinks and Text Markup Language', 'Home Tool Markup Language', 1),
(34, 3, 'Which CSS property is used to change the text color?', 'font-color', 'text-color', 'color', 'text-style', 3),
(35, 3, 'How do you select an element with the id \"header\" in CSS?', '.header', '#header', '*header', 'header', 2),
(36, 3, 'Which CSS property is used to add space between elements?', 'margin', 'padding', 'border', 'spacing', 1),
(37, 3, 'What does PHP stand for?', 'Personal Home Page', 'Preprocessed Hypertext Processor', 'PHP: Hypertext Preprocessor', 'Private Hosting Protocol', 3),
(38, 3, 'Which PHP function is used to output text?', 'print()', 'echo()', 'output()', 'display()', 2),
(39, 3, 'How do you start a session in PHP?', 'session_start()', 'start_session()', 'init_session()', 'create_session()', 1),
(40, 3, 'Which superglobal variable holds POST data in PHP?', '$_GET', '$_POST', '$_REQUEST', '$_DATA', 2),
(41, 3, 'Which method adds an element to the end of an array?', '.push()', '.pop()', '.shift()', '.add()', 1),
(42, 3, 'What will 5 + \"5\" return in JavaScript?', '10', '55', 'Error', '5', 2),
(43, 4, 'Which of these is the correct way to declare a variable in C++?', 'int x = 5;', 'x = 5 int;', 'variable x = 5;', 'Integer x = 5;', 1),
(44, 4, 'What is the output of: cout << 5 + 3;', '53', '8', '35', 'Error', 2),
(46, 4, 'What does the \"++\" operator do?', 'Adds 2', 'Multiplies by 1', 'Increments by 1', 'Concatenates', 3),
(47, 4, 'Which loop executes at least once?', 'for', 'while', 'do-while', 'foreach', 3),
(48, 4, 'What is the size of int data type typically?', '1 byte', '2 bytes', '4 bytes', '8 bytes', 3),
(49, 4, 'Which symbol is used for single-line comments?', '//', '/*', '#', '--', 1),
(50, 4, 'What is the correct way to allocate memory dynamically?', 'new int', 'malloc int', 'allocate int', 'create int', 1),
(51, 4, 'Which keyword makes a variable unmodifiable?', 'static', 'final', 'const', 'fixed', 3),
(52, 4, 'What is the default access specifier in a class?', 'public', 'private', 'protected', 'package', 2),
(53, 4, 'Which of these is NOT a valid C++ data type?', 'float', 'bool', 'string', 'real', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `subject`, `type`, `marks`, `time`) VALUES
(1, 'Data Structure', 'MCQ', 10, 10),
(2, 'Algorithm', 'MCQ', 10, 10),
(3, 'Web Technologies', 'MCQ', 10, 10),
(4, 'C++', 'MCQ', 50, 30);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `taken_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `username`, `quiz_id`, `score`, `taken_at`) VALUES
(3, 'Ferdous100', 1, 0, '2025-06-25 06:20:49'),
(4, 'Ferdous100', 2, 0, '2025-06-25 06:21:23'),
(5, 'Ferdous100', 1, 0, '2025-06-25 06:26:41'),
(6, 'Ferdous100', 1, 0, '2025-06-25 06:30:33'),
(7, 'mehidi100', 2, 0, '2025-06-25 06:50:56'),
(8, 'mehidi100', 3, 0, '2025-06-25 07:06:02'),
(9, 'mehidi100', 1, 1, '2025-06-25 07:12:00'),
(14, 'Joba001', 1, 0, '2025-06-25 08:36:00'),
(15, 'Oli123', 1, 5, '2025-06-25 09:49:38'),
(16, 'Oli123', 1, 7, '2025-06-26 07:31:41'),
(18, 'Oli123', 3, 8, '2025-06-27 13:31:32'),
(20, 'Oli123', 3, 8, '2025-06-29 06:16:41'),
(22, 'Oli123', 2, 9, '2025-06-29 08:43:32'),
(23, 'Oli123', 1, 0, '2025-06-29 10:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `password`) VALUES
(1, 'Rahim', 'AAA123456'),
(2, 'Karim', 'AAA11223344');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `gender`, `username`, `password`) VALUES
(1, 'Oli Ahamed', 'ferdousahmedsagor@gmail.com', 'mirpur', 'Male', 'Oli123', '123456'),
(2, 'Ali', 'ali@gmail.com', 'Dhaka', 'Male', 'Ali001', '112233'),
(3, 'joy', 'joy@gmail.com', 'mirpur', 'Male', 'joy22', '11223344'),
(5, 'joy mia', 'joymia@gmail.com', 'mirpur', 'Male', 'joy2211', '2211'),
(6, 'mm', 'rtt@grgt.ggg', 'kkk', 'Female', 'mm22', '121212'),
(7, 'Mim', 'mim@gmail.com', 'Dhaka', 'Female', 'mim1234', '112233'),
(8, 'joy', 'joy12@gmail.com', 'Savar', 'Male', 'joyjoy', '11223344'),
(9, 'Ferdous Ahmed', 'ferdousahmedsagor@gmail.com', 'Rangpur,Bangladesh', 'Male', 'Ferdous100', 'F1234567'),
(10, 'Mehedi', 'mehidi@gmail.com', 'Basundhara R/A,Dhaka', 'Male', 'mehidi100', 'M1111111'),
(11, 'Joba', 'joba@yahoo.com', 'Rangpur,Bangladesh', 'Female', 'Joba001', 'J1234567'),
(20, 'oli', '22-47549-2@student.aiub.edu', 'l;lll', 'Other', 'mehidi100', '1111111m'),
(21, 'oli', '22-47549-2@student.aiub.edu', 'l;lll', 'Other', 'mehidi100', '1111111m'),
(22, 'Oli Ahamed', '22-47549-2@student.aiub.edu', 'dhake', 'Male', 'Oli123', '11223344a'),
(23, 'Oli Ahamed', '22-47549-2@student.aiub.edu', 'dhaka', 'Male', 'Oli123', '1234567l'),
(24, 'First', 'kk@gmail.com', 'pp', 'Other', 'll', '1234567l'),
(25, 'oli', 'rtt@grgt.ggg', 'sdsd', 'Male', '123oli', '11223344a'),
(26, 'Mehidi Hasan', 'hasan@gmail.com', 'Dhaka', 'Male', 'hasan777', 'A7777777');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
