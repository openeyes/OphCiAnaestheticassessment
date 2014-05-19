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
	<div class="element-data">
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('exclusion_criteria_met'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php echo $element->exclusion_criteria_met ? 'Yes' : 'No'?>
				</div>
			</div>
		</div>
		<?php if ($element->exclusion_criteria_met) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('exclusion_factors'))?></div></div>
				<div class="large-9 column end">
					<div class="data-value">
						<?php if (!empty($element->exclusion_factors)) {
							foreach ($element->exclusion_factors as $exclusion_factor) {
								echo $exclusion_factor->name."<br/>";
							}
						}else{?>
							None
						<?php }?>
					</div>
				</div>
			</div>
		<?php }?>
		<?php if (empty($element->exclusion_factors)) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('risk_factors_a'))?></div></div>
				<div class="large-9 column end">
					<div class="data-value">
						<?php if (!empty($element->risk_factors_a)) {
							foreach ($element->risk_factors_a as $risk_factor) {
								echo $risk_factor->name."<br/>";
							}
						}else{?>
							None
						<?php }?>
					</div>
				</div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('risk_factors_b'))?></div></div>
				<div class="large-9 column end">
					<div class="data-value">
						<?php if (!empty($element->risk_factors_b)) {
							foreach ($element->risk_factors_b as $risk_factor) {
								echo $risk_factor->name."<br/>";
							}
						}else{?>
							None
						<?php }?>
					</div>
				</div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label">Risk level</div></div>
				<div class="large-9 column end">
					<div class="data-value riskLevel <?php echo $element->riskLevelColour?>">
						<?php echo $element->riskLevel?> (<?php echo $element->riskScore?> point<?php echo $element->riskScore == 1 ? '' : 's'?>)
					</div>
				</div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label">Prophylaxis required</div></div>
				<div class="large-9 column end">
					<div class="data-value">
						<?php echo $element->prophylaxisRequired?>
					</div>
				</div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('stocking_contraindications'))?></div></div>
				<div class="large-9 column end">
					<div class="data-value">
						<?php if (!empty($element->stocking_contraindications)) {
							foreach ($element->stocking_contraindications as $contraindication) {
								echo $contraindication->name."<br/>";
							}
						}else{?>
							None
						<?php }?>
					</div>	
				</div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('heparin_contraindications'))?></div></div>
				<div class="large-9 column end">
					<div class="data-value">
						<?php if (!empty($element->heparin_contraindications)) {
							foreach ($element->heparin_contraindications as $contraindication) {
								echo $contraindication->name."<br/>";
							}
						}else{?>
							None
						<?php }?>
					</div>
				</div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('prophylaxis_ordered'))?></div></div>
			<div class="large-9 column end">
				<div class="data-value">
					<?php echo $element->prophylaxis_ordered ? 'Yes' : 'No'?>
				</div>
			</div>
		</div>
	</div>
