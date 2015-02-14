<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>TOPCH</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/Public/Admin/css/font-awesome.min.css" />
<link rel="stylesheet" href="/Public/Admin/css/ace.min.css" />
<link rel="stylesheet" href="/Public/Admin/css/ace-rtl.min.css" />
<script type="text/javascript" src="/Public/Admin/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap.min.js"></script>
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
<div class="form-set">
	<form role="form" class="nav-h">
	<fieldset>
		<legend>横向菜单添加</legend>
		
		<div class="form-group">
				<label for="naviname">菜单名称</label>
				<input type="text" name="naviname" class="form-control" id="naviname" placeholder="NaviName">
		</div>
		<div class="form-group">
			<label for="c">默认控制器</label>
			<div class="input-group">
					<input type="text" name="c" class="form-control" id="c" placeholder="Controller">
					<span class="input-group-addon">Controller</span>
			</div>
		</div>
		
		<div class="form-group">
				<label for="v">默认方法</label>
				<input type="text" name="v"  id="v" class="form-control" placeholder="Function">
		</div>

		<div class="form-group">
			<label for="sort_id">显示顺序</label>
			<div class="input-group">
					<input type="text" name="sort_id" id="sort_id" class="form-control" placeholder="sort_id">
			</div>
		</div>

		<div class="form-group">
			<input type="reset" class="btn btn-warning" value="重置" />
			<input type="submit" class="btn btn-info" value="提交" />
		</div>
	</fieldset>
	</form>
	<form role="form" class="nv-2" >
		<fieldset>
			<legend>二级菜单添加</legend>
			<div class="form-group">
				<label for="nav1">一级归属</label>
				<select name="parent_id" id="nav1" class="form-control">
					<?php if(is_array($nav)): foreach($nav as $key=>$vo): ?><option value="<?php echo ($vo["naviId"]); ?>"><?php echo ($vo["naviname"]); ?></option><?php endforeach; endif; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="naviname2">菜单名称</label>
				<input type="text" name="naviname" class="form-control" id="naviname2" placeholder="NaviName">
			</div>
			<div class="form-group">
				<label for="sort_id2">显示顺序</label>
				<div class="input-group">
						<input type="text" name="sort_id" id="sort_id2" class="form-control" placeholder="sort_id">
			</div>
			</div>
			<legend>*若该菜单有子菜单,不要填写,否则必须填写</legend>
			<div class="form-group">
				<label for="c2">默认控制器</label>
				<div class="input-group">
						<input type="text" name="c" class="form-control" id="c2" placeholder="Controller">
						<span class="input-group-addon">Controller</span>
				</div>
			</div>
			
			<div class="form-group">
					<label for="v2">默认方法</label>
					<input type="text" name="v"  id="v2" class="form-control" placeholder="Function">
			</div>

			<div class="form-group">
				<input type="reset" class="btn btn-warning" value="重置" />
				<input type="submit" class="btn btn-info" value="提交" />
			</div>
		</fieldset>
	</form>

	<form role="form" class="nv-3">
		<fieldset>
			<legend>三级菜单添加</legend>
				<label for="nav13">父类菜单</label>
				<div class="row">
				<div class="col-lg-6 ">
					<div class="input-group">
						<span class="input-group-addon">一级</span>
						<select  id="nav13" class="form-control">
							<?php if(is_array($nav)): foreach($nav as $key=>$vo): ?><option value="<?php echo ($vo["naviId"]); ?>"><?php echo ($vo["naviname"]); ?></option><?php endforeach; endif; ?>
						</select>
					</div>
				</div>
				<div class="col-lg-6 ">
					<div class="input-group">
					<span class="input-group-addon">二级</span>
					<select name="parent_id" id="nav132" class="form-control">

					</select>
					</div>
				</div>
				</div>
				<div class="form-group">
					<label for="c3">默认控制器</label>
					<div class="input-group">
							<input type="text" name="c" class="form-control" id="c3" placeholder="Controller">
							<span class="input-group-addon">Controller</span>
					</div>
				</div>
				
				<div class="form-group">
						<label for="v3">默认方法</label>
						<input type="text" name="v"  id="v3" class="form-control" placeholder="Function">
				</div>

				<div class="form-group">
					<label for="sort_id3">显示顺序</label>
					<div class="input-group">
							<input type="text" name="sort_id" id="sort_id3" class="form-control" placeholder="sort_id">
					</div>
				</div>

				<div class="form-group">
					<input type="reset" class="btn btn-warning" value="重置" />
					<input type="submit" class="btn btn-info" value="提交" />
				</div>
		</fieldset>
	</form>
</div>
</div>
<script type="text/javascript">
	$('#nav-list').find('li').eq(1).addClass('active');
	$('#accordion').find('li').eq(0).addClass('active');
	$('.breadcrumb').css('background', '#fff');
	$('.breadcrumb').css('border-top-color', '#fff');
	$('#nav13').change(function(event) {
		var parent_id=$('#nav13').val();
		var con="";
		$('#nav132').html('');
		$.post("/admin.php/Set/navajax", 
				{parent_id: parent_id}, 
				function(data) {
					console.log(data);
				$.each(data, function(name, val) {
					  con +='<option value='+val.naviId+'>'+val.naviname+'</option>';
					  $('#nav132').html(con);
			});
				
		},'json');

	});
</script>

</div>
</body>
</html>