-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2018 at 07:35 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_tour`
--

CREATE TABLE `add_tour` (
  `id` int(11) NOT NULL,
  `source` varchar(100) NOT NULL,
  `dest` varchar(100) NOT NULL,
  `package` varchar(50) NOT NULL,
  `tourbus` varchar(100) NOT NULL,
  `touramount` varchar(100) NOT NULL,
  `tourimage` varchar(100) NOT NULL,
  `tra_time` varchar(30) NOT NULL,
  `rdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_tour`
--

INSERT INTO `add_tour` (`id`, `source`, `dest`, `package`, `tourbus`, `touramount`, `tourimage`, `tra_time`, `rdate`) VALUES
(1, 'Trichy', 'Madurai', 'Economic Package', 'Valvo', '3000', 'Desert.jpg', '10.00am', '2018-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book_tour`
--

CREATE TABLE `book_tour` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tour_id` varchar(100) NOT NULL,
  `person` varchar(100) NOT NULL,
  `seatno` varchar(100) NOT NULL,
  `age` varchar(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `rdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_tour`
--

INSERT INTO `book_tour` (`id`, `username`, `tour_id`, `person`, `seatno`, `age`, `amount`, `day`, `month`, `year`, `status`, `rdate`) VALUES
(1, 'arts@rndcenter.co.in', '1', 'Rajesh', '1', '23', '3000', '11', '04', '2018', 1, '2018-04-11'),
(2, 'arts@rndcenter.co.in', '1', 'kannan', '2W', '23', '3000', '11', '04', '2018', 1, '2018-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_booking`
--

