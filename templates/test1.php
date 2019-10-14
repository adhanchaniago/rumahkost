<?php include '../templates/linkheader.php' ?>

<title>Dashboard</title>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container">
    <a class="navbar-brand logo-font" href="#">
      Brand
    </a>
    <!-- links toggle -->
    <button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#links" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars"></i>
    </button>
    <!-- account toggle -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#account" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-user"></i>
    </button>

    <div class="collapse navbar-collapse" id="links">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Link 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link 3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link 4</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link 5</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Other
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Dropdown 1</a>
            <a class="dropdown-item" href="#">Dropdown 2</a>
            <a class="dropdown-item" href="#">Dropdown 3</a>
          </div>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="account">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="#">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Log in</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php include '../templates/linkfooter.php' ?>