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
<tr>
	<td>
		<?php if ($edit) {?>
			<input type="hidden" name="investigation_row_ids[]" value="<?php echo $investigation->id?>" />
			<?php echo CHtml::dropDownList('investigation_ids[]',$investigation->investigation_id,$investigation->investigations,array('empty' => '- Select -','class' => 'investigationType','style' => $investigation->investigation_text ? 'display: none' : ''))?>
			<?php echo CHtml::textField('investigation_text[]',$investigation->investigation_text,array('style' => $investigation->investigation_text ? '' : 'display: none'))?>
		<?php }else{?>
			<?php echo $investigation->investigation->name?>
		<?php }?>
	</td>
	<td>
		<?php if ($edit) {?>
			<?php echo CHtml::hiddenField('ordered[]',0,$investigation->ordered ? array('disabled'=>'disabled') : array())?>
			<?php echo CHtml::checkBox('ordered[]',$investigation->ordered)?>
		<?php }else{?>
			<?php echo $investigation->ordered ? 'Yes' : 'No'?>
		<?php }?>
	</td>
	<td>
		<?php if ($edit) {?>
			<?php echo CHtml::hiddenField('reviewed[]',0,$investigation->reviewed ? array('disabled'=>'disabled') : array())?>
			<?php echo CHtml::checkBox('reviewed[]',$investigation->reviewed)?>
		<?php }else{?>
			<?php echo $investigation->reviewed ? 'Yes' : 'No'?>
		<?php }?>
	</td>
	<td>
		<?php if ($edit) {?>
			<?php echo CHtml::textField('result[]',$investigation->result)?>
		<?php }else{?>
			<?php echo $investigation->result ? $investigation->result : '-'?>
		<?php }?>
	</td>
	<?php if ($edit) {?>
		<td>
			<a href="#" class="removeInvestigation">remove</a>
		</td>
	<?php }?>
</tr>
