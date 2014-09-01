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
	<?php echo $form->radioBoolean($element, 'exclusion_criteria_met', array('class' => 'linked-fields','data-linked-fields' => 'exclusion_factors', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->multiSelectList($element, 'exclusion_factors', 'exclusion_factors', 'exclusion_factor_id', CHtml::listData(OphCiAnaestheticassessment_DVT_Exclusion_Factor::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Exclusion factors'),!$element->exclusion_criteria_met,false,null,false,false,array('label' => 3,'field' => 5))?>
	<div class="exclusionFields"<?php if ($element->exclusion_criteria_met) {?> style="display: none"<?php }?>>
		<?php echo $form->multiSelectList($element, 'risk_factors', 'risk_factors', 'risk_factor_id', CHtml::listData(OphCiAnaestheticassessment_DVT_Risk_Factor::model()->findAll(array('order'=>'name asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Risk factors'),false,false,null,false,false,array('label' => 3,'field' => 5))?>
		<div id="div_Element_OphCiAnaestheticassessment_DvtAssessment_Risk_Level" class="eventDetail row field-row widget">
			<div class="large-3 column">
				<label for="Element_OphCiAnaestheticassessment_DvtAssessment_Risk_Level">
					Risk level
				</label>
			</div>
			<div class="large-4 column end riskLevel <?php echo $element->riskLevelColour?>">
				<?php echo $element->riskLevel?> (<?php echo $element->riskScore?> point<?php echo $element->riskScore == 1 ? '' : 's'?>)
			</div>
		</div>
		<div id="div_Element_OphCiAnaestheticassessment_DvtAssessment_Prophylaxis_required" class="eventDetail row field-row widget">
			<div class="large-3 column">
				<label for="Element_OphCiAnaestheticassessment_DvtAssessment_Prophylaxis_required">
					Prophylaxis required
				</label>
			</div>
			<div class="large-9 column end prophylaxisRequired">
				<?php echo str_replace("\n","<br/>",$element->prophylaxisRequired)?>
			</div>
		</div>
		<?php echo $form->multiSelectList($element, 'stocking_contraindications', 'stocking_contraindications', 'contraindication_id', CHtml::listData(OphCiAnaestheticassessment_DVT_Stocking_Contraindication::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Contraindications to graduated compression stockings'),false,false,null,false,false,array('label' => 3,'field' => 5),false,true)?>
		<?php echo $form->multiSelectList($element, 'heparin_contraindications', 'heparin_contraindications', 'contraindication_id', CHtml::listData(OphCiAnaestheticassessment_DVT_Heparin_Contraindication::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Contraindications to low molecular weight heparin (LMWH)'),false,false,null,false,false,array('label' => 3,'field' => 5),false,true)?>
		<div class="field-row row">
			<div class="large-3 column"><div class="data-label">Prophylaxis ordered:</div></div>
			<div class="large-9 column">
				<?php echo $form->checkBox($element, 'prophylaxis_ordered', array('nowrapper' => true))?>
			</div>
		</div>
	</div>
</div>
