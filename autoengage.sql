-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 02:29 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoengage`
--

-- --------------------------------------------------------

--
-- Table structure for table `managedpages`
--

CREATE TABLE `managedpages` (
  `mpID` int(11) NOT NULL,
  `facebookID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebookPageID` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `access_token` text COLLATE utf8_unicode_ci,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `managedpages`
--

INSERT INTO `managedpages` (`mpID`, `facebookID`, `facebookPageID`, `permissions`, `access_token`, `created`, `modified`) VALUES
(1, '10213662225012522', '249927835495743', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBAOns27JdL67LUbiaV9M6KFkZBP93qp81kwMUAZAdOsdBtwDZCvkAhYZAJSZBD7v6WYwZAnC5sqhvZB23QXNWOFDaKfZBn92mTtLOZAta6raDx82iDzuiexnAm5ZBKZByBsWodP8ezWNcg9e2Ia3dCX5HGZAUe7mQ1fsPdffHw8QSfysE', '2017-07-19', '2017-07-19'),
(2, '10213662225012522', '1086915341366522', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBAPofbVQUylJYAz71F9BB5FqZAbI4wer6OHisjRjE95CsuTxFYXI7sZCqBQc8SU4By1XbKWZCSV07smOTCyuSu5VS2uRSRBMMZB9iqbZAsbZAMl3utuo6kHkr4ZCX6jhHU3W0YxJKZCtZCPdAghZC3G4NyxpDZCsTSDVCCjw24iGDORc', '2017-07-19', '2017-07-19'),
(3, '10213662225012522', '425243157676997', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBAK4p1TnMYnlswGjZAfdj9qBHRqJZCyZC7eRQt7E0jOIU6sXaGXfdKqyJDodxKVnHWyChViPip7VSSOxpOi4yV0Eg9fOrDZBw9hhBblWzZASRZAefjxXnaouXx9peteNjNMLLrNUmofejB1idqm8gxSmIZBORPIAEtWdDM9wxZCoL', '2017-07-19', '2017-07-19'),
(4, '10213662225012522', '1726384147588683', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBAGhhi4C0BBIu9ReanFHANrZCvzCH4nASi3Mf2tUHmmiPzOaRU0PRmE4ZBy7mDzTzaRlXKOfJI9Brufpq6Cs0xuUYo4kbFZBZBO5HlbZCtvZBzwuTYE4yUlRy82fUXBs9c4iqFGHKVyCUhxWKTz637oCX6jmprK85VLaRW1iAZCC', '2017-07-19', '2017-07-19'),
(5, '10213662225012522', '403143439869700', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBAFfWA9jFtVssYRAZCFKZBcZCtHh2DaZCmr2OkRVlP0bqMld9iWnLkkNdsudCSGGzdvVLD6mocpnCdguOFZCBdanMvZAQSPF0LK7yeMZCtXZBmUprjFEDoDUZAIMOUsrqy482Jt5jkH4lct3M4tr5dcaDVQe5en79IY2LQdhzH09E7', '2017-07-19', '2017-07-19'),
(6, '10213662225012522', '1936247153278467', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBANNoFLLVNMjkH3zq6AebhVgxHR6YJVb3d2ceZAyDPvin0Yrt0EWuiXpdf5A9spZBLaYrd67oVuvanuNYXfYGt31SKJZCgTLl4DmcBIx4UCDzHvTmGQLfaNC7oqU60WaSSunCoqAmljpNsSmBZBFuoDVbBpZCc3rQzrB253igp', '2017-07-19', '2017-07-19'),
(7, '10213662225012522', '2022979931262116', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBAKMoG9H0GmWbdDjW3zxZAKiSFtlchbjZCx7GaIxcZCZAewfOzpSS7EQitMUA4NYlTggNysuyf5iZBdsD5zLa08KLT6e34CShhLJjQcZCBK8IAc4xsMHRcZBLDTuQJWGhQVS1QdnNURsSSXAxZCOeGzcWQiQjWtLEc5CVsJeDpeYn', '2017-07-19', '2017-07-19'),
(8, '10213662225012522', '1614981005498863', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBANgL6a91dEJnJ8i4MDlr2dY84XzKZC8KGjuRkILmSNckJHCsyZBxDf6wqPxPIZAk1w766IBrebZB6G5cZAcqzU6LnmHkZAOXc65thszFX9SqUZBqIiU68cvKtZB7Tb3mVfjC1HXWav9wZC9fx7z0xFkAwBPUMwFyPtLJRymKSZBHGE', '2017-07-19', '2017-07-19'),
(9, '10213662225012522', '137756419706989', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBADJwc9umZAOLxnq6WWlwvDh1ewivvZAXVTjg0MpQccsO9lzzFn9H2bg93JlykmvwNNhR5RyhPoCsIltTey3X5ZB6HdayENK8gaYyUyGrpObNSXzepNZB3W83BzVf56tHyGRl5GfS5VQoLN8UZBVDWs3lnewBDxsB8qnLwzZADP', '2017-07-19', '2017-07-19'),
(10, '10213662225012522', '659927434112869', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBAFROQryIZB1ibcMZBDDxaZCele31yGS9yXLnQJ0ZBchNichqdJJxrDG7rE4N9Dq0X4zaQjTJ3MZC69V1LCKKa0G0Mxdj74NFKt5Lp7ojAGGhJx2qf6G2MH3bqUNDZAMCtOyteaeDZCvZBfvyIIcthC54MwLnBtoXfriR2DZAkCVEv', '2017-07-19', '2017-07-19'),
(11, '10213662225012522', '835380629918590', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBAAXZCS3bAm7I7Ltr2aY6ideRhAZAwfMCZCzIMPoxzeevqRFcjHvOABElegxZAfkZAhd0heDx6fLwCqFBpbvMUGvydRI6vtwaZBslHJZCjvoJPJsoQElyXBH1hzfVAf0093ZBv1KiuZB5ZCZCLzZAUIAiGzqPTOHG71nVxrI2sA0OmCjF', '2017-07-19', '2017-07-19'),
(12, '10213662225012522', '1403024119936197', '["EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBADTUZA9KvP1GjnkAfuZBHcLQ3WhEAfTO7NlfVlYFY7JH0l0yr2s1SBeVqch1sK9IZCdof7jRW2WG31DL32GuaVaZAwGy1gD7TaaXp5DTFHsfFJrDX0JXdJs70o6IxJZBo0kuvC9oz16B5w7QvkLn25LzEF84qkLI3i7ZCjXWci', '2017-07-19', '2017-07-19'),
(13, '10213662225012522', '1412431355637287', '["EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBACgZB47OL24PuSXEH72mFySpGZCP6DidMEnIJzlRhXv62uW5kYJLQPYUFOgfFOt1awKyTG79eKrw2rxkoCaZCzYVbZAWZBNbx5QF1vWlQZBfsTCEdGrZCrAoQAKXrE4SsPFdvX4Yl5phW4esBdjk4pbfIwZAlltUSgxAyPAT0dOW', '2017-07-19', '2017-07-19'),
(14, '10213662225012522', '431478090258108', '["EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBAEwzhxWpEYAZAmcMXaZBQDPoOkoWL5XwqhysqcWGo4mYlhJxQqO8OiidzcEbj1QSZBQnRIxcu92tcyL7JMujIjnX9RfhTANHhvQJFOYEhaWMXE66ZBpZCMPIUMnCaqQAPbrXLc8HqYQZAnrn91sUyfjV3SsR3xPj7bneDqDcrc', '2017-07-19', '2017-07-19'),
(15, '10213662225012522', '675075729303498', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBABDvLSBtKPqlK4QluN7yyMjpk57gm90bFMUNhVDzxkcpIOMqydVLLgqVlWwgYlwuZAhkgb7PDRWIQr6yPvvcmN33ZCVJZCQnZCHsTvt6iVEeZBHDhHXZCg1NSRjgAsZCAhRXkYW12pmPcYrGucRIsWVE7wpnsV2GdqcJPZCJK8Pf', '2017-07-19', '2017-07-19'),
(16, '10213662225012522', '1522354981389410', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBAMZC7xcNTWl06TZAs5ljjMToIS7heFgk3BnJpcacjAYYTmVCZB0fIFyNVQIP3gsePURdVZC58D7KkVT0TPOe2dxEF3VPbu39adXcdHKhTjJ8JiLX8YHI0I8DxeQOYtJuFJnsOBczTySZBGdYTrbbokF3C9cV9Jwb9qGupYke9', '2017-07-19', '2017-07-19'),
(17, '10213662225012522', '509805935845951', '["ADMINISTER","EDIT_PROFILE","CREATE_CONTENT","MODERATE_CONTENT","CREATE_ADS","BASIC_ADMIN"]', 'EAAE1738gy7IBABGtQrQRwXA8jJY4p2uaGkweHYNoJaxo4wyyRAuKZAkVZBzNESqh3EDqIxLXNZBMD1VFYCOubxbZB3qRi2t76Wos7PkyK5Fh2ftjRWatZCNz6433ZBZCHvXZB4YOUCxoDeqRzP9fbH78Sp5tQ570sullZCydjfPEnXJ57sf7Wjis2', '2017-07-19', '2017-07-19'),
(18, '10213662225012522', '', 'null', '', '2017-08-02', '2017-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pID` int(11) NOT NULL,
  `facebookPageID` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pageName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pID`, `facebookPageID`, `pageName`, `category`) VALUES
(1, '249927835495743', 'Intrigued Trend', 'Website'),
(2, '1086915341366522', 'The Relationship Room', 'Public Figure'),
(3, '425243157676997', 'Trending Feed Media', 'News & Media Website'),
(4, '1726384147588683', 'Explicit Gists', 'Website'),
(5, '403143439869700', 'Gist And Tips', 'Health & Wellness Website'),
(6, '1936247153278467', 'Adorable Babies', 'Community'),
(7, '2022979931262116', 'Jordan 23', 'Community'),
(8, '1614981005498863', 'ChrisBrown', 'Public Figure'),
(9, '137756419706989', 'EA Programmers Inc.', 'Internet Company'),
(10, '659927434112869', 'You''re My Favorite Kind Of Night', 'Entertainment Website'),
(11, '835380629918590', 'Funny Little Things', 'Just For Fun'),
(12, '1403024119936197', 'Muhammadu Buhari', 'Politician'),
(13, '1412431355637287', 'Dayo Amusa', 'Artist'),
(14, '431478090258108', 'Ireti Osayemi', 'Artist'),
(15, '675075729303498', 'Beautiful Marriage And Relationship', 'Community'),
(16, '1522354981389410', 'Marriage Ideas', 'Community'),
(17, '509805935845951', 'My Soulmate', 'Community'),
(18, '', '', 'Community');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `sourceID` int(11) NOT NULL,
  `pageID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `serverID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isSelected` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uID` int(255) UNSIGNED NOT NULL,
  `facebookID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emailAddress` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `picture` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uID`, `facebookID`, `firstName`, `lastName`, `emailAddress`, `location`, `link`, `gender`, `locale`, `created`, `modified`, `picture`, `token`) VALUES
