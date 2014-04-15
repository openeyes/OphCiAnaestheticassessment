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

<section class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name; ?></h3>
	</header>

		<div class="element-fields">
			<?php echo $form->checkBox($element, 'medication_verified')?>
	<?php echo $form->checkBox($element, 'allergies_verified')?>
	<?php echo $form->radioBoolean($element, 'previous_surgical_procedures')?>
	<?php echo $form->radioBoolean($element, 'patient_anesthesia')?>
	<?php echo $form->radioBoolean($element, 'family_anesthesia')?>
	<?php echo $form->radioBoolean($element, 'pain')?>
	<?php echo $form->radioBoolean($element, 'cardiovascular')?>
	<?php echo $form->radioBoolean($element, 'respiratory')?>
	<?php echo $form->radioBoolean($element, 'gastro_intestinal')?>
	<?php echo $form->radioBoolean($element, 'diabetes')?>
	<?php echo $form->radioBoolean($element, 'genitourinary_renal_endocrine')?>
	<?php echo $form->radioBoolean($element, 'neuro_musculoskeletal')?>
	<?php echo $form->radioBoolean($element, 'falls_mobility_risk')?>
	<?php echo $form->radioBoolean($element, 'miscelaneous')?>
	<?php echo $form->radioBoolean($element, 'psychiatric')?>
	<?php echo $form->radioBoolean($element, 'pregnancy_status')?>
	<?php echo $form->radioBoolean($element, 'exposure')?>
	<?php echo $form->radioBoolean($element, 'dental')?>
	<?php echo $form->radioBoolean($element, 'tabacco_use')?>
	<?php echo $form->radioBoolean($element, 'alcohol_use')?>
	<?php echo $form->radioBoolean($element, 'recreational_drug_use')?>
	</div>
	
</section>
