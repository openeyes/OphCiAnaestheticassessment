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
	public $data = array();
	public $pagination = null;
	public $form_errors = array();

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
					'model' => 'OphCiAnaestheticassessment_DVT_Risk_Factor_Section',
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

	public function actionEditPatientInstructionCategories()
	{
		$model = 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category';
		$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

		$this->pageTitle = Yii::app()->name . ' - Patient instruction categories admin';
		$this->initAdminAction($model);

		$this->render('patient_instruction_categories',array(
			'data' => $this->data,
			'title' => 'Patient instruction categories',
			'model' => $model,
			'errors' => $this->form_errors,
			'pagination' => $this->pagination,
			'page' => $page
		));
	}

	public function actionEditPatientInstructions($id=0)
	{
		$instructionsModel = 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions';
		$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

		$this->pageTitle = Yii::app()->name . ' - Patient instructions admin';

		$categoryModel = 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category';
		if (!$category = $categoryModel::model()->findByPk($id)) {
			throw new Exception("Instruction category not found: {$id}");
		}
		$categories = $categoryModel::model()->findAll(array(
			'order' => 'display_order asc'
		));

		$criteria=new CDbCriteria;
		$criteria->compare('category_id',$category->id);

		$this->initAdminAction($instructionsModel, $criteria);

		$this->render('patient_instructions',array(
			'title' => 'Patient instructions for category: '.$category->name,
			'categoryModel' => $categoryModel,
			'instructionsModel' => $instructionsModel,
			'instructions' => $this->data,
			'category' => $category,
			'categories' => $categories,
			'errors' => $this->form_errors,
			'pagination' => $this->pagination,
			'page' => $page,
			'extra_fields' => array(
				array(
					'field' => 'category_id',
					'type' => 'lookup',
					'model' => 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category',
				),
			)
		));
	}

	private function initAdminAction($model='', $criteria=null)
	{
		$isPostAction = isset($_POST['id']) && !empty($_POST['id']);
		$viewAll = @$_REQUEST['viewall'];

		// Update items (if POST action)
		if ($isPostAction) {
			$this->update($model);
		}
		// View all items
		if ($viewAll) {
			$this->items_per_page = PHP_INT_MAX;
		}

		if ($criteria === null) {
			$criteria = new CDbCriteria;
		}
		$criteria->order = 'display_order asc';

		$pagination = $this->initPagination($model::model(), $criteria);

		if (!$isPostAction) {
			$data = $model::model()->findAll($criteria);
		} else {
			$data = array_map(function($id, $i) {
				$item = new StdClass;
				$item->id = $id;
				$item->name = $_POST['name'][$i];
				$item->active = (int) ($id && isset($_POST['active'][$id]) || intval($id) === 0);
				if (!empty($_POST['_extra_fields'])) {
					foreach ($_POST['_extra_fields'] as $field) {
						$item->$field = $_POST[$field][$i];
					}
				}
				return $item;
			}, $_POST['id'], array_keys($_POST['id']));
		}

		$this->data = $data;
		$this->pagination = $pagination;
	}

	private function update($model='')
	{
		$page = (int) $_POST['page'];
		if (!$page) {
			$page = 1;
		}

		$display_order = 1;
		$display_order_position = ($this->items_per_page * ($page-1));
		$items = array();

		$criteria = new CDbCriteria;
		$criteria->order = 'display_order asc';

		// Get existing items, filter out items that exist in POST.
		$unchanged_items = array_filter($model::model()->findAll($criteria), function($item) {
			return !in_array($item->id, $_POST['id']);
		});

		foreach ($_POST['id'] as $i => $id) {

			// Create new record or update existing record.
			$item = $id ? $model::model()->findByPk($id) : new $model;
			$item->name = $_POST['name'][$i];
			$item->active = (int) ($id && isset($_POST['active'][$id]) || $item->isNewRecord);

			// Handle extra fields.
			if (!empty($_POST['_extra_fields'])) {
				foreach ($_POST['_extra_fields'] as $field) {
					$item->$field = $_POST[$field][$i];
				}
			}

			$items[] = $item;

			// We're validating before trying to save because we don't want to save
			// *any* records if any of the validation fails.
			if (!$item->validate()) {
				$errors = $item->getErrors();
				$this->form_errors[$i] = reset($errors[key($errors)]);
			}
		}

		if (empty($this->form_errors)) {

			// Here we build a new array with items in the correct order.
			$first = array_slice($unchanged_items, 0, $display_order_position, true);
			$last = array_slice($unchanged_items, $display_order_position, count($unchanged_items)-$display_order_position, true);
			$ordered_items = array_merge($first, $items, $last);

			foreach($ordered_items as $i => $item) {
				$item->display_order = $i;
				if (!$item->save()) {
					throw new Exception('Unable to save admin list item: '.print_r($item->getErrors(),true));
				}
			}

			Yii::app()->user->setFlash('success', 'List updated.');

			$this->redirect(
				$this->createUrl('/'.$this->route,$_GET)
			);
		} else {
			Yii::app()->user->setFlash('alert.error', 'There were errors submitting the form. Please review the errors below.');
		}
	}
}

