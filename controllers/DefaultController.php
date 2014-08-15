<?php

class DefaultController extends BaseEventTypeController
{
	static protected $action_types = array(
		'drugList' => self::ACTION_TYPE_FORM,
		'validateMedication' => self::ACTION_TYPE_FORM,
		'routeOptions' => self::ACTION_TYPE_FORM,
		'addInvestigation' => self::ACTION_TYPE_FORM,
		'riskProphylaxis' => self::ACTION_TYPE_FORM,
		'validateSurgery' => self::ACTION_TYPE_FORM,
		'instructionList' => self::ACTION_TYPE_FORM,
	);

	public function accessRules()
	{
		return array_merge(array(
			array('allow',
				'actions' => array('drugList','validateMedication','routeOptions','addInvestigation'),
				'roles' => array('OprnEditMedication'),
			)
		),parent::accessRules());
	}

	/**
	* use the split event type javascript and styling
	*
	* @param CAction $action
	* @return bool
	*/
	protected function beforeAction($action)
	{
		Yii::app()->assetManager->registerScriptFile('js/spliteventtype.js', null, null, AssetManager::OUTPUT_SCREEN);
		return parent::beforeAction($action);
	}

	protected function setElementDefaultOptions_Element_OphCiAnaestheticassessment_MedicalHistoryReview($element, $action)
	{
		if ($action == 'create') {
			$medications = array();

			foreach ($this->patient->medications as $medication) {
				$_medication = new OphCiAnaestheticassessment_Medical_History_Medication;

				foreach (array('drug_id','route_id','option_id','frequency_id','start_date') as $field) {
					$_medication->$field = $medication->$field;
				}

				$medications[] = $_medication;
			}

			$element->medications = $medications;
		}
	}

