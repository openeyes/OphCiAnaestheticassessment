<?php

class m140507_182115_module_name extends CDbMigration
{
	public function up()
	{
		$this->update('event_type',array('name' => 'Anesthesia pre-operative assessment'),"class_name = 'OphCiAnaestheticassessment'");
	}

	public function down()
	{
		$this->update('event_type',array('name' => 'Anaesthetic assessment'),"class_name = 'OphCiAnaestheticassessment'");
	}
}
