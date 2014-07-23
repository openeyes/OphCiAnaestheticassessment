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
<div class="element-fields">
	<?php echo $form->checkBox($element, 'patient_id_verified_with_two_identifiers', array('text-align' => 'right'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioButtons($element, 'translator_present_id', CHtml::listData(OphCiAnaestheticassessment_Patient_TranslatorPresent::model()->findAll(array('order'=>'display_order asc')),'id','name'), null, false, false, false, false, array('class' => 'linked-fields', 'data-linked-fields' => 'name', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php if ($this->patient->isChild()) {?>
		<?php echo $form->textField($element, 'guardian_name', array(), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->dropDownList($element, 'guardian_relationship_id', CHtml::listData(OphCiAnaestheticassessment_Patient_Guardian_Relationship::model()->findAll(array('order'=>'display_order asc')),'id','name'),array('empty'=>'- Please select -', 'class' => 'linked-fields', 'data-linked-fields' => 'guardian_relationship_other', 'data-linked-values' => 'Other'),false,array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'guardian_relationship_other', array('hide' => !$element->guardian_relationship || $element->guardian_relationship != 'Other'), array(), array('label' => 3, 'field' => 4))?>
	<?php }?>
	<?php echo $form->textField($element, 'name', array('hide' => !$element->translator_present || $element->translator_present->name != 'Yes'), array(), array('label' => 3, 'field' => 4))?>
</div>
