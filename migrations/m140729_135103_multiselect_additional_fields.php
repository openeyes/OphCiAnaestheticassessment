<?php

class m140729_135103_multiselect_additional_fields extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ophcianassessment_medical_history_surgery_assignment','comments','varchar(1024) not null');
		$this->addColumn('ophcianassessment_medical_history_surgery_assignment','year','tinyint(1) unsigned null');

		$this->addColumn('ophcianassessment_medical_history_surgery_assignment_version','comments','varchar(1024) not null');
		$this->addColumn('ophcianassessment_medical_history_surgery_assignment_version','year','tinyint(1) unsigned null');

		$other = $this->dbConnection->createCommand()->select("id")->from("ophcianassessment_medical_history_surgery")->where("name = 'Other (please specify)'")->queryScalar();

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophcianassessment_medical_history_review")->where("surgery_other != ''")->queryAll() as $row) {
			$this->update('ophcianassessment_medical_history_surgery_assignment',array('comments' => $row['surgery_other']),"element_id = :ei and item_id = :o",array(":ei" => $row['id'],":o" => $other));
		}

		$this->dropColumn('et_ophcianassessment_medical_history_review','surgery_other');
		$this->dropColumn('et_ophcianassessment_medical_history_review_version','surgery_other');
	}

	public function down()
	{
		$this->addColumn('et_ophcianassessment_medical_history_review','surgery_other','text not null');
		$this->addColumn('et_ophcianassessment_medical_history_review_version','surgery_other','text not null');

		$other = $this->dbConnection->createCommand()->select("id")->from("ophcianassessment_medical_history_surgery")->where("name = 'Other (please specify)'")->queryScalar();

		foreach ($this->dbConnection->createCommand()->select("*")->from("ophcianassessment_medical_history_surgery_assignment")->where("item_id = :ii",array(":ii" => $other))->queryAll() as $row) {
			$this->update('et_ophcianassessment_medical_history_review',array('surgery_other' => $row['comments']),"id = :e",array(":e" => $row['element_id']));
		}

		$this->dropColumn('ophcianassessment_medical_history_surgery_assignment_version','comments');
		$this->dropColumn('ophcianassessment_medical_history_surgery_assignment_version','year');

		$this->dropColumn('ophcianassessment_medical_history_surgery_assignment','comments');
		$this->dropColumn('ophcianassessment_medical_history_surgery_assignment','year');
	}
}
