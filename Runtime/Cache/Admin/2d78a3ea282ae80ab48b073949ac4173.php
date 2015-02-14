<?php if (!defined('THINK_PATH')) exit();?><div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a  class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							Top-CH后台管理系统
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li>
							<a data-toggle="dropdown"  class="dropdown-toggle" style="background-color:#438eb9;">
								<img class="nav-user-photo" src="/Public/Admin/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									Jason
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										个人资料
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->
					
					<ul class="nav nav-list">
						<?php foreach ($nav as $key => $vo): ?>
	
						<?php if ($vo['son'] && $vo['parent_id']=='0'): ?>
							<li>
								<a class="dropdown-toggle">
								<span class="menu-text"> <?php echo ($vo["naviname"]); ?></span>
								<b class="arrow icon-angle-down"></b>
								</a>
								<ul class="submenu">
									<?php foreach ($vo['son'] as $key => $v): ?>
										<?php if ($v['son']): ?>
												<li>
													<a class="dropdown-toggle">
														<span class="menu-text"> <?php echo ($v["naviname"]); ?></span>
														<b class="arrow icon-angle-down"></b>
													</a>
													<ul class="submenu">
														<?php foreach ($v['son'] as $key => $val): ?>
														<li>
															<a href='<?php echo U("$val[c]/$val[v]");?>'>
																<span class="menu-text"> <?php echo ($val["naviname"]); ?></span>
															</a>
														</li>
														<?php endforeach ?>
													</ul>
												</li>
											<?php else: ?>
												<li>
													<a href='<?php echo U("$v[c]/$v[v]");?>'>
														<span class="menu-text"> <?php echo ($v["naviname"]); ?></span>
													</a>
												</li>
										<?php endif ?>
									<?php endforeach ?>
								</ul>
							</li>
						<?php elseif (!$vo['son'] && $vo['parent_id']=='0'): ?>
							<li>
								<a href='<?php echo U("$vo[c]/$vo[v]");?>'>
								<span class="menu-text"> <?php echo ($vo["naviname"]); ?></span>
								</a>
							</li>
						<?php endif ?>

						<?php endforeach ?>
					</ul>
</div>