<?php

class m140429_090648_dvt_element extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophcianassessment_dvt_exclusion_factor', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_dvt_exclusion_factor_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_dvt_exclusion_factor_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_dvt_exclusion_factor_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_exclusion_factor_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_dvt_exclusion_factor',array('id'=>1,'name'=>'Local anaesthesia / monitored anaesthesia care planned','display_order'=>1));
		$this->insert('ophcianassessment_dvt_exclusion_factor',array('id'=>2,'name'=>'Patient < 18yrs of age','display_order'=>2));
		$this->insert('ophcianassessment_dvt_exclusion_factor',array('id'=>3,'name'=>'Surgery < 60mins','display_order'=>3));

		$this->createTable('ophcianassessment_dvt_exclusion_factor_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'exclusion_factor_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_dvt_exclusion_factor_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_dvt_exclusion_factor_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_dvt_exclusion_factor_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_dvt_exclusion_factor_assignment_efi_fk` (`exclusion_factor_id`)',
				'CONSTRAINT `ophcianassessment_dvt_exclusion_factor_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_exclusion_factor_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_exclusion_factor_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_dvtassessment` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_exclusion_factor_assignment_efi_fk` FOREIGN KEY (`exclusion_factor_id`) REFERENCES `ophcianassessment_dvt_exclusion_factor` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianassessment_dvt_risk_factor_section', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_dvt_risk_factor_section_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_dvt_risk_factor_section_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_factor_section_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_factor_section_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_dvt_risk_factor_section',array('id'=>1,'name'=>'A'));
		$this->insert('ophcianassessment_dvt_risk_factor_section',array('id'=>2,'name'=>'B'));

		$this->createTable('ophcianassessment_dvt_risk_factor', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'section_id' => 'int(10) unsigned not null',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_dvt_risk_factor_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_dvt_risk_factor_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_dvt_risk_factor_sec_fk` (`section_id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_factor_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_factor_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_factor_sec_fk` FOREIGN KEY (`section_id`) REFERENCES `ophcianassessment_dvt_risk_factor_section` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>1,'section_id'=>1,'name'=>'Previous pulmonary embolus or deep vein thrombosis','display_order'=>1));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>2,'section_id'=>1,'name'=>'Active cancer or cancer treatment','display_order'=>2));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>3,'section_id'=>1,'name'=>'Chronic heart failure','display_order'=>3));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>4,'section_id'=>1,'name'=>'Acute systemic infectious disease','display_order'=>4));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>5,'section_id'=>1,'name'=>'Lower limb paralysis','display_order'=>5));

		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>6,'section_id'=>2,'name'=>'Pregnancy or < 6 weeks post partum','display_order'=>1));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>7,'section_id'=>2,'name'=>'BMI > 30kg/m2','display_order'=>2));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>8,'section_id'=>2,'name'=>'Acute or chronic lung disease','display_order'=>3));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>9,'section_id'=>2,'name'=>'HRT or estrogen containing contraception','display_order'=>4));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>10,'section_id'=>2,'name'=>'Thrombophilia','display_order'=>5));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>11,'section_id'=>2,'name'=>'Recent (within 4 weeks) continuous travel exceeding 3 hours','display_order'=>6));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>12,'section_id'=>2,'name'=>'Any disease limiting daily activity (ASA 3)','display_order'=>7));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>13,'section_id'=>2,'name'=>'Age > 60 years','display_order'=>8));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>14,'section_id'=>2,'name'=>'Surgery > 60 mins','display_order'=>9));
		$this->insert('ophcianassessment_dvt_risk_factor',array('id'=>15,'section_id'=>2,'name'=>'Expected post operative immobility','display_order'=>10));

		$this->createTable('ophcianassessment_dvt_risk_factor_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'risk_factor_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_dvt_risk_factor_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_dvt_risk_factor_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_dvt_risk_factor_assignment_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_dvt_risk_factor_assignment_rfi_fk` (`risk_factor_id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_factor_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_factor_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_factor_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_dvtassessment` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_factor_assignment_rfi_fk` FOREIGN KEY (`risk_factor_id`) REFERENCES `ophcianassessment_dvt_risk_factor` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianassessment_dvt_risk_prophylaxis', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'score_from' => 'tinyint(1) unsigned not null',
				'score_to' => 'tinyint(1) unsigned null',
				'risk_level' => 'varchar(16) not null',
				'prophylaxis_required' => 'text not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_dvt_risk_prophylaxis_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_dvt_risk_prophylaxis_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_prophylaxis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_risk_prophylaxis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_dvt_risk_prophylaxis',array('id'=>1,'score_from'=>0,'score_to'=>1,'risk_level'=>'Low','prophylaxis_required'=>'Early ambulation'));
		$this->insert('ophcianassessment_dvt_risk_prophylaxis',array('id'=>2,'score_from'=>2,'score_to'=>3,'risk_level'=>'Medium','prophylaxis_required'=>"Early mobilisation\nGraduated compression stockings from admission until ambulation"));
		$this->insert('ophcianassessment_dvt_risk_prophylaxis',array('id'=>3,'score_from'=>4,'score_to'=>null,'risk_level'=>'High','prophylaxis_required'=>"Early ambulation\nGraduated compression stockings from admission until ambulation\nIntermittent low molecular weight heparin if not at risk of surgical bleeding"));

		$this->createTable('ophcianassessment_dvt_stocking_contraindication', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_dvt_stocking_contraindication_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_dvt_stocking_contraindication_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_dvt_stocking_contraindication_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_stocking_contraindication_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_dvt_stocking_contraindication',array('id'=>1,'name'=>'Gross edema','display_order'=>1));
		$this->insert('ophcianassessment_dvt_stocking_contraindication',array('id'=>2,'name'=>'Limb deformity','display_order'=>2));
		$this->insert('ophcianassessment_dvt_stocking_contraindication',array('id'=>3,'name'=>'Peripheral vascular disease','display_order'=>3));
		$this->insert('ophcianassessment_dvt_stocking_contraindication',array('id'=>4,'name'=>'Peripheral neuropathy','display_order'=>4));
		$this->insert('ophcianassessment_dvt_stocking_contraindication',array('id'=>5,'name'=>'Local leg conditions like cellulitis, dermatitis etc','display_order'=>5));
		$this->insert('ophcianassessment_dvt_stocking_contraindication',array('id'=>6,'name'=>'Obesity preventing fitting','display_order'=>6));

		$this->createTable('ophcianassessment_dvt_stocking_contraindication_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'contraindication_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_dvt_stocking_ca_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_dvt_stocking_ca_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_dvt_stocking_ca_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_dvt_stocking_ca_cti_fk` (`contraindication_id`)',
				'CONSTRAINT `ophcianassessment_dvt_stocking_ca_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_stocking_ca_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_stocking_ca_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_dvtassessment` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_stocking_ca_cti_fk` FOREIGN KEY (`contraindication_id`) REFERENCES `ophcianassessment_dvt_stocking_contraindication` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianassessment_dvt_heparin_contraindication', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_dvt_heparin_contraindication_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_dvt_heparin_contraindication_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_dvt_heparin_contraindication_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_heparin_contraindication_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_dvt_heparin_contraindication',array('id'=>1,'name'=>'Active bleeding / platelet count','display_order'=>1));
		$this->insert('ophcianassessment_dvt_heparin_contraindication',array('id'=>2,'name'=>'Abnormal clotting','display_order'=>2));
		$this->insert('ophcianassessment_dvt_heparin_contraindication',array('id'=>3,'name'=>'Severe renal / hepatic failure','display_order'=>3));
		$this->insert('ophcianassessment_dvt_heparin_contraindication',array('id'=>4,'name'=>'Allergy to LMWH','display_order'=>4));
		$this->insert('ophcianassessment_dvt_heparin_contraindication',array('id'=>5,'name'=>'Current anticoagulant use','display_order'=>5));
		$this->insert('ophcianassessment_dvt_heparin_contraindication',array('id'=>6,'name'=>'Uncontrolled hypertension','display_order'=>6));
		$this->insert('ophcianassessment_dvt_heparin_contraindication',array('id'=>7,'name'=>'Recent intraocular surgery','display_order'=>7));

		$this->createTable('ophcianassessment_dvt_heparin_contraindication_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'contraindication_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_dvt_heparin_ca_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_dvt_heparin_ca_cui_fk` (`created_user_id`)',
				'KEY `ophcianassessment_dvt_heparin_ca_ele_fk` (`element_id`)',
				'KEY `ophcianassessment_dvt_heparin_ca_cti_fk` (`contraindication_id`)',
				'CONSTRAINT `ophcianassessment_dvt_heparin_ca_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_heparin_ca_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_heparin_ca_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_dvtassessment` (`id`)',
				'CONSTRAINT `ophcianassessment_dvt_heparin_ca_cti_fk` FOREIGN KEY (`contraindication_id`) REFERENCES `ophcianassessment_dvt_heparin_contraindication` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('ophcianassessment_dvt_heparin_contraindication_assignment');
		$this->dropTable('ophcianassessment_dvt_heparin_contraindication');
		$this->dropTable('ophcianassessment_dvt_stocking_contraindication_assignment');
		$this->dropTable('ophcianassessment_dvt_stocking_contraindication');
		$this->dropTable('ophcianassessment_dvt_risk_prophylaxis');
		$this->dropTable('ophcianassessment_dvt_risk_factor_assignment');
		$this->dropTable('ophcianassessment_dvt_risk_factor');
		$this->dropTable('ophcianassessment_dvt_risk_factor_section');
		$this->dropTable('ophcianassessment_dvt_exclusion_factor_assignment');
		$this->dropTable('ophcianassessment_dvt_exclusion_factor');
	}
}
