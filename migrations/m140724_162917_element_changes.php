<?php

class m140724_162917_element_changes extends OEMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophcianassessment_procedures_eye_id_fk','et_ophcianassessment_procedures');
		$this->dropColumn('et_ophcianassessment_procedures','eye_id');
		$this->dropColumn('et_ophcianassessment_procedures_version','eye_id');

		$this->addColumn('et_ophcianassessment_procedures','procedures_verified','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianassessment_procedures_version','procedures_verified','tinyint(1) unsigned not null');

		$this->dropTable('ophcianassessment_procedures_procedure_assignment_version');
		$this->dropTable('ophcianassessment_procedures_procedure_assignment');
	}

	public function down()
	{
		$this->execute("CREATE TABLE `ophcianassessment_procedures_procedure_assignment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`proc_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophcianassessment_procedures_procedure_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `ophcianassessment_procedures_procedure_assignment_cui_fk` (`created_user_id`),
	KEY `ophcianassessment_procedures_procedure_assignment_ele_fk` (`element_id`),
	KEY `ophcianassessment_procedures_procedure_assignment_pro_fk` (`proc_id`),
	CONSTRAINT `ophcianassessment_procedures_procedure_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_procedures_procedure_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_procedures_procedure_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_procedures` (`id`),
	CONSTRAINT `ophcianassessment_procedures_procedure_assignment_pro_fk` FOREIGN KEY (`proc_id`) REFERENCES `proc` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophcianassessment_procedures_procedure_assignment');

		$this->dropColumn('et_ophcianassessment_procedures_version','procedures_verified');
		$this->dropColumn('et_ophcianassessment_procedures','procedures_verified');

		$this->addColumn('et_ophcianassessment_procedures_version','eye_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_procedures','eye_id','int(10) unsigned null');
		$this->addForeignKey('et_ophcianassessment_procedures_eye_id_fk','et_ophcianassessment_procedures','eye_id','eye','id');
	}
}
