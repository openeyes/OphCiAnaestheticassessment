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
					<?php if ((integer)$element->weight_kg !== 0) {?>
						<?php echo CHtml::encode($element->formatDecimal('weight_kg'))?> kg (<?php echo CHtml::encode($element->formatDecimal('weight_lb'))?> lb<?php if ($element->weight_calculation) {?>, <?php echo strtolower($element->weight_calculation->name)?><?php }?>)
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
					<?php if ((integer)$element->height_cm !== 0) {?>
						<?php echo CHtml::encode($element->formatDecimal('height_cm'))?> cm (<?php echo $element->height_ft?>'<?php echo $element->height_in?>''<?php if ($element->height_calculation) {?>, <?php echo strtolower($element->height_calculation->name)?><?php }?>)
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('bmi'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ((integer)$element->bmi !== 0) {?>
						<?php echo CHtml::encode($element->formatDecimal('bmi'))?> kg/m^2
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
					<?php if ((integer)$element->bp_systolic !== 0) {?>
						<?php echo CHtml::encode($element->bp_systolic)?>/<?php echo CHtml::encode($element->bp_diastolic)?> mmHg
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('heart_rate_pulse'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ((integer)$element->heart_rate_pulse !== 0) {?>
						<?php echo CHtml::encode($element->heart_rate_pulse)?> bpm
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('temperature'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ((integer)$element->temperature !== 0) {?>
						<?php echo CHtml::encode($element->temperature)?> C
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('respiratory_rate'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ((integer)$element->respiratory_rate !== 0) {?>
						<?php echo CHtml::encode($element->respiratory_rate)?> insp/min
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('sao2'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php if ((integer)$element->sao2 !== 0) {?>
						<?php echo CHtml::encode($element->sao2)?> %
					<?php }else{?>
						Not entered
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('airway_class_id'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php echo $element->airway_class ? $element->airway_class->name : 'None'?>
				</div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('blood_glucose'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->blood_glucose ? $element->blood_glucose : 'Not entered')?></div></div>
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
									echo $item->ophcianassessment_examination_teeth->name?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
	</div>
