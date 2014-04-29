
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

	$('.addMedication').click(function(e) {
		e.preventDefault();

		$('.saveMedication').text('Add');
		$('#_edit_row_id').val('');

		$('.addMedicationFields').slideDown('fast');

		$(this).slideUp('fast');

		$('#autocomplete_drug_id').focus();
	});

	$('.saveMedication').click(function(e) {
		e.preventDefault();

		var i = 0;

		$('.medications thead tr').map(function() {
			if ($(this).attr('id') && parseInt($(this).attr('id').replace(/t/,'')) >= i) {
				i = parseInt($(this).attr('id').replace(/t/,'')) + 1;
			}
		});

		$.ajax({
			'type': 'POST',
			'url': baseUrl+'/OphCiAnaestheticassessment/default/validateMedication',
			'data': 'YII_CSRF_TOKEN='+YII_CSRF_TOKEN+'&drug_id='+$('#_medication_id').val()+'&route_id='+$('#route_id').val()+'&frequency_id='+$('#frequency_id').val()+'&start_date='+$('#start_date').val()+'&i='+i,
			'dataType': 'json',
			'success': function(resp) {
				$('.medicationErrorList').html('');

				if (resp['status'] == 'error') {
					for (var i in resp['errors']) {
						$('.medicationErrorList').append('<li>'+resp['errors'][i]);
					}

					$('.medicationErrors').show();
				} else {
					$('.medicationErrors').hide();

					if ($('#_edit_row_id').val() != '' || !medication_in_list($('#_medication_id').val(),$('#start_date').val())) {
						$('.medications tr.no_medications').hide();

						if ($('#_edit_row_id').val() == '') {
							$('.medications tbody').append(resp['row']);
						} else {
							$('#'+$('#_edit_row_id').val()).replaceWith(resp['row']);
						}
						var i = 0;
						$('.medications tbody tr').map(function() {
							$(this).attr('id','t'+i);
							i += 1;
						});
						$('.cancelMedication').click();
					} else {
						$('.medicationErrorList').append('Medication is already in the list for the given date');
						$('.medicationErrors').show();
					}
				}
			}
		});
	});

	$('.editMedication').live('click',function(e) {
		e.preventDefault();

		$('#_medication_id').val($(this).data('drug-id'));
		$('.medicationName span').text($(this).data('drug-name'));
		$('#route_id').val($(this).data('route-id'));
		$('#option_id').val($(this).data('option-id'));
		$('#frequency_id').val($(this).data('frequency-id'));
		$('#start_date').val($(this).data('start-date'));
		$('#_edit_row_id').val($(this).closest('tr').attr('id'));

		$('.saveMedication').text('Update');

		$('.addMedicationFields').slideDown('fast');

		$('.addMedication').slideUp('fast');
	});

	$('.removeMedication').live('click',function(e) {
		e.preventDefault();

		$(this).closest('tr').remove();

		if ($('.medications tbody tr').length == 1) {
			$('.medications tr.no_medications').show();
		}
	});

	$('.cancelMedication').click(function(e) {
		e.preventDefault();

		$('.addMedicationFields').slideUp('fast');

		$('.addMedication').slideDown('fast');

		$('#medication_id').val('');
		$('#autocomplete_drug_id').val('');
		$('#route_id').val('');
		$('#option_id').html('<option value="">- Select -</option>');
		$('#option_id').val('');
		$('#frequency_id').val('');
		$('#start_date').val('');
		$('.medicationName span').html('None selected');
		$('#_medication_id').val('');
	});

	$('#medication_id').change(function(e) {
		$('.medicationName span').html($(this).children('option:selected').text());
		$('#_medication_id').val($(this).children('option:selected').val());
		$(this).val('');
	});

	$('#route_id').change(function() {
		var route_id = $(this).val();

		if (route_id != '') {
			$.ajax({
				'type': 'GET',
				'url': baseUrl+'/OphCiAnaestheticassessment/default/routeOptions?route_id='+route_id,
				'success': function(html) {
					$('#option_id').html(html);
				}
			});
		} else {
			$('#option_id').html('<option value="">- Select -</option>');
		}
	});

	$('.addAllergy').click(function(e) {
		e.preventDefault();

		$('.addAllergyFields').slideDown('fast');

		$(this).slideUp('fast');
	});

	$('#allergy_id').change(function(e) {
		if ($(this).val() != '') {
			$('.allergies tbody').append('<tr><td>'+$(this).children('option:selected').text()+'<input type="hidden" name="allergies[]" value="'+$(this).val()+'" /></td><td><a href="#" class="removeAllergy">remove</a></td></tr>');
			$('.allergies tbody tr.no_allergies').hide();
			$('#Element_OphCiAnaestheticassessment_MedicalHistoryReview_patient_has_no_allergies').removeAttr('checked');
			$('#Element_OphCiAnaestheticassessment_MedicalHistoryReview_patient_has_no_allergies').attr('disabled','disabled');
			$(this).children('option:selected').remove();

			$('.addAllergyFields').slideUp('fast');
			$('.addAllergy').slideDown('fast');
		}
	});

	$('.removeAllergy').live('click',function(e) {
		e.preventDefault();

		var name = $(this).closest('tr').children('td:first').text().trim();
		var id = $(this).closest('tr').children('td:first').children('input').val();

		$(this).closest('tr').remove();

		$('#allergy_id').append('<option value="'+id+'">'+name+'</option>');

		sort_selectbox($('#allergy_id'));

		if ($('.allergies tbody tr').length == 1) {
			$('.allergies tbody tr.no_allergies').show();
			$('#Element_OphCiAnaestheticassessment_MedicalHistoryReview_patient_has_no_allergies').removeAttr('disabled');
		}
	});

	$('.cancelAllergy').click(function(e) {
		e.preventDefault();

		$('.addAllergyFields').slideUp('fast');
		$('.addAllergy').slideDown('fast');
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
