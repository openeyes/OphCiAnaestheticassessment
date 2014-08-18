<?php

class m140815_143435_rename_event extends CDbMigration
{
	public function up()
	{
		$this->update('event_type',array('name' => 'Anaesthetic satisfaction audit'),"class_name = 'OphOuAnaestheticsatisfactionaudit'");
		$this->update('event_type',array('name' => 'Patient discharge instructions'),"class_name = 'OphCiPatientdischarge'");
		$this->update('event_type',array('name' => 'Therapy application'),"class_name = 'OphCoTherapyapplication'");
	}

	public function down()
	{
		$this->update('event_type',array('name' => 'Anaesthetic Satisfaction Audit'),"class_name = 'OphOuAnaestheticsatisfactionaudit'");
		$this->update('event_type',array('name' => 'Patient Discharge Instructions'),"class_name = 'OphCiPatientdischarge'");
		$this->update('event_type',array('name' => 'Therapy Application'),"class_name = 'OphCoTherapyapplication'");
	}
}
