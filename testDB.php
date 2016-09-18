<!DOCTYPE html>
<html>

<head>
<meta http-equiv="refresh" content="30">
</head>

<body>
<h1>My Website</h1>
<p>Some text...</p>

<?php
include_once('db/dbSC.php');
echo(getUnitName('X22'));
// include_once('process.php');
$t=array_fill(0,7,array_fill(0,7,0));
print_r($t);
echo'<br>';
echo'<br>';
$data = array
  (
  array(22,18),
  array(15,13),
  array(54,24),
  array(17,15)
  );

$child_data = array
(
		array(2,1),
		array(1,1),
		array(5,2),
		array(1,1)
);
$first_names = array_column($data, 1);
print_r($first_names);
echo'data<br>';
echo'data<br>';
print_r($data);
echo'$child_data<br>';
print_r($child_data);
echo'<br>';


// 	write_to_log(__FILE__,__LINE__,__FUNCTION__,'before flip',$arr);
	$rows = count($child_data);
	$cols = count($child_data[0]);; // assumes non empty matrix
	$rows_data = count($data);
	$cols_data = count($data[0]);
	$k=$rows_data;
	$l=$cols_data;
	$new_row=$rows;
	$new_col=$cols+$cols_data;
// 	$new_data=array_fill(0,$new_row,array_fill(0, $new_col, 0));
	$new_data=ARRAY();
	echo'newdata fill<br>';
	print_r($new_data);
	echo'<br>';
	$k=0;
	
	for($i=0;$i<$rows_data;$i++){
		$l=0;
		for($j=0;$j<$cols_data;$j++){
			$new_data[$k][$l++]=$data[$i][$j];
		}
		$k++;
	}
	echo'after marge data<br>';
	print_r($new_data);
	
	$k=0;
	
	for($i=0;$i<$rows;$i++){
		$l=$cols_data;
		for($j=0;$j<$cols;$j++){
			$new_data[$k][$l++]=$child_data[$i][$j];
		}
		$k++;
	}
	// 	write_to_log(__FILE__,__LINE__,__FUNCTION__,'after flip',$arr);
	echo'new_data<br>';
	print_r($new_data);
	// 	foreach($arr as $rowidx => $row){
	// 		foreach($row as $colidx => $val){
	// 			$out[$ridx][$cidx] = $val;
	// 			$ridx++;
	// 			if($ridx >= $rows){
	// 				$cidx++;
	// 				$ridx = 0;
	// 			}
	// 		}
	// 	}

	echo'<br>';
	echo'<br>';
var_dump($child_data);
// var_dump(flip_array($child_data));
var_dump($child_data);
/* $row_count=count($child_data);
$col_count=count($child_data[0]);
for($i=0;$i<$row_count;$i++){
// 	for($j=0;$j<$row_count;$j++){
	$data[][$i]=$child_data
} */
$test=read_sensor_data('X8');
print_r($test);
function read_sensor_data($consequent_id){
	
	if(!file_exists("textfiles/".$consequent_id.".txt"))
	{
		// 		die("File not found");
		return 'FNF';
	}
	else
	{
		$file_handle = fopen("textfiles/".$consequent_id.".txt", "r");
		while (!feof($file_handle))
		{
			$line = fgets($file_handle);
			$line = trim($line);
			$element_list[] = $line;
		}
		fclose($file_handle);
		return $element_list;
	}

}
	
