<?php

/*session_start();
 *
 * write_to_log(__FILE__,__LINE__,'$GLOBALS[numberOfRules]',$GLOBALS['numberOfRules']);
 *
 *write_to_log(__FILE__,__LINE__,__FUNCTION__,'$dataTObeNormalize2',$dataTObeNormalize2);
 * */

//$_SESSION['myLog']='';
function write_to_log($file,$line,$function_name,$variable_name,$value){
	$dump='';
	//$_SESSION['myLog']='before';
	if($_SESSION["debug_enable_for_me"]==true){

		$dump .='['.date("Y-m-d h:i:sa").']';
		$dump .='['.basename($file).']';
		$dump .='['.$line.']';
		$dump .='['.$function_name.']';
		$dump .='['.$variable_name.']';
		//$myfile = fopen("log/X8.txt", "a") or die("Unable to open file!");
		$dump .= print_r($value, true);
		$dump=str_replace("\n", "", $dump);
		//$dump .=PHP_EOL;
	
		//fwrite($myfile,$dump);
		//fclose($myfile);
		if(isset($_SESSION['myLog']) && !empty($_SESSION['myLog'])){
			$_SESSION['myLog'].=$dump.'<br>';
		}else{
			$_SESSION['myLog']=$dump.'<br>';
		}
		
	}

}
?>