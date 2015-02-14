<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>TOPCH</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/Public/Admin/css/jquery-ui-1.10.3.full.min.css" />
<link rel="stylesheet" href="/Public/Admin/css/datepicker.css" />
<link rel="stylesheet" href="/Public/Admin/css/ui.jqgrid.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/ace.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/ace-rtl.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/ace-skins.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/mystyle.css" />

<script type="text/javascript" src="/Public/Admin/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap.min.js"></script>
<script src="/Public/Admin/js/ace.min.js"></script>
<script src="/Public/Admin/js/ace-elements.min.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/Admin/js/jquery-1.10.2.min.js"></script>
<!--[if lte IE 8]>
  <link rel="stylesheet" href="/Public/Admin/css/ace-ie.min.css" />
<![endif]-->

<!-- inline styles related to this page -->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!--[if lt IE 9]>
<script src="/Public/Admin/js/html5shiv.js"></script>
<script src="/Public/Admin/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="container-fluid">
<?php echo W('Meau/meau');?>

<div class="main-container">
	<table id="navList" ></table>
</div>
<script type="text/javascript">
	$('#navList').bootstrapTable({

	url: '/admin.php/Set/dataList',
	striped: true,
    pagination: true,
    pageSize: 10,
    pageList: [10, 15, 20, 30, 50],
    search: true,
    showColumns: true,
    showRefresh: true,
    minimumCountColumns: 2,
    clickToSelect: true,
    columns: [{
        field: 'state',
        checkbox: true
    }, {
        field: 'naviId',
        title: 'ID',
        align: 'center',
    }, {
        field: 'naviname',
        title: 'Name',
        align: 'center',
    }, {
        field: 'parent_id',
        title: 'parent',
        align: 'center',
    }, {
        field: 'c',
        title: 'Controller',
        align: 'center',
    }, {
        field: 'v',
        title: 'Function',
        align: 'center',
    }, {
        field: 'control_ids',
        title: 'control_ids',
        align: 'center',
    }, {
        field: 'sort_id',
        title: 'sort_id',
        align: 'center',
       
    }, {
        field: 'operate',
        title: 'Operate',
        align: 'center',
        valign: 'middle',
        clickToSelect: true,
        formatter: operateFormatter,
        }],
});

function operateFormatter(value, row, index) {
        return [
            '<a class="edit ml10"  href="javascript:void(0)" title="Edit">',
                '<i class="glyphicon glyphicon-edit"></i>',
            '</a>',
            '<a class="remove ml10" href="javascript:void(0)" title="Remove">',
                '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }


    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            alert('You click edit icon, row: ' + JSON.stringify(row));
            console.log(value, row, index);
        },
        'click .remove': function (e, value, row, index) {
            alert('You click remove icon, row: ' + JSON.stringify(row));
            console.log(value, row, index);
        }
    };
</script>

</div>
</body>
</html>