<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>TOPCH</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/Public/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/Public/Admin/css/mystyle.css" />
<link rel="stylesheet" href="/Public/Admin/css/font-awesome.min.css" />
<script type="text/javascript" src="/Public/Admin/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap.min.js"></script>
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
<div class="main-container" style="border:1px solid red">
<div class="form-set">
	<form role="form">
	<fieldset>
		<legend>横向菜单添加</legend>
		
		<div class="form-group">
				<label for="">菜单名称</label>
				<input type="text" name="naviname" class="form-control" placeholder="NaviName">
		</div>
		<label for="">默认控制器</label>
		<div class="input-group">
				<input type="text" name="c" class="form-control" placeholder="Controller">
				<span class="input-group-addon">Controller</span>
		</div>

		
		<div class="form-group">
				<label for="">默认方法</label>
				<input type="text" name="v" class="form-control" placeholder="Function">
		</div>

		<label for="">显示顺序</label>
		<div class="input-group">
				<input type="text" name="sort_id" class="form-control" placeholder="sort_id">
				<span class="input-group-addon">提示,最后为7</span>
		</div>
	</fieldset>
	</form>
</div>
</div>

</div>
</body>
</html>