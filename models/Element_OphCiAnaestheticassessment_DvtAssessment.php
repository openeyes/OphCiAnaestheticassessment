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
 * This is the model class for table "et_ophcianassessment_dvtassessment".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphCiAnaestheticassessment_DvtAssessment  extends  BaseEventTypeElement
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
		return 'et_ophcianassessment_dvtassessment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, prophylaxis_ordered, exclusion_criteria_met, exclusion_factors, risk_factors, stocking_contraindications, heparin_contraindications', 'safe'),
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
			'exclusion_factors' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_DVT_Exclusion_Factor', 'exclusion_factor_id', 'through' => 'exclusion_factors_assignment'),
			'exclusion_factors_assignment' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_DVT_Exclusion_Factor_Assignment', 'element_id'),
			'risk_factors' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_DVT_Risk_Factor', 'risk_factor_id', 'through' => 'risk_factors_assignment'),
			'risk_factors_assignment' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_DVT_Risk_Factor_Assignment', 'element_id'),
			'stocking_contraindications' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_DVT_Stocking_Contraindication', 'contraindication_id', 'through' => 'stocking_contraindications_assignment'),
			'stocking_contraindications_assignment' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_DVT_Stocking_Contraindication_Assignment', 'element_id'),
			'heparin_contraindications' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_DVT_Heparin_Contraindication', 'contraindication_id', 'through' => 'heparin_contraindications_assignment'),
			'heparin_contraindications_assignment' => array(self::HAS_MANY, 'OphCiAnaestheticassessment_DVT_Heparin_Contraindication_Assignment', 'element_id'),
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
			'comments' => 'Comments',
			'exclusion_factors' => 'Exclusion factors',
			'risk_factors' => 'Risk factors',
			'stocking_contraindications' => 'Contraindications to graduated compression stockings',
			'heparin_contraindications' => 'Contraindications to low molecular weight heparin (LMWH)',
			'prophylaxis_ordered' => 'I have reviewed the above and have ordered the appropriate prophylaxis',
			'exclusion_criteria_met' => 'Does patient meet exclusion criteria for DVT assessment?',
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

	public function getRiskScore()
	{
		$score = 0;

		if (!empty($this->risk_factors)) {
			foreach ($this->risk_factors as $risk_factor) {
				$score += ($risk_factor->section->name == 'A') ? 2 : 1;
			}
		}

		return $score;
	}

	private function getRiskLevelProphylaxis()
	{
		return OphCiAnaestheticassessment_DVT_Risk_Prophylaxis::model()->find('(score_from <= :score or score_from is null) and (score_to >= :score or score_to is null)',array(':score' => $this->riskScore));
	}

	public function getRiskLevel()
	{
		return $this->getRiskLevelProphylaxis()->risk_level;
	}

	public function getRiskLevelColour()
	{
		switch ($this->getRiskLevelProphylaxis()->risk_level) {
			case 'Low': return 'green';
			case 'Medium': return 'blue';
			case 'High': return 'red';
		}
	}

	public function getProphylaxisRequired()
	{
		return $this->getRiskLevelProphylaxis()->prophylaxis_required;
	}
}
?>
