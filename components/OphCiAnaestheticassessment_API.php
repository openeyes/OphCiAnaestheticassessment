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

class OphCiAnaestheticassessment_API extends BaseAPI
{
	/**
	 * Return most recent medication history for the specified patient
	 */
	public function getMedicationHistoryForPatient($patient_id)
	{
		$criteria = new CDbCriteria;
		$criteria->order = 'event_date desc';
		$criteria->addCondition('patient_id=:patient_id');
		$criteria->params[':patient_id'] = $patient_id;

		if ($mhr = Element_OphCiAnaestheticassessment_MedicalHistoryReview::model()
			->with(array(
				'event' => array(
					'with' => 'episode',
				),
				'medications',
			))
			->find($criteria)) {
			return $mhr->medications;
		}

		return null;
	}

	/**
	 * Return most recent allergy history for the specified patient
	 */
	public function getAllergiesHistoryForPatient($patient_id)
	{
		$criteria = new CDbCriteria;
		$criteria->order = 'event_date desc';
		$criteria->addCondition('patient_id=:patient_id');
		$criteria->params[':patient_id'] = $patient_id;

		if ($mhr = Element_OphCiAnaestheticassessment_MedicalHistoryReview::model()
			->with(array(
				'event' => array(
					'with' => 'episode',
				),
				'allergies',
			))
			->find($criteria)) { 
			return $mhr->allergies;
		} 
		
		return null;
	} 
}
