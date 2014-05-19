<?php

class m140516_134638_rationalise_table_names extends CDbMigration
{
	public $stuff = array(
		'ophcianassessment_anesthesiaplan_not_app' => array(
			'name' => 'ophcianassessment_anesthesiaplan_na',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
			),
		),
		'et_ophcianassessment_anesthesiaplan_not_app_assignment' => array(
			'name' => 'ophcianassessment_anesthesiaplan_na_assignment',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophcianassessment_anesthesiaplan'),
				'{table}_lku_fk' => array('ophcianassessment_anesthesiaplan_not_app_id','ophcianassessment_anesthesiaplan_na'),
			),
			'fields' => array(
				'ophcianassessment_anesthesiaplan_not_app_id' => 'na_id',
			),
		),
		'et_ophcianassessment_examination_teeth_assignment' => array(
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophcianassessment_examination'),
				'{table}_lku_fk' => array('ophcianassessment_examination_teeth_id','ophcianassessment_examination_teeth'),
			),
			'fields' => array(
				'ophcianassessment_examination_teeth_id' => 'teeth_id',
			),
		),
		'ophcianassessment_specificeducation_speced_id' => array(
			'name' => 'ophcianassessment_speced_instructions',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
			),
		),
		'et_ophcianassessment_specificeducation_speced_id_assignment' => array(
			'name' => 'ophcianassessment_speced_instructions_assignment',
			'keys' => array(
				'ossia_lmui_fk' => array('last_modified_user_id','user'),
				'ossia_cui_fk' => array('created_user_id','user'),
				'ossia_ele_fk' => array('element_id','et_ophcianassessment_specificeducation'),
				'ossia_lku_fk' => array('ophcianassessment_specificeducation_speced_id_id','ophcianassessment_speced_instructions'),
			),
			'fields' => array(
				'ophcianassessment_specificeducation_speced_id_id' => 'instruction_id',
			),
		),
		'ophcianassessment_specificeducation_diabetes' => array(
			'name' => 'ophcianassessment_speced_diabetes',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
			),
		),
		'ophcianassessment_specificeducation_diabetes_assignment' => array(
			'name' => 'ophcianassessment_speced_diabetes_assignment',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophcianassessment_specificeducation'),
				'{table}_idi_fk' => array('item_id','ophcianassessment_speced_diabetes'),
			),
		),
		'ophcianassessment_dvt_heparin_contraindication' => array(
			'name' => 'ophcianassessment_dvt_heparin_contra',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
			),
		),
		'ophcianassessment_dvt_heparin_contraindication_assignment' => array(
			'name' => 'ophcianassessment_dvt_heparin_contra_assignment',
			'keys' => array(),
		),
		'ophcianassessment_dvt_stocking_contraindication' => array(
			'name' => 'ophcianassessment_dvt_stocking_contra',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
			),
		),
		'ophcianassessment_dvt_stocking_contraindication_assignment' => array(
			'name' => 'ophcianassessment_dvt_stocking_contra_assignment',
			'keys' => array(),
		),
		'ophcianaestheticassessment_patient_identifier' => array(
			'name' => 'ophcianassessment_patient_identifier',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
			),
		),
		'ophcianaestheticassessment_patient_identifier_assignment' => array(
			'name' => 'ophcianassessment_patient_identifier_assignment',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophcianassessment_patient'),
				'{table}_idi_fk' => array('identifier_id','ophcianassessment_patient_identifier'),
			),
		),
	);

	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from('event_type')->where("class_name = 'OphCiAnaestheticassessment'")->queryRow();
		$this->update('element_type',array('required' => 1),"event_type_id = {$event_type['id']}");

		foreach ($this->stuff as $table => $params) {
			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$table,$key);
				} else {
					$key_name = 'et_'.$key;
				}

				$this->dropForeignKey($key_name,$table);
				$this->dropIndex($key_name,$table);
			}

			if (@$params['name']) {
				$target = @$params['name'];
			} else {
				$target = preg_replace('/^et_/','',$table);
			}

			$this->renameTable($table,$target);

			if (!empty($params['fields'])) {
				foreach ($params['fields'] as $from => $to) {
					$this->renameColumn($target,$from,$to);
				}
			}

			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$target,$key);
				} else {
					$key_name = $key;
				}
				if (isset($params['fields'][$key_params[0]])) {
					$field = $params['fields'][$key_params[0]];
				} else {
					$field = $key_params[0];
				}
				$this->createIndex($key_name,$target,$field);
				$this->addForeignKey($key_name,$target,$field,$key_params[1],'id');
			}
		}
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from('event_type')->where("class_name = 'OphCiAnaestheticassessment'")->queryRow();
		$this->update('element_type',array('required' => null),"event_type_id = {$event_type['id']}");

		foreach (array_reverse($this->stuff) as $table => $params) {
			$target = $table;

			if (@$params['name']) {
				$table = $params['name'];
			} else {
				$table = preg_replace('/^et_/','',$table);
			}

			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$table,$key);
				} else {
					$key_name = $key;
				}
				$this->dropForeignKey($key_name,$table);
				$this->dropIndex($key_name,$table);
			}

			$this->renameTable($table,$target);

			if (!empty($params['fields'])) {
				foreach ($params['fields'] as $to => $from) {
					$this->renameColumn($target,$from,$to);
				}
			}

			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$target,$key);
				} else {
					$key_name = 'et_'.$key;
				}

				$this->createIndex($key_name,$target,$key_params[0]);
				$this->addForeignKey($key_name,$target,$key_params[0],$key_params[1],'id');
			} 
		}
	}
}
