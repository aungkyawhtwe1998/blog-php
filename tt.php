<script>
    $(".counter-up").counterUp({
        delay: 10,
        time: 1000,
    });

    <?php
    $dateArr = [];
    $viewerCount = [];
    $transitionCount = [];

    foreach(dashboardPosts(10) as $p) {
        array_push($dateArr, $p['created_at']);

    }

    for ($i = 0; $i < 10; $i++) {
        foreach(viewerCountByUserDate($_SESSION['user']['id'], $dateArr[$i]) as $v) {
            array_push($viewerCount, countTotal($v['id']));
        }
    } ?>

    let dateArr = <?php echo json_encode($dateArr); ?> ;
    let viewerCount = <?php echo json_encode($viewerCount) ?> ;
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