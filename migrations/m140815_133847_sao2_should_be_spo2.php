<?php

class m140815_133847_sao2_should_be_spo2 extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophcianassessment_examination_sao2_fk','et_ophcianassessment_examination');

		$this->renameColumn('et_ophcianassessment_examination','sao2_m_id','spo2_m_id');
		$this->renameColumn('et_ophcianassessment_examination_version','sao2_m_id','spo2_m_id');

		$spo2_type_id = $this->dbConnection->createCommand()->select("id")->from("measurement_type")->where("class_name = 'MeasurementSPO2'")->queryScalar();

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophcianassessment_examination")->where("spo2_m_id is not null")->queryAll() as $row) {
			$sao2 = $this->dbConnection->createCommand()->select("*")->from("measurement_sao2")->where("id = {$row['spo2_m_id']}")->queryRow();
			$pm = $this->dbConnection->createCommand()->select("*")->from("patient_measurement")->where("id = {$sao2['patient_measurement_id']}")->queryRow();
			$ref = $this->dbConnection->createCommand()->select("*")->from("measurement_reference")->where("patient_measurement_id = {$pm['id']} and event_id = {$row['event_id']}")->queryRow();

			$this->insert('measurement_spo2',array(
				'patient_measurement_id' => $pm['id'],
				'spo2' => $sao2['sao2'],
				'last_modified_user_id' => $sao2['last_modified_user_id'],
				'created_user_id' => $sao2['created_user_id'],
				'last_modified_date' => $sao2['last_modified_date'],
				'created_date' => $sao2['created_date'],
			));

			$spo2_id = $this->dbConnection->createCommand()->select("max(id)")->from("measurement_spo2")->queryScalar();

			$this->update('et_ophcianassessment_examination',array('spo2_m_id' => $spo2_id),"id = {$row['id']}");

			$this->update('patient_measurement',array('measurement_type_id' => $spo2_type_id),"id = {$pm['id']}");

			$this->delete("measurement_sao2","id = {$sao2['id']}");
		}

		$this->addForeignKey('et_ophcianassessment_examination_spo2_fk','et_ophcianassessment_examination','spo2_m_id','measurement_spo2','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcianassessment_examination_spo2_fk','et_ophcianassessment_examination');

		$this->renameColumn('et_ophcianassessment_examination','spo2_m_id','sao2_m_id');
		$this->renameColumn('et_ophcianassessment_examination_version','spo2_m_id','sao2_m_id');

		$sao2_type_id = $this->dbConnection->createCommand()->select("id")->from("measurement_type")->where("class_name = 'MeasurementSAO2'")->queryScalar();

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophcianassessment_examination")->where("sao2_m_id is not null")->queryAll() as $row) {
			$spo2 = $this->dbConnection->createCommand()->select("*")->from("measurement_spo2")->where("id = {$row['sao2_m_id']}")->queryRow();
			$pm = $this->dbConnection->createCommand()->select("*")->from("patient_measurement")->where("id = {$spo2['patient_measurement_id']}")->queryRow();
			$ref = $this->dbConnection->createCommand()->select("*")->from("measurement_reference")->where("patient_measurement_id = {$pm['id']} and event_id = {$row['event_id']}")->queryRow();

			$this->insert('measurement_sao2',array(
				'patient_measurement_id' => $pm['id'],
				'sao2' => $spo2['spo2'],
				'last_modified_user_id' => $spo2['last_modified_user_id'],
				'created_user_id' => $spo2['created_user_id'],
				'last_modified_date' => $spo2['last_modified_date'],
				'created_date' => $spo2['created_date'],
			));

			$sao2_id = $this->dbConnection->createCommand()->select("max(id)")->from("measurement_sao2")->queryScalar();

			$this->update('et_ophcianassessment_examination',array('sao2_m_id' => $sao2_id),"id = {$row['id']}");

			$this->update('patient_measurement',array('measurement_type_id' => $sao2_type_id),"id = {$pm['id']}");

			$this->delete("measurement_spo2","id = {$spo2['id']}");
		}

		$this->addForeignKey('et_ophcianassessment_examination_sao2_fk','et_ophcianassessment_examination','sao2_m_id','measurement_sao2','id');
	}
}
