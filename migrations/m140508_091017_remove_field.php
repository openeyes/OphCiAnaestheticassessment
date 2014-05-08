<?php

class m140508_091017_remove_field extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophcianassessment_medical_history_dental', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_dental_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_dental_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dental_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dental_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_dental',array('name'=>'Full uppers','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_dental',array('name'=>'Full Lowers','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_dental',array('name'=>'Other (please specify)','display_order'=>3));

		$this->createTable('ophcianassessment_medical_history_dental_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'dental_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_dental_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_dental_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_dental_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_dental_assignment_lku_fk` (`dental_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dental_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dental_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dental_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dental_assignment_lku_fk` FOREIGN KEY (`dental_id`) REFERENCES `ophcianassessment_medical_history_dental` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->dropTable('et_ophcianassessment_examination_dental_assignment');
		$this->dropTable('ophcianassessment_examination_dental');

		$this->dropColumn('et_ophcianassessment_examination','teeth_other');
		$this->addColumn('et_ophcianassessment_medical_history_review','teeth_other','varchar(255)');
	}

	public function down()
	{
		$this->dropColumn('et_ophcianassessment_medical_history_review','teeth_other');
		$this->addColumn('et_ophcianassessment_examination','teeth_other','varchar(255)');

		$this->dropTable('ophcianassessment_medical_history_dental_assignment');
		$this->dropTable('ophcianassessment_medical_history_dental');

		$this->createTable('ophcianassessment_examination_dental', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_examination_dental_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_examination_dental_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_examination_dental_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_examination_dental_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_examination_dental',array('name'=>'Full uppers','display_order'=>1));
		$this->insert('ophcianassessment_examination_dental',array('name'=>'Full Lowers','display_order'=>2));
		$this->insert('ophcianassessment_examination_dental',array('name'=>'Other (please specify)','display_order'=>3));

		$this->createTable('et_ophcianassessment_examination_dental_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophcianassessment_examination_dental_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_examination_dental_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_examination_dental_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_examination_dental_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophcianassessment_examination_dental_assignment_lku_fk` (`ophcianassessment_examination_dental_id`)',
				'CONSTRAINT `et_ophcianassessment_examination_dental_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_examination_dental_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_examination_dental_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_examination` (`id`)',
				'CONSTRAINT `et_ophcianassessment_examination_dental_assignment_lku_fk` FOREIGN KEY (`ophcianassessment_examination_dental_id`) REFERENCES `ophcianassessment_examination_dental` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}
}
