<?php

class m140507_183118_nullable_foreign_keys extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophcianassessment_anesthesiaplan','surgery_approval_id','int(10) unsigned null');
		$this->alterColumn('et_ophcianassessment_anesthesiaplan','asa_level_id','int(10) unsigned null');
		$this->alterColumn('et_ophcianassessment_anesthesiaplan','anesthesia_plan_id','int(10) unsigned null');
		$this->alterColumn('et_ophcianassessment_patient','translator_present_id','int(10) unsigned null');
		$this->alterColumn('et_ophcianassessment_examination','weight_calculation_id','int(10) unsigned null');
		$this->alterColumn('et_ophcianassessment_examination','height_calculation_id','int(10) unsigned null');
		$this->alterColumn('et_ophcianassessment_examination','airway_class_id','int(10) unsigned null');
		$this->alterColumn('et_ophcianassessment_procedures','eye_id','int(10) unsigned null');
	}

	public function down()
	{
		$this->alterColumn('et_ophcianassessment_anesthesiaplan','surgery_approval_id','int(10) unsigned not null');
		$this->alterColumn('et_ophcianassessment_anesthesiaplan','asa_level_id','int(10) unsigned not null');
		$this->alterColumn('et_ophcianassessment_anesthesiaplan','anesthesia_plan_id','int(10) unsigned not null');
		$this->alterColumn('et_ophcianassessment_patient','translator_present_id','int(10) unsigned not null');
		$this->alterColumn('et_ophcianassessment_examination','weight_calculation_id','int(10) unsigned not null');
		$this->alterColumn('et_ophcianassessment_examination','height_calculation_id','int(10) unsigned not null');
		$this->alterColumn('et_ophcianassessment_examination','airway_class_id','int(10) unsigned not null');
		$this->alterColumn('et_ophcianassessment_procedures','eye_id','int(10) unsigned not null');
	}
}
