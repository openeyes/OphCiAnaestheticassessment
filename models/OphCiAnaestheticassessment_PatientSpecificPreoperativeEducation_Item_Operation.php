<?php /**
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
 * This is the model class for table "ophnupreoperative_patientstatus_cancel".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property string $name
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item_Operation extends BaseActiveRecordVersioned
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
		return 'ophcianaestheticassessment_speced_item_booking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('booking_event_id', 'safe'),
			array('booking_event_id', 'required'),
			array('id, name', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'item' => array(self::BELONGS_TO, 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item', 'item_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'booking_event_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
		);
	}

	public function getAttributeSuffix($attribute)
	{
	}

	public function getBookingDate()
	{
		if (!$api = Yii::app()->moduleAPI->get('OphTrOperationbooking')) {
			throw new Exception("Unable to load operation booking module API");
		}

		if (!$operation = $api->getOperationForEvent($this->booking_event_id)) {
			throw new Exception("Unable to find operation for event: $this->booking_event_id");
		}

		if (!$booking = $operation->booking) {
			throw new Exception("Operation has no active booking");
		}

		return $booking->session_date;
	}

	public function getEye()
	{
		if (!$api = Yii::app()->moduleAPI->get('OphTrOperationbooking')) {
			throw new Exception("Unable to load operation booking module API");
		}

		if (!$operation = $api->getOperationForEvent($this->booking_event_id)) {
			throw new Exception("Unable to find operation for event: $this->booking_event_id");
		}

		return $operation->eye;
	}

	public function getProcedures()
	{
		if (!$api = Yii::app()->moduleAPI->get('OphTrOperationbooking')) {
			throw new Exception("Unable to load operation booking module API");
		}

		if (!$operation = $api->getOperationForEvent($this->booking_event_id)) {
			throw new Exception("Unable to find operation for event: $this->booking_event_id");
		}

		return $operation->procedures;
	}
}
