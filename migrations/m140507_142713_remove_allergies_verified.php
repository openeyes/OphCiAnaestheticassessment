<?php

class m140507_142713_remove_allergies_verified extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophcianassessment_medical_history_review','allergies_verified');
	}

	public function down()
	{
		$this->addColumn('et_ophcianassessment_medical_history_review','allergies_verified','tinyint(1) unsigned not null');
	}
}
