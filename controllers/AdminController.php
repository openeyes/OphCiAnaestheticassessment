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

	public function actionEditPatientIdentifiers()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Patient identifiers',
			'model' => 'OphCiAnaestheticassessment_Patient_Identifier',
		));
	}

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
	}

	public function actionEditApprovalForSurgery()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Anesthesia patient approval for surgery',
			'model' => 'OphCiAnaestheticassessment_AnesthesiaPlan_SurgeryApproval',
		));
	}

	public function actionEditASALevel()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'ASA level',
			'model' => 'OphCiAnaestheticassessment_AnesthesiaPlan_AsaLevel',
		));
	}

	public function actionEditAnesthesiaPlan()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Anesthesia plan',
			'model' => 'OphCiAnaestheticassessment_AnesthesiaPlan_AnesthesiaPlan',
		));
	}

	public function actionEditPatientSpecificEducation()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Patient specific education',
			'model' => 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions',
		));
	}

	public function actionEditDiabetesInstructions()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Diabetes instructions',
			'model' => 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Diabetes',
		));
	}

	public function actionEditPatientInstructionCategories()
	{
		$model = 'OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category';
		$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

		$this->pageTitle = Yii::app()->name . ' - Patient instruction categories admin';
		$this->items_per_page = 5;
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
		$this->items_per_page = 5;

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
		$data = $model::model()->findAll($criteria);

		// If it's a POST action but there are validation errors, then merge
		// POST data with data retrieved from DB.
		if ($isPostAction && !empty($this->form_errors)) {
			foreach ($_POST['id'] as $i => $id) {
				$item = $data[$i];
				$item->name = $_POST['name'][$i];
				$attributes = $item->getAttributes();
				if (array_key_exists('active',$attributes)) {
					$item->active = (int) ($id && isset($_POST['active'][$id]) || intval($id) === 0);
				}
			}
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
		$updated_items = array();

		$criteria = new CDbCriteria;
		$criteria->order = 'display_order asc';

		// Get existing items, filter out items that exist in POST.
		$unchanged_items = array_filter($model::model()->findAll($criteria), function($item) {
			return !in_array($item->id, $_POST['id']);
		});

		foreach ($_POST['id'] as $i => $id) {

			// Create new record or update existing record.
			$item = $id ? $model::model()->findByPk($id) : new $model;
			$updated_items[] = $item;

			$item->name = $_POST['name'][$i];

			// Handle models with active flag.
			$attributes = $item->getAttributes();
			if (array_key_exists('active',$attributes)) {
				$item->active = (int) ($id && isset($_POST['active'][$id]) || $item->isNewRecord);
			}

			// Handle extra fields.
			if (!empty($_POST['_extra_fields'])) {
				foreach ($_POST['_extra_fields'] as $field) {
					$item->$field = $_POST[$field][$i];
				}
			}

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
			$ordered_items = array_merge($first, $updated_items, $last);

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
		}
	}
}

