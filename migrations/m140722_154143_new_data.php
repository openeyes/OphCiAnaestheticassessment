<?php

class m140722_154143_new_data extends CDbMigration
{
	public function up()
	{
		$this->insert('ophcianassessment_examination_teeth',array('id'=>3,'name'=>'Full dentures','display_order'=>3));
		$this->insert('ophcianassessment_examination_teeth',array('id'=>4,'name'=>'Full uppers','display_order'=>4));
		$this->insert('ophcianassessment_examination_teeth',array('id'=>5,'name'=>'Full lowers','display_order'=>5));
	}

	public function down()
	{
		$this->dbConnection->createCommand("delete from ophcianassessment_examination_teeth where name in ('Full dentures','Full uppers','Full lowers')")->query();
	}
}
