<?php if (!defined('THINK_PATH')) exit();?>
	<nav>
		<?php if(is_array($nav)): foreach($nav as $k=>$vo): ?><a><?php echo ($vo["naviname"]); ?></a><?php endforeach; endif; ?>
    </nav>