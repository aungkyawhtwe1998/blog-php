<?php session_start();?>
<?php require_once "front_panel/head.php"; ?>
<title>Home</title>


<?php require_once "front_panel/site_header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">

                    <li class="breadcrumb-item active" aria-current="page">
                        Home
                    </li>
                </ol>
            </nav>
            <div class="dropdown mb-4 text-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather-calendar"></i> Sort
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="?order_by=created_at&order_type=asc">
                        <i class="feather-arrow-down-circle"></i> Oldest to Newest</a>
                    <a class="dropdown-item" href="?order_by=created_at&order_type=desc">
                        <i class="feather-arrow-up-circle"></i>Newest to Oldest</a>
                    <a class="dropdown-item" href="">
                        <i class="feather-lists"></i>Default</a>
                </div>
            </div>
            <?php
            if(isset($_GET['order_by']) && isset($_GET['order_type'])){
                $orderCol = $_GET['order_by'];
                $orderType = strtoupper($_GET['order_type']);
                $posts =fposts($orderCol, $orderType);
            }else{
                $posts= fposts();              
            }                
            foreach ($posts as $p){?>
            <?php include "single_post.php";?>
            <?php 
            }
            ?>
        </div>
        <?php require_once "right_side_bar.php";?>

    </div>
</div>
<?php require_once "front_panel/footer.php"; ?>