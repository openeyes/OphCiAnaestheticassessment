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
		if (!@$other_text) {
			$other_text = 'Other (please specify)';
		}?>
		<?php if (!@$dont_show_boolean_field) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel($boolean_field))?>:</div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->$boolean_field ? 'Yes' : 'No'?></div></div>
			</div>
		<?php }?>
		<?php if ($element->$boolean_field) {?>
			<?php if (!empty($relations)) {
				foreach ($relations as $relation) {?>
					<div class="row data-row">
						<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel($relation))?>:</div></div>
						<div class="large-9 column end"><div class="data-value"><?php if (!$element->$relation) {?>
										None
									<?php } else {?>
											<?php foreach ($element->$relation as $item) {
												echo $item->name?><br/>
											<?php }?>
									<?php }?>
						</div></div>
					</div>
					<?php if (@$other_field && $element->hasMultiSelectValue($relation,$other_text)) {?>
						<div class="row data-row">
							<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel($other_field))?>:</div></div>
							<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->$other_field)?></div></div>
						</div>
					<?php }?>
				<?php }
			}
			if (!empty($text_fields)) {
				foreach ($text_fields as $text_field) {?>
					<div class="row data-row">
						<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel($text_field))?>:</div></div>
						<div class="large-9 column end"><div class="data-value"><?php echo str_replace("\n",'<br/>',CHtml::encode($element->$text_field))?></div></div>
					</div>
				<?php }
			}
		}?>
