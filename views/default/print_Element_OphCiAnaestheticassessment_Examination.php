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

<h4 class="elementTypeName"><?php echo $element->elementType->name?></h4>
<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('weight'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->weight)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('weight_kg'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->weight_kg)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('weight_calculation_id'))?></td>
			<td><span class="big"><?php echo $element->weight_calculation ? $element->weight_calculation->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('height'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->height)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('height_cm'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->height_cm)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('height_calculation_id'))?></td>
			<td><span class="big"><?php echo $element->height_calculation ? $element->height_calculation->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('bmi'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->bmi)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blood_pressure'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->blood_pressure)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('heart_rate_pulse'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->heart_rate_pulse)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('temperature'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->temperature)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('respiratory_rate'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->respiratory_rate)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('sao2'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->sao2)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('airway_class_id'))?></td>
			<td><span class="big"><?php echo $element->airway_class ? $element->airway_class->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blood_glucose'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->blood_glucose)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('heart'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->heart)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('lungs'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->lungs)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('abdomen'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->abdomen)?></span></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('teeth'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->teeths) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->teeths as $item) {
									echo $item->ophcianassessment_examination_teeth->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('dental'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->dentals) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->dentals as $item) {
									echo $item->ophcianassessment_examination_dental->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('teeth_other'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->teeth_other)?></span></td>
		</tr>
	</tbody>
</table>

