<!-- jQuery -->
<script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
<!-- page script -->
<!-- Toastr -->
<script src="<?= base_url() ?>/template/plugins/toastr/toastr.min.js"></script>

<!-- FLOT CHARTS -->
<script src="<?= base_url() ?>/template/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?= base_url() ?>/template/plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?= base_url() ?>/template/plugins/flot-old/jquery.flot.pie.min.js"></script>

<!-- BOOSTRAP 5 -->
<script src="<?= base_url() ?>/bootstrap/css/bootstrap.css"></script>
<script src="<?= base_url() ?>/bootstrap/js/bootstrap.js"></script>

 <!-- Summernote -->
 <script src="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });


        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    wndow.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#Gambar_load').attr('src', e.target.result);
                reader.readAsDataURL(input.files[0]);

            }
            reader.readAsDataURL(input.files[0]);
        }

    }
    $('#preview_gambar').change(function() {
        bacaGambar(this)

    })
</script>
<script>
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
        data: [
            []
        ],
        bars: {
            show: true
        }
    }
    $.plot('#bar-chart', [bar_data], {
        grid: {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            tickColor: '#f3f3f3'
        },
        series: {
            bars: {
                show: true,
                barWidth: 0.5,
                align: 'center',
            },
        },
        colors: ['#3c8dbc'],
        xaxis: {
            ticks: [
                [1, 'January'],
                [2, 'February'],
                [3, 'March'],
                [4, 'April'],
                [5, 'May'],
                [6, 'June']
            ]
        }
    })
    /* END BAR CHART */
</script>

<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="<?= base_url() ?>/template/plugins/paginate/pagination.js"></script>
<script>
    $(function() {
        (function(name) {
            var container = $('#pagination-' + name);
            var sources = function() {
                var result = [];

                for (var i = 1; i < 100; i++) {
                    result.push(i);
                }

                return result;
            }();

            var options = {
                dataSource: sources,
                callback: function(response, pagination) {
                    window.console && console.log(response, pagination);

                    var dataHtml = '';

                    $.each(response, function(index, item) {
                        dataHtml += '<div class="paging">' + item + '</div>';
                    });

                    dataHtml += '';

                    container.prev().html(dataHtml);
                }
            };

            //$.pagination(container, options);

            container.addHook('beforeInit', function() {
                window.console && console.log('beforeInit...');
            });
            container.pagination(options);

            container.addHook('beforePageOnClick', function() {
                window.console && console.log('beforePageOnClick...');
                //return false
            });
        })('demo1');

        (function(name) {
            var container = $('#pagination-' + name);
            container.pagination({
                dataSource: 'https://api.flickr.com/services/feeds/photos_public.gne?tags=cat&tagmode=any&format=json&jsoncallback=?',
                locator: 'items',
                totalNumber: 120,
                pageSize: 20,
                ajax: {
                    beforeSend: function() {
                        container.prev().html('Loading data from flickr.com ...');
                    }
                },
                callback: function(response, pagination) {
                    window.console && console.log(22, response, pagination);
                    var dataHtml = '<ul>';

                    $.each(response, function(index, item) {
                        dataHtml += '<div class="paging">' + item.title + '</div>';
                    });

                    dataHtml += '</ul>';

                    container.prev().html(dataHtml);
                }
            })
        })('demo2');
    })
</script>
</body>

</html>