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
	<div id="div_Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_procedures" class="row field-row">
		<div class="large-3 column">
			<label for="Element_OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_procedures">
				<?php echo $element->getAttributeLabel('procedures')?>:
			</label>
		</div>
		<div class="large-9 column end">
			<?php foreach ($element->getProcedureList($this->openBookings) as $i => $procedure) {?>
				<input type="hidden" name="<?php echo CHtml::modelName($element)?>[eyes][<?php echo $i?>]" value="<?php echo $procedure['eye_id']?>" />
				<input type="hidden" name="<?php echo CHtml::modelName($element)?>[assignments][<?php echo $i?>]" value="<?php echo $procedure['assignment_id']?>" />
				<input type="checkbox" name="<?php echo CHtml::modelName($element)?>[procedures][<?php echo $i?>]" id="<?php echo CHtml::modelName($element)?>_procedures_<?php echo $i?>" value="<?php echo $procedure['id']?>"<?php if (in_array($procedure['id'],$element->selectedProcedureIDs)){?> checked="checked"<?php }?> />
				<label for="<?php echo CHtml::modelName($element)?>_procedures_<?php echo $i?>">
					<?php echo $procedure['eye']?> <?php echo $procedure['term']?>
				</label>
				<br/>
			<?php }?>
		</div>
	</div>
	<?php echo $form->dropDownList($element,'instruction_category_id',CHtml::listData(OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category::model()->findAll(array('order'=>'display_order asc')),'id','name'),array('empty' => '- Please select -'),false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element,'instructions','instructions','instruction_id',CHtml::listData($element->instructionsForCategory,'id','name'),array(),array('empty' => '- Please select -','label' => $element->instruction_category ? $element->instruction_category->name : ''),!$element->instruction_category,false,null,false,false,array('label'=>3,'field'=>6))?>
</div>
