<?php include '../templates/linkheader.php' ?>

<style>
  html,
  body,
  header,
  .view {
    height: 100%;
  }

  @media (max-width: 740px) {

    html,
    body,
    header,
    .view {
      height: 1100px;
    }
  }

  @media (min-width: 800px) and (max-width: 850px) {

    html,
    body,
    header,
    .view {
      height: 700px;
    }
  }

  .top-nav-collapse {
    background-color: #39448c !important;
  }

  .navbar:not(.top-nav-collapse) {
    background: transparent !important;
  }

  @media (max-width: 991px) {
    .navbar:not(.top-nav-collapse) {
      background: #39448c !important;
    }
  }

  h6 {
    line-height: 1.7;
  }
</style>


<header>
  <div class="view" style="background-image: url('../../../public/img/fotokost/1.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-purple-strong d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5 mt-md-0 mt-5 white-text text-center text-md-left fadeInLeft">
            <h1 class="display-4 font-weight-bold">Terima Kost</h1>
            <hr class="hr-light">
            <h6 class="mb-3">Terima Kost adalah salah satu rumah kost terbaik di makassar. Rumah kost ini memiliki fasilitas dan kamar yang sangat memadai, Tidak hanya memiliki fasilitas dan kamar yang bagus lokasi dari Rumah Kost ini sangatlah strategis dimana di sekitarnya banyak terdapat area perbelanjaan yang dapat membantu jika ingin mendapatkan sesuatu.</h6>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-body z-depth-2">
                <div class="text-center">
                  <h3 class="purple-text">
                    <strong>LOGIN</strong>
                  </h3>
                  <?php Alert(); ?>
                </div>
                <form action="../../models/auth/login.php" method="POST">
                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="username" class="form-control">
                    <label for="username">Username</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" name="password" class="form-control">
                    <label for="password">Password</label>
                  </div>
                  <div class="text-center mt-5">
                    <button class="btn btn-purple btn-rounded" type="submit">SIGN UP</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<?php
if (isset($_SESSION['Login'])) {
  header('location:dashboard.php');
}
?>

<?php include '../templates/linkfooter.php' ?>