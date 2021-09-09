<div class="col-12 col-md-8">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">
                <h4>
                    <i class="feather-box text-primary"></i> Ads Lists
                </h4>
                <div class="">
                    <a href="#" class="btn btn-outline-secondary full-screen-btn">
                        <i class="feather-maximize-2"></i>
                    </a>
                </div>


            </div>
            <hr>
            <table class="table table-hover mt-3 mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image Link</th>
                        <th>Website Link</th>
                        <th>Control</th>
                        <th>Start</th>
                        <th>End</th>
                    </tr>

                </thead>

                <tbody>
                    <?php
                foreach (adsAll() as $c){                          
                ?>
                    <tr>
                        <td><?php echo $c['id']; ?></td>
                        <td class="text-nowrap"><?php echo $c['owner_name']; ?></td>
                        <td><?php echo $c['photo'];?></td>
                        <td><?php echo $c['link'];?></td>
                        <td class="text-nowrap">
                            <a href="ads_delete.php?id=<?php echo $c['id'];?>" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Are you sure to delte')"><i class="feather-trash fa-fw"></i>
                            </a>
                            <a href="ads_edit.php?id=<?php echo $c['id'];?>" class="btn btn-outline-warning btn-sm"><i
                                    class="feather-edit-2 fa-fw"></i>
                            </a>
                        </td>
                        <td class="text-nowrap"><?php echo $c['start'];?></td>
                        <td class="text-nowrap"><?php echo $c['end'];?></td>

                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>