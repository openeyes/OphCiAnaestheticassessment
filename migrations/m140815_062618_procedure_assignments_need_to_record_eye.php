<?php

class m140815_062618_procedure_assignments_need_to_record_eye extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ophcianassessment_speced_instructions_procedure','eye_id','int(10) unsigned not null');
		$this->addColumn('ophcianassessment_speced_instructions_procedure_version','eye_id','int(10) unsigned not null');

		$this->addForeignKey('ophcianassessment_speced_instructions_procedure_ei_fk','ophcianassessment_speced_instructions_procedure','eye_id','eye','id');
	}

	public function down()
	{
		$this->dropForeignKey('ophcianassessment_speced_instructions_procedure_ei_fk','ophcianassessment_speced_instructions_procedure');

		$this->dropColumn('ophcianassessment_speced_instructions_procedure','eye_id');
		$this->dropColumn('ophcianassessment_speced_instructions_procedure_version','eye_id');
	}
}
