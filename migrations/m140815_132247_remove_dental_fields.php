<?php

class m140815_132247_remove_dental_fields extends OEMigration
{
	public function up()
	{
		$this->dropTable('ophcianassessment_medical_history_dental_assignment_version');
		$this->dropTable('ophcianassessment_medical_history_dental_assignment');

		$this->dropTable('ophcianassessment_medical_history_dental_version');
		$this->dropTable('ophcianassessment_medical_history_dental');

		$this->dropColumn('et_ophcianassessment_medical_history_review','teeth_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review_version','teeth_other');
	}

	public function down()
	{
		$this->addColumn('et_ophcianassessment_medical_history_review','teeth_other','varchar(255) null');
		$this->addColumn('et_ophcianassessment_medical_history_review_version','teeth_other','varchar(255) null');

		$this->execute("CREATE TABLE `ophcianassessment_medical_history_dental` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`default` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophcianassessment_medical_history_dental_lmui_fk` (`last_modified_user_id`),
	KEY `ophcianassessment_medical_history_dental_cui_fk` (`created_user_id`),
	CONSTRAINT `ophcianassessment_medical_history_dental_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_medical_history_dental_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophcianassessment_medical_history_dental');

		$this->execute("CREATE TABLE `ophcianassessment_medical_history_dental_assignment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`dental_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophcianassessment_medical_history_dental_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `ophcianassessment_medical_history_dental_assignment_cui_fk` (`created_user_id`),
	KEY `ophcianassessment_medical_history_dental_assignment_ele_fk` (`element_id`),
	KEY `ophcianassessment_medical_history_dental_assignment_lku_fk` (`dental_id`),
	CONSTRAINT `ophcianassessment_medical_history_dental_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_medical_history_dental_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_medical_history_dental_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`),
	CONSTRAINT `ophcianassessment_medical_history_dental_assignment_lku_fk` FOREIGN KEY (`dental_id`) REFERENCES `ophcianassessment_medical_history_dental` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophcianassessment_medical_history_dental_assignment');
	}
}
