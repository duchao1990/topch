<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>TP测试</title>
<link href="/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- <link href="/Public/static/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="/Public/static/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<!-- <link href="/Public/static/bootstrap/css/docs.css" rel="stylesheet"> -->
<link href="/Public/Home/css/style.css" rel="stylesheet">
<link href="/Public/static/datetime/css/datetimepicker.css" rel="stylesheet" media="screen">

<!-- <link href="/Public/static/bootstrap/css/style.css" rel="stylesheet"> -->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/Home/js/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<!-- <script type="text/javascript" src="/Public/static/datetime/js/bootstrap-datetimepicker.js"></script> -->
<script type="text/javascript" src="/Public/Home/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap-page.min.js"></script>
</head>
	<h1 class="htag" >mythink 功能模板</h1>
	<div class="body" >
    <a href="<?php echo U('mail/index');?>" class="btn btn-primary mar20">swift邮件</a>
    <a href="<?php echo U('upload/index');?>" class="btn btn-primary mar20">文件上传</a>
    <a href="<?php echo U('editor/index');?>" class="btn btn-primary mar20">文本编辑器</a>
    <a href="<?php echo U('page/index');?>" class="btn btn-primary mar20">bootstarp 样式分页</a>
    <a href="<?php echo U('page/btajax');?>" class="btn btn-primary mar20">bootstarp ajax分页</a>
    <a href="<?php echo U('page/bootjs');?>" class="btn btn-primary mar20">bootstarp分页插件</a>
    <a href="<?php echo U('grid/index');?>" class="btn btn-primary mar20">jqGrid</a>
    <a href="<?php echo U('wish/index');?>" class="btn btn-primary mar20">心愿提交</a>
    </div>
</body>
</html>