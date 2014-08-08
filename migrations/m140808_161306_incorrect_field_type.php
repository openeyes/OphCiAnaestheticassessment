<?php

class m140808_161306_incorrect_field_type extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('ophcianassessment_medical_history_surgery_assignment','year','int(2)');
		$this->alterColumn('ophcianassessment_medical_history_surgery_assignment_version','year','int(2)');
	}

	public function down()
	{
		$this->alterColumn('ophcianassessment_medical_history_surgery_assignment','year','tinyint(2)');
		$this->alterColumn('ophcianassessment_medical_history_surgery_assignment_version','year','tinyint(2)');
	}
}