	protected function setComplexAttributes_Element_OphCiAnaestheticassessment_MedicalHistoryReview($element, $data, $index)
	{
		$medications = array();

		if (!empty($data['medication_history_drug_ids'])) {
			foreach ($data['medication_history_drug_ids'] as $i => $drug_id) {
				$medication = new OphCiAnaestheticassessment_Medical_History_Medication;
				$medication->drug_id = $drug_id;
				$medication->route_id = $data['medication_history_route_ids'][$i];
				$medication->option_id = $data['medication_history_option_ids'][$i];
				$medication->frequency_id = $data['medication_history_frequency_ids'][$i];
				$medication->start_date = $data['medication_history_start_dates'][$i];

				$medications[] = $medication;
			}
		}

		$element->medications = $medications;

		$surgery_assignments = array();

		if (!empty($data['OphCiAnaestheticassessment_Medical_History_Surgery_Assignment']['item_id'])) {
			foreach ($data['OphCiAnaestheticassessment_Medical_History_Surgery_Assignment']['item_id'] as $i => $item_id) {
				$item = new OphCiAnaestheticassessment_Medical_History_Surgery_Assignment;
				$item->item_id = $item_id;
				$item->year = $data['OphCiAnaestheticassessment_Medical_History_Surgery_Assignment']['year'][$i];
				$item->comments = $data['OphCiAnaestheticassessment_Medical_History_Surgery_Assignment']['comments'][$i];

				$surgery_assignments[] = $item;
			}
		}

		$element->surgery_assignments = $surgery_assignments;
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_MedicalHistoryReview($element, $data, $index)
	{
		if (empty($data['medication_history_drug_ids'])) {
			$element->updateMedications();
		} else {
			$element->updateMedications($data['medication_history_medication_ids'],$data['medication_history_drug_ids'],$data['medication_history_route_ids'],$data['medication_history_option_ids'],$data['medication_history_frequency_ids'],$data['medication_history_start_dates']);
		}

		$ids = array();

		foreach ($element->surgery_assignments as $item) {
			$item->element_id = $element->id;

			if (!$item->save()) {
				throw new Exception("Unable to save medical history surgery item: ".print_r($item->errors,true));
			}

			$ids[] = $item->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :eid');
		$criteria->params[':eid'] = $element->id;

		if (!empty($ids)) {
			$criteria->addNotInCondition('id',$ids);
		}

		OphCiAnaestheticassessment_Medical_History_Surgery_Assignment::model()->deleteAll($criteria);
	}

	public function actionAddInvestigation()
	{
		$investigation = new OphCiAnaestheticassessment_Investigations_Investigation;
		$this->renderPartial('_investigation_row',array('investigation' => $investigation, 'edit' => true));
	}

	protected function setComplexAttributes_Element_OphCiAnaestheticassessment_Investigations($element, $data, $index)
	{
		$investigations = array();

		if (!empty($data['investigation_ids'])) {
			foreach ($data['investigation_ids'] as $i => $investigation_id) {
				$investigation = new OphCiAnaestheticassessment_Investigations_Investigation;
				$investigation->id = $data['investigation_row_ids'][$i];
				$investigation->investigation_id = $investigation_id;
				$investigation->investigation_text = $data['investigation_text'][$i];
				$investigation->ordered = $data['ordered'][$i];
				$investigation->reviewed = $data['reviewed'][$i];
				$investigation->result = $data['result'][$i];

				$investigations[] = $investigation;
			}
		}

		$element->investigations = $investigations;
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_Investigations($element, $data, $index)
	{
		if (empty($data['investigation_row_ids'])) {
			$element->updateInvestigations();
		} else {
			$element->updateInvestigations($data['investigation_row_ids'],$data['investigation_ids'],$data['investigation_text'],$data['ordered'],$data['reviewed'],$data['result']);
		}
	}

	public function actionRiskProphylaxis()
	{
		$element = new Element_OphCiAnaestheticassessment_DvtAssessment;

		$element->risk_factors = $_POST['Element_OphCiAnaestheticassessment_DvtAssessment']['risk_factors'];

		echo json_encode(array(
			'riskLevel' => $element->riskLevel,
			'riskLevelColour' => $element->riskLevelColour,
			'prophylaxisRequired' => $element->prophylaxisRequired,
			'riskText' => $element->riskLevel.' ('.$element->riskScore.' point'.($element->riskScore == 1 ? '' : 's').')',
		));
	}

	public function getOpenBookings()
	{
		if ($api = Yii::app()->moduleAPI->get('OphTrOperationbooking')) {
			return $api->getOpenBookingsForPatient($this->episode->patient_id);
		}

		throw new Exception("OphTrOperationbooking API not available");
	}

	public function actionValidateSurgery()
	{
		$surgery = new OphCiAnaestheticassessment_Medical_History_Surgery_Assignment;
		$surgery->attributes = $_POST;
		$surgery->patient_id = @$_POST['patient_id'];

		$surgery->validate();

		$errors = array();

		foreach ($surgery->errors as $field => $error) {
			$errors[$field] = $error[0];
		}

		if (empty($errors)) {
			$errors['row'] = $this->renderPartial('_surgery_row',array('item' => $surgery, 'i' => $_POST['i'], 'edit' => true),true);
		}

		echo json_encode($errors);
	}

	public function actionInstructionList()
	{
		if (!$category = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category::model()->findByPk(@$_GET['category_id'])) {
			throw new Exception("Category not found: ".@$_GET['category_id']);
		}

		$element = new Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation;
		$element->instruction_category_id = $category->id;

		$form = new BaseEventTypeCActiveForm;
		$form->multiSelectList($element,'instructions','instructions','instruction_id',CHtml::listData($element->instructionsForCategory,'id','name'),array(),array('empty' => '- Please select -','label' => $element->instruction_category ? $element->instruction_category->name : ''),!$element->instruction_category,false,null,false,false,array('label'=>3,'field'=>6));
	}

	protected function setElementDefaultOptions_Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation($element, $action)
	{
		if ($action == 'create') {
			if ($this->patient->isChild()) {
				$element->instruction_category_id = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category::model()->find('name=?',array('Peds General Anesthesia'))->id;
			} else {
				$element->instruction_category_id = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category::model()->find('name=?',array('Adult General Anesthesia'))->id;
			}
		}
	}
	
	protected function setComplexAttributes_Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation($element, $data, $index)
	{
		$procedure_assignments = array();
		$procedures = array();

		if (!empty($data['Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation']['procedures'])) {
			foreach ($data['Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation']['procedures'] as $i => $procedure_id) {
				if (!$procedure = Procedure::model()->findByPk($procedure_id)) {
					throw new Exception("Procedure not found: $procedure_id");
				}

				if (!@$data['Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation']['assignments'][$i] ||
					!($assignment = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Procedure::model()->findByPk($data['Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation']['assignments'][$i]))) {
					$assignment = new OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Procedure;
				}
				$assignment->procedure_id = $procedure_id;
				$assignment->eye_id = @$data['Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation']['eyes'][$i];
				$procedure_assignments[] = $assignment;
				$procedures[] = $procedure;
			}
		}

		$element->procedure_assignments = $procedure_assignments;
		$element->procedures = $procedures;
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation($element, $data, $index)
	{
		$ids = array();

		foreach ($element->procedure_assignments as $assignment) {
			$assignment->element_id = $element->id;

			if (!$assignment->save()) {
				throw new Exception("Unable to save procedure assignment: ".print_r($assignment->errors,true));
			}

			$ids[] = $assignment->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id=:eid');
		$criteria->params[':eid'] = $element->id;

		if (!empty($ids)) {
			$criteria->addNotInCondition('id',$ids);
		}

		OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Procedure::model()->deleteAll($criteria);
	}
}
