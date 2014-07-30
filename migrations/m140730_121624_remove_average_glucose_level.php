<?php

class m140730_121624_remove_average_glucose_level extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophcianassessment_medical_history_review','diabetes_average_glucose');
		$this->dropColumn('et_ophcianassessment_medical_history_review_version','diabetes_average_glucose');
		$this->refreshTableSchema('et_ophcianassessment_medical_history_review');
	}

	public function down()
	{
		$this->addColumn('et_ophcianassessment_medical_history_review','diabetes_average_glucose','varchar(64) null');
		$this->addColumn('et_ophcianassessment_medical_history_review_version','diabetes_average_glucose','varchar(64) null');
		$this->refreshTableSchema('et_ophcianassessment_medical_history_review');
	}
}