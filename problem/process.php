

<?php
session_start();
include_once('BRBCalculations.php');
include_once('db/dbSC.php');
include_once('logWriter.php');


// $_SESSION["job_started"] = 0;
// $_SESSION["sensor_data_result"]=array();
$_SESSION["debug_enable_for_me"]=true;



$data = array();
$data['result_type'] = 'failed';
$data['html'] = '';
$data['html1'] = '';
$html = '';
$html_status='';
/* $noOfConsequentRefVal=0;
$consequentRefTitle;
$consequentRefVal;
$noOfantecedent;
$noOfAntecedentRefVal;
$antecedentRefTitle;
$antecedentRefVal;
$antecedentID;

$activationWeight;
//$_SESSION['$transformedRefVal']=array();
//$GLOBALS['transformedRefVal']=array_fill(0, 2, 0);
$GLOBALS['activationWeight']=array_fill(0, 2, 0);
$GLOBALS['numberOfRules']=1;
$GLOBALS['matchingDegree']=array_fill(0, 2, 0); */

/* echo 'Current script owner: ' . get_current_user();
echo fileperms("test.txt");
$file = fopen("test.txt","w");
var_dump(is_file($file));
echo fwrite($file,"Hello World. Testing!");
fclose($file); */
//print_r($data);
//$html = 'Test...';
/* function show_default_values_for_antecedent($antecedent_id){
	$testdata=load_default_values_for_antecedent($antecedent_id);
	//$htmlS = '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" class="tableborder">';
// 	$htmlS = '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" >';
	$htmlS='';
	$myArray = explode('|', $testdata);
	//Constructing header
	//print_r($myArray);
	$i=0;
	foreach ($myArray as $data){
		if($data!=""){
		if($i==0){
			$htmlS .= '<tr>';
			$headers=explode('-', $data);
			foreach ($headers as $header){
				$htmlS .= '<th>'.$header.'</th>';
			}
			$htmlS .= '</tr>';
		}else{
			$htmlS .= '<tr>';
			$tdata=explode('-', $data);
			foreach ($tdata as $tdatum){
				$htmlS .= '<td class="td">'.$tdatum.'</td>';
			}
			$htmlS .= '</tr>';
		}
		}
		$i=$i+1;
	}
	
	//$htmlS .= '</table>';
	$htmlS= '<tr>
					<td width=\'50%\'>ref1tittle</td>
					<td width=\'50%\'>high</td>
			</tr>
			<tr>
					<td width=\'50%\'>ref2tittle</td>
					<td width=\'50%\'>medium</td>
			</tr>
			<tr>
					<td width=\'50%\'>ref3tittle</td>
					<td width=\'50%\'>low</td>
			</tr>
			';
	return $htmlS;
} */

