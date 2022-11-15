ALTER TABLE `sadrs` ADD `reaction` LONGTEXT NOT NULL AFTER `diagnosis`;
ALTER TABLE `sadrs` CHANGE `reaction` `reaction` VARCHAR(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;