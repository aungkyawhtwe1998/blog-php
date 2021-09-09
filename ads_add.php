<?php include "core/auth.php";?>
<?php include "core/isEditor&Admin";?>
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
                if(isset($_POST['addAds'])){
                     adsAdd();
                }
                ?>

                <form method="post">
                    <div class="form-group">
                        <label for="">Ads Owner Name</label>
                        <input type=" text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ads Image Link</label>
                        <input type="text" name="img" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Website Link</label>
                        <input type="text" name="link" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Start Date</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">End Date</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>

                    <button class="btn btn-primary" name="addAds">Add Ads</button>
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