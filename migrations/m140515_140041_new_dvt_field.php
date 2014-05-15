<?php

class m140515_140041_new_dvt_field extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcianassessment_dvtassessment','exclusion_criteria_met','tinyint(1) unsigned null');
	}

	public function down()
	{
		$this->dropColumn('et_ophcianassessment_dvtassessment','exclusion_criteria_met');
	}
}
