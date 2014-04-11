<?php 
class m140411_105544_event_type_OphCiAnaestheticassessment extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiAnaestheticassessment'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Clinical events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCiAnaestheticassessment', 'name' => 'Anaestheticassessment','event_group_id' => $group['id']));
		}

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiAnaestheticassessment'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient ID',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient ID','class_name' => 'Element_OphCiAnaestheticassessment_PatientId', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient ID'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Translator',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Translator','class_name' => 'Element_OphCiAnaestheticassessment_Translator', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Translator'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Procedures',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Procedures','class_name' => 'Element_OphCiAnaestheticassessment_Procedures', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Procedures'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Medication',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Medication','class_name' => 'Element_OphCiAnaestheticassessment_Medication', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Medication'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Allergies',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Allergies','class_name' => 'Element_OphCiAnaestheticassessment_Allergies', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Allergies'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Checklist',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Checklist','class_name' => 'Element_OphCiAnaestheticassessment_Checklist', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Checklist'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Examination',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Examination','class_name' => 'Element_OphCiAnaestheticassessment_Examination', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Examination'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'DVT Asessment',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'DVT Asessment','class_name' => 'Element_OphCiAnaestheticassessment_DvtAsessment', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'DVT Asessment'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Investigations',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Investigations','class_name' => 'Element_OphCiAnaestheticassessment_Investigations', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Investigations'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Anesthesia Plan',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Anesthesia Plan','class_name' => 'Element_OphCiAnaestheticassessment_AnesthesiaPlan', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Anesthesia Plan'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient Specific Preoperative Education',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient Specific Preoperative Education','class_name' => 'Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient Specific Preoperative Education'))->queryRow();



		$this->createTable('et_ophcianassessment_patientid', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'patient_identifed' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_patientid_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_patientid_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_patientid_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianassessment_patientid_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_patientid_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_patientid_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianassessment_translator_translator_present', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_translator_translator_present_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_translator_translator_present_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_translator_translator_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_translator_translator_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_translator_translator_present',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophcianassessment_translator_translator_present',array('name'=>'No','display_order'=>2));
		$this->insert('ophcianassessment_translator_translator_present',array('name'=>'NA','display_order'=>3));



		$this->createTable('et_ophcianassessment_translator', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'translator_present_id' => 'int(10) unsigned NOT NULL',

				'name' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_translator_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_translator_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_translator_ev_fk` (`event_id`)',
				'KEY `ophcianassessment_translator_translator_present_fk` (`translator_present_id`)',
				'CONSTRAINT `et_ophcianassessment_translator_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_translator_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_translator_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophcianassessment_translator_translator_present_fk` FOREIGN KEY (`translator_present_id`) REFERENCES `ophcianassessment_translator_translator_present` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophcianassessment_procedures', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'procedures' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'site' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_procedures_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_procedures_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_procedures_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianassessment_procedures_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_procedures_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_procedures_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophcianassessment_medication', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'medication' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_medication_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_medication_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_medication_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianassessment_medication_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_medication_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_medication_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophcianassessment_allergies', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'allergies' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_allergies_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_allergies_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_allergies_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianassessment_allergies_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_allergies_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_allergies_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophcianassessment_checklist', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'previous_surgical_procedures' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'patient_anesthesia' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'family_anesthesia' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'pain' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'cardiovascular' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'respiratory' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'gastro_intestinal' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'diabetes' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'genitourinary_renal_endocrine' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'neuro_musculoskeletal' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'falls_mobility_risk' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'miscelaneous' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'psychiatric' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'pregnancy_status' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'exposure' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'dental' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'tabacco_use' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'alcohol_use' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'recreational_drug_use' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_checklist_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_checklist_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_checklist_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianassessment_checklist_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_checklist_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_checklist_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianassessment_examination_weight_calculation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_examination_weight_calculation_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_examination_weight_calculation_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_examination_weight_calculation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_examination_weight_calculation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_examination_weight_calculation',array('name'=>'Measured','display_order'=>1));
		$this->insert('ophcianassessment_examination_weight_calculation',array('name'=>'Estimated','display_order'=>2));

		$this->createTable('ophcianassessment_examination_height_calculation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_examination_height_calculation_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_examination_height_calculation_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_examination_height_calculation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_examination_height_calculation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_examination_height_calculation',array('name'=>'Measured','display_order'=>1));
		$this->insert('ophcianassessment_examination_height_calculation',array('name'=>'Estimated','display_order'=>2));

		$this->createTable('ophcianassessment_examination_airway_class', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_examination_airway_class_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_examination_airway_class_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_examination_airway_class_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_examination_airway_class_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_examination_airway_class',array('name'=>'1','display_order'=>1));
		$this->insert('ophcianassessment_examination_airway_class',array('name'=>'2','display_order'=>2));
		$this->insert('ophcianassessment_examination_airway_class',array('name'=>'3','display_order'=>3));
		$this->insert('ophcianassessment_examination_airway_class',array('name'=>'4','display_order'=>4));

		$this->createTable('ophcianassessment_examination_teeth', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_examination_teeth_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_examination_teeth_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_examination_teeth_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_examination_teeth_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_examination_teeth',array('name'=>'Loose teeth','display_order'=>1));
		$this->insert('ophcianassessment_examination_teeth',array('name'=>'caps / crowns','display_order'=>2));

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
		$this->insert('ophcianassessment_examination_dental',array('name'=>'Other','display_order'=>3));



		$this->createTable('et_ophcianassessment_examination', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'weight' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'lbs' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'weight_calculation_id' => 'int(10) unsigned NOT NULL',

				'height' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'ft' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'in' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'height_calculation_id' => 'int(10) unsigned NOT NULL',

				'bmi' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'blood_pressure' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'mmhg' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'heart_rate_pulse' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'temperature' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'respiratory_rate' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'sao2' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'airway_class_id' => 'int(10) unsigned NOT NULL',

				'blood_glucose' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'heart' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'lungs' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'abdomen' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'teeth_other' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_examination_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_examination_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_examination_ev_fk` (`event_id`)',
				'KEY `ophcianassessment_examination_weight_calculation_fk` (`weight_calculation_id`)',
				'KEY `ophcianassessment_examination_height_calculation_fk` (`height_calculation_id`)',
				'KEY `ophcianassessment_examination_airway_class_fk` (`airway_class_id`)',
				'CONSTRAINT `et_ophcianassessment_examination_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_examination_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_examination_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophcianassessment_examination_weight_calculation_fk` FOREIGN KEY (`weight_calculation_id`) REFERENCES `ophcianassessment_examination_weight_calculation` (`id`)',
				'CONSTRAINT `ophcianassessment_examination_height_calculation_fk` FOREIGN KEY (`height_calculation_id`) REFERENCES `ophcianassessment_examination_height_calculation` (`id`)',
				'CONSTRAINT `ophcianassessment_examination_airway_class_fk` FOREIGN KEY (`airway_class_id`) REFERENCES `ophcianassessment_examination_airway_class` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcianassessment_examination_teeth_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophcianassessment_examination_teeth_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_examination_teeth_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_examination_teeth_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_examination_teeth_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophcianassessment_examination_teeth_assignment_lku_fk` (`ophcianassessment_examination_teeth_id`)',
				'CONSTRAINT `et_ophcianassessment_examination_teeth_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_examination_teeth_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_examination_teeth_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_examination` (`id`)',
				'CONSTRAINT `et_ophcianassessment_examination_teeth_assignment_lku_fk` FOREIGN KEY (`ophcianassessment_examination_teeth_id`) REFERENCES `ophcianassessment_examination_teeth` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

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



		$this->createTable('et_ophcianassessment_dvtasessment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_dvtasessment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_dvtasessment_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_dvtasessment_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianassessment_dvtasessment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_dvtasessment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_dvtasessment_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophcianassessment_investigations', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'investigations' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_investigations_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_investigations_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_investigations_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianassessment_investigations_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_investigations_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_investigations_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianassessment_anesthesiaplan_surgery_aproval', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_anesthesiaplan_surgery_aproval_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_anesthesiaplan_surgery_aproval_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_surgery_aproval_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_surgery_aproval_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_anesthesiaplan_surgery_aproval',array('name'=>'Awaiting further information do not schedule','display_order'=>1));
		$this->insert('ophcianassessment_anesthesiaplan_surgery_aproval',array('name'=>'Not approved for surgery','display_order'=>2));

		$this->createTable('ophcianassessment_anesthesiaplan_not_app', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_anesthesiaplan_not_app_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_anesthesiaplan_not_app_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_not_app_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_not_app_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_anesthesiaplan_not_app',array('name'=>'Uncontrolled Hypertension','display_order'=>1));
		$this->insert('ophcianassessment_anesthesiaplan_not_app',array('name'=>'Uncontrolled Diabetes','display_order'=>2));
		$this->insert('ophcianassessment_anesthesiaplan_not_app',array('name'=>'Unstable ishemic heart disease','display_order'=>3));
		$this->insert('ophcianassessment_anesthesiaplan_not_app',array('name'=>'Other','display_order'=>4));

		$this->createTable('ophcianassessment_anesthesiaplan_acceptance', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_anesthesiaplan_acceptance_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_anesthesiaplan_acceptance_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_acceptance_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_acceptance_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_anesthesiaplan_acceptance',array('name'=>'Waiting on lab results','display_order'=>1));
		$this->insert('ophcianassessment_anesthesiaplan_acceptance',array('name'=>'Other','display_order'=>2));

		$this->createTable('ophcianassessment_anesthesiaplan_asa_level', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_anesthesiaplan_asa_level_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_anesthesiaplan_asa_level_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_asa_level_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_asa_level_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_anesthesiaplan_asa_level',array('name'=>'1','display_order'=>1));
		$this->insert('ophcianassessment_anesthesiaplan_asa_level',array('name'=>'2','display_order'=>2));
		$this->insert('ophcianassessment_anesthesiaplan_asa_level',array('name'=>'3','display_order'=>3));
		$this->insert('ophcianassessment_anesthesiaplan_asa_level',array('name'=>'4','display_order'=>4));

		$this->createTable('ophcianassessment_anesthesiaplan_anesthesia_plan', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_anesthesiaplan_anesthesia_plan_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_anesthesiaplan_anesthesia_plan_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_anesthesia_plan_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_anesthesia_plan_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_anesthesiaplan_anesthesia_plan',array('name'=>'GA','display_order'=>1));
		$this->insert('ophcianassessment_anesthesiaplan_anesthesia_plan',array('name'=>'LA/Block','display_order'=>2));
		$this->insert('ophcianassessment_anesthesiaplan_anesthesia_plan',array('name'=>'Field Block +/- Sedation','display_order'=>3));
		$this->insert('ophcianassessment_anesthesiaplan_anesthesia_plan',array('name'=>'Topical','display_order'=>4));
		$this->insert('ophcianassessment_anesthesiaplan_anesthesia_plan',array('name'=>'Sedation','display_order'=>5));



		$this->createTable('et_ophcianassessment_anesthesiaplan', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'surgery_aproval_id' => 'int(10) unsigned NOT NULL',

				'com_na' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'acceptance_id' => 'int(10) unsigned NOT NULL',

				'waiting_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'asa_level_id' => 'int(10) unsigned NOT NULL',

				'anesthesia_plan_id' => 'int(10) unsigned NOT NULL',

				'anesthesia_plan_comment' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_anesthesiaplan_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_anesthesiaplan_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_anesthesiaplan_ev_fk` (`event_id`)',
				'KEY `ophcianassessment_anesthesiaplan_surgery_aproval_fk` (`surgery_aproval_id`)',
				'KEY `ophcianassessment_anesthesiaplan_acceptance_fk` (`acceptance_id`)',
				'KEY `ophcianassessment_anesthesiaplan_asa_level_fk` (`asa_level_id`)',
				'KEY `ophcianassessment_anesthesiaplan_anesthesia_plan_fk` (`anesthesia_plan_id`)',
				'CONSTRAINT `et_ophcianassessment_anesthesiaplan_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_anesthesiaplan_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_anesthesiaplan_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_surgery_aproval_fk` FOREIGN KEY (`surgery_aproval_id`) REFERENCES `ophcianassessment_anesthesiaplan_surgery_aproval` (`id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_acceptance_fk` FOREIGN KEY (`acceptance_id`) REFERENCES `ophcianassessment_anesthesiaplan_acceptance` (`id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_asa_level_fk` FOREIGN KEY (`asa_level_id`) REFERENCES `ophcianassessment_anesthesiaplan_asa_level` (`id`)',
				'CONSTRAINT `ophcianassessment_anesthesiaplan_anesthesia_plan_fk` FOREIGN KEY (`anesthesia_plan_id`) REFERENCES `ophcianassessment_anesthesiaplan_anesthesia_plan` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcianassessment_anesthesiaplan_not_app_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophcianassessment_anesthesiaplan_not_app_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_anesthesiaplan_not_app_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_anesthesiaplan_not_app_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_anesthesiaplan_not_app_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophcianassessment_anesthesiaplan_not_app_assignment_lku_fk` (`ophcianassessment_anesthesiaplan_not_app_id`)',
				'CONSTRAINT `et_ophcianassessment_anesthesiaplan_not_app_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_anesthesiaplan_not_app_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_anesthesiaplan_not_app_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_anesthesiaplan` (`id`)',
				'CONSTRAINT `et_ophcianassessment_anesthesiaplan_not_app_assignment_lku_fk` FOREIGN KEY (`ophcianassessment_anesthesiaplan_not_app_id`) REFERENCES `ophcianassessment_anesthesiaplan_not_app` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophcianassessment_specificeducation_speced_id', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcianassessment_specificeducation_speced_id_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcianassessment_specificeducation_speced_id_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcianassessment_specificeducation_speced_id_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcianassessment_specificeducation_speced_id_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcianassessment_specificeducation_speced_id',array('name'=>'Adult Instructions','display_order'=>1));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('name'=>'Laser Instructions','display_order'=>2));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('name'=>'Pediatric Instructions','display_order'=>3));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('name'=>'Diabetes Instructions','display_order'=>4));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('name'=>'Eat and drink normally','display_order'=>5));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('name'=>'Fast as adult','display_order'=>6));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('name'=>'Take normal medications','display_order'=>7));
		$this->insert('ophcianassessment_specificeducation_speced_id',array('name'=>'Medications','display_order'=>8));



		$this->createTable('et_ophcianassessment_specificeducation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'medications' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'other' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcianassessment_specificeducation_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcianassessment_specificeducation_cui_fk` (`created_user_id`)',
				'KEY `et_ophcianassessment_specificeducation_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophcianassessment_specificeducation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_specificeducation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcianassessment_specificeducation_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophcianassessment_specificeducation_speced_id_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophcianassessment_specificeducation_speced_id_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ossia_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ossia_cui_fk` (`created_user_id`)',
				'KEY `et_ossia_ele_fk` (`element_id`)',
				'KEY `et_ossia_lku_fk` (`ophcianassessment_specificeducation_speced_id_id`)',
				'CONSTRAINT `et_ossia_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ossia_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ossia_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcianassessment_specificeducation` (`id`)',
				'CONSTRAINT `et_ossia_lku_fk` FOREIGN KEY (`ophcianassessment_specificeducation_speced_id_id`) REFERENCES `ophcianassessment_specificeducation_speced_id` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		$this->dropTable('et_ophcianassessment_patientid');



		$this->dropTable('et_ophcianassessment_translator');


		$this->dropTable('ophcianassessment_translator_translator_present');

		$this->dropTable('et_ophcianassessment_procedures');



		$this->dropTable('et_ophcianassessment_medication');



		$this->dropTable('et_ophcianassessment_allergies');



		$this->dropTable('et_ophcianassessment_checklist');



		$this->dropTable('et_ophcianassessment_examination_teeth_assignment');
		$this->dropTable('et_ophcianassessment_examination_dental_assignment');
		$this->dropTable('et_ophcianassessment_examination');


		$this->dropTable('ophcianassessment_examination_weight_calculation');
		$this->dropTable('ophcianassessment_examination_height_calculation');
		$this->dropTable('ophcianassessment_examination_airway_class');
		$this->dropTable('ophcianassessment_examination_teeth');
		$this->dropTable('ophcianassessment_examination_dental');

		$this->dropTable('et_ophcianassessment_dvtasessment');



		$this->dropTable('et_ophcianassessment_investigations');



		$this->dropTable('et_ophcianassessment_anesthesiaplan_not_app_assignment');
		$this->dropTable('et_ophcianassessment_anesthesiaplan');


		$this->dropTable('ophcianassessment_anesthesiaplan_surgery_aproval');
		$this->dropTable('ophcianassessment_anesthesiaplan_not_app');
		$this->dropTable('ophcianassessment_anesthesiaplan_acceptance');
		$this->dropTable('ophcianassessment_anesthesiaplan_asa_level');
		$this->dropTable('ophcianassessment_anesthesiaplan_anesthesia_plan');

		$this->dropTable('et_ophcianassessment_specificeducation_speced_id_assignment');
		$this->dropTable('et_ophcianassessment_specificeducation');


		$this->dropTable('ophcianassessment_specificeducation_speced_id');


		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiAnaestheticassessment'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		$this->delete('element_type', 'event_type_id='.$event_type['id']);
		$this->delete('event_type', 'id='.$event_type['id']);
	}
}

