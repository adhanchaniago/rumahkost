$(document).ready(function () {

	// Material Select
	$(document).ready(function () {
		$('.mdb-select').materialSelect();
	});

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

	// Khusus Periode
	// Transaksi Token
	$('.datatoken').load('data_transaksi_token.php');
	$('.bulan').change(function () {
		var data = $(this).val();
		$('.datatoken').load('data_transaksi_token.php?datatoken=' + data);
	});

	// Transaksi Kamar
	$('.datakamar').load('data_transaksi_kamar.php');
	$('.bulan').change(function () {
		var data = $(this).val();
		$('.datakamar').load('data_transaksi_kamar.php?datakamar=' + data);
	});

	// KHUSUS GET //
	// Transaksi Listrik
	$("#idbiaya").change(function () {
		var idbiaya = $("#idbiaya").val();
		$("#token").load("../../views/get/getlistrik.php?idbiaya=" + idbiaya);
	});
	// Transaksi Kamar
	$("#idpenyewa0").change(function () {
		var idpenyewa = $("#idpenyewa0").val();
		$("#kamar").load("../../views/get/getkodekamar.php?idpenyewa=" + idpenyewa);
	});
	// Tarif Transaksi Kamar
	$("#idpenyewa0").change(function () {
		var tarif = $("#idpenyewa0").val();
		$("#tarif").load("../../views/get/gettarif.php?idpenyewa=" + tarif);
	});

});