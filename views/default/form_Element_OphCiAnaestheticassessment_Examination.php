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

<section class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name; ?></h3>
	</header>

	<div class="element-fields">
		<div id="div_Element_OphCiAnaestheticassessment_Examination_weight_kg" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphCiAnaestheticassessment_Examination_weight_kg">
					Weight:
				</label>
			</div>
			<div class="large-2 column">
				<?php echo $form->textField($element, 'weight_kg', array('class' => 'smallInput', 'nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				<span class="metric">kg</span>
			</div>
			<div class="large-2 column">
				<?php echo $form->textField($element, 'weight_lb', array('class' => 'smallInput', 'nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				<span class="metric">lbs</span>
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
				<?php echo $form->textField($element, 'height_cm', array('class' => 'smallInput', 'nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				<span class="metric">cm</span>
			</div>
			<div class="large-2 column">
				<?php echo $form->textField($element, 'height_ft', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				<span class="metric">ft</span>
				<?php echo $form->textField($element, 'height_in', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				<span class="metric">in</span>
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
		<div id="div_Element_OphCiAnaestheticassessment_Examination_bmi" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphCiAnaestheticassessment_Examination_bmi">
					<?php echo $element->getAttributeLabel('bmi')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'bmi', array('class' => 'smallInput', 'nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">kg/m^2</span>
			</div>
		</div>
		<div id="div_Element_OphCiAnaestheticassessment_Examination_bp_systolic" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphCiAnaestheticassessment_Examination_bp_systolic">
					Blood pressure:
				</label>
			</div>
			<div class="large-4 column end">
				<?php echo $form->textField($element, 'bp_systolic', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				<span class="metric">/</span>
				<?php echo $form->textField($element, 'bp_diastolic', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
				<span class="metric">mmHg</span>
			</div>
		</div>
		<div id="div_Element_OphCiAnaestheticassessment_Examination_heart_rate_pulse" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphCiAnaestheticassessment_Examination_heart_rate_pulse">
					<?php echo $element->getAttributeLabel('heart_rate_pulse')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'heart_rate_pulse', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">bpm</span>
			</div>
		</div>
		<div id="div_Element_OphCiAnaestheticassessment_Examination_temperature" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphCiAnaestheticassessment_Examination_temperature">
					<?php echo $element->getAttributeLabel('temperature')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'temperature', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">C</span>
			</div>
		</div>
		<div id="div_Element_OphCiAnaestheticassessment_Examination_respiratory_rate" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphCiAnaestheticassessment_Examination_respiratory_rate">
					<?php echo $element->getAttributeLabel('respiratory_rate')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'respiratory_rate', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">insp/min</span>
			</div>
		</div>
		<div id="div_Element_OphCiAnaestheticassessment_Examination_sao2" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphCiAnaestheticassessment_Examination_sao2">
					<?php echo $element->getAttributeLabel('sao2')?>:
				</label>
			</div>
			<div class="large-2 column end">
				<?php echo $form->textField($element, 'sao2', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
				<span class="metric">%</span>
			</div>
		</div>
		<?php echo $form->dropDownList($element, 'airway_class_id', CHtml::listData(OphCiAnaestheticassessment_Examination_AirwayClass::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'),false,array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'blood_glucose', array(), array(), array('label' => 3, 'field' => 1))?>
		<?php echo $form->textField($element, 'heart', array(), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'lungs', array(), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'abdomen', array(), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->multiSelectList($element, 'MultiSelect_teeth', 'teeths', 'ophcianassessment_examination_teeth_id', CHtml::listData(OphCiAnaestheticassessment_Examination_Teeth::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Teeth'),false,false,null,false,false,array('label' => 3, 'field' => 4),false,'No foreseen issues')?>
	</div>
</section>
