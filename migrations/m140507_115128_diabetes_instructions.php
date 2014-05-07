<?php

class m140507_115128_diabetes_instructions extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophcianassessment_specificeducation_diabetes', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_specificeducation_diabetes_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_specificeducation_diabetes_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_specificeducation_diabetes_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_specificeducation_diabetes_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_specificeducation_diabetes',array('id'=>1,'name'=>'Eat and drink normally','display_order'=>1));
		$this->insert('ophcianassessment_specificeducation_diabetes',array('id'=>2,'name'=>'Fast as adult','display_order'=>2));
		$this->insert('ophcianassessment_specificeducation_diabetes',array('id'=>3,'name'=>'Take normal medications','display_order'=>3));
		$this->insert('ophcianassessment_specificeducation_diabetes',array('id'=>4,'name'=>'Medications','display_order'=>4));

		$this->delete('ophcianassessment_specificeducation_speced_id',"id >= 4 and id <= 8");

		$this->createTable('ophcianassessment_specificeducation_diabetes_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_specificeducation_diabetes_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_specificeducation_diabetes_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_specificeducation_diabetes_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_specificeducation_diabetes_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_specificeducation_diabetes_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_specificeducation_diabetes_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_specificeducation_diabetes_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_specificeducation` (`id`)',
				'CONSTRAINT `ophcianassessment_specificeducation_diabetes_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_specificeducation_diabetes` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('ophcianassessment_specificeducation_diabetes_assignment');

		$this->insert('ophcianassessment_specificeducation_speced_id',array('id' => 4,'name'=>'Diabetes Instructions','display_order'=>4));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('id' => 5,'name'=>'Eat and drink normally','display_order'=>5));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('id' => 6,'name'=>'Fast as adult','display_order'=>6));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('id' => 7,'name'=>'Take normal medications','display_order'=>7));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('id' => 8,'name'=>'Medications','display_order'=>8));

		$this->dropTable('ophcianassessment_specificeducation_diabetes');
	}
}
