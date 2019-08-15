<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <select name="">
    	<?php if(is_array($arr)): foreach($arr as $key=>$v): ?><option value=""><?php echo str_repeat("丨-",$v[level]*1); echo ($v["cname"]); ?></option><?php endforeach; endif; ?>
   </select>
</body>
</html>