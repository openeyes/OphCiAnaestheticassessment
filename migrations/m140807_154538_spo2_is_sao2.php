<?php

class m140807_154538_spo2_is_sao2 extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('et_ophcianassessment_examination_spo2_fk','et_ophcianassessment_examination');

		$this->renameColumn('et_ophcianassessment_examination','spo2_m_id','sao2_m_id');
		$this->renameColumn('et_ophcianassessment_examination_version','spo2_m_id','sao2_m_id');

		$this->addForeignKey('et_ophcianassessment_examination_sao2_fk','et_ophcianassessment_examination','sao2_m_id','measurement_sao2','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcianassessment_examination_sao2_fk','et_ophcianassessment_examination');

		$this->renameColumn('et_ophcianassessment_examination','sao2_m_id','spo2_m_id');
		$this->renameColumn('et_ophcianassessment_examination_version','sao2_m_id','spo2_m_id');

		$this->addForeignKey('et_ophcianassessment_examination_spo2_fk','et_ophcianassessment_examination','spo2_m_id','measurement_sao2','id');
	}
}
