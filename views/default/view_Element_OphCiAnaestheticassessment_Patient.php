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
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_id_verified_with_two_identifiers'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->patient_id_verified_with_two_identifiers ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('translator_present_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->translator_present ? $element->translator_present->name : 'None'?></div></div>
		</div>
		<?php if ($element->name) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('name'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->name)?></div></div>
			</div>
		<?php }?>
		<?php if ($element->event->episode->patient->isChild()) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('guardian_name'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->guardian_name?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('guardian_relationship_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo isset($element->guardian_relationship->name)? $element->guardian_relationship->name : 'Not specified'?></div></div>
			</div>
			<?php if (isset($element->guardian_relationship->name) && $element->guardian_relationship->name == 'Other') {?>
				<div class="row data-row">
					<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('guardian_relationship_other'))?></div></div>
					<div class="large-9 column end"><div class="data-value"><?php echo $element->guardian_relationship_other?></div></div>
				</div>
			<?php }?>
		<?php }?>
	</div>
