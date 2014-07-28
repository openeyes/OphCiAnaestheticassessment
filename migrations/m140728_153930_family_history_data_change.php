<?php

class m140728_153930_family_history_data_change extends OEMigration
{
	public function up()
	{
		$this->delete('ophcianassessment_medical_history_familyan_assignment');
		$this->delete('ophcianassessment_medical_history_familyan');

		$this->initialiseData(dirname(__FILE__));
	}

	public function down()
	{
		$this->insert('ophcianassessment_medical_history_familyan',array('id' => 1, 'name' => 'Allergic reaction', 'display_order' => 1));
		$this->insert('ophcianassessment_medical_history_familyan',array('id' => 2, 'name' => 'Hyperthermia', 'display_order' => 4));
		$this->insert('ophcianassessment_medical_history_familyan',array('id' => 3, 'name' => 'Persistent PONV', 'display_order' => 6));
		$this->insert('ophcianassessment_medical_history_familyan',array('id' => 4, 'name' => 'Unstable BP', 'display_order' => 9));
		$this->insert('ophcianassessment_medical_history_familyan',array('id' => 5, 'name' => 'Fainted', 'display_order' => 2));
		$this->insert('ophcianassessment_medical_history_familyan',array('id' => 6, 'name' => 'Hypotension', 'display_order' => 5));
		$this->insert('ophcianassessment_medical_history_familyan',array('id' => 7, 'name' => 'Prolonged sedation', 'display_order' => 7));
		$this->insert('ophcianassessment_medical_history_familyan',array('id' => 8, 'name' => 'Hyperexcitability', 'display_order' => 3));
		$this->insert('ophcianassessment_medical_history_familyan',array('id' => 9, 'name' => 'Tachycardia', 'display_order' => 8));
		$this->insert('ophcianassessment_medical_history_familyan',array('id' => 10, 'name' => 'Other (please specify)', 'display_order' => 10));
	}
}
