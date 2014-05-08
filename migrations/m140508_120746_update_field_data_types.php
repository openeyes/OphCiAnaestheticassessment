<?php

class m140508_120746_update_field_data_types extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophcianassessment_examination','bp_systolic','int (10) NULL DEFAULT NULL');
		$this->alterColumn('et_ophcianassessment_examination','bp_systolic','int (10) NULL DEFAULT NULL');
		$this->alterColumn('et_ophcianassessment_examination','heart_rate_pulse','int (10) NULL DEFAULT NULL');
		$this->alterColumn('et_ophcianassessment_examination','temperature','int (10) NULL DEFAULT NULL');
		$this->alterColumn('et_ophcianassessment_examination','respiratory_rate','int (10) NULL DEFAULT NULL');
		$this->alterColumn('et_ophcianassessment_examination','sao2','int (10) NULL DEFAULT NULL');
		$this->alterColumn('et_ophcianassessment_examination','blood_glucose','DECIMAL(3,2) NULL DEFAULT NULL');
	}

	public function down()
	{
		$this->alterColumn('et_ophcianassessment_examination','bp_systolic',"VARCHAR(5) NULL DEFAULT NULL COLLATE 'utf8_bin'");
		$this->alterColumn('et_ophcianassessment_examination','bp_systolic',"VARCHAR(5) NULL DEFAULT NULL COLLATE 'utf8_bin'");
		$this->alterColumn('et_ophcianassessment_examination','heart_rate_pulse',"VARCHAR(5) NULL DEFAULT NULL COLLATE 'utf8_bin'");
		$this->alterColumn('et_ophcianassessment_examination','temperature',"VARCHAR(5) NULL DEFAULT NULL COLLATE 'utf8_bin'");
		$this->alterColumn('et_ophcianassessment_examination','respiratory_rate',"VARCHAR(5) NULL DEFAULT NULL COLLATE 'utf8_bin'");
		$this->alterColumn('et_ophcianassessment_examination','sao2',"VARCHAR(5) NULL DEFAULT NULL COLLATE 'utf8_bin'");
		$this->alterColumn('et_ophcianassessment_examination','blood_glucose',"VARCHAR(5) NULL DEFAULT NULL COLLATE 'utf8_bin'");
	}


}