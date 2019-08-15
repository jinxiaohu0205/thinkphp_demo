<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8" />
 	<title>Document</title>
 </head>
 <body>
	<!--U方法的第二个参数支持数组和字符串两种定义方式，可添加伪后缀如方法2	-->
 	<a href="<?php echo U('Index/read','id=12');?>">点击跳转read方法1</a> <br />
 	<a href="<?php echo U('Index/read','id=12&cid=13','xml');?>">点击跳转read方法2</a><br />
 	<a href="<?php echo U('Index/read',array('id'=>1,'cid'=>'jinxiaohu'));?>">点击跳转read方法3</a>
 	<!--<a href="<?php echo U('Admin/Blog/index');?>">dianji</a>-->
 	
 	<!--循环遍历-->
 	<!--<?php if(is_array($data)): foreach($data as $key=>$iteam): echo ($iteam["id"]); endforeach; endif; ?>
	-->
	
	<form action="<?php echo U('index/read');?>" method="post">
		<input type="" name="name" id="id" value="li" />
		<input type="submit" />
	</form>
	<img src="<?php echo U('Index/img');?>" alt="" />
	
 </body>
 </html>