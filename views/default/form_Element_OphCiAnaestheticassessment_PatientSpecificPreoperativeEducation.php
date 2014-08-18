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
	<?php $form->widget('application.widgets.Records', array(
		'form' => $form,
		'element' => $element,
		'model' => new OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Item,
		'field' => 'items',
		'validate_method' => '/OphCiAnaestheticassessment/default/validateInstructionItem',
		'row_view' => 'protected/modules/OphCiAnaestheticassessment/views/default/_instruction_row.php',
		'columns' => array(
			array(
				'width' => 12,
				'field_width' => 6,
				'fields' => array(
					array(
						'type' => 'custom',
						'html' => $this->renderPartial('_booking_selection',null,true),
					),
					array(
						'field' => 'category_id',
						'type' => 'dropdown',
						'default' => ($category_id = $this->patient->isChild()
							? OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category::model()->find('name=?',array('Peds General Anesthesia'))->id
							: OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category::model()->find('name=?',array('Adult General Anaesthesia'))->id
						),
						'options' => CHtml::listData(OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category::model()->findAll(array('order'=>'display_order asc')),'id','name'),
						'label_width' => 2,
						'width' => 4,
					),
					array(
						'field' => 'instructions',
						'type' => 'multiselect',
						'options' => CHtml::listData(OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions::model()->findAll(array('condition' => 'category_id=?','params'=>array($category_id),'order'=>'display_order asc')),'id','name'),
						'label_width' => 2,
						'width' => 9,
					),
				),
			),
		),
		'no_items_text' => 'No instruction sets have been recorded.',
		'add_button_text' => 'Add instruction set',
		'include_timestamp' => false,
		'use_last_button_text' => false,
		'headings' => array('Bookings','Instructions'),
	))?>
	<input type="hidden" name="<?php echo CHtml::modelName($element)?>[present]" value="1" />
</div>