/* $a='Average Permeable';
echo(str_replace("-"," ",$a));
include_once('db/dbSC.php');
echo(get_current_user());
$_SESSION["debug_enable_for_me"]=true;
echo($_SESSION['myLog']); */
/* function write_to_log($file,$line,$variable_name,$value){
	$dump='';
	
	if($_SESSION["debug_enable_for_me"]==true){
		
		$dump .='['.date("Y-m-d h:i:sa").']';
		$dump .='['.basename($file).']';
		$dump .='['.$line.']';
		$dump .='['.$variable_name.']';
		$myfile = fopen("log/X8.txt", "a") or die("Unable to open file!");
		$dump .= print_r($value, true);
 		$dump=str_replace("\n", "", $dump);
		$dump .=PHP_EOL;
		echo($dump);
		fwrite($myfile,$dump);
		fclose($myfile);
	}

} */
// $myfile = fopen("log/X8.txt", "r");
// var_dump(is_file($myfile));
/* $bt = debug_backtrace();
print_r(__FILE__);
$caller = array_shift($bt);
print_r(__FILE__,__LINE__,'');
$myfile = fopen("log/X8.txt", "a") or die("Unable to open file!"); */
echo "The time is " . date("Y-m-d h:i:sa");
$txt = "John Doe\n";
// write_to_log(__FILE__,__LINE__,'$txt',$txt);
// fwrite($myfile, $txt);
// $txt = "Jane Doe\n";
// fwrite($myfile, $txt);
// $cars = array("Volvo", "BMW", "Toyota");
// write_to_log(__FILE__,__LINE__,'$cars',$cars);
// fwrite($myfile,implode(" ",$cars));
// $dump = print_r($cars, true);
// fwrite($myfile,$dump);
// $dump = print_r($txt, true);
// fwrite($myfile,$dump);
// fclose($myfile);
//include_once('process.php');
/* get_ConsequenceVal(3);
for($i=0;$i<2;$i++){
	echo 'before inner loop<br>';
	//echo'$input='.$input;
	//echo'<br>';
	for($j=0;$j<3;$j++){
		if(1){
			echo $j;
			break;
		}
		
	}
	echo 'after inner loop<br>';
} */
//$f=getRuleBase_frm_db(3);
//print_r($f);
/* update_ConsequenceVal(2,2);

function multiplyVector($a=array(),$b)
{
    $count_a = count($a);
    $count_b = count($b);

    if($count_a)
    {
        for($i=0;$i<$count_a;$i++)
        {
            for($j=0;$j<$count_b;$j++)
            {
                $result[] = $a[$i] * $b[$j];
            }
        }
    }
    else
    {
        $result = $b;
    }

    return $result;
}

$X = [ 40, 50, 30 ];

$Y = [ 7, 5,3 ];

$Z = [ 10, 20, 50];
// add multiple array to $main
$main = [  $X,$Y];

$result = array();

foreach($main as $m)
{
    $result = multiplyVector($result,$m);
}


echo "<pre>";print_r($result);die */; 

//echo get_datat_ruleBaseTwo();
/* echo strncmp("Hello world!","Hello earth!",6);

if(!strncmp('RefVal1','RefVal',6)){
	echo 'found';
} else {
	echo 'not found';
} */
//delete_rule_base_for_two(5);
//echo show_default_values_for_antecedent("X22",3);
//ECHO show_default_values_for_consequent("X22",5);
//$testdata=load_default_values_for_antecedent("X22");
//echo $testdata;
/* $resultString="RefTitle-RefVal-AntecedentName|";
$resultString.="High-100-X22|";
$resultString.="Medium-50-X22|";
$resultString.="low-10-X22|";
echo $resultString;
$htmlS = '<table cellpadding="0" cellspacing="1" border="1" style="width:100%" >';
$myArray = explode('|', $resultString);
//Constructing header
//print_r($myArray);
$i=0;
foreach ($myArray as $data){
	if($data!=""){
		if($i==0){
			//$htmlS .= '<tr>';
			$headers=explode('-', $data);
			//foreach ($headers as $header){
			//	$htmlS .= '<th>'.$header.'</th>';
			//}
			//$htmlS .= '</tr>';
		}else{
			$htmlS .= '<tr>';
			$tdata=explode('-', $data);
			//foreach ($tdata as $tdatum){
			//	$htmlS .= '<td class="td">'.$tdatum.'</td>';
			//}
			for($j=0; $j<count($tdata)-1; $j++){
				$htmlS.='<tr>';
				//$j=$i+1;
				$htmlS.='<td>'.$headers[$j].($i).'</td>';
				$htmlS.='<td>'.$tdata[$j].'</td>';
				$htmlS.='</tr>';
			}
			$htmlS .= '</tr>';
		}
	}
	$i=$i+1;
}
$htmlS .= '</table>';
echo'<br>';
echo $htmlS; */