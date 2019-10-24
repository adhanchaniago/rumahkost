$(document).ready(function () {
	// DataTables
	$("#dt").DataTable();

	//
	$(".uang").mask("0.000.000.000", {
		reverse: true
	});

	//
	$(".telp").mask("0000-0000-00000");

	//
	$("select[name='dt_length']").addClass("d-inline");

	// Get Listrik
	$("#idbiaya").change(function () {
		var id_biaya = $("#idbiaya").val();
		$("#token").load("../../views/get/getlistrik.php?idbiaya=" + id_biaya);
	});
});