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
	<div class="element-data">
		<?php $this->widget('application.widgets.MedicationSelection', array(
			'element' => $element,
			'relation' => 'medications',
			'input_name' => 'medication_history',
			'edit' => false,
		))?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('medication_verified'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->medication_verified ? 'Yes' : 'No'?></div></div>
		</div>
		<?php $this->widget('application.widgets.AllergySelection', array(
			'form' => $form,
			'element' => $element,
			'label' => 'Allergies',
			'relation' => 'allergies',
			'input_name' => 'allergies',
			'no_allergies_field' => 'patient_has_no_allergies',
			'edit' => false,
		))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'previous_surgical_procedures', 'relations' => array('surgery'), 'other_field' => 'surgery_other', 'text_fields' => array('surgery_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'patient_anesthesia', 'relations' => array('patient_anesthesia_items'), 'other_field' => 'patientan_other'))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'family_anesthesia', 'relations' => array('family_anesthesia_items'), 'other_field' => 'familyan_other'))?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('pain'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->pain ? 'Yes' : 'No'?></div></div>
		</div>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'cardiovascular', 'relations' => array('cardio'), 'other_field' => 'cardio_other', 'text_fields' => array('cardio_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'respiratory', 'relations' => array('pulmonary'), 'other_field' => 'pulmonary_other', 'text_fields' => array('pulmonary_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'gastro_intestinal', 'relations' => array('gi'), 'other_field' => 'gi_other', 'text_fields' => array('gi_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'diabetes', 'relations' => array('diabetes_treatment','diabetes_monitor'), 'text_fields' => array('diabetes_average_glucose','diabetes_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'genitourinary_renal_endocrine', 'relations' => array('gre'), 'other_field' => 'gre_other', 'text_fields' => array('gre_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'neuro_musculoskeletal', 'relations' => array('neuro'), 'other_field' => 'neuro_other', 'text_fields' => array('neuro_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'falls_mobility_risk', 'relations' => array('falls'), 'text_fields' => array('falls_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'miscellaneous', 'relations' => array('misc'), 'other_field' => 'misc_other', 'text_fields' => array('misc_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'psychiatric', 'relations' => array('psychiatric_items'), 'other_field' => 'psych_other', 'text_fields' => array('psych_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'pregnancy_status', 'relations' => array('pregnancy'), 'other_field' => 'preg_test', 'other_text' => 'Test (please specify)'))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'exposure', 'text_fields' => array('recent_cough')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'dental', 'relations' => array('cardiac_devices'), 'other_field' => 'cardev_other', 'text_fields' => array('cardev_comments')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'dental', 'dont_show_boolean_field' => true, 'relations' => array('dentals'), 'other_field' => 'teeth_other', 'text_fields' => array('noncardiac_implants')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'dental', 'dont_show_boolean_field' => true, 'relations' => array('prosthetics'), 'other_field' => 'prosthetic_other'))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'tobacco_use', 'text_fields' => array('smoke_amount','smoke_duration','smoke_quit_date')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'alcohol_use', 'text_fields' => array('alcohol_type','alcohol_amount','alcohol_quit_date')))?>
		<?php echo $this->renderPartial('_MedicalHistoryField',array('element' => $element, 'boolean_field' => 'recreational_drug_use', 'text_fields' => array('drug_name','drug_amount','drug_quit_date')))?>
	</div>
