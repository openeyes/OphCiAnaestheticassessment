<?php

class m140723_081400_change_element_name extends CDbMigration
{
	public function up()
	{
		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphCiAnaestheticassessment"))->queryRow();

		$this->update('element_type',array('name' => 'Patient identification'),"event_type_id = {$et['id']} and class_name = 'Element_OphCiAnaestheticassessment_Patient'");
	}

	public function down()
	{
		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphCiAnaestheticassessment"))->queryRow();

		$this->update('element_type',array('name' => 'Patient'),"event_type_id = {$et['id']} and class_name = 'Element_OphCiAnaestheticassessment_Patient'");
	}
}
