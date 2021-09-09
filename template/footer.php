</div>
</div>
</section>

<script src="<?php echo $url ?>/assets/vendor/data-table/jquery-3.5.1.js"></script>
<script src="<?php echo $url ?>/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?php echo $url ?>/assets/vendor/way_point/jquery.waypoints.js"></script>
<script src="<?php echo $url ?>/assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url ?>/assets/vendor/chart_js/chart.min.js"></script>

<script src="<?php echo $url; ?>/assets/vendor/data-table/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/data-table/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="<?php echo $url ?>/assets/js/app.js"></script>

<script>
    let currentPage = location.href;
    $(".menu-item-link").each(function () {
        let links = $(this).attr("href");
        if (currentPage == links) {
            $(".menu-item-link").removeClass('active');
            $(this).addClass('active');
        }
    });
</script>
</body>

</html>