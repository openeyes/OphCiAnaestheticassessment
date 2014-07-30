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
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('medication_verified'))?></td>
			<td><span class="big"><?php echo $element->medication_verified ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('allergies_verified'))?></td>
			<td><span class="big"><?php echo $element->allergies_verified ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('previous_surgical_procedures'))?>:</td>
			<td><span class="big"><?php echo $element->previous_surgical_procedures ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('patient_anesthesia'))?>:</td>
			<td><span class="big"><?php echo $element->patient_anesthesia ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('patient_anesthesia_comments'))?>:</td>
			<td><span class="big"><?php echo $element->textWithLineBreaks('patient_anesthesia_comments')?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('family_anesthesia'))?>:</td>
			<td><span class="big"><?php echo $element->family_anesthesia ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('family_anesthesia_comments'))?>:</td>
			<td><span class="big"><?php echo $element->textWithLineBreaks('family_anesthesia_comments')?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pain'))?>:</td>
			<td><span class="big"><?php echo $element->pain ? 'Yes' : 'No'?></span></td>
		</tr>
		<?php if ($element->pain){?>
			<tr>
				<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pain_location_id'))?>:</td>
				<td><span class="big"><?php echo CHtml::encode($element->pain_location->name)?></span></td>
			</tr>
			<tr>
				<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pain_type_id'))?>:</td>
				<td><span class="big"><?php echo CHtml::encode($element->pain_type->name)?></span></td>
			</tr>
		<?php }?>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('cardiovascular'))?>:</td>
			<td><span class="big"><?php echo $element->cardiovascular ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('respiratory'))?>:</td>
			<td><span class="big"><?php echo $element->respiratory ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('gastro_intestinal'))?>:</td>
			<td><span class="big"><?php echo $element->gastro_intestinal ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('diabetes'))?>:</td>
			<td><span class="big"><?php echo $element->diabetes ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('genitourinary_renal_endocrine'))?>:</td>
			<td><span class="big"><?php echo $element->genitourinary_renal_endocrine ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('neuro_musculoskeletal'))?>:</td>
			<td><span class="big"><?php echo $element->neuro_musculoskeletal ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('falls_mobility_risk'))?>:</td>
			<td><span class="big"><?php echo $element->falls_mobility_risk ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('Miscellaneous'))?>:</td>
			<td><span class="big"><?php echo $element->Miscellaneous ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('psychiatric'))?>:</td>
			<td><span class="big"><?php echo $element->psychiatric ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pregnancy_status'))?>:</td>
			<td><span class="big"><?php echo $element->pregnancy_status ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('exposure'))?>:</td>
			<td><span class="big"><?php echo $element->exposure ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('dental'))?>:</td>
			<td><span class="big"><?php echo $element->dental ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('tobacco_use'))?>:</td>
			<td><span class="big"><?php echo $element->tobacco_use ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('alcohol_use'))?>:</td>
			<td><span class="big"><?php echo $element->alcohol_use ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('recreational_drug_use'))?>:</td>
			<td><span class="big"><?php echo $element->recreational_drug_use ? 'Yes' : 'No'?></span></td>
		</tr>
	</tbody>
</table>