function show_default_values_for_antecedent($antecedent_id,$value,$id){
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$antecedent_id',$antecedent_id);
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$value',$value);
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$$id',$id);
	$htmlS = '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" >';
	
	if($value=='Default'){
		$testdata=load_default_values_for_antecedent($antecedent_id);
		$myArray = explode('|', $testdata);
		$i=0;
		foreach ($myArray as $data){
			if($data!=""){
				if($i==0){
					$headers=explode('-', $data);
					//foreach ($headers as $header){
					//	$htmlS .= '<th>'.$header.'</th>';
					//}
					//$htmlS .= '</tr>';
				}else{
				//$htmlS .= '<tr>';
						$tdata=explode('-', $data);
						write_to_log(__FILE__,__LINE__,__FUNCTION__,'$tdata',$tdata);
						//foreach ($tdata as $tdatum){
						//	$htmlS .= '<td class="td">'.$tdatum.'</td>';
						//}
						for($j=0; $j<count($tdata)-1; $j++){
						$htmlS.='<tr>';
								//$j=$i+1;
								$htmlS.='<td width=\'50%\' >'.$headers[$j].($i).'</td>';
								$tmp='';
								if(!strncmp($headers[$j],'RefTitle',8)){
									$tmp='antecedent_reftitle_'.$id.'_'.$i;
								}
								if(!strncmp($headers[$j],'RefVal',6)){
									$tmp='antecedent_refval_'.$id.'_'.$i;
								}
// 								write_to_log(__FILE__,__LINE__,__FUNCTION__,'$tmp',$tmp);
// 								write_to_log(__FILE__,__LINE__,__FUNCTION__,'$tdata[$j]',str_replace("-"," ",$tdata[$j]));
								$htmlS.='<td width=\'50%\'> <input name=\''.$tmp.'\' type=\'text\' id=\'antecedent_attribute_weight_\' size=\'10\'  value=\''.str_replace("-"," ",$tdata[$j]).'\' /></td>';
								
								$htmlS.='</tr>';
						}
						//$htmlS .= '</tr>';
// 						write_to_log(__FILE__,__LINE__,__FUNCTION__,'$htmlS',$htmlS);
				}
			}
			$i=$i+1;
		}	
	}else{
		
		for($k=1;$k<=$value;$k++){
			$htmlS .= '<tr>';
			$htmlS.='<td width=\'50%\' >RefTitle'.($k).'</td>';
			$htmlS.='<td width=\'50%\'> <input name=\'antecedent_reftitle_'.$id.'_'.($k).'\' type=\'text\' id=\'antecedent_reftitle_'.($k).'\' size=\'10\'  /></td>';
			$htmlS.='</tr>';
			$htmlS .= '<tr>';
			$htmlS.='<td width=\'50%\' >RefVal'.($k).'</td>';
			$htmlS.='<td width=\'50%\'> <input name=\'antecedent_refval_'.$id.'_'.($k).'\' type=\'text\' id=\'antecedent_refval_'.($k).'\' size=\'10\'  /></td>';
			$htmlS.='</tr>';
		}
		//echo $htmlS;
	}
	

	$htmlS .= '</table>';
	
	return $htmlS;
}
function show_default_values_for_consequent($antecedent_id,$value){
	

	$htmlS = '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" >';
	
	if($value=='Default'){
		$testdata=load_default_values_for_antecedent($antecedent_id);
		$myArray = explode('|', $testdata);
		$i=0;
		foreach ($myArray as $data){
			if($data!=""){
				if($i==0){
					$headers=explode('-', $data);
					//foreach ($headers as $header){
					//	$htmlS .= '<th>'.$header.'</th>';
					//}
					//$htmlS .= '</tr>';
				}else{
				//$htmlS .= '<tr>';
					$tdata=explode('-', $data);
					//foreach ($tdata as $tdatum){
					//	$htmlS .= '<td class="td">'.$tdatum.'</td>';
					//}
					for($j=0; $j<count($tdata)-1; $j++){
					$htmlS.='<tr>';
						//$j=$i+1;
						$htmlS.='<td width=\'50%\' >'.$headers[$j].($i).'</td>';
						$tmp='';
								if(!strncmp($headers[$j],'RefTitle',8)){
								$tmp='consequent_reftitle_'.$i;
								}
										if(!strncmp($headers[$j],'RefVal',6)){
										$tmp='consequent_refval_'.$i;
								}
												$htmlS.='<td width=\'50%\'> <input name=\''.$tmp.'\' type=\'text\' id=\'consequent_attribute_weight_\' size=\'10\'  value='.$tdata[$j].' /></td>';
												$htmlS.='</tr>';
					}
					//$htmlS .= '</tr>';
				}
				}
				$i=$i+1;
				}
				}else{
	
				for($k=1;$k<=$value;$k++){
					$htmlS .= '<tr>';
					$htmlS.='<td width=\'50%\' >RefTitle'.($k).'</td>';
			$htmlS.='<td width=\'50%\'> <input name=\'consequent_reftitle_'.($k).'\' type=\'text\' id=\'consequent_reftitle_'.($k).'\' size=\'10\'  /></td>';
			$htmlS.='</tr>';
						$htmlS .= '<tr>';
						$htmlS.='<td width=\'50%\' >RefVal'.($k).'</td>';
			$htmlS.='<td width=\'50%\'> <input name=\'consequent_refval_'.($k).'\' type=\'text\' id=\'consequent_refval_'.($k).'\' size=\'10\'  /></td>';
			$htmlS.='</tr>';
					}
					//echo $htmlS;
				}
	
	
				$htmlS .= '</table>';
	
				return $htmlS;
// 	$htmlS='';
// 	if($value=='Default'){
// 		global $noOfConsequentRefVal;
// 		$noOfConsequentRefVal=3;
// 		global $consequentRefTitle;
// 		$consequentRefTitle=array_fill(0,$noOfConsequentRefVal,0);
// 		global $consequentRefVal;
// 		$consequentRefVal=array_fill(0,$noOfConsequentRefVal,0);
// 		$result_strings=explode('|', load_default_values_for_antecedent($node_id));
// 		                             load_default_values_for_antecedent
// 		for($j=1;$j<(count($result_strings)-1);$j++){
// 			$data=explode('-', $result_strings[$j]);
// 			$consequentRefTitle[$j-1]=$data[0];
// 			$consequentRefVal[$j-1]=$data[1];
// 		}
// 		CreateRuleBase();
// 		$dataString=get_datat_ruleBaseTwo();
// 		$htmlS .= '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" class="tableborder">';
		
// 		$myArray = explode('|', $dataString);
// 		$i=0;
// 		foreach ($myArray as $data){
// 			if($i==0){
// 				$headers = explode('-', $data);
// 				$htmlS .= '<tr>';
// 				foreach ($headers as $header){
// 					$htmlS .= '<th>'.$header.'</th>';
// 				}
// 				$htmlS .= '</tr>';
// 				$i=$i+1;
// 			}else{
// 				$rows = explode('-', $data);
// 				$htmlS .= '<tr>';
// 				foreach ($rows as $row){
// 					$htmlS .= '<td class="td">'.$row.'</td>';
// 				}
// 				$htmlS .= '</tr>';
// 			}
			
// 		}
// 		$htmlS .= '</table>';
// 		//return $htmlS;
// 		//print_r($consequentRefTitle) ;
// 		//print_r($consequentRefVal);
// 		/* If (Me.cboNoOfConsequentRefVal.Text = "Default") Then
// 		noOfConsequentRefVal = 3
// 		ReDim consequentRefTitle(noOfConsequentRefVal) As String
// 		ReDim consequentRefVal(noOfConsequentRefVal) As Double
// 		Connection ("select * from DefaultRefVal where AntecedentName='x8' order by RefVal Desc")
		
// 		For i = 0 To noOfConsequentRefVal - 1
// 		Me.DataGridRuleBase.Row = i
// 		consequentRefTitle(i) = Me.DataGridRuleBase.Columns(0)
// 		'consequentRefVal(i) = Me.DataGridRuleBase.Columns(1) 
//     	Next i*/
        
// 	}else{
// 		$noOfConsequentRefVal=$value;
// 		$htmlS = '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" >';
// 		for($k=1;$k<=$value;$k++){
// 			$htmlS .= '<tr>';
// 			$htmlS.='<td width=\'50%\' >RefTitle'.($k).'</td>';
// 			$htmlS.='<td width=\'50%\'> <input name=\'consequent_reftitle_'.($k).'\' type=\'text\' id=\'consequent_reftitle_'.($k).'\' size=\'10\'  /></td>';
// 			$htmlS.='</tr>';
// 			$htmlS .= '<tr>';
// 			$htmlS.='<td width=\'50%\' >RefVal'.($k).'</td>';
// 			$htmlS.='<td width=\'50%\'> <input name=\'consequent_refval_'.($k).'\' type=\'text\' id=\'consequent_refval_'.($k).'\' size=\'10\'  /></td>';
// 			$htmlS.='</tr>';
			
// 		}
// 		$htmlS .= '<tr>';
// 		$htmlS.='<td width=\'50%\' ></td>';
// 		$htmlS.='<td width=\'50%\'>
					
// 					<input type="button" name="consequent_nonDefault_refs" value="Submit" onclick="show_nondefault_values_for_consequent(\'show_nondefault_values_for_consequent\',\''.$node_id.'\',\''.$noOfConsequentRefVal.'\');" />
// 							</td>';
// 		$htmlS.='</tr>';
// 		$htmlS .= '</table>';
// 	}
// 	return $htmlS;
}
function compute_rule_base($node_id,$value){
	convertPostDataToAncedentArray();
	convertPostDataToconsequentArray();
			$noOfConsequentRefVal=0;
			$noOfantecedent;
			$consequentRefTitle;
			if($value=='Default'){
				$noOfConsequentRefVal=3;
			}else{
				$noOfConsequentRefVal=$value;
			}
			$_SESSION[$_GET['node']]['$noOfConsequentRefVal']=$noOfConsequentRefVal;
			write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][$noOfConsequentRefVal]',$_SESSION[$_GET['node']]['$noOfConsequentRefVal']);
			
			$consequentRefTitle=array_fill(0,$_SESSION[$_GET['node']]['$noOfConsequentRefVal'],0);
			global $consequentRefVal;
			$consequentRefVal=array_fill(0,$_SESSION[$_GET['node']]['$noOfConsequentRefVal'],0);
			if($value=='Default'){
				$result_strings=explode('|', load_default_values_for_antecedent($node_id));
			 	
				for($j=1;$j<(count($result_strings)-1);$j++){
					$data=explode('-', $result_strings[$j]);
					$consequentRefTitle[$j-1]=$data[0];
					$consequentRefVal[$j-1]=$data[1];
				}
			}else{
				
			}
			
			$_SESSION[$_GET['node']]['$consequentRefTitle']=$consequentRefTitle;
			
			write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][$consequentRefTitle]',$_SESSION[$_GET['node']]['$consequentRefTitle']);
			$_SESSION[$_GET['node']]['$consequentRefVal']=$consequentRefVal;
			write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][$consequentRefVal]',$_SESSION[$_GET['node']]['$consequentRefVal']);
				
	
			CreateRuleBase();
			$noOfantecedent=$_SESSION[$_GET['node']]['$noOfantecedent'];
			if($noOfantecedent==2){
				$dataString=get_datat_ruleBaseTwo();
			}
			if($noOfantecedent==3){
				$dataString=get_datat_ruleBaseThree();
			}
			if($noOfantecedent==5){
				$dataString=get_datat_ruleBaseFive();
			}
			
			
			
			write_to_log(__FILE__,__LINE__,__FUNCTION__,'$dataString',$dataString);
			$htmlS = '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" class="tableborder">';
	
			$myArray = explode('|', $dataString);
			$i=0;
			foreach ($myArray as $data){
				if($i==0){
					$headers = explode('-', $data);
					$htmlS .= '<tr>';
					foreach ($headers as $header){
						$htmlS .= '<th>'.$header.'</th>';
					}
					$htmlS .= '</tr>';
					$i=$i+1;
				}else{
					$rows = explode('-', $data);
					$htmlS .= '<tr>';
					foreach ($rows as $row){
						$htmlS .= '<td class="td">'.$row.'</td>';
					}
					$htmlS .= '</tr>';
				}
		
			}
			$htmlS .= '</table>';
			return $htmlS;
			//return $htmlS;
			//print_r($consequentRefTitle) ;
			//print_r($consequentRefVal);
			
}
function CreateRuleBase(){
	/* global $noOfConsequentRefVal;
	global $consequentRefTitle;
	global $consequentRefVal;
	
	global $noOfantecedent;
	global $noOfantecedentRefVal;
	global $antecedentRefTitle;
	global $antecedentRefVal;
	global $antecedentID; */
	
	$noOfConsequentRefVal=$_SESSION[$_GET['node']]['$noOfConsequentRefVal'];
	$consequentRefTitle=$_SESSION[$_GET['node']]['$consequentRefTitle'];
	$consequentRefVal=$_SESSION[$_GET['node']]['$consequentRefVal'];
	
	$noOfantecedent=$_SESSION[$_GET['node']]['$noOfantecedent'];
	$noOfantecedentRefVal=$_SESSION[$_GET['node']]['$noOfantecedentRefVal'];
	$antecedentRefTitle=$_SESSION[$_GET['node']]['$antecedentRefTitle'];
	$antecedentRefVal=$_SESSION[$_GET['node']]['$antecedentRefVal'];
	$antecedentID=$_SESSION[$_GET['node']]['$antecedentID'];
// 	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][$noOfConsequentRefVal]',$_SESSION[$_GET['node']]['$noOfConsequentRefVal']);
	
	
	
	/* echo'$noOfConsequentRefVal<br>';
	print_r($noOfConsequentRefVal);	
	echo'$consequentRefTitle<br>';
	print_r($consequentRefTitle);
	echo'$consequentRefVal<br>';
	print_r($consequentRefVal);  */
	$a=0;
	$t=0;
	$consequentRefVal=array_fill(0, $noOfConsequentRefVal, 0);
	for($i=1;$i<=$noOfantecedent;$i++){
		$t=$t+$_POST['antecedent_attribute_weight_'.$i]*$antecedentRefVal[$i-1][0];
	}
	$consequentRefVal[0]=$a+$t;

	$t=0;
 	for($i=1;$i<=$noOfantecedent;$i++){
 		$t=$t+$_POST['antecedent_attribute_weight_'.$i]*$antecedentRefVal[$i-1][$noOfantecedentRefVal[$i-1]-1];
 	}

 	$consequentRefVal[$noOfConsequentRefVal-1]=$a+$t;
	
	if($noOfConsequentRefVal=='Default' || $noOfConsequentRefVal==3){
		$consequentRefVal[1]=($consequentRefVal[0] + $consequentRefVal[$noOfConsequentRefVal - 1]) / 2;
	}
	elseif($noOfConsequentRefVal==4){
		$consequentRefVal[2]=($consequentRefVal[0]*1 + $consequentRefVal[$noOfConsequentRefVal - 1]*2) / 3;
		$consequentRefVal[1]=($consequentRefVal[0]*2 + $consequentRefVal[$noOfConsequentRefVal - 1]*1) / 3;
	}elseif($noOfConsequentRefVal==5){
		$consequentRefVal[3]=($consequentRefVal[0]*1 + $consequentRefVal[$noOfConsequentRefVal - 1]*3) / 4;
		$consequentRefVal[2]=($consequentRefVal[0]*2 + $consequentRefVal[$noOfConsequentRefVal - 1]*2) / 4;
		$consequentRefVal[1]=($consequentRefVal[0]*3 + $consequentRefVal[$noOfConsequentRefVal - 1]*1) / 4;
	}
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$consequentRefVal',$consequentRefVal);
	if($noOfantecedent==2){
		delete_rule_base_for_two($noOfConsequentRefVal);
		$m=0;
		for($i=0;$i<$noOfantecedentRefVal[0];$i++){
			for($j=0;$j<$noOfantecedentRefVal[1];$j++){
				$value=array_fill(0, $noOfConsequentRefVal,0);
				$y=0;
				$y=$y+$_POST['antecedent_attribute_weight_1']*$antecedentRefVal[0][$i]+$_POST['antecedent_attribute_weight_2']*$antecedentRefVal[1][$j];
				//echo'Y=>';
				//print_r($y);
				for($k=0;$k<$noOfConsequentRefVal;$k++){
					if($y==$consequentRefVal[$k]){
						$value[$k]=1;
						GOTO insertDB;
					}
				}
				 
		
				//print_r($consequentRefVal);
				for($l=0;$l<$noOfConsequentRefVal-1;$l++){
				  
					If (($consequentRefVal[$l] > $y) && ($y > $consequentRefVal[$l + 1]) ){
						$value[$l + 1] = ($consequentRefVal[$l] - $y) / ($consequentRefVal[$l] - $consequentRefVal[$l + 1]);
						$value[$l] = Round(1 - $value[$l + 1], 4);
		
					}
				}
		
				insertDB:
		
		
				If ($noOfConsequentRefVal == 3) {
				  
					insert_ruleBaseTwo_3($m,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
							$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],$_POST['consequent_id_1'],$value[0],$value[1],$value[2]);
		
				}
				If ($noOfConsequentRefVal == 4) {
				  
					insert_ruleBaseTwo_4($m,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
							$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],$_POST['consequent_id_1'],$value[0],$value[1],$value[2],$value[3]);
		
				}
				If ($noOfConsequentRefVal == 5) {
						
					insert_ruleBaseTwo_5($m,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
							$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],$_POST['consequent_id_1'],$value[0],$value[1],$value[2],$value[3],$value[4]);
						
				}
				$m=$m+1;
			}
		}
	}

	if($noOfantecedent==3){
		delete_rule_base_for_three($noOfConsequentRefVal);
		$m=0;
		for($i=0;$i<$noOfantecedentRefVal[0];$i++){
			for($j=0;$j<$noOfantecedentRefVal[1];$j++){
				for($a=0;$a<$noOfantecedentRefVal[2];$a++){
					$value=array_fill(0, $noOfConsequentRefVal,0);
					$y=0;
					$y=$y+$_POST['antecedent_attribute_weight_1']*$antecedentRefVal[0][$i]
					+$_POST['antecedent_attribute_weight_2']*$antecedentRefVal[1][$j]+$_POST['antecedent_attribute_weight_3']*$antecedentRefVal[2][$a];
					//echo'Y=>';
					//print_r($y);
					for($k=0;$k<$noOfConsequentRefVal;$k++){
						if($y==$consequentRefVal[$k]){
							$value[$k]=1;
							GOTO insertDB3;
						}
					}
					
					
					//print_r($consequentRefVal);
					for($l=0;$l<$noOfConsequentRefVal-1;$l++){
					
						If (($consequentRefVal[$l] > $y) && ($y > $consequentRefVal[$l + 1]) ){
							$value[$l + 1] = ($consequentRefVal[$l] - $y) / ($consequentRefVal[$l] - $consequentRefVal[$l + 1]);
							$value[$l] = Round(1 - $value[$l + 1], 4);
					
						}
					}
					insertDB3:
					
					
					If ($noOfConsequentRefVal == 3) {
					
						insert_ruleBaseThree_3($m,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
								$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],
								$_POST['antecedent_id_3'],$antecedentRefTitle[2][$a],$_POST['consequent_id_1'],$value[0],$value[1],$value[2]);
					
					}
					If ($noOfConsequentRefVal == 4) {
					
						insert_ruleBaseThree_4($m,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
								$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],
								$_POST['antecedent_id_3'],$antecedentRefTitle[2][$a],$_POST['consequent_id_1'],$value[0],$value[1],$value[2],$value[3]);
					
					}
					If ($noOfConsequentRefVal == 5) {
					
						insert_ruleBaseThree_5($m,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
								$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],
								$_POST['antecedent_id_3'],$antecedentRefTitle[2][$a],$_POST['consequent_id_1'],$value[0],$value[1],$value[2],$value[3],$value[4]);
					
					}
					$m=$m+1;
					
				}
			}
		}	
	}
	if($noOfantecedent==5){
		delete_rule_base_for_five($noOfConsequentRefVal);
		$m=0;
		for($i=0;$i<$noOfantecedentRefVal[0];$i++){
			for($j=0;$j<$noOfantecedentRefVal[1];$j++){
				for($a=0;$a<$noOfantecedentRefVal[2];$a++){
					for($b=0;$b<$noOfantecedentRefVal[3];$b++){
						for($c=0;$c<$noOfantecedentRefVal[4];$c++){
								$value=array_fill(0, $noOfConsequentRefVal,0);
								write_to_log(__FILE__,__LINE__,__FUNCTION__,'$value',$value);
								$y=0;
								$y=$y+$_POST['antecedent_attribute_weight_1']*$antecedentRefVal[0][$i]+
								$_POST['antecedent_attribute_weight_2']*$antecedentRefVal[1][$j]+
								$_POST['antecedent_attribute_weight_3']*$antecedentRefVal[2][$a]+
								$_POST['antecedent_attribute_weight_4']*$antecedentRefVal[3][$b]+
								$_POST['antecedent_attribute_weight_5']*$antecedentRefVal[4][$c];
								//echo'Y=>';
								//print_r($y);
								write_to_log(__FILE__,__LINE__,__FUNCTION__,'$y',$y);
								for($k=0;$k<$noOfConsequentRefVal;$k++){
									if($y==$consequentRefVal[$k]){
										$value[$k]=1;
										write_to_log(__FILE__,__LINE__,__FUNCTION__,'$value',$value);
										GOTO insertDB5;
									}
								}
									
									
								//print_r($consequentRefVal);
								
								write_to_log(__FILE__,__LINE__,__FUNCTION__,'$consequentRefVal',$consequentRefVal);
								for($l=0;$l<$noOfConsequentRefVal-1;$l++){
									write_to_log(__FILE__,__LINE__,__FUNCTION__,'$y',$y);
									write_to_log(__FILE__,__LINE__,__FUNCTION__,'$consequentRefVal['.$l.']',$consequentRefVal[$l]);
									write_to_log(__FILE__,__LINE__,__FUNCTION__,'$consequentRefVal['.($l+ 1).']',$consequentRefVal[$l+ 1]);
									If (($consequentRefVal[$l] > $y) && ($y > $consequentRefVal[$l + 1]) ){
										$value[$l + 1] = ($consequentRefVal[$l] - $y) / ($consequentRefVal[$l] - $consequentRefVal[$l + 1]);
										$value[$l] = Round(1 - $value[$l + 1], 4);
										write_to_log(__FILE__,__LINE__,__FUNCTION__,'$value',$value);
									}
								}
								insertDB5:
									
									
								If ($noOfConsequentRefVal == 3) {
								
									insert_ruleBaseFive_3($m,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
											$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],
											$_POST['antecedent_id_3'],$antecedentRefTitle[2][$a],
											$_POST['antecedent_id_4'],$antecedentRefTitle[3][$b],
											$_POST['antecedent_id_5'],$antecedentRefTitle[4][$c],
											$_POST['consequent_id_1'],$value[0],$value[1],$value[2]);
										
								}
								If ($noOfConsequentRefVal == 4) {
										
									insert_ruleBaseFive_4($m,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
											$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],
											$_POST['antecedent_id_3'],$antecedentRefTitle[2][$a],
											$_POST['antecedent_id_4'],$antecedentRefTitle[3][$b],
											$_POST['antecedent_id_5'],$antecedentRefTitle[4][$c],
											$_POST['consequent_id_1'],$value[0],$value[1],$value[2],$value[3]);
										
								}
								If ($noOfConsequentRefVal == 5) {
									
									insert_ruleBaseFive_5($m,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
											$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],
											$_POST['antecedent_id_3'],$antecedentRefTitle[2][$a],
											$_POST['antecedent_id_4'],$antecedentRefTitle[3][$b],
											$_POST['antecedent_id_5'],$antecedentRefTitle[4][$c],
											$_POST['consequent_id_1'],$value[0],$value[1],$value[2],$value[3],$value[4]);
										
								}
								$m=$m+1;
						}
					}
				}
			}
		}
	}
	/* $a=0;
	$tmpYs=array_fill(0,$noOfantecedent,0);
	for($i=0;$i<$noOfantecedent;$i++){
		$tmpYs[$i]=array_fill(0,$noOfantecedentRefVal[$i],0);
		for($j=0;$j<$noOfantecedentRefVal[$i];$j++){
			//$tmpY[$i][$j]=pow(($_SESSION['transformedRefVal'][$i][$j]) , ($_POST['antecedent_attribute_weight_'.($i+1)]));
			$tmpYs[$i][$j]=$antecedentRefVal[$i][$j]*$_POST['antecedent_attribute_weight_'.($i+1)];
				
		}
	}
	echo'</br> tmpY=>';
	print_r($tmpYs);
	foreach ($tmpYs as $tmpY){
		$y=combinatoricSummation($y,$tmpY);
	}
	echo'</br> Y=>';
	print_r($y);
	for($i=0;$i<count($y);$i++){
		$value=array_fill(0, $noOfConsequentRefVal,0);
		
		for($k=0;$k<$noOfConsequentRefVal;$k++){
			if($y[$i]==$consequentRefVal[$k]){
				$value[$k]=1;
				GOTO insertDB;
			}
		}
		
		for($l=0;$l<$noOfConsequentRefVal-1;$l++){
			 
			If (($consequentRefVal[$l] > $y) && ($y > $consequentRefVal[$l + 1]) ){
				$value[$l + 1] = ($consequentRefVal[$l] - $y) / ($consequentRefVal[$l] - $consequentRefVal[$l + 1]);
				$value[$l] = Round(1 - $value[$l + 1], 4);
		
			}
		}
		
		insertDB:
		If ($noOfConsequentRefVal == 3) {
			insert_ruleBaseTwo_3($m,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
					$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],$_POST['consequent_id_1'],$value[0],$value[1],$value[2]);
			insert_ruleBaseTwo_3($k,1,$_POST['antecedent_id_1'],$antecedentRefTitle[0][$i],
					$_POST['antecedent_id_2'],$antecedentRefTitle[1][$j],$_POST['consequent_id_1'],$value[0],$value[1],$value[2]);
		}
		
		
	} */

	
}
function convertPostDataToAncedentArray(){
	$noOfantecedent;
	$noOfantecedentRefVal;
	$antecedentRefTitle;
	$antecedentRefVal;
	$antecedentID;
	
	
	if(isset($_POST['number_of_child']) && !empty($_POST['number_of_child'])){
		// creating and initializing arrays 
		$noOfantecedent=$_POST['number_of_child'];
		$noOfantecedentRefVal=array_fill(0, $noOfantecedent, 0);
		$antecedentRefTitle=array_fill(0, $noOfantecedent, 0);
		$antecedentRefVal=array_fill(0, $noOfantecedent, 0);
		for($i=1;$i<=$noOfantecedent;$i++){
			$tmp='antecedent_number_of_ref_val_'.$i;
			
			if($_POST[$tmp]=='Default'){
				/* 
				 * Quick fix
				 *  */
				if($_POST['antecedent_id_'.$i]=='X28'){
					$noOfantecedentRefVal[$i-1]=2;
				}else{
					$noOfantecedentRefVal[$i-1]=3;
				}
				
				$antecedentRefTitle[$i-1]=array_fill(0, 3, 0);
				$antecedentRefVal[$i-1]=array_fill(0, 3, 0);
			}
			elseif($_POST[$tmp]!='NA'){
				$noOfantecedentRefVal[$i-1]=$_POST['antecedent_number_of_ref_val_'.$i];
				$antecedentRefTitle[$i-1]=array_fill(0, $noOfantecedentRefVal[$i-1], 0);
				$antecedentRefVal[$i-1]=array_fill(0, $noOfantecedentRefVal[$i-1], 0);
			} 
		}

		for($j=1;$j<=$noOfantecedent;$j++){
			

			for($k=1;$k<=$noOfantecedentRefVal[$j-1];$k++){
				
				$antecedentRefTitle[$j-1][$k-1]=$_POST['antecedent_reftitle_'.$j.'_'.$k];
				$antecedentRefVal[$j-1][$k-1]=$_POST['antecedent_refval_'.$j.'_'.$k];
			} 
			
		} 
		$antecedentID=array_fill(0, $noOfantecedent, 0);
		for($i=0;$i<$noOfantecedent;$i++){
			$antecedentID[$i]=$_POST['antecedent_id_'.($i+1)];
		}
	}else{
		echo 'number_of_child not defined';
	}
	
	$_SESSION[$_GET['node']]['$noOfantecedent']=$noOfantecedent;
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][$noOfantecedent]',$_SESSION[$_GET['node']]['$noOfantecedent']);
	$_SESSION[$_GET['node']]['$noOfantecedentRefVal']=$noOfantecedentRefVal;
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][$noOfantecedentRefVal]',$_SESSION[$_GET['node']]['$noOfantecedentRefVal']);
	$_SESSION[$_GET['node']]['$antecedentRefTitle']=$antecedentRefTitle;
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][$antecedentRefTitle]',$_SESSION[$_GET['node']]['$antecedentRefTitle']);
	$_SESSION[$_GET['node']]['$antecedentRefVal']=$antecedentRefVal;
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][$antecedentRefVal]',$_SESSION[$_GET['node']]['$antecedentRefVal']);
	$_SESSION[$_GET['node']]['$antecedentID']=$antecedentID;
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][$antecedentID]',$_SESSION[$_GET['node']]['$antecedentID']);
	
	//echo'$noOfantecedentRefVal:=>';
	//print_r($noOfantecedentRefVal);
}
function convertPostDataToconsequentArray(){
	global $noOfConsequentRefVal;
	global $consequentRefTitle;
	global $consequentRefVal;
	for($i=0;$i<$noOfConsequentRefVal;$i++){
		$consequentRefTitle[$i]=$_POST['consequent_reftitle_'.($i+1)];
		$consequentRefVal[$i]=$_POST['consequent_refval_'.($i+1)];
	}
	$_SESSION[$_GET['node']]['noOfConsequentRefVal']=$noOfConsequentRefVal;
	$_SESSION[$_GET['node']]['consequentRefTitle']=$consequentRefTitle;
	$_SESSION[$_GET['node']]['consequentRefVal']=$consequentRefVal;
	//echo'$noOfantecedentRefVal:=>';
	//print_r($noOfantecedentRefVal);
}
function execute_Input_Transformation(){
	
	//global $transformedRefVal;
	
	$noOfantecedent=$_SESSION[$_GET['node']]['$noOfantecedent'];
	$noOfantecedentRefVal=$_SESSION[$_GET['node']]['$noOfantecedentRefVal'];
	$antecedentRefTitle=$_SESSION[$_GET['node']]['$antecedentRefTitle'];
	$antecedentRefVal=$_SESSION[$_GET['node']]['$antecedentRefVal'];
	$antecedentID=$_SESSION[$_GET['node']]['$antecedentID'];
// 	convertPostDataToAncedentArray();
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$antecedentRefTitle',$antecedentRefTitle);
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$antecedentRefVal',$antecedentRefVal);

	
	$_SESSION[$_GET['node']]['transformedRefVal']=array_fill(0, $noOfantecedent, 0);
	for($i=0;$i<$noOfantecedent;$i++){
		$_SESSION[$_GET['node']]['transformedRefVal'][$i]=array_fill(0, $noOfantecedentRefVal[$i], 0);
	}
	//print_r($GLOBALS['transformedRefVal']);
	//echo'<br>';
	$input=0;
	for($i=0;$i<$noOfantecedent;$i++){

		if(isset($_SESSION[$_POST['antecedent_id_'.($i+1)]]['aggregated_Values']) && !empty($_SESSION[$_POST['antecedent_id_'.($i+1)]]['aggregated_Values'])){
			write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_POST['antecedent_id_'.($i+1)].'][aggregated_Values]',$_SESSION[$_POST['antecedent_id_'.($i+1)]]['aggregated_Values']);
			$_SESSION[$_GET['node']]['transformedRefVal'][$i]=$_SESSION[$_POST['antecedent_id_'.($i+1)]]['aggregated_Values'];
		}else{
			
		
// 		echo'<br>loop starts<br>';
		$input=0;
		//echo'$input='.$input;
		
		if(isset($_POST['antecedent_input_'.($i+1)]) && !empty($_POST['antecedent_input_'.($i+1)])){
			$input=$_POST['antecedent_input_'.($i+1)];
		}
// 		echo'$input='.$input;
		if($input>$antecedentRefVal[$i][0]){
			$input=$antecedentRefVal[$i][0];
		}elseif($input<$antecedentRefVal[$i][$noOfantecedentRefVal[$i]-1]){
			$input=$antecedentRefVal[$i][$noOfantecedentRefVal[$i]-1];
		}
 		
// 		echo'<br>';
		$donotgo=0;
		for($j=0;$j<$noOfantecedentRefVal[$i];$j++){
// 			echo'<br>antecedentRefVal[$i][$j]<br>'.$antecedentRefVal[$i][$j];
			
			if($input==$antecedentRefVal[$i][$j]){
				$_SESSION[$_GET['node']]['transformedRefVal'][$i][$j]=1;
				//return 'Performed Input Transformation s';
// 				echo'<br>xxxxx<br>';
// 				print_r($_SESSION['transformedRefVal']);
				$donotgo=1;
				break;
			}
			
			
		}
		
		/* echo '$noOfantecedentRefVal[$i]-2='.($noOfantecedentRefVal[$i]-2);
		echo'<br>';
		echo '$antecedentRefVal[$i][$noOfantecedentRefVal[$i]-2]='.($antecedentRefVal[$i][$noOfantecedentRefVal[$i]-2]);
		echo'<br>'; */
		if($donotgo==0){
			for($m=0;$m<$noOfantecedentRefVal[$i]-1;$m++){
// 				echo '$antecedentRefVal[$i][$m]='.$antecedentRefVal[$i][$m];
// 				 echo'<br>';
// 				 echo '$antecedentRefVal[$i][$m+1]='.$antecedentRefVal[$i][$m+1];
// 				 echo'<br>';
// 				 echo'$input='.$input;
// 				 echo'<br>'; 
				If (($antecedentRefVal[$i][$m] > $input) And ($input > $antecedentRefVal[$i][$m+1])){
					$_SESSION[$_GET['node']]['transformedRefVal'][$i][$m+1]=Round(($antecedentRefVal[$i][$m] - $input) / ($antecedentRefVal[$i][$m] - $antecedentRefVal[$i][$m+1]), 4);
					$_SESSION[$_GET['node']]['transformedRefVal'][$i][$m] = Round(1 - $_SESSION[$_GET['node']]['transformedRefVal'][$i][$m+1], 4);
					/* echo'$$GLOBALS[transformedRefVal]=';
					print_r($GLOBALS['transformedRefVal']);
					echo'<br>'; */
					
				}
			}
		}
// 		print_r($_SESSION['transformedRefVal']);
// 		echo'<br>';
		}
	} 
