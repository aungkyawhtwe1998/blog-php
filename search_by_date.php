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
                        Search Posts between "<?php echo $_POST['start'];?>" and "<?php echo $_POST['end'];?>"
                    </li>
                </ol>
            </nav>
            <div class="">

                <?php 
                 $result = fSearchByDate($_POST['start'],$_POST['end']);
                if(count($result)==0){
                   echo alert("There is no matched result", "warning");
                }
                ?>
                <?php foreach ($result as $p){?>

                <?php include "single_post.php";?>
                <?php
                }
                ?>
            </div>
            </a>

        </div>
        <?php require_once "right_side_bar.php";?>

    </div>
</div>
<?php require_once "front_panel/footer.php"; ?>