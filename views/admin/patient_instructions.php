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

<?php
$new_rows = array_filter($instructions, function($instruction) {
	return !$instruction->id;
});
?>

<div class="box admin">
	<h2><?php echo $title?></h2>
	<?php $this->renderPartial('//base/_messages')?>

	<?php $form = $this->beginWidget('BaseEventTypeCActiveForm', array(
		'id'=>'adminform',
		'layoutColumns' => array(
			'label' => 2,
			'field' => 5
		)
	))?>

	<input type="hidden" name="page" value="<?php echo $page;?>" />

	<table class="generic-admin generic-admin-patient-instructions">
		<thead>
			<tr>
				<th>Order</th>
				<th>Name</th>
				<?php foreach ($extra_fields as $field) {?>
					<th>
						<?php echo CHtml::hiddenField('_extra_fields[]',$field['field'])?>
						<?php echo $instructionsModel::model()->getAttributeLabel($field['field'])?>
					</th>
				<?php }?>
				<th width="50">Active</th>
				<th class="actions <?php echo empty($new_rows) ? 'hidden' : '';?>">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($instructions as $i => $row) {
					$view = $row->id ? 'patient_instructions_row' : 'patient_instructions_row_add';
					$this->renderPartial($view, array(
						'i' => $i,
						'row' => $row,
						'errors' => $errors,
						'category' => $category,
						'categories' => $categories,
						'extra_fields' => $extra_fields
					));
				}
			?>
		</tbody>
		<tfoot class="pagination-container">
			<tr>
				<td colspan="4">
					<?php echo EventAction::button('Add instruction', 'admin-add', null, array('class' => 'generic-admin-add small secondary'))->toHtml()?>&nbsp;
					<?php echo EventAction::button('Save', 'admin-save', null, array('class' => 'generic-admin-save small primary'))->toHtml()?>&nbsp;
					<?php echo $this->renderPartial('//admin/_pagination',array(
						'pagination' => $pagination,
						'header' => CHtml::link('[View All]',
							$this->createUrl('/'.$this->route,array_merge($_GET, array('viewall'=>1,'page'=>1))),
							array('class'=>'pagination-view-all')
						)
					))?>
				</td>
			</tr>
		</tfoot>
	</table>
	<?php $this->endWidget()?>
</div>

<script id="template-new-row" type="text/html">
<?php
	$this->renderPartial('patient_instructions_row_add', array(
		'class' => 'newRow hidden',
		'category' => $category,
		'extra_fields' => $extra_fields
	));
?>
</script>

<script>
$(function() {

	var table = $('.generic-admin-patient-instructions');

	// Show "actions" column
	$(this).on('click', '.generic-admin-add', function() {
		table
		.find('tr td:last-child').removeClass('hidden')
		.end()
		.find('th.actions')
		.removeClass('hidden');
	});

	// Remove "actions" column
	$(this).on('click', '.deleteRow', function() {
		if (table.find('.addedRow').length) return;
		table
		.find('th.actions')
		.addClass('hidden');
	});
})
</script>