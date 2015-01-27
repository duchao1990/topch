<?php if (!defined('THINK_PATH')) exit();?>
<nav class="navbar navbar-default" role="navigation"id="navbar-bot" >
  <div class="container-fluid">
    <div class="navbar-header navbar-left" >
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="/Public/Admin/avatars/user.jpg">
      </a>
      <h2 class="navbar-text">
      	<small>
      		TOP-CH系统
      	</small>
      </h2>
    </div>
    <ul class="nav nav-tabs navbar-left" id="nav-list">
		<?php if(is_array($nav)): foreach($nav as $key=>$vo): ?><li role="presentation">
					<a href='<?php echo U("$vo[c]/$vo[v]");?>'><?php echo ($vo["naviname"]); ?></a>
			</li><?php endforeach; endif; ?>
	</ul>

	<ul class="nav nav-pills navbar-right" id="right-bavbar">
	  <li role="presentation" class="dropdown">
	    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
	     <img class="nav-user-photo" src="/Public/Admin/avatars/user.jpg" alt="Jason's Photo" />
			<span class="user-info">
				<small>欢迎光临,</small>
				Jason
			</span>
			 <span class="caret"></span>
	    </a>
	    <ul class="dropdown-menu" role="menu">
	     	<li><a href="#"><i class="icon-cog"></i>设置</a></li>
			<li><a href="#"><i class="icon-user"></i>个人资料</a></li>
			<li class="divider"></li>
			<li><a href="#"><i class="icon-off"></i>退出</a></li>
	    </ul>
	  </li>
	</ul>
  </div>
</nav>
	<ol class="breadcrumb">
	  <li>
	  <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
	  <a href="#"><?php echo C('navName');?></a>
	  </li>
	  <li><a href="#"><?php echo C('actName');?></a></li>
	</ol>
<div class="navbar-left " id="chilidnav">
	<ul id="accordion" class="accordion ">
	<?php if(is_array($navlist)): foreach($navlist as $key=>$v): if(($v['c'] == null) AND ($v['v'] == null) ): ?><li role="presentation" class="dropdown">
				<div class="link"><?php echo ($v["naviname"]); ?> <i class="fa fa-chevron-down caret" style="font-size:2em;"></i></div>
				<ul class="submenu" >
					<?php if(is_array($parentList)): foreach($parentList as $key=>$val): if(is_array($val)): foreach($val as $key=>$va): if($v["naviId"] == $va["parent_id"] ): ?><li>
									<a href='<?php echo U("$va[c]/$va[v]");?>' >
									 <?php echo ($va["naviname"]); ?>
									</a>
								</li><?php endif; endforeach; endif; endforeach; endif; ?>
				</ul>
			</li>
		<?php else: ?>
			<li role="presentation">
			<div class="link">
					<a href='<?php echo U("$v[c]/$v[v]");?>'><?php echo ($v["naviname"]); ?></a>
				<i class="fa fa-chevron-down"></i>
			</div>
			</li><?php endif; endforeach; endif; ?>
	</ul>
</div>