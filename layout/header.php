<?php
$current_page = isset($pageName) ? $pageName : 'home';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/four_seasons/assets/images/imageico.ico" type="image/jpeg">
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/assets/css/main.css">
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/assets/vendors/fontawesome-free-6.4.2-web/css/all.css">
  <title>Four Seasons </title>
</head>

<body>

  <header id="header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid text-center">
          <a class="navbar-brand secondery-font fs-4" href="#" style="font-weight: 600;">four<span class="text-main p-1">Sea</span>sons</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link <?php if ($current_page == 'home') echo 'active'; ?>" aria-current="page" href="home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if ($current_page == 'menu') echo 'active'; ?>" aria-current="page" href="menu">Menu</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#About">About</a>
              </li> -->
              <!-- <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#Chefs">Chefs</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link <?php if ($current_page == 'contact') echo 'active'; ?>" aria-current="page" href="contact">Contact</a>
              </li>
            </ul>
            <div class="d-flex justify-content-center">
              <a class="mainbtn" aria-current="page" href="./bookingTable">Book a Table</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var links = document.querySelectorAll('header nav ul li a');

      links.forEach(function(link) {
        link.addEventListener('click', function() {
          links.forEach(function(link) {
            link.classList.remove('active');
          });
          this.classList.add('active');
        });
      });
    });
  </script>
  <main class="mb-5">