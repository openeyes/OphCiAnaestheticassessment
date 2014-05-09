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

class AdminController extends ModuleAdminController
{
	public function actionEditTeeth()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Examination_Teeth','Teeth admin');
	}

	public function actionEditPreviousSurgery()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Surgery','Previous surgeries');
	}

	public function actionEditPatientAnesthesiaReaction()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Patient_Anesthesia','Patient anesthesia reactions');
	}

	public function actionEditFamilyAnesthesiaReaction()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Family_Anesthesia','Family anesthesia reactions');
	}

	public function actionEditCardiovascular()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Cardio','Cardiovascular');
	}

	public function actionEditRespiratory()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Pulmonary','Respiratory');
	}

	public function actionEditGastroIntestinal()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_GI','Gastro intestinal');
	}

	public function actionEditDiabetesTreatedWith()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Diabetes_Treatment','Diabetes treated with');
	}

	public function actionEditDiabetesMonitoredWith()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Diabetes_Monitor','Diabetes monitored with');
	}

	public function actionEditGRE()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_GRE','Genitourinary / renal / endocrine');
	}

	public function actionEditNeuroMusculoskeletal()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Neuro','Neuro / musculoskeletal');
	}

	public function actionEditFallsMobility()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Falls','Falls / mobility risk');
	}

	public function actionEditMiscellaneous()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Misc','Miscellaneous');
	}

	public function actionEditPsychiatric()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Psychiatric','Psychiatric');
	}

	public function actionEditPregnancy()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Pregnancy','Pregnancy');
	}

	public function actionEditImplantedCardiacDevice()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Implant_Cardiac_Device','Implanted cardiac devices');
	}

	public function actionEditRemovableDentalWork()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Dental','Removable dental work');
	}

	public function actionEditProsthetics()
	{
		$this->referenceTableAdmin('OphCiAnaestheticassessment_Medical_History_Implant_Prosthetic','Prosthetics');
	}
}
