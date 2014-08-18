<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2013
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
<tr<?php if ($edit) {?> data-category_id="<?php echo CHtml::encode($item->category_id)?>" data-booking_event_id="<?php foreach ($item->bookings as $j => $booking) { if ($j) echo ','; echo $booking->booking_event_id;}?>" data-instructions="<?php foreach ($item->instructions as $j => $instruction) { if ($j) echo ','; echo $instruction->id; }?>" data-multiselect-fields="instructions" data-i="<?php echo $i?>"<?php }?>>
	<td>
		<?php foreach ($item->bookings as $booking) {?>
			<strong><?php echo date('j M Y',strtotime($booking->bookingDate))?></strong>
			<?php echo $booking->eye->name?>
			<?php foreach ($booking->procedures as $j => $procedure) {?><?php if ($j) echo ', '?><?php echo $procedure->term?><?php }?>
			<br/>
		<?php }?>
	</td>
	<td>
		<?php foreach ($item->instructions as $instruction) {?>
			<?php echo $instruction->name?><br/>
		<?php }?>
	</td>
	<?php if ($edit) {?>
		<td>
			<div class="editRecordItemDiv">
				<a class="editRecordItem">edit</a>
				&nbsp;&nbsp;
			</div>
			<a class="deleteRecordItem">delete</a>
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[<?php echo $i?>][id]" value="<?php echo $item->id?>" />
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[<?php echo $i?>][category_id]" value="<?php echo CHtml::encode($item->category_id)?>" />
			<?php foreach ($item->bookings as $j => $booking) {?>
				<input type="hidden" name="<?php echo CHtml::modelName($item)?>[<?php echo $i?>][booking_event_id][<?php echo $j?>][id]" value="<?php echo $booking->id?>" />
				<input type="hidden" name="<?php echo CHtml::modelName($item)?>[<?php echo $i?>][booking_event_id][<?php echo $j?>][booking_event_id]" value="<?php echo $booking->booking_event_id?>" />
			<?php }?>
			<?php foreach ($item->instruction_assignments as $j => $instruction) {?>
				<input type="hidden" name="<?php echo CHtml::modelName($item)?>[<?php echo $i?>][instruction_id][<?php echo $j?>][id]" value="<?php echo $instruction->id?>" />
				<input type="hidden" name="<?php echo CHtml::modelName($item)?>[<?php echo $i?>][instruction_id][<?php echo $j?>][instruction_id]" value="<?php echo $instruction->instruction_id?>" />
			<?php }?>
		</td>
	<?php }?>
</tr>
