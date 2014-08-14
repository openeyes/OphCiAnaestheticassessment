<?php

class m140814_140630_instruction_procedure_assignments extends OEMigration
{
	public function up()
	{
		$this->createTable('ophcianassessment_speced_instructions_procedure', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'procedure_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_speced_instructions_procedure_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_speced_instructions_procedure_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_speced_instructions_procedure_eid_fk` (`element_id`)',
				'KEY `ophcianassessment_speced_instructions_procedure_pid_fk` (`procedure_id`)',
				'CONSTRAINT `ophcianassessment_speced_instructions_procedure_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_speced_instructions_procedure_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_speced_instructions_procedure_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_specificeducation` (`id`)',
				'CONSTRAINT `ophcianassessment_speced_instructions_procedure_pid_fk` FOREIGN KEY (`procedure_id`) REFERENCES `proc` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophcianassessment_speced_instructions_procedure');

		$this->addColumn('et_ophcianassessment_specificeducation','instruction_category_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_specificeducation_version','instruction_category_id','int(10) unsigned null');
		$this->addForeignKey('et_ophcianassessment_specificeducation_ici_fk','et_ophcianassessment_specificeducation','instruction_category_id','ophcianassessment_speced_instruc_cat','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcianassessment_specificeducation_ici_fk','et_ophcianassessment_specificeducation');
		$this->dropColumn('et_ophcianassessment_specificeducation','instruction_category_id');
		$this->dropColumn('et_ophcianassessment_specificeducation_version','instruction_category_id');

		$this->dropTable('ophcianassessment_speced_instructions_procedure_version');
		$this->dropTable('ophcianassessment_speced_instructions_procedure');
	}
}
