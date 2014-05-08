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
		<?php $form->widget('application.widgets.MedicationSelection', array(
			'element' => $element,
			'relation' => 'medications',
			'input_name' => 'medication_history',
		))?>
		<?php echo $form->checkBox($element, 'medication_verified', array('text-align' => 'right'), array('label' => 3, 'field' => 4))?>
		<?php $form->widget('application.widgets.AllergySelection', array(
			'form' => $form,
			'element' => $element,
			'relation' => 'allergies',
			'input_name' => 'allergies',
			'no_allergies_field' => 'patient_has_no_allergies',
		))?>
		<?php echo $form->checkBox($element, 'allergies_verified', array('text-align' => 'right'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'previous_surgical_procedures', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'patient_anesthesia', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'family_anesthesia', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'pain', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'cardiovascular', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'respiratory', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'gastro_intestinal', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'diabetes', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'genitourinary_renal_endocrine', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'neuro_musculoskeletal', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'falls_mobility_risk', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'Miscellaneous', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'psychiatric', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'pregnancy_status', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'exposure', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'dental', array('class' => 'linked-fields','data-linked-fields' => 'MultiSelect_dental', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->multiSelectList($element, 'MultiSelect_dental', 'dentals', 'dental_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Dental::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Removable dental work','class' => 'linked-fields', 'data-linked-fields' => 'teeth_other', 'data-linked-values' => 'Other (please specify)'),!$element->dental,false,null,false,false,array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'teeth_other', array('hide' => !$element->hasMultiSelectValue('dentals','Other (please specify)')), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'tobacco_use', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'alcohol_use', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'recreational_drug_use', array(), array('label' => 3, 'field' => 4))?>
	</div>
</section>
