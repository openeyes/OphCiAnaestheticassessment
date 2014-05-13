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
		$this->render('//admin/generic_admin',array(
			'title' => 'Teeth admin',
			'model' => 'OphCiAnaestheticassessment_Examination_Teeth',
		));
	}

	public function actionEditPreviousSurgery()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Previous surgeries',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Surgery',
		));
	}

	public function actionEditPatientAnesthesiaReaction()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Patient anesthesia reactions',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Patient_Anesthesia',
		));
	}

	public function actionEditFamilyAnesthesiaReaction()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Family anesthesia reactions',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Family_Anesthesia',
		));
	}

	public function actionEditCardiovascular()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Cardiovascular',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Cardio',
		));
	}

	public function actionEditRespiratory()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Respiratory',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Pulmonary',
		));
	}

	public function actionEditGastroIntestinal()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Gastro intestinal',
			'model' => 'OphCiAnaestheticassessment_Medical_History_GI',
		));
	}

	public function actionEditDiabetesTreatedWith()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Diabetes treated with',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Diabetes_Treatment',
		));
	}

	public function actionEditDiabetesMonitoredWith()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Diabetes monitored with',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Diabetes_Monitor',
		));
	}

	public function actionEditGRE()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Genitourinary / renal / endocrine',
			'model' => 'OphCiAnaestheticassessment_Medical_History_GRE',
		));
	}

	public function actionEditNeuroMusculoskeletal()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Neuro / musculoskeletal',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Neuro',
		));
	}

	public function actionEditFallsMobility()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Falls / mobility risk',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Falls',
		));
	}

	public function actionEditMiscellaneous()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Miscellaneous',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Misc',
		));
	}

	public function actionEditPsychiatric()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Psychiatric',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Psychiatric',
		));
	}

	public function actionEditPregnancy()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Pregnancy',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Pregnancy',
		));
	}

	public function actionEditImplantedCardiacDevice()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Implanted cardiac devices',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Implant_Cardiac_Device',
		));
	}

	public function actionEditRemovableDentalWork()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Removable dental work',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Dental',
		));
	}

	public function actionEditProsthetics()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Prosthetics',
			'model' => 'OphCiAnaestheticassessment_Medical_History_Implant_Prosthetic',
		));
	}

	public function actionEditExclusionFactors()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Exclusion factors',
			'model' => 'OphCiAnaestheticassessment_DVT_Exclusion_Factor',
		));
	}

	public function actionEditRiskFactors()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Risk factors',
			'model' => 'OphCiAnaestheticassessment_DVT_Risk_Factor',
			'extra_fields' => array(
				array(
					'field' => 'section_id',
					'type' => 'lookup',
					'model' => 'OphCiAnaestheticassessment_DVT_Risk_Factor_Section',
				),
			),
		));
	}

	public function actionEditStockingContraindications()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Contraindications',
			'model' => 'OphCiAnaestheticassessment_DVT_Stocking_Contraindication',
		));
	}

	public function actionEditHeparinContraindications()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Contraindications',
			'model' => 'OphCiAnaestheticassessment_DVT_Heparin_Contraindication',
		));
		$this->referenceTableAdmin('OphCiAnaestheticassessment_DVT_Heparin_Contraindication','Contraindications');
	}
}
