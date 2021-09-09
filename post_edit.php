<?php include "core/auth.php"; ?>
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
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>
                        <i class="feather-plus-circle text-primary"></i> Add Posts
                    </h4>
                    <a href="<?php echo $url;?>/post_list.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>
                <?php
                $id = $_GET['id'];
                $current = post($id);
                if(isset($_POST['updatePost'])){
                     if(postUpdate()){
                         linkTo("post_list.php");
                     }
                }
                ?>
                <form action="#" method="post">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $current['title'] ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Select Category</label>
                        <select name="category_id" class="custom-select ">
                            <?php 
                                foreach (categories() as $c)
                            { ?>

                            <option value="<?php echo $current['id'];?>"
                                <?php echo $c['id']==$current['category_id']?"selected":""?>>
                                <?php echo $c['title'];?></option>
                            <?php    
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea type="text" name="description" rows="15" class="form-control" required>
                        <?php echo $current['description']?>
                        </textarea>
                    </div>
                    <hr>
                    <button class="btn btn-warning" name="updatePost"> Update Post</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php include "template/footer.php";?>