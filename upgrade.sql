ALTER TABLE `sadrs` ADD `reaction` LONGTEXT NOT NULL AFTER `diagnosis`;
ALTER TABLE `sadrs` CHANGE `reaction` `reaction` VARCHAR(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE `pqmps` ADD `adverse_reaction` TINYINT NOT NULL DEFAULT '0' AFTER `contact_number`, ADD `medication_error` TINYINT NOT NULL DEFAULT '0' AFTER `adverse_reaction`;
ALTER TABLE `pqmps` CHANGE `adverse_reaction` `adverse_reaction` VARCHAR(255) NULL DEFAULT NULL, CHANGE `medication_error` `medication_error` VARCHAR(255) NULL DEFAULT NULL;
ALTER TABLE `sadrs` ADD `pqmp_id` INT(11) NULL DEFAULT NULL AFTER `user_id`;
ALTER TABLE `transfusions` ADD `pqmp_id` INT(11) NULL DEFAULT NULL AFTER `user_id`
ALTER TABLE `devices` ADD `pqmp_id` INT(11) NULL DEFAULT NULL AFTER `user_id`
ALTER TABLE `aefis` ADD `pqmp_id` INT(11) NULL DEFAULT NULL AFTER `user_id`
ALTER TABLE `medications` ADD `pqmp_id` INT(11) NULL DEFAULT NULL AFTER `user_id`


-- Report Assignment --
ALTER TABLE `aefis` ADD `assigned_to` INT(11) NULL AFTER `reporter_date_diff`, ADD `assigned_by` INT(11) NULL AFTER `assigned_to`, ADD `assigned_date` DATETIME NULL AFTER `assigned_by`;
ALTER TABLE `sadrs` ADD `assigned_to` INT(11) NULL AFTER `reporter_date_diff`, ADD `assigned_by` INT(11) NULL AFTER `assigned_to`, ADD `assigned_date` DATETIME NULL AFTER `assigned_by`;
ALTER TABLE `pqmps` ADD `assigned_to` INT(11) NULL AFTER `reporter_date_diff`, ADD `assigned_by` INT(11) NULL AFTER `assigned_to`, ADD `assigned_date` DATETIME NULL AFTER `assigned_by`;
ALTER TABLE `devices` ADD `assigned_to` INT(11) NULL AFTER `reporter_date_diff`, ADD `assigned_by` INT(11) NULL AFTER `assigned_to`, ADD `assigned_date` DATETIME NULL AFTER `assigned_by`;
ALTER TABLE `medications` ADD `assigned_to` INT(11) NULL AFTER `reporter_date_diff`, ADD `assigned_by` INT(11) NULL AFTER `assigned_to`, ADD `assigned_date` DATETIME NULL AFTER `assigned_by`;
ALTER TABLE `transfusions` ADD `assigned_to` INT(11) NULL AFTER `reporter_date_diff`, ADD `assigned_by` INT(11) NULL AFTER `assigned_to`, ADD `assigned_date` DATETIME NULL AFTER `assigned_by`;
ALTER TABLE `padrs` ADD `assigned_to` INT(11) NULL AFTER `reporter_date_diff`, ADD `assigned_by` INT(11) NULL AFTER `assigned_to`, ADD `assigned_date` DATETIME NULL AFTER `assigned_by`;
ALTER TABLE `saes` ADD `assigned_to` INT(11) NULL AFTER `reporter_email`, ADD `assigned_by` INT(11) NULL AFTER `assigned_to`, ADD `assigned_date` DATETIME NULL AFTER `assigned_by`;


-- Ce2b report

ALTER TABLE `ce2bs` ADD `reporter_name` VARCHAR(255) NULL DEFAULT NULL AFTER `submitted_date`, ADD `reporter_designation` INT(11) NULL DEFAULT NULL AFTER `reporter_name`, ADD `reporter_phone` VARCHAR(100) NULL DEFAULT NULL AFTER `reporter_designation`, ADD `reporter_date` DATE NULL DEFAULT NULL AFTER `reporter_phone`, ADD `person_submitting` VARCHAR(50) NULL DEFAULT NULL AFTER `reporter_date`, ADD `reporter_name_diff` VARCHAR(255) NULL DEFAULT NULL AFTER `person_submitting`, ADD `reporter_designation_diff` INT(11) NULL DEFAULT NULL AFTER `reporter_name_diff`, ADD `reporter_email_diff` VARCHAR(255) NULL DEFAULT NULL AFTER `reporter_designation_diff`, ADD `reporter_phone_diff` VARCHAR(255) NULL DEFAULT NULL AFTER `reporter_email_diff`, ADD `reporter_date_diff` DATE NULL DEFAULT NULL AFTER `reporter_phone_diff`;

-- Imports

CREATE TABLE `imports` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;