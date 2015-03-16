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
<div class="modal fade" id="alert" tabindex="-1" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">提示信息</h4>
			</div>
			<div class="modal-body">
			<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
					<?php echo ($vv); ?>
				</div><?php endforeach; endif; endforeach; endif; ?>
			</div>
		</div>
	</div>
</div>
<?php if(!empty($alert)): ?><script type="text/javascript">
	$('#alert').modal('show');
</script><?php endif; ?>

<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="#">首页</a>
			</li>
			<li>设置</li>
			<li class="active">用户管理</li>
			<li class="active">用户添加</li>
		</ul><!-- .breadcrumb -->

		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
					<i class="icon-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- #nav-search -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1>
				设置
				<small>
					<i class="icon-double-angle-right"></i>
					 用户管理
				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<div class="tabbable">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active">
							<a data-toggle="tab" href="#depart">
								<i class="green icon-home bigger-120"></i>
								部门添加
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#role">
							<i class="green icon-group bigger-110"></i>
								角色添加
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#manger">
							<i class="green icon-user bigger-120"></i>
								用户添加
							</a>
						</li>
					</ul>

					<div class="tab-content">
						<div id="depart" class="tab-pane in active">
							<form class="form-horizontal" id="addDepart" role="form" method="post" action="<?php echo U('User/adduser');?>">
							<fieldset>
								<legend>部门添加</legend>
								<div class="form-group">
								<input type="hidden" name="type" value="addDepart" />
									<label class="col-sm-2 control-label">归属部类: </label>
									<div class="col-sm-3">
										<select class="form-control" name="parent_id">
										<option value="">--无--</option>
											<?php if(is_array($depart)): foreach($depart as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
										</select>
									</div>

								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">部门名称</label>
									<div class="col-sm-3">
										<div class="clearfix">
											<input type="text" name="depart_name" class="form-control"/>
										</div>
									</div>
								</div>
								<div class="space-2"></div>

								<div class="form-group">
									<label class="col-sm-2 control-label">部门描述</label>
									<div class="col-sm-3">
										<textarea class="form-control limited" rows="5" name="description" maxlength="50"></textarea>
									</div>
								</div>

								<div class="col-md-offset-2 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
							</fieldset>
							</form>
						</div>

						<div id="role" class="tab-pane">
							<form class="form-horizontal" id="addRole" crole="form" method="post" action="<?php echo U('User/adduser');?>">
							<fieldset>
								<legend>角色添加</legend>
								<input type="hidden" name="type" value="addRole" />
								<div class="form-group">
									<label class="col-sm-2 control-label">归属部门: </label>
									<div class="col-sm-3">
										<select class="form-control" name="depart_id">
										<?php if(is_array($depart)): foreach($depart as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">角色名称</label>
									<div class="col-sm-3">
										<div class="clearfix">
										<input type="text" name="roleName" class="form-control"/>
										</div>
									</div>
								</div>
								<div class="space-2"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">角色描述</label>
									<div class="col-sm-3">
										<textarea class="form-control limited" rows="5" name="description" maxlength="50"></textarea>
									</div>
								</div>

								<div class="col-md-offset-2 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
							</fieldset>
							</form>
						</div>

						<div id="manger" class="tab-pane">
							<form class="form-horizontal" id="addManger" role="form" method="post" action="<?php echo U('User/adduser');?>">
							<fieldset>
								<legend>成员添加</legend>
								<input type="hidden" name="type" value="addUser" />
								<div class="form-group">
									<label class="col-sm-2 control-label">归属部门: </label>
									<div class="col-sm-3">
										<select class="form-control" name="depart_id" id="userdepart">
										<?php if(is_array($depart)): foreach($depart as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
										</select>
									</div>

								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">归属角色: </label>
									<div class="col-sm-3">
										<select class="form-control" name="role_id" id="userrole">
										</select>
								</div>

								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">用 户 名: </label>
									<div class="col-sm-3">
										<div class="clearfix">
										<input type="text" name="uname" class="form-control"/>
										</div>
									</div>
								</div>
								<div class="space-2"></div>

								<div class="form-group">
									<label class="col-sm-2 control-label">密 &nbsp;码: </label>
									<div class="col-sm-3">
										<div class="input-group">
											<input type="password" name="pwd" class="form-control" value="123456" />
											<span class="input-group-addon"><i class="icon-key"></i> &nbsp;默认密码: 123456</span>
										</div>
									</div>
								</div>
								<div class="space-2"></div>

								<div class="col-md-offset-2 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
							</fieldset>
							</form>
						</div>

					</div>
				</div>
			</div><!-- /span -->
		</div>
</div>
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$('.nav-list').find('li').eq(1).addClass('active open');
	$('.nav-list .active').find('li').eq(1).addClass('active open');
	$('.nav-list .active .active').find('li').eq(0).addClass('active');
	//表单验证

	$('#addDepart').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					rules: {
						depart_name: {
							required: true,
						},
					},
			
					messages: {
						depart_name: {
							required: "请填写部门名称",
						},
					},
			
					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-danger', $('.login-form')).show();
					},
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
						$(e).remove();
					},
			
			
					submitHandler: function (form) {
						 form.submit();
					},
					invalidHandler: function (form) {
						form.submit(function(event) {
							return false;
						});
					}
				});

	$('#addRole').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					rules: {
						roleName: {
							required: true,
						},
					},
			
					messages: {
						depart_name: {
							required: "请填写角色名称",
						},
					},
			
					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-danger', $('.login-form')).show();
					},
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
						$(e).remove();
					},
			
			
					submitHandler: function (form) {
						 form.submit();
					},
					invalidHandler: function (form) {
						form.submit(function(event) {
							return false;
						});
					}
				});

		$('#addManger').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					rules: {
						uname: {
							required: true,
						},
					},
			
					messages: {
						depart_name: {
							required: "请填写管理者名称",
						},
					},
			
					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-danger', $('.login-form')).show();
					},
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
						$(e).remove();
					},
			
			
					submitHandler: function (form) {
						 form.submit();
					},
					invalidHandler: function (form) {
						form.submit(function(event) {
							return false;
						});
					}
				});
		//二级联动
$('#userdepart').change(function(event) {
	getRole();
});
		function getRole(){
			var con='';
			var depart_id=$('#userdepart').val();
			$.post('/admin.php/User/ajaxRole', 
				{departId: depart_id},
				 function(data) {
				$.each(data, function(index, val) {
					 con +="<option value="+val.roleId+">"+val.role_name+"</option>";
				});
				$('#userrole').html(con);
			});
			
			
		}
</script>

</div>
</body>
</html>