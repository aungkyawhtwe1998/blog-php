<?php require_once "front_panel/head.php"; ?>
<title>Home</title>

<?php require_once "front_panel/site_header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">

                    <li class="breadcrumb-item active">
                        <a href="<?php echo $url;?>/index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item " aria-current="page">
                        <?php echo category($_GET['category_id'])['title'];?>
                    </li>
                </ol>
            </nav>
            <?php foreach (fPostByCategory($_GET['category_id']) as $p){?>
            <?php include "single_post.php";?>
            <?php
            }
            ?>
        </div>
        <?php require_once "right_side_bar.php";?>

    </div>
</div>
<?php require_once "front_panel/footer.php"; ?>