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
 * This is the model class for table "et_ophcianassessment_anesthesiaplan".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $surgery_approval_id
 * @property string $com_na
 * @property integer $acceptance_id
 * @property string $waiting_comments
 * @property integer $asa_level_id
 * @property integer $anesthesia_plan_id
 * @property string $anesthesia_plan_comment
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphCiAnaestheticassessment_AnesthesiaPlan_SurgeryApproval $surgery_approval
 * @property Element_OphCiAnaestheticassessment_AnesthesiaPlan_NotApp_Assignment $not_apps
 * @property OphCiAnaestheticassessment_AnesthesiaPlan_Acceptance $acceptance
 * @property OphCiAnaestheticassessment_AnesthesiaPlan_AsaLevel $asa_level
 * @property OphCiAnaestheticassessment_AnesthesiaPlan_AnesthesiaPlan $anesthesia_plan
 */

class Element_OphCiAnaestheticassessment_AnesthesiaPlan  extends  BaseEventTypeElement
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
		return 'et_ophcianassessment_anesthesiaplan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, surgery_approval_id, com_na, acceptance_id, waiting_comments, asa_level_id, anesthesia_plan_id, anesthesia_plan_comment, ', 'safe'),
			array('id, event_id, surgery_approval_id, com_na, acceptance_id, waiting_comments, asa_level_id, anesthesia_plan_id, anesthesia_plan_comment, ', 'safe', 'on' => 'search'),
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
			'surgery_approval' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_AnesthesiaPlan_SurgeryApproval', 'surgery_approval_id'),
			'not_apps' => array(self::HAS_MANY, 'Element_OphCiAnaestheticassessment_AnesthesiaPlan_NotApp_Assignment', 'element_id'),
			'acceptance' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_AnesthesiaPlan_Acceptance', 'acceptance_id'),
			'asa_level' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_AnesthesiaPlan_AsaLevel', 'asa_level_id'),
			'anesthesia_plan' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_AnesthesiaPlan_AnesthesiaPlan', 'anesthesia_plan_id'),
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
			'surgery_approval_id' => 'Anesthesia patient approval for surgery',
			'not_app' => 'Reason for not approving patient for surgery',
			'com_na' => 'Other reason',
			'acceptance_id' => 'Reason for conditional acceptance',
			'waiting_comments' => 'Other reason',
			'asa_level_id' => 'ASA level',
			'anesthesia_plan_id' => 'Anesthesia plan',
			'anesthesia_plan_comment' => 'Anesthesia plan comment',
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
		$criteria->compare('surgery_approval_id', $this->surgery_approval_id);
		$criteria->compare('not_app', $this->not_app);
		$criteria->compare('com_na', $this->com_na);
		$criteria->compare('acceptance_id', $this->acceptance_id);
		$criteria->compare('waiting_comments', $this->waiting_comments);
		$criteria->compare('asa_level_id', $this->asa_level_id);
		$criteria->compare('anesthesia_plan_id', $this->anesthesia_plan_id);
		$criteria->compare('anesthesia_plan_comment', $this->anesthesia_plan_comment);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function beforeValidate()
	{
		if ($this->acceptance && $this->acceptance->name == 'Other (please specify)') {
			if (!$this->waiting_comments) {
				$this->addError('waiting_comments',$this->getAttributeLabel('waiting_comments').' cannot be blank.');
			}
		}

		if ($this->surgery_approval && $this->surgery_approval->name == 'Not approved for surgery') {
			if (count($this->not_apps) == 0) {
				$this->addError('not_apps','Please select at least one reason for the patient not being approved for surgery');
			}
		}

		if ($this->surgery_approval && $this->surgery_approval->name == 'Awaiting further information do not schedule') {
			if (!$this->acceptance) {
				$this->addError('acceptance_id',$this->getAttributeLabel('acceptance_id').' cannot be blank.');
			}
		}

		return parent::beforeValidate();
	}
}
?>
