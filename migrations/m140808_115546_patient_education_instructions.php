<?php

class m140808_115546_patient_education_instructions extends OEMigration
{
	public function up()
	{
		// Remove existing instructions and assignments
		$this->delete('ophcianassessment_speced_instructions_assignment');
		$this->delete('ophcianassessment_speced_instructions');

		// Create instruction categories table
		$this->createTable('ophcianassessment_speced_instruc_cat', array(
			'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
			'name' => 'varchar(255) not null',
			'active' => 'boolean not null default true',
			'display_order' => 'tinyint(1) unsigned not null',
			'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'PRIMARY KEY (`id`)',
			'KEY `ophcianassessment_speced_instruc_cat_lmui_fk` (`last_modified_user_id`)',
			'KEY `ophcianassessment_speced_instruc_cat_cui_fk` (`created_user_id`)',
			'CONSTRAINT `ophcianassessment_speced_instruc_cat_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
			'CONSTRAINT `ophcianassessment_speced_instruc_cat_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophcianassessment_speced_instruc_cat');

		$this->addColumn('ophcianassessment_speced_instructions','category_id','int(10) unsigned NOT NULL');
		$this->addColumn('ophcianassessment_speced_instructions_version','category_id','int(10) unsigned NOT NULL');

		$this->addColumn('ophcianassessment_speced_instructions','active','boolean not null default true');
		$this->addColumn('ophcianassessment_speced_instructions_version','active','boolean not null default true');

		$this->alterColumn('ophcianassessment_speced_instructions', 'name', 'text NULL');
		$this->alterColumn('ophcianassessment_speced_instructions_version', 'name', 'text NULL');

		$this->addForeignKey('ophcianassessment_speced_instructions_cat_fk','ophcianassessment_speced_instructions','category_id','ophcianassessment_speced_instruc_cat','id');

		// Remove diabetes instructions tables
		$this->dropTable('ophcianassessment_speced_diabetes_assignment');
		$this->dropTable('ophcianassessment_speced_diabetes_assignment_version');

		$this->dropTable('ophcianassessment_speced_diabetes');
		$this->dropTable('ophcianassessment_speced_diabetes_version');

		$this->dropColumn('et_ophcianassessment_specificeducation', 'medications');
		$this->dropColumn('et_ophcianassessment_specificeducation_version', 'medications');

		$this->dropColumn('et_ophcianassessment_specificeducation', 'other');
		$this->dropColumn('et_ophcianassessment_specificeducation_version', 'other');

		$this->refreshTableSchema('ophcianassessment_speced_instructions');
		$this->refreshTableSchema('ophcianassessment_speced_instructions_version');

		$this->refreshTableSchema('et_ophcianassessment_specificeducation');
		$this->refreshTableSchema('et_ophcianassessment_specificeducation_version');

		// Add in categories and instructions
		$this->initialiseData(dirname(__FILE__));
	}

	public function down()
	{
		$this->dropForeignKey('ophcianassessment_speced_instructions_cat_fk', 'ophcianassessment_speced_instructions');

		$this->dropColumn('ophcianassessment_speced_instructions', 'category_id');
		$this->dropColumn('ophcianassessment_speced_instructions_version', 'category_id');

		$this->dropColumn('ophcianassessment_speced_instructions', 'active');
		$this->dropColumn('ophcianassessment_speced_instructions_version', 'active');

		$this->alterColumn('ophcianassessment_speced_instructions', 'name', 'varchar(128) NULL');
		$this->alterColumn('ophcianassessment_speced_instructions_version', 'name', 'varchar(128) NULL');

		$this->refreshTableSchema('ophcianassessment_speced_instructions');
		$this->refreshTableSchema('ophcianassessment_speced_instructions_version');

		$this->dropTable('ophcianassessment_speced_instruc_cat');
		$this->dropTable('ophcianassessment_speced_instruc_cat_version');

		$this->delete('ophcianassessment_speced_instructions');

		// Restore instructions
		$data = array(
			array('id' => 1, 'name' => 'Adult Instructions', 'display_order' => 1),
			array('id' => 2, 'name' => 'Laser Instructions', 'display_order' => 2),
			array('id' => 3, 'name' => 'Pediatric Instructions', 'display_order' => 3),
			array('id' => 9, 'name' => 'Other (please specify)', 'display_order' => 9)
		);
		foreach($data as $item) {
			$this->insert('ophcianassessment_speced_instructions', $item);
		}

		// Restore diabetes instructions table
		$this->createTable('ophcianassessment_speced_diabetes', array(
			'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
			'name' => 'varchar(255) not null',
			'display_order' => 'tinyint(1) unsigned not null',
			'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'PRIMARY KEY (`id`)',
			'KEY `ophcianassessment_speced_diabetes_lmui_fk` (`last_modified_user_id`)',
			'KEY `ophcianassessment_speced_diabetes_cui_fk` (`created_user_id`)',
			'CONSTRAINT `ophcianassessment_speced_diabetes_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
			'CONSTRAINT `ophcianassessment_speced_diabetes_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->versionExistingTable('ophcianassessment_speced_diabetes');

		$this->insert('ophcianassessment_speced_diabetes',array('id'=>1,'name'=>'Eat and drink normally','display_order'=>1));
		$this->insert('ophcianassessment_speced_diabetes',array('id'=>2,'name'=>'Fast as adult','display_order'=>2));
		$this->insert('ophcianassessment_speced_diabetes',array('id'=>3,'name'=>'Take normal medications','display_order'=>3));
		$this->insert('ophcianassessment_speced_diabetes',array('id'=>4,'name'=>'Medications','display_order'=>4));

		$this->createTable('ophcianassessment_speced_diabetes_assignment', array(
			'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
			'element_id' => 'int(10) unsigned not null',
			'item_id' => 'int(10) unsigned not null',
			'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'PRIMARY KEY (`id`)',
			'KEY `ophcianassessment_speced_diabetes_assignment_lmui_fk` (`last_modified_user_id`)',
			'KEY `ophcianassessment_speced_diabetes_assignment_cui_fk` (`created_user_id`)',
			'KEY `ophcianassessment_speced_diabetes_assignment_ele_fk` (`element_id`)',
			'KEY `ophcianassessment_speced_diabetes_assignment_idi_fk` (`item_id`)',
			'CONSTRAINT `ophcianassessment_speced_diabetes_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
			'CONSTRAINT `ophcianassessment_speced_diabetes_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			'CONSTRAINT `ophcianassessment_speced_diabetes_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_specificeducation` (`id`)',
			'CONSTRAINT `ophcianassessment_speced_diabetes_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_speced_diabetes` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_specificeducation','medications','varchar(255) COLLATE utf8_bin DEFAULT \'\'');
		$this->addColumn('et_ophcianassessment_specificeducation_version','medications','varchar(255) COLLATE utf8_bin DEFAULT \'\'');

		$this->addColumn('et_ophcianassessment_specificeducation','other','varchar(255) COLLATE utf8_bin DEFAULT \'\'');
		$this->addColumn('et_ophcianassessment_specificeducation_version','other','varchar(255) COLLATE utf8_bin DEFAULT \'\'');

		$this->versionExistingTable('et_ophcianassessment_specificeducation');
		$this->versionExistingTable('et_ophcianassessment_specificeducation_version');

		$this->versionExistingTable('ophcianassessment_speced_diabetes_assignment');
	}
}