(1, '10213662225012522', 'Mapayi', 'Bamidele', 'emmanuel.mapayi@gmail.com', 'Florida,NY,United States', 'https://www.facebook.com/app_scoped_user_id/10213662225012522/', 'male', 'en_US', '2017-07-14', '2017-08-09', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/15578380_10211684422688700_4279662818269986130_n.jpg?oh=9d5c704f1294cd0917c93710f1600af5&oe=5A26EC78', 'EAAE1738gy7IBAF44S0nZBxshjcojQgQ9DZCT62ZCsjYHf3gnECCSAIrHaEtEq2X9tKPkewjTxMVUZBTguX5AJ517bI749NdhpQObgTKW7GxvKMcOUTzyTYnXbtieiRQcAKGb5Ff8NySxA8SgQSQ90oTJlLouHcpiPOkqOeVszI3kdkCagbRU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `managedpages`
--
ALTER TABLE `managedpages`
  ADD PRIMARY KEY (`mpID`),
  ADD KEY `facebookPageID` (`facebookPageID`),
  ADD KEY `facebookID` (`facebookID`) USING BTREE;

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pID`),
  ADD KEY `facebookPageID` (`facebookPageID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uID`),
  ADD UNIQUE KEY `facebookID` (`facebookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `managedpages`
--
ALTER TABLE `managedpages`
  MODIFY `mpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `managedpages`
--
ALTER TABLE `managedpages`
  ADD CONSTRAINT `managedpages_ibfk_1` FOREIGN KEY (`facebookID`) REFERENCES `users` (`facebookID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `managedpages_ibfk_2` FOREIGN KEY (`facebookPageID`) REFERENCES `pages` (`facebookPageID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
