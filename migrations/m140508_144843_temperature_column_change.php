<?php

class m140508_144843_temperature_column_change extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophcianassessment_examination','temperature','DECIMAL(3,1) NULL DEFAULT NULL');
	}

	public function down()
	{
		$this->alterColumn('et_ophcianassessment_examination','temperature','int (10) NULL DEFAULT NULL');
	}

}