CREATE TABLE `hotel_booking` (
  `id` int(11) NOT NULL,
  `book_id` varchar(20) NOT NULL,
  `hid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `in_date` varchar(20) NOT NULL,
  `out_date` varchar(20) NOT NULL,
  `no_days` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `persons` int(11) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `rate` varchar(30) NOT NULL,
  `enquiry` varchar(200) NOT NULL,
  `tot_amt` double NOT NULL,
  `bank` varchar(50) NOT NULL,
  `acct` varchar(20) NOT NULL,
  `scode` varchar(20) NOT NULL,
  `rdate` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `rtime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_booking`
--

INSERT INTO `hotel_booking` (`id`, `book_id`, `hid`, `uname`, `in_date`, `out_date`, `no_days`, `rooms`, `persons`, `room_type`, `rate`, `enquiry`, `tot_amt`, `bank`, `acct`, `scode`, `rdate`, `status`, `rtime`) VALUES
(1, '1001', 5, 'raja', '03-03-2018', '06-03-2018', 4, 2, 4, 'Non-AC Large', '1500', 'ddff', 12000, 'Indian Bank', '2233445522', '1S5D91589', '27-02-2018', 2, '2018-03-09 12:24:47'),
(2, '1002', 6, 'raj', '20-03-2018', '23-03-2018', 4, 3, 3, 'Non-AC Medium', '1000', 'sdfhgfjhdghjkcvbnfgvjgfj', 12000, 'Canara Bank', '123456', '2S6D54478', '18-03-2018', 2, '2018-04-02 14:10:47'),
(3, '1003', 6, 'kannan', '20-03-2018', '23-03-2018', 4, 3, 3, 'Non-AC Small', '500', 'ghdrtyh', 6000, 'United Bank of India', '123456', '3S6D51712', '18-03-2018', 2, '2018-04-02 14:07:07'),
(4, '1004', 7, 'kannan', '03-04-2018', '05-04-2018', 3, 3, 3, 'Non-AC Medium', '1000', 'dvfdvbgfdgbd', 9000, 'Vijaya Bank', '123456', '4S7D88351', '02-04-2018', 2, '2018-04-09 16:19:54'),
(5, '1005', 6, 'kannan', '10-04-2018', '12-04-2018', 3, 2, 3, 'Non-AC Small', '500', 'Trichy', 3000, 'Indian Bank', '123456', '5S6D63247', '09-04-2018', 0, '2018-04-09 16:26:57'),
(9, '1009', 1, 'arts@rndcenter.co.in', '20-04-2018', '23-04-2018', 4, 3, 3, 'AC Large', '3000', 'efvgrgvr', 36000, 'Indian Bank', '123456', '9S1D99653', '11-04-2018', 0, '2018-04-11 12:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `service_det`
--

CREATE TABLE `service_det` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `service` varchar(30) NOT NULL,
  `package` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `url_link` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cost1` int(11) NOT NULL,
  `cost2` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `star1` int(11) NOT NULL,
  `star2` int(11) NOT NULL,
  `star3` int(11) NOT NULL,
  `star4` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_det`
--

INSERT INTO `service_det` (`id`, `category`, `service`, `package`, `location`, `url_link`, `description`, `cost1`, `cost2`, `fname`, `star1`, `star2`, `star3`, `star4`, `rating`) VALUES
(1, 'Hotel', 'MRD', 'Economic Package', 'trichy', 'http://http://MRD.com', 'gxvnfh hm', 400, 900, 'P1P8P5femina.jpg', 0, 0, 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `service_review`
--

CREATE TABLE `service_review` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `fake_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_review`
--

INSERT INTO `service_review` (`id`, `sid`, `bookid`, `review`, `fake_st`) VALUES
(1, 6, 0, 'good', 0),
(2, 1, 0, 'thtrt', 0),
(7, 1, 9, 'iukliu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

CREATE TABLE `tourist` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `timing` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourist`
--

INSERT INTO `tourist` (`id`, `name`, `timing`, `content`, `image`, `date`) VALUES
(2, 'Gandhi Statue', 'No time limit ', 'The 1.5 km long promenade running along the beach is the pride of Pondicherry. Most of the \r\nlandmarks are on the sea front : the statues of Mahatma Gandhi, Jeanne dÃ¢â‚¬â„¢Arc, Dupleix, the \r\nelegant War memorial raised by the French, the heritage building Ã¢â‚¬Å“MairieÃ¢â‚¬Â, the 27 m tall old \r\nlighthouse, the circular shaped customs house & Gandhi Thidal. ', '775707_394520150642550_568582424_o.jpg', '2014-12-05'),
(3, 'AAYI MANDAPAM AND BHARATI PARK', '08:00 hrs to 20:00 hrs', 'The park facing the governorÃ¢â‚¬â„¢s bungalow reflects the French influence. Once called as Ã¢â‚¬Å“place du \r\npantheonÃ¢â‚¬Â now turned as Aayi mandapam - the emblem of the Pondicherry Government. The \r\npark surrounded by Aayi mandapam has been restructured by preserving its heritage.', 'BHARATIPARK 005.jpg', '2014-12-05'),
(4, 'The park facing the governorÃ¢â‚¬â„¢s bungalow reflects the French inf', '09:00 hrs to 17:00 hrs \r\n', 'Facilities for boating are available at the Boat House on the River Chunnambar, 8kms from \r\nPondicherry. The backwater and the lush greenery on both sides of Chunnambar provide an  ideal setting for boating. ', 'chunnambar-boat-house.jpg', '2014-12-05'),
(5, 'AUROVILLE', '10:00 hrs to 18:00 hrs \r\n', 'Auroville welcomes people from all parts of the world to live together and explore cultural, \r\neducational, scientific, spiritual, and other pursuits in accordance with the Auroville charter. Auroville information centre and Matri Mandir [Meditation hall with worldÃ¢â‚¬â„¢s biggest man-made crystal ball] are the places open to most of the visitors. It offers less to see and lots to  experience. ', '12249_0.jpg', '2014-12-05'),
(6, 'THE BOTANICAL GARDEN', '09:00 hrs to 12:45 hrs & 14:00 hrs to 17:45 hrs \r\n', 'The Botanical garden in Pondicherry was created in 1826, once called as Ã¢â‚¬Å“Colonial ParkÃ¢â‚¬Â. When \r\nthe garden came under the control of the eminent botanist perottet Ã¢â‚¬Å“rare and interesting \r\nplantsÃ¢â‚¬Â were procured from Calcutta, Madras, Ceylon and Reunion. Its collection numbers to \r\napprox.1500 species. \r\n', 'Botanical-Garden.jpg', '2014-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `tid` int(11) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `towner` varchar(100) NOT NULL,
  `taddress` varchar(100) NOT NULL,
  `tcontact` varchar(100) NOT NULL,
  `tbusno` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `rdate` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`tid`, `tname`, `towner`, `taddress`, `tcontact`, `tbusno`, `amount`, `rdate`, `status`) VALUES
(1, 'Redbus', 'Raja', '24j, Thiyagaraya Nagar,\r\nChennai - 600012.', '8785756', 'TN 01 7667', '15', '2014-12-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `account` varchar(20) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `rdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `gender`, `dob`, `address`, `username`, `password`, `contact`, `account`, `cardno`, `rdate`) VALUES
(1, 'Rajesh Kannan', 'Male', '05-05-1995', 'Nagalapuram', 'arts@rndcenter.co.in', '123', '9600721125', '12345678910', '', '2018-04-11');
