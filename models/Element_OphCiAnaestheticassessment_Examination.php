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
 * @property string $lbs
 * @property integer $weight_calculation_id
 * @property string $height
 * @property string $ft
 * @property string $in
 * @property integer $height_calculation_id
 * @property string $bmi
 * @property string $blood_pressure
 * @property string $mmhg
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
 * @property Element_OphCiAnaestheticassessment_Examination_Teeth_Assignment $teeths
 * @property Element_OphCiAnaestheticassessment_Examination_Dental_Assignment $dentals
 */

class Element_OphCiAnaestheticassessment_Examination  extends  BaseEventTypeElement
{
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
			array('event_id, weight, lbs, weight_calculation_id, height, ft, in, height_calculation_id, bmi, blood_pressure, mmhg, heart_rate_pulse, temperature, respiratory_rate, sao2, airway_class_id, blood_glucose, heart, lungs, abdomen, teeth_other, ', 'safe'),
			array('weight, lbs, weight_calculation_id, height, ft, in, height_calculation_id, bmi, blood_pressure, mmhg, heart_rate_pulse, temperature, respiratory_rate, sao2, airway_class_id, blood_glucose, heart, lungs, abdomen, teeth_other, ', 'required'),
			array('id, event_id, weight, lbs, weight_calculation_id, height, ft, in, height_calculation_id, bmi, blood_pressure, mmhg, heart_rate_pulse, temperature, respiratory_rate, sao2, airway_class_id, blood_glucose, heart, lungs, abdomen, teeth_other, ', 'safe', 'on' => 'search'),
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
			'weight_calculation' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_Examination_WeightCalculation', 'weight_calculation_id'),
			'height_calculation' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_Examination_HeightCalculation', 'height_calculation_id'),
			'airway_class' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_Examination_AirwayClass', 'airway_class_id'),
			'teeths' => array(self::HAS_MANY, 'Element_OphCiAnaestheticassessment_Examination_Teeth_Assignment', 'element_id'),
			'dentals' => array(self::HAS_MANY, 'Element_OphCiAnaestheticassessment_Examination_Dental_Assignment', 'element_id'),
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
			'weight' => 'Weight',
			'lbs' => 'lbs',
			'weight_calculation_id' => 'Weight Calculation',
			'height' => 'Height',
			'ft' => 'ft',
			'in' => 'in',
			'height_calculation_id' => 'Height Calculation',
			'bmi' => 'BMI',
			'blood_pressure' => 'Blood pressure',
			'mmhg' => 'mmHg',
			'heart_rate_pulse' => 'Heart Rate Pulse',
			'temperature' => 'Temperature',
			'respiratory_rate' => 'Respiratory rate',
			'sao2' => 'SaO2',
			'airway_class_id' => 'Airway Class',
			'blood_glucose' => 'Blood glucose',
			'heart' => 'Heart',
			'lungs' => 'Lungs',
			'abdomen' => 'Abdomen',
			'teeth' => 'Teeth',
			'dental' => 'Removable dental work',
			'teeth_other' => 'Teeth Other',
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
		$criteria->compare('lbs', $this->lbs);
		$criteria->compare('weight_calculation_id', $this->weight_calculation_id);
		$criteria->compare('height', $this->height);
		$criteria->compare('ft', $this->ft);
		$criteria->compare('in', $this->in);
		$criteria->compare('height_calculation_id', $this->height_calculation_id);
		$criteria->compare('bmi', $this->bmi);
		$criteria->compare('blood_pressure', $this->blood_pressure);
		$criteria->compare('mmhg', $this->mmhg);
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


	public function getophcianassessment_examination_teeth_defaults() {
		$ids = array();
		foreach (OphCiAnaestheticassessment_Examination_Teeth::model()->findAll('`default` = ?',array(1)) as $item) {
			$ids[] = $item->id;
		}
		return $ids;
	}
	public function getophcianassessment_examination_dental_defaults() {
		$ids = array();
		foreach (OphCiAnaestheticassessment_Examination_Dental::model()->findAll('`default` = ?',array(1)) as $item) {
			$ids[] = $item->id;
		}
		return $ids;
	}

	protected function afterSave()
	{
		if (!empty($_POST['MultiSelect_teeth'])) {

			$existing_ids = array();

			foreach (Element_OphCiAnaestheticassessment_Examination_Teeth_Assignment::model()->findAll('element_id = :elementId', array(':elementId' => $this->id)) as $item) {
				$existing_ids[] = $item->ophcianassessment_examination_teeth_id;
			}

			foreach ($_POST['MultiSelect_teeth'] as $id) {
				if (!in_array($id,$existing_ids)) {
					$item = new Element_OphCiAnaestheticassessment_Examination_Teeth_Assignment;
					$item->element_id = $this->id;
					$item->ophcianassessment_examination_teeth_id = $id;

					if (!$item->save()) {
						throw new Exception('Unable to save MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}

			foreach ($existing_ids as $id) {
				if (!in_array($id,$_POST['MultiSelect_teeth'])) {
					$item = Element_OphCiAnaestheticassessment_Examination_Teeth_Assignment::model()->find('element_id = :elementId and ophcianassessment_examination_teeth_id = :lookupfieldId',array(':elementId' => $this->id, ':lookupfieldId' => $id));
					if (!$item->delete()) {
						throw new Exception('Unable to delete MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}
		}
		if (!empty($_POST['MultiSelect_dental'])) {

			$existing_ids = array();

			foreach (Element_OphCiAnaestheticassessment_Examination_Dental_Assignment::model()->findAll('element_id = :elementId', array(':elementId' => $this->id)) as $item) {
				$existing_ids[] = $item->ophcianassessment_examination_dental_id;
			}

			foreach ($_POST['MultiSelect_dental'] as $id) {
				if (!in_array($id,$existing_ids)) {
					$item = new Element_OphCiAnaestheticassessment_Examination_Dental_Assignment;
					$item->element_id = $this->id;
					$item->ophcianassessment_examination_dental_id = $id;

					if (!$item->save()) {
						throw new Exception('Unable to save MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}

			foreach ($existing_ids as $id) {
				if (!in_array($id,$_POST['MultiSelect_dental'])) {
					$item = Element_OphCiAnaestheticassessment_Examination_Dental_Assignment::model()->find('element_id = :elementId and ophcianassessment_examination_dental_id = :lookupfieldId',array(':elementId' => $this->id, ':lookupfieldId' => $id));
					if (!$item->delete()) {
						throw new Exception('Unable to delete MultiSelect item: '.print_r($item->getErrors(),true));
					}
				}
			}
		}

		return parent::afterSave();
	}
}
?>