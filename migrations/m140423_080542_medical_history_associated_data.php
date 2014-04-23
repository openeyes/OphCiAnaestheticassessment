<?php

class m140423_080542_medical_history_associated_data extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophcianassessment_medical_history_medication', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'drug_id' => 'int(10) unsigned not null',
				'route_id' => 'int(10) unsigned not null',
				'option_id' => 'int(10) unsigned null',
				'frequency_id' => 'int(10) unsigned not null',
				'start_date' => 'date not null',
				'end_date' => 'date default null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_medication_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_medication_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_medication_element_id_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_medication_drug_id_fk` (`drug_id`)',
				'KEY `ophcianassessment_medical_history_medication_route_id_fk` (`route_id`)',
				'KEY `ophcianassessment_medical_history_medication_option_id_fk` (`option_id`)',
				'KEY `ophcianassessment_medical_history_medication_frequency_id_fk` (`frequency_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_medication_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_medication_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_medication_element_id_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_medication_drug_id_fk` FOREIGN KEY (`drug_id`) REFERENCES `drug` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_medication_route_id_fk` FOREIGN KEY (`route_id`) REFERENCES `drug_route` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_medication_option_id_fk` FOREIGN KEY (`option_id`) REFERENCES `drug_route_option` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_medication_frequency_id_fk` FOREIGN KEY (`frequency_id`) REFERENCES `drug_frequency` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianassessment_medical_history_allergy', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'allergy_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_allergy_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_allergy_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_allergy_element_id_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_allergy_allergy_id_fk` (`allergy_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_allergy_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_allergy_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_allergy_element_id_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_allergy_allergy_id_fk` FOREIGN KEY (`allergy_id`) REFERENCES `allergy` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('ophcianassessment_medical_history_allergy');
		$this->dropTable('ophcianassessment_medical_history_medication');
	}
}
