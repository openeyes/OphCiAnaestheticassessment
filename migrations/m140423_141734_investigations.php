<?php

class m140423_141734_investigations extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophcianassessment_investigations_investigation_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_investigations_investigation_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_investigations_investigation_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_investigations_investigation_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_investigations_investigation_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_investigations_investigation_type',array('id'=>1,'name'=>'Hb/Hct'));
		$this->insert('ophcianassessment_investigations_investigation_type',array('id'=>2,'name'=>'Blood glucose'));

		$this->createTable('ophcianassessment_investigations_investigation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'investigation_id' => 'int(10) unsigned not null',
				'ordered' => 'tinyint(1) unsigned not null',
				'reviewed' => 'tinyint(1) unsigned not null',
				'result' => 'varchar(255) not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_investigations_investigation_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_investigations_investigation_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_investigations_investigation_element_id_fk` (`element_id`)',
				'KEY `ophcianassessment_investigations_investigation_inv_fk` (`investigation_id`)',
				'CONSTRAINT `ophcianassessment_investigations_investigation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_investigations_investigation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_investigations_investigation_element_id_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_investigations` (`id`)',
				'CONSTRAINT `ophcianassessment_investigations_investigation_inv_fk` FOREIGN KEY (`investigation_id`) REFERENCES `ophcianassessment_investigations_investigation_type` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->renameColumn('et_ophcianassessment_investigations','investigations','comments');
	}

	public function down()
	{
		$this->renameColumn('et_ophcianassessment_investigations','comments','investigations');

		$this->dropTable('ophcianassessment_investigations_investigation');
		$this->dropTable('ophcianassessment_investigations_investigation_type');
	}
}
