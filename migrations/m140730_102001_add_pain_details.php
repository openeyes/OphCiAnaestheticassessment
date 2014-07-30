<?php

class m140730_102001_add_pain_details extends OEMigration
{
	public function up()
	{
		$this->createPainLocation();
		$this->createPainType();
		$this->refreshTableSchema('et_ophcianassessment_medical_history_review');
	}

	public function down()
	{
		$this->destroyPainLocation();
		$this->destroyPainType();
		$this->refreshTableSchema('et_ophcianassessment_medical_history_review');
	}

	private function createPainLocation()
	{
		// Create pain location lookup table.
		$this->createTable('ophcianassessment_medical_history_pain_loc', array(
			'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
			'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
			'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'PRIMARY KEY (`id`)',
			'KEY `ophcianassessment_medical_history_pain_loc_lmui_fk` (`last_modified_user_id`)',
			'KEY `ophcianassessment_medical_history_pain_loc_cui_fk` (`created_user_id`)',
			'CONSTRAINT `ophcianassessment_medical_history_pain_loc_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
			'CONSTRAINT `ophcianassessment_medical_history_pain_loc_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// Create version table for lookup table.
		$this->versionExistingTable('ophcianassessment_medical_history_pain_loc');

		// Add some options to the lookup table.
		$this->insert('ophcianassessment_medical_history_pain_loc',array('name'=>'Muscular','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_pain_loc',array('name'=>'Skeletal','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_pain_loc',array('name'=>'Cardiac','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_pain_loc',array('name'=>'Pleura','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_pain_loc',array('name'=>'Chest pain','display_order'=>5));

		// Create FK reference.
		$this->addColumn('et_ophcianassessment_medical_history_review','pain_location_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_medical_history_review_version','pain_location_id','int(10) unsigned null');
		$this->addForeignKey(
			'ophcianassessment_medical_history_pain_loc_fk',
			'et_ophcianassessment_medical_history_review',
			'pain_location_id',
			'ophcianassessment_medical_history_pain_loc',
			'id'
		);
	}

	private function createPainType()
	{
		// Create pain type lookup table.
		$this->createTable('ophcianassessment_medical_history_pain_type', array(
			'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
			'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
			'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'PRIMARY KEY (`id`)',
			'KEY `ophcianassessment_medical_history_pain_type_lmui_fk` (`last_modified_user_id`)',
			'KEY `ophcianassessment_medical_history_pain_type_cui_fk` (`created_user_id`)',
			'CONSTRAINT `ophcianassessment_medical_history_pain_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
			'CONSTRAINT `ophcianassessment_medical_history_pain_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// Create version table for lookup table.
		$this->versionExistingTable('ophcianassessment_medical_history_pain_type');

		// Add some options to the lookup table.
		$this->insert('ophcianassessment_medical_history_pain_type',array('name'=>'Acute','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_pain_type',array('name'=>'Chronic','display_order'=>2));

		// Create FK reference.
		$this->addColumn('et_ophcianassessment_medical_history_review','pain_type_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_medical_history_review_version','pain_type_id','int(10) unsigned null');
		$this->addForeignKey(
			'ophcianassessment_medical_history_pain_type_fk',
			'et_ophcianassessment_medical_history_review',
			'pain_type_id',
			'ophcianassessment_medical_history_pain_type',
			'id'
		);
	}

	private function destroyPainLocation()
	{
		$this->dropForeignKey('ophcianassessment_medical_history_pain_loc_fk', 'et_ophcianassessment_medical_history_review');

		$this->dropColumn('et_ophcianassessment_medical_history_review','pain_location_id');
		$this->dropColumn('et_ophcianassessment_medical_history_review_version','pain_location_id');

		$this->dropTable('ophcianassessment_medical_history_pain_loc');
		$this->dropTable('ophcianassessment_medical_history_pain_loc_version');
	}

	private function destroyPainType()
	{
		$this->dropForeignKey('ophcianassessment_medical_history_pain_type_fk', 'et_ophcianassessment_medical_history_review');

		$this->dropColumn('et_ophcianassessment_medical_history_review','pain_type_id');
		$this->dropColumn('et_ophcianassessment_medical_history_review_version','pain_type_id');

		$this->dropTable('ophcianassessment_medical_history_pain_type');
		$this->dropTable('ophcianassessment_medical_history_pain_type_version');
	}
}