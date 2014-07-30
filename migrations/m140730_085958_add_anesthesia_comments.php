<?php

class m140730_085958_add_anesthesia_comments extends OEMigration
{
	public function up()
	{
		$this->addColumn('et_ophcianassessment_medical_history_review', 'patient_anesthesia_comments', 'text COLLATE utf8_bin DEFAULT \'\'');
		$this->addColumn('et_ophcianassessment_medical_history_review', 'family_anesthesia_comments', 'text COLLATE utf8_bin DEFAULT \'\'');

		$this->addColumn('et_ophcianassessment_medical_history_review_version', 'patient_anesthesia_comments', 'text COLLATE utf8_bin DEFAULT \'\'');
		$this->addColumn('et_ophcianassessment_medical_history_review_version', 'family_anesthesia_comments', 'text COLLATE utf8_bin DEFAULT \'\'');

		$this->refreshTableSchema('et_ophcianassessment_medical_history_review');
		$this->refreshTableSchema('et_ophcianassessment_medical_history_review_version');
	}

	public function down()
	{
		$this->dropColumn('et_ophcianassessment_medical_history_review', 'patient_anesthesia_comments');
		$this->dropColumn('et_ophcianassessment_medical_history_review', 'family_anesthesia_comments');

		$this->dropColumn('et_ophcianassessment_medical_history_review_version', 'patient_anesthesia_comments');
		$this->dropColumn('et_ophcianassessment_medical_history_review_version', 'family_anesthesia_comments');

		$this->refreshTableSchema('et_ophcianassessment_medical_history_review');
		$this->refreshTableSchema('et_ophcianassessment_medical_history_review_version');
	}
}