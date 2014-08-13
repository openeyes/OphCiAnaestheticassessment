<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophcianassessment_medical_history_review".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $medication_verified
 * @property integer $previous_surgical_procedures
 * @property integer $patient_anesthesia
 * @property integer $family_anesthesia
 * @property integer $pain
 * @property integer $cardiovascular
 * @property integer $respiratory
 * @property integer $gastro_intestinal
 * @property integer $diabetes
 * @property integer $genitourinary_renal_endocrine
 * @property integer $neuro_musculoskeletal
 * @property integer $falls_mobility_risk
 * @property integer $miscellaneous
 * @property integer $psychiatric
 * @property integer $pregnancy_status
 * @property integer $exposure
 * @property integer $dental
 * @property integer $tobacco_use
 * @property integer $alcohol_use
 * @property integer $recreational_drug_use
 * @property integer $patient_anesthesia_comments
 * @property integer $family_anesthesia_comments
 * @property integer $pain_location_id
 * @property integer $pain_type_id
 *
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphCiAnaestheticassessment_MedicalHistoryReview  extends	BaseEventTypeElement
{
	protected $auto_update_relations = true;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophcianassessment_medical_history_review';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, medication_verified, previous_surgical_procedures, patient_anesthesia, family_anesthesia, pain, cardiovascular, respiratory, gastro_intestinal, diabetes, genitourinary_renal_endocrine, neuro_musculoskeletal, falls_mobility_risk, miscellaneous, psychiatric, pregnancy_status, exposure, dental, tobacco_use, alcohol_use, recreational_drug_use, teeth_other, cardio_other, cardio_comments, pulmonary_other, pulmonary_comments, gi_other, gi_comments, diabetes_comments, gre_other, gre_comments, neuro_other, neuro_comments, misc_other, misc_comments, falls_comments, psych_other, psych_comments, preg_test, recent_cough, surgery_other, surgery_comments, patientan_other, familyan_other, cardev_other, cardev_comments, noncardiac_implants, prosthetic_other, smoke_amount, smoke_duration, smoke_quit_date, alcohol_type, alcohol_amount, alcohol_quit_date, drug_name, drug_quit_date, dentals, cardio, diabetes_monitor, diabetes_treatment, falls, family_anesthesia_items, gi, gre, cardiac_devices, prosthetics, misc, neuro, patient_anesthesia_items, pregnancy, psychiatric_items, pulmonary, smoking, patient_anesthesia_comments, family_anesthesia_comments, pain_location_id, pain_type_id', 'safe'),
			array('id, event_id, medication_verified, previous_surgical_procedures, patient_anesthesia, family_anesthesia, pain, cardiovascular, respiratory, gastro_intestinal, diabetes, genitourinary_renal_endocrine, neuro_musculoskeletal, falls_mobility_risk, miscellaneous, psychiatric, pregnancy_status, exposure, dental, tobacco_use, alcohol_use, recreational_drug_use, patient_anesthesia_comments, family_anesthesia_comments, pain_location_id, pain_type_id', 'safe', 'on' => 'search'),
			array('previous_surgical_procedures,patient_anesthesia,family_anesthesia,pain, cardiovascular, respiratory, gastro_intestinal, diabetes, genitourinary_renal_endocrine, neuro_musculoskeletal, falls_mobility_risk, miscellaneous, psychiatric, pregnancy_status, exposure, dental, tobacco_use, alcohol_use, recreational_drug_use', 'required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'medications' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Medication', 'element_id'),
			'dentals' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Dental', 'dental_id', 'through' => 'dentals_assignments'),
			'dentals_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Dental_Assignment', 'element_id'),
			'cardio' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Cardio', 'item_id', 'through' => 'cardio_assignments'),
			'cardio_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Cardio_Assignment', 'element_id'),
			'diabetes_monitor' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Diabetes_Monitor', 'item_id', 'through' => 'diabetes_monitor_assignments'),
			'diabetes_monitor_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Diabetes_Monitor_Assignment', 'element_id'),
			'diabetes_treatment' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Diabetes_Treatment', 'item_id', 'through' => 'diabetes_treatment_assignments'),
			'diabetes_treatment_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Diabetes_Treatment_Assignment', 'element_id'),
			'falls' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Falls', 'item_id', 'through' => 'falls_assignments'),
			'falls_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Falls_Assignment', 'element_id'),
			'family_anesthesia_items' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Family_Anesthesia', 'item_id', 'through' => 'family_anesthesia_items_assignments'),
			'family_anesthesia_items_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Family_Anesthesia_Assignment', 'element_id'),
			'gi' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_GI', 'item_id', 'through' => 'gi_assignments'),
			'gi_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_GI_Assignment', 'element_id'),
			'gre' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_GRE', 'item_id', 'through' => 'gre_assignments'),
			'gre_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_GRE_Assignment', 'element_id'),
			'cardiac_devices' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Implant_Cardiac_Device', 'item_id', 'through' => 'cardiac_devices_assignments'),
			'cardiac_devices_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Implant_Cardiac_Device_Assignment', 'element_id'),
			'prosthetics' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Implant_Prosthetic', 'item_id', 'through' => 'prosthetics_assignments'),
			'prosthetics_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Implant_Prosthetic_Assignment', 'element_id'),
			'misc' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Misc', 'item_id', 'through' => 'misc_assignments'),
			'misc_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Misc_Assignment', 'element_id'),
			'neuro' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Neuro', 'item_id', 'through' => 'neuro_assignments'),
			'neuro_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Neuro_Assignment', 'element_id'),
			'patient_anesthesia_items' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Patient_Anesthesia', 'item_id', 'through' => 'patient_anesthesia_items_assignments'),
			'patient_anesthesia_items_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Patient_Anesthesia_Assignment', 'element_id'),
			'pregnancy' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Pregnancy', 'item_id', 'through' => 'pregnancy_assignments'),
			'pregnancy_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Pregnancy_Assignment', 'element_id'),
			'psychiatric_items' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Psychiatric', 'item_id', 'through' => 'psychiatric_items_assignments'),
			'psychiatric_items_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Psychiatric_Assignment', 'element_id'),
			'pulmonary' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Pulmonary', 'item_id', 'through' => 'pulmonary_assignments'),
			'pulmonary_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Pulmonary_Assignment', 'element_id'),
			'smoking' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Smoking', 'item_id', 'through' => 'smoking_assignments'),
			'smoking_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Smoking_Assignment', 'element_id'),
			'surgery_assignments' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Medical_History_Surgery_Assignment', 'element_id'),
			'pain_location' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_Medical_History_Pain_Location', 'pain_location_id'),
			'pain_type' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_Medical_History_Pain_Type', 'pain_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'medication_verified' => 'Patient not on any known medications',
			'previous_surgical_procedures' => 'Previous surgical procedures',
			'patient_anesthesia' => 'Previous patient anesthesia problems',
			'family_anesthesia' => 'Previous family anesthesia	problems',
			'patient_anesthesia_comments' => 'Patient anesthesia comments',
			'family_anesthesia_comments' => 'Family anesthesia comments',
			'pain' => 'Pain',
			'cardiovascular' => 'Cardiovascular',
			'respiratory' => 'Respiratory',
			'gastro_intestinal' => 'Gastro intestinal',
			'diabetes' => 'Diabetes',
			'genitourinary_renal_endocrine' => 'Genitourinary / renal / endocrine',
			'neuro_musculoskeletal' => 'Neuro / musculoskeletal',
			'falls_mobility_risk' => 'Falls mobility risk',
			'miscellaneous' => 'Miscellaneous',
			'psychiatric' => 'Psychiatric',
			'pregnancy_status' => 'Pregnancy status',
			'exposure' => 'Recent fever cough illness or exposure',
			'dental' => 'Implants and prosthetics',
			'tobacco_use' => 'Tobacco use',
			'alcohol_use' => 'Alcohol use',
			'recreational_drug_use' => 'Recreational drug use',
			'teeth_other' => 'Other removable dental work',
			'cardio_other' => 'Other cardiovascular history',
			'cardio_comments' => 'Cardiovascular comments',
			'pulmonary_other' => 'Other pulmonary history',
			'pulmonary_comments' => 'Pulmonary comments',
			'gi_other' => 'Other GI history',
			'gi_comments' => 'Gastro intestinal comments',
			'diabetes_comments' => 'Diabetes comments',
			'gre_other' => 'Other G/R/E history',
			'gre_comments' => 'Genitourinary / renal / endocrine comments',
			'neuro_other' => 'Other neuro/musculoskeletal history',
			'neuro_comments' => 'Neuro/musculoskeletal comments',
			'misc_other' => 'Other misc history',
			'misc_comments' => 'Miscellaneous comments',
			'falls_comments' => 'Falls / mobility comments',
			'psych_other' => 'Other psychiatric history',
			'psych_comments' => 'Psychiatric comments',
			'preg_test' => 'Pregnancy test',
			'recent_cough' => 'Details',
			'surgery_comments' => 'Previous surgery comments',
			'patientan_other' => 'Patient anesthesia other reaction',
			'familyan_other' => 'Family anesthesia other reaction',
			'cardev_other' => 'Other cardiac device',
			'cardev_comments' => 'Cardiac device comments',
			'noncardiac_implants' => 'Non-cardiac implants',
			'prosthetic_other' => 'Other prosthetics',
			'smoke_amount' => 'Amount',
			'smoke_duration' => 'Duration',
			'smoke_quit_date' => 'Quit date',
			'alcohol_type' => 'Type',
			'alcohol_amount' => 'Amount',
			'alcohol_quit_date' => 'Quit date',
			'drug_name' => 'Substance name',
			'drug_quit_date' => 'Most recent use',
			'cardio' => 'Cardio history',
			'diabetes_monitor' => 'Monitored with',
			'diabetes_treatment' => 'Treated with',
			'falls' => 'Falls / mobility risk history',
			'family_anesthesia_items' => 'Family anesthesia reaction',
			'gi' => 'Gastro intestinal history',
			'gre' => 'Genitourinary / renal / endocrine history',
			'cardiac_devices' => 'Implanted cardiac device',
			'prosthetics' => 'Prosthetics',
			'misc' => 'Miscellaneous history',
			'neuro' => 'Neuro / musculoskeletal history',
			'patient_anesthesia_items' => 'Patient anesthesia reaction',
			'pregnancy' => 'Pregnancy history',
			'psychiatric_items' => 'Psychiatric history',
			'pulmonary' => 'Pulmonary history',
			'smoking' => 'Type',
			'dentals' => 'Removable dental work',
			'pain_location_id' => 'Location of pain',
			'pain_type_id' => 'Type of pain'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('medication_verified', $this->medication_verified);
		$criteria->compare('previous_surgical_procedures', $this->previous_surgical_procedures);
		$criteria->compare('patient_anesthesia', $this->patient_anesthesia);
		$criteria->compare('family_anesthesia', $this->family_anesthesia);
		$criteria->compare('pain', $this->pain);
		$criteria->compare('cardiovascular', $this->cardiovascular);
		$criteria->compare('respiratory', $this->respiratory);
		$criteria->compare('gastro_intestinal', $this->gastro_intestinal);
		$criteria->compare('diabetes', $this->diabetes);
		$criteria->compare('genitourinary_renal_endocrine', $this->genitourinary_renal_endocrine);
		$criteria->compare('neuro_musculoskeletal', $this->neuro_musculoskeletal);
		$criteria->compare('falls_mobility_risk', $this->falls_mobility_risk);
		$criteria->compare('miscellaneous', $this->miscellaneous);
		$criteria->compare('psychiatric', $this->psychiatric);
		$criteria->compare('pregnancy_status', $this->pregnancy_status);
		$criteria->compare('exposure', $this->exposure);
		$criteria->compare('dental', $this->dental);
		$criteria->compare('tobacco_use', $this->tobacco_use);
		$criteria->compare('alcohol_use', $this->alcohol_use);
		$criteria->compare('recreational_drug_use', $this->recreational_drug_use);
		$criteria->compare('patient_anesthesia_comments', $this->patient_anesthesia_comments);
		$criteria->compare('family_anesthesia_comments', $this->family_anesthesia_comments);
		$criteria->compare('pain_location_id', $this->pain_location_id);
		$criteria->compare('pain_type_id', $this->pain_type_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function updateMedications($medication_ids=array(),$drug_ids=array(),$route_ids=array(),$option_ids=array(),$frequency_ids=array(),$start_dates=array())
	{
		$ids = array();

		foreach ($drug_ids as $i => $drug_id) {
			if (!$medication_ids[$i] || !$medication = OphCiAnaestheticassessment_Medical_History_Medication::model()->findByPk($medication_ids[$i])) {
				$medication = new OphCiAnaestheticassessment_Medical_History_Medication;
				$medication->element_id = $this->id;
			}

			$medication->drug_id = $drug_id;
			$medication->route_id = $route_ids[$i];
			$medication->option_id = $option_ids[$i];
			$medication->frequency_id = $frequency_ids[$i];
			$medication->start_date = $start_dates[$i];

			if (!$medication->save()) {
				throw new Exception("Unable to save medication: ".print_r($medication->getErrors(),true));
			}

			$ids[] = $medication->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $this->id;

		!empty($ids) && $criteria->addNotInCondition('id',$ids);

		OphCiAnaestheticassessment_Medical_History_Medication::model()->deleteAll($criteria);
	}

	public function afterSave()
	{
		if (Yii::app()->getController()->action->id == 'create') {
			$patient = $this->event->episode->patient;

			foreach ($this->medications as $medication) {
				if (!Medication::model()->find('patient_id=? and drug_id=? and route_id=? and option_id=? and frequency_id=? and start_date=?',array($patient->id,$medication->drug_id,$medication->route_id,$medication->option_id,$medication->frequency_id,$medication->start_date))) {
					$_medication = new Medication;
					$_medication->patient_id = $patient->id;

					foreach (array('drug_id','route_id','option_id','frequency_id','start_date') as $field) {
						$_medication->$field = $medication->$field;
					}

					if (!$_medication->save()) {
						throw new Exception("Unable to save medication: ".print_r($_medication->getErrors(),true));
					}
				}
			}
		}

		return parent::afterSave();
	}

	protected function beforeValidate()
	{
		if ($this->hasMultiSelectValue('dentals','Other (please specify)')) {
			if (!$this->teeth_other) {
				$this->addError('teeth_other',$this->getAttributeLabel('teeth_other').' cannot be blank.');
			}
		}

		foreach (array(
				'previous_surgical_procedures' => array(
					'surgery_assignments' => 'surgery_other',
					'surgery_comments',
				),
				'patient_anesthesia' => array(
					'patient_anesthesia_items' => 'patientan_other',
				),
				'family_anesthesia' => array(
					'family_anesthesia_items' => 'familyan_other',
				),
				'cardiovascular' => array(
					'cardio' => 'cardio_other',
					'cardio_comments',
				),
				'respiratory' => array(
					'pulmonary' => 'pulmonary_other',
					'pulmonary_comments',
				),
				'gastro_intestinal' => array(
					'gi' => 'gi_other',
					'gi_comments',
				),
				'diabetes' => array(
					'diabetes_treatment',
					'diabetes_monitor',
					'diabetes_comments',
				),
				'genitourinary_renal_endocrine' => array(
					'gre' => 'gre_other',
					'gre_comments',
				),
				'neuro_musculoskeletal' => array(
					'neuro' => 'neuro_other',
					'neuro_comments',
				),
				'falls_mobility_risk' => array(
					'falls',
					'falls_comments',
				),
				'miscellaneous' => array(
					'misc' => 'misc_other',
					'misc_comments',
				),
				'psychiatric' => array(
					'psychiatric_items' => 'psych_other',
					'psych_comments',
				),
				'pregnancy_status' => array(
					'pregnancy' => 'preg_test',
				),
				'exposure' => array(
					'recent_cough',
				),
				'dental' => array(
					'cardiac_devices' => 'cardev_other',
					'cardev_comments',
					'dentals' => 'teeth_other',
					'noncardiac_implants',
					'prosthetics' => 'prosthetic_other',
				),
			) as $boolean => $fields) {

			if ($this->$boolean) {
				$data_entered = false;

				foreach ($fields as $key => $value) {
					if (is_int($key)) {
						if (!empty($this->$value)) {
							$data_entered = true;
						}
					} else {
						if (!empty($this->$key)) {
							$data_entered = true;
						}

						if (is_array($this->$key)) {
							foreach ($this->$key as $item) {
								if (preg_match('/\(please specify\)/',$item->name)) {
									if (!$this->$value) {
										$this->addError($value,$this->getAttributeLabel($value).' cannot be blank.');
									}
								}
							}
						}
					}
				}

				if (!$data_entered) {
					$this->addError($boolean,'Please complete at least one field in the '.$this->getAttributeLabel($boolean).' section.');
				}
			}
		}

		foreach (array(
			'tobacco_use' => array(
				'tobacco_use',
				'smoke_amount',
				'smoke_duration',
				'smoke_quit_date',
			),
			'alcohol_use' => array(
				'alcohol_type',
				'alcohol_amount',
				'alcohol_quit_date',
			),
			'recreational_drug_use' => array(
				'drug_name',
				'drug_quit_date',
			),
			'pain' => array(
				'pain_location_id',
				'pain_type_id'
			)) as $boolean => $fields) {

			if ($this->$boolean) {
				foreach ($fields as $field) {
					if (empty($this->$field)) {
						$this->addError($field,$this->getAttributeLabel($field).' cannot be blank.');
					}
				}
			}
		}

		return parent::beforeValidate();
	}
}
?>
