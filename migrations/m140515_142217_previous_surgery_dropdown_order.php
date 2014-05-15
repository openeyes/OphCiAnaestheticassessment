<?php

class m140515_142217_previous_surgery_dropdown_order extends OEMigration
{
	public function up()
	{
		$this->delete('ophcianassessment_medical_history_surgery');

		$this->initialiseData(dirname(__FILE__));
	}

	public function down()
	{
	}
}
