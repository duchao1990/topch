<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>TOPCH</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/mystyle.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/Bstable/bootstrap-table.min.css">

<script type="text/javascript" src="/Public/Admin/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/Admin/Bstable/bootstrap-table.min.js"></script>
<script type="text/javascript" src="/Public/Admin/Bstable/locale/bootstrap-table-zh-CN.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/index.js"></script>
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

	url: '/admin.php/Set/navList',
    columns: [{
        field: 'naviId',
        title: 'ID'
    }, {
        field: 'naviName',
        title: 'Name'
    }, {
        field: 'parent_id',
        title: 'parent'
    }, {
        field: 'c',
        title: 'Controller'
    }, {
        field: 'v',
        title: 'Function'
    }, {
        field: 'control_ids',
        title: 'control_ids'
    }, {
        field: 'sort_id',
        title: 'sort_id'
    }],
});
</script>

</div>
</body>
</html>