<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>My App</title>
    <!-- Favicon-->
    <link href="/four_seasons/assets/css/bootstrap.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">

    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col">

                    <div class="">
                        <div class="rounded d-flex justify-content-center">
                            <div class="shadow-lg p-lg-5 p-sm-3 bg-light rounded-1 mt-4">
                                <div class="text-center">
                                    <h4 class="secondery-font pt-2">four<span class="text-main">Sea</span>sons</h4>

                                    <h3 class="">Sign In</h3>
                                </div>
                                <form action="" method="post">

                                    <!-- -->
                                    <div class="p-4">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-main"><i class="fa fa-user"></i></span>
                                            <input type="text" name="username" style="border-color: #f0e4e499;box-shadow: unset;height:55px" class="form-control signin-form" placeholder="Username">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-main"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" name="password" style="border-color: #f0e4e499;box-shadow: unset;height:55px" class="form-control signin-form" placeholder="password">
                                        </div>
                                        <div class="form-check">
                                            <p style="color:red">
                                                <?php isset($_SESSION['errorMsg']) ? $_SESSION['errorMsg'] : "";
                                                unset($_SESSION['errorMsg']);
                                                ?>
                                            </p>
                                        </div>
                                        <div class="w-100 text-center mt-4">
                                            <button class="mainbtn text-center mt-2 " type="submit">
                                                Sign In
                                            </button>
                                        </div>
                                        <p class="text-center  mt-2"><a href="password.html" class="forgot-password">Forgot your password?</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- Core theme JS-->

<script src="/four_seasons/assets/js/bootstrap.js"></script>
</body>

</html>