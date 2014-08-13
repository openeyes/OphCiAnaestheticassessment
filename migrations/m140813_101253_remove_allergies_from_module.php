<?php

class m140813_101253_remove_allergies_from_module extends OEMigration
{
	public function up()
	{
		$this->dropTable('ophcianassessment_medical_history_allergy_version');
		$this->dropTable('ophcianassessment_medical_history_allergy');

		$this->dropColumn('et_ophcianassessment_medical_history_review','patient_has_no_allergies');
		$this->dropColumn('et_ophcianassessment_medical_history_review_version','patient_has_no_allergies');
	}

	public function down()
	{
		$this->addColumn('et_ophcianassessment_medical_history_review','patient_has_no_allergies','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianassessment_medical_history_review_version','patient_has_no_allergies','tinyint(1) unsigned not null');

		$this->execute("CREATE TABLE `ophcianassessment_medical_history_allergy` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`allergy_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophcianassessment_medical_history_allergy_lmui_fk` (`last_modified_user_id`),
	KEY `ophcianassessment_medical_history_allergy_cui_fk` (`created_user_id`),
	KEY `ophcianassessment_medical_history_allergy_element_id_fk` (`element_id`),
	KEY `ophcianassessment_medical_history_allergy_allergy_id_fk` (`allergy_id`),
	CONSTRAINT `ophcianassessment_medical_history_allergy_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_medical_history_allergy_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_medical_history_allergy_element_id_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`),
	CONSTRAINT `ophcianassessment_medical_history_allergy_allergy_id_fk` FOREIGN KEY (`allergy_id`) REFERENCES `allergy` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophcianassessment_medical_history_allergy');
	}
}
