<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8" />
 	<title>Document</title>
 </head>
 <body>
 	<!--{foreach $data as $item}
 	<?php echo ($item["name"]); ?>
 	{/foreach}-->
 	<a href="<?php echo U('Index/read');?>">点击跳转read方法</a>
 </body>
 </html>