
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
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}
