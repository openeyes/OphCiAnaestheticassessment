<?php

class m140508_144039_bmi_column_change extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophcianassessment_examination','bmi','DECIMAL(5,2) NULL DEFAULT NULL');

	}

	public function down()
	{
		$this->alterColumn('et_ophcianassessment_examination','bmi','DECIMAL(3,2) NULL DEFAULT NULL');
	}


}