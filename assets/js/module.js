
/* Module-specific javascript can be placed here */

$(document).ready(function() {
	handleButton($('#et_save'),function() {
	});
	
	handleButton($('#et_cancel'),function(e) {
		if (m = window.location.href.match(/\/update\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/update/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+OE_patient_id;
		}
		e.preventDefault();
	});

	handleButton($('#et_deleteevent'));

	handleButton($('#et_canceldelete'));

	handleButton($('#et_print'),function(e) {
		printIFrameUrl(OE_print_url, null);
		enableButtons();
		e.preventDefault();
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});

	$('#Element_OphCiAnaestheticassessment_Examination_weight_kg').change(function() {
		$('#Element_OphCiAnaestheticassessment_Examination_weight_lb').val(parseFloat($(this).val() * 2.20462).toFixed(1));
	});

	$('#Element_OphCiAnaestheticassessment_Examination_weight_lb').change(function() {
		$('#Element_OphCiAnaestheticassessment_Examination_weight_kg').val(parseFloat($(this).val() / 2.20462).toFixed(1));
	});

	$('#Element_OphCiAnaestheticassessment_Examination_height_cm').change(function() {
		if ($('#Element_OphCiAnaestheticassessment_Examination_height_cm').val() != '') {
			var ft = Math.floor($(this).val() * 0.032808399);
			var inch = Math.round(($(this).val() - (ft / 0.032808399)) * 0.393700787);

			$('#Element_OphCiAnaestheticassessment_Examination_height_ft').val(ft);
			$('#Element_OphCiAnaestheticassessment_Examination_height_in').val(inch);
		}
	});

	$('#Element_OphCiAnaestheticassessment_Examination_height_ft').change(function() {
		if ($('#Element_OphCiAnaestheticassessment_Examination_height_ft').val() != '') {
			$('#Element_OphCiAnaestheticassessment_Examination_height_cm').val(Math.round(($('#Element_OphCiAnaestheticassessment_Examination_height_ft').val() * 30.48) + ($('#Element_OphCiAnaestheticassessment_Examination_height_in').val() * 2.54)));
		}
	});

	$('#Element_OphCiAnaestheticassessment_Examination_height_in').change(function() {
		if ($('#Element_OphCiAnaestheticassessment_Examination_height_in').val() != '') {
			$('#Element_OphCiAnaestheticassessment_Examination_height_cm').val(Math.round(($('#Element_OphCiAnaestheticassessment_Examination_height_ft').val() * 30.48) + ($('#Element_OphCiAnaestheticassessment_Examination_height_in').val() * 2.54)));
		}
	});

	$('.addInvestigation').click(function(e) {
		e.preventDefault();

		$.ajax({
			'type': 'GET',
			'url': baseUrl+'/OphCiAnaestheticassessment/default/addInvestigation',
			'success': function(html) {
				$('.investigations tbody').append(html);
				$('.investigations tbody tr.no_investigations').hide();
			}
		});
	});

	$('.removeInvestigation').live('click',function(e) {
		e.preventDefault();

		$(this).closest('tr').remove();

		if ($('.investigations tbody tr').length == 1) {
			$('.investigations tbody tr.no_investigations').show();
		}
	});

	$('.investigationType').live('change',function() {
		if ($(this).val() == 'other') {
			$(this).hide();
			$(this).next('input').show().focus();
		}
	});

	$('input[name="ordered[]"][type="checkbox"]').live('click',function() {
		if ($(this).is(':checked')) {
			$(this).prev('input[type="hidden"]').attr('disabled','disabled');
		} else {
			$(this).prev('input[type="hidden"]').removeAttr('disabled');
		}
	});

	$('input[name="reviewed[]"][type="checkbox"]').live('click',function() {
		if ($(this).is(':checked')) {
			$(this).prev('input[type="hidden"]').attr('disabled','disabled');
		} else {
			$(this).prev('input[type="hidden"]').removeAttr('disabled');
		} 
	});

	$('#MultiSelect_ExclusionFactors').bind('MultiSelectChanged',function(e) {
		if ($(this).parent().next('ul').children().length == 0) {
			$('#dvt_excluded_fields').slideDown('fast');
		} else {
			$('#dvt_excluded_fields').slideUp('fast');
		}
	});

	$('#MultiSelect_RiskFactors_A').bind('MultiSelectChanged',function(e) {
		update_risk_prophylaxis();
	});

	$('#MultiSelect_RiskFactors_B').bind('MultiSelectChanged',function(e) {
		update_risk_prophylaxis();
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}

function medication_in_list(drug_id,start_date)
{
	var drug_ids = [];
	var start_dates = [];

	$('input[name="drug_ids[]"]').map(function() {
		drug_ids.push($(this).val());
	});

	$('input[name="start_dates[]"]').map(function() {
		start_dates.push($(this).parent().text().trim());
	});

	for (var i in drug_ids) {
		if (drug_ids[i] == drug_id && start_dates[i] == start_date) {
			return true;
		}
	}

	return false;
}

function update_risk_prophylaxis()
{
	var data = $('.event-content form').serialize();

	$.ajax({
		'type': 'POST',
		'url': baseUrl+'/OphCiAnaestheticassessment/default/riskProphylaxis',
		'data': $('.event-content form').serialize(),
		'dataType': 'json',
		'success': function(data) {
			$('#div_Element_OphCiAnaestheticassessment_DvtAssessment_Risk_Level .riskLevel').text(data['riskLevel']);
			$('#div_Element_OphCiAnaestheticassessment_DvtAssessment_Risk_Level .riskLevel').removeClass('red').removeClass('green').removeClass('blue').addClass(data['riskLevelColour']);

			$('#div_Element_OphCiAnaestheticassessment_DvtAssessment_Prophylaxis_required .prophylaxisRequired').html(data['prophylaxisRequired'].replace(/\n/g,'<br/>'));
		}
	});
}
