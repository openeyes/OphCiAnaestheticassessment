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
 * This is the model class for table "et_ophcianassessment_patient".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $patient_id_verified_with_two_identifiers
 * @property integer $translator_present_id
 * @property string $name
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphCiAnaestheticassessment_Patient_TranslatorPresent $translator_present
 */

class Element_OphCiAnaestheticassessment_Patient	extends  BaseEventTypeElement
{
	public $patient;
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
		return 'et_ophcianassessment_patient';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, patient_id_verified_with_two_identifiers, translator_present_id, name, guardian_name, guardian_relationship_id, guardian_relationship_other', 'safe'),
			array('id, event_id, patient_id_verified_with_two_identifiers, translator_present_id, name, ', 'safe', 'on' => 'search'),
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
			'translator_present' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_Patient_TranslatorPresent', 'translator_present_id'),
			'guardian_relationship' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_Patient_Guardian_relationship', 'guardian_relationship_id'),
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
			'patient_id_verified_with_two_identifiers' => 'Patient ID verified and ID band applied',
			'translator_present_id' => 'Translator present',
			'name' => 'Translator name',
			'guardian_name' => 'Parent/guardian name',
			'guardian_relationship_id' => 'Relationship',
			'guardian_relationship_other' => 'Other relationship',
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
		$criteria->compare('patient_id_verified_with_two_identifiers', $this->patient_id_verified_with_two_identifiers);
		$criteria->compare('translator_present_id', $this->translator_present_id);
		$criteria->compare('name', $this->name);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function beforeValidate()
	{
		if ($this->translator_present && $this->translator_present->name == 'Yes') {
			if (!$this->name) {
				$this->addError('name',$this->getAttributeLabel('name').' cannot be blank.');
			}
		}

		if ($this->event->episode->patient->isChild()) {
			if (!$this->guardian_name) {
				$this->addError('guardian_name',$this->getAttributeLabel('guardian_name').' cannot be blank.');
			}
			if (!$this->guardian_relationship_id) {
				$this->addError('guardian_relationship_id',$this->getAttributeLabel('guardian_relationship_id').' cannot be blank.');
			}

			if ($this->guardian_relationship && $this->guardian_relationship == 'Other') {
				if (!$this->guardian_relationship_other) {
					$this->addError('guardian_relationship_other',$this->getAttributeLabel('guardian_relationship_other').' cannot be blank.');
				}
			}
		}

		return parent::beforeValidate();
	}
}
?>
