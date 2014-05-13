<?php

class m140513_062903_missing_field extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ophcianassessment_dvt_risk_factor_section','display_order','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophcianassessment_dvt_risk_factor_section','display_order');
	}
}
