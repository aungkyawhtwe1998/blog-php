<div class="col-12 col-md-4">
    <div class="front-panel-right-sidebar">
        <div class="card mb-4">
            <div class="card_body">
                <?php if(isset($_SESSION['user']['id'])){?>
                <p>
                    Hi <?php echo $_SESSION['user']['name'];?>
                </p>
                <a href="dashboard.php" class="btn btn-primary">Go Dashboard</a>
                <?php } else{?>
                <p>Hi <b>Guest</b></p>
                <a href="register.php" class="btn btn-primary">Register Here</a>
                <?php }?>
            </div>
        </div>
        <h4>Categories List</h4>
        <div class="list-group mb-4">
            <a href="<?php echo $url ;?>/index.php"
                class="list-group-item list-group-item-action <?php echo isset($_GET['category_id'])?'':'active';?>"
                aria-current="true">
                All Categories
            </a>
            <?php foreach (fcategories() as $c){?>
            <a href="category_based_post.php?category_id=<?php echo $c['id'];?>"
                class="list-group-item list-group-item-action <?php echo isset($_GET['category_id'])? $_GET['category_id'] == $c['id']?'active':'':'';?>"
                aria-current="true ">
                <?php if($c['ordering']==1){?>
                <i class="feather-paperclip text-primary"></i>
                <?php } ?>
                <?php echo $c['title'];?>
            </a>
            <?php
                }
                ?>

        </div>
        <hr>
        <!-- <div class="mb-4">
            <h4>Advertisement</h4>
            <img src="<?php echo $url;?>/assets/img/ad.png" class="rounded w-100" alt="">
        </div>
        <hr> -->

        <div class="">
            <h4>Search By Date</h4>

            <div class="card">
                <div class="card-body">
                    <form action="search_by_date.php" method="post">
                        <div class="fomr-group mb-4">
                            <label for="">Start Date</label>
                            <input type="date" name="start" id="" class="form-control" required>
                        </div>
                        <div class="fomr-group mb-4">
                            <label for="">End Date</label>
                            <input type="date" name="end" id="" class="form-control" required>
                        </div>
                        <button class="btn btn-primary">
                            <i class="feather-calendar"></i> Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>