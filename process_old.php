<?php

session_start();
// set time-out period (in seconds)
$inactive = 24*60*60;

// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION["timeout"])) {
	// calculate the session's "time to live"
	$sessionTTL = time() - $_SESSION["timeout"];
	if ($sessionTTL > $inactive) {
		session_destroy();
		header("Location: /logout.php");
	}
}

$_SESSION["timeout"] = time();
include_once('BRBCalculations.php');
include_once('db/dbSC.php');
$data = array();
$data['result_type'] = 'failed';
$data['html'] = '';
$data['html1'] = '';
$html = '';
$html_status='';
$noOfConsequentRefVal=0;
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
$GLOBALS['matchingDegree']=array_fill(0, 2, 0);

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
									$tmp='antecedent_reftitle_'.$id.'_'.$i;
								}
								if(!strncmp($headers[$j],'RefVal',6)){
									$tmp='antecedent_refval_'.$id.'_'.$i;
								}
								$htmlS.='<td width=\'50%\'> <input name=\''.$tmp.'\' type=\'text\' id=\'antecedent_attribute_weight_\' size=\'10\'  value='.$tdata[$j].' /></td>';
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
function show_default_values_for_consequent($node_id,$value){
	$htmlS='';
	if($value=='Default'){
		global $noOfConsequentRefVal;
		$noOfConsequentRefVal=3;
		global $consequentRefTitle;
		$consequentRefTitle=array_fill(0,$noOfConsequentRefVal,0);
		global $consequentRefVal;
		$consequentRefVal=array_fill(0,$noOfConsequentRefVal,0);
		$result_strings=explode('|', load_default_values_for_antecedent($node_id));
		for($j=1;$j<(count($result_strings)-1);$j++){
			$data=explode('-', $result_strings[$j]);
			$consequentRefTitle[$j-1]=$data[0];
			$consequentRefVal[$j-1]=$data[1];
		}
		CreateRuleBase();
		$dataString=get_datat_ruleBaseTwo();
		$htmlS .= '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" class="tableborder">';
		
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
		//return $htmlS;
		//print_r($consequentRefTitle) ;
		//print_r($consequentRefVal);
		/* If (Me.cboNoOfConsequentRefVal.Text = "Default") Then
		noOfConsequentRefVal = 3
		ReDim consequentRefTitle(noOfConsequentRefVal) As String
		ReDim consequentRefVal(noOfConsequentRefVal) As Double
		Connection ("select * from DefaultRefVal where AntecedentName='x8' order by RefVal Desc")
		
		For i = 0 To noOfConsequentRefVal - 1
		Me.DataGridRuleBase.Row = i
		consequentRefTitle(i) = Me.DataGridRuleBase.Columns(0)
		'consequentRefVal(i) = Me.DataGridRuleBase.Columns(1) 
    	Next i*/
        
	}else{
		$noOfConsequentRefVal=$value;
		$htmlS = '<table cellpadding="0" cellspacing="1" border="0" style="width:100%" >';
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
		$htmlS .= '<tr>';
		$htmlS.='<td width=\'50%\' ></td>';
		$htmlS.='<td width=\'50%\'>
					<input name=\'consequent_refval_'.($k).'\' type=\'text\' id=\'consequent_refval_'.($k).'\' size=\'10\'  />
					<input type="button" name="consequent_nonDefault_refs" value="Submit" onclick="show_nondefault_values_for_consequent(\"show_nondefault_values_for_consequent\",\"".$nodeId."\",$(this).val());" />
							</td>';
		$htmlS.='</tr>';
		$htmlS .= '</table>';
	}
	return $htmlS;
}
function CreateRuleBase(){
	global $noOfConsequentRefVal;
	global $consequentRefTitle;
	global $consequentRefVal;
	
	global $noOfantecedent;
	global $noOfantecedentRefVal;
	global $antecedentRefTitle;
	global $antecedentRefVal;
	global $antecedentID;
	convertPostDataToAncedentArray();
	
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
			$m=$m+1;
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
	global $noOfantecedent;
	global $noOfantecedentRefVal;
	global $antecedentRefTitle;
	global $antecedentRefVal;
	global $antecedentID;
	if(isset($_POST['number_of_child']) && !empty($_POST['number_of_child'])){
		// creating and initializing arrays 
		$noOfantecedent=$_POST['number_of_child'];
		$noOfantecedentRefVal=array_fill(0, $noOfantecedent, 0);
		$antecedentRefTitle=array_fill(0, $noOfantecedent, 0);
		$antecedentRefVal=array_fill(0, $noOfantecedent, 0);
		for($i=1;$i<=$noOfantecedent;$i++){
			$tmp='antecedent_number_of_ref_val_'.$i;
			
			if($_POST[$tmp]=='Default'){
				$noOfantecedentRefVal[$i-1]=3;
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
			$antecedentID=$_POST['antecedent_id_'.($i+1)];
		}
	}else{
		echo 'number_of_child not defined';
	}
	//echo'$noOfantecedentRefVal:=>';
	//print_r($noOfantecedentRefVal);
}
function execute_Input_Transformation(){
	
	//global $transformedRefVal;
	
	global $noOfantecedent;
	global $antecedentRefVal;
	global $antecedentRefTitle;
	global $noOfantecedentRefVal;
	convertPostDataToAncedentArray();
	/* print_r($noOfantecedent);
	echo'<br>';
	print_r($noOfantecedentRefVal);
	echo'<br>';
	print_r($antecedentRefTitle);
	echo'<br>';
	print_r($antecedentRefVal);
	echo'<br>';  */
	
	$_SESSION['transformedRefVal']=array_fill(0, $noOfantecedent, 0);
	for($i=0;$i<$noOfantecedent;$i++){
		$_SESSION['transformedRefVal'][$i]=array_fill(0, $noOfantecedentRefVal[$i], 0);
	}
	//print_r($GLOBALS['transformedRefVal']);
	//echo'<br>';
	for($i=0;$i<$noOfantecedent;$i++){
// 		echo'<br>loop starts<br>';
		$input=$_POST['antecedent_input_'.($i+1)];
		if($input>$antecedentRefVal[$i][0]){
			$input=$antecedentRefVal[$i][0];
		}elseif($input<$antecedentRefVal[$i][$noOfantecedentRefVal[$i]-1]){
			$input=$antecedentRefVal[$i][$noOfantecedentRefVal[$i]-1];
		}
// 		echo'$input='.$input;
// 		echo'<br>';
		$donotgo=0;
		for($j=0;$j<$noOfantecedentRefVal[$i];$j++){
// 			echo'<br>antecedentRefVal[$i][$j]<br>'.$antecedentRefVal[$i][$j];
			
			if($input==$antecedentRefVal[$i][$j]){
				$_SESSION['transformedRefVal'][$i][$j]=1;
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
					$_SESSION['transformedRefVal'][$i][$m+1]=Round(($antecedentRefVal[$i][$m] - $input) / ($antecedentRefVal[$i][$m] - $antecedentRefVal[$i][$m+1]), 4);
					$_SESSION['transformedRefVal'][$i][$m] = Round(1 - $_SESSION['transformedRefVal'][$i][$m+1], 4);
					/* echo'$$GLOBALS[transformedRefVal]=';
					print_r($GLOBALS['transformedRefVal']);
					echo'<br>'; */
					
				}
			}
		}
// 		print_r($_SESSION['transformedRefVal']);
// 		echo'<br>';
	} 
//  	echo'<br>===================';
//  	print_r($_SESSION['transformedRefVal']);
 	
// 	echo'<br>';
	return 'Performed Input Transformation';

}
function execute_Activation_Weight_Computation(){
	//global $activationWeight;
	
	global $noOfantecedent;
	global $noOfantecedentRefVal;
	global $antecedentRefTitle;
	global $antecedentRefVal;
	convertPostDataToAncedentArray();
	/* print_r($noOfantecedent);
	 echo'<br>';
	 print_r($noOfantecedentRefVal);
	 echo'<br>';
	 print_r($antecedentRefTitle);
	 echo'<br>';
	 print_r($antecedentRefVal);
	 echo'<br>'; 
	 print_r($GLOBALS['numberOfRules']);
	 echo'<br>'; */
	 for($i=0;$i<$noOfantecedent;$i++){
	 	$GLOBALS['numberOfRules']=$GLOBALS['numberOfRules']*$noOfantecedentRefVal[$i];
	 }
	 $_SESSION['numberOfRules']=$GLOBALS['numberOfRules'];
// 	 print_r($GLOBALS['numberOfRules']);
// 	 echo'<br>';
	 $GLOBALS['activationWeight']=array_fill(0, $GLOBALS['numberOfRules'], 0);
	/*  print_r($GLOBALS['activationWeight']);
	 echo'<br>';
	 echo'<br>$transformedRefVal';
	 print_r($_SESSION['$transformedRefVal']);
	 echo'<br>'; */
	 findMatchingDegree();
	$_SESSION['RuleWeight']= get_data_RuleWeight_ruleBaseTwo();
// 	 echo'<br>$_SESSION[RuleWeight]';
// 	 print_r($_SESSION['RuleWeight']);
// 	 echo'<br>';
	 $sum=0;
	 for($i=0;$i<count($_SESSION['RuleWeight']);$i++){
	 	$sum=$sum+$_SESSION['RuleWeight'][$i]*$_SESSION['MatchingDegree'][$i];
	 }
//  	 echo'<br>Sum:'.$sum;
// 	 $_SESSION['ActivationWeight']=array_fill(0, $GLOBALS['numberOfRules'], 0);
	 for($j=0;$j<$GLOBALS['numberOfRules'];$j++){
	 	$_SESSION['ActivationWeight'][$j]=($_SESSION['RuleWeight'][$j]*$_SESSION['MatchingDegree'][$j])/$sum;
	 }
// 	 echo'<br>$_SESSION[ActivationWeight]';
// 	 print_r($_SESSION['ActivationWeight']);
	 insert_ActivationWeight($_SESSION['ActivationWeight']);
	 $dataString=get_datat_ruleBaseTwo();
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
	
}
function findMatchingDegree(){
	global $noOfantecedent;
	global $noOfantecedentRefVal;
	global $antecedentRefTitle;
	global $antecedentRefVal;
	global $transformedRefVal;
	convertPostDataToAncedentArray();
	/* echo'<br>$transformedRefVal';
	print_r($_SESSION['transformedRefVal']) */; 
	$GLOBALS['matchingDegree']=array_fill(0,$GLOBALS['numberOfRules'],0);
	$a=0;
	$tmpMD=array_fill(0,$noOfantecedent,0);
	for($i=0;$i<$noOfantecedent;$i++){
		$tmpMD[$i]=array_fill(0,$noOfantecedentRefVal[$i],0);
		for($j=0;$j<$noOfantecedentRefVal[$i];$j++){
			$tmpMD[$i][$j]=pow(($_SESSION['transformedRefVal'][$i][$j]) , ($_POST['antecedent_attribute_weight_'.($i+1)]));
		/* 	echo'<br>'.$tmpMD[$i][$j];
			echo'<br>'.$_POST['antecedent_attribute_weight_'.($i+1)];
			echo'<br>'.$_SESSION['transformedRefVal'][$i][$j];  */
			
		}	
	}
//  	echo'<br>$$tmpMD';
// 	print_r($tmpMD); 
	$res=array();
	$result=array();
	foreach ($tmpMD as $tmp){
// 		echo'<br>$$tmp';
// 		print_r($tmp); 
		$result=multiplyVector($result,$tmp);
		$_SESSION['MatchingDegree']=$result;
		
	}
//  	echo'<br>$_SESSION[MatchingDegree]';
//  	print_r($_SESSION['MatchingDegree']);
	insert_MatchingDegree($result);
	
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
	global $noOfantecedent;
	global $noOfantecedentRefVal;
	global $antecedentRefTitle;
	global $antecedentRefVal;
	
	convertPostDataToAncedentArray();
	$total=0;
// 	echo'<br>$_SESSION[transformedRefVal]';
// 	print_r($_SESSION['transformedRefVal']);
	for($i=0;$i<$noOfantecedent;$i++){
		for($j=0;$j<$noOfantecedentRefVal[$i];$j++){
			$total=$total+$_SESSION['transformedRefVal'][$i][$j];
		}
	}
// 	echo'<br>$total';
// 	print_r($total);
	$updatevalue = $total / $noOfantecedent;
/* 	echo'<br>$updatevalue';
	print_r($updatevalue); */
	
	update_ConsequenceVal($_POST['consequent_number_of_ref_val'],$updatevalue);
	 $dataString=get_datat_ruleBaseTwo();
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
}
function perform_aggregation(){
	$consequent_number_of_ref_val=0;
	if($_POST['consequent_number_of_ref_val']=='Default'){
		$consequent_number_of_ref_val=3;
	}elseif($_POST['consequent_number_of_ref_val']!='NA'){
		$consequent_number_of_ref_val=$_POST['consequent_number_of_ref_val'];
	}
	$rule_base=getRuleBase_frm_db($consequent_number_of_ref_val);
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
	$_SESSION['aggregated_Values']=$aggregated_Values;
	save_aggregated_Values($aggregated_Values,$_POST['consequent_id_1'],$consequent_number_of_ref_val);
	
	return implode("-",$aggregated_Values);
	
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
	$MN=array_fill(0,$consequent_number_of_ref_val,array_fill(0,$_SESSION['numberOfRules'],0));
	/* echo "<br />MN<br />";
	print_r($MN); */
	for($i=0;$i<$_SESSION['numberOfRules'];$i++){
		for($j=0;$j<$consequent_number_of_ref_val;$j++){
			$MN[$j][$i]=$_SESSION['ActivationWeight'][$i]*$RuleBase[$j][$i];
		}	
	}
	return $MN;
}
function findMD($consequent_number_of_ref_val,$RuleBase){
// 	echo "<br />consequent_number_of_ref_val<br />";
// 	print_r($consequent_number_of_ref_val);
// 	echo "<br />RuleBase<br />";
// 	print_r($RuleBase);
	$MD=array_fill(0,$_SESSION['numberOfRules'],0);
// 	echo "<br />MD<br />";
// 	print_r($MD);
	for($i=0;$i<$_SESSION['numberOfRules'];$i++){
		$total=0;
		for($j=0;$j<$consequent_number_of_ref_val;$j++){
			$total=$total+$RuleBase[$j][$i];
			
		}
		$MD[$i]=1-$_SESSION['ActivationWeight'][$i]*$total;
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
		for($j=0;$j<$_SESSION['numberOfRules'];$j++){
			
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
	for($i=0;$i<$_SESSION['numberOfRules'];$i++){
	
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
		if (($_GET['action_type']=="show_default_values_for_consequent")&& ($_GET['value']!='Default')){
			$html .=show_default_values_for_consequent($_GET['antecedent_id'],$_GET['value']);
			$tmp='.consequent_ref_values_'.$_GET['antecedent_id'];
			$data['returntag'] = $tmp;
		} 
		if (($_GET['action_type']=="show_default_values_for_consequent")&& ($_GET['value']=='Default')){
			$html .=show_default_values_for_consequent($_GET['antecedent_id'],$_GET['value']);
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
		
	}
	
	
}

if(!empty($html))
{
	$data['result_type'] = 'success';
	//$html .= '<br><br>';
	$data['html'] = $html;
	$data['html1']=$html_status;
	//echo $html;
}

echo json_encode($data);


?>