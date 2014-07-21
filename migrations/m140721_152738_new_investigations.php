<?php

class m140721_152738_new_investigations extends OEMigration
{
	public function up()
	{
		$this->insert('ophcianassessment_investigations_investigation_type',array('name'=>'ECG'));
		$this->insert('ophcianassessment_investigations_investigation_type',array('name'=>'Chest X-Ray'));
		$this->insert('ophcianassessment_investigations_investigation_type',array('name'=>'Full Blood Count'));
	}

	public function down()
	{
		$this->delete('ophcianassessment_investigations_investigation_type', 'name = ?', array('ECG'));
		$this->delete('ophcianassessment_investigations_investigation_type', 'name = ?', array('Chest X-Ray'));
		$this->delete('ophcianassessment_investigations_investigation_type', 'name = ?', array('Full Blood Count'));
	}
}