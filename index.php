<?php
// Define a constant
define('ROOT_PATH', '/four_seasons/');
define('BASE_PATH', __DIR__);

require_once('inc/app.php');
require_once('pages/admin/db.php');

// =======================================================
$pageName = myAppRequestRoute();
if ($pageName == "signin" || $pageName == "admin/home") {
  if (isset($_SESSION['isSignedIn'])) {
    // Redirect to /
    header("Location: " . ROOT_PATH . 'admin/menu');
    exit;
  } else if (isset($_POST['username']) && isset($_POST['password'])) {
    $username            = $_POST['username'];
    $password            = $_POST['password'];
    $sql = "select * from admin where username = '$username' and password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $_SESSION['isSignedIn'] = true;
      $_SESSION['username'] = $username;
      header("Location: " . ROOT_PATH . 'admin/menu');
      exit;
    } else {

      $_SESSION["errorMsg"] = "user name or password invalid .";
      header("Location: " . ROOT_PATH . 'admin');
      exit;
    }
  }
} else if ($pageName == "signout") {
  myAppSignout();
  // Redirect to /
  header("Location: " . ROOT_PATH . "admin");
  exit;
}
// =========================================================
$filePath = 'pages/' . $pageName . '.php';
if (file_exists($filePath)) {
  if (str_contains($filePath, "admin")) {
    require_once('layout/admin_header.php');
    require_once($filePath);
    require_once('layout/admin_footer.php');
  } else {
    require_once('layout/header.php');
    require_once($filePath);
    require_once('layout/footer.php');
  }
} else {
  require_once('layout/header.php');
  require_once('pages/notfound.php');
  require_once('layout/footer.php');
}
