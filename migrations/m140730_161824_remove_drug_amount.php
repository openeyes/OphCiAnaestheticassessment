<?php

class m140730_161824_remove_drug_amount extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophcianassessment_medical_history_review','drug_amount');
		$this->dropColumn('et_ophcianassessment_medical_history_review_version','drug_amount');
		$this->refreshTableSchema('et_ophcianassessment_medical_history_review');
	}

	public function down()
	{
		$this->addColumn('et_ophcianassessment_medical_history_review','drug_amount','varchar(255) null');
		$this->addColumn('et_ophcianassessment_medical_history_review_version','drug_amount','varchar(255) null');
		$this->refreshTableSchema('et_ophcianassessment_medical_history_review');
	}
}