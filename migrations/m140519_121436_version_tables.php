<?php

class m140519_121436_version_tables extends OEMigration
{
	public $tables = array(
		'et_ophcianassessment_anesthesiaplan',
		'et_ophcianassessment_dvtassessment',
		'et_ophcianassessment_examination',
		'et_ophcianassessment_investigations',
		'et_ophcianassessment_medical_history_review',
		'et_ophcianassessment_patient',
		'et_ophcianassessment_procedures',
		'et_ophcianassessment_specificeducation',
		'ophcianassessment_anesthesiaplan_acceptance',
		'ophcianassessment_anesthesiaplan_anesthesia_plan',
		'ophcianassessment_anesthesiaplan_asa_level',
		'ophcianassessment_anesthesiaplan_na',
		'ophcianassessment_anesthesiaplan_na_assignment',
		'ophcianassessment_anesthesiaplan_surgery_approval',
		'ophcianassessment_dvt_exclusion_factor',
		'ophcianassessment_dvt_exclusion_factor_assignment',
		'ophcianassessment_dvt_heparin_contra',
		'ophcianassessment_dvt_heparin_contra_assignment',
		'ophcianassessment_dvt_risk_factor',
		'ophcianassessment_dvt_risk_factor_assignment',
		'ophcianassessment_dvt_risk_factor_section',
		'ophcianassessment_dvt_risk_prophylaxis',
		'ophcianassessment_dvt_stocking_contra',
		'ophcianassessment_dvt_stocking_contra_assignment',
		'ophcianassessment_examination_airway_class',
		'ophcianassessment_examination_height_calculation',
		'ophcianassessment_examination_teeth',
		'ophcianassessment_examination_teeth_assignment',
		'ophcianassessment_examination_weight_calculation',
		'ophcianassessment_investigations_investigation',
		'ophcianassessment_investigations_investigation_type',
		'ophcianassessment_medical_history_allergy',
		'ophcianassessment_medical_history_cardev',
		'ophcianassessment_medical_history_cardev_assignment',
		'ophcianassessment_medical_history_cardio',
		'ophcianassessment_medical_history_cardio_assignment',
		'ophcianassessment_medical_history_dbmonitor',
		'ophcianassessment_medical_history_dbmonitor_assignment',
		'ophcianassessment_medical_history_dbtreat',
		'ophcianassessment_medical_history_dbtreat_assignment',
		'ophcianassessment_medical_history_dental',
		'ophcianassessment_medical_history_dental_assignment',
		'ophcianassessment_medical_history_falls',
		'ophcianassessment_medical_history_falls_assignment',
		'ophcianassessment_medical_history_familyan',
		'ophcianassessment_medical_history_familyan_assignment',
		'ophcianassessment_medical_history_gi',
		'ophcianassessment_medical_history_gi_assignment',
		'ophcianassessment_medical_history_gre',
		'ophcianassessment_medical_history_gre_assignment',
		'ophcianassessment_medical_history_medication',
		'ophcianassessment_medical_history_misc',
		'ophcianassessment_medical_history_misc_assignment',
		'ophcianassessment_medical_history_neuro',
		'ophcianassessment_medical_history_neuro_assignment',
		'ophcianassessment_medical_history_patientan',
		'ophcianassessment_medical_history_patientan_assignment',
		'ophcianassessment_medical_history_preg',
		'ophcianassessment_medical_history_preg_assignment',
		'ophcianassessment_medical_history_prosthetic',
		'ophcianassessment_medical_history_prosthetic_assignment',
		'ophcianassessment_medical_history_psych',
		'ophcianassessment_medical_history_psych_assignment',
		'ophcianassessment_medical_history_pulmonary',
		'ophcianassessment_medical_history_pulmonary_assignment',
		'ophcianassessment_medical_history_smoke',
		'ophcianassessment_medical_history_smoke_assignment',
		'ophcianassessment_medical_history_surgery',
		'ophcianassessment_medical_history_surgery_assignment',
		'ophcianassessment_patient_translator_present',
		'ophcianassessment_procedures_procedure_assignment',
		'ophcianassessment_speced_diabetes',
		'ophcianassessment_speced_diabetes_assignment',
		'ophcianassessment_speced_instructions',
		'ophcianassessment_speced_instructions_assignment',
		'ophcianassessment_patient_identifier',
		'ophcianassessment_patient_identifier_assignment',
	);

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->versionExistingTable($table);
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->dropTable($table.'_version');
		}
	}
}
