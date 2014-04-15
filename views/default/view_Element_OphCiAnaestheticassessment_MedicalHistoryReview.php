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
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('medication_verified'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->medication_verified ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('allergies_verified'))?></div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->allergies_verified ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('previous_surgical_procedures'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->previous_surgical_procedures ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_anesthesia'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->patient_anesthesia ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('family_anesthesia'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->family_anesthesia ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('pain'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->pain ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('cardiovascular'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->cardiovascular ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('respiratory'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->respiratory ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('gastro_intestinal'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->gastro_intestinal ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('diabetes'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->diabetes ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('genitourinary_renal_endocrine'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->genitourinary_renal_endocrine ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('neuro_musculoskeletal'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->neuro_musculoskeletal ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('falls_mobility_risk'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->falls_mobility_risk ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('Miscellaneous'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->Miscellaneous ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('psychiatric'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->psychiatric ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('pregnancy_status'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->pregnancy_status ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('exposure'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->exposure ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('dental'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->dental ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('tobacco_use'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->tobacco_use ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('alcohol_use'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->alcohol_use ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-2 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('recreational_drug_use'))?>:</div></div>
			<div class="large-10 column end"><div class="data-value"><?php echo $element->recreational_drug_use ? 'Yes' : 'No'?></div></div>
		</div>
			</div>
</section>
