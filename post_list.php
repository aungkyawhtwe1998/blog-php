<?php include "core/auth.php"; ?>
<?php include "template/header.php";?>


<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/post_list.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>
                        <i class="feather-list text-primary"></i> Post Lists
                    </h4>
                    <div class="">
                        <a href="<?php echo $url;?>/post_add.php" class="btn btn-outline-primary">
                            <i class="feather-plus-circle"></i>
                        </a>
                        <a href="#" class="btn btn-outline-secondary full-screen-btn">
                            <i class="feather-maximize-2"></i>
                        </a>
                    </div>


                </div>
                <hr>

                <!-- <?php echo html_entity_decode("<h1>Hello</h1>");?>
                <?php echo strip_tags("<h1>Hello</h1>");?> -->


                <table class="table table-striped table-bordered table-hover mt-3 mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <?php if($_SESSION['user']['role']==0){?>
                            <th>User</th>
                            <?php
                            }
                            ?>
                            <th>Viewer Count</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        foreach (posts() as $p){                          
                        ?>
                        <tr>
                            <td><?php echo $p['id']; ?></td>
                            <td><?php echo short($p['title']); ?></td>
                            <td><?php echo short(strip_tags(html_entity_decode($p['description']))); ?></td>
                            <td><?php echo category($p['category_id'])['title']; ?></td>

                            <?php if($_SESSION['user']['role']==0){?>
                            <td class="text-nowrap"><?php echo user($p['user_id'])['name'];?></td>
                            <?php
                            }
                            ?>
                            <td>
                                <?php echo count(viewerCountByPost($p['id'])); ?>
                            </td>
                            <td class="text-nowrap">
                                <a href="post_detail.php?id=<?php echo $p['id'];?>"
                                    class="btn btn-outline-success btn-sm">
                                    <i class="feather-info fa-fw"></i>
                                </a>
                                <a href="post_delete.php?id=<?php echo $p['id'];?>"
                                    class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Are you sure to delte')"><i
                                        class="feather-trash fa-fw"></i></a>

                                <a href="post_edit.php?id=<?php echo $p['id'];?>"
                                    class="btn btn-outline-warning btn-sm"><i class="feather-edit-2 fa-fw"></i></a>
                            </td>
                            <td class="text-nowrap"><?php echo showTime($p['created_at']); ?></td>
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php include "template/footer.php";?>
<script>
    $(".table").dataTable({
        "order": [
            [0, "desc"]
        ]
    });
</script>