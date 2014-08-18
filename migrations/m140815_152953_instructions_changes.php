<?php

class m140815_152953_instructions_changes extends OEMigration
{
	public function up()
	{
		$this->delete('ophcianassessment_speced_instructions',"category_id=3");
		$this->delete('ophcianassessment_speced_instructions_version',"category_id=3");

		$this->delete('ophcianassessment_speced_instruc_cat','id=3');

		$this->dropTable('ophcianassessment_speced_instructions_assignment_version');
		$this->dropTable('ophcianassessment_speced_instructions_assignment');

		$this->dropTable('ophcianassessment_speced_instructions_procedure_version');
		$this->dropTable('ophcianassessment_speced_instructions_procedure');

		$this->createTable('ophcianaestheticassessment_speced_item', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'category_id' => 'int(10) unsigned not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianaestheticassessment_speced_item_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianaestheticassessment_speced_item_cui_fk` (`created_user_id`)',
				'KEY `ophcianaestheticassessment_speced_item_ci_fk` (`category_id`)',
				'KEY `ophcianaestheticassessment_speced_item_ele_fk` (`element_id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_item_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_item_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_item_ci_fk` FOREIGN KEY (`category_id`) REFERENCES `ophcianassessment_speced_instruc_cat` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_item_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_specificeducation` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophcianaestheticassessment_speced_item');

		$this->createTable('ophcianaestheticassessment_speced_item_booking', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'item_id' => 'int(10) unsigned not null',
				'booking_event_id' => 'int(10) unsigned not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianaestheticassessment_speced_ib_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianaestheticassessment_speced_ib_cui_fk` (`created_user_id`)',
				'KEY `ophcianaestheticassessment_speced_ib_ite_fk` (`item_id`)',
				'KEY `ophcianaestheticassessment_speced_ib_bei_fk` (`booking_event_id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_ib_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_ib_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_ib_ite_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianaestheticassessment_speced_item` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_ib_bei_fk` FOREIGN KEY (`booking_event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophcianaestheticassessment_speced_item_booking');

		$this->createTable('ophcianaestheticassessment_speced_item_inst', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'item_id' => 'int(10) unsigned not null',
				'instruction_id' => 'int(10) unsigned not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianaestheticassessment_speced_ii_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianaestheticassessment_speced_ii_cui_fk` (`created_user_id`)',
				'KEY `ophcianaestheticassessment_speced_ii_ite_fk` (`item_id`)',
				'KEY `ophcianaestheticassessment_speced_ii_bei_fk` (`instruction_id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_ii_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_ii_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_ii_ite_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianaestheticassessment_speced_item` (`id`)',
				'CONSTRAINT `ophcianaestheticassessment_speced_ii_bei_fk` FOREIGN KEY (`instruction_id`) REFERENCES `ophcianassessment_speced_instructions` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophcianaestheticassessment_speced_item_inst');

		$this->dropForeignKey('et_ophcianassessment_specificeducation_ici_fk','et_ophcianassessment_specificeducation');
		$this->dropColumn('et_ophcianassessment_specificeducation','instruction_category_id');
		$this->dropColumn('et_ophcianassessment_specificeducation_version','instruction_category_id');
	}

	public function down()
	{
		$this->addColumn('et_ophcianassessment_specificeducation','instruction_category_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_specificeducation_version','instruction_category_id','int(10) unsigned null');
		$this->addForeignKey('et_ophcianassessment_specificeducation_ici_fk','et_ophcianassessment_specificeducation','instruction_category_id','ophcianassessment_speced_instruc_cat','id');

		$this->dropTable('ophcianaestheticassessment_speced_item_inst_version');
		$this->dropTable('ophcianaestheticassessment_speced_item_inst');

		$this->dropTable('ophcianaestheticassessment_speced_item_booking_version');
		$this->dropTable('ophcianaestheticassessment_speced_item_booking');

		$this->dropTable('ophcianaestheticassessment_speced_item_version');
		$this->dropTable('ophcianaestheticassessment_speced_item');

		$this->insert('ophcianassessment_speced_instruc_cat',array('id'=>3,'name'=>'Diabetes instructions','active'=>1,'display_order'=>3));

		$this->execute("CREATE TABLE `ophcianassessment_speced_instructions_procedure` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`procedure_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`eye_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`),
	KEY `ophcianassessment_speced_instructions_procedure_lmui_fk` (`last_modified_user_id`),
	KEY `ophcianassessment_speced_instructions_procedure_cui_fk` (`created_user_id`),
	KEY `ophcianassessment_speced_instructions_procedure_eid_fk` (`element_id`),
	KEY `ophcianassessment_speced_instructions_procedure_pid_fk` (`procedure_id`),
	KEY `ophcianassessment_speced_instructions_procedure_ei_fk` (`eye_id`),
	CONSTRAINT `ophcianassessment_speced_instructions_procedure_ei_fk` FOREIGN KEY (`eye_id`) REFERENCES `eye` (`id`),
	CONSTRAINT `ophcianassessment_speced_instructions_procedure_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_speced_instructions_procedure_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_specificeducation` (`id`),
	CONSTRAINT `ophcianassessment_speced_instructions_procedure_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_speced_instructions_procedure_pid_fk` FOREIGN KEY (`procedure_id`) REFERENCES `proc` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophcianassessment_speced_instructions_procedure');

		$this->execute("CREATE TABLE `ophcianassessment_speced_instructions_assignment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`instruction_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ossia_lmui_fk` (`last_modified_user_id`),
	KEY `ossia_cui_fk` (`created_user_id`),
	KEY `ossia_ele_fk` (`element_id`),
	KEY `ossia_lku_fk` (`instruction_id`),
	CONSTRAINT `ossia_lku_fk` FOREIGN KEY (`instruction_id`) REFERENCES `ophcianassessment_speced_instructions` (`id`),
	CONSTRAINT `ossia_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ossia_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_specificeducation` (`id`),
	CONSTRAINT `ossia_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophcianassessment_speced_instructions_assignment');
	}
}
