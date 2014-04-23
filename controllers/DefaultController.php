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
	);

	public function accessRules()
	{
		return array_merge(array(
			array('allow',
				'actions' => array('drugList','validateMedication','routeOptions'),
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
				$bookings = $api->getOpenBookingsForEpisode($this->episode->id);
			}

			$this->title = !empty($bookings) ? 'Please select booking' : 'No bookings created';
			$this->event_tabs = array(
				array(
					'label' => !empty($bookings) ? 'Select a booking' : 'No bookings created',
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
				'bookings' => $bookings,
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

			$site = $api->findSiteForBookingEvent(Event::model()->findByPk($_GET['booking_event_id']));

			$element->site_id = $site->id;
			$element->site = $site;
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
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation($element, $data, $index)
	{
		$element->updateSpeceds($data['MultiSelect_speced_id']);
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

	public function actionDrugList()
	{
		if (Yii::app()->request->isAjaxRequest) {
			$criteria = new CDbCriteria();
			if (isset($_GET['term']) && $term = $_GET['term']) {
				$criteria->addCondition(array('LOWER(name) LIKE :term', 'LOWER(aliases) LIKE :term'), 'OR');
				$params[':term'] = '%' . strtolower(strtr($term, array('%' => '\%'))) . '%';
			}
			$criteria->order = 'name';
			$criteria->params = $params;
			$drugs = Drug::model()->findAll($criteria);
			$return = array();
			foreach ($drugs as $drug) {
				$return[] = array(
						'label' => $drug->tallmanlabel,
						'value' => $drug->tallman,
						'id' => $drug->id,
				);
			}
			echo CJSON::encode($return);
		}
	}

	public function actionValidateMedication()
	{
		$medication = new OphCiAnaestheticassessment_Medical_History_Medication;
		$medication->attributes = Helper::convertNHS2MySQL($_POST);

		$errors = array();

		if (!$medication->validate()) {
			foreach ($medication->getErrors() as $error) {
				$errors[] = $error[0];
			}
		}

		if (!empty($errors)) {
			echo json_encode(array(
				'status' => 'error',
				'errors' => $errors,
			));
		} else {
			echo json_encode(array(
				'status' => 'ok',
				'row' => $this->renderPartial('_medication_row',array('medication' => $medication,'i' => @$_POST['i'], 'edit' => true),true),
			));
		}
	}

	public function actionRouteOptions()
	{
		if (!$route = DrugRoute::model()->findByPk(@$_GET['route_id'])) {
			throw new Exception("Route not found: ".@$_GET['route_id']);
		}

		echo '<option value="">- Select -</option>';

		foreach (DrugRouteOption::model()->findAll(array('order'=>'id asc','condition' => 'drug_route_id=?','params' => array($route->id))) as $option) {
			echo '<option value="'.$option->id.'">'.$option->name.'</option>';
		}
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

		if (!empty($data['drug_ids'])) {
			foreach ($data['drug_ids'] as $i => $drug_id) {
				$medication = new OphCiAnaestheticassessment_Medical_History_Medication;
				$medication->drug_id = $drug_id;
				$medication->route_id = $data['route_ids'][$i];
				$medication->option_id = $data['option_ids'][$i];
				$medication->frequency_id = $data['frequency_ids'][$i];
				$medication->start_date = $data['start_dates'][$i];

				$medications[] = $medication;
			}
		}

		$element->medications = $medications;
	}

	protected function saveComplexAttributes_Element_OphCiAnaestheticassessment_MedicalHistoryReview($element, $data, $index)
	{
		if (empty($data['drug_ids'])) {
			$element->updateMedications();
		} else {
			$element->updateMedications($data['medication_ids'],$data['drug_ids'],$data['route_ids'],$data['option_ids'],$data['frequency_ids'],$data['start_dates']);
		}
	}
}
