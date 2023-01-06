ALTER TABLE `aefis` ADD `initial_id` INT(11) NULL DEFAULT NULL AFTER `aefi_id`;
ALTER TABLE `adrs` ADD `initial_id` INT(11) NULL DEFAULT NULL AFTER `adr_id`;
ALTER TABLE `saefis` ADD `initial_id` INT(11) NULL DEFAULT NULL AFTER `saefi_id`