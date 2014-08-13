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

	<?php

	if ($element->id && empty($_POST)) {

		// As we don't have direct any element >> category relations, we need to
		// infer the relations by associated instructions.

		$criteria = new CDbCriteria;
		$criteria->select = 'DISTINCT t.*';
		$criteria->join = 'JOIN ophcianassessment_speced_instructions b ON b.category_id = t.id JOIN ophcianassessment_speced_instructions_assignment as c on c.instruction_id = b.id';
	  $criteria->condition='c.element_id='.$element->id;
		$criteria->order = 't.display_order asc';

		$selected_categories = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category::model()
			->findAll($criteria);
	} else {
		$selected_categories = array();
	}

	$selected_category_ids = array_map(function($category) {
		return $category->id;
	}, $selected_categories);

	$categories = OphCiAnaestheticassessment_PatientSpecificPreoperativeEducation_Instructions_Category::model()
		->findAll(array('order'=>'display_order asc'));

	$linked_fields = array();
	$linked_values = array();

	foreach($categories as $i => $category) {
		$linked_fields[] = 'instructions_'.$i;
		$linked_values[] = $category->name;
	}

	$categoriesWidget = $this->widget('application.widgets.MultiSelectList', array(
		'element' => $element,
		'field' => 'categories',
		'relation' => null,
		'relation_id_field' => null,
		'options' => CHtml::listData($categories, 'id','name'),
		'default_options' => array(),
		'htmlOptions' => array(
			'empty' => '- Please select -',
			'label' => 'Instruction category',
			'class' => 'linked-fields',
			'data-linked-fields'=>implode(',',$linked_fields),
			'data-linked-values'=>implode(',',$linked_values)
		),
		'hidden' => false,
		'inline' => false,
		'noSelectionsMessage' => null,
		'showRemoveAllLink' => false,
		'sorted' => false,
		'layoutColumns' => array('label'=>3,'field'=>4),
		'selected_ids' => $selected_category_ids
	));

	// POST data is merged within the widget, thus we need to merge this data.
	$selected_category_ids = array_merge($selected_category_ids, $categoriesWidget->selected_ids);

	// Now we can output instructions grouped by category.
	foreach($categories as $i => $category){
		$this->widget('application.widgets.MultiSelectList', array(
			'element' => $element,
			'field' => 'instructions',
			'relation' => 'instructions',
			'relation_id_field' => 'instruction_id',
			'options' => CHtml::listData($category->instructions, 'id','name'),
			'default_options' => array(),
			'htmlOptions' => array(
				'div_id' => 'div_'.CHtml::modelName($element).'_instructions_'.$i,
				'field_id' => 'instructions_'.$i,
				'empty' => '- Please select -',
				'label' => $category->name,
			),
			'hidden' => !in_array($category->id, $selected_category_ids),
			'inline' => false,
			'noSelectionsMessage' => null,
			'showRemoveAllLink' => false,
			'sorted' => false,
			'layoutColumns' => array('label'=>3,'field'=>4),
		));
	}?>
</div>
