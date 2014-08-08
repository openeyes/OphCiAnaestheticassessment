<?php

class m140807_064816_examination_measurements extends OEMigration
{
	public function up()
	{
		$this->addColumn('et_ophcianassessment_examination','weight_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination','height_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination','bmi_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination','blood_pressure_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination','pulse_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination','temperature_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination','rr_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination','sao2_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination','blood_glucose_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination','airway_class_m_id','int(10) unsigned null');

		$this->addColumn('et_ophcianassessment_examination_version','weight_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination_version','height_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination_version','bmi_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination_version','blood_pressure_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination_version','pulse_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination_version','temperature_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination_version','rr_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination_version','sao2_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination_version','blood_glucose_m_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination_version','airway_class_m_id','int(10) unsigned null');

		$types = array();
		foreach ($this->dbConnection->createCommand()->select("*")->from("measurement_type")->queryAll() as $type) {
			$types[$type['class_name']] = $type['id'];
		}

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophcianassessment_examination")->order("id asc")->queryAll() as $element) {
			$event = $this->getRecord('event',$element['event_id']);
			$episode = $this->getRecord('episode',$event['episode_id']);

			foreach (array(
					'weight_kg' => array('MeasurementWeight','measurement_weight','weight','weight_m_id'),
					'height_cm' => array('MeasurementHeight','measurement_height','height','height_m_id'),
					'bmi' => array('MeasurementBMI','measurement_bmi','bmi','bmi_m_id'),
					'bp_systolic' => array('MeasurementBloodPressure','measurement_blood_pressure','bp_systolic','blood_pressure_m_id'),
					'heart_rate_pulse' => array('MeasurementPulse','measurement_pulse','pulse','pulse_m_id'),
					'temperature' => array('MeasurementTemperature','measurement_temperature','temperature','temperature_m_id'),
					'respiratory_rate' => array('MeasurementRespiratoryRate','measurement_respiratory_rate','rr','rr_m_id'),
					'sao2' => array('MeasurementSAO2','measurement_sao2','sao2','sao2_m_id'),
					'airway_class' => array('MeasurementAirwayClass','measurement_airway_class','airway_class','airway_class_m_id'),
					'blood_glucose' => array('MeasurementBloodGlucose','measurement_blood_glucose','blood_glucose','blood_glucose_m_id'),
				) as $element_field => $params) {
				if ($element_field == 'airway_class') {
					$element[$element_field] = $this->dbConnection->createCommand()->select("id")->from("ophcianassessment_examination_airway_class")->where("id = :id",array(":id" => $element['airway_class_id']))->queryScalar();
				}

				if ($element[$element_field]) {
					$this->insert('patient_measurement',array(
						'patient_id' => $episode['patient_id'],
						'measurement_type_id' => $types[$params[0]],
						'created_user_id' => $element['created_user_id'],
						'created_date' => $element['created_date'],
						'last_modified_user_id' => $element['last_modified_user_id'],
						'last_modified_date' => $element['last_modified_date'],
						'timestamp' => $element['created_date'],
					));

					$pm_id = $this->dbConnection->createCommand()->select("max(id)")->from("patient_measurement")->queryScalar();

					$attributes = array(
						'patient_measurement_id' => $pm_id,
						$params[2] => $element[$element_field],
					);

					if ($element_field == 'bp_systolic') {
						$attributes['bp_diastolic'] = $element['bp_diastolic'];
					}

					$this->insert($params[1],$attributes);

					$m_id = $this->dbConnection->createCommand()->select("max(id)")->from($params[1])->queryScalar();

					$this->update('et_ophcianassessment_examination',array($params[3] => $m_id),"id = {$element['id']}");

					$this->insert('measurement_reference',array(
						'patient_measurement_id' => $pm_id,
						'event_id' => $event['id'],
						'origin' => 1,
					));
				}
			}
		}

		$this->addForeignKey('et_ophcianassessment_examination_wmi_fk','et_ophcianassessment_examination','weight_m_id','measurement_weight','id');
		$this->addForeignKey('et_ophcianassessment_examination_hmi_fk','et_ophcianassessment_examination','height_m_id','measurement_height','id');
		$this->addForeignKey('et_ophcianassessment_examination_bmi_fk','et_ophcianassessment_examination','bmi_m_id','measurement_bmi','id');
		$this->addForeignKey('et_ophcianassessment_examination_bpmi_fk','et_ophcianassessment_examination','blood_pressure_m_id','measurement_blood_pressure','id');
		$this->addForeignKey('et_ophcianassessment_examination_pmi_fk','et_ophcianassessment_examination','pulse_m_id','measurement_pulse','id');
		$this->addForeignKey('et_ophcianassessment_examination_tmi_fk','et_ophcianassessment_examination','temperature_m_id','measurement_temperature','id');
		$this->addForeignKey('et_ophcianassessment_examination_rrmi_fk','et_ophcianassessment_examination','rr_m_id','measurement_respiratory_rate','id');
		$this->addForeignKey('et_ophcianassessment_examination_sao2_fk','et_ophcianassessment_examination','sao2_m_id','measurement_sao2','id');
		$this->addForeignKey('et_ophcianassessment_examination_bgmi_fk','et_ophcianassessment_examination','blood_glucose_m_id','measurement_blood_glucose','id');
		$this->addForeignKey('et_ophcianassessment_examination_acmi_fk','et_ophcianassessment_examination','airway_class_m_id','measurement_airway_class','id');

