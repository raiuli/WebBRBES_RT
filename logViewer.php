<!DOCTYPE html>
<html>

<head>
<!--<meta http-equiv="refresh" content="10">-->
</head>
<!--
<body>
		<form action="logViewer.php" method="post">
            <input type="submit" name="on" value="clearLog">
           
        </form>
 This is a comment. Comments are not displayed in the browser-->
<?php 
 	session_start();
	echo(get_current_user());
	echo('<br>');
	echo time();
	echo('<br>');
	print_r($_SESSION['X8']) ;
	echo('<br>');
	echo('==============================================================================');
	echo('<br>');
// 	echo('<br>');
//  	print_r($_SESSION['X9']) ;
// // 	var_dump($_SESSION['X9']) ;
// 	echo('<br>');
// // 	echo('$_POST[on]'+$_POST['on']);
// 	$_SESSION["debug_enable_for_me"]=true;
 	echo($_SESSION['myLog']);
 	echo('<br>');
 	echo('==============================================================================');
// 	echo('<br>');
// 	if(isset($_POST['on'])) {
// 		onFunc();
// 	}
	
// 	function onFunc(){
// 		 unset($_SESSION['myLog']);
// 		 unset($_POST['on']);
// 		 echo('$_POST[on]'+$_POST['on']);
// 	}

?>
</body>

</html>

