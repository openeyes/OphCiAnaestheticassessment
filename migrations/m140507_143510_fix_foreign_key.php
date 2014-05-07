<?php

class m140507_143510_fix_foreign_key extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophcianassessment_anesthesiaplan','acceptance_id','int(10) unsigned null');
		$this->alterColumn('et_ophcianassessment_anesthesiaplan','anesthesia_plan_comment','text not null');
	}

	public function down()
	{
		$this->alterColumn('et_ophcianassessment_anesthesiaplan','acceptance_id','int(10) unsigned not null');
		$this->alterColumn('et_ophcianassessment_anesthesiaplan','anesthesia_plan_comment','varchar(255) not null');
	}
}
