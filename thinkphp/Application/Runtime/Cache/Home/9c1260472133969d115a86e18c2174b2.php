<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/thinkphp/Public/css/page.css" />
	</head>
	<style type="text/css">
		
	</style>
	<body>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$iteam): $mod = ($i % 2 );++$i;?><div><?php echo ($iteam["name"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="page"><?php echo ($page); ?></div>
		<!--<img src="/thinkphp/UploUpload/ad/Goods/2018-06-01/5b10c1de24c58.jpg" alt="" />-->
		<img src="Upload/" alt="" />
	</body>
	
</html>