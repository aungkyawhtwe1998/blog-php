<?php 
    require_once "core/base.php";
    require_once "core/function.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/animate_it/animate.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
</head>

<body style="background: var(--primary-soft)">
    <div class="container">
        <div class="row min-vh-100 justify-content-center align-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center text-primary">
                            <i class="feather-user"></i>

                            User Register
                        </h4>
                        <hr>

                        <?php
                        if(isset($_POST['reg-btn'])){
                            echo register();
                        }
                        ?>
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for=""><i class="text-primary feather-user"></i> User Name</label>
                                <input type="text" class="form-control" name="name" required>

                            </div>
                            <div class="form-group">
                                <label for=""><i class="text-primary feather-mail"></i> User Email</label>
                                <input type="email" class="form-control" name="email" required>

                            </div>
                            <div class="form-group">
                                <label for=""><i class="text-primary feather-lock"></i> User Password</label>
                                <input type="password" min="8" class="form-control" name="password" required>

                            </div>
                            <div class="form-group">
                                <label for=""><i class="text-primary feather-lock"></i> Confirm Password</label>
                                <input type="password" min="8" class="form-control" name="c-password" required>

                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary" name="reg-btn">Register</button>
                                <a href="login.php" class="btn btn-outline-primary">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="<?php echo $url ?>/assets/vendor/jquery-3.6.0.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="<?php echo $url ?>/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?php echo $url ?>/assets/vendor/way_point/jquery.waypoints.js"></script>
    <script src="<?php echo $url ?>/assets/vendor/counter_up/counter_up.js"></script>
    <script src="<?php echo $url ?>/assets/js/app.js"></script>
    <script src="<?php echo $url ?>/assets/vendor/chart_js/chart.min.js"></script>
    <script src="<?php echo $url ?>/assets/js/dashboard.js"></script>

    <script>
        let currentPage = location.href;
        $(".menu-item-link").each(function () {
            let links = $(this).attr("href");
            if (currentPage == links) {
                $(".menu-item-link").removeClass('active');
                $(this).addClass('active');
            }
        });
    </script>
</body>

</html>