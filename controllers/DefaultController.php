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
		'validateInstructionitem' => self::ACTION_TYPE_FORM,
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
			$element->updateMedications(
				$data['medication_history_medication_ids'],
				$data['medication_history_drug_ids'],
				$data['medication_history_route_ids'],
				$data['medication_history_option_ids'],
				$data['medication_history_frequency_ids'],
				$data['medication_history_start_dates']
			);
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

		$item = new OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item;
		$item->category_id = $category->id;

		$this->widget('application.widgets.MultiSelectList', array(
			'field' => 'instructions',
			'options' => CHtml::listData($item->instructionsForCategory,'id','name'),
			'htmlOptions' => array(
				'empty' => '- Please select -',
				'nowrapper' => true,
			),
			'input_class' => 'recordInput',
		));
	}

	protected function setComplexAttributes_Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation($element, $data, $index)
	{
		$items = array();

		if (!empty($data['OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item'])) {
			foreach ($data['OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item'] as $data_item) {
				if (!$data_item['id'] || !($item = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item::model()->findByPk($data_item['id']))) {
					$item = new OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item;
				}

				$item->category_id = $data_item['category_id'];

				$bookings = array();

				foreach ($data_item['booking_event_id'] as $booking_event_id) {
					if (!$booking_event_id['id'] || !($operation = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item_Operation::model()->findByPk($booking_event_id['id']))) {
						$operation = new OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item_Operation;
					}
					$operation->booking_event_id = $booking_event_id['booking_event_id'];

					$bookings[] = $operation;
				}

				$item->bookings = $bookings;

				$instructions = array();
				$_instructions = array();

				foreach ($data_item['instruction_id'] as $instruction_id) {
					if (!$instruction_id['id'] || !($instruction = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item_Instruction::model()->findByPk($instruction_id['id']))) {
						$instruction = new OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item_Instruction;
					}

					$instruction->instruction_id = $instruction_id['instruction_id'];

					$instructions[] = $instruction;

					$_instructions[] = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions::model()->findByPk($instruction_id['instruction_id']);
				}

				$item->instruction_assignments = $instructions;
				$item->instructions = $_instructions;

				$items[] = $item;
			}
		}

		$element->items = $items;
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation($element, $data, $index)
	{
		$ids = array();

		foreach ($element->items as $item) {
			$item->element_id = $element->id;

			if (!$item->save()) {
				throw new Exception("Unable to save patient instruction item: ".print_r($item->errors,true));
			}

			$operation_ids = array();

			foreach ($item->bookings as $operation) {
				$operation->item_id = $item->id;

				if (!$operation->save()) {
					throw new Exception("Unable to save booking assignment: ".print_r($operation->errors,true));
				}

				$operation_ids[] = $operation->id;
			}

			$criteria = new CDbCriteria;
			$criteria->addCondition('item_id = :ii');
			$criteria->params[':ii'] = $item->id;

			if (!empty($operation_ids)) {
				$criteria->addNotInCondition('id',$operation_ids);
			}

			OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item_Operation::model()->deleteAll($criteria);

			$instruction_ids = array();

			foreach ($item->instruction_assignments as $assignment) {
				$assignment->item_id = $item->id;

				if (!$assignment->save()) {
					throw new Exception("Unable to save instruction assignment: ".print_r($assignment->errors,true));
				}

				$instruction_ids[] = $assignment->id;
			}

			$criteria = new CDbCriteria;
			$criteria->addCondition('item_id = :ii');
			$criteria->params[':ii'] = $item->id;

			if (!empty($instruction_ids)) {
				$criteria->addNotInCondition('id',$instruction_ids);
			}

			OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item_Instruction::model()->deleteAll($criteria);

			$ids[] = $item->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :eid');
		$criteria->params[':eid'] = $element->id;

		if (!empty($ids)) {
			$criteria->addNotInCondition('id',$ids);
		}

		foreach (OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item::model()->findAll($criteria) as $item) {
			foreach ($item->instruction_assignments as $assignment) {
				if (!$assignment->delete()) {
					throw new Exception("Unable to delete instruction assignment: ".print_r($assignment->errors,true));
				}
			}

			foreach ($item->bookings as $operation) {
				if (!$operation->delete()) {
					throw new Exception("Unable to remove booking assignment: ".print_r($operation->errors,true));
				}
			}

			if (!$item->delete()) {
				throw new Exception("Unable to remove item: ".print_r($item->errors,true));
			}
		}
	}

	public function actionValidateInstructionItem()
	{
		$instruction = new OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item;
		$instruction->category_id = $_POST['category_id'];

		$operations = array();

		if (!empty($_POST['booking_event_id'])) {
			foreach ($_POST['booking_event_id'] as $event_id) {
				$operation = new OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item_Operation;
				$operation->booking_event_id = $event_id;

				$operations[] = $operation;
			}
		}

		$instruction->bookings = $operations;

		$instructions = array();
		$_instructions = array();

		if (!empty($_POST['instructions'])) {
			foreach ($_POST['instructions'] as $instruction_id) {
				if (!$_instruction = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions::model()->findByPk($instruction_id)) {
					throw new Exception("Instruction not found: $instruction_id");
				}

				$__instruction = new OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item_Instruction;
				$__instruction->instruction_id = $instruction_id;

				$instructions[] = $__instruction;
				$_instructions[] = $_instruction;
			}
		}

		$instruction->instructions = $_instructions;
		$instruction->instruction_assignments = $instructions;

		$instruction->validate();

		$errors = array();

		foreach ($instruction->errors as $field => $error) {
			$errors[$field] = $error[0];
		}

		if (empty($errors)) {
			$errors['row'] = $this->renderPartial('_instruction_row',array('item' => $instruction, 'i' => $_POST['i'], 'edit' => true),true);
		}

		echo json_encode($errors);
	}
}
