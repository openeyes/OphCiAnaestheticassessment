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
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('surgery_approval_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->surgery_approval ? $element->surgery_approval->name : 'None'?></div></div>
		</div>
		<?php if ($element->surgery_approval && $element->surgery_approval->name == 'Not approved for surgery') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('not_app'))?>:</div></div>
				<div class="large-9 column end"><div class="data-value"><?php if (!$element->not_apps) {?>
								None
							<?php } else {?>
									<?php foreach ($element->not_apps as $item) {
										echo $item->ophcianassessment_anesthesiaplan_not_app->name?><br/>
									<?php }?>
							<?php }?>
				</div></div>
			</div>
		<?php }?>
		<?php if ($element->com_na) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('com_na'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->com_na)?></div></div>
			</div>
		<?php }?>
		<?php if ($element->surgery_approval && $element->surgery_approval->name == 'Awaiting further information do not schedule') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('acceptance_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->acceptance ? $element->acceptance->name : 'None'?></div></div>
			</div>
		<?php }?>
		<?php if ($element->waiting_comments) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('waiting_comments'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->waiting_comments)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('asa_level_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->asa_level ? $element->asa_level->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('anesthesia_plan_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->anesthesia_plan ? $element->anesthesia_plan->name : 'None'?></div></div>
		</div>
		<?php if ($element->anesthesia_plan_comment) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('anesthesia_plan_comment'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->textWithLineBreaks('anesthesia_plan_comment')?></div></div>
			</div>
		<?php }?>
	</div>
</section>
