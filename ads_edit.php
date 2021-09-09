<?php require_once "core/auth.php"?>
<?php include "template/header.php";?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="dashboard.html"><i class="feather-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/post_list.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Ads</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>
                        <i class="feather-box text-primary"></i> Ads Manager
                    </h4>
                </div>
                <hr>

                <?php
                $id = $_GET['id'];
                $current = ads($id);
                if(isset($_POST['updateAds'])){
                    if(adsUpdate()){
                        linkto("ads_add.php");
                    }
                }
                ?>
                <form action="#" method="post">
                    <input type="hidden" value="<?php echo $id?>" name="id">

                    <div class="form-group">
                        <label for="">Ads Owner Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $current['owner_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Ads Image Link</label>
                        <input type="text" name="img" class="form-control" value="<?php echo $current['photo'];?>">
                    </div>
                    <div class=" form-group">
                        <label for="">Website Link</label>
                        <input type="text" name="link" class="form-control" value="<?php echo $current['link'];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input type="date" name="start_date" class="form-control"
                            value="<?php echo $current['start'];?>">
                    </div>
                    <div class=" form-group">
                        <label for="">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo $current['end'];?>">
                    </div>

                    <button class=" btn btn-warning" name="updateAds">Update Ads</button>
                </form>
            </div>
        </div>
    </div>
    <?php include "ads_list.php"?>


</div>

<?php include "template/footer.php";?>

<?php include "template/footer.php";?>
<script>
    $(".table").dataTable({
        "order": [
            [3, "desc"]
        ]
    });
</script>