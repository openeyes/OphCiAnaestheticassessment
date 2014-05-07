<?php

class m140507_121915_site_changes extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophcianassessment_procedures_site_id_fk','et_ophcianassessment_procedures');
		$this->dropIndex('et_ophcianassessment_procedures_site_id_fk','et_ophcianassessment_procedures');
		$this->renameColumn('et_ophcianassessment_procedures','site_id','eye_id');
		$this->createIndex('et_ophcianassessment_procedures_eye_id_fk','et_ophcianassessment_procedures','eye_id');
		$this->addForeignKey('et_ophcianassessment_procedures_eye_id_fk','et_ophcianassessment_procedures','eye_id','eye','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcianassessment_procedures_eye_id_fk','et_ophcianassessment_procedures');
		$this->dropIndex('et_ophcianassessment_procedures_eye_id_fk','et_ophcianassessment_procedures');
		$this->renameColumn('et_ophcianassessment_procedures','eye_id','site_id');
		$this->createIndex('et_ophcianassessment_procedures_site_id_fk','et_ophcianassessment_procedures','site_id');
		$this->addForeignKey('et_ophcianassessment_procedures_site_id_fk','et_ophcianassessment_procedures','site_id','site','id');
	}
}
