<?php

class m140516_090042_dropdowns_alphabetical extends CDbMigration
{
	public function up()
	{
		foreach (array(
				'ophcianassessment_medical_history_patientan',
				'ophcianassessment_medical_history_familyan',
				'ophcianassessment_medical_history_cardio',
				'ophcianassessment_medical_history_pulmonary',
				'ophcianassessment_medical_history_gi',
				'ophcianassessment_medical_history_gre',
				'ophcianassessment_medical_history_neuro',
				'ophcianassessment_medical_history_falls',
				'ophcianassessment_medical_history_misc',
				'ophcianassessment_medical_history_psych',
				'ophcianassessment_medical_history_preg',
			) as $table) {

			$items = array();
			$other = false;

			foreach ($this->dbConnection->createCommand()->select("*")->from($table)->queryAll() as $item) {
				if (preg_match('/\(please specify\)/',$item['name'])) {
					$other = $item['name'];
				} else {
					$items[] = $item['name'];
				}
			}

			sort($items);

			foreach ($items as $i => $item) {
				$this->dbConnection->createCommand("update {$table} set display_order = ".($i+1)." where name = '$item'")->query();
			}

			if ($other) {
				$this->dbConnection->createCommand("update {$table} set display_order = ".($i+2)." where name = '$other'")->query();
			}
		}
	}

	public function down()
	{
	}
}
