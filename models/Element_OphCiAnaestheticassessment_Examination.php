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
 * This is the model class for table "et_ophcianassessment_examination".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $weight
 * @property string $weight_kg
 * @property integer $weight_calculation_id
 * @property string $height
 * @property string $height_cm
 * @property integer $height_calculation_id
 * @property string $bmi
 * @property string $blood_pressure
 * @property string $heart_rate_pulse
 * @property string $temperature
 * @property string $respiratory_rate
 * @property string $sao2
 * @property integer $airway_class_id
 * @property string $blood_glucose
 * @property string $heart
 * @property string $lungs
 * @property string $abdomen
 * @property string $teeth_other
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphCiAnaestheticassessment_Examination_WeightCalculation $weight_calculation
 * @property OphCiAnaestheticassessment_Examination_HeightCalculation $height_calculation
 * @property OphCiAnaestheticassessment_Examination_AirwayClass $airway_class
 * @property OphCiAnaestheticassessment_Examination_Teeth_Assignment $teeths
 * @property Element_OphCiAnaestheticassessment_Examination_Dental_Assignment $dentals
 */

class Element_OphCiAnaestheticassessment_Examination	extends  BaseEventTypeElement
{
	protected $auto_update_relations = true;
	protected $auto_update_measurements = true;
	public $weight_lb;
	public $height_ft;
	public $height_in;
	public $blood_pressure_m_systolic;
	public $blood_pressure_m_diastolic;

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
		return 'et_ophcianassessment_examination';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, weight_lb, weight_m, weight_calculation_id, height_ft, height_in, height_m, height_calculation_id, bmi_m, blood_pressure_m_systolic, blood_pressure_m_diastolic, pulse_m, temperature_m, rr_m, sao2_m, airway_class_m, blood_glucose_m, heart, lungs, abdomen, teeths, blood_glucose_na', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'weight_calculation' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_Examination_WeightCalculation', 'weight_calculation_id'),
			'height_calculation' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_Examination_HeightCalculation', 'height_calculation_id'),
			'teeths' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Examination_Teeth', 'teeth_id', 'through' => 'teeths_assignment'),
			'teeths_assignment' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Examination_Teeth_Assignment', 'element_id'),
			'weight_m' => array(self::BELONGS_TO, 'MeasurementWeight', 'weight_m_id'),
			'height_m' => array(self::BELONGS_TO, 'MeasurementHeight', 'height_m_id'),
			'bmi_m' => array(self::BELONGS_TO, 'MeasurementBMI', 'bmi_m_id'),
			'blood_pressure_m' => array(self::BELONGS_TO, 'MeasurementBloodPressure', 'blood_pressure_m_id'),
			'pulse_m' => array(self::BELONGS_TO, 'MeasurementPulse', 'pulse_m_id'),
			'temperature_m' => array(self::BELONGS_TO, 'MeasurementTemperature', 'temperature_m_id'),
			'rr_m' => array(self::BELONGS_TO, 'MeasurementRespiratoryRate', 'rr_m_id'),
			'sao2_m' => array(self::BELONGS_TO, 'MeasurementSAO2', 'sao2_m_id'),
			'airway_class_m' => array(self::BELONGS_TO, 'MeasurementAirwayClass', 'airway_class_m_id'),
			'blood_glucose_m' => array(self::BELONGS_TO, 'MeasurementGlucoseLevel', 'blood_glucose_m_id'),
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
			'weight_lb' => 'Weight (lbs)',
			'weight_m' => 'Weight (kg)',
			'weight_calculation_id' => 'Weight calculation',
			'height_ft' => 'Height (ft)',
			'height_in' => 'Height (in)',
			'height_m' => 'Height (cm)',
			'height_calculation_id' => 'Height calculation',
			'bmi_m' => 'BMI',
			'pulse_m' => 'Heart rate / pulse',
			'blood_pressure_m_systolic' => 'Blood pressure (systolic)',
			'blood_pressure_m_diastolic' => 'Blood pressure (diastolic)',
			'temperature_m' => 'Temperature',
			'rr_m' => 'Respiratory rate',
			'sao2_m' => 'SaO2',
			'airway_class_m' => 'Airway class',
			'blood_glucose_m' => 'Blood glucose',
			'heart' => 'Heart',
			'lungs' => 'Lungs',
			'abdomen' => 'Abdomen',
			'teeth' => 'Teeth',
			'blood_glucose_na' => 'N/A',
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
		$criteria->compare('weight', $this->weight);
		$criteria->compare('weight_kg', $this->weight_kg);
		$criteria->compare('weight_calculation_id', $this->weight_calculation_id);
		$criteria->compare('height', $this->height);
		$criteria->compare('height_cm', $this->height_cm);
		$criteria->compare('height_calculation_id', $this->height_calculation_id);
		$criteria->compare('bmi', $this->bmi);
		$criteria->compare('blood_pressure', $this->blood_pressure);
		$criteria->compare('heart_rate_pulse', $this->heart_rate_pulse);
		$criteria->compare('temperature', $this->temperature);
		$criteria->compare('respiratory_rate', $this->respiratory_rate);
		$criteria->compare('sao2', $this->sao2);
		$criteria->compare('airway_class_id', $this->airway_class_id);
		$criteria->compare('blood_glucose', $this->blood_glucose);
		$criteria->compare('heart', $this->heart);
		$criteria->compare('lungs', $this->lungs);
		$criteria->compare('abdomen', $this->abdomen);
		$criteria->compare('teeth', $this->teeth);
		$criteria->compare('dental', $this->dental);
		$criteria->compare('teeth_other', $this->teeth_other);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function afterFind()
	{
		if ($this->weight_m) {
			$this->weight_lb = number_format($this->weight_m->toLb(),1);
		}

		if ($this->height_m) {
			$ft_in = $this->height_m->toFtIn();
			$this->height_ft = $ft_in['ft'];
			$this->height_in = $ft_in['in'];
		}

		if ($this->blood_pressure_m) {
			$bp = $this->blood_pressure_m->value;
			$this->blood_pressure_m_systolic = $bp['bp_systolic'];
			$this->blood_pressure_m_diastolic = $bp['bp_diastolic'];
		}
	}

	public function beforeSave()
	{
		if ($this->blood_pressure_m_systolic && $this->blood_pressure_m_diastolic) {
			$this->blood_pressure_m = array(
				'bp_systolic' => $this->blood_pressure_m_systolic,
				'bp_diastolic' => $this->blood_pressure_m_diastolic,
			);
		}

		return parent::beforeSave();
	}

	public function beforeValidate()
	{
		$patient = $this->event->episode->patient;

		if ($patient->age < Yii::app()->params['weight_required_before_age']) {
			if (!$this->weight_m) {
				$this->addError('weight_m','Weight is required if the patient is less than '.Yii::app()->params['weight_required_before_age'].' years old.');
			}
		}

		return parent::beforeValidate();
	}
}
?>
