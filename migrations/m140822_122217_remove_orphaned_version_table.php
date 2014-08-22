<?php

class m140822_122217_remove_orphaned_version_table extends CDbMigration
{
	public function up()
	{
		$this->dropTable('ophcianassessment_speced_diabetes_assignment_version');
	}

	public function down()
	{
		$this->execute("CREATE TABLE `ophcianassessment_speced_diabetes_assignment_version` (
	`id` int(10) unsigned NOT NULL,
	`element_id` int(10) unsigned NOT NULL,
	`item_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`version_date` datetime NOT NULL,
	`version_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`version_id`),
	KEY `ophcianassessment_speced_diabetes_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `ophcianassessment_speced_diabetes_assignment_cui_fk` (`created_user_id`),
	KEY `ophcianassessment_speced_diabetes_assignment_ele_fk` (`element_id`),
	KEY `ophcianassessment_speced_diabetes_assignment_idi_fk` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
	}
}
