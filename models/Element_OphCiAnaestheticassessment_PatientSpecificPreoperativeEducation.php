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
		return 'et_ophcianassessment_specificeducation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id', 'safe'),
			array('id, event_id', 'safe', 'on' => 'search'),
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
			'items' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item', 'element_id'),
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
			'instruction_category_id' => 'Instructions list',
			'instructions' => 'Patient instructions',
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

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function getSelectedProcedureIDs()
	{
		$ids = array();

		foreach ($this->procedures as $procedure) {
			$ids[] = $procedure->id;
		}

		return $ids;
	}

	public function getProcedureList($bookings)
	{
		$procedures = array();
		$hash = array();

		foreach ($this->procedure_assignments as $assignment) {
			$hash[$assignment->procedure_id][$assignment->eye_id] = 1;

			$procedures[] = array(
				'assignment_id' => $assignment->id,
				'id' => $assignment->procedure_id,
				'term' => $assignment->procedure->term,
				'eye' => $assignment->eye->name,
				'eye_id' => $assignment->eye_id,
			);
		}

		foreach ($bookings as $booking) {
			foreach ($booking->operation->procedures as $procedure) {
				if (!isset($hash[$procedure->id][$booking->operation->eye_id])) {
					$procedures[] = array(
						'assignment_id' => '',
						'id' => $procedure->id,
						'term' => $procedure->term,
						'eye' => $booking->operation->eye->name,
						'eye_id' => $booking->operation->eye_id,
					);
				}
			}
		}

		return $procedures;
	}
}
?>
