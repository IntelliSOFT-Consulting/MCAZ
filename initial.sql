ALTER TABLE `aefis` ADD `initial_id` INT(11) NULL DEFAULT NULL AFTER `aefi_id`;
ALTER TABLE `adrs` ADD `initial_id` INT(11) NULL DEFAULT NULL AFTER `adr_id`;
ALTER TABLE `saefis` ADD `initial_id` INT(11) NULL DEFAULT NULL AFTER `saefi_id`
ALTER TABLE `sadrs` ADD `initial_id` INT(11) NULL DEFAULT NULL AFTER `sadr_id`
UPDATE sadrs SET initial_id=sadr_id WHERE report_type='FollowUp';

-- Action Date 

ALTER TABLE `sadrs` ADD `action_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `modified`;
ALTER TABLE `adrs` ADD `action_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `modified`;
ALTER TABLE `aefis` ADD `action_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `modified`;
ALTER TABLE `saefis` ADD `action_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `modified`;
ALTER TABLE `ce2bs` ADD `action_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `modified`;

ALTER TABLE `aefi_list_of_vaccines` ADD `manufacturer` VARCHAR(255) NULL DEFAULT NULL AFTER `vaccine_name`;
ALTER TABLE `aefis` ADD `age_group` VARCHAR(255) NOT NULL AFTER `age_at_onset_specify`;
ALTER TABLE `aefis` ADD `female_status` VARCHAR(255) NULL DEFAULT NULL AFTER `gender`;