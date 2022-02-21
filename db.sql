-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 10:36 AM
-- Server version: 8.0.16
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_tasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `message`, `status`) VALUES
(1, 'dfg', 'dfgfdg@adasd.com', 'asdsad', 0),
(2, 'ttt', 'sdf@asd.com', 'asasdsad', 0),
(3, 'sdfdsf', 'asdsad@asd.com', 'asdasd', 0),
(4, 'fdgdfg', 'sasd@asddsa.com', 'sfkjsd hksdfh jksd', 0),
(5, 'sdfsdf', 'cvbcvaasd@asda.com', 'sdasd', 0),
(6, 'dfgfd', 'dfgfdg@asds.com', 'sdfsdf', 0),
(7, 'babken', 'babken@sadsad.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus vulputate leo in tincidunt. In eget molestie augue. Morbi a convallis metus, sed scelerisque felis. Integer nec maximus purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed ex posuere, facilisis est ornare, ultricies libero. Vestibulum hendrerit, lectus at semper gravida, urna massa ultrices neque, eu varius nisl lorem fermentum dui. In pharetra ex vitae sollicitudin placerat.\r\n\r\nFusce egestas vestibulum massa, quis vestibulum est. Nullam a enim laoreet, consectetur mauris in, fringilla tortor. Sed blandit dignissim purus, eu volutpat diam sollicitudin suscipit. Etiam vehicula libero non ultricies placerat. Proin eu mauris eu nunc blandit dapibus. In auctor risus justo, ut scelerisque lectus fringilla non. Nulla sed elementum nunc. Maecenas volutpat euismod mi vitae pellentesque. Mauris aliquet mollis lacus, a pulvinar risus pulvinar eu. Aliquam porttitor interdum mi sit amet tristique. Sed dictum ipsum lacus, id imperdiet dui tincidunt et.\r\n\r\nPhasellus semper magna velit, rhoncus sodales lorem tempus at. Ut dignissim odio ac mi congue, at accumsan orci commodo. Nunc nec ornare risus. Mauris auctor urna nec sollicitudin auctor. Sed sodales ipsum vel malesuada convallis. Maecenas et purus eget ante ullamcorper commodo sit amet in leo. Praesent vehicula suscipit faucibus. Sed scelerisque sodales diam, quis tempor augue suscipit et. Praesent ut ornare odio. Donec malesuada nulla non laoreet accumsan. Maecenas mollis, eros ac mollis ornare, orci lorem varius sem, vel iaculis mauris sapien eget augue. Donec elementum tellus nunc, ut elementum', 0),
(8, 'sdfdsf', 'sdasd@asdad.asd', 'asdasd', 0),
(9, 'ssss', 'sdfsdf@asd.com', 'barev dzezik\'xxx', 0),
(10, 'ssss', 'sdfsdf@asd.com', 'barev dzezik\'xxx', 0),
(11, 'sdfsd', 'sdfsdf@asds.com', 'alert(1)', 0),
(12, 'asdasd', 'asd@asd.dcom', 'asdsad', 0),
(13, 'dsfsdf', 'sdfd@asd.cas', 'sfsdfdsf', 1),
(14, 'dfgfd', 'sdfds@asd.casd', 'sdsadasd', 1),
(15, 'dsf', 'dfgfd@asdasd.fh', 'babken', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
