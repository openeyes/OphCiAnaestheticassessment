<?php

class m140723_073640_field_changes extends OEMigration
{
	public function up()
	{
		$this->dropTable('ophcianassessment_patient_identifier_assignment_version');
		$this->dropTable('ophcianassessment_patient_identifier_assignment');
		$this->dropTable('ophcianassessment_patient_identifier_version');
		$this->dropTable('ophcianassessment_patient_identifier');

		$this->addColumn('et_ophcianassessment_patient','guardian_name','varchar(255) null');

		$this->createTable('ophcianassessment_patient_guardian_relationship', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_patient_guardian_relationship_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_patient_guardian_relationship_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_patient_guardian_relationship_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_patient_guardian_relationship_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophcianassessment_patient_guardian_relationship');

		$this->addColumn('et_ophcianassessment_patient','guardian_relationship_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_patient_version','guardian_relationship_id','int(10) unsigned null');
		$this->createIndex('et_ophcianassessment_patient_guardian_relationship_id_fk','et_ophcianassessment_patient','guardian_relationship_id');
		$this->addForeignKey('et_ophcianassessment_patient_guardian_relationship_id_fk','et_ophcianassessment_patient','guardian_relationship_id','ophcianassessment_patient_guardian_relationship','id');

		$this->addColumn('et_ophcianassessment_patient','guardian_relationship_other','varchar(255) not null');
		$this->addColumn('et_ophcianassessment_patient_version','guardian_relationship_other','varchar(255) not null');

		$this->initialiseData(dirname(__FILE__));
	}

	public function down()
	{
		$this->dropColumn('et_ophcianassessment_patient_version','guardian_relationship_other');
		$this->dropColumn('et_ophcianassessment_patient','guardian_relationship_other');

		$this->dropForeignKey('et_ophcianassessment_patient_guardian_relationship_id_fk','et_ophcianassessment_patient');
		$this->dropColumn('et_ophcianassessment_patient','guardian_relationship_id');
		$this->dropColumn('et_ophcianassessment_patient_version','guardian_relationship_id');

		$this->dropTable('ophcianassessment_patient_guardian_relationship_version');
		$this->dropTable('ophcianassessment_patient_guardian_relationship');

		$this->dropColumn('et_ophcianassessment_patient','guardian_name');

		$this->execute("CREATE TABLE `ophcianassessment_patient_identifier` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) COLLATE utf8_bin NOT NULL,
	`display_order` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophcianassessment_patient_identifier_lmui_fk` (`last_modified_user_id`),
	KEY `ophcianassessment_patient_identifier_cui_fk` (`created_user_id`),
	CONSTRAINT `ophcianassessment_patient_identifier_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_patient_identifier_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophcianassessment_patient_identifier');

		$this->execute("CREATE TABLE `ophcianassessment_patient_identifier_assignment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`identifier_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophcianassessment_patient_identifier_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `ophcianassessment_patient_identifier_assignment_cui_fk` (`created_user_id`),
	KEY `ophcianassessment_patient_identifier_assignment_ele_fk` (`element_id`),
	KEY `ophcianassessment_patient_identifier_assignment_idi_fk` (`identifier_id`),
	CONSTRAINT `ophcianassessment_patient_identifier_assignment_idi_fk` FOREIGN KEY (`identifier_id`) REFERENCES `ophcianassessment_patient_identifier` (`id`),
	CONSTRAINT `ophcianassessment_patient_identifier_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_patient_identifier_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_patient` (`id`),
	CONSTRAINT `ophcianassessment_patient_identifier_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophcianassessment_patient_identifier_assignment');
	}
}
