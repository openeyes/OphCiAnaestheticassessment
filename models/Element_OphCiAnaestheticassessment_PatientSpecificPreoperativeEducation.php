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
 * This is the model class for table "et_ophcianassessment_specificeducation".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $medications
 * @property string $other
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Assignment $speced_ids
 */

class Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation  extends	BaseEventTypeElement
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
		return 'et_ophcianassessment_specificeducation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, medications, other, ', 'safe'),
			array('id, event_id, medications, other, ', 'safe', 'on' => 'search'),
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
			'speced_ids' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Assignment', 'element_id'),
			'diabetes_items' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Diabetes_Assignment', 'element_id'),
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
			'speced_ids' => 'Patient specific education',
			'medications' => 'Medications',
			'other' => 'Other education',
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
		$criteria->compare('speced_id', $this->speced_id);
		$criteria->compare('medications', $this->medications);
		$criteria->compare('other', $this->other);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function updateSpeceds($speced_ids)
	{
		foreach ($speced_ids as $speced_id) {
			if (!$assignment = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Assignment::model()->find('element_id=? and instruction_id=?',array($this->id,$speced_id))) {
				$assignment = new OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Assignment;
				$assignment->element_id = $this->id;
				$assignment->instruction_id = $speced_id;

				if (!$assignment->save()) {
					throw new Exception("Unable to save assignment: ".print_r($assignment->getErrors(),true));
				}
			}
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $this->id;
		$criteria->addNotInCondition('instruction_id',$speced_ids);

		OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Assignment::model()->deleteAll($criteria);
	}

	protected function beforeValidate()
	{
		if ($this->hasMultiSelectValue('speced_ids','Other (please specify)')) {
			if (!$this->other) {
				$this->addError('other',$this->getAttributeLabel('other').' cannot be blank.');
			}
		}

		if ($this->hasMultiSelectValue('speced_ids','Medications')) {
			if (!$this->medications) {
				$this->addError('medications',$this->getAttributeLabel('medications').' cannot be blank.');
			}
		}

		return parent::beforeValidate();
	}
}
?>
