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
	<div class="row field-row">
		<div class="large-3 column"><label></label></div>
		<div class="large-9 column end">
			<button id="Element_OphCiAnaestheticassessment_MedicalHistoryReview_healthy_patient" class="secondary small">
				Healthy Patient
			</button>
		</div>
	</div>

	<?php echo $form->radioBoolean($element, 'previous_surgical_procedures', array('class' => 'linked-fields', 'data-linked-fields' => 'surgery,surgery_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>

	<?php $form->widget('application.widgets.Records', array(
		'form' => $form,
		'element' => $element,
		'model' => new OphCiAnaestheticassessment_Medical_History_Surgery_Assignment,
		'field' => 'surgery_assignments',
		'validate_method' => '/OphCiAnaestheticassessment/default/validateSurgery',
		'row_view' => 'protected/modules/OphCiAnaestheticassessment/views/default/_surgery_row.php',
		'columns' => array(
			array(
				'width' => 9,
				'fields' => array(
					array(
						'field' => 'item_id',
						'type' => 'dropdown',
						'options' => CHtml::listData(OphCiAnaestheticassessment_Medical_History_Surgery::model()->findAll(array('order'=>'display_order asc')),'id','name'),
						'empty' => '- Select -',
					),
					array(
						'field' => 'year',
						'type' => 'dropdown',
						'options' => array_combine(range(date('Y'),date('Y')-150),range(date('Y'),date('Y')-150)),
						'empty' => '- Unknown -',
					),
					array(
						'field' => 'comments',
						'type' => 'textarea',
					),
				),
			),
		),
		'no_items_text' => 'No previous surgeries have been recorded.',
		'add_button_text' => 'Add surgery',
		'use_last_button_text' => false,
		'include_timestamp' => false,
		'headings' => array('Procedure','Year','Comments'),
		'hidden' => !$element->previous_surgical_procedures,
	))?>
	<?php echo $form->textArea($element, 'surgery_comments', array(), !$element->previous_surgical_procedures, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'patient_anesthesia', array('class' => 'linked-fields', 'data-linked-fields' => 'patient_anesthesia_items,patient_anesthesia_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'patient_anesthesia_items', 'patient_anesthesia_items', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Patient_Anesthesia::model()->findAll(array('order' => 'display_order asc')),'id','name'), array(), array('empty' => '- Please select -','label' => 'Patient anesthesia reaction','class' => 'linked-fields', 'data-linked-fields' => 'patientan_other', 'data-linked-values' => 'Other (please specify)'),!$element->patient_anesthesia,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'patientan_other', array('hide' => !$element->hasMultiSelectValue('patient_anesthesia_items','Other (please specify)')),array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'patient_anesthesia_comments', array(), !$element->patient_anesthesia, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'family_anesthesia', array('class' => 'linked-fields', 'data-linked-fields' => 'family_anesthesia_items,family_anesthesia_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'family_anesthesia_items', 'family_anesthesia_items', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Family_Anesthesia::model()->findAll(array('order' => 'display_order asc')),'id','name'), array(), array('empty' => '- Please select -','label' => 'Family anesthesia reaction','class' => 'linked-fields', 'data-linked-fields' => 'familyan_other', 'data-linked-values' => 'Other (please specify)'),!$element->family_anesthesia,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'familyan_other', array('hide' => !$element->hasMultiSelectValue('family_anesthesia_items','Other (please specify)')),array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'family_anesthesia_comments', array(), !$element->family_anesthesia, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'pain', array('class' => 'linked-fields', 'data-linked-fields' => 'pain_location_id,pain_type_id', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->dropDownList($element, 'pain_location_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Pain_Location::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'),!$element->pain,array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioButtons($element, 'pain_type_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Pain_Type::model()->findAll(array('order'=> 'display_order asc')),'id','name'), $element->pain_type_id, false, !$element->pain, false, false, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'cardiovascular', array('class' => 'linked-fields', 'data-linked-fields' => 'cardio,cardio_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'cardio', 'cardio', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Cardio::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Cardio history','class' => 'linked-fields', 'data-linked-fields' => 'cardio_other', 'data-linked-values' => 'Other (please specify)'),!$element->cardiovascular,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'cardio_other', array('hide' => !$element->hasMultiSelectValue('cardio','Other (please specify)')), array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'cardio_comments', array(), !$element->cardiovascular, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'respiratory', array('class' => 'linked-fields', 'data-linked-fields' => 'pulmonary,pulmonary_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'pulmonary', 'pulmonary', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Pulmonary::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Pulmonary history','class' => 'linked-fields', 'data-linked-fields' => 'pulmonary_other', 'data-linked-values' => 'Other (please specify)'),!$element->respiratory,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'pulmonary_other', array('hide' => !$element->hasMultiSelectValue('pulmonary','Other (please specify)')), array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'pulmonary_comments', array(), !$element->respiratory, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'gastro_intestinal', array('class' => 'linked-fields','data-linked-fields' => 'gi,gi_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'gi', 'gi', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_GI::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Gastro intestinal history','class' => 'linked-fields', 'data-linked-fields' => 'gi_other', 'data-linked-values' => 'Other (please specify)'),!$element->gastro_intestinal,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'gi_other', array('hide' => !$element->hasMultiSelectValue('gi','Other (please specify)')), array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'gi_comments', array(), !$element->gastro_intestinal, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'diabetes', array('class' => 'linked-fields', 'data-linked-fields' => 'diabetes_treatment,diabetes_monitor,diabetes_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'diabetes_treatment', 'diabetes_treatment', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Diabetes_Treatment::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Treated with'),!$element->diabetes,false,null,false,false,array('label' => 3, 'field' => 4),false,'Not treated')?>
	<?php echo $form->multiSelectList($element, 'diabetes_monitor', 'diabetes_monitor', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Diabetes_Monitor::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Monitored with'),!$element->diabetes,false,null,false,false,array('label' => 3, 'field' => 4),false,'Not monitored')?>
	<?php echo $form->textArea($element, 'diabetes_comments', array(), !$element->diabetes, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'genitourinary_renal_endocrine', array('class' => 'linked-fields', 'data-linked-fields' => 'gre,gre_comments','data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'gre', 'gre', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_GRE::model()->findAll(array('order' => 'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Genitourinary / renal / endocrine history', 'class' => 'linked-fields', 'data-linked-fields' => 'gre_other', 'data-linked-values' => 'Other (please specify)'),!$element->genitourinary_renal_endocrine,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'gre_other', array('hide' => !$element->hasMultiSelectValue('gre','Other (please specify)')),array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'gre_comments', array(), !$element->genitourinary_renal_endocrine, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'neuro_musculoskeletal', array('class' => 'linked-fields', 'data-linked-fields' => 'neuro,neuro_comments','data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'neuro', 'neuro', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Neuro::model()->findAll(array('order' => 'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Neuro / musculoskeletal history', 'class' => 'linked-fields', 'data-linked-fields' => 'neuro_other', 'data-linked-values' => 'Other (please specify)'),!$element->neuro_musculoskeletal,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'neuro_other', array('hide' => !$element->hasMultiSelectValue('neuro','Other (please specify)')),array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'neuro_comments', array(), !$element->neuro_musculoskeletal, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'falls_mobility_risk', array('class' => 'linked-fields', 'data-linked-fields' => 'falls,falls_comments','data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'falls', 'falls', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Falls::model()->findAll(array('order' => 'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Falls / mobility risk history'),!$element->falls_mobility_risk,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'falls_comments', array(), !$element->falls_mobility_risk, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'miscellaneous', array('class' => 'linked-fields', 'data-linked-fields' => 'misc,misc_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'misc', 'misc', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Misc::model()->findAll(array('order' => 'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Miscellaneous history', 'class' => 'linked-fields', 'data-linked-fields' => 'misc_other', 'data-linked-values' => 'Other (please specify)'),!$element->miscellaneous,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'misc_other', array('hide' => !$element->hasMultiSelectValue('misc','Other (please specify)')),array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'misc_comments', array(), !$element->miscellaneous, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'psychiatric', array('class' => 'linked-fields', 'data-linked-fields' => 'psychiatric_items,psych_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'psychiatric_items', 'psychiatric_items', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Psychiatric::model()->findAll(array('order' => 'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Psychiatric history', 'class' => 'linked-fields', 'data-linked-fields' => 'psych_other', 'data-linked-values' => 'Other (please specify)'),!$element->psychiatric,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'psych_other', array('hide' => !$element->hasMultiSelectValue('psychiatric_items','Other (please specify)')),array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'psych_comments', array(), !$element->psychiatric, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'pregnancy_status', array('class' => 'linked-fields', 'data-linked-fields' => 'pregnancy', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'pregnancy', 'pregnancy', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Pregnancy::model()->findAll(array('order' => 'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Pregnancy history', 'class' => 'linked-fields', 'data-linked-fields' => 'preg_test', 'data-linked-values' => 'Test (please specify)'),!$element->pregnancy_status,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'preg_test', array('hide' => !$element->hasMultiSelectValue('pregnancy','Test (please specify)')),array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'exposure', array('class' => 'linked-fields', 'data-linked-fields' => 'recent_cough', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'recent_cough', array('hide' => !$element->exposure), array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'dental', array('class' => 'linked-fields','data-linked-fields' => 'cardiac_devices,dentals,noncardiac_implants,prosthetics', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'cardiac_devices', 'cardiac_devices', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Implant_Cardiac_Device::model()->findAll(array('order' => 'display_order asc')),'id','name'),array(),array('empty' => '- Please select -','label' => 'Implanted cardiac device','class' => 'linked-fields','data-linked-fields'=>'cardev_other','data-linked-values' => 'Other (please specify)'),!$element->dental,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'cardev_other', array('hide' => !$element->hasMultiSelectValue('cardiac_devices','Other (please specify)')),array(),array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'cardev_comments', array(), !$element->dental, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'dentals', 'dentals', 'dental_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Dental::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Removable dental work','class' => 'linked-fields', 'data-linked-fields' => 'teeth_other', 'data-linked-values' => 'Other (please specify)'),!$element->dental,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'teeth_other', array('hide' => !$element->hasMultiSelectValue('dentals','Other (please specify)')), array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textArea($element, 'noncardiac_implants', array(), !$element->dental, array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'prosthetics', 'prosthetics', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Implant_Prosthetic::model()->findAll(array('order' => 'display_order asc')),'id','name'), array(), array('empty' => '- Please select -','label' => 'Prosthetics','class' => 'linked-fields', 'data-linked-fields' => 'prosthetic_other', 'data-linked-values' => 'Other (please specify)'),!$element->dental,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'prosthetic_other', array('hide' => !$element->hasMultiSelectValue('prosthetics','Other (please specify)')),array(),array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'tobacco_use', array('class' => 'linked-fields', 'data-linked-fields' => 'smoking,smoke_amount,smoke_duration,smoke_quit_date', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'smoking', 'smoking', 'item_id', CHtml::listData(OphCiAnaestheticassessment_Medical_History_Smoking::model()->findAll(array('order' => 'display_order asc')),'id','name'), array(), array('empty' => '- Please select -','label' => 'Type'),!$element->tobacco_use,false,null,false,false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'smoke_amount', array('hide' => !$element->tobacco_use),array(),array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'smoke_duration', array('hide' => !$element->tobacco_use),array(),array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'smoke_quit_date', array('hide' => !$element->tobacco_use),array(),array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'alcohol_use', array('class' => 'linked-fields', 'data-linked-fields' => 'alcohol_type,alcohol_amount,alcohol_quit_date', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'alcohol_type', array('hide' => !$element->alcohol_use),array(),array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'alcohol_amount', array('hide' => !$element->alcohol_use),array(),array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'alcohol_quit_date', array('hide' => !$element->alcohol_use),array(),array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'recreational_drug_use', array('class' => 'linked-fields', 'data-linked-fields' => 'drug_name,drug_amount,drug_quit_date', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'drug_name', array('hide' => !$element->recreational_drug_use),array(),array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'drug_amount', array('hide' => !$element->recreational_drug_use),array(),array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'drug_quit_date', array('hide' => !$element->recreational_drug_use),array(),array('label' => 3, 'field' => 4))?>
</div>
