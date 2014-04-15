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

<section class="element">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name?></h3>
	</header>

		<div class="element-data">
				<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('weight'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->weight)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('weight_kg'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->weight_kg)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('weight_calculation_id'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->weight_calculation ? $element->weight_calculation->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('height'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->height)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('height_cm'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->height_cm)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('height_calculation_id'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->height_calculation ? $element->height_calculation->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('bmi'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->bmi)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('blood_pressure'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->blood_pressure)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('heart_rate_pulse'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->heart_rate_pulse)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('temperature'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->temperature)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('respiratory_rate'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->respiratory_rate)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('sao2'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->sao2)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('airway_class_id'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->airway_class ? $element->airway_class->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('blood_glucose'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->blood_glucose)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('heart'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->heart)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('lungs'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->lungs)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('abdomen'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->abdomen)?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('teeth'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php if (!$element->teeths) {?>
							None
						<?php } else {?>
								<?php foreach ($element->teeths as $item) {
									echo $item->ophcianassessment_examination_teeth->name?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('dental'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php if (!$element->dentals) {?>
							None
						<?php } else {?>
								<?php foreach ($element->dentals as $item) {
									echo $item->ophcianassessment_examination_dental->name?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('teeth_other'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo CHtml::encode($element->teeth_other)?></div></div>
		</div>
			</div>
</section>
