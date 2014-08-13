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
		$this->genericAdmin('Teeth admin','OphCiAnaestheticassessment_Examination_Teeth');
	}

	public function actionEditPreviousSurgery()
	{
		$this->genericAdmin('Previous surgeries','OphCiAnaestheticassessment_Medical_History_Surgery');
	}

	public function actionEditPatientAnesthesiaReaction()
	{
		$this->genericAdmin('Patient anesthesia reactions','OphCiAnaestheticassessment_Medical_History_Patient_Anesthesia');
	}

	public function actionEditFamilyAnesthesiaReaction()
	{
		$this->genericAdmin('Family anesthesia reactions','OphCiAnaestheticassessment_Medical_History_Family_Anesthesia');
	}

	public function actionEditCardiovascular()
	{
		$this->genericAdmin('Cardiovascular','OphCiAnaestheticassessment_Medical_History_Cardio');
	}

	public function actionEditRespiratory()
	{
		$this->genericAdmin('Respiratory','OphCiAnaestheticassessment_Medical_History_Pulmonary');
	}

	public function actionEditGastroIntestinal()
	{
		$this->genericAdmin('Gastro intestinal','OphCiAnaestheticassessment_Medical_History_GI');
	}

	public function actionEditDiabetesTreatedWith()
	{
		$this->genericAdmin('Diabetes treated with','OphCiAnaestheticassessment_Medical_History_Diabetes_Treatment');
	}

	public function actionEditDiabetesMonitoredWith()
	{
		$this->genericAdmin('Diabetes monitored with','OphCiAnaestheticassessment_Medical_History_Diabetes_Monitor');
	}

	public function actionEditGRE()
	{
		$this->genericAdmin('Genitourinary / renal / endocrine','OphCiAnaestheticassessment_Medical_History_GRE');
	}

	public function actionEditNeuroMusculoskeletal()
	{
		$this->genericAdmin('Neuro / musculoskeletal','OphCiAnaestheticassessment_Medical_History_Neuro');
	}

	public function actionEditFallsMobility()
	{
		$this->genericAdmin('Falls / mobility risk','OphCiAnaestheticassessment_Medical_History_Falls');
	}

	public function actionEditMiscellaneous()
	{
		$this->genericAdmin('Miscellaneous','OphCiAnaestheticassessment_Medical_History_Misc');
	}

	public function actionEditPsychiatric()
	{
		$this->genericAdmin('Psychiatric','OphCiAnaestheticassessment_Medical_History_Psychiatric');
	}

	public function actionEditPregnancy()
	{
		$this->genericAdmin('Pregnancy','OphCiAnaestheticassessment_Medical_History_Pregnancy');
	}

	public function actionEditImplantedCardiacDevice()
	{
		$this->genericAdmin('Implanted cardiac devices','OphCiAnaestheticassessment_Medical_History_Implant_Cardiac_Device');
	}

	public function actionEditRemovableDentalWork()
	{
		$this->genericAdmin('Removable dental work','OphCiAnaestheticassessment_Medical_History_Dental');
	}

	public function actionEditProsthetics()
	{
		$this->genericAdmin('Prosthetics','OphCiAnaestheticassessment_Medical_History_Implant_Prosthetic');
	}

	public function actionEditExclusionFactors()
	{
		$this->genericAdmin('Exclusion factors','OphCiAnaestheticassessment_DVT_Exclusion_Factor');
	}

	public function actionEditRiskFactors()
	{
		$this->genericAdmin('Risk factors','OphCiAnaestheticassessment_DVT_Risk_Factor',array(
			'extra_fields' => array(
				array(
					'field' => 'section_id',
					'type' => 'lookup',
					'OphCiAnaestheticassessment_DVT_Risk_Factor_Section',
				),
			)));
	}

	public function actionEditStockingContraindications()
	{
		$this->genericAdmin('Contraindications','OphCiAnaestheticassessment_DVT_Stocking_Contraindication');
	}

	public function actionEditHeparinContraindications()
	{
		$this->genericAdmin('Contraindications','OphCiAnaestheticassessment_DVT_Heparin_Contraindication');
	}

	public function actionEditApprovalForSurgery()
	{
		$this->genericAdmin('Anesthesia patient approval for surgery','OphCiAnaestheticassessment_AnesthesiaPlan_SurgeryApproval');
	}

	public function actionEditASALevel()
	{
		$this->genericAdmin('ASA level','OphCiAnaestheticassessment_AnesthesiaPlan_AsaLevel');
	}

	public function actionEditAnesthesiaPlan()
	{
		$this->genericAdmin('Anesthesia plan','OphCiAnaestheticassessment_AnesthesiaPlan_AnesthesiaPlan');
	}

	public function actionEditPatientSpecificEducation()
	{
		$this->genericAdmin('Patient specific education','OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions');
	}

	public function actionEditDiabetesInstructions()
	{
		$this->genericAdmin('Diabetes instructions','OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Diabetes');
	}
}
