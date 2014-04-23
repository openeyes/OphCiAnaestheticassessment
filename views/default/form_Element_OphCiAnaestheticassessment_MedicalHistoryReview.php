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
		<div class="row field-row">
			<div class="large-3 column"><label></label></div>
			<div class="large-9 column end">
				<table class="grid medications">
					<thead>
						<tr>
							<th>Medication</th>
							<th>Route</th>
							<th>Option</th>
							<th>Frequency</th>
							<th>Start date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php if (empty($element->medications)) {?>
							<tr class="no_medications">
								<td colspan="7">
									No medications have been entered for this patient.
								</td>
							</tr>
						<?php } else {?>
							<?php foreach ($element->medications as $i => $medication) {
								echo $this->renderPartial('_medication_row',array('medication'=>$medication,'i'=>$i,'edit'=>true));
							}?>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="addMedicationFields" style="display: none">
			<div class="row field-row">
				<div class="large-3 column">
					<label>Medication:</label>
				</div>
				<div class="large-4 column end medicationName">
					<span>None selected</span>
					<input type="hidden" id="_medication_id" value="" />
					<input type="hidden" id="_edit_row_id" value="" />
				</div>
			</div>
			<div class="row field-row">
				<div class="large-3 column">
					<label></label>
				</div>
				<div class="large-4 column end">
					<?php echo CHtml::dropDownList('medication_id','',Drug::model()->listBySubspecialty(Firm::model()->findByPk(Yii::app()->session['selected_firm_id'])->getSubspecialtyID()),array('empty' => '- Select -'))?>
				</div>
			</div>
			<div class="row field-row">
				<div class="large-3 column"><label></label></div>
				<div class="large-4 column end">
					<?php
					$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
							'name' => 'drug_id',
							'id' => 'autocomplete_drug_id',
							'source' => "js:function(request, response) {
								$.getJSON('".$this->createUrl('DrugList')."', {
									term : request.term,
								}, response);
							}",
							'options' => array(
								'select' => "js:function(event, ui) {
									$('.medicationName span').html(ui.item.value);
									$('#_medication_id').val(ui.item.id);
									$(this).val('');
									return false;
								}",
							),
							'htmlOptions' => array(
								'placeholder' => 'or search formulary',
							),
						))?>
				</div>
			</div>
			<div class="row field-row">
				<div class="large-3 column"><label>Route:</label></div>
				<div class="large-4 column end">
					<?php echo CHtml::dropDownList('route_id','',CHtml::listData(DrugRoute::model()->findAll(),'id','name'),array('empty'=>'- Select -'))?>
				</div>
			</div>
			<div class="row field-row">
				<div class="large-3 column"><label>Option:</label></div>
				<div class="large-4 column end">
					<?php echo CHtml::dropDownList('option_id','',array(),array('empty'=>'- Select -'))?>
				</div>
			</div>
			<div class="row field-row">
				<div class="large-3 column"><label>Frequency:</label></div>
				<div class="large-4 column end">
					<?php echo CHtml::dropDownList('frequency_id','',CHtml::listData(DrugFrequency::model()->findAll(),'id','name'),array('empty'=>'- Select -'))?>
				</div>
			</div>
			<div class="row field-row">
				<div class="large-3 column"><label>Start date:</label></div>
				<div class="large-4 column end">
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
						'name'=>'start_date',
						'id'=>'start_date',
						'options'=>array(
							'showAnim'=>'fold',
							'dateFormat'=>Helper::NHS_DATE_FORMAT_JS
						),
					))?>
				</div>
			</div>
			<div class="row field-row">
				<div class="large-3 column"><label></label></div>
				<div class="large-9 column end">
					<button class="saveMedication secondary small">Add</button>
					<button class="cancelMedication warning small">Cancel</button>
				</div>
			</div>
		</div>
		<div class="row field-row medicationErrors" style="display: none">
			<div class="large-3 column"><label></label></div>
			<div class="large-5 column end">
				<div class="alert-box alert with-icon">
					<p>Please fix the following input errors:</p>
					<ul class="medicationErrorList">
					</ul>
				</div>
			</div>
		</div>
		<div class="row field-row">
			<div class="large-3 column"><label></label></div>
			<div class="large-9 column end">
				<button class="addMedication secondary small">Add medication</button>
			</div>
		</div>
		<?php echo $form->checkBox($element, 'medication_verified', array('text-align' => 'right'), array('label' => 3, 'field' => 4))?>
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
		<?php echo $form->radioBoolean($element, 'dental', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'tobacco_use', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'alcohol_use', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'recreational_drug_use', array(), array('label' => 3, 'field' => 4))?>
	</div>
</section>
