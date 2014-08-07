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
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label">Weight</div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ($element->weight_m) {?>
						<?php echo CHtml::encode($element->weight_m->valueText)?> (<?php echo CHtml::encode($element->weight_m->lbText)?><?php if ($element->weight_calculation) {?>, <?php echo strtolower($element->weight_calculation->name)?><?php }?>)
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label">Height</div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ($element->height_m) {?>
						<?php echo CHtml::encode($element->height_m->valueText)?> (<?php echo $element->height_m->ftInText?><?php if ($element->height_calculation) {?>, <?php echo strtolower($element->height_calculation->name)?><?php }?>)
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('bmi_m'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ($element->bmi_m) {?>
						<?php echo CHtml::encode($element->bmi_m->valueText)?>
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label">Blood pressure</div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ($element->blood_pressure_m) {?>
						<?php echo CHtml::encode($element->blood_pressure_m->valueText)?>
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('pulse_m'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ($element->pulse_m) {?>
						<?php echo CHtml::encode($element->pulse_m->valueText)?>
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('temperature_m'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ($element->temperature_m) {?>
						<?php echo CHtml::encode($element->temperature_m->valueText)?>
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('rr_m'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ($element->rr_m) {?>
						<?php echo CHtml::encode($element->rr_m->valueText)?>
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('sao2_m'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ($element->sao2_m) {?>
						<?php echo CHtml::encode($element->sao2_m->valueText)?>
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('airway_class_m'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ($element->airway_class_m) {?>
						<?php echo $element->airway_class_m->valueText?>
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('blood_glucose_m'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->blood_glucose_na ? 'N/A' : ($element->blood_glucose_m ? $element->blood_glucose_m->valueText : 'Not entered'))?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('heart'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->heart ? $element->heart : 'Not entered')?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('lungs'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->lungs ? $element->lungs : 'Not entered')?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('abdomen'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->abdomen ? $element->abdomen : 'Not entered')?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('teeth'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php if (!$element->teeths) {?>
							No foreseen issues
						<?php } else {?>
								<?php foreach ($element->teeths as $item) {
									echo $item->name?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
	</div>
