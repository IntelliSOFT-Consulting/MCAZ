-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2017 at 06:17 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.2-1ubuntu4.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctr`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

-- --------------------------------------------------------

--
-- Table structure for table `amendments`
--

CREATE TABLE IF NOT EXISTS `amendments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `trial_status_id` int(11) DEFAULT NULL,
  `abstract_of_study` text,
  `study_title` text,
  `protocol_no` varchar(255) DEFAULT NULL,
  `version_no` varchar(255) DEFAULT NULL,
  `date_of_protocol` date DEFAULT NULL,
  `study_drug` varchar(255) DEFAULT NULL,
  `disease_condition` varchar(255) DEFAULT NULL,
  `product_type` text,
  `product_type_biologicals` tinyint(1) DEFAULT NULL,
  `product_type_proteins` tinyint(1) DEFAULT NULL,
  `product_type_immunologicals` tinyint(1) DEFAULT NULL,
  `product_type_vaccines` tinyint(1) DEFAULT NULL,
  `product_type_hormones` tinyint(1) DEFAULT NULL,
  `product_type_toxoid` tinyint(1) DEFAULT NULL,
  `product_type_chemical` tinyint(1) DEFAULT NULL,
  `product_type_medical_device` tinyint(1) DEFAULT NULL,
  `product_type_chemical_name` varchar(255) DEFAULT NULL,
  `product_type_medical_device_name` varchar(255) DEFAULT NULL,
  `previous_dates` text,
  `coordinating_investigators` text,
  `principal_investigators` text,
  `sponsor_details` text,
  `gender` text,
  `details_of_sites` text,
  `placebos` text,
  `scopes` text,
  `organizations` text,
  `types_and_phases` text,
  `ecct_not_applicable` tinyint(1) DEFAULT '0',
  `ecct_ref_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `applicant_covering_letter` tinyint(1) DEFAULT NULL,
  `applicant_protocol` tinyint(1) DEFAULT NULL,
  `applicant_patient_information` tinyint(1) DEFAULT NULL,
  `applicant_investigators_brochure` tinyint(1) DEFAULT NULL,
  `applicant_investigators_cv` tinyint(1) DEFAULT NULL,
  `applicant_signed_declaration` tinyint(1) DEFAULT NULL,
  `applicant_financial_declaration` tinyint(1) DEFAULT NULL,
  `applicant_gmp_certificate` tinyint(1) DEFAULT NULL,
  `applicant_indemnity_cover` tinyint(1) DEFAULT NULL,
  `applicant_opinion_letter` tinyint(1) DEFAULT NULL,
  `applicant_approval_letter` tinyint(1) DEFAULT NULL,
  `applicant_statement` tinyint(1) DEFAULT NULL,
  `applicant_participating_countries` tinyint(1) DEFAULT NULL,
  `applicant_addendum` tinyint(1) DEFAULT NULL,
  `applicant_fees` tinyint(1) DEFAULT NULL,
  `declaration_applicant` varchar(255) DEFAULT NULL,
  `declaration_date1` date DEFAULT NULL,
  `declaration_principal_investigator` varchar(255) DEFAULT NULL,
  `declaration_date2` date DEFAULT NULL,
  `placebo_present` varchar(255) DEFAULT NULL,
  `principal_inclusion_criteria` text,
  `principal_exclusion_criteria` text,
  `primary_end_points` text,
  `scope_diagnosis` tinyint(1) DEFAULT NULL,
  `scope_prophylaxis` tinyint(1) DEFAULT NULL,
  `scope_therapy` tinyint(1) DEFAULT NULL,
  `scope_safety` tinyint(1) DEFAULT NULL,
  `scope_efficacy` tinyint(1) DEFAULT NULL,
  `scope_pharmacokinetic` tinyint(1) DEFAULT NULL,
  `scope_pharmacodynamic` tinyint(1) DEFAULT NULL,
  `scope_bioequivalence` tinyint(1) DEFAULT NULL,
  `scope_dose_response` tinyint(1) DEFAULT NULL,
  `scope_pharmacogenetic` tinyint(1) DEFAULT NULL,
  `scope_pharmacogenomic` tinyint(1) DEFAULT NULL,
  `scope_pharmacoecomomic` tinyint(1) DEFAULT NULL,
  `scope_others` tinyint(1) DEFAULT NULL,
  `scope_others_specify` text,
  `trial_human_pharmacology` tinyint(1) DEFAULT NULL,
  `trial_administration_humans` tinyint(1) DEFAULT NULL,
  `trial_bioequivalence_study` tinyint(1) DEFAULT NULL,
  `trial_other` tinyint(1) DEFAULT NULL,
  `trial_other_specify` text,
  `trial_therapeutic_exploratory` tinyint(1) DEFAULT NULL,
  `trial_therapeutic_confirmatory` tinyint(1) DEFAULT NULL,
  `trial_therapeutic_use` tinyint(1) DEFAULT NULL,
  `design_controlled` varchar(255) DEFAULT NULL,
  `site_capacity` varchar(100) DEFAULT NULL,
  `staff_numbers` text,
  `other_details_explanation` text,
  `other_details_regulatory_notapproved` text,
  `other_details_regulatory_approved` text,
  `other_details_regulatory_rejected` text,
  `other_details_regulatory_halted` text,
  `estimated_duration` varchar(255) DEFAULT NULL,
  `design_controlled_randomised` varchar(255) DEFAULT NULL,
  `design_controlled_open` varchar(255) DEFAULT NULL,
  `design_controlled_single_blind` varchar(255) DEFAULT NULL,
  `design_controlled_double_blind` varchar(255) DEFAULT NULL,
  `design_controlled_parallel_group` varchar(255) DEFAULT NULL,
  `design_controlled_cross_over` varchar(255) DEFAULT NULL,
  `design_controlled_other` varchar(255) DEFAULT NULL,
  `design_controlled_specify` varchar(255) DEFAULT NULL,
  `design_controlled_comparator` varchar(255) DEFAULT NULL,
  `design_controlled_other_medicinal` varchar(255) DEFAULT NULL,
  `design_controlled_placebo` varchar(255) DEFAULT NULL,
  `design_controlled_medicinal_other` varchar(255) DEFAULT NULL,
  `design_controlled_medicinal_specify` varchar(255) DEFAULT NULL,
  `single_site_member_state` varchar(255) DEFAULT NULL,
  `location_of_area` varchar(255) DEFAULT NULL,
  `multiple_sites_member_state` varchar(255) DEFAULT NULL,
  `multiple_countries` char(30) DEFAULT NULL,
  `multiple_member_states` varchar(255) DEFAULT NULL,
  `number_of_sites` varchar(255) DEFAULT NULL,
  `multi_country_list` text,
  `data_monitoring_committee` varchar(255) DEFAULT NULL,
  `total_enrolment_per_site` text,
  `total_participants_worldwide` varchar(255) DEFAULT '',
  `population_less_than_18_years` varchar(255) DEFAULT NULL,
  `population_utero` varchar(255) DEFAULT NULL,
  `population_preterm_newborn` varchar(255) DEFAULT NULL,
  `population_newborn` varchar(255) DEFAULT NULL,
  `population_infant_and_toddler` varchar(255) DEFAULT NULL,
  `population_children` varchar(255) DEFAULT NULL,
  `population_adolescent` varchar(255) DEFAULT NULL,
  `population_above_18` char(30) DEFAULT NULL,
  `population_adult` varchar(255) DEFAULT NULL,
  `population_elderly` varchar(255) DEFAULT NULL,
  `gender_female` tinyint(1) DEFAULT NULL,
  `gender_male` tinyint(1) DEFAULT NULL,
  `subjects_healthy` varchar(255) DEFAULT NULL,
  `subjects_patients` varchar(255) DEFAULT NULL,
  `subjects_vulnerable_populations` varchar(255) DEFAULT NULL,
  `subjects_women_child_bearing` varchar(255) DEFAULT NULL,
  `subjects_women_using_contraception` varchar(255) DEFAULT NULL,
  `subjects_pregnant_women` varchar(255) DEFAULT NULL,
  `subjects_nursing_women` varchar(255) DEFAULT NULL,
  `subjects_emergency_situation` varchar(255) DEFAULT NULL,
  `subjects_incapable_consent` varchar(255) DEFAULT NULL,
  `subjects_specify` text,
  `subjects_others` varchar(255) DEFAULT NULL,
  `subjects_others_specify` text,
  `investigator1_given_name` varchar(255) DEFAULT NULL,
  `investigator1_middle_name` varchar(255) DEFAULT NULL,
  `investigator1_family_name` varchar(255) DEFAULT NULL,
  `investigator1_qualification` varchar(255) DEFAULT NULL,
  `investigator1_professional_address` varchar(255) DEFAULT NULL,
  `organisations_transferred_` varchar(255) DEFAULT NULL,
  `number_participants` text,
  `notification` text,
  `approval_date` date DEFAULT NULL,
  `submitted` tinyint(1) NOT NULL DEFAULT '0',
  `date_submitted` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=302 ;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `trial_status_id` int(11) DEFAULT NULL,
  `abstract_of_study` text,
  `study_title` text,
  `short_title` varchar(255) DEFAULT NULL,
  `protocol_no` varchar(255) DEFAULT NULL,
  `version_no` varchar(255) DEFAULT NULL,
  `date_of_protocol` date DEFAULT NULL,
  `study_drug` varchar(255) DEFAULT NULL,
  `disease_condition` varchar(255) DEFAULT NULL,
  `product_type_biologicals` tinyint(1) DEFAULT NULL,
  `product_type_proteins` tinyint(1) DEFAULT NULL,
  `product_type_immunologicals` tinyint(1) DEFAULT NULL,
  `product_type_vaccines` tinyint(1) DEFAULT NULL,
  `product_type_hormones` tinyint(1) DEFAULT NULL,
  `product_type_toxoid` tinyint(1) DEFAULT NULL,
  `product_type_chemical` tinyint(1) DEFAULT NULL,
  `product_type_medical_device` tinyint(1) DEFAULT NULL,
  `product_type_chemical_name` varchar(255) DEFAULT NULL,
  `product_type_medical_device_name` varchar(255) DEFAULT NULL,
  `ecct_not_applicable` tinyint(1) DEFAULT '0',
  `ecct_ref_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `applicant_covering_letter` tinyint(1) DEFAULT NULL,
  `applicant_protocol` tinyint(1) DEFAULT NULL,
  `applicant_patient_information` tinyint(1) DEFAULT NULL,
  `applicant_investigators_brochure` tinyint(1) DEFAULT NULL,
  `applicant_investigators_cv` tinyint(1) DEFAULT NULL,
  `applicant_signed_declaration` tinyint(1) DEFAULT NULL,
  `applicant_financial_declaration` tinyint(1) DEFAULT NULL,
  `applicant_gmp_certificate` tinyint(1) DEFAULT NULL,
  `applicant_indemnity_cover` tinyint(1) DEFAULT NULL,
  `applicant_opinion_letter` tinyint(1) DEFAULT NULL,
  `applicant_approval_letter` tinyint(1) DEFAULT NULL,
  `applicant_statement` tinyint(1) DEFAULT NULL,
  `applicant_participating_countries` tinyint(1) DEFAULT NULL,
  `applicant_addendum` tinyint(1) DEFAULT NULL,
  `applicant_fees` tinyint(1) DEFAULT NULL,
  `declaration_applicant` varchar(255) DEFAULT NULL,
  `declaration_date1` date DEFAULT NULL,
  `declaration_principal_investigator` varchar(255) DEFAULT NULL,
  `declaration_date2` date DEFAULT NULL,
  `placebo_present` varchar(255) DEFAULT NULL,
  `principal_inclusion_criteria` text,
  `principal_exclusion_criteria` text,
  `primary_end_points` text,
  `scope_diagnosis` tinyint(1) DEFAULT NULL,
  `scope_prophylaxis` tinyint(1) DEFAULT NULL,
  `scope_therapy` tinyint(1) DEFAULT NULL,
  `scope_safety` tinyint(1) DEFAULT NULL,
  `scope_efficacy` tinyint(1) DEFAULT NULL,
  `scope_pharmacokinetic` tinyint(1) DEFAULT NULL,
  `scope_pharmacodynamic` tinyint(1) DEFAULT NULL,
  `scope_bioequivalence` tinyint(1) DEFAULT NULL,
  `scope_dose_response` tinyint(1) DEFAULT NULL,
  `scope_pharmacogenetic` tinyint(1) DEFAULT NULL,
  `scope_pharmacogenomic` tinyint(1) DEFAULT NULL,
  `scope_pharmacoecomomic` tinyint(1) DEFAULT NULL,
  `scope_others` tinyint(1) DEFAULT NULL,
  `scope_others_specify` text,
  `trial_human_pharmacology` tinyint(1) DEFAULT NULL,
  `trial_administration_humans` tinyint(1) DEFAULT NULL,
  `trial_bioequivalence_study` tinyint(1) DEFAULT NULL,
  `trial_other` tinyint(1) DEFAULT NULL,
  `trial_other_specify` text,
  `trial_therapeutic_exploratory` tinyint(1) DEFAULT NULL,
  `trial_therapeutic_confirmatory` tinyint(1) DEFAULT NULL,
  `trial_therapeutic_use` tinyint(1) DEFAULT NULL,
  `design_controlled` varchar(255) DEFAULT NULL,
  `site_capacity` varchar(100) DEFAULT NULL,
  `staff_numbers` text,
  `other_details_explanation` text,
  `other_details_regulatory_notapproved` text,
  `other_details_regulatory_approved` text,
  `other_details_regulatory_rejected` text,
  `other_details_regulatory_halted` text,
  `estimated_duration` varchar(255) DEFAULT NULL,
  `design_controlled_randomised` varchar(255) DEFAULT NULL,
  `design_controlled_open` varchar(255) DEFAULT NULL,
  `design_controlled_single_blind` varchar(255) DEFAULT NULL,
  `design_controlled_double_blind` varchar(255) DEFAULT NULL,
  `design_controlled_parallel_group` varchar(255) DEFAULT NULL,
  `design_controlled_cross_over` varchar(255) DEFAULT NULL,
  `design_controlled_other` varchar(255) DEFAULT NULL,
  `design_controlled_specify` varchar(255) DEFAULT NULL,
  `design_controlled_comparator` varchar(255) DEFAULT NULL,
  `design_controlled_other_medicinal` varchar(255) DEFAULT NULL,
  `design_controlled_placebo` varchar(255) DEFAULT NULL,
  `design_controlled_medicinal_other` varchar(255) DEFAULT NULL,
  `design_controlled_medicinal_specify` varchar(255) DEFAULT NULL,
  `single_site_member_state` varchar(255) DEFAULT NULL,
  `location_of_area` varchar(255) DEFAULT NULL,
  `single_site_physical_address` varchar(255) DEFAULT NULL,
  `single_site_contact_person` varchar(255) DEFAULT NULL,
  `single_site_telephone` varchar(255) DEFAULT NULL,
  `multiple_sites_member_state` varchar(255) DEFAULT NULL,
  `multiple_countries` char(30) DEFAULT NULL,
  `multiple_member_states` varchar(255) DEFAULT NULL,
  `number_of_sites` varchar(255) DEFAULT NULL,
  `multi_country_list` text,
  `data_monitoring_committee` varchar(255) DEFAULT NULL,
  `total_enrolment_per_site` text,
  `total_participants_worldwide` varchar(255) DEFAULT '',
  `population_less_than_18_years` varchar(255) DEFAULT NULL,
  `population_utero` varchar(255) DEFAULT NULL,
  `population_preterm_newborn` varchar(255) DEFAULT NULL,
  `population_newborn` varchar(255) DEFAULT NULL,
  `population_infant_and_toddler` varchar(255) DEFAULT NULL,
  `population_children` varchar(255) DEFAULT NULL,
  `population_adolescent` varchar(255) DEFAULT NULL,
  `population_above_18` char(30) DEFAULT NULL,
  `population_adult` varchar(255) DEFAULT NULL,
  `population_elderly` varchar(255) DEFAULT NULL,
  `gender_female` tinyint(1) DEFAULT NULL,
  `gender_male` tinyint(1) DEFAULT NULL,
  `subjects_healthy` varchar(255) DEFAULT NULL,
  `subjects_patients` varchar(255) DEFAULT NULL,
  `subjects_vulnerable_populations` varchar(255) DEFAULT NULL,
  `subjects_women_child_bearing` varchar(255) DEFAULT NULL,
  `subjects_women_using_contraception` varchar(255) DEFAULT NULL,
  `subjects_pregnant_women` varchar(255) DEFAULT NULL,
  `subjects_nursing_women` varchar(255) DEFAULT NULL,
  `subjects_emergency_situation` varchar(255) DEFAULT NULL,
  `subjects_incapable_consent` varchar(255) DEFAULT NULL,
  `subjects_specify` text,
  `subjects_others` varchar(255) DEFAULT NULL,
  `subjects_others_specify` text,
  `investigator1_given_name` varchar(255) DEFAULT NULL,
  `investigator1_middle_name` varchar(255) DEFAULT NULL,
  `investigator1_family_name` varchar(255) DEFAULT NULL,
  `investigator1_qualification` varchar(255) DEFAULT NULL,
  `investigator1_professional_address` varchar(255) DEFAULT NULL,
  `investigator1_telephone` varchar(255) DEFAULT NULL,
  `investigator1_email` varchar(255) DEFAULT NULL,
  `organisations_transferred_` varchar(255) DEFAULT NULL,
  `number_participants` text,
  `notification` text,
  `approval_date` date DEFAULT NULL,
  `submitted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_date` datetime DEFAULT NULL,
  `deactivated` tinyint(1) NOT NULL,
  `date_submitted` datetime DEFAULT NULL,
  `approved` tinyint(2) NOT NULL DEFAULT '0',
  `approved_reason` text,
  `final_report` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=637 ;

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=427 ;

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) NOT NULL,
  `dirname` varchar(255) DEFAULT NULL,
  `basename` varchar(255) NOT NULL,
  `checksum` varchar(255) NOT NULL,
  `alternative` varchar(50) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `description` text,
  `year` char(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9650 ;

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE IF NOT EXISTS `counties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `county_name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(2) CHARACTER SET latin1 DEFAULT '',
  `name` tinytext CHARACTER SET latin1,
  `name_fr` tinytext CHARACTER SET latin1,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=250 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `feedback` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=194 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `investigator_contacts`
--

CREATE TABLE IF NOT EXISTS `investigator_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `given_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `family_name` varchar(100) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `professional_address` varchar(255) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=407 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL,
  `content` text,
  `type` char(30) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` char(70) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `system_message` text,
  `user_message` text,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2803 ;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone_number` varchar(255) DEFAULT NULL,
  `all_tasks` char(30) DEFAULT NULL,
  `monitoring` char(30) DEFAULT NULL,
  `regulatory` char(30) DEFAULT NULL,
  `investigator_recruitment` char(30) DEFAULT NULL,
  `ivrs_treatment_randomisation` char(30) DEFAULT NULL,
  `data_management` char(30) DEFAULT NULL,
  `e_data_capture` char(30) DEFAULT NULL,
  `susar_reporting` char(30) DEFAULT NULL,
  `quality_assurance_auditing` char(30) DEFAULT NULL,
  `statistical_analysis` char(30) DEFAULT NULL,
  `medical_writing` char(30) DEFAULT NULL,
  `other_duties` char(30) DEFAULT NULL,
  `other_duties_specify` text,
  `misc` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=347 ;

-- --------------------------------------------------------

--
-- Table structure for table `placebos`
--

CREATE TABLE IF NOT EXISTS `placebos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `placebo_present` varchar(30) DEFAULT NULL,
  `pharmaceutical_form` varchar(255) DEFAULT NULL,
  `route_of_administration` varchar(255) DEFAULT NULL,
  `composition` varchar(255) DEFAULT NULL,
  `identical_indp` varchar(30) DEFAULT NULL,
  `major_ingredients` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=325 ;

-- --------------------------------------------------------

--
-- Table structure for table `previous_dates`
--

CREATE TABLE IF NOT EXISTS `previous_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `date_of_previous_protocol` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=339 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE IF NOT EXISTS `reviewers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `description` text,
  `notified` tinyint(1) DEFAULT '0',
  `accepted` char(30) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `type` char(30) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `recommendation` text,
  `notified` tinyint(2) DEFAULT '0',
  `accepted` char(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=661 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_details`
--

CREATE TABLE IF NOT EXISTS `site_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `physical_address` varchar(255) DEFAULT NULL,
  `contact_details` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `site_capacity` varchar(30) DEFAULT NULL,
  `misc` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=517 ;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) DEFAULT NULL,
  `sponsor` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone_number` varchar(255) DEFAULT NULL,
  `fax_number` varchar(255) DEFAULT NULL,
  `cell_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=325 ;

-- --------------------------------------------------------

--
-- Table structure for table `trial_statuses`
--

CREATE TABLE IF NOT EXISTS `trial_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `confirm_password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` char(40) DEFAULT NULL,
  `name_of_institution` varchar(255) DEFAULT NULL,
  `institution_physical` varchar(255) DEFAULT NULL,
  `institution_address` varchar(255) DEFAULT NULL,
  `institution_contact` varchar(255) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `activation_key` varchar(200) DEFAULT NULL,
  `forgot_password` tinyint(2) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `deactivated` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=410 ;
