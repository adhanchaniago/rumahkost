<script src="../../../public/vendor/MaterialBootstrap/js/jquery-3.4.1.min.js"></script>

<?php
if (isset($_GET['alert_simpan'])) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data!</strong> Data berhasil di simpan.
            </div>';
}

if (isset($_GET['alert_edit'])) {
  echo '<div class="alert alert-warning alert-dismissible fade show da" role="alert">
                <strong>Update Data!</strong> Data berhasil di update.
            </div>';
}

if (isset($_GET['alert_hapus'])) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hapus Data!</strong> Data berhasil di hapus.
            </div>';
}

if (isset($_GET['alert_terpakai'])) {
  echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Data tidak terhapus!</strong> Data sedang di gunakan.
            </div>';
}

if (isset($_GET['alert_arsip_berhasil'])) {
  echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Arsip Data!</strong> Data Berhasil Di Arsip.
            </div>';
}

if (isset($_GET['alert_arsip_batal'])) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Arsip Data!</strong> Data Di Batalkan.
            </div>';
}
?>

<script>
  $(document).ready(function() {
    setInterval(function() {
      $(".alert").hide(900);
    }, 5000);
  })
</script>