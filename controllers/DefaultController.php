<?php

class DefaultController extends BaseEventTypeController
{
	protected $booking_operation;
	protected $unbooked = false;
	protected $booking_procedures;

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

			$element->procedures = $procedures;

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
				$procedures[] = Procedure::model()->findByPk($procedure_id);
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
}
