SET FOREIGN_KEY_CHECKS=0
;

DROP TABLE IF EXISTS `enterprises` CASCADE
;

DROP TABLE IF EXISTS `personal_data_activities` CASCADE
;

DROP TABLE IF EXISTS `personal_data_uses` CASCADE
;

DROP TABLE IF EXISTS `sectors` CASCADE
;

DROP TABLE IF EXISTS `user_enterprises` CASCADE
;

DROP TABLE IF EXISTS `users` CASCADE
;

CREATE TABLE `enterprises`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`sector_id` BIGINT NULL,
	`personal_data_use_id` BIGINT NULL,
	`personal_data_activity_id` BIGINT NULL,
	`bussines_name` VARCHAR(100) NULL,
	`ci_ruc` VARCHAR(13) NULL,
	`created_at` TIMESTAMP NULL,
	`created_by` BIGINT NULL,
	`updated_at` TIMESTAMP NULL,
	`updated_by` BIGINT NULL,
	`deleted_at` TIMESTAMP NULL,
	`deleted_by` BIGINT NULL,
	CONSTRAINT `PK_enterprises` PRIMARY KEY (`id` ASC)
)
;

CREATE TABLE `personal_data_activities`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	CONSTRAINT `PK_personal_data_uses` PRIMARY KEY (`id` ASC)
)
;

CREATE TABLE `personal_data_uses`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	CONSTRAINT `PK_personal_data_uses` PRIMARY KEY (`id` ASC)
)
;

CREATE TABLE `sectors`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	CONSTRAINT `PK_sectors` PRIMARY KEY (`id` ASC)
)
;

CREATE TABLE `user_enterprises`
(
	`user_id` BIGINT NOT NULL,
	`enterprise_id` BIGINT NOT NULL,
	`paid` BOOL NULL
)
;

CREATE TABLE `users`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NULL,
	`email_verified_at` DATETIME NULL,
	`password` VARCHAR(255) NOT NULL,
	`remember_token` VARCHAR(100) NULL,
	`profile_photo_path` VARCHAR(2048) NULL,
	`created_at` TIMESTAMP NULL,
	`created_by` BIGINT NULL,
	`updated_at` TIMESTAMP NULL,
	`updated_by` BIGINT NULL,
	`deleted_at` TIMESTAMP NULL,
	`deleted_by` BIGINT NULL,
	CONSTRAINT `PK_users` PRIMARY KEY (`id` ASC)
)
;

ALTER TABLE `enterprises` 
 ADD INDEX `IXFK_enterprises_personal_data_activities` (`personal_data_activity_id` ASC)
;

ALTER TABLE `enterprises` 
 ADD INDEX `IXFK_enterprises_personal_data_uses` (`personal_data_use_id` ASC)
;

ALTER TABLE `enterprises` 
 ADD INDEX `IXFK_enterprises_sectors` (`sector_id` ASC)
;

ALTER TABLE `user_enterprises` 
 ADD INDEX `IXFK_user_enterprises_enterprises` (`enterprise_id` ASC)
;

ALTER TABLE `user_enterprises` 
 ADD INDEX `IXFK_user_enterprises_users` (`user_id` ASC)
;

ALTER TABLE `enterprises` 
 ADD CONSTRAINT `FK_enterprises_personal_data_activities`
	FOREIGN KEY (`personal_data_activity_id`) REFERENCES `personal_data_activities` (`id`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `enterprises` 
 ADD CONSTRAINT `FK_enterprises_personal_data_uses`
	FOREIGN KEY (`personal_data_use_id`) REFERENCES `personal_data_uses` (`id`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `enterprises` 
 ADD CONSTRAINT `FK_enterprises_sectors`
	FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `user_enterprises` 
 ADD CONSTRAINT `FK_user_enterprises_enterprises`
	FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `user_enterprises` 
 ADD CONSTRAINT `FK_user_enterprises_users`
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE Restrict ON UPDATE Restrict
;

SET FOREIGN_KEY_CHECKS=1
;

