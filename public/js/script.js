$(document).ready(function () {
	$("#dt").DataTable();
	$('.uang').mask('0.000.000.000', {
		reverse: true
	});
	$('.telp').mask('0000-0000-00000');
	$(".mbd-select").material_select();
	$("select[name='dt_length']").addClass('d-inline');
});