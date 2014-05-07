<?php

class DefaultController extends BaseEventTypeController
{
	protected $booking_operation;
	protected $unbooked = false;
	protected $booking_procedures;

	static protected $action_types = array(
		'drugList' => self::ACTION_TYPE_FORM,
		'validateMedication' => self::ACTION_TYPE_FORM,
		'routeOptions' => self::ACTION_TYPE_FORM,
		'addInvestigation' => self::ACTION_TYPE_FORM,
		'riskProphylaxis' => self::ACTION_TYPE_FORM,
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

	protected function initActionCreate()
	{
		parent::initActionCreate();

		if (isset($_GET['booking_event_id'])) {
			if (!$api = Yii::app()->moduleAPI->get('OphTrOperationbooking')) {
				throw new Exception('invalid request for booking event');
			}
			if (!$this->booking_operation = $api->getOperationForEvent($_GET['booking_event_id'])) {
				throw new Exception('booking event not found');
			}
		}
		elseif (isset($_GET['unbooked'])) {
			$this->unbooked = true;
		}
	}

	public function actionCreate()
	{
		$errors = array();

		if (!empty($_POST)) {
			if (preg_match('/^booking([0-9]+)$/',@$_POST['SelectBooking'],$m)) {
				$this->redirect(array('/OphCiAnaestheticassessment/Default/create?patient_id='.$this->patient->id.'&booking_event_id='.$m[1]));
			}

			$errors = array('Operation' => array('Please select a booked operation'));
		}

		if ($this->booking_operation || $this->unbooked) {
			parent::actionCreate();
		} else {
			// set up form for selecting a booking for the Op note
			$bookings = array();

			if ($api = Yii::app()->moduleAPI->get('OphTrOperationbooking')) {
				$operations = $api->getOperationsForEpisode($this->episode->id);
			}

			$this->title = !empty($operations) ? 'Please select operation' : 'No operations created';
			$this->event_tabs = array(
				array(
					'label' => !empty($operations) ? 'Select an operation' : 'No operations created',
					'active' => true,
				),
			);
			$cancel_url = ($this->episode) ? '/patient/episode/'.$this->episode->id : '/patient/episodes/'.$this->patient->id;
			$this->event_actions = array(
				EventAction::link('Cancel',
					Yii::app()->createUrl($cancel_url),
					null, array('class' => 'button small warning')
				)
			);

			$this->render('select_event',array(
				'errors' => $errors,
				'operations' => $operations,
			));
		}
	}

	protected function setElementDefaultOptions_Element_OphCiAnaestheticassessment_ProcedureAndSiteVerification($element, $action)
	{
		if ($action == 'create') {
			if (!$api = Yii::app()->moduleAPI->get('OphTrOperationbooking')) {
				throw new Exception("Unable to activate operation booking api");
			}

			if (!$procedures = $api->getProceduresForOperation($_GET['booking_event_id'])) {
				throw new Exception("Procedures not found for operation booking event: ".$_GET['booking_event_id']);
			}

			$_procedures = array();

			foreach ($procedures as $procedure) {
				$assignment = new OphCiAnaestheticassessment_Procedures_Procedure_Assignment;
				$assignment->element_id = $element->id;
				$assignment->proc_id = $procedure->id;
				$assignment->procedure = $procedure;

				$_procedures[] = $assignment;
			}

			$element->procedures = $_procedures;

			$eye = $api->getEyeForOperation($_GET['booking_event_id']);

			$element->eye_id = $eye->id;
			$element->eye = $eye;
		}
	}

	protected function setComplexAttributes_Element_OphCiAnaestheticassessment_ProcedureAndSiteVerification($element, $data, $index)
	{
		$procedures = array();

		if (!empty($data['Element_OphCiAnaestheticassessment_ProcedureAndSiteVerification']['procedure_id'])) {
			foreach ($data['Element_OphCiAnaestheticassessment_ProcedureAndSiteVerification']['procedure_id'] as $procedure_id) {
				$assignment = new OphCiAnaestheticassessment_Procedures_Procedure_Assignment;
				$assignment->proc_id = $procedure_id;
				$assignment->procedure = Procedure::model()->findByPk($procedure_id);

				$procedures[] = $assignment;
			}
		}

		$element->procedures = $procedures;
		$element->site_id = $data['Element_OphCiAnaestheticassessment_ProcedureAndSiteVerification']['site_id'];
		$element->site = Site::model()->findByPk($element->site_id);
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_ProcedureAndSiteVerification($element, $data, $index)
	{
		$element->updateProcedures($data['Element_OphCiAnaestheticassessment_ProcedureAndSiteVerification']['procedure_id']);
	}

	protected function setComplexAttributes_Element_OphCiAnaestheticassessment_Examination($element, $data, $index)
	{
		$teeth = array();

		if (!empty($data['MultiSelect_teeth'])) {
			foreach ($data['MultiSelect_teeth'] as $teeth_id) {
				$teeth[] = OphCiAnaestheticassessment_Examination_Teeth::model()->findByPk($teeth_id);
			}
		}

		$dental = array();

		if (!empty($data['MultiSelect_dental'])) {
			foreach ($data['MultiSelect_dental'] as $dental_id) {
				$dental[] = OphCiAnaestheticassessment_Examination_Dental::model()->findByPk($dental_id);
			}
		}

		$element->teeths = $teeth;
		$element->dentals = $dental;
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_Examination($element, $data, $index)
	{
		$element->updateTeeth($data['MultiSelect_teeth']);
		$element->updateDental($data['MultiSelect_dental']);
	}

	protected function setComplexAttributes_Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation($element, $data, $index)
	{
		$speceds = array();

		if (!empty($data['MultiSelect_speced_id'])) {
			foreach ($data['MultiSelect_speced_id'] as $speced_id) {
				$speceds[] = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_SpecedId::model()->findByPk($speced_id);
			}
		}

		$element->speced_ids = $speceds;

		$diabetes_items = array();

		if (!empty($data['MultiSelect_Diabetes'])) {
			foreach ($data['MultiSelect_Diabetes'] as $item_id) {
				$diabetes_items[] = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Diabetes::model()->findByPk($item_id);
			}
		}

		$element->diabetes_items = $diabetes_items;
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation($element, $data, $index)
	{
		$element->updateSpeceds($data['MultiSelect_speced_id']);
		$element->updateMultiSelectData('OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Diabetes_Assignment',empty($data['MultiSelect_Diabetes']) ? array() : $data['MultiSelect_Diabetes'],'item_id');
	}

	public function actionUpdate($id)
	{
		parent::actionUpdate($id);
	}

	public function actionView($id)
	{
		parent::actionView($id);
	}

	public function actionPrint($id)
	{
		parent::actionPrint($id);
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

			$allergies = array();

			foreach ($this->patient->allergies as $allergy) {
				$_allergy = new OphCiAnaestheticassessment_Medical_History_Allergy;
				$_allergy->allergy_id = $allergy->id;

				$allergies[] = $_allergy;
			}

			$element->allergies = $allergies;
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

		$allergies = array();

		if (!empty($data['allergies_allergies'])) {
			foreach ($data['allergies_allergies'] as $i => $allergy_id) {
				$allergy = new OphCiAnaestheticassessment_Medical_History_Allergy;
				$allergy->allergy_id = $allergy_id;

				$allergies[] = $allergy;
			}
		}

		$element->allergies = $allergies;
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_MedicalHistoryReview($element, $data, $index)
	{
		if (empty($data['medication_history_drug_ids'])) {
			$element->updateMedications();
		} else {
			$element->updateMedications($data['medication_history_medication_ids'],$data['medication_history_drug_ids'],$data['medication_history_route_ids'],$data['medication_history_option_ids'],$data['medication_history_frequency_ids'],$data['medication_history_start_dates']);
		}

		$element->updateAllergies(empty($data['allergies_allergies']) ? array() : $data['allergies_allergies']);
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

	protected function setComplexAttributes_Element_OphCiAnaestheticassessment_DvtAssessment($element, $data, $index)
	{
		$exclusion_factors = array();

		if (!empty($data['MultiSelect_ExclusionFactors'])) {
			foreach ($data['MultiSelect_ExclusionFactors'] as $i => $exclusion_factor_id) {
				$exclusion_factors[] = OphCiAnaestheticassessment_DVT_Exclusion_Factor::model()->findByPk($exclusion_factor_id);
			}
		}

		$element->exclusion_factors = $exclusion_factors;

		$risk_factors_a = array();
		$risk_factors_b = array();

		if (!empty($data['MultiSelect_RiskFactors_A']) && empty($data['MultiSelect_ExclusionFactors'])) {
			foreach ($data['MultiSelect_RiskFactors_A'] as $i => $risk_factor_id) {
				$risk_factors_a[] = OphCiAnaestheticassessment_DVT_Risk_Factor::model()->findByPk($risk_factor_id);
			}
		}

		if (!empty($data['MultiSelect_RiskFactors_B']) && empty($data['MultiSelect_ExclusionFactors'])) {
			foreach ($data['MultiSelect_RiskFactors_B'] as $i => $risk_factor_id) {
				$risk_factors_b[] = OphCiAnaestheticassessment_DVT_Risk_Factor::model()->findByPk($risk_factor_id);
			}
		}

		$element->risk_factors_a = $risk_factors_a;
		$element->risk_factors_b = $risk_factors_b;

		$stocking_contraindications = array();

		if (!empty($data['MultiSelect_stocking_contraindications']) && empty($data['MultiSelect_ExclusionFactors'])) {
			foreach ($data['MultiSelect_stocking_contraindications'] as $i => $contraindication_id) {
				$stocking_contraindications[] = OphCiAnaestheticassessment_DVT_Stocking_Contraindication::model()->findByPk($contraindication_id);
			}
		}

		$element->stocking_contraindications = $stocking_contraindications;

		$heparin_contraindications = array();

		if (!empty($data['MultiSelect_heparin_contraindications']) && empty($data['MultiSelect_ExclusionFactors'])) {
			foreach ($data['MultiSelect_heparin_contraindications'] as $i => $contraindication_id) {
				$heparin_contraindications[] = OphCiAnaestheticassessment_DVT_Heparin_Contraindication::model()->findByPk($contraindication_id);
			}
		}

		$element->heparin_contraindications = $heparin_contraindications;
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_DvtAssessment($element, $data, $index)
	{
		$element->updateExclusionFactors(empty($data['MultiSelect_ExclusionFactors']) ? array() : $data['MultiSelect_ExclusionFactors']);
		$element->updateRiskFactors(empty($data['MultiSelect_RiskFactors']) ? array() : $data['MultiSelect_RiskFactors']);
		$element->updateStockingContraindications(empty($data['MultiSelect_stocking_contraindications']) ? array() : $data['MultiSelect_stocking_contraindications']);
		$element->updateHeparinContraindications(empty($data['MultiSelect_heparin_contraindications']) ? array() : $data['MultiSelect_heparin_contraindications']);
	}

	public function actionRiskProphylaxis()
	{
		$element = new Element_OphCiAnaestheticassessment_DvtAssessment;

		$this->setComplexAttributes_Element_OphCiAnaestheticassessment_DvtAssessment($element, $_POST, 0);

		echo json_encode(array(
			'riskLevel' => $element->riskLevel,
			'riskLevelColour' => $element->riskLevelColour,
			'prophylaxisRequired' => $element->prophylaxisRequired,
		));
	}

	protected function setComplexAttributes_Element_OphCiAnaestheticassessment_Patient($element, $data, $index)
	{
		$identifiers = array();

		if (!empty($data['MultiSelect_identifiers'])) {
			foreach ($data['MultiSelect_identifiers'] as $identifier_id) {
				$assignment = new OphCiAnaestheticassessment_Patient_Identifier_Assignment;
				$assignment->identifier_id = $identifier_id;

				$identifiers[] = $assignment;
			}
		}

		$element->identifiers = $identifiers;
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_Patient($element, $data, $index)
	{
		$element->updateMultiSelectData('OphCiAnaestheticassessment_Patient_Identifier_Assignment',empty($data['MultiSelect_identifiers']) ? array() : $data['MultiSelect_identifiers'],'identifier_id');
	}
}
