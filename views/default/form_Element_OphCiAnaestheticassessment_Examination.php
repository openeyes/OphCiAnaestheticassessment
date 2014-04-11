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
			<?php echo $form->textField($element, 'weight', array('size' => '10'))?>
	<?php echo $form->textArea($element, 'lbs', array('rows' => 6, 'cols' => 80))?>
	<?php echo $form->dropDownList($element, 'weight_calculation_id', CHtml::listData(OphCiAnaestheticassessment_Examination_WeightCalculation::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<?php echo $form->textField($element, 'height', array('size' => '10'))?>
	<?php echo $form->textField($element, 'ft', array('size' => '10'))?>
	<?php echo $form->textField($element, 'in', array('size' => '10'))?>
	<?php echo $form->dropDownList($element, 'height_calculation_id', CHtml::listData(OphCiAnaestheticassessment_Examination_HeightCalculation::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<?php echo $form->textField($element, 'bmi', array('size' => '10'))?>
	<?php echo $form->textField($element, 'blood_pressure', array('size' => '10'))?>
	<?php echo $form->textField($element, 'mmhg', array('size' => '10'))?>
	<?php echo $form->textField($element, 'heart_rate_pulse', array('size' => '10'))?>
	<?php echo $form->textField($element, 'temperature', array('size' => '10'))?>
	<?php echo $form->textField($element, 'respiratory_rate', array('size' => '10'))?>
	<?php echo $form->textField($element, 'sao2', array('size' => '10'))?>
	<?php echo $form->dropDownList($element, 'airway_class_id', CHtml::listData(OphCiAnaestheticassessment_Examination_AirwayClass::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<?php echo $form->textField($element, 'blood_glucose', array('size' => '10'))?>
	<?php echo $form->textField($element, 'heart', array('size' => '10'))?>
	<?php echo $form->textField($element, 'lungs', array('size' => '10'))?>
	<?php echo $form->textField($element, 'abdomen', array('size' => '10'))?>
	<?php echo $form->multiSelectList($element, 'MultiSelect_teeth', 'teeths', 'ophcianassessment_examination_teeth_id', CHtml::listData(OphCiAnaestheticassessment_Examination_Teeth::model()->findAll(array('order'=>'display_order asc')),'id','name'), $element->ophcianassessment_examination_teeth_defaults, array('empty' => '- Please select -', 'label' => 'Teeth'))?>
	<?php echo $form->multiSelectList($element, 'MultiSelect_dental', 'dentals', 'ophcianassessment_examination_dental_id', CHtml::listData(OphCiAnaestheticassessment_Examination_Dental::model()->findAll(array('order'=>'display_order asc')),'id','name'), $element->ophcianassessment_examination_dental_defaults, array('empty' => '- Please select -', 'label' => 'Removable dental work'))?>
	<?php echo $form->textField($element, 'teeth_other', array('size' => '10'))?>
	</div>
	
</section>
