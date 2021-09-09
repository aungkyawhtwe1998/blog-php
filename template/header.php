<?php require_once "core/base.php";?>
<?php require_once "core/function.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/data-table/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/animate_it/animate.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/data-table/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
</head>

<body>
    <div class="row">
        <!-- side bar -->
        <?php 
        include("template/side_bar.php");
        ?>
        <div class="col-12 col-lg-9 col-xl-10 py-3 vh-100 content" style="box-shadow:0 0 5px #00000020 inset;">
            <div class="row header mb-3">
                <div class="col-12">
                    <div class="p-2 bg-primary rounded d-flex justify-content-between align-items-center">
                        <button class="show-sidebar-btn btn btn-primary btn-link d-lg-none">
                            <i class="feather-menu text-light" style="font-size: 2em;"></i>
                        </button>

                        <form action="" method="post" class="d-none d-md-block">
                            <div class="form-inline d-flex">
                                <input type="text" class="form-control mr-2">
                                <button class="btn btn-light">
                                    <i class="feather-search"></i>
                                </button>
                            </div>
                        </form>

                        <div class="dropdown">
                            <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo $url ;?>/assets/img/user/<?php echo $_SESSION['user']['photo']?>"
                                    class="userimg" alt="">
                                <?php echo $_SESSION['user']['name'] ?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>