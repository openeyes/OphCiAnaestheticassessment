<?php

class m140422_095932_field_changes extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('et_ophcianassessment_procedures','site','site_id');
		$this->alterColumn('et_ophcianassessment_procedures','site_id','int(10) unsigned not null');
		$this->createIndex('et_ophcianassessment_procedures_site_id_fk','et_ophcianassessment_procedures','site_id');
		$this->addForeignKey('et_ophcianassessment_procedures_site_id_fk','et_ophcianassessment_procedures','site_id','site','id');

		$this->dropColumn('et_ophcianassessment_procedures','procedures');

		$this->createTable('ophcianassessment_procedures_procedure_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'proc_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_procedures_procedure_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_procedures_procedure_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_procedures_procedure_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_procedures_procedure_assignment_pro_fk` (`proc_id`)',
				'CONSTRAINT `ophcianassessment_procedures_procedure_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_procedures_procedure_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_procedures_procedure_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_procedures` (`id`)',
				'CONSTRAINT `ophcianassessment_procedures_procedure_assignment_pro_fk` FOREIGN KEY (`proc_id`) REFERENCES `proc` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('ophcianassessment_procedures_procedure_assignment');

		$this->addColumn('et_ophcianassessment_procedures','procedures','varchar(255)');

		$this->dropForeignKey('et_ophcianassessment_procedures_site_id_fk','et_ophcianassessment_procedures');
		$this->dropIndex('et_ophcianassessment_procedures_site_id_fk','et_ophcianassessment_procedures');
		$this->alterColumn('et_ophcianassessment_procedures','site_id','varchar(255)');
		$this->renameColumn('et_ophcianassessment_procedures','site_id','site');
	}
}
