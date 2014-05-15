<?php

class m140515_114738_checklist_defaults extends CDbMigration
{
	public function up()
	{
		foreach (array('previous_surgical_procedures','patient_anesthesia','family_anesthesia','pain','cardiovascular','respiratory','gastro_intestinal','diabetes','genitourinary_renal_endocrine','neuro_musculoskeletal','falls_mobility_risk','miscellaneous','psychiatric','pregnancy_status','exposure','dental','tobacco_use','alcohol_use','recreational_drug_use') as $field) {
			$this->alterColumn('et_ophcianassessment_medical_history_review',$field,'tinyint(1) unsigned null');
		}
	}

	public function down()
	{
		foreach (array('previous_surgical_procedures','patient_anesthesia','family_anesthesia','pain','cardiovascular','respiratory','gastro_intestinal','diabetes','genitourinary_renal_endocrine','neuro_musculoskeletal','falls_mobility_risk','miscellaneous','psychiatric','pregnancy_status','exposure','dental','tobacco_use','alcohol_use','recreational_drug_use') as $field) {
			$this->alterColumn('et_ophcianassessment_medical_history_review',$field,'tinyint(1) unsigned not null');
		}
	}
}
