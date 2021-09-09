<?php include "core/auth.php"; ?>
<?php include "core/isEditor&Admin"?>
<?php include "template/header.php";?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="dashboard.html"><i class="feather-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/post_list.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Post</li>
            </ol>
        </nav>
    </div>
</div>
<?php
if(isset($_POST['addPost'])){
postAdd();
}
?>
<form class="row" action="#" method="post">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>
                        <i class="feather-plus-circle text-primary"></i> Create N ew Posts
                    </h4>
                    <a href="<?php echo $url;?>/post_list.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>

                <div class="form-group">
                    <label for="">Post Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Post Description</label>
                    <textarea type="text" id="description" name="description" rows="15" class="form-control"
                        required></textarea>
                </div>

            </div>

        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>
                        <i class="feather-layers text-primary"></i> Select Categories
                    </h4>
                    <a href="<?php echo $url;?>/category_add.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>
                <div class="form-group">
                    <?php 
                    foreach (categories() as $c)
                    { ?>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio<?php echo $c['id']; ?>" name="category_id"
                            value="<?php echo $c['id'];?>" class="custom-control-input">
                        <label class="custom-control-label"
                            for="customRadio<?php echo $c['id']; ?>"><?php echo $c['title'];?></label>
                    </div>

                    <!-- <option value="<?php echo $c['id'];?>"><?php echo $c['title'];?></option> -->
                    <?php    
                    }
                    ?>

                </div>
                <button class="btn btn-primary" name="addPost"> Add Item</button>

            </div>
        </div>
    </div>
</form>
<?php include "template/footer.php";?>
<script>
    $('#description').summernote({
        placeholder: 'Write content here',
        tabsize: 2,
        height: 300,
    });
</script>