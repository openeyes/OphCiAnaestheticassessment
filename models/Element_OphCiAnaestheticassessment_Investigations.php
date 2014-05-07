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
 * This is the model class for table "et_ophcianassessment_investigations".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $investigations
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphCiAnaestheticassessment_Investigations  extends  BaseEventTypeElement
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
		return 'et_ophcianassessment_investigations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, comments, ', 'safe'),
			array('id, event_id, investigations, ', 'safe', 'on' => 'search'),
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
			'investigations' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_Investigations_Investigation', 'element_id'),
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
			'investigations' => 'Investigations',
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
		$criteria->compare('investigations', $this->investigations);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function updateInvestigations($investigation_row_ids=array(), $investigation_ids=array(), $investigation_text=array(), $ordered=array(), $reviewed=array(), $result=array())
	{
		$ids = array();

		foreach ($investigation_ids as $i => $investigation_id) {
			if ($investigation_row_ids[$i]) {
				$investigation = OphCiAnaestheticassessment_Investigations_Investigation::model()->findByPk($investigation_row_ids[$i]);
			} else {
				$investigation = new OphCiAnaestheticassessment_Investigations_Investigation;
				$investigation->element_id = $this->id;
			}

			if ($investigation_text[$i]) {
				$investigation_type = OphCiAnaestheticassessment_Investigations_Investigation_Type::model()->findOrCreate($investigation_text[$i]);
				$investigation_id = $investigation_type->id;
			}

			$investigation->investigation_id = $investigation_id;
			$investigation->ordered = $ordered[$i];
			$investigation->reviewed = $reviewed[$i];
			$investigation->result = $result[$i];

			if (!$investigation->save()) {
				throw new Exception("Unable to save investigation: ".print_r($investigation->getErrors(),true));
			}

			$ids[] = $investigation->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $this->id;

		!empty($ids) && $criteria->addNotInCondition('id',$ids);

		OphCiAnaestheticassessment_Investigations_Investigation::model()->deleteAll($criteria);
	}

	public function beforeValidate()
	{
		foreach ($this->investigations as $investigation) {
			if (!$investigation->validate()) {
				foreach ($investigation->getErrors() as $field => $error) {
					$this->addError($field,$error[0]);
				}
			}
		}

		return parent::beforeValidate();
	}
}
?>
