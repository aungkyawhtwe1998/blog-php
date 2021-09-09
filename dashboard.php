<?php require_once"core/auth.php";?>
<?php include "template/header.php"?>
<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">

        <div class="card status-card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <i class="feather-heart h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-3 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('viewers');?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Visitors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6 col-xl-3">

        <div class="card status-card mb-3" onclick="go('<?php echo $url;?>/post_list.php')">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <i class="feather-list h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-3 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('posts');?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6 col-xl-3">

        <div class="card status-card mb-3" onclick="go('<?php echo $url;?>/category_add.php')">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <i class="feather-layers h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-3 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('categories');?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Categories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-6 col-xl-3">

        <div class="card status-card mb-3" onclick="go('<?php echo $url;?>/user_list.php')">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <i class="feather-users h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-3 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('users');?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row align-items-end">
    <div class="col-12 col-xl-7">
        <div class="card overflow-hidden shadow mb-4">
            <div class="">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4>Viewers & Transition</h4>

                    <div class="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar1.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar2.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar3.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar4.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar5.jpg" class="ov-img rounded-circle" alt="">
                    </div>
                </div>
                <canvas id="ov" height="150"></canvas>

            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-5">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4>Posts per Category</h4>
                    <div class="">
                        <i class="feather-pie-chart h4 mb-0 text-primary"></i>
                    </div>
                </div>

                <canvas id="op" height="220"></canvas>

            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card overflow hidden mb-4 mb-0">
            <div class="d-flex justify-content-between align-items-center p-3">
                <h4 class="mb-0">Recent Posts</h4>
                <div class="">
                    <?php 
                    $currentUserId = $_SESSION['user']['id'];
                    $postTotal = countTotal("posts");
                    $currentUserPostTotal= countTotal("posts", "user_id = $currentUserId");
                    $currentUserPostPercentage = ( $currentUserPostTotal/$postTotal) * 100;
                    $finalPercentage = floor($currentUserPostPercentage);
                    ?>
                    <small>Your Posts :<?php echo $currentUserPostTotal ?></small>
                    <div class="progress" style="width: 100px; height:10px;">
                        <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar"
                            style="width: <?php echo $finalPercentage ?>%" aria-valuenow="10" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
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
                        foreach (dashboardPosts(5) as $p){                          
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
                            <a href="post_detail.php?id=<?php echo $p['id'];?>" class="btn btn-outline-success btn-sm">
                                <i class="feather-info fa-fw"></i>
                            </a>
                            <a href="post_delete.php?id=<?php echo $p['id'];?>" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Are you sure to delte')"><i
                                    class="feather-trash fa-fw"></i></a>

                            <a href="post_edit.php?id=<?php echo $p['id'];?>" class="btn btn-outline-warning btn-sm"><i
                                    class="feather-edit-2 fa-fw"></i></a>
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

<?php include "template/footer.php"?>

<script>
    $(".counter-up").counterUp({
        delay: 10,
        time: 1000,
    });

    <?php
    $dateArr = [];
    $viewerCount = [];
    $transitionCount = [];
    $currentUser = $_SESSION['user']['id'] ;

    foreach(dashboardPosts(6) as $p) {
        array_push($dateArr, $p['created_at']);

    }
        
    ?>

    let dateArr = <?php echo json_encode($dateArr); ?> ;
    console.log(dateArr);
    let viewerCount =[20, 60, 50, 104, 120, 117, 119, 116, 123, 133, 116, 120]
    console.log(viewerCount);
    let transitionCount = [13, 12, 13, 14, 20, 17, 19, 16, 23, 33, 16, 20];

    var ctx = document.getElementById("ov").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: dateArr,
            datasets: [{
                    label: "Viewer Count",
                    data: viewerCount,
                    backgroundColor: ["#17a2b830"],
                    borderColor: ["#17a2b8"],
                    borderWidth: 1,
                },
                {
                    label: "Transition Count",
                    data: transitionCount,
                    backgroundColor: ["#28a74530"],
                    borderColor: ["#28a745"],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: [{
                        display: false,
                    }, ],
                }, ],
                yAxes: [{
                    display: false,
                    ticks: {
                        beginAtZero: true,
                    },
                }, ],
            },
            legend: {
                display: true,
                position: "top",
                labels: {
                    fontColor: "#333",
                    usePointStyle: true,
                },
            },
        },
    });


    <?php
    $catName = [];
    $countPostByCategory = [];
    foreach(categories() as $c) {
            array_push($catName, $c['title']);
            // SELECT COUNT(id)
            // FROM posts
            // WHERE category_id = 1;
            array_push($countPostByCategory, countTotal('posts', "category_id = {$c['id']}"));

        } ?>
        let categoryName = <?php echo json_encode($catName); ?> ;
    let orderCount = <?php echo json_encode($countPostByCategory) ?> ;
    var ctx = document.getElementById("op").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: categoryName,
            datasets: [{
                label: "# of Votes",
                data: orderCount,
                backgroundColor: [
                    '#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
                    '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
                    '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
                    '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
                    '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
                    '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
                    '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
                    '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
                    '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
                    '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'
                ],
                borderColor: [
                    '#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
                    '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
                    '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
                    '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
                    '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
                    '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
                    '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
                    '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
                    '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
                    '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'
                ],
                borderWidth: 1,
            }, ],
        },
        options: {
            scales: {
                yAxes: [{
                    display: false,
                    beginAtZero: true,
                }, ],
                xAxes: [{
                    display: false,
                }, ],
            },
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    fontColor: "#333",
                    usePointStyle: true,
                },
            },
        },
    });
</script>