		foreach (array('weight_lb','weight_kg','height_ft','height_cm','bmi','bp_systolic','heart_rate_pulse','temperature','respiratory_rate','sao2','blood_glucose','height_in','bp_diastolic') as $field) {
			$this->dropColumn('et_ophcianassessment_examination',$field);
			$this->dropColumn('et_ophcianassessment_examination_version',$field);
		}

		$this->dropForeignKey('ophcianassessment_examination_airway_class_fk','et_ophcianassessment_examination');
		$this->dropColumn('et_ophcianassessment_examination','airway_class_id');
		$this->dropColumn('et_ophcianassessment_examination_version','airway_class_id');

		$this->dropTable('ophcianassessment_examination_airway_class');
		$this->dropTable('ophcianassessment_examination_airway_class_version');
	}

	public function getRecord($table,$id)
	{
		return $this->dbConnection->createCommand()->select("*")->from($table)->where("id = :id",array(":id" => $id))->queryRow();
	}

	public function down()
	{
		$this->execute("CREATE TABLE `ophcianassessment_examination_airway_class` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophcianassessment_examination_airway_class_lmui_fk` (`last_modified_user_id`),
	KEY `ophcianassessment_examination_airway_class_cui_fk` (`created_user_id`),
	CONSTRAINT `ophcianassessment_examination_airway_class_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophcianassessment_examination_airway_class_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		for ($i=1;$i<=4;$i++) {
			$this->insert('ophcianassessment_examination_airway_class',array('id'=>$i,'name'=>$i,'display_order'=>$i));
		}

		$this->versionExistingTable('ophcianassessment_examination_airway_class');

		$this->addColumn('et_ophcianassessment_examination','airway_class_id','int(10) unsigned null');
		$this->addColumn('et_ophcianassessment_examination_version','airway_class_id','int(10) unsigned null');

		$this->addColumn('et_ophcianassessment_examination','weight_lb','decimal(4,1) null');
		$this->addColumn('et_ophcianassessment_examination','weight_kg','decimal(4,1) null');
		$this->addColumn('et_ophcianassessment_examination','height_ft','varchar(1) null');
		$this->addColumn('et_ophcianassessment_examination','height_cm','decimal(4,1) null');
		$this->addColumn('et_ophcianassessment_examination','bmi','decimal(5,2) null');
		$this->addColumn('et_ophcianassessment_examination','bp_systolic','int(10) null');
		$this->addColumn('et_ophcianassessment_examination','heart_rate_pulse','int(10) null');
		$this->addColumn('et_ophcianassessment_examination','temperature','decimal(3,1) null');
		$this->addColumn('et_ophcianassessment_examination','respiratory_rate','int(10) null');
		$this->addColumn('et_ophcianassessment_examination','sao2','int(10) null');
		$this->addColumn('et_ophcianassessment_examination','blood_glucose','int(10) null');
		$this->addColumn('et_ophcianassessment_examination','height_in','varchar(1) null');
		$this->addColumn('et_ophcianassessment_examination','bp_diastolic','varchar(2) null');

		$this->addColumn('et_ophcianassessment_examination_version','weight_lb','decimal(4,1) null');
		$this->addColumn('et_ophcianassessment_examination_version','weight_kg','decimal(4,1) null');
		$this->addColumn('et_ophcianassessment_examination_version','height_ft','varchar(1) null');
		$this->addColumn('et_ophcianassessment_examination_version','height_cm','decimal(4,1) null');
		$this->addColumn('et_ophcianassessment_examination_version','bmi','decimal(5,2) null');
		$this->addColumn('et_ophcianassessment_examination_version','bp_systolic','int(10) null');
		$this->addColumn('et_ophcianassessment_examination_version','heart_rate_pulse','int(10) null');
		$this->addColumn('et_ophcianassessment_examination_version','temperature','decimal(3,1) null');
		$this->addColumn('et_ophcianassessment_examination_version','respiratory_rate','int(10) null');
		$this->addColumn('et_ophcianassessment_examination_version','sao2','int(10) null');
		$this->addColumn('et_ophcianassessment_examination_version','blood_glucose','int(10) null');
		$this->addColumn('et_ophcianassessment_examination_version','height_in','varchar(1) null');
		$this->addColumn('et_ophcianassessment_examination_version','bp_diastolic','varchar(2) null');

		$this->dropForeignKey('et_ophcianassessment_examination_wmi_fk','et_ophcianassessment_examination');
		$this->dropForeignKey('et_ophcianassessment_examination_hmi_fk','et_ophcianassessment_examination');
		$this->dropForeignKey('et_ophcianassessment_examination_bmi_fk','et_ophcianassessment_examination');
		$this->dropForeignKey('et_ophcianassessment_examination_bpmi_fk','et_ophcianassessment_examination');
		$this->dropForeignKey('et_ophcianassessment_examination_pmi_fk','et_ophcianassessment_examination');
		$this->dropForeignKey('et_ophcianassessment_examination_tmi_fk','et_ophcianassessment_examination');
		$this->dropForeignKey('et_ophcianassessment_examination_rrmi_fk','et_ophcianassessment_examination');
		$this->dropForeignKey('et_ophcianassessment_examination_sao2_fk','et_ophcianassessment_examination');
		$this->dropForeignKey('et_ophcianassessment_examination_bgmi_fk','et_ophcianassessment_examination');
		$this->dropForeignKey('et_ophcianassessment_examination_acmi_fk','et_ophcianassessment_examination');

		$types = array();
		foreach ($this->dbConnection->createCommand()->select("*")->from("measurement_type")->queryAll() as $type) {
			$types[$type['class_name']] = $type['id'];
		}

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophcianassessment_examination")->order("id asc")->queryAll() as $element) {
			$event = $this->getRecord('event',$element['event_id']);
			$episode = $this->getRecord('episode',$event['episode_id']);

			foreach (array(
					'weight_kg' => array('MeasurementWeight','measurement_weight','weight','weight_m_id'),
					'height_cm' => array('MeasurementHeight','measurement_height','height','height_m_id'),
					'bmi' => array('MeasurementBMI','measurement_bmi','bmi','bmi_m_id'),
					'bp_systolic' => array('MeasurementBloodPressure','measurement_blood_pressure','bp_systolic','blood_pressure_m_id'),
					'heart_rate_pulse' => array('MeasurementPulse','measurement_pulse','pulse','pulse_m_id'),
					'temperature' => array('MeasurementTemperature','measurement_temperature','temperature','temperature_m_id'),
					'respiratory_rate' => array('MeasurementRespiratoryRate','measurement_respiratory_rate','rr','rr_m_id'),
					'sao2' => array('MeasurementSAO2','measurement_sao2','sao2','sao2_m_id'),
					'airway_class' => array('MeasurementAirwayClass','measurement_airway_class','airway_class','airway_class_m_id'),
					'blood_glucose' => array('MeasurementBloodGlucose','measurement_blood_glucose','blood_glucose','blood_glucose_m_id'),
				) as $element_field => $params) {
				
				if ($element[$params[3]]) {
					$m = $this->dbConnection->createCommand()->select("*")->from($params[1])->where("id = ".$element[$params[3]])->queryRow();

					if ($params[3] == 'airway_class_m_id') {
						$airway_class_id = $this->dbConnection->createCommand()->select("id")->from("ophcianassessment_examination_airway_class")->where("name = :name",array(":name" => $m[$params[2]]))->queryScalar();
						$this->update('et_ophcianassessment_examination',array('airway_class_id' => $airway_class_id['id']),"id = {$element['id']}");
					} else {
						$this->update('et_ophcianassessment_examination',array($element_field => $m[$params[2]]),"id = {$element['id']}");

						if ($element_field == 'bp_systolic') {
							$this->update('et_ophcianassessment_examination',array('bp_diastolic' => $m['bp_diastolic']),"id = {$element['id']}");
						}
					}

					$this->delete('measurement_reference',"patient_measurement_id = {$m['patient_measurement_id']}");
					$this->delete($params[1],"id = {$m['id']}");
					$this->delete('patient_measurement',"id = {$m['patient_measurement_id']}");
				}
			}
		}

		$this->addForeignKey('ophcianassessment_examination_airway_class_fk','et_ophcianassessment_examination','airway_class_id','ophcianassessment_examination_airway_class','id');

		foreach (array('weight_m_id','height_m_id','bmi_m_id','blood_pressure_m_id','pulse_m_id','temperature_m_id','rr_m_id','sao2_m_id','blood_glucose_m_id','airway_class_m_id') as $field) {
			$this->dropColumn('et_ophcianassessment_examination',$field);
			$this->dropColumn('et_ophcianassessment_examination_version',$field);
		}
	}
}
