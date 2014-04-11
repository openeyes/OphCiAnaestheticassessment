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
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('surgery_aproval_id'))?></td>
			<td><span class="big"><?php echo $element->surgery_aproval ? $element->surgery_aproval->name : 'None'?></span></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('not_app'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->not_apps) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->not_apps as $item) {
									echo $item->ophcianassessment_anesthesiaplan_not_app->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('com_na'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->com_na)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('acceptance_id'))?></td>
			<td><span class="big"><?php echo $element->acceptance ? $element->acceptance->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('waiting_comments'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->waiting_comments)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('asa_level_id'))?></td>
			<td><span class="big"><?php echo $element->asa_level ? $element->asa_level->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('anesthesia_plan_id'))?></td>
			<td><span class="big"><?php echo $element->anesthesia_plan ? $element->anesthesia_plan->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('anesthesia_plan_comment'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->anesthesia_plan_comment)?></span></td>
		</tr>
	</tbody>
</table>

