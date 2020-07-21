<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>跳转提示</title>
	<link href="<?php echo (ADMIN_PUBLIC); ?>/css/tipDialog.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo (ADMIN_PUBLIC); ?>/js/tipDialog.js" type="text/javascript"></script>
 </head>
<body>
    <?php if(isset($message)) {?>
        <script>
            $(function(){
                tipDialog('<?php echo $message ?>','ok','','<?php echo($waitSecond); ?>');
                setTimeout(function(){
                    window.location='<?php echo($jumpUrl); ?>';
                },1500);
            })    
        </script>
    <?php }else{ ?>
        <script>
            $(function(){
                tipDialog('<?php echo $error ?>','error','','<?php echo($waitSecond); ?>');
                setTimeout(function(){
                    window.location='<?php echo($jumpUrl); ?>';
                },2000);
            })    
        </script>
    <?php } ?>
</body>
</html>