<?php

class m140508_095431_new_form_options extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophcianassessment_medical_history_cardio', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_cardio_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_cardio_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardio_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardio_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>1,'name'=>'Abnormal rhythm','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>2,'name'=>'Chest pain','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>3,'name'=>'MI','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>4,'name'=>'Rheumatic fever','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>5,'name'=>'Artificial valve','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>6,'name'=>'CHF','display_order'=>6));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>7,'name'=>'High triglycerides','display_order'=>7));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>8,'name'=>'Pacemaker','display_order'=>8));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>9,'name'=>'Valvular disease','display_order'=>9));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>10,'name'=>'Cardiomyopathy','display_order'=>10));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>11,'name'=>'CAD hypertension','display_order'=>11));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>12,'name'=>'Peripheral edema','display_order'=>12));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>13,'name'=>'Palpitations','display_order'=>13));
		$this->insert('ophcianassessment_medical_history_cardio',array('id'=>14,'name'=>'Other (please specify)','display_order'=>14));

		$this->createTable('ophcianassessment_medical_history_cardio_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_cardio_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_cardio_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_cardio_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_cardio_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardio_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardio_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardio_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardio_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_cardio` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','cardio_other','text not null');
		$this->addColumn('et_ophcianassessment_medical_history_review','cardio_comments','text not null');

		$this->createTable('ophcianassessment_medical_history_pulmonary', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_pulmonary_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_pulmonary_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_pulmonary_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_pulmonary_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>1,'name'=>'Asthma','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>2,'name'=>'COPD','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>3,'name'=>'Pneumonia','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>4,'name'=>'SOB','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>5,'name'=>'Tuberculosis','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>6,'name'=>'URTI/bronchitis','display_order'=>6));
		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>7,'name'=>'Emphysema','display_order'=>7));
		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>8,'name'=>'Productive cough','display_order'=>8));
		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>9,'name'=>'Sleep apnea','display_order'=>9));
		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>10,'name'=>'Tracheotomy','display_order'=>10));
		$this->insert('ophcianassessment_medical_history_pulmonary',array('id'=>11,'name'=>'Other (please specify)','display_order'=>11));

		$this->createTable('ophcianassessment_medical_history_pulmonary_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_pulmonary_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_pulmonary_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_pulmonary_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_pulmonary_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_pulmonary_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_pulmonary_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_pulmonary_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_pulmonary_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_pulmonary` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','pulmonary_other','text not null');
		$this->addColumn('et_ophcianassessment_medical_history_review','pulmonary_comments','text not null');

		$this->createTable('ophcianassessment_medical_history_gi', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_gi_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_gi_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gi_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gi_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_gi',array('id'=>1,'name'=>'Change in bowel habits','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>2,'name'=>'Constipation','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>3,'name'=>'Diverticular disease','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>4,'name'=>'Gastric reflux','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>5,'name'=>'Hiatus hernia','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>6,'name'=>'Ulcers','display_order'=>6));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>7,'name'=>'Cirrhosis','display_order'=>7));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>8,'name'=>'Chronic inflammatory bowel disease','display_order'=>8));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>9,'name'=>'Jaundice','display_order'=>9));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>10,'name'=>'Unexplained weight loss','display_order'=>10));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>11,'name'=>'Diarrhea','display_order'=>11));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>12,'name'=>'Gall bladder','display_order'=>12));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>13,'name'=>'Hemorrhoids','display_order'=>13));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>14,'name'=>'Dysphagia','display_order'=>14));
		$this->insert('ophcianassessment_medical_history_gi',array('id'=>15,'name'=>'Other (please specify)','display_order'=>15));

		$this->createTable('ophcianassessment_medical_history_gi_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_gi_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_gi_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_gi_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_gi_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gi_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gi_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gi_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gi_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_gi` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','gi_other','text not null');
		$this->addColumn('et_ophcianassessment_medical_history_review','gi_comments','text not null');

		$this->createTable('ophcianassessment_medical_history_dbtreat', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_dbtreat_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_dbtreat_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbtreat_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbtreat_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_dbtreat',array('id'=>1,'name'=>'Diet','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_dbtreat',array('id'=>2,'name'=>'Insulin','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_dbtreat',array('id'=>3,'name'=>'Oral hypoglycaemic','display_order'=>3));

		$this->createTable('ophcianassessment_medical_history_dbtreat_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_dbtreat_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_dbtreat_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_dbtreat_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_dbtreat_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbtreat_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbtreat_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbtreat_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbtreat_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_dbtreat` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','diabetes_average_glucose','varchar(64) null');
		$this->addColumn('et_ophcianassessment_medical_history_review','diabetes_comments','text not null');

		$this->createTable('ophcianassessment_medical_history_dbmonitor', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_dbmonitor_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_dbmonitor_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbmonitor_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbmonitor_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_dbmonitor',array('id'=>1,'name'=>'Blood','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_dbmonitor',array('id'=>2,'name'=>'Urine','display_order'=>2));

		$this->createTable('ophcianassessment_medical_history_dbmonitor_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_dbmonitor_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_dbmonitor_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_dbmonitor_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_dbmonitor_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbmonitor_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbmonitor_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbmonitor_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_dbmonitor_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_dbmonitor` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianassessment_medical_history_gre', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_gre_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_gre_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gre_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gre_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_gre',array('id'=>1,'name'=>'BPH','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_gre',array('id'=>2,'name'=>'Renal insufficiency','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_gre',array('id'=>3,'name'=>'Dialysis','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_gre',array('id'=>4,'name'=>'Hyperactive thyroid','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_gre',array('id'=>5,'name'=>'Underactive thyroid','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_gre',array('id'=>6,'name'=>'Kidney stones','display_order'=>6));
		$this->insert('ophcianassessment_medical_history_gre',array('id'=>7,'name'=>'Other (please specify)','display_order'=>7));

		$this->createTable('ophcianassessment_medical_history_gre_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_gre_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_gre_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_gre_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_gre_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gre_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gre_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gre_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_gre_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_gre` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','gre_other','text not null');
		$this->addColumn('et_ophcianassessment_medical_history_review','gre_comments','text not null');

		$this->createTable('ophcianassessment_medical_history_neuro', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_neuro_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_neuro_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_neuro_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_neuro_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>1,'name'=>'Accident / injury','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>2,'name'=>'Headaches / migraines','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>3,'name'=>'MS','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>4,'name'=>'TMJ','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>5,'name'=>'Amputation','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>6,'name'=>'Neck / back pain','display_order'=>6));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>7,'name'=>'Seizure disorder','display_order'=>7));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>8,'name'=>'TIA','display_order'=>8));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>9,'name'=>'CVA','display_order'=>9));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>10,'name'=>'Arthritis','display_order'=>10));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>11,'name'=>'Paralysis','display_order'=>11));
		$this->insert('ophcianassessment_medical_history_neuro',array('id'=>12,'name'=>'Other (please specify)','display_order'=>12));

		$this->createTable('ophcianassessment_medical_history_neuro_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_neuro_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_neuro_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_neuro_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_neuro_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_neuro_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_neuro_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_neuro_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_neuro_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_neuro` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','neuro_other','text not null');
		$this->addColumn('et_ophcianassessment_medical_history_review','neuro_comments','text not null');

		$this->createTable('ophcianassessment_medical_history_misc', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_misc_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_misc_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_misc_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_misc_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_misc',array('id'=>1,'name'=>'Anemia','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>2,'name'=>'Incontinents','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>3,'name'=>'Cancer','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>4,'name'=>'HIV/Aids','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>5,'name'=>'STD','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>6,'name'=>'Auto immune','display_order'=>6));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>7,'name'=>'Chemotherapy','display_order'=>7));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>8,'name'=>'Lupus','display_order'=>8));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>9,'name'=>'Steroid use','display_order'=>9));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>10,'name'=>'Bleeding disorder','display_order'=>10));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>11,'name'=>'Hepatitis A/B/C','display_order'=>11));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>12,'name'=>'Obesity','display_order'=>12));
		$this->insert('ophcianassessment_medical_history_misc',array('id'=>13,'name'=>'Other (please specify)','display_order'=>13));

		$this->createTable('ophcianassessment_medical_history_misc_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_misc_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_misc_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_misc_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_misc_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_misc_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_misc_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_misc_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_misc_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_misc` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','misc_other','text not null');
		$this->addColumn('et_ophcianassessment_medical_history_review','misc_comments','text not null');

		$this->createTable('ophcianassessment_medical_history_falls', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_falls_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_falls_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_falls_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_falls_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_falls',array('id'=>1,'name'=>'Unaided','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_falls',array('id'=>2,'name'=>'Crutches','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_falls',array('id'=>3,'name'=>'Cane','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_falls',array('id'=>4,'name'=>'Walker','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_falls',array('id'=>5,'name'=>'Wheelchair','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_falls',array('id'=>6,'name'=>'Parents','display_order'=>6));

		$this->createTable('ophcianassessment_medical_history_falls_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_falls_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_falls_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_falls_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_falls_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_falls_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_falls_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_falls_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_falls_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_falls` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','falls_comments','text not null');

		$this->createTable('ophcianassessment_medical_history_psych', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_psych_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_psych_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_psych_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_psych_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_psych',array('id'=>1,'name'=>'Anxiety','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_psych',array('id'=>2,'name'=>'Depression','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_psych',array('id'=>3,'name'=>'Psychosis','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_psych',array('id'=>4,'name'=>'Other (please specify)','display_order'=>4));

		$this->createTable('ophcianassessment_medical_history_psych_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_psych_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_psych_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_psych_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_psych_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_psych_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_psych_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_psych_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_psych_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_psych` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','psych_other','text not null');
		$this->addColumn('et_ophcianassessment_medical_history_review','psych_comments','text not null');

		$this->createTable('ophcianassessment_medical_history_preg', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_preg_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_preg_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_preg_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_preg_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_preg',array('id'=>1,'name'=>'Pregnant','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_preg',array('id'=>2,'name'=>'Denies pregnancy','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_preg',array('id'=>3,'name'=>'N/A','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_preg',array('id'=>4,'name'=>'Post menopausal','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_preg',array('id'=>5,'name'=>'Last menstrual period','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_preg',array('id'=>6,'name'=>'Test (please specify)','display_order'=>6));

		$this->createTable('ophcianassessment_medical_history_preg_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_preg_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_preg_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_preg_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_preg_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_preg_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_preg_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_preg_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_preg_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_preg` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','preg_test','text not null');

		$this->addColumn('et_ophcianassessment_medical_history_review','recent_cough','text not null');

		$this->createTable('ophcianassessment_medical_history_surgery', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_surgery_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_surgery_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_surgery_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_surgery_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>1,'name'=>'Appendectomy','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>2,'name'=>'Bowel resection','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>3,'name'=>'Gastric bypass','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>4,'name'=>'Hernia repair','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>5,'name'=>'Arthroscopy','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>6,'name'=>'Joint replacement','display_order'=>6));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>7,'name'=>'Tonsillectomy','display_order'=>7));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>8,'name'=>'Cholecystectomy','display_order'=>8));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>9,'name'=>'Hip replacement','display_order'=>9));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>10,'name'=>'Carpal tunnel','display_order'=>10));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>11,'name'=>'Knee replacement','display_order'=>11));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>12,'name'=>'Valve replacement','display_order'=>12));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>13,'name'=>'CABG','display_order'=>13));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>14,'name'=>'Hysterectomy','display_order'=>14));
		$this->insert('ophcianassessment_medical_history_surgery',array('id'=>15,'name'=>'Other (please specify)','display_order'=>15));

		$this->createTable('ophcianassessment_medical_history_surgery_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_surgery_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_surgery_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_surgery_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_surgery_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_surgery_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_surgery_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_surgery_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_surgery_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_surgery` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','surgery_other','text not null');
		$this->addColumn('et_ophcianassessment_medical_history_review','surgery_comments','text not null');

		$this->createTable('ophcianassessment_medical_history_patientan', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_patientan_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_patientan_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_patientan_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_patientan_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_patientan',array('id'=>1,'name'=>'Allergic reaction','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_patientan',array('id'=>2,'name'=>'Hyperthermia','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_patientan',array('id'=>3,'name'=>'Persistent PONV','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_patientan',array('id'=>4,'name'=>'Unstable BP','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_patientan',array('id'=>5,'name'=>'Fainted','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_patientan',array('id'=>6,'name'=>'Hypotension','display_order'=>6));
		$this->insert('ophcianassessment_medical_history_patientan',array('id'=>7,'name'=>'Prolonged sedation','display_order'=>7));
		$this->insert('ophcianassessment_medical_history_patientan',array('id'=>8,'name'=>'Hyperexcitability','display_order'=>8));
		$this->insert('ophcianassessment_medical_history_patientan',array('id'=>9,'name'=>'Tachycardia','display_order'=>9));
		$this->insert('ophcianassessment_medical_history_patientan',array('id'=>10,'name'=>'Other (please specify)','display_order'=>10));

		$this->createTable('ophcianassessment_medical_history_patientan_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_patientan_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_patientan_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_patientan_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_patientan_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_patientan_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_patientan_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_patientan_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_patientan_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_patientan` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','patientan_other','text not null');

		$this->createTable('ophcianassessment_medical_history_familyan', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_familyan_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_familyan_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_familyan_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_familyan_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_familyan',array('id'=>1,'name'=>'Allergic reaction','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_familyan',array('id'=>2,'name'=>'Hyperthermia','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_familyan',array('id'=>3,'name'=>'Persistent PONV','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_familyan',array('id'=>4,'name'=>'Unstable BP','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_familyan',array('id'=>5,'name'=>'Fainted','display_order'=>5));
		$this->insert('ophcianassessment_medical_history_familyan',array('id'=>6,'name'=>'Hypotension','display_order'=>6));
		$this->insert('ophcianassessment_medical_history_familyan',array('id'=>7,'name'=>'Prolonged sedation','display_order'=>7));
		$this->insert('ophcianassessment_medical_history_familyan',array('id'=>8,'name'=>'Hyperexcitability','display_order'=>8));
		$this->insert('ophcianassessment_medical_history_familyan',array('id'=>9,'name'=>'Tachycardia','display_order'=>9));
		$this->insert('ophcianassessment_medical_history_familyan',array('id'=>10,'name'=>'Other (please specify)','display_order'=>10));

		$this->createTable('ophcianassessment_medical_history_familyan_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_familyan_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_familyan_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_familyan_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_familyan_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_familyan_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_familyan_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_familyan_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_familyan_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_familyan` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','familyan_other','text not null');

		$this->createTable('ophcianassessment_medical_history_cardev', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_cardev_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_cardev_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardev_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardev_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_cardev',array('id'=>1,'name'=>'Defibrillator','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_cardev',array('id'=>2,'name'=>'Pacemaker','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_cardev',array('id'=>3,'name'=>'Stent','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_cardev',array('id'=>4,'name'=>'Other (please specify)','display_order'=>4));

		$this->createTable('ophcianassessment_medical_history_cardev_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_cardev_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_cardev_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_cardev_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_cardev_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardev_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardev_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardev_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_cardev_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_cardev` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','cardev_other','text not null');
		$this->addColumn('et_ophcianassessment_medical_history_review','cardev_comments','text not null');

		$this->addColumn('et_ophcianassessment_medical_history_review','noncardiac_implants','text not null');

		$this->createTable('ophcianassessment_medical_history_prosthetic', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_prosthetic_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_prosthetic_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_prosthetic_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_prosthetic_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_prosthetic',array('id'=>1,'name'=>'Left arm','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_prosthetic',array('id'=>2,'name'=>'Right arm','display_order'=>2));
		$this->insert('ophcianassessment_medical_history_prosthetic',array('id'=>3,'name'=>'Left leg','display_order'=>3));
		$this->insert('ophcianassessment_medical_history_prosthetic',array('id'=>4,'name'=>'Right leg','display_order'=>4));
		$this->insert('ophcianassessment_medical_history_prosthetic',array('id'=>5,'name'=>'Other (please specify)','display_order'=>5));

		$this->createTable('ophcianassessment_medical_history_prosthetic_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_prosthetic_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_prosthetic_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_prosthetic_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_prosthetic_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_prosthetic_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_prosthetic_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_prosthetic_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_prosthetic_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_prosthetic` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','prosthetic_other','text not null');

		$this->createTable('ophcianassessment_medical_history_smoke', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_smoke_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_smoke_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_smoke_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_smoke_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_medical_history_smoke',array('id'=>1,'name'=>'Smoke','display_order'=>1));
		$this->insert('ophcianassessment_medical_history_smoke',array('id'=>2,'name'=>'Smokeless','display_order'=>2));

		$this->createTable('ophcianassessment_medical_history_smoke_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'item_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_medical_history_smoke_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_medical_history_smoke_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_medical_history_smoke_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_medical_history_smoke_assignment_idi_fk` (`item_id`)',
				'CONSTRAINT `ophcianassessment_medical_history_smoke_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_smoke_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_smoke_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_medical_history_review` (`id`)',
				'CONSTRAINT `ophcianassessment_medical_history_smoke_assignment_idi_fk` FOREIGN KEY (`item_id`) REFERENCES `ophcianassessment_medical_history_smoke` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophcianassessment_medical_history_review','smoke_amount','varchar(255)');
		$this->addColumn('et_ophcianassessment_medical_history_review','smoke_duration','varchar(255)');
		$this->addColumn('et_ophcianassessment_medical_history_review','smoke_quit_date','varchar(255)');

		$this->addColumn('et_ophcianassessment_medical_history_review','alcohol_type','varchar(255)');
		$this->addColumn('et_ophcianassessment_medical_history_review','alcohol_amount','varchar(255)');
		$this->addColumn('et_ophcianassessment_medical_history_review','alcohol_quit_date','varchar(255)');

		$this->addColumn('et_ophcianassessment_medical_history_review','drug_name','varchar(255)');
		$this->addColumn('et_ophcianassessment_medical_history_review','drug_amount','varchar(255)');
		$this->addColumn('et_ophcianassessment_medical_history_review','drug_quit_date','varchar(255)');

		$this->renameColumn('et_ophcianassessment_medical_history_review','Miscellaneous','miscellaneous');
	}

	public function down()
	{
		$this->renameColumn('et_ophcianassessment_medical_history_review','miscellaneous','Miscellaneous');

		$this->dropColumn('et_ophcianassessment_medical_history_review','alcohol_type');
		$this->dropColumn('et_ophcianassessment_medical_history_review','alcohol_amount');
		$this->dropColumn('et_ophcianassessment_medical_history_review','alcohol_quit_date');

		$this->dropColumn('et_ophcianassessment_medical_history_review','drug_name');
		$this->dropColumn('et_ophcianassessment_medical_history_review','drug_amount');
		$this->dropColumn('et_ophcianassessment_medical_history_review','drug_quit_date');

		$this->dropColumn('et_ophcianassessment_medical_history_review','smoke_amount');
		$this->dropColumn('et_ophcianassessment_medical_history_review','smoke_duration');
		$this->dropColumn('et_ophcianassessment_medical_history_review','smoke_quit_date');

		$this->dropTable('ophcianassessment_medical_history_smoke_assignment');
		$this->dropTable('ophcianassessment_medical_history_smoke');

		$this->dropColumn('et_ophcianassessment_medical_history_review','prosthetic_other');

		$this->dropTable('ophcianassessment_medical_history_prosthetic_assignment');
		$this->dropTable('ophcianassessment_medical_history_prosthetic');

		$this->dropColumn('et_ophcianassessment_medical_history_review','noncardiac_implants');

		$this->dropColumn('et_ophcianassessment_medical_history_review','cardev_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review','cardev_comments');

		$this->dropTable('ophcianassessment_medical_history_cardev_assignment');
		$this->dropTable('ophcianassessment_medical_history_cardev');

		$this->dropColumn('et_ophcianassessment_medical_history_review','familyan_other');

		$this->dropTable('ophcianassessment_medical_history_familyan_assignment');
		$this->dropTable('ophcianassessment_medical_history_familyan');

		$this->dropColumn('et_ophcianassessment_medical_history_review','patientan_other');

		$this->dropTable('ophcianassessment_medical_history_patientan_assignment');
		$this->dropTable('ophcianassessment_medical_history_patientan');

		$this->dropColumn('et_ophcianassessment_medical_history_review','surgery_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review','surgery_comments');

		$this->dropTable('ophcianassessment_medical_history_surgery_assignment');
		$this->dropTable('ophcianassessment_medical_history_surgery');

		$this->dropColumn('et_ophcianassessment_medical_history_review','recent_cough');

		$this->dropColumn('et_ophcianassessment_medical_history_review','preg_test');

		$this->dropTable('ophcianassessment_medical_history_preg_assignment');
		$this->dropTable('ophcianassessment_medical_history_preg');

		$this->dropColumn('et_ophcianassessment_medical_history_review','psych_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review','psych_comments');

		$this->dropTable('ophcianassessment_medical_history_psych_assignment');
		$this->dropTable('ophcianassessment_medical_history_psych');

		$this->dropColumn('et_ophcianassessment_medical_history_review','falls_comments');

		$this->dropTable('ophcianassessment_medical_history_falls_assignment');
		$this->dropTable('ophcianassessment_medical_history_falls');

		$this->dropColumn('et_ophcianassessment_medical_history_review','misc_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review','misc_comments');

		$this->dropTable('ophcianassessment_medical_history_misc_assignment');
		$this->dropTable('ophcianassessment_medical_history_misc');

		$this->dropColumn('et_ophcianassessment_medical_history_review','neuro_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review','neuro_comments');

		$this->dropTable('ophcianassessment_medical_history_neuro_assignment');
		$this->dropTable('ophcianassessment_medical_history_neuro');

		$this->dropColumn('et_ophcianassessment_medical_history_review','gre_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review','gre_comments');

		$this->dropTable('ophcianassessment_medical_history_gre_assignment');
		$this->dropTable('ophcianassessment_medical_history_gre');

		$this->dropTable('ophcianassessment_medical_history_dbmonitor_assignment');
		$this->dropTable('ophcianassessment_medical_history_dbmonitor');

		$this->dropColumn('et_ophcianassessment_medical_history_review','diabetes_average_glucose');
		$this->dropColumn('et_ophcianassessment_medical_history_review','diabetes_comments');

		$this->dropTable('ophcianassessment_medical_history_dbtreat_assignment');
		$this->dropTable('ophcianassessment_medical_history_dbtreat');

		$this->dropColumn('et_ophcianassessment_medical_history_review','gi_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review','gi_comments');

		$this->dropTable('ophcianassessment_medical_history_gi_assignment');
		$this->dropTable('ophcianassessment_medical_history_gi');

		$this->dropColumn('et_ophcianassessment_medical_history_review','pulmonary_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review','pulmonary_comments');

		$this->dropTable('ophcianassessment_medical_history_pulmonary_assignment');
		$this->dropTable('ophcianassessment_medical_history_pulmonary');

		$this->dropColumn('et_ophcianassessment_medical_history_review','cardio_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review','cardio_comments');

		$this->dropTable('ophcianassessment_medical_history_cardio_assignment');
		$this->dropTable('ophcianassessment_medical_history_cardio');
	}
}
