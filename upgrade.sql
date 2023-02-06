ALTER TABLE `sadrs` ADD `reaction` LONGTEXT NOT NULL AFTER `diagnosis`;
ALTER TABLE `sadrs` CHANGE `reaction` `reaction` VARCHAR(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE `pqmps` ADD `adverse_reaction` TINYINT NOT NULL DEFAULT '0' AFTER `contact_number`, ADD `medication_error` TINYINT NOT NULL DEFAULT '0' AFTER `adverse_reaction`;
ALTER TABLE `pqmps` CHANGE `adverse_reaction` `adverse_reaction` VARCHAR(255) NULL DEFAULT NULL, CHANGE `medication_error` `medication_error` VARCHAR(255) NULL DEFAULT NULL;
ALTER TABLE `sadrs` ADD `pqmp_id` INT(11) NULL DEFAULT NULL AFTER `user_id`;