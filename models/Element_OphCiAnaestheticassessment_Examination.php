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
			array('event_id, weight_lb, weight_kg, weight_calculation_id, height_ft, height_in, height_cm, height_calculation_id, bmi, bp_systolic, bp_diastolic, heart_rate_pulse, temperature, respiratory_rate, sao2, airway_class_id, blood_glucose, heart, lungs, abdomen, teeths', 'safe'),
			array('id, event_id, weight_lb, weight_kg, weight_calculation_id, height_ft, height_in, height_cm, height_calculation_id, bmi, bp_systolic, bp_diastolic, heart_rate_pulse, temperature, respiratory_rate, sao2, airway_class_id, blood_glucose, heart, lungs, abdomen', 'safe', 'on' => 'search'),
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
			'airway_class' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_Examination_AirwayClass', 'airway_class_id'),
			'teeths' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Examination_Teeth', 'teeth_id', 'through' => 'teeths_assignment'),
			'teeths_assignment' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Examination_Teeth_Assignment', 'element_id'),
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
			'weight_kg' => 'Weight (kg)',
			'weight_calculation_id' => 'Weight calculation',
			'height_ft' => 'Height (ft)',
			'height_in' => 'Height (in)',
			'height_cm' => 'Height (cm)',
			'height_calculation_id' => 'Height calculation',
			'bmi' => 'BMI',
			'bp_systolic' => 'Blood pressure', 
			'heart_rate_pulse' => 'Heart rate / pulse',
			'bp_systolic' => 'Blood pressure (systolic)',
			'bp_diastolic' => 'Blood pressure (diastolic)',
			'temperature' => 'Temperature',
			'respiratory_rate' => 'Respiratory rate',
			'sao2' => 'SaO2',
			'airway_class_id' => 'Airway class',
			'blood_glucose' => 'Blood glucose',
			'heart' => 'Heart',
			'lungs' => 'Lungs',
			'abdomen' => 'Abdomen',
			'teeth' => 'Teeth',
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

	public function formatDecimal($field)
	{
		return preg_replace('/\.0*$/','',$this->$field);
	}
}
?>
