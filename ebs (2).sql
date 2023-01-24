-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221120.420485a41b
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 03:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebs`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(250) NOT NULL,
  `category` varchar(10) NOT NULL,
  `headline` varchar(1000) NOT NULL,
  `subtext` varchar(3000) NOT NULL,
  `detailed` varchar(9000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category`, `headline`, `subtext`, `detailed`, `date`, `image`) VALUES
(17, 'sports', 'Football World Cup: The Scottish secret behind Brazilian Jogo Bonito', 'Scottish tacticians are credited with introducing the fluent passing game first to England, then Brazil followed by rest of the world', 'It’s said that one can really understand football only when looked through Brazil’s eyes. Not many know, though, that the Brazilian vision is Scottish in origin. Not just the introduction of the game and organising the early matches but the playing style itself. In fact, football, as we know it today, owes gurudakshina to Scotland for it was the Scottish who invented and introduced the ‘passing style’ in football. Arguably, it was England who found the game but their style was a spillover from Rugby in many ways; a scrummage of sorts, kick and run, long-balls, but an early proto-type of tiki-taka was Scottish’s influence. Pass the ball, the to-and-fro’s, the wing-game and so on and so forth. “What’s that song? The cup is coming home, eh? Then it should come to Glasgow to Queens Park in particular,” John Litster, football historian and an editor of a football magazine, laughs. “Scotland should be football’s real home as the game, as we know it today, comes from here,” Litster tells The Indian Express.', '2022-11-18', 'IMG-637b94d1683696.87302590.jpg'),
(18, 'sports', 'Deadline Over, Women Footballers Wait For Fair Play As Government Swings Into Action', 'The AFC Womens Club Championship starts on Saturday. The schedule says that Indias matches have been cancelled, but the club from India, Gokulam Kerala FC is still hoping for a turnaround as the centre has now got involved and is negotiating with FIFA to let the girls play', 'This tournament is a dream for us, we have prepared for almost a year,says Michelle from Tashkent.\r\n\r\nMansa echoes her sentiment and adds, This is not just for us but for the future generation as well. We want to gift them something special.\"\r\n\r\nAs the cloud of uncertainty hangs over 23 girls on their team, they are even more determined for a good show if given a chance.\r\n\r\nIn their group are Jordan and Iran. With the FIFA ban on India, Sree Gokulam FCs matches have been cancelled in the schedule.\r\n\r\nTheir CEO, Dr B Ashok Kumar told NDTV, \"No deadline was communicated to us. Why should they give is a deadline of 48 hours when our first match against Iran is on 23rd? Ever since we landed here, they have been asking us when are you returning, but we are not here to return. We wont return without the title\"', '2022-11-18', 'IMG-6377b3cc6d7621.62114161.jpg'),
(19, 'tech', 'Friday’s tech news live: All eyes on Twitter (again)', 'Its November 18th, 2022 and at least Meis back in Overwatch 2', 'Its usually not a good sign when everyone on Twitter is talking about the same thing, least of all when that thing is Twitter itself. Today the story on everyones lips tweets is that a lot of Twitters remaining employees have left the company after Elon Musks Thursday night ultimatum expired, which demanded that employees work “long hours at high intensity” or GTFO.\r\n\r\nWell GTFO is exactly what hundreds of Twitters remaining employees are doing. Now the question is exactly how small the companys workforce can get before its fundamentally unable to keep the service operational.\r\n\r\nContinuing on the theme of tech layoffs, Roku is saying goodbye to 200 US employees (a shame given it should be riding high on the success of its best original film to date), and Amazon expects to lay off more employees next year after reports emerged that it plans to axe as many as 10,000 roles this week.\r\n\r\nAnd pull on your mittens everyone, because everyones favorite ice queen is heading back to Overwatch 2. Mei was removed from the game late last month thanks to a glitch with her trademark ice wall ability that was allowing players to access “unintended locations.”', '2022-11-18', 'IMG-6377b5d8dbd8f1.43275482.jpg'),
(20, 'tech', '100 startups registered with ISRO to work in space tech domains, says Chairman', 'Chairman of the Indian Space Research Organisation (ISRO), S. Somanath said that about 100 startups have registered with the space agency and are working closely in various domains.', 'Addressing a plenary session at the Bengaluru Tech Summit 2022 on R&D of India: Innovation for Global Impact, he said that the ISRO has signed MoUs with companies to work closely which include hand holding in space technology and building processes from start to finish.Somanath said a significant number of companies have the potential to become big players in the space sector and ISRO is playing the role of facilitator and helping in building technologies, adding that out of the 100 startups at least 10 of them are working on developing satellites and rockets.', '2022-11-18', 'IMG-6377b69a893820.77758275.jpg'),
(21, 'business', 'South Indian Bank launches kids savings account', 'The South Indian Bank has announced the launch of kids saving account to inculcate savings habit among the children.', 'The Gen Z and millennials these days are very smart and conscious on their ambitions and studies. With Gen Next savings account, parents can accumulate the corpus for their kids future and aspirations.\r\n\r\nSIB Gen Next Kids savings account enables parents to save for their kids starting from day 1 to till 18 years. The account comes with a host of features enabling parents to motivate their children to create a pool of savings for a secure future. SIB Gen Next Kids saving account can be linked to parents account and enable auto debits to ensure hassle-free investments in building the future corpus.\r\n\r\nThomas Joseph K, Executive Vice President & Group Business Head, South Indian Bank said, “India has the youngest population and we strongly feel that kids should be aware about financial savings and discipline in an early stage. This will help them get accustomed to the habit of savings and spending wisely.\r\n\r\nSIB Gen Next account will prove a valuable tool to enable parents to cultivate a habit of their kids saving securely and conveniently.', '2022-11-18', 'IMG-6377b741e8f1d2.47023622.jpg'),
(22, 'business', 'Apollo Tyres Oragadam factory near Chennai receives the Deming Prize', 'The Deming Prize was bestowed upon Apollo Tyres plant for achieving outstanding performance by practising Total Quality Management', 'Leading tyre maker Apollo Tyres said its factory at Oragadam near Chennai was awarded the coveted Deming Prize, which is considered to be a gold standard of quality.\r\n\r\nThe Deming Prizewas bestowed upon Apollo Tyres Chennai Plant, among the largest manufacturing facilities in Asia, for achieving outstanding performance by practising Total Quality Management (TQM), utilising statistical concepts and methodologies based on the companys excellent business philosophy and leadership, said a statement.In keeping with our resolve towards customer centricity and business excellence, we committed to the TQM journey more than a decade ago. The Deming Prize is a testimony of our relentless effort and ability to deliver the best in terms of quality and experience to our customers,” said Satish Sharma, President, Asia Pacific, Middle East and Africa (APMEA), Apollo Tyres Ltd.\r\n\r\nHighly automated and equipped with advanced manufacturing practices, Apollo Tyres Chennai Plant is servicing multiple Indian and global OEMs. Built over 128 acre-site, the factory can produce about 850 tonnes of tyres per day. This plant has seen an investment of ₹5,000 crore to date and produces high-end radial tyres for passenger cars and commercial vehicles.', '2022-11-18', 'IMG-6377b7c11a2759.48822211.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `concern` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `concern`, `message`) VALUES
(1, 'bibhu', 'bibhu@gmail.com', 'Help', 'xyz'),
(2, 'adi', 'adi@gmail.com', 'are u?', 'How are u?'),
(3, 'adi', 'adi@gmail.co', 'dghjjhjkjk', 'csadfwqrege');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `house` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pin` int(6) NOT NULL,
  `subscriber` varchar(10) NOT NULL DEFAULT 'nsubscribe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `number`, `house`, `street`, `city`, `state`, `pin`, `subscriber`) VALUES
(1, 'bibhu', 'bibhu@gmail.com', 'a78aa2a72d6339bd8ab0a1c57e041457', '2589654125', '87/96', 'patia', 'BBSR', 'Odisha', 752044, 'nsubscribe'),
(8, 'sports', 'sports@gmail.com', 'sports', '', '', '', '', '', 0, 'sports'),
(9, 'tech', 'tech@gmail.com', 'tech', '', '', '', '', '', 0, 'tech'),
(10, 'business', 'business@gmail.com', 'business', '', '', '', '', '', 0, 'business'),
(11, 'Alex', 'gold@gmail.com', 'golden', '9865785412', '21/85', 'Rajori', 'New Delhi', 'Delhi', 110018, 'all'),
(12, 'Dev', 'dev@gmail.com', 'dev', '9865785415', '87/96', 'Kirtinagar', 'New Delhi', 'Delhi', 110025, 'all'),
(13, 'chetan', 'chetan@gmail.com', 'chetan', '', '', '', '', '', 0, 'nsubscribe'),
(14, 'vanshu', 'vanshu@gmail.com', '9369b50970321aaac60d4b2c76a7ce52', '', '', '', '', '', 0, 'nsubscribe'),
(20, 'bvicam', 'bvicam@gmail.com', '30a635c281ef25a35ec510d788743ee2', '1254789654', '54/85', 'GHYU', 'Delhi', 'Delhi', 125487, 'sports'),
(21, 'shivam', 'shivam@gmail.com', '3ae9d8799d1bb5e201e5704293bb54ef', '', '', '', '', '', 0, 'sports'),
(22, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', '', 0, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
