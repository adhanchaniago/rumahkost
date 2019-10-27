$(document).ready(function () {

	// DataTables
	$("#dt").DataTable();

	// Show Rows
	$("select[name='dt_length']").addClass("d-inline");

	// Format Rp/Uang
	$(".uang").mask("0.000.000.000", {
		reverse: true
	});

	// Format No.Telpon
	$(".telp").mask("0000-0000-00000");

	// Periode
	$('.data').load('v_data.php');
	$('.bulan').change(function () {
		var data = $(this).val();
		$('.data').load('v_data.php?data=' + data);
	});

	// KHUSUS GET //
	// Get Listrik
	$("#idbiaya").change(function () {
		var id_biaya = $("#idbiaya").val();
		$("#token").load("../../views/get/getlistrik.php?idbiaya=" + id_biaya);
	});
	//  Get Kamar

});