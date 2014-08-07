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
?>
<div class="element-fields">
	<div id="div_Element_OphCiAnaestheticassessment_Examination_weight_kg" class="row field-row">
		<div class="large-3 column">
			<label for="Element_OphCiAnaestheticassessment_Examination_weight_kg">
				Weight:
			</label>
		</div>
		<div class="large-2 column">
			<?php echo $form->weightMeasurement($element, array('class' => 'smallInput', 'nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
		</div>
		<div class="large-2 column">
			<?php echo $form->textField($element, 'weight_lb', array('class' => 'smallInput', 'nowrapper' => true, 'append-text' => 'lbs'), array(), array('label' => 3, 'field' => 4))?>
		</div>
		<div class="large-2 column">
			<label for="Element_OphCiAnaestheticassessment_Examination_weight_calculation_id">
				<?php echo $element->getAttributeLabel('weight_calculation_id')?>:
			</label>
		</div>
		<div class="large-2 column end">
			<?php echo $form->dropDownList($element, 'weight_calculation_id', CHtml::listData(OphCiAnaestheticassessment_Examination_WeightCalculation::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -','nowrapper' => true),false,array('label' => 3, 'field' => 4))?>
		</div>
	</div>
	<div id="div_Element_OphCiAnaestheticassessment_Examination_height_cm" class="row field-row">
		<div class="large-3 column">
			<label for="Element_OphCiAnaestheticassessment_Examination_height_cm">
				Height:
			</label>
		</div>
		<div class="large-2 column">
			<?php echo $form->heightMeasurement($element, array('class' => 'smallInput', 'nowrapper' => true), array('label' => 3, 'field' => 4))?>
		</div>
		<div class="large-2 column">
			<?php echo $form->textField($element, 'height_ft', array('nowrapper' => true, 'append-text' => 'ft'), array(), array('label' => 3, 'field' => 4))?>
			<?php echo $form->textField($element, 'height_in', array('nowrapper' => true, 'append-text' => 'in'), array(), array('label' => 3, 'field' => 4))?>
		</div>
		<div class="large-2 column">
			<label for="Element_OphCiAnaestheticassessment_Examination_height_calculation_id">
				<?php echo $element->getAttributeLabel('height_calculation_id')?>:
			</label>
		</div>
		<div class="large-2 column end">
			<?php echo $form->dropDownList($element, 'height_calculation_id', CHtml::listData(OphCiAnaestheticassessment_Examination_WeightCalculation::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -','nowrapper' => true),false,array('label' => 3, 'field' => 4))?>
		</div>
	</div>
	<?php echo $form->bmiMeasurement($element, array(), array('label' => 3, 'field' => 2))?>
	<?php echo $form->bloodPressureMeasurement($element, array('label' => 'Blood pressure'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->pulseMeasurement($element, array(), array('label' => 3, 'field' => 2))?>
	<?php echo $form->temperatureMeasurement($element, array(), array('label' => 3, 'field' => 2))?>
	<?php echo $form->respiratoryRateMeasurement($element, array(), array('label' => 3, 'field' => 2))?>
	<?php echo $form->sao2Measurement($element, array(), array('label' => 3, 'field' => 2))?>
	<?php echo $form->airwayClassMeasurement($element, array('empty' => '- Please select -'), array('label' => 3, 'field' => 2))?>
	<div id="div_Element_OphNuPreoperative_BaselineObservations_blood_glucose" class="row field-row">
		<div class="large-3 column">
			<label for="Element_OphNuPreoperative_BaselineObservations_blood_glucose">
				<?php echo $element->getAttributeLabel('blood_glucose_m')?>:
			</label>
		</div>
		<div class="large-1 column">
			<?php echo $form->bloodGlucoseMeasurement($element, array('nowrapper' => true,'disabled' => $element->blood_glucose_na ? 'disabled' : ''), array('label' => 3, 'field' => 1))?>
		</div>
		<div class="large-2 column end">
			<?php echo $form->checkBox($element, 'blood_glucose_na', array('nowrapper' => true))?>
		</div>
	</div>
	<?php echo $form->textField($element, 'heart', array(), array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'lungs', array(), array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'abdomen', array(), array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'teeths', 'teeths', 'teeth_id', CHtml::listData(OphCiAnaestheticassessment_Examination_Teeth::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Teeth'),false,false,null,false,false,array('label' => 3, 'field' => 4),false,'No foreseen issues')?>
</div>
