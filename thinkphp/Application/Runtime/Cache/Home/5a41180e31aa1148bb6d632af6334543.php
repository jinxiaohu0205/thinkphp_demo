<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>

	<body>
		<div><?php echo ($data["age"]); ?></div>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><img src="/thinkphp/Upload/<?php echo ($item["age"]); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
	</body>
</html>