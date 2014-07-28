<?php

class m140728_150215_blood_glucose_na_field extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcianassessment_examination','blood_glucose_na','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcianassessment_examination_version','blood_glucose_na','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophcianassessment_examination','blood_glucose_na');
		$this->dropColumn('et_ophcianassessment_examination_version','blood_glucose_na');
	}
}
