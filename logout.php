<?php

/**
 * @Author: xyyx
 * @Date:   2019-07-21 16:21:42
 * @Last Modified by:   xyyx
 * @Last Modified time: 2019-07-21 16:30:12
 */
session_start();
echo "bye:".$_SESSION['username'];
$_SESSION=[];
if(ini_get('session.use_cookies')){
	$params=session_get_cookie_params();
	setcookie(session_name(),'',time()-1,$params['path'],$params['domain'],$params['secure'],$params['httponly']);
}
session_destroy();

?>
<script type="text/javascript">
	setTimeout("location='login.php'",3000);
</script>