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
<tr<?php if ($edit) {?> id="t<?php echo $medication->id ? $medication->id : $i?>" data-medication-id="<?php echo $medication->id?>"<?php }?>>
	<td>
		<?php echo $medication->drug->name?>
		<?php if ($edit) {?>
			<input type="hidden" name="medication_ids[]" value="<?php echo $medication->id?>" />
			<input type="hidden" name="drug_ids[]" value="<?php echo $medication->drug_id?>" />
		<?php }?>
	</td>
	<td>
		<?php echo $medication->route->name?>
		<?php if ($edit) {?>
			<input type="hidden" name="route_ids[]" value="<?php echo $medication->route_id?>" />
		<?php }?>
	</td>
	<td>
		<?php echo $medication->option ? $medication->option->name : '-'?>
		<?php if ($edit) {?>
			<input type="hidden" name="option_ids[]" value="<?php echo $medication->option_id?>" />
		<?php }?>
	</td>
	<td>
		<?php echo $medication->frequency->name?>
		<?php if ($edit) {?>
			<input type="hidden" name="frequency_ids[]" value="<?php echo $medication->frequency_id?>" />
		<?php }?>
	</td>
	<td>
		<?php echo $medication->NHSDate('start_date')?>
		<?php if ($edit) {?>
			<input type="hidden" name="start_dates[]" value="<?php echo $medication->start_date?>" />
		<?php }?>
	</td>
	<?php if ($edit) {?>
		<td>
			<a href="#" class="editMedication" data-drug-id="<?php echo $medication->drug_id?>" data-drug-name="<?php echo $medication->drug->name?>" data-route-id="<?php echo $medication->route_id?>" data-option-id="<?php echo $medication->option_id?>" data-frequency-id="<?php echo $medication->frequency_id?>" data-start-date="<?php echo $medication->NHSDate('start_date')?>">edit</a>
			&nbsp;&nbsp;
			<a href="#" class="removeMedication">remove</a>
		</td>
	<?php }?>
</tr>
