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

<tr id="cat-<?php echo $row->id;?>">
	<td class="reorder">
		<span>&uarr;&darr;</span>
	</td>
	<td>
		<?php echo CHtml::hiddenField('id[]',$row->id)?>
		<?php
		$htmlOptions = array();
		if (!$row->active) {
			$htmlOptions['disabled'] = 'disabled';
			echo CHtml::hiddenField('name[]',$row->name);
		}
		echo CHtml::textField('name[]',$row->name,$htmlOptions);
		if (isset($errors[$i])) {?>
			<span class="error">
				<?php echo $errors[$i]?>
			</span>
		<?php }?>
	</td>
	<td>
		<?php
		echo CHtml::checkBox('active[' . $row->id . ']',$row->active);?>
	</td>
	<td>
		<?php if ($row->active) {?>
			<a href="/OphCiAnaestheticassessment/admin/editPatientInstructions?id=<?php echo $row->id;?>">manage instructions</a>
		<?php }?>
	</td>
</tr>