-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2017 at 02:03 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcaz_pv_dev`
--
CREATE DATABASE IF NOT EXISTS `mcaz_pv_prod` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mcaz_pv_prod`;

-- --------------------------------------------------------

--
-- Table structure for table `acl_phinxlog`
--

CREATE TABLE `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `adrs`
--

CREATE TABLE `adrs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `adr_id` varchar(255) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL,
  `mrcz_protocol_number` varchar(255) DEFAULT NULL,
  `mcaz_protocol_number` varchar(255) DEFAULT NULL,
  `principal_investigator` varchar(255) DEFAULT NULL,
  `reporter_name` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `reporter_phone` varchar(100) DEFAULT NULL,
  `name_of_institution` varchar(100) DEFAULT NULL,
  `institution_code` varchar(100) DEFAULT NULL,
  `study_title` varchar(255) DEFAULT NULL,
  `study_sponsor` varchar(255) DEFAULT NULL,
  `date_of_adverse_event` date DEFAULT NULL,
  `participant_number` varchar(255) DEFAULT NULL,
  `report_type` varchar(255) DEFAULT NULL,
  `date_of_site_awareness` date DEFAULT NULL,
  `date_of_birth` varchar(20) DEFAULT NULL,
  `gender` varchar(17) DEFAULT NULL,
  `study_week` varchar(55) DEFAULT NULL,
  `visit_number` varchar(55) DEFAULT NULL,
  `adverse_event_type` varchar(55) DEFAULT NULL,
  `sae_type` varchar(255) DEFAULT NULL,
  `sae_description` text,
  `toxicity_grade` varchar(55) DEFAULT NULL,
  `previous_events` varchar(55) DEFAULT NULL,
  `previous_events_number` varchar(55) DEFAULT NULL,
  `total_saes` varchar(55) DEFAULT NULL,
  `location_event` varchar(55) DEFAULT NULL,
  `location_event_specify` text,
  `research_involves` varchar(55) DEFAULT NULL,
  `research_involves_specify` text,
  `name_of_drug` text,
  `drug_investigational` varchar(55) DEFAULT NULL,
  `patient_other_drug` varchar(55) DEFAULT NULL,
  `report_to_mcaz` varchar(55) DEFAULT NULL,
  `report_to_mcaz_date` date DEFAULT NULL,
  `report_to_mrcz` varchar(55) DEFAULT NULL,
  `report_to_mrcz_date` date DEFAULT NULL,
  `report_to_sponsor` varchar(55) DEFAULT NULL,
  `report_to_sponsor_date` date DEFAULT NULL,
  `report_to_irb` varchar(55) DEFAULT NULL,
  `report_to_irb_date` date DEFAULT NULL,
  `medical_history` text,
  `diagnosis` text,
  `immediate_cause` text,
  `symptoms` text,
  `investigations` text,
  `results` text,
  `management` text,
  `outcome` text,
  `d1_consent_form` varchar(55) DEFAULT NULL,
  `d2_brochure` varchar(55) DEFAULT NULL,
  `d3_changes_sae` varchar(55) DEFAULT NULL,
  `d4_consent_sae` varchar(55) DEFAULT NULL,
  `changes_explain` text,
  `assess_risk` varchar(55) DEFAULT NULL,
  `submitted` int(2) DEFAULT '0',
  `submitted_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'UnSubmitted',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adr_lab_tests`
--

CREATE TABLE `adr_lab_tests` (
  `id` int(11) NOT NULL,
  `adr_id` int(11) DEFAULT NULL,
  `lab_test` varchar(100) DEFAULT NULL,
  `abnormal_result` varchar(100) DEFAULT NULL,
  `site_normal_range` varchar(100) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `lab_value` varchar(100) DEFAULT NULL,
  `lab_value_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adr_list_of_drugs`
--

CREATE TABLE `adr_list_of_drugs` (
  `id` int(11) NOT NULL,
  `adr_id` int(11) DEFAULT NULL,
  `drug_name` varchar(100) DEFAULT NULL,
  `dosage` varchar(100) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `frequency_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `stop_date` date DEFAULT NULL,
  `taking_drug` varchar(100) DEFAULT NULL,
  `relationship_to_sae` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adr_other_drugs`
--

CREATE TABLE `adr_other_drugs` (
  `id` int(11) NOT NULL,
  `adr_id` int(11) DEFAULT NULL,
  `drug_name` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `stop_date` date DEFAULT NULL,
  `relationship_to_sae` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aefis`
--

CREATE TABLE `aefis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `aefi_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_surname` varchar(255) DEFAULT NULL,
  `patient_next_of_kin` varchar(255) DEFAULT NULL,
  `patient_address` varchar(255) DEFAULT NULL,
  `patient_telephone` varchar(255) DEFAULT NULL,
  `report_type` varchar(20) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `date_of_birth` varchar(20) DEFAULT NULL,
  `age_at_onset` varchar(20) DEFAULT NULL,
  `age_at_onset_years` int(11) DEFAULT NULL,
  `age_at_onset_months` int(11) DEFAULT NULL,
  `age_at_onset_days` int(11) DEFAULT NULL,
  `age_at_onset_specify` int(11) DEFAULT NULL,
  `reporter_name` varchar(100) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `reporter_department` varchar(100) DEFAULT NULL,
  `reporter_address` varchar(100) DEFAULT NULL,
  `reporter_district` varchar(100) DEFAULT NULL,
  `reporter_province` varchar(100) DEFAULT NULL,
  `reporter_phone` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `name_of_vaccination_center` varchar(200) DEFAULT NULL,
  `adverse_events` varchar(100) DEFAULT NULL,
  `ae_severe_local_reaction` int(2) DEFAULT NULL,
  `ae_seizures` int(2) DEFAULT NULL,
  `ae_abscess` int(2) DEFAULT NULL,
  `ae_sepsis` int(2) DEFAULT NULL,
  `ae_encephalopathy` int(2) DEFAULT NULL,
  `ae_toxic_shock` int(2) DEFAULT NULL,
  `ae_thrombocytopenia` int(2) DEFAULT NULL,
  `ae_anaphylaxis` int(2) DEFAULT NULL,
  `ae_fever` int(2) DEFAULT NULL,
  `ae_3days` int(2) DEFAULT NULL,
  `ae_febrile` int(2) DEFAULT NULL,
  `ae_beyond_joint` int(2) DEFAULT NULL,
  `ae_afebrile` int(2) DEFAULT NULL,
  `ae_other` int(2) DEFAULT NULL,
  `adverse_events_specify` text,
  `aefi_date` datetime DEFAULT NULL,
  `notification_date` date DEFAULT NULL,
  `description_of_reaction` text,
  `treatment_provided` varchar(100) DEFAULT NULL,
  `serious` varchar(10) DEFAULT NULL,
  `serious_yes` varchar(200) DEFAULT NULL,
  `outcome` varchar(100) DEFAULT NULL,
  `died_date` date DEFAULT NULL,
  `autopsy` varchar(100) DEFAULT NULL,
  `past_medical_history` text,
  `district_receive_date` date DEFAULT NULL,
  `investigation_needed` varchar(10) DEFAULT NULL,
  `investigation_date` date DEFAULT NULL,
  `national_receive_date` date DEFAULT NULL,
  `comments` text,
  `submitted` int(2) DEFAULT '0',
  `submitted_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'UnSubmitted',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aefi_list_of_diluents`
--

CREATE TABLE `aefi_list_of_diluents` (
  `id` int(11) NOT NULL,
  `aefi_id` int(11) DEFAULT NULL,
  `diluent_name` varchar(100) DEFAULT NULL,
  `diluent_date` datetime DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aefi_list_of_vaccines`
--

CREATE TABLE `aefi_list_of_vaccines` (
  `id` int(11) NOT NULL,
  `aefi_id` int(11) DEFAULT NULL,
  `vaccine_name` varchar(100) DEFAULT NULL,
  `vaccination_date` datetime DEFAULT NULL,
  `dosage` varchar(255) DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `diluent_batch_number` varchar(55) DEFAULT NULL,
  `diluent_date` datetime DEFAULT NULL,
  `diluent_expiry_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` int(11) NOT NULL,
  `county_name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` char(2) CHARACTER SET latin1 DEFAULT '',
  `name` tinytext CHARACTER SET latin1,
  `name_fr` tinytext CHARACTER SET latin1,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doses`
--

CREATE TABLE `doses` (
  `id` int(11) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `icsr_code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drug_dictionaries`
--

CREATE TABLE `drug_dictionaries` (
  `id` varchar(10) NOT NULL,
  `MedId` varchar(35) DEFAULT NULL,
  `drug_record_number` varchar(6) DEFAULT NULL,
  `sequence_no_1` varchar(2) DEFAULT NULL,
  `sequence_no_2` varchar(3) DEFAULT NULL,
  `sequence_no_3` varchar(10) DEFAULT NULL,
  `sequence_no_4` varchar(10) DEFAULT NULL,
  `generic` char(1) DEFAULT NULL,
  `drug_name` varchar(80) DEFAULT NULL,
  `name_specifier` varchar(30) DEFAULT NULL,
  `market_authorization_number` varchar(30) DEFAULT NULL,
  `market_authorization_date` varchar(8) DEFAULT NULL,
  `market_authorization_withdrawal_date` varchar(8) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `company` varchar(10) DEFAULT NULL,
  `marketing_authorization_holder` varchar(10) DEFAULT NULL,
  `source_code` varchar(10) DEFAULT NULL,
  `source_country` varchar(10) DEFAULT NULL,
  `source_year` varchar(3) DEFAULT NULL,
  `product_type` varchar(10) DEFAULT NULL,
  `product_group` varchar(10) DEFAULT NULL,
  `create_date` varchar(8) DEFAULT NULL,
  `date_changed` varchar(8) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facility_codes`
--

CREATE TABLE `facility_codes` (
  `id` int(11) NOT NULL,
  `facility_code` varchar(17) DEFAULT NULL,
  `facility_name` varchar(250) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `sub_location` varchar(250) DEFAULT NULL,
  `description_of_location` tinytext,
  `constituency` varchar(250) DEFAULT NULL,
  `nearest_town` varchar(250) DEFAULT NULL,
  `beds` varchar(50) DEFAULT NULL,
  `cots` varchar(50) DEFAULT NULL,
  `official_landline` varchar(20) DEFAULT NULL,
  `official_fax` varchar(20) DEFAULT NULL,
  `official_mobile` varchar(20) DEFAULT NULL,
  `official_email` varchar(50) DEFAULT NULL,
  `official_address` varchar(50) DEFAULT NULL,
  `official_alternate_number` varchar(20) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `post_code` varchar(20) DEFAULT NULL,
  `in_charge` varchar(100) DEFAULT NULL,
  `job_title_of_in_charge` varchar(150) DEFAULT NULL,
  `open_24hrs` varchar(50) DEFAULT NULL,
  `open_weekends` varchar(50) DEFAULT NULL,
  `operational_status` varchar(50) DEFAULT NULL,
  `anc` varchar(10) DEFAULT NULL,
  `art` varchar(10) DEFAULT NULL,
  `beoc` varchar(10) DEFAULT NULL,
  `blood` varchar(10) DEFAULT NULL,
  `caes_sec` varchar(10) DEFAULT NULL,
  `ceoc` varchar(10) DEFAULT NULL,
  `c_imci` varchar(10) DEFAULT NULL,
  `epi` varchar(10) DEFAULT NULL,
  `fp` varchar(10) DEFAULT NULL,
  `growm` varchar(10) DEFAULT NULL,
  `hbc` varchar(10) DEFAULT NULL,
  `hct` varchar(10) DEFAULT NULL,
  `ipd` varchar(10) DEFAULT NULL,
  `opd` varchar(10) DEFAULT NULL,
  `outreach` varchar(10) DEFAULT NULL,
  `pmtct` varchar(10) DEFAULT NULL,
  `rad_xray` varchar(10) DEFAULT NULL,
  `rhtc_rhdc` varchar(10) DEFAULT NULL,
  `tb_diag` varchar(10) DEFAULT NULL,
  `tb_labs` varchar(10) DEFAULT NULL,
  `tb_treat` varchar(10) DEFAULT NULL,
  `Youth` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `email` char(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sadr_id` int(11) DEFAULT NULL,
  `sadr_followup_id` int(11) DEFAULT NULL,
  `pqmp_id` int(11) DEFAULT NULL,
  `feedback` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frequencies`
--

CREATE TABLE `frequencies` (
  `id` int(11) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `icsr_code` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `help_infos`
--

CREATE TABLE `help_infos` (
  `id` int(11) NOT NULL,
  `field_name` varchar(25) DEFAULT NULL,
  `field_label` varchar(255) DEFAULT NULL,
  `place_holder` varchar(140) DEFAULT NULL,
  `help_type` varchar(50) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `content` text,
  `help_text` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` longtext,
  `type` varchar(255) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `system_message` text,
  `user_message` text,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pqmps`
--

CREATE TABLE `pqmps` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `sub_county_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `facility_name` varchar(100) DEFAULT NULL,
  `facility_code` varchar(100) DEFAULT NULL,
  `facility_address` varchar(100) DEFAULT NULL,
  `facility_phone` varchar(100) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `generic_name` varchar(100) DEFAULT NULL,
  `batch_number` varchar(100) DEFAULT NULL,
  `manufacture_date` varchar(20) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `receipt_date` date DEFAULT NULL,
  `name_of_manufacturer` varchar(100) DEFAULT NULL,
  `country_of_origin` varchar(100) DEFAULT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `supplier_address` varchar(100) DEFAULT NULL,
  `product_formulation` varchar(70) DEFAULT NULL,
  `product_formulation_specify` varchar(250) DEFAULT NULL,
  `colour_change` tinyint(1) DEFAULT NULL,
  `separating` tinyint(1) DEFAULT NULL,
  `powdering` tinyint(1) DEFAULT NULL,
  `caking` tinyint(1) DEFAULT NULL,
  `moulding` tinyint(1) DEFAULT NULL,
  `odour_change` tinyint(1) DEFAULT NULL,
  `mislabeling` tinyint(1) DEFAULT NULL,
  `incomplete_pack` tinyint(1) DEFAULT NULL,
  `complaint_other` tinyint(1) DEFAULT NULL,
  `complaint_other_specify` text,
  `complaint_description` text,
  `require_refrigeration` varchar(10) DEFAULT NULL,
  `product_at_facility` varchar(10) DEFAULT NULL,
  `returned_by_client` varchar(10) DEFAULT NULL,
  `stored_to_recommendations` varchar(10) DEFAULT NULL,
  `other_details` text,
  `comments` text,
  `reporter_name` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `emails` tinyint(2) DEFAULT '0',
  `submitted` tinyint(2) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `device` tinyint(2) DEFAULT '0',
  `notified` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `province_name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `queued_jobs`
--

CREATE TABLE `queued_jobs` (
  `id` int(11) NOT NULL,
  `job_type` varchar(45) NOT NULL,
  `data` longtext,
  `job_group` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `notbefore` datetime DEFAULT NULL,
  `fetched` datetime DEFAULT NULL,
  `completed` datetime DEFAULT NULL,
  `progress` float DEFAULT NULL,
  `failed` int(11) NOT NULL DEFAULT '0',
  `failure_message` text,
  `workerkey` varchar(45) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `priority` int(3) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `queue_phinxlog`
--

CREATE TABLE `queue_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `queue_processes`
--

CREATE TABLE `queue_processes` (
  `id` int(11) NOT NULL,
  `pid` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `category` varchar(55) DEFAULT NULL,
  `model` varchar(40) DEFAULT NULL,
  `comments` text,
  `literature_review` text,
  `references_text` text,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `icsr_code` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sadrs`
--

CREATE TABLE `sadrs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sadr_id` int(11) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `report_type` varchar(20) DEFAULT NULL,
  `name_of_institution` varchar(100) DEFAULT NULL,
  `institution_code` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `ip_no` varchar(100) DEFAULT NULL,
  `date_of_birth` varchar(20) DEFAULT NULL,
  `age_group` varchar(40) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `date_of_onset_of_reaction` varchar(20) DEFAULT NULL,
  `date_of_end_of_reaction` varchar(20) DEFAULT NULL,
  `duration_type` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `description_of_reaction` text,
  `severity` varchar(100) DEFAULT NULL,
  `severity_reason` varchar(255) DEFAULT NULL,
  `medical_history` text,
  `past_drug_therapy` text,
  `outcome` varchar(100) DEFAULT NULL,
  `lab_test_results` text,
  `reporter_name` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `reporter_phone` varchar(100) DEFAULT NULL,
  `submitted` tinyint(2) DEFAULT '0',
  `submitted_date` datetime DEFAULT NULL,
  `action_taken` varchar(255) DEFAULT NULL,
  `relatedness` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'UnSubmitted',
  `emails` tinyint(2) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `device` tinyint(2) DEFAULT '0',
  `notified` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `sadr_followups`
--

CREATE TABLE `sadr_followups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `sadr_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `description_of_reaction` text,
  `outcome` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `reporter_phone` varchar(100) DEFAULT NULL,
  `submitted` tinyint(2) DEFAULT '0',
  `emails` tinyint(2) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `device` tinyint(2) DEFAULT '0',
  `notified` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `sadr_list_of_drugs`
--

CREATE TABLE `sadr_list_of_drugs` (
  `id` int(11) NOT NULL,
  `sadr_id` int(11) DEFAULT NULL,
  `sadr_followup_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `frequency_id` int(11) DEFAULT NULL,
  `drug_name` varchar(100) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `dose` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `stop_date` date DEFAULT NULL,
  `indication` varchar(100) DEFAULT NULL,
  `suspected_drug` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `sadr_other_drugs`
--

CREATE TABLE `sadr_other_drugs` (
  `id` int(11) NOT NULL,
  `sadr_id` int(11) DEFAULT NULL,
  `drug_name` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `stop_date` date DEFAULT NULL,
  `suspected_drug` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `saefis`
--

CREATE TABLE `saefis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `saefi_id` int(11) DEFAULT NULL,
  `reference_number` varchar(50) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL,
  `basic_details` text,
  `place_vaccination` varchar(101) DEFAULT NULL,
  `place_vaccination_other` varchar(250) DEFAULT NULL,
  `site_type` varchar(100) DEFAULT NULL,
  `site_type_other` varchar(100) DEFAULT NULL,
  `vaccination_in` varchar(100) DEFAULT NULL,
  `vaccination_in_other` varchar(255) DEFAULT NULL,
  `reporter_name` varchar(255) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `complete_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `telephone` varchar(40) DEFAULT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `patient_name` varchar(200) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `hospitalization_date` date DEFAULT NULL,
  `status_on_date` varchar(255) DEFAULT NULL,
  `died_date` datetime DEFAULT NULL,
  `autopsy_done` varchar(40) DEFAULT NULL,
  `autopsy_done_date` date DEFAULT NULL,
  `autopsy_planned` varchar(55) DEFAULT NULL,
  `autopsy_planned_date` datetime DEFAULT NULL,
  `past_history` varchar(55) DEFAULT NULL,
  `past_history_remarks` text,
  `adverse_event` varchar(100) DEFAULT NULL,
  `adverse_event_remarks` text,
  `allergy_history` varchar(100) DEFAULT NULL,
  `allergy_history_remarks` text,
  `existing_illness` varchar(100) DEFAULT NULL,
  `existing_illness_remarks` text,
  `hospitalization_history` varchar(100) DEFAULT NULL,
  `hospitalization_history_remarks` text,
  `medication_vaccination` varchar(100) DEFAULT NULL,
  `medication_vaccination_remarks` text,
  `faith_healers` varchar(100) DEFAULT NULL,
  `faith_healers_remarks` text,
  `family_history` varchar(100) DEFAULT NULL,
  `family_history_remarks` text,
  `pregnant` varchar(100) DEFAULT NULL,
  `pregnant_weeks` varchar(50) DEFAULT NULL,
  `breastfeeding` varchar(100) DEFAULT NULL,
  `infant` varchar(100) DEFAULT NULL,
  `birth_weight` int(10) DEFAULT NULL,
  `delivery_procedure` varchar(205) DEFAULT NULL,
  `delivery_procedure_specify` text,
  `source_examination` tinyint(1) DEFAULT NULL,
  `source_documents` tinyint(1) DEFAULT NULL,
  `source_verbal` tinyint(1) DEFAULT NULL,
  `verbal_source` text,
  `source_other` tinyint(1) DEFAULT NULL,
  `source_other_specify` text,
  `examiner_name` varchar(205) DEFAULT NULL,
  `other_sources` text,
  `signs_symptoms` text,
  `person_details` varchar(255) DEFAULT NULL,
  `person_designation` varchar(205) DEFAULT NULL,
  `person_date` datetime DEFAULT NULL,
  `medical_care` text,
  `not_medical_care` text,
  `final_diagnosis` text,
  `when_vaccinated` varchar(255) DEFAULT NULL,
  `when_vaccinated_specify` text,
  `prescribing_error` varchar(255) DEFAULT NULL,
  `prescribing_error_specify` text,
  `vaccine_unsterile` varchar(255) DEFAULT NULL,
  `vaccine_unsterile_specify` text,
  `vaccine_condition` varchar(255) DEFAULT NULL,
  `vaccine_condition_specify` text,
  `vaccine_reconstitution` varchar(255) DEFAULT NULL,
  `vaccine_reconstitution_specify` text,
  `vaccine_handling` varchar(255) DEFAULT NULL,
  `vaccine_handling_specify` text,
  `vaccine_administered` varchar(255) DEFAULT NULL,
  `vaccine_administered_specify` text,
  `vaccinated_vial` int(11) DEFAULT NULL,
  `vaccinated_session` int(11) DEFAULT NULL,
  `vaccinated_locations` int(11) DEFAULT NULL,
  `vaccinated_locations_specify` text,
  `vaccinated_cluster` varchar(255) DEFAULT NULL,
  `vaccinated_cluster_number` int(11) DEFAULT NULL,
  `vaccinated_cluster_vial` varchar(255) DEFAULT NULL,
  `vaccinated_cluster_vial_number` int(11) DEFAULT NULL,
  `syringes_used` varchar(255) DEFAULT NULL,
  `syringes_used_specify` varchar(255) DEFAULT NULL,
  `syringes_used_other` varchar(255) DEFAULT NULL,
  `syringes_used_findings` text,
  `reconstitution_multiple` varchar(55) DEFAULT NULL,
  `reconstitution_different` varchar(55) DEFAULT NULL,
  `reconstitution_vial` varchar(55) DEFAULT NULL,
  `reconstitution_syringe` varchar(55) DEFAULT NULL,
  `reconstitution_vaccines` varchar(55) DEFAULT NULL,
  `reconstitution_observations` text,
  `cold_temperature` varchar(55) DEFAULT NULL,
  `cold_temperature_deviation` varchar(55) DEFAULT NULL,
  `cold_temperature_specify` text,
  `procedure_followed` varchar(55) DEFAULT NULL,
  `other_items` varchar(55) DEFAULT NULL,
  `partial_vaccines` varchar(55) DEFAULT NULL,
  `unusable_vaccines` varchar(55) DEFAULT NULL,
  `unusable_diluents` varchar(55) DEFAULT NULL,
  `additional_observations` text,
  `cold_transportation` varchar(55) DEFAULT NULL,
  `vaccine_carrier` varchar(55) DEFAULT NULL,
  `coolant_packs` varchar(55) DEFAULT NULL,
  `transport_findings` text,
  `similar_events` varchar(55) DEFAULT NULL,
  `similar_events_describe` text,
  `similar_events_episodes` int(11) DEFAULT NULL,
  `affected_vaccinated` int(11) DEFAULT NULL,
  `affected_not_vaccinated` int(11) DEFAULT NULL,
  `affected_unknown` varchar(255) DEFAULT NULL,
  `community_comments` text,
  `relevant_findings` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `submitted` int(2) NOT NULL,
  `submitted_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'UnSubmitted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saefi_list_of_vaccines`
--

CREATE TABLE `saefi_list_of_vaccines` (
  `id` int(11) NOT NULL,
  `saefi_id` int(11) DEFAULT NULL,
  `vaccine_name` varchar(200) DEFAULT NULL,
  `vaccination_doses` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_counties`
--

CREATE TABLE `sub_counties` (
  `id` int(11) NOT NULL,
  `county_id` int(11) DEFAULT NULL,
  `sub_county_name` varchar(50) DEFAULT NULL,
  `county_name` varchar(50) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL,
  `Pop_2009` varchar(50) DEFAULT NULL,
  `RegVoters` varchar(50) DEFAULT NULL,
  `AreaSqKms` varchar(50) DEFAULT NULL,
  `CAWards` varchar(50) DEFAULT NULL,
  `MainEthnicGroup` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` char(140) NOT NULL,
  `confirm_password` char(140) NOT NULL DEFAULT '',
  `name` varchar(100) DEFAULT NULL,
  `email` char(50) NOT NULL DEFAULT '',
  `group_id` int(11) NOT NULL,
  `name_of_institution` varchar(100) DEFAULT NULL,
  `institution_address` varchar(100) DEFAULT NULL,
  `institution_code` varchar(100) DEFAULT NULL,
  `institution_contact` varchar(100) DEFAULT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `forgot_password` tinyint(2) DEFAULT '0',
  `initial_email` tinyint(2) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  `is_admin` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `activation_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `who_drugs`
--

CREATE TABLE `who_drugs` (
  `id` varchar(10) NOT NULL,
  `MedId` varchar(35) DEFAULT NULL,
  `drug_record_number` varchar(6) DEFAULT NULL,
  `sequence_no_1` varchar(2) DEFAULT NULL,
  `sequence_no_2` varchar(3) DEFAULT NULL,
  `sequence_no_3` varchar(10) DEFAULT NULL,
  `sequence_no_4` varchar(10) DEFAULT NULL,
  `generic` char(1) DEFAULT NULL,
  `drug_name` varchar(80) DEFAULT NULL,
  `name_specifier` varchar(30) DEFAULT NULL,
  `market_authorization_number` varchar(30) DEFAULT NULL,
  `market_authorization_date` varchar(8) DEFAULT NULL,
  `market_authorization_withdrawal_date` varchar(8) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `company` varchar(10) DEFAULT NULL,
  `marketing_authorization_holder` varchar(10) DEFAULT NULL,
  `source_code` varchar(10) DEFAULT NULL,
  `source_country` varchar(10) DEFAULT NULL,
  `source_year` varchar(3) DEFAULT NULL,
  `product_type` varchar(10) DEFAULT NULL,
  `product_group` varchar(10) DEFAULT NULL,
  `create_date` varchar(8) DEFAULT NULL,
  `date_changed` varchar(8) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_phinxlog`
--
ALTER TABLE `acl_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `adrs`
--
ALTER TABLE `adrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adr_lab_tests`
--
ALTER TABLE `adr_lab_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adr_list_of_drugs`
--
ALTER TABLE `adr_list_of_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adr_other_drugs`
--
ALTER TABLE `adr_other_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aefis`
--
ALTER TABLE `aefis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aefi_list_of_diluents`
--
ALTER TABLE `aefi_list_of_diluents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aefi_list_of_vaccines`
--
ALTER TABLE `aefi_list_of_vaccines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  ADD KEY `aco_id` (`aco_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doses`
--
ALTER TABLE `doses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_dictionaries`
--
ALTER TABLE `drug_dictionaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_codes`
--
ALTER TABLE `facility_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frequencies`
--
ALTER TABLE `frequencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_infos`
--
ALTER TABLE `help_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pqmps`
--
ALTER TABLE `pqmps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queued_jobs`
--
ALTER TABLE `queued_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue_phinxlog`
--
ALTER TABLE `queue_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `queue_processes`
--
ALTER TABLE `queue_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sadrs`
--
ALTER TABLE `sadrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sadr_followups`
--
ALTER TABLE `sadr_followups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sadr_list_of_drugs`
--
ALTER TABLE `sadr_list_of_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sadr_other_drugs`
--
ALTER TABLE `sadr_other_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saefis`
--
ALTER TABLE `saefis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saefi_list_of_vaccines`
--
ALTER TABLE `saefi_list_of_vaccines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_counties`
--
ALTER TABLE `sub_counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `who_drugs`
--
ALTER TABLE `who_drugs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adrs`
--
ALTER TABLE `adrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adr_lab_tests`
--
ALTER TABLE `adr_lab_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adr_list_of_drugs`
--
ALTER TABLE `adr_list_of_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adr_other_drugs`
--
ALTER TABLE `adr_other_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aefis`
--
ALTER TABLE `aefis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aefi_list_of_diluents`
--
ALTER TABLE `aefi_list_of_diluents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aefi_list_of_vaccines`
--
ALTER TABLE `aefi_list_of_vaccines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doses`
--
ALTER TABLE `doses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facility_codes`
--
ALTER TABLE `facility_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frequencies`
--
ALTER TABLE `frequencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `help_infos`
--
ALTER TABLE `help_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pqmps`
--
ALTER TABLE `pqmps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `queued_jobs`
--
ALTER TABLE `queued_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `queue_processes`
--
ALTER TABLE `queue_processes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sadrs`
--
ALTER TABLE `sadrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sadr_followups`
--
ALTER TABLE `sadr_followups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sadr_list_of_drugs`
--
ALTER TABLE `sadr_list_of_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sadr_other_drugs`
--
ALTER TABLE `sadr_other_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saefis`
--
ALTER TABLE `saefis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saefi_list_of_vaccines`
--
ALTER TABLE `saefi_list_of_vaccines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_counties`
--
ALTER TABLE `sub_counties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
