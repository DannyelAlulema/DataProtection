SET FOREIGN_KEY_CHECKS=0
;

DROP TABLE IF EXISTS `appointment_states` CASCADE
;

DROP TABLE IF EXISTS `appointments` CASCADE
;

DROP TABLE IF EXISTS `enterprises` CASCADE
;

DROP TABLE IF EXISTS `pay_request_states` CASCADE
;

DROP TABLE IF EXISTS `pay_requests` CASCADE
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

CREATE TABLE `appointment_states`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NULL,
	`code` INT NULL,
	`alias` VARCHAR(50) NULL,
	CONSTRAINT `PK_appointment_states` PRIMARY KEY (`id` ASC)
)
;

CREATE TABLE `appointments`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`appointment_state_id` BIGINT NOT NULL,
	`user_enterprise_id` BIGINT NOT NULL,
	`date` DATE NOT NULL,
	`start_at` TIME NOT NULL,
	`end_at` TIME NOT NULL,
	`created_at` TIMESTAMP NULL,
	`created_by` BIGINT NULL,
	`updated_at` TIMESTAMP NULL,
	`updated_by` BIGINT NULL,
	`deleted_at` TIMESTAMP NULL,
	`deleted_by` BIGINT NULL,
	CONSTRAINT `PK_appointments` PRIMARY KEY (`id` ASC)
)
;

CREATE TABLE `enterprises`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`sector_id` BIGINT NULL,
	`personal_data_use_id` BIGINT NULL,
	`personal_data_activity_id` BIGINT NULL,
	`address` VARCHAR(255) NULL,
	`bussines_name` VARCHAR(100) NULL,
	`description` VARCHAR(255) NULL,
	`email` VARCHAR(50) NULL,
	`legal_representative` VARCHAR(50) NULL,
	`ci_ruc` VARCHAR(13) NULL,
	`phone_number` VARCHAR(10) NULL,
	`created_at` TIMESTAMP NULL,
	`created_by` BIGINT NULL,
	`updated_at` TIMESTAMP NULL,
	`updated_by` BIGINT NULL,
	`deleted_at` TIMESTAMP NULL,
	`deleted_by` BIGINT NULL,
	CONSTRAINT `PK_enterprises` PRIMARY KEY (`id` ASC)
)
;

CREATE TABLE `pay_request_states`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NULL,
	`code` INT NULL,
	`alias` VARCHAR(50) NULL,
	CONSTRAINT `PK_paid_request_states` PRIMARY KEY (`id` ASC)
)
;

CREATE TABLE `pay_requests`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`pay_request_state_id` BIGINT NOT NULL,
	`user_enterprise_id` BIGINT NOT NULL,
	`detail` TEXT NULL,
	`voucher_path` VARCHAR(255) NOT NULL,
	`created_at` TIMESTAMP NULL,
	`created_by` BIGINT NULL,
	`updated_at` TIMESTAMP NULL,
	`updated_by` BIGINT NULL,
	`deleted_at` TIMESTAMP NULL,
	`deleted_by` BIGINT NULL,
	CONSTRAINT `PK_paid_requests` PRIMARY KEY (`id` ASC)
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
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`user_id` BIGINT NOT NULL,
	`enterprise_id` BIGINT NOT NULL,
	`paid` BOOL NULL,
	`created_at` TIMESTAMP NOT NULL,
	`created_by` BIGINT NULL,
	`updated_at` TIMESTAMP NULL,
	`updated_by` BIGINT NULL,
	`deleted_at` TIMESTAMP NULL,
	`deleted_by` BIGINT NULL,
	CONSTRAINT `PK_user_enterprises` PRIMARY KEY (`id` ASC)
)
;

CREATE TABLE `users`
(
	`id` BIGINT NOT NULL AUTO_INCREMENT,
	`ci_ruc` VARCHAR(13) NULL,
	`name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NULL,
	`email_verified_at` DATETIME NULL,
	`password` VARCHAR(255) NOT NULL,
	`remember_token` VARCHAR(100) NULL,
	`phone_number` VARCHAR(10) NULL,
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

ALTER TABLE `appointments` 
 ADD INDEX `IXFK_appointments_appointment_states` (`appointment_state_id` ASC)
;

ALTER TABLE `appointments` 
 ADD INDEX `IXFK_appointments_user_enterprises` (`user_enterprise_id` ASC)
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

ALTER TABLE `pay_requests` 
 ADD INDEX `IXFK_paid_requests_paid_request_states` (`pay_request_state_id` ASC)
;

ALTER TABLE `pay_requests` 
 ADD INDEX `IXFK_paid_requests_user_enterprises` (`user_enterprise_id` ASC)
;

ALTER TABLE `user_enterprises` 
 ADD INDEX `IXFK_user_enterprises_enterprises` (`enterprise_id` ASC)
;

ALTER TABLE `user_enterprises` 
 ADD INDEX `IXFK_user_enterprises_users` (`user_id` ASC)
;

ALTER TABLE `appointments` 
 ADD CONSTRAINT `FK_appointments_appointment_states`
	FOREIGN KEY (`appointment_state_id`) REFERENCES `appointment_states` (`id`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `appointments` 
 ADD CONSTRAINT `FK_appointments_user_enterprises`
	FOREIGN KEY (`user_enterprise_id`) REFERENCES `user_enterprises` (`id`) ON DELETE Restrict ON UPDATE Restrict
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

ALTER TABLE `pay_requests` 
 ADD CONSTRAINT `FK_paid_requests_paid_request_states`
	FOREIGN KEY (`pay_request_state_id`) REFERENCES `pay_request_states` (`id`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `pay_requests` 
 ADD CONSTRAINT `FK_paid_requests_user_enterprises`
	FOREIGN KEY (`user_enterprise_id`) REFERENCES `user_enterprises` (`id`) ON DELETE Restrict ON UPDATE Restrict
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

