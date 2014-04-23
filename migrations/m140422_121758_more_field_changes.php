<?php

class m140422_121758_more_field_changes extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('et_ophcianassessment_examination','weight','weight_lb');
		$this->renameColumn('et_ophcianassessment_examination','height','height_ft');
		$this->addColumn('et_ophcianassessment_examination','height_in','varchar(1)');

		$this->alterColumn('et_ophcianassessment_examination','weight_lb','decimal(4,1)');
		$this->alterColumn('et_ophcianassessment_examination','weight_kg','decimal(4,1)');
		$this->alterColumn('et_ophcianassessment_examination','height_ft','varchar(1)');
		$this->alterColumn('et_ophcianassessment_examination','bmi','decimal(3,2)');

		$this->renameColumn('et_ophcianassessment_examination','blood_pressure','bp_systolic');
		$this->alterColumn('et_ophcianassessment_examination','bp_systolic','varchar(3)');
		$this->addColumn('et_ophcianassessment_examination','bp_diastolic','varchar(2)');

		$this->alterColumn('et_ophcianassessment_examination','heart_rate_pulse','varchar(3)');
		$this->alterColumn('et_ophcianassessment_examination','temperature','varchar(3)');
		$this->alterColumn('et_ophcianassessment_examination','respiratory_rate','varchar(3)');
		$this->alterColumn('et_ophcianassessment_examination','sao2','varchar(3)');
		$this->alterColumn('et_ophcianassessment_examination','blood_glucose','varchar(5)');

		$this->alterColumn('et_ophcianassessment_examination','height_cm','decimal(4,1)');
	}

	public function down()
	{
		$this->alterColumn('et_ophcianassessment_examination','height_cm','varchar(255)');

		$this->alterColumn('et_ophcianassessment_examination','heart_rate_pulse','varchar(255)');
		$this->alterColumn('et_ophcianassessment_examination','temperature','varchar(255)');
		$this->alterColumn('et_ophcianassessment_examination','respiratory_rate','varchar(255)');
		$this->alterColumn('et_ophcianassessment_examination','sao2','varchar(255)');
		$this->alterColumn('et_ophcianassessment_examination','blood_glucose','varchar(255)');

		$this->dropColumn('et_ophcianassessment_examination','bp_diastolic');
		$this->alterColumn('et_ophcianassessment_examination','bp_systolic','varchar(255)');
		$this->renameColumn('et_ophcianassessment_examination','bp_systolic','blood_pressure');

		$this->alterColumn('et_ophcianassessment_examination','weight_lb','varchar(255)');
		$this->alterColumn('et_ophcianassessment_examination','weight_kg','varchar(255)');
		$this->alterColumn('et_ophcianassessment_examination','height_ft','varchar(255)');
		$this->alterColumn('et_ophcianassessment_examination','bmi','varchar(255)');

		$this->dropColumn('et_ophcianassessment_examination','height_in');
		$this->renameColumn('et_ophcianassessment_examination','height_ft','height');
		$this->renameColumn('et_ophcianassessment_examination','weight_lb','weight');
	}
}
