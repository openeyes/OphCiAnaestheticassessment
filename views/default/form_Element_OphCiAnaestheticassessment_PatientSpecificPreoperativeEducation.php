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
	<?php echo $form->multiSelectList($element, 'MultiSelect_speced_id', 'speced_ids', 'instruction_id', CHtml::listData(OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_SpecedId::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Patient specific education','class' => 'linked-fields','data-linked-fields'=>'medications,other','data-linked-values'=>'Medications,Other (please specify)'),false,false,null,false,false,array('label'=>3,'field'=>4))?>
	<?php echo $form->textField($element, 'medications', array('hide' => !$element->hasMultiSelectValue('speced_ids','Medications')), array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->textField($element, 'other', array('hide' => !$element->hasMultiSelectValue('speced_ids','Other (please specify)')), array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'MultiSelect_Diabetes', 'diabetes_items', 'item_id', CHtml::listData(OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Diabetes::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Diabetes instructions'),false,false,null,false,false,array('label'=>3,'field'=>4))?>
</div>
