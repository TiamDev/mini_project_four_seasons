<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/four_seasons/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/four_seasons/assets/css/main.css">
  <link rel="stylesheet" href="/four_seasons/assets/css/dashboard.css">
  <link rel="icon" href="/four_seasons/assets/images/imageico.ico" type="image/jpeg">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="/four_seasons/assets/vendors/fontawesome-free-6.4.2-web/css/all.css">
  <link rel="stylesheet" href="/four_seasons/node_modules/sweetalert2/dist/sweetalert2.min.css">
  <title>Four Seasons</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

  </script>
  <script src="/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</head>

<body>

  <header id="header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid text-center">
          <a class="navbar-brand secondery-font fs-4" href="#" style="font-weight: 600;">four<span class="text-main p-1">Sea</span>sons</a>
          <div class="" id="">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            </ul>


            <?php
            if (isset($_SESSION['username'])) {
              echo '
                      <div class="d-flex justify-content-center">
                      <div class="dropdown">
                      <button class="user-account dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <div>
                      <h6 class="px-2 m-0">' . $_SESSION['username'] . '</h6>
                      <p class="px-2 sub-title-mager">Admin</p>
                      </div>
                         
                      <i class="fa fa-user px-2"></i>
                      </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item " href="' . ROOT_PATH . 'home">Home</a></li>
                  <li><a class="dropdown-item text-danger" href="' . ROOT_PATH . 'signout">Signout</a></li>
                </ul>
              </div>
            </div>
                      ';
            }
            ?>




          </div>
        </div>
      </nav>
    </div>
  </header>