<!DOCTYPE html>
<html lang="en">

<head>
    <title>Paginationjs Contoh</title>
    <meta charset="UTF-8">
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/paginate/pagination.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        ul,
        li {
            list-style: none;
        }

        #wrapper {
            width: 900px;
            margin: 20px auto;
        }

        .data-container {
            margin-top: 20px;
        }

        .data-container ul {
            padding: 0;
            margin: 0;
        }

        .data-container li {
            margin-bottom: 5px;
            padding: 5px 10px;
            background: #eee;
            color: #666;
        }

        .paging {
            border: black solid 3px;
            width: 150px;
            height: 150px;
            margin: 3px;
            float: left;

        }
    </style>
</head>

<body>

    <div id="wrapper">
        <section>
            <div class="data-container"></div>
            <div id="pagination-demo1"></div>
        </section>
    </div>

    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="<?= base_url() ?>/template/plugins/paginate/pagination.js"></script>
    <script>
        $(function () {
            (function (name) {
                var container = $('#pagination-' + name);
                var sources = function () {
                    var result = [];

                    for (var i = 1; i < 196; i++) {
                        result.push(i);
                    }

                    return result;
                }();

                var options = {
                    dataSource: sources,
                    callback: function (response, pagination) {
                        window.console && console.log(response, pagination);

                        var dataHtml = '';

                        $.each(response, function (index, item) {
                            dataHtml += '<div class="paging">' + item + '</div>';
                        });

                        dataHtml += '';

                        container.prev().html(dataHtml);
                    }
                };

                //$.pagination(container, options);

                container.addHook('beforeInit', function () {
                    window.console && console.log('beforeInit...');
                });
                container.pagination(options);

                container.addHook('beforePageOnClick', function () {
                    window.console && console.log('beforePageOnClick...');
                    //return false
                });
            })('demo1');

            (function (name) {
                var container = $('#pagination-' + name);
                container.pagination({
                    dataSource: 'https://api.flickr.com/services/feeds/photos_public.gne?tags=cat&tagmode=any&format=json&jsoncallback=?',
                    locator: 'items',
                    totalNumber: 120,
                    pageSize: 20,
                    ajax: {
                        beforeSend: function () {
                            container.prev().html('Loading data from flickr.com ...');
                        }
                    },
                    callback: function (response, pagination) {
                        window.console && console.log(22, response, pagination);
                        var dataHtml = '<ul>';

                        $.each(response, function (index, item) {
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