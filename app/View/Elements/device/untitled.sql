-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2020 at 05:19 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pv`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE IF NOT EXISTS `medications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `date_of_event` date DEFAULT NULL,
  `time_of_event` varchar(10) DEFAULT NULL,
  `name_of_institution` varchar(100) DEFAULT NULL,
  `institution_code` varchar(100) DEFAULT NULL,
  `institution_contact` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `patient_phone` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(20) DEFAULT NULL,
  `age_years` int(11) DEFAULT NULL,
  `ward` varchar(255) DEFAULT NULL,
  `clinic` varchar(255) DEFAULT NULL,
  `pharmacy` varchar(255) DEFAULT NULL,
  `accident` varchar(255) DEFAULT NULL,
  `location_other` varchar(255) DEFAULT NULL,
  `description_of_error` text DEFAULT NULL,
  `process_occur` varchar(95) DEFAULT NULL,
  `reach_patient` varchar(25) DEFAULT NULL,
  `correct_medication` varchar(25) DEFAULT NULL,
  `direct_result` text DEFAULT NULL,
  `outcome` varchar(255) DEFAULT NULL,
  `outcome_error` varchar(255) DEFAULT NULL,
  `outcome_death` varchar(255) DEFAULT NULL,
  `staff_factors` varchar(255) DEFAULT NULL,
  `medication_related` varchar(255) DEFAULT NULL,
  `work_environment` varchar(255) DEFAULT NULL,
  `task_technology` varchar(255) DEFAULT NULL,
  `task_other` text DEFAULT NULL,
  `recommendations` text DEFAULT NULL,
  `reporter_name` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `reporter_phone` varchar(100) DEFAULT NULL,
  `submitted` tinyint(2) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=19 ;
