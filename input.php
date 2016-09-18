<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My project</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="scripts/css/style.css">
<!-- jQuery -->
<script src="scripts/js/jquery.min.js"></script>
<script src="scripts/js/script.js?t=<?php echo time(); ?>"></script>
</head>

<body>

	<div class="dashboard">
	
		<form id="my_form" name="my_form" method="post" action="">

		<div class="top-row">
		
			<div class="column round-border">
			
				<p><strong>Antecedent 1 Name</strong></p>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="50%">Onset RainFall</td>
					<td width="50%"><input name="onset_rainfall" type="text" id="onset_rainfall" size="10" /></td>
				  </tr>
				  <tr>
					<td>Attribute Weight</td>
					<td><select name="attribute_weight_1" id="attribute_weight_1">
                      <option>Default</option>
                    </select></td>
				  </tr>
				  <tr>
					<td>Number of Ref Val</td>
					<td><input name="number_of_ref_val_1" type="text" id="number_of_ref_val_1" size="10" /></td>
				  </tr>
				  <tr>
					<td>Input</td>
					<td><input name="input_1" type="text" id="input_1" size="10" /></td>
				  </tr>
				</table>

			</div>
		
			<div class="column round-border">
			
				<p><strong>Antecedent 2 Name</strong></p>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="50%">Prolonged RainFall</td>
					<td width="50%"><input name="prolonged_rainfall" type="text" id="prolonged_rainfall" size="10" /></td>
				  </tr>
				  <tr>
					<td>Attribute Weight</td>
					<td><select name="attribute_weight_2" id="attribute_weight_2">
                      <option>Default</option>
                    </select></td>
				  </tr>
				  <tr>
					<td>Number of Ref Val</td>
					<td><input name="number_of_ref_val_2" type="text" id="number_of_ref_val_2" size="10" /></td>
				  </tr>
				  <tr>
					<td>Input</td>
					<td><input name="input_2" type="text" id="input_2" size="10" /></td>
				  </tr>
				</table>

			</div>
		
			<div class="column round-border">
			
				<p><strong>Consequent Name</strong></p>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="50%">Meterological Factor</td>
					<td width="50%"><input name="meterological_factor" type="text" id="meterological_factor" size="10" /></td>
				  </tr>
				  <tr>
					<td>Number of Ref Val</td>
					<td><select name="number_of_ref_val_3" id="number_of_ref_val_3">
                      <option>Default</option>
                    </select></td>
				  </tr>
				</table>

			</div>
		
		</div>
		
		<div class="update-rulebase round-border">
		
			<p><strong>UPDATE RULEBASE BY SELECTING BELOW</strong></p>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td>IF <?php echo $_GET['node']; ?></td>
				<td><select name="rule_base_dropdown_1" id="rule_base_dropdown_1">
                  <option>High</option>
                </select></td>
				<td>IF <?php echo $_GET['node']; ?></td>
				<td><select name="rule_base_dropdown_2" id="rule_base_dropdown_2">
                  <option>High</option>
                </select></td>
				<td>IF <?php echo $_GET['node']; ?></td>
				<td><input name="rule_base_text_input_1" type="text" id="rule_base_text_input_1" size="10" />
			    <input name="rule_base_text_input_2" type="text" id="rule_base_text_input_2" size="10" />
			    <input name="rule_base_text_input_3" type="text" id="rule_base_text_input_3" size="10" /></td>
			  </tr>
			  <tr>
				<td colspan="6" align="center" class="update-button-cell"><input type="button" name="Submit" value="Update this Rule Base" onclick="load_results();" /></td>
			  </tr>
			</table>

		</div>
		
		<div class="html_output">

			<table cellpadding="0" cellspacing="1" border="0" style="width:100%" class="tableborder">
			  <tr>
				<th>Serial</th>
				<th>RuleWeight</th>
				<th>Antecedent1</th>
				<th>Antecedent1RefTitle</th>
				<th>Antecedent2</th>
				<th>Antecedent2RefTitle</th>
				<th>Consequence</th>
			  </tr>
			  <tr>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
			  </tr>
			  <tr>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
			  </tr>
			  <tr>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
			  </tr>
			  <tr>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
			  </tr>
			  <tr>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
				<td class="td">&nbsp;</td>
			  </tr>
			</table>

		</div>
		
		<div class="final-row">
		
			<div class="left-row round-border">
			
				<input type="button" name="Submit" value="Input Transformation" onclick="load_results();" /> 
				<input type="button" name="Submit" value="Activation weight" onclick="load_results();" /> 
				<input type="button" name="Submit" value="Update" onclick="load_results();" /> 
				<input type="button" name="Submit" value="Aggregation" onclick="load_results();" />
			
			</div>
			
			<div class="right-row">
				<input type="button" name="Submit" value="Back" onclick="window.close();" /> 
			</div>
		
		</div>
	
		</form>
	</div>

</body>
</html>