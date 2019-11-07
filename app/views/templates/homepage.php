<?php include '../templates/linkfooter.php' ?>
<?php include '../templates/navadmin.php' ?>

<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark elegant-color">
  <a class="navbar-brand" href="../views/v_frontend.php">Coast Kostan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <?php
      if (!isset($_SESSION['Login'])) {
        echo '<button class="btn btn-outline-white btn-sm" type="button" data-target="#modallogin" data-toggle="modal">Log In</button>';
      } else {
        echo '<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>' . $_SESSION['Login']['username'] . '</span>
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="..\views\v_dashboard.php">Dashboard</a>
          <a class="dropdown-item" href="..\models\auth\logout.php">Log out</a>
        </div>
      </li>';
      }
      ?>

    </ul>
  </div>
</nav>
<!--/.Navbar -->

<?php include '../templates/linkheader.php' ?>