//  	echo'<br>===================';
//  	print_r($_SESSION['transformedRefVal']);
 	
// 	echo'<br>';
	$arrayToString='';
	for($i=0;$i<count($_SESSION[$_GET['node']]['transformedRefVal']);$i++){
		$arrayToString.='('.implode("-", $_SESSION[$_GET['node']]['transformedRefVal'][$i]).')';
	}
	return 'Performed Input Transformation ['.$arrayToString.']';

}
function execute_Activation_Weight_Computation(){
	//global $activationWeight;
	
	$noOfantecedent=$_SESSION[$_GET['node']]['$noOfantecedent'];
	$noOfantecedentRefVal=$_SESSION[$_GET['node']]['$noOfantecedentRefVal'];
	$antecedentRefTitle=$_SESSION[$_GET['node']]['$antecedentRefTitle'];
	$antecedentRefVal=$_SESSION[$_GET['node']]['$antecedentRefVal'];
	$antecedentID=$_SESSION[$_GET['node']]['$antecedentID'];
// 	convertPostDataToAncedentArray();
// 	print_r($noOfantecedent);
// 	write_to_log(__FILE__,__LINE__,'$noOfantecedent',$noOfantecedent);
// 	write_to_log(__FILE__,__LINE__,'$noOfantecedentRefVal',$noOfantecedentRefVal);
// 	write_to_log(__FILE__,__LINE__,'$antecedentRefTitle',$antecedentRefTitle);
// 	write_to_log(__FILE__,__LINE__,'$antecedentRefVal',$antecedentRefVal);
// 	write_to_log(__FILE__,__LINE__,'$GLOBALS[numberOfRules]',$GLOBALS['numberOfRules']);
// 	 echo'<br>';
// 	 print_r($noOfantecedentRefVal);
// 	 echo'<br>';
// 	 print_r($antecedentRefTitle);
// 	 echo'<br>';
// 	 print_r($antecedentRefVal);
// 	 echo'<br>'; 
// 	 print_r($GLOBALS['numberOfRules']);
// 	 echo'<br>'; 
// 	$GLOBALS['numberOfRules']=1;
	$_SESSION[$_GET['node']]['numberOfRules']=1;
	 for($i=0;$i<$noOfantecedent;$i++){
	 	$_SESSION[$_GET['node']]['numberOfRules']=$_SESSION[$_GET['node']]['numberOfRules']*$noOfantecedentRefVal[$i];
	 }
// 	 $_SESSION['numberOfRules']=$GLOBALS['numberOfRules'];
// 	 write_to_log(__FILE__,__LINE__,'$GLOBALS[numberOfRules]',$GLOBALS['numberOfRules']);
// 	 echo'<br>GLOBALS[numberOfRules]';
//  	 print_r($GLOBALS['numberOfRules']);
//  	 echo'<br>';
// 	 $GLOBALS['activationWeight']=array_fill(0, $GLOBALS['numberOfRules'], 0);
	 $_SESSION[$_GET['node']]['activationWeight']=array_fill(0, $_SESSION[$_GET['node']]['numberOfRules'], 0);
// 	 write_to_log(__FILE__,__LINE__,'$GLOBALS[activationWeight]',$GLOBALS['activationWeight']);
// 	 echo'<br>GLOBALS[activationWeight]';
// 	 print_r($GLOBALS['activationWeight']);
// 	 echo'<br>';
	 //echo'<br>$transformedRefVal';
	 //print_r($_SESSION['$transformedRefVal']);
// 	 echo'<br>'; 
	 findMatchingDegree();
	 if($noOfantecedent==2){
	 	$_SESSION[$_GET['node']]['RuleWeight']= get_data_RuleWeight_ruleBaseTwo();
	 }
	 if($noOfantecedent==3){
	 	$_SESSION[$_GET['node']]['RuleWeight']= get_data_RuleWeight_ruleBaseThree();
	 }
	 if($noOfantecedent==5){
	 	$_SESSION[$_GET['node']]['RuleWeight']= get_data_RuleWeight_ruleBaseFive();
	 }
	
// 	write_to_log(__FILE__,__LINE__,'$_SESSION[RuleWeight]',$_SESSION['RuleWeight']);
 	 /* echo'<br>$_SESSION[RuleWeight]';
 	 print_r($_SESSION['RuleWeight']);
 	 echo'<br>'; */
	 $sum=0;
	 for($i=0;$i<count($_SESSION[$_GET['node']]['RuleWeight']);$i++){
	 	$sum=$sum+$_SESSION[$_GET['node']]['RuleWeight'][$i]*$_SESSION[$_GET['node']]['matchingDegree'][$i];
	 }
//  	 echo'<br>Sum:'.$sum;
 	 $_SESSION[$_GET['node']]['activationWeight']=array_fill(0, $_SESSION[$_GET['node']]['numberOfRules'], 0);
 	
  	 write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][activationWeight]',$_SESSION[$_GET['node']]['activationWeight']);
  	 write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][numberOfRules]',$_SESSION[$_GET['node']]['numberOfRules']);
	 for($j=0;$j<$_SESSION[$_GET['node']]['numberOfRules'];$j++){
	 	$_SESSION[$_GET['node']]['activationWeight'][$j]=($_SESSION[$_GET['node']]['RuleWeight'][$j]*$_SESSION[$_GET['node']]['matchingDegree'][$j])/$sum;
	 }
// 	 write_to_log(__FILE__,__LINE__,'$_SESSION[ActivationWeight]',$_SESSION['ActivationWeight']);
//  	 echo'<br>$_SESSION[ActivationWeight]';
// 	 print_r($_SESSION['ActivationWeight']);
	 if($noOfantecedent==2){
	 	insert_ActivationWeight($_SESSION[$_GET['node']]['activationWeight']);
	 }
	 if($noOfantecedent==3){
	 	insert_ActivationWeight_Three($_SESSION[$_GET['node']]['activationWeight']);
	 }
	 if($noOfantecedent==5){
	 	insert_ActivationWeight_Five($_SESSION[$_GET['node']]['activationWeight']);
	 }
	
	 if($noOfantecedent==2){
	 	$dataString=get_datat_ruleBaseTwo();
	 }
	 if($noOfantecedent==3){
	 	
	 	$dataString=get_datat_ruleBaseThree();
	 }
	 if($noOfantecedent==5){
	 	 
	 	$dataString=get_datat_ruleBaseFive();
	 }
	 
	 $htmlS = '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" class="tableborder">';
	
	 $myArray = explode('|', $dataString);
	 $i=0;
	 $row_count=1;
	 foreach ($myArray as $data){
	 	if($i==0){
	 		$headers = explode('-', $data);
	 		$htmlS .= '<tr>';
	 		foreach ($headers as $header){
	 			$htmlS .= '<th>'.$header.'</th>';
	 		}
	 		$htmlS .= '</tr>';
	 		$i=$i+1;
	 	}else{
	 		$rows = explode('-', $data);
 	 		$htmlS .= '<tr>';
			$tdclass='';
	 		if($row_count % 2)
	 		{ 
	 			$tdclass= 'class="td"';
	 		}
	 		
	 		else{
	 		$tdclass= 'class="td1"';
	 		}
	 		$row_count++;
	 		foreach ($rows as $row){
	 				$htmlS .= '<td '.$tdclass.'>'.$row.'</td>';
	 	 	}
	 		$htmlS .= '</tr>';
	 	}
	 		
	 }
	 $htmlS .= '</table>';
	 return $htmlS;
	
}
function findMatchingDegree(){
	/* global $noOfantecedent;
	global $noOfantecedentRefVal;
	global $antecedentRefTitle;
	global $antecedentRefVal;
	global $transformedRefVal; */
	$noOfantecedent=$_SESSION[$_GET['node']]['$noOfantecedent'];
	$noOfantecedentRefVal=$_SESSION[$_GET['node']]['$noOfantecedentRefVal'];
	$antecedentRefTitle=$_SESSION[$_GET['node']]['$antecedentRefTitle'];
	$antecedentRefVal=$_SESSION[$_GET['node']]['$antecedentRefVal'];
	$antecedentID=$_SESSION[$_GET['node']]['$antecedentID'];
	$transformedRefVal=$_SESSION[$_GET['node']]['transformedRefVal'];
// 	convertPostDataToAncedentArray();
	/* echo'<br>$transformedRefVal';
	print_r($_SESSION['transformedRefVal']) */; 
// 	$GLOBALS['matchingDegree']=array_fill(0,$GLOBALS['numberOfRules'],0);
	$_SESSION[$_GET['node']]['matchingDegree']=array_fill(0,$_SESSION[$_GET['node']]['numberOfRules'],0);
	$a=0;
	$tmpMD=array_fill(0,$noOfantecedent,0);
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$transformedRefVal',$transformedRefVal);
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$noOfantecedentRefVal',$noOfantecedentRefVal);
	for($i=0;$i<$noOfantecedent;$i++){
		$tmpMD[$i]=array_fill(0,$noOfantecedentRefVal[$i],0);
		for($j=0;$j<$noOfantecedentRefVal[$i];$j++){
			$tmpMD[$i][$j]=pow(($_SESSION[$_GET['node']]['transformedRefVal'][$i][$j]) , ($_POST['antecedent_attribute_weight_'.($i+1)]));
		/* 	echo'<br>'.$tmpMD[$i][$j];
			echo'<br>'.$_POST['antecedent_attribute_weight_'.($i+1)];
			echo'<br>'.$_SESSION['transformedRefVal'][$i][$j];  */
			
		}	
	}
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$tmpMD',$tmpMD);
//  	echo'<br>$$tmpMD';
// 	print_r($tmpMD); 
	$res=array();
	$result=array();
	foreach ($tmpMD as $tmp){
// 		echo'<br>$$tmp';
// 		print_r($tmp); 
		$result=multiplyVector($result,$tmp);
		write_to_log(__FILE__,__LINE__,__FUNCTION__,'$result',$result);
		$_SESSION[$_GET['node']]['matchingDegree']=$result;
		
	}
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$_GET['node'].'][matchingDegree]',$_SESSION[$_GET['node']]['matchingDegree']);
//  	echo'<br>$_SESSION[MatchingDegree]';
//  	print_r($_SESSION['MatchingDegree']);
	
	
	if($noOfantecedent==2){
		insert_MatchingDegree($result);
	}
	if($noOfantecedent==3){
		insert_MatchingDegree_Three($result);
	}
	if($noOfantecedent==5){
		insert_MatchingDegree_Five($result);
	}
	/* 
	 * 
	 * For j = 0 To numberOfRules - 1
ActivationWeight(j) = ((ruleWeight(j) * matchingDegree(j)) / Sum)
Common.Inserte ("update RuleBaseForTwo set ActivationWeight=" & ActivationWeight(j) & "where serial=" & j)

Next j
	 * rec($tmpMD, 0, 1, $res);
	print_r($res); */
	/* ReDim matchingDegree(numberOfRules) As Double
	a = 0
	For i = 0 To noOfAntecedent1RefVal - 1
	For j = 0 To noOfAntecedent2RefVal - 1
	matchingDegree(a) = CDbl(transformedRefVal1(i) ^ CDbl(Me.txtAntecedent1Weight.Text) * 
	transformedRefVal2(j) ^ CDbl(Me.txtAntecedent2Weight.Text))
	Common.Inserte ("update RuleBaseForTwo set matchingDegree=" & matchingDegree(a) & "where serial=" & a)
	a = a + 1
	Next j
	Next i */
}
function combinatoricSummation($a=array(),$b){
	$count_a = count($a);
	$count_b = count($b);
	
	if($count_a)
	{
		for($i=0;$i<$count_a;$i++)
		{
			for($j=0;$j<$count_b;$j++)
			{
				$result[] = $a[$i] + $b[$j];
			}
		}
	}
	else
	{
		$result = $b;
	}
	
	return $result;
	
}
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
function rec($X, $i, $prod, &$res){
	// $i is the number of vector from where we currently choose
	// $prod is current product
	// $res is the list of all found products
	/* echo'<br>$X';
	print_r($X);
	echo'<br>count($X[$i])';
	print_r(count($X[$i]));
	echo'<br>count($X)';
	print_r(count($X));
	echo'<br>sizeof($X)';
	print_r(sizeof($X));
	echo'<br>$i';
	print_r($i); */
	if ($i>count($X)-1){
		echo'<br>count($X)';
		print_r(count($X));
		
		echo'<br>close$i';
		print_r($i);
		array_push($res, $prod);
		echo'<br>close $res';
		print_r($res);
		return;
	}
	echo'<br>count($X[$i])';
	print_r(count($X[$i]));
		for ($j=0; $j<count($X[$i]); $j++) { // choose element $j from vector $i
			echo'<br>$i';
			print_r($i);
			echo'<br>$j';
			print_r($j);
			echo'<br>$X[$i][$j]';
			print_r($X[$i][$j]);
			echo'<br>$prod';
			print_r($prod);
			rec($X, $i+1, $prod*$X[$i][$j], $res);
		}
	
		
}
function perform_update(){
	/* global $noOfantecedent;
	global $noOfantecedentRefVal;
	global $antecedentRefTitle;
	global $antecedentRefVal; */
	
	$noOfantecedent=$_SESSION[$_GET['node']]['$noOfantecedent'];
	$noOfantecedentRefVal=$_SESSION[$_GET['node']]['$noOfantecedentRefVal'];
	$antecedentRefTitle=$_SESSION[$_GET['node']]['$antecedentRefTitle'];
	$antecedentRefVal=$_SESSION[$_GET['node']]['$antecedentRefVal'];
	
// 	convertPostDataToAncedentArray();
	/* echo'<br>$_SESSION[noOfConsequentRefVal]<br>';
	print_r($_SESSION['noOfConsequentRefVal']);
	echo'<br>$_SESSION[consequentRefTitle]<br>';
	print_r($_SESSION['consequentRefTitle']);
	echo'<br>$_SESSION[consequentRefVal]<br>';
	print_r($_SESSION['consequentRefVal']); */
	$tao=array_fill(0,$noOfantecedent,0);
	for($i=0;$i<$noOfantecedent;$i++){
// 		echo'<br>$_POST[$antecedent_input_.($i+1)]';
// 		print_r($_POST['antecedent_input_'.($i+1)]);
		if(isset($_POST['antecedent_input_'.($i+1)]) && !empty($_POST['antecedent_input_'.($i+1)])){
			$tao[$i]=1;
		}
		if(isset($_SESSION[$_POST['antecedent_id_'.($i+1)]]['aggregated_Values']) && 
				!empty($_SESSION[$_POST['antecedent_id_'.($i+1)]]['aggregated_Values'])){
			$tao[$i]=1;
		}
		
	}

// 	echo'<br>tao';
//  	print_r($tao);
	$total=0;
// 	echo'<br>$_SESSION[transformedRefVal]';
// 	print_r($_SESSION['transformedRefVal']);
	for($i=0;$i<$noOfantecedent;$i++){
		$sum_of_transformedRefVal=0;
		for($j=0;$j<$noOfantecedentRefVal[$i];$j++){
			$sum_of_transformedRefVal=$sum_of_transformedRefVal+$_SESSION[$_GET['node']]['transformedRefVal'][$i][$j];
		}
// 		echo'<br>sum_of_transformedRefVal';
// 		print_r($sum_of_transformedRefVal);
		$total=$total+$sum_of_transformedRefVal*$tao[$i];
	}
//  	echo'<br>$total';
//  	print_r($total);
 	$sum_of_tao=0;
 	for($i=0;$i<$noOfantecedent;$i++){
 		$sum_of_tao=$sum_of_tao+$tao[$i];
 	}
//  	echo'<br>sum_oftao';
//  	print_r($sum_of_tao);
 	//$updatevalue =$total/$sum_of_tao;
	$updatevalue = $total / $noOfantecedent;
// 	echo'<br>$noOfantecedent';
// 	print_r($noOfantecedent);
//  	echo'<br>$updatevalue';
// 	print_r($updatevalue); 
	if($_POST['consequent_number_of_ref_val']=='Default'){
		$_SESSION[$_GET['node']]['noOfConsequentRefVal']=3;
	}elseif($_POST['consequent_number_of_ref_val']!='NA'){
		$_SESSION[$_GET['node']]['noOfConsequentRefVal']=$_POST['consequent_number_of_ref_val'];
	}
	
	if($noOfantecedent==2){
		$prev=get_prev_ConsequenceVal($_SESSION[$_GET['node']]['noOfConsequentRefVal']);
	}
	if($noOfantecedent==3){
		$prev=get_prev_ConsequenceVal_Three($_SESSION[$_GET['node']]['noOfConsequentRefVal']);
	}
	if($noOfantecedent==5){
		$prev=get_prev_ConsequenceVal_Five($_SESSION[$_GET['node']]['noOfConsequentRefVal']);
	}
	
// 	echo'<br>$prev';
// 	print_r($prev);
	/* if($noOfantecedent==2){
		$prev=get_prev_ConsequenceVal($_SESSION['noOfConsequentRefVal']);
	}
	if($noOfantecedent==3){
		
		$prev=get_prev_ConsequenceVal_Three($_SESSION['noOfConsequentRefVal']);
	} */
	
	if($noOfantecedent==2){
		update_ConsequenceVal($_POST['consequent_number_of_ref_val'],$updatevalue);
	}
	if($noOfantecedent==3){
	
		update_ConsequenceVal_Three($_POST['consequent_number_of_ref_val'],$updatevalue);
	}
	if($noOfantecedent==5){
	
		update_ConsequenceVal_Five($_POST['consequent_number_of_ref_val'],$updatevalue);
	}
	
	if($noOfantecedent==2){
		$dataString=get_datat_ruleBaseTwo();
	}
	if($noOfantecedent==3){
	
		$dataString=get_datat_ruleBaseThree();
	} 
	if($noOfantecedent==5){
	
		$dataString=get_datat_ruleBaseFive();
	} 
	 $htmlS = '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" class="tableborder">';
	
	 $myArray = explode('|', $dataString);
	 $prevdata = explode('|', $prev);
	
	 $i=0;
	 
 	$row_count=1;
	 foreach ($myArray as $data){
	 	if($i==0){
	 		$headers = explode('-', $data);
	 		$htmlS .= '<tr>';
	 		foreach ($headers as $header){
	 			$htmlS .= '<th>'.$header.'</th>';
	 		}
	 		$htmlS .= '</tr>';
	 		$i=$i+1;
	 	}else{
	 		$rows = explode('-', $data);
 	 		$htmlS .= '<tr>';
			$tdclass='';
	 		if($row_count % 2)
	 		{ 
	 			$tdclass= 'class="td"';
	 		}
	 		
	 		else{
	 		$tdclass= 'class="td1"';
	 		}
	 		$row_count++;
	 		foreach ($rows as $row){
	 				$htmlS .= '<td '.$tdclass.'>'.$row.'</td>';
	 	 	}
	 		$htmlS .= '</tr>';
	 	}
	 		
	 }
	 $htmlS .= '</table>';
	 return $htmlS;
}
function perform_aggregation(){
	
	$noOfantecedent=$_SESSION[$_GET['node']]['$noOfantecedent'];
// 	convertPostDataToAncedentArray();
	$consequent_number_of_ref_val=0;
	if($_POST['consequent_number_of_ref_val']=='Default'){
		$consequent_number_of_ref_val=3;
	}elseif($_POST['consequent_number_of_ref_val']!='NA'){
		$consequent_number_of_ref_val=$_POST['consequent_number_of_ref_val'];
	}
	if($noOfantecedent==2){
		$rule_base=getRuleBase_frm_db($consequent_number_of_ref_val);
	}
	if($noOfantecedent==3){
		$rule_base=getRuleBase_frm_db_three($consequent_number_of_ref_val);
	}
	if($noOfantecedent==5){
		$rule_base=getRuleBase_frm_db_five($consequent_number_of_ref_val);
	}
	
// 	echo "<br />rule_base<br />";
// 	print_r($rule_base);
	$MN=findMN($consequent_number_of_ref_val,$rule_base);
// 	echo "<br />MN<br />";
// 	print_r($MN);
	$MD=findMD($consequent_number_of_ref_val,$rule_base);
// 	echo "<br />MD<br />";
// 	print_r($MD);
	$aggregated_Values=findD($MN,$MD,$consequent_number_of_ref_val);
// 	echo "<br />aggregated_Values<br />";
// 	print_r($aggregated_Values);
	//echo "<br />consequent_id_1<br />";
	//print_r($_POST['consequent_id_1']);
	$_SESSION[$_GET['node']]['aggregated_Values']=$aggregated_Values;
	save_aggregated_Values($aggregated_Values,$_POST['consequent_id_1'],$consequent_number_of_ref_val);
	$_SESSION[$_GET['node']]['crisp_value']=convert_to_crisp($_SESSION[$_GET['node']]['aggregated_Values']);
	return ' Aggregated Values['.implode("-",$aggregated_Values).'] Crisp Value ['.$_SESSION[$_GET['node']]['crisp_value'].']';
	
}
function findMN($consequent_number_of_ref_val,$RuleBase){
	/* ReDim MN(noOfConsequentRefVal, numberOfRules) As Double
	
	For i = 0 To numberOfRules - 1
	For j = 0 To noOfConsequentRefVal - 1
	MN(j, i) = ActivationWeight(i) * rulebase(j, i)
	Next j
	Next i */
	/* echo "<br />consequent_number_of_ref_val<br />";
	print_r($consequent_number_of_ref_val);
	echo "<br />RuleBase<br />";
	print_r($RuleBase); */
	$MN=array_fill(0,$consequent_number_of_ref_val,array_fill(0,$_SESSION[$_GET['node']]['numberOfRules'],0));
	/* echo "<br />MN<br />";
	print_r($MN); */
	for($i=0;$i<$_SESSION[$_GET['node']]['numberOfRules'];$i++){
		for($j=0;$j<$consequent_number_of_ref_val;$j++){
			$MN[$j][$i]=$_SESSION[$_GET['node']]['activationWeight'][$i]*$RuleBase[$j][$i];
		}	
	}
	return $MN;
}
function findMD($consequent_number_of_ref_val,$RuleBase){
// 	echo "<br />consequent_number_of_ref_val<br />";
// 	print_r($consequent_number_of_ref_val);
// 	echo "<br />RuleBase<br />";
// 	print_r($RuleBase);
	$MD=array_fill(0,$_SESSION[$_GET['node']]['numberOfRules'],0);
// 	echo "<br />MD<br />";
// 	print_r($MD);
	for($i=0;$i<$_SESSION[$_GET['node']]['numberOfRules'];$i++){
		$total=0;
		for($j=0;$j<$consequent_number_of_ref_val;$j++){
			$total=$total+$RuleBase[$j][$i];
			
		}
		$MD[$i]=1-$_SESSION[$_GET['node']]['activationWeight'][$i]*$total;
	}
	return $MD;
	/* ReDim MD(numberOfRules) As Double
	For i = 0 To numberOfRules - 1
	total = 0
	For p = 0 To noOfConsequentRefVal
	total = total + rulebase(p, i)
	Next p
	MD(i) = 1 - ActivationWeight(i) * total
	Next i */
}
function findD($MN,$MD,$consequent_number_of_ref_val){
	$row_sum=array_fill(0,$consequent_number_of_ref_val,0);
	
	
	for($i=0;$i<$consequent_number_of_ref_val;$i++){
		$row_sum[$i]=1;
		for($j=0;$j<$_SESSION[$_GET['node']]['numberOfRules'];$j++){
			
			$row_sum[$i]=$row_sum[$i]*($MN[$i][$j]+$MD[$j]);
		}
	}
	/* echo "<br />row_sum<br />";
	print_r($row_sum); */
	$total = 0;
	for($i=0;$i<$consequent_number_of_ref_val;$i++){
		$total=$total+$row_sum[$i];
	}
// 	echo "<br />total<br />";
// 	print_r($total);
	$mh = 1;
	for($i=0;$i<$_SESSION[$_GET['node']]['numberOfRules'];$i++){
	
		$mh=$mh*$MD[$i];
	}
// 	echo "<br />mh<br />";
// 	print_r($mh);
	$kn = Round(($total - (2 * $mh)), 4);
// 	echo "<br />kn<br />";
// 	print_r($kn);
	
	
	$kn1 = Round((1 / $kn), 10);
// 	echo "<br />kn1<br />";
// 	print_r($kn1);
	$m=array_fill(0,$consequent_number_of_ref_val,0);
	for($i=0;$i<$consequent_number_of_ref_val;$i++){
		$m[$i] = $kn1 * ($row_sum[$i] - $mh);
	}
// 	echo "<br />m<br />";
// 	print_r($m);
	$mhn = Round(($kn1 * $mh), 4);
// 	echo "<br />mhn<br />";
// 	print_r($mhn);
	$aggregatedValues=array_fill(0,$consequent_number_of_ref_val,0);
	for($i=0;$i<$consequent_number_of_ref_val;$i++){
		
		$aggregatedValues[$i]=Round($m[$i] / (1 - $mhn), 4);
	}
// 	echo "<br />aggregatedValues<br />";
// 	print_r($aggregatedValues);
	return $aggregatedValues;
/* 	ReDim rowsum(noOfConsequentRefVal) As Double

	ReDim m(noOfConsequentRefVal) As Double
	
	
	total = 0
	For x = 0 To noOfConsequentRefVal - 1
	rowsum(x) = 1
	For y = 0 To numberOfRules - 1
	rowsum(x) = rowsum(x) * (MN(x, y) + MD(y))
	Next y
	
	Next x
	
	
	For i = 0 To noOfConsequentRefVal - 1
	total = total + rowsum(i)
	Next i
	
	mh = 1
	For r = 0 To numberOfRules - 1
	mh = mh * MD(r)
	Next r
	
	
	kn = Round((total - (2 * mh)), 4)
	
	Dim kn1 As Double
	
	kn1 = Round((1 / kn), 10)
	
	For j = 0 To noOfConsequentRefVal - 1
	m(j) = kn1 * (rowsum(j) - mh)
	Next j
	ReDim aggregatedValues(noOfConsequentRefVal) As Double
	Dim mhn As Double
	mhn = Round((kn1 * mh), 4)
	For i = 0 To noOfConsequentRefVal - 1
	aggregatedValues(i) = Round(m(i) / (1 - mhn), 4)
	Next i */
}
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
// 			$element_list[] = explode(',',$line);
			$element_list[] = $line;
		}
		fclose($file_handle);
		return $element_list;
	}

}
function perform_calculate_sensor_data(){

	//write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_GET[countofcall]',$_GET['countofcall']);
	if( $_GET['countofcall'] ==0){
		
		//write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_GET[countofcall]',$_GET['countofcall']);
		
		$data=read_sensor_data($_POST['consequent_id_1']);
		/* if(count($data)==0){
			for($j=1;$j<=$_POST['number_of_child'];$j++){
				
			}
		} */
 		write_to_log(__FILE__,__LINE__,__FUNCTION__,'$data',$data);
		$_SESSION["sensor_data_result"]=array_fill(0, count($data), 0);
		$_SESSION["sensor_graph_label"]=array_fill(0, count($data), 0);
  		write_to_log(__FILE__,__LINE__,__FUNCTION__,'count($data)',count($data));
		for($i=0;$i<count($data);$i++){
			for($j=1;$j<=$_POST['number_of_child'];$j++){
				
				if(isset($_POST['antecedent_checked_input_'.$j]) && !empty($_POST['antecedent_checked_input_'.$j])){
					$_POST['antecedent_input_'.$j]=$data[$i];
					write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_POST[antecedent_input_'.$j.']',$_POST['antecedent_input_'.$j]);
					$_SESSION['horizontalAxisLabel']=$_POST['antecedent_id_'.$j];
				}
			}
// 			$_POST['antecedent_input_1']=$data[$i];
//  			write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_POST[antecedent_input_2]',$_POST['antecedent_input_2']);
// 			echo '<br> $_POST[antecedent_input_2]<br>';
// 			print_r($_POST['antecedent_input_2']);
// 			echo'<br>';
// 			$_SESSION["sensor_data_result"][$i]=$data[$i];
			compute_rule_base($_POST['consequent_id_1'],$_POST['consequent_number_of_ref_val']);
// 			CreateRuleBase();
			$input_Transformation=execute_Input_Transformation();
			write_to_log(__FILE__,__LINE__,__FUNCTION__,'$input_Transformation',$input_Transformation);
			$resul1=execute_Activation_Weight_Computation();
 			write_to_log(__FILE__,__LINE__,__FUNCTION__,'$resul1',$resul1);
			
			perform_update();
			$resul1=perform_aggregation(); 
			  
 			write_to_log(__FILE__,__LINE__,__FUNCTION__,'$resul1',$resul1);
			$_SESSION["sensor_data_result"][$i]=convert_to_crisp(explode("-",$resul1));
			
			$_SESSION["sensor_graph_label"][$i]=$data[$i];
			
		} 
 		$_SESSION["sensor_data_result"]=data_normalization($_SESSION["sensor_data_result"]);
		$_SESSION["sensor_data_result"][$i]='end';
		write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION["sensor_data_result"]',$_SESSION["sensor_data_result"]);
 		
	}
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION["sensor_data_result"]',$_SESSION["sensor_data_result"]);
	return implode(",",$_SESSION["sensor_data_result"]);
}
function data_normalization($dataNS){
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$dataNS',$dataNS);
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'max($dataNS)',max($dataNS));
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'min($dataNS)',min($dataNS));
	for($i=0;$i<count($dataNS);$i++){
		$data[$i]=($dataNS[$i]-min($dataNS))/(max($dataNS)-min($dataNS));
		write_to_log(__FILE__,__LINE__,__FUNCTION__,'$dataNS['.$i.']',$dataNS[$i]);
		$dataNS[$i]=$dataNS[$i]*100;
		write_to_log(__FILE__,__LINE__,__FUNCTION__,'$dataNS['.$i.']',$dataNS[$i]);
		
	}
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$dataNS',$dataNS);
	return $dataNS;
	
}
function convert_to_crisp($non_crisp){
// 	global $noOfConsequentRefVal;
// 	global $consequentRefTitle;
// 	global $consequentRefVal;
	$noOfConsequentRefVal=$_SESSION[$_GET['node']]['$noOfConsequentRefVal'];
	$consequentRefTitle=$_SESSION[$_GET['node']]['$consequentRefTitle'];
	$consequentRefVal=$_SESSION[$_GET['node']]['$consequentRefVal'];
// 	convertPostDataToconsequentArray();
	$crisp_value=0;
	for($i=0;$i<$noOfConsequentRefVal;$i++){
		$crisp_value=$crisp_value+$non_crisp[$i]*$consequentRefVal[$i];
 		write_to_log(__FILE__,__LINE__,__FUNCTION__,'$non_crisp['.$i.']',$non_crisp[$i]);
 		write_to_log(__FILE__,__LINE__,__FUNCTION__,'$consequentRefVal['.$i.']',$consequentRefVal[$i]);
 		write_to_log(__FILE__,__LINE__,__FUNCTION__,'$crisp_value',$crisp_value);
	}
	return $crisp_value;
}
function send_data_to_main($node_id){
	$tmp='';
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION[$node_id][$noOfantecedent]',$_SESSION[$node_id]['$noOfantecedent']);
	for($i=0;$i<$_SESSION[$node_id]['$noOfantecedent'];$i++){
		if(isset($_SESSION[$node_id]['transformedRefVal']) && !empty($_SESSION[$node_id]['transformedRefVal'])){
			
		}
		$tmp.='['.$_POST['antecedent_id_'.($i+1)].']=>'.$_POST['antecedent_input_'.($i+1)];
// 		echo $tmp;
// 		echo $_POST['antecedent_input_'.($i+1)];
		write_to_log(__FILE__,__LINE__,__FUNCTION__,'$i',$i);
 		write_to_log(__FILE__,__LINE__,__FUNCTION__,'tmp',$tmp);
		
	}
// 	$tmp.='['.$node_id.']=>'.implode(',',$_SESSION[$node_id]['aggregated_Values']).'<br>';
	$tmp.='['.$node_id.']=>'.$_SESSION[$node_id]['crisp_value'].'<br>';
	write_to_log(__FILE__,__LINE__,__FUNCTION__,'tmp',$tmp);


	if(isset($_SESSION['data_to_main']) && !empty($_SESSION['data_to_main'])){
		$_SESSION['data_to_main'].=$tmp;
	}else{
		$_SESSION['data_to_main']=$tmp;
	}
	return $_SESSION['data_to_main'];
}
if($_POST)
{
	
	//CreateRuleBase();
	
	
	
	//$html .='<br>';
	//$html .='<br> antecedent_id:'.$_GET['antecedent_id'];
	//$html .='<br> action_type:'.$_GET['action_type'];
	
	//$data['returntag'] = '.antecedent_ref_values_'.$_GET['antecedent_id'];
	if(isset($_GET['showdata']) && !empty($_GET['showdata'])){
		if($_GET['showdata']=="yes"){
			//echo $data['returntag'];
			//echo $_POST['antecedent_attribute_weight_1'];
			foreach($_POST as $key => $value)
				$html .=  $key . ' : ' . $value . '<br>';

		}	
	}
	if(isset($_GET['action_type']) && !empty($_GET['action_type'])){
		if ($_GET['action_type']=="show_default_values_for_antecedent") {
			$html =show_default_values_for_antecedent($_GET['antecedent_id'],$_GET['value'],$_GET['i']);
			$tmp='.antecedent_ref_values_'.$_GET['i'];
			
			$data['returntag'] = $tmp;
		}
		if (($_GET['action_type']=="show_default_values_for_consequent")){
			$html .=show_default_values_for_consequent($_GET['antecedent_id'],$_GET['value']);
			$tmp='.consequent_ref_values_'.$_GET['antecedent_id'];
			$data['returntag'] = $tmp;
		} 
		if (($_GET['action_type']=="compute_rule_base")){
			$html .=compute_rule_base($_GET['antecedent_id'],$_POST['consequent_number_of_ref_val']);
			$tmp='.html_output';
			$data['returntag'] = $tmp;
		}
		
		if ($_GET['action_type']=="execute_Input_Transformation"){
			$html .=execute_Input_Transformation();
			$tmp='.status';
			$data['returntag'] = $tmp;
		}
		if ($_GET['action_type']=="execute_Activation_Weight_Computation"){
			$html .=execute_Activation_Weight_Computation();
			
			$tmp='.html_output';
			$data['returntag'] = $tmp;
			$data['returntag_status'] = '.status';
			$html_status='Performed Activation Weight Computation';
		}
		if ($_GET['action_type']=="perform_update"){
			$html .=perform_update();
			$tmp='.html_output';
			$data['returntag'] = $tmp;
			$data['returntag_status'] = '.status';
			$html_status='Performed Update Computation';
		}
		
		if ($_GET['action_type']=="perform_aggregation"){
			$html .=perform_aggregation();
			$tmp='.status';
			$data['returntag'] = $tmp;
			$data['returntag_status'] = '.status';
			$html_status='Performed Computation of Aggregation   .('.$html.')';
		}
		if ($_GET['action_type']=="calculate_sensor_data"){
			
			write_to_log(__FILE__,__LINE__,__FUNCTION__,' $_GET[countofcall]', $_GET['countofcall']);
// 			if( $_GET['countofcall'] ==0){
				
				//write_to_log(__FILE__,__LINE__,__FUNCTION__,' $count', $count);
				
					$html .=perform_calculate_sensor_data();
					$result_data=explode(',',$html);
					if($result_data[count($result_data)-1]=='end'){
						//echo('end of reading sensor data reached');
						array_pop($result_data);
						//print_r($result_data);
						// 				sort($result_data);
						$graph_label=$_SESSION["sensor_graph_label"];
						// 				sort($graph_label);
// 						print_r($_SESSION["sensor_graph_label"]) ;
						$tmp='.status';
						$data['noOfgraph']=$_POST['number_of_child'];
						$data['graph_data'] = implode(',',$result_data);
// 						print_r($graph_label) ;
						$data['graph_label'] = implode(',',$graph_label);
						$data['returntag'] = $tmp;
						$data['returntag_status'] = '.status';
						$data['horizontalAxisLabel'] = $_SESSION['horizontalAxisLabel'];
						$html_status='Performed Computation for sensor data';
						$data['end_of_sensor_data'] = 'done';
						write_to_log(__FILE__,__LINE__,__FUNCTION__,'$data[graph_data]',$data['graph_data']);
						write_to_log(__FILE__,__LINE__,__FUNCTION__,'$data[graph_label]',$data['graph_label']);
						
					}else{
						//echo('end of reading sensor data not reached');
						write_to_log(__FILE__,__LINE__,__FUNCTION__,'$data[graph_data]',$data['graph_data']);
						write_to_log(__FILE__,__LINE__,__FUNCTION__,'$data[graph_label]',$data['graph_label']);
// 						$result_data=array_pop($result_data);
						//print_r($result_data);
						// 				sort($result_data);
						$graph_label=$_SESSION["sensor_graph_label"];
						// 				sort($graph_label);
						$tmp='.status';
						$data['graph_data'] = implode(',',$result_data);
						$data['graph_label'] = implode(',',$graph_label);
						$data['returntag'] = $tmp;
						$data['returntag_status'] = '.status';
						$html_status='Computation for sensor data going on';
						$data['end_of_sensor_data'] = 'notdone';
						
						
					}
					$tmp='.status'; 
					
// 				}	
			}
			
			if ($_GET['action_type']=="transfer_value"){
				$html=send_data_to_main($_GET['node']);
// 				$html.='done test';
			}
			
	}
	
	
}

if(!empty($html))
{
	$data['result_type'] = 'success';
	//$html .= '<br><br>';
	$data['html'] = $html;
	$data['html1']=$html_status;
//  	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$data',$data);
	//echo $html;
}
/* function debug_to_console( $data ) {

	if ( is_array( $data ) )
		$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	else
		$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

	echo $output;
} */
echo json_encode($data);


?>