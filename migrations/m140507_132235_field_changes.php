<?php

class m140507_132235_field_changes extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcianassessment_dvtassessment','prophylaxis_ordered','tinyint(1) unsigned not null');
		$this->dropColumn('et_ophcianassessment_dvtassessment','comments');
	}

	public function down()
	{
		$this->dropColumn('et_ophcianassessment_dvtassessment','prophylaxis_ordered');
		$this->addColumn('et_ophcianassessment_dvtassessment','comments','text');
	}
}
