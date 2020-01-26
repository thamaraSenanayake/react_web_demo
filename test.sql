-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2020 at 03:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`` PROCEDURE `AddGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64), `t_srid` INT)  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' ADD ', geometry_column,' GEOMETRY REF_SYSTEM_ID=', t_srid); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

CREATE DEFINER=`` PROCEDURE `DropGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64))  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' DROP ', geometry_column); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `planCreate` tinyint(1) NOT NULL,
  `planEdit` tinyint(1) NOT NULL,
  `planDelete` tinyint(1) NOT NULL,
  `postCreate` tinyint(1) NOT NULL,
  `postEdit` tinyint(1) NOT NULL,
  `postDelete` tinyint(1) NOT NULL,
  `CommunityCreate` tinyint(1) NOT NULL,
  `CommunityEdit` tinyint(1) NOT NULL,
  `CommunityDelete` tinyint(1) NOT NULL,
  `StoreCreate` tinyint(1) NOT NULL,
  `StoreEdit` tinyint(1) NOT NULL,
  `StoreDelete` tinyint(1) NOT NULL,
  `userName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`, `id`, `role`, `create_date`, `status`, `planCreate`, `planEdit`, `planDelete`, `postCreate`, `postEdit`, `postDelete`, `CommunityCreate`, `CommunityEdit`, `CommunityDelete`, `StoreCreate`, `StoreEdit`, `StoreDelete`, `userName`) VALUES
('gre', 'reg', '123', '123', 1, 'admin', '2020-01-25 18:51:21', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 'two'),
('xyz', 'sdf', 'dvsd', 'sdcds', 2, 'admin', '2020-01-25 18:51:21', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'three'),
('sdf', 'sdf', 'rger', 'reger', 3, 'admin', '2020-01-25 18:51:21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'one'),
('fjfg', 'dfgd', 'rgr', 'erger', 4, 'admin', '2020-01-25 18:51:21', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'four'),
('wef', 'wefwe', 'wewf', '123', 5, '', '2020-01-26 09:39:19', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'five'),
('wegwe', 'wegw', 'weg', '123', 6, 'Merchant', '2020-01-26 09:41:53', 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 'six'),
('sdv', 'sdsd', 'sdv', '123', 7, 'Admin', '2020-01-26 09:45:41', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'seven'),
('dfg', 'dfg', 'dfg', '123', 8, 'Admin', '2020-01-26 09:47:01', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'eight'),
('sdv', 'sdv', 'sdvwef', '123', 9, 'Admin', '2020-01-26 09:48:23', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ten'),
('new', 'new', 'new', '123', 10, '', '2020-01-26 13:48:12', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
('new', 'new', 'new1', '123', 11, '', '2020-01-26 13:49:14', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
