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

<tr class="newRow" style="display: none">
	<td>
		<span>&uarr;&darr;</span>
	</td>
	<td>
		<?php echo CHtml::hiddenField('id[]','',array('disabled' => 'disabled'))?>
		<?php echo CHtml::textField('name[]','',array('disabled' => 'disabled'))?>
	</td>
	<td>
		<select name="category_id[]" id="category_id">
			<option value="<?php echo $category->id;?>">
				<?php echo $category->name;?>
			</option>
		</select>
	</td>
	<td>
		<?php echo CHtml::hiddenField('active[]',true)?>
		<?php echo CHtml::checkBox('active[]',true,array('disabled'=>'disabled'));?>
	</td>
	<td>
		<a href="#" class="deleteRow">delete</a>
	</td>
</tr>