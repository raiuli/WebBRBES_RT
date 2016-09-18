<?php
session_start();
include_once('logWriter.php');
include_once('db/dbSC.php');


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
$_SESSION["debug_enable_for_me"]=true;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?php
	include('loadingData.php');
	$_SESSION['$jt']=$jt;
	$_SESSION['nodeId']=$_GET['node'];
	$nodeId=$_GET['node']; 
	$jN=$jt->getNode($nodeId);
	$jNodeValue=$jN->getValue();
	$numberOfChildern=$jN->childrenCount();
	$jChildren=$jN->getChildren();
	$log_data='testing log data';
	write_to_log(__FILE__,__LINE__,__FUNCTION__,' $log_data', $log_data);
?>
<head>
<meta name="generator" content="HTML Tidy for Linux (vers 25 March 2009), see www.w3.org" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "Deternination of ".$jNodeValue."Factors"?></title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="scripts/css/style.css?t=<?php echo time(); ?>" /><!-- jQuery -->
<script src="scripts/js/jquery.min.js" type="text/javascript"></script>
<script src="scripts/js/script.js?t=<?php echo time(); ?>"></script>
<script src="chart/Chart.js?t=<?php echo time(); ?>"></script>
</head>
<body>

	<div class="dashboard">
		<form id="my_form" name="my_form" method="post" action="">
			<div class="top-row">
			<?php
			echo "<input  type='hidden' name='number_of_child' id='consequent_id_".$jNodeValue."' value='".$numberOfChildern."' />";  
			$i=1;
			foreach( $jChildren as $value )
			{
				 
				$h=$jt->getNode($value);
				$childUid=$h->getUid();
				$childValue=$h->getValue();
// 				if(isset($_SESSION[$childUid]['aggregated_Values']) && !empty($_SESSION[$childUid]['aggregated_Values'])){
				if(isset($_SESSION[$childUid]['crisp_value']) && !empty($_SESSION[$childUid]['crisp_value'])){	
					write_to_log(__FILE__,__LINE__,__FUNCTION__,'$childUid',$childUid);
					write_to_log(__FILE__,__LINE__,__FUNCTION__,'$_SESSION['.$childUid.'][crisp_value]',$_SESSION[$childUid]['crisp_value']);
					$disabled_value='value=\''.$_SESSION[$childUid]['crisp_value'].'\'';
					$disabled='disabled';
				}else{
					$disabled='';
					$disabled_value='';
				}
			?>
				<div class='column round-border'>
					<p><strong>Antecedent<?php echo $i; ?> Name</strong></p>
					<table width='100%' border='0' cellspacing='0' cellpadding='0'>
						<tr>
							<td width='50%'><?php echo $childValue; ?></td>
							<td width='50%'><input name='antecedent_id_<?php echo $i; ?>' type='text' id='antecedent_id_<?php echo $i; ?>' size='10' value='<?php echo $childUid; ?>' /></td>
						</tr>
						<tr>
							<td>Attribute Weight</td>
							<td><input name='antecedent_attribute_weight_<?php echo $i; ?>' type='text' id='antecedent_attribute_weight_<?php echo $i; ?>' size='10' /></td>
						</tr>
						<tr>
							<td>Number of Ref Val</td>
							<td><select name='antecedent_number_of_ref_val_<?php echo $i; ?>' id='antecedent_number_of_ref_val_<?php echo $i; ?>' onchange='show_default_values_for_antecedent("show_default_values_for_antecedent","<?php echo $childUid; ?>","<?php echo $i; ?>",$(this).val());'>
							<option>NA</option>
							<option>Default</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							</select></td>
						</tr>
						<tr>
							<td colspan='2'>
							<div class='antecedent_ref_values_<?php echo $i; ?>'></div>
							</td>
						</tr>
						
						<tr>
							<td>Input</td>
							<td><input name='antecedent_input_<?php echo $i; ?>' type='text' id='antecedent_input_<?php echo $i; ?>' size='10' <?php echo $disabled_value; ?>  onclick='get_input_values_for_antecedent();' /><?php echo getUnitName($childUid); ?> </td>
						</tr>
						<tr>
							<td></td>
							<td><input type='checkbox' name='antecedent_checked_input_<?php echo $i; ?>' value='antecedent_input_<?php echo $i; ?>' />Get Data From Sensor<br /></td>
						</tr>
					</table>
				</div>
				
			<?php
				$i=$i+1;
			}
			?>
				
			
		
		
			</div>
			<br>
			
			<div class="third-row ">
			<?php
// 			$i=1;
// 			foreach( $jChildren as $value )
// 			{
				?>
				<div class=" third-row column round-border graph">
					<table width='100%' border='0' cellspacing='0' cellpadding='0'>
						<tr>
							<td width='35'>  
								<div class="vertical-text"></div>
							</td width='100'>
							<td>
								<canvas id="myChart_input" width="400" height="400">
							</td>
						</tr>
						<tr>
							<td id='horizontalAxisLabel_input' colspan="2" align="center">
								<br>Input
								<ul class="color-list">
									<li class="color-holder" id="color-1"><span class="color-span" id="color-span-1"></span> <span class="color-name" id="node-name-1"></span></li>
									<li class="color-holder" id="color-2"><span class="color-span" id="color-span-2"></span> <span class="color-name" id="node-name-2"></span></li>
									<li class="color-holder" id="color-3"><span class="color-span" id="color-span-3"></span> <span class="color-name" id="node-name-3"></span></li>
									<li class="color-holder" id="color-4"><span class="color-span" id="color-span-4"></span> <span class="color-name" id="node-name-4"></span></li>
									<li class="color-holder" id="color-5"><span class="color-span" id="color-span-5"></span> <span class="color-name" id="node-name-5"></span></li>
								</ul>
								
							</td>
						</tr>
					</table>
				<!--<div class="graph-message">The graph will appear here... .</div>
				<canvas id="myChart" width="400" height="400"></canvas>-->
				</div>
				
				<div class=" third-row column round-border graph">
					<table width='100%' border='0' cellspacing='0' cellpadding='0'>
						<tr>
							<td width='35'>  
								<div class="vertical-text"></div>
							</td width='100%'>
							<td>
								<canvas id="myChart_output" width="400" height="400">
							</td>
						</tr>
						<tr>
							<td id='horizontalAxisLabel_output>' colspan="2" align="center">
								<br>Output
								<ul class="color-list">
									
									<li class="color-holder" id="color-1"><span class="color-span" id="color-span-output-1"></span> <span class="color-name" id="node-name-output-1"></span></li>
									<li class="color-holder" id="color-2"><span class="color-span" id="color-span-output-2"></span> <span class="color-name" id="node-name-output-2"></span></li>
									<li class="color-holder" id="color-3"><span class="color-span" id="color-span-output-3"></span> <span class="color-name" id="node-name-output-3"></span></li>
									<li class="color-holder" id="color-4"><span class="color-span" id="color-span-output-4"></span> <span class="color-name" id="node-name-output-4"></span></li>
									<li class="color-holder" id="color-5"><span class="color-span" id="color-span-output-5"></span> <span class="color-name" id="node-name-output-5"></span></li>
								</ul>
							</td>
						</tr>
					</table>
				<!--<div class="graph-message">The graph will appear here... .</div>
				<canvas id="myChart" width="400" height="400"></canvas>-->
				</div>
			   
			<?php
// 				$i=$i+1;
// 			}
			?>
			</div>
			
			<div class="second-row column round-border">
				<p><strong>Consequent Name</strong></p>
				<table width='100%' border='0' cellspacing='0' cellpadding='0'>
					<tr>
						<td width='50%'><?php echo $jNodeValue; ?></td>
						<td width='50%'><input name='consequent_id_1' type='text' id='consequent_id_<?php echo $nodeId; ?>' value='<?php echo $nodeId; ?>' size='10' /></td>
					</tr>
					<tr>
						<td>Number of Ref Val</td>
						<td><select name='consequent_number_of_ref_val' id='consequent_number_of_ref_val' onchange='show_default_values_for_consequent("show_default_values_for_consequent","<?php echo $nodeId; ?>",$(this).val());'>
						<option>NA</option>
						<option>Default</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						</select></td>
					</tr>
					<tr>
						<td colspan='2'>
						<div class='consequent_ref_values_<?php echo $nodeId; ?>'></div>
					</td>
					</tr>
					<tr>
						<td width='50%'></td>
						<td width='50%'></td>
					</tr>
				</table>
			</div>
			<div class="update-rulebase round-border">
				<p><strong>UPDATE RULEBASE BY SELECTING BELOW</strong></p>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td>IF <?php echo $_GET['node']; ?></td>
						<td>
							<select name="rule_base_dropdown_1" id="rule_base_dropdown_1">
								<option>High</option>
							</select>
						</td>
						<td>IF <?php echo $_GET['node']; ?></td>
						<td>
							<select name="rule_base_dropdown_2" id="rule_base_dropdown_2">
								<option>High</option>
							</select>
						</td>
						<td>IF <?php echo $_GET['node']; ?></td>
						<td><input name="rule_base_text_input_1" type="text" id="rule_base_text_input_1" size="10" /> <input name="rule_base_text_input_2" type="text" id="rule_base_text_input_2" size="10" /> <input name="rule_base_text_input_3" type="text" id="rule_base_text_input_3" size="10" /></td>
					</tr>
					<tr>
						<td colspan="6" align="center" class="update-button-cell"><input type="button" name="Submit" value="Update this Rule Base" onclick="load_results();" /></td>
					</tr>
				</table>
			</div>

			<div class="html_output"></div>

			<div class="final-row">
				<div class="left-row round-border">
					<input type="button" name="Submit" value="Calculate Sensor Data Realtime" onclick="transmit_data_rt('calculate_sensor_data_rt','<?php echo $nodeId; ?>');" />
				<input type="button" name="Submit" value="Calculate Sensor Data" onclick="transmit_data('calculate_sensor_data','<?php echo $nodeId; ?>');" /> 
					<input type="button" name="Submit" value="Calculate Rule base" onclick="compute_rule_base('compute_rule_base','<?php echo $nodeId; ?>');$('.html_output').show();" /> 
					<input type="button" name="Submit" value="Input Transformation" onclick="execute_Input_Transformation('execute_Input_Transformation','<?php echo $nodeId; ?>');" /> 
					<input type="button" name="Submit" value="Activation Weight" onclick="execute_Activation_Weight_Computation('execute_Activation_Weight_Computation','<?php echo $nodeId; ?>');" /> 
					<input type="button" name="Submit" value="Update" onclick="perform_update('perform_update','<?php echo $nodeId; ?>');" /> 
					<input type="button" name="Submit" value="Aggregation" onclick="perform_aggregation('perform_aggregation','<?php echo $nodeId; ?>');" /> 
					<input type="button" name="Submit" value="Show Post Data" onclick="load_results();$('.html_output').show();" />
				</div>
				<div class="right-row">
					
					<input type="button" name="Submit" value="Back" onclick="transfer_value('<?php echo $nodeId; ?>');" />
				</div>
			</div>
		</form>
	</div>

	<div class="dashboard">
	
		
			<div id="status" class="status round-border second-row">
			Status
				
			
			</div>
	
	</div>

</body>
</html>