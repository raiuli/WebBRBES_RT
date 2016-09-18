<?php



include_once('config/config.php');
include_once('logWriter.php');
/* 
 * 
 * write_to_log(__FILE__,__LINE__,'$GLOBALS[numberOfRules]',$GLOBALS['numberOfRules']); 
 * 
 * 
 * */
function getLabelName($antecedent_name){
	global $servername, $username, $password, $dbname;
	$resultString='';
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	$sql = "SELECT * FROM `DefaulDisplay` WHERE `nodename`='".$antecedent_name."'";
	// 	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$sql',$sql);
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	
	while($row = mysql_fetch_array($result)){
		$resultString=$row["note"];
	
	}
	mysql_close($link);
	return $resultString;
}
function getUnitName($antecedent_name){
	global $servername, $username, $password, $dbname;
	$resultString='';
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	$sql = "SELECT `unitname` FROM `DefaulDisplay` WHERE `nodename`='".$antecedent_name."'";
// 	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$sql',$sql);
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	
	while($row = mysql_fetch_array($result)){
		$resultString=$row["unitname"];

	}
	mysql_close($link);
	return $resultString;
}
function delete_rule_base_for_two($noOfConsequentRefVal){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	$sql = "drop table RuleBaseForTwo";
	
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$sql= 'CREATE TABLE IF NOT EXISTS `RuleBaseForTwo` (
  `Serial` int(11) NOT NULL,
  `RuleWeight` float NOT NULL,
  `Antecedent1` varchar(50) NOT NULL,
  `Antecedent1RefTitle` varchar(50) NOT NULL,
  `Antecedent2` varchar(50) NOT NULL,
  `Antecedent2RefTitle` varchar(50) NOT NULL,
  `Consequence` varchar(50) NOT NULL,
  `ConsequenceVal1` float NOT NULL,
  `ConsequenceVal2` float NOT NULL,
  `ConsequenceVal3` float NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
	$result = mysql_query ( $sql ) or die ( $sql . "<br/><br/>" . mysql_error () );
	if ($noOfConsequentRefVal == 4) {
		$sql = "ALTER TABLE RuleBaseForTwo ADD ConsequenceVal4 real";
		
		$result = mysql_query ( $sql ) or die ( $sql . "<br/><br/>" . mysql_error () );
	} elseif ($noOfConsequentRefVal == 5) {
		$sql = "ALTER TABLE RuleBaseForTwo ADD ConsequenceVal4 real";
		
		$result = mysql_query ( $sql ) or die($sql."<br/><br/>".mysql_error());
		$sql = "ALTER TABLE RuleBaseForTwo ADD ConsequenceVal5 real";
		
		$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	}
	$sql = "ALTER TABLE RuleBaseForTwo ADD MatchingDegree real NULL";
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$sql = "ALTER TABLE RuleBaseForTwo ADD ActivationWeight real NULL";
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	//print_r($result);
	//$resultString="RefTitle-RefVal-AntecedentName|";
	//while($row = mysql_fetch_array($result)){
	//	$resultString.=$row["RefTitle"]."-".$row["RefVal"]."-".$row["AntecedentName"]."|";
		//echo "[RefTitle]: " . $row["RefTitle"]. " - RefVal: " . $row["RefVal"]. " " . $row["AntecedentName"]. "<br>";
		//echo "<br />";
	//}
	/* Common.Inserte ("drop table RuleBaseForTwo")
	co = "CREATE TABLE [dbo].[RuleBaseForTwo] ([Serial] [int] NOT NULL ,[RuleWeight] [real] NOT NULL,[Antecedent1] [varchar] (50) NOT NULL ,[Antecedent1RefTitle] [varchar] (50) NOT NULL ,[Antecedent2] [varchar] (50) NOT NULL ,[Antecedent2RefTitle] [varchar] (50) NOT NULL ,[Consequence] [varchar] (50) NOT NULL ,[ConsequenceVal1] [real] NOT NULL ,[ConsequenceVal2] [real] NOT NULL ,[ConsequenceVal3] [real] NOT NULL , ) ON [PRIMARY]"
	Common.Inserte (co)
	Dim k As Integer
	k = 0
	
	
	
	
	
	If (noOfConsequentRefVal = 4) Then
	Common.Inserte ("ALTER TABLE RuleBaseForTwo ADD ConsequenceVal4 real")
	ElseIf (noOfConsequentRefVal = 5) Then
	Common.Inserte ("ALTER TABLE RuleBaseForTwo ADD ConsequenceVal4 real")
	Common.Inserte ("ALTER TABLE RuleBaseForTwo ADD ConsequenceVal5 real")
	End If
	'Common.Inserte ("ALTER TABLE RuleBaseForTwo ADD [Input] [real] NULL")
	
Common.Inserte ("ALTER TABLE RuleBaseForTwo ADD [MatchingDegree] [real] NULL")
Common.Inserte ("ALTER TABLE RuleBaseForTwo ADD [ActivationWeight] [real] NULL")
	 */
	mysql_close($link);
	//return $resultString;
}
function delete_rule_base_for_three($noOfConsequentRefVal){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	$sql = "drop table RuleBaseForThree";

	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$sql= 'CREATE TABLE IF NOT EXISTS `RuleBaseForThree` (
  `Serial` int(11) NOT NULL,
  `RuleWeight` float NOT NULL,
  `Antecedent1` varchar(50) NOT NULL,
  `Antecedent1RefTitle` varchar(50) NOT NULL,
  `Antecedent2` varchar(50) NOT NULL,
  `Antecedent2RefTitle` varchar(50) NOT NULL,
  `Antecedent3` varchar(50) NOT NULL,
  `Antecedent3RefTitle` varchar(50) NOT NULL,
  `Consequence` varchar(50) NOT NULL,
  `ConsequenceVal1` float NOT NULL,
  `ConsequenceVal2` float NOT NULL,
  `ConsequenceVal3` float NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
	$result = mysql_query ( $sql ) or die ( $sql . "<br/><br/>" . mysql_error () );
	if ($noOfConsequentRefVal == 4) {
		$sql = "ALTER TABLE RuleBaseForThree ADD ConsequenceVal4 real";

		$result = mysql_query ( $sql ) or die ( $sql . "<br/><br/>" . mysql_error () );
	} elseif ($noOfConsequentRefVal == 5) {
		$sql = "ALTER TABLE RuleBaseForThree ADD ConsequenceVal4 real";

		$result = mysql_query ( $sql ) or die($sql."<br/><br/>".mysql_error());
		$sql = "ALTER TABLE RuleBaseForThree ADD ConsequenceVal5 real";

		$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	}
	$sql = "ALTER TABLE RuleBaseForThree ADD MatchingDegree real NULL";
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$sql = "ALTER TABLE RuleBaseForThree ADD ActivationWeight real NULL";
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());

	mysql_close($link);
	//return $resultString;
}
function delete_rule_base_for_five($noOfConsequentRefVal){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	$sql = "drop table RuleBaseForFive";

	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$sql= 'CREATE TABLE IF NOT EXISTS `RuleBaseForFive` (
  `Serial` int(11) NOT NULL,
  `RuleWeight` float NOT NULL,
  `Antecedent1` varchar(50) NOT NULL,
  `Antecedent1RefTitle` varchar(50) NOT NULL,
  `Antecedent2` varchar(50) NOT NULL,
  `Antecedent2RefTitle` varchar(50) NOT NULL,
  `Antecedent3` varchar(50) NOT NULL,
  `Antecedent3RefTitle` varchar(50) NOT NULL,
   `Antecedent4` varchar(50) NOT NULL,
  `Antecedent4RefTitle` varchar(50) NOT NULL,
	 `Antecedent5` varchar(50) NOT NULL,
  `Antecedent5RefTitle` varchar(50) NOT NULL,
  `Consequence` varchar(50) NOT NULL,
  `ConsequenceVal1` float NOT NULL,
  `ConsequenceVal2` float NOT NULL,
  `ConsequenceVal3` float NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
	$result = mysql_query ( $sql ) or die ( $sql . "<br/><br/>" . mysql_error () );
	if ($noOfConsequentRefVal == 4) {
		$sql = "ALTER TABLE RuleBaseForFive ADD ConsequenceVal4 real";

		$result = mysql_query ( $sql ) or die ( $sql . "<br/><br/>" . mysql_error () );
	} elseif ($noOfConsequentRefVal == 5) {
		$sql = "ALTER TABLE RuleBaseForFive ADD ConsequenceVal4 real";

		$result = mysql_query ( $sql ) or die($sql."<br/><br/>".mysql_error());
		$sql = "ALTER TABLE RuleBaseForFive ADD ConsequenceVal5 real";

		$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	}
	$sql = "ALTER TABLE RuleBaseForFive ADD MatchingDegree real NULL";
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$sql = "ALTER TABLE RuleBaseForFive ADD ActivationWeight real NULL";
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());

	mysql_close($link);
	//return $resultString;
}
function load_default_values_for_antecedent($antecedent_id){
// 	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$antecedent_id',$antecedent_id);
	
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	$sql = "select * from DefaultRefVal where AntecedentName='".$antecedent_id."' order by RefVal desc";
// 	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$sql',$sql);
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$resultString="RefTitle-RefVal-AntecedentName|";
	while($row = mysql_fetch_array($result)){
		$resultString.=$row["RefTitle"]."-".$row["RefVal"]."-".$row["AntecedentName"]."|";
	//echo "[RefTitle]: " . $row["RefTitle"]. " - RefVal: " . $row["RefVal"]. " " . $row["AntecedentName"]. "<br>";
	//echo "<br />";
	}
	mysql_close($link);
// 	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$resultString',$resultString);
	return $resultString;
}

function insert_ruleBaseTwo_4($Serial,$Ruleweight,$Antecedent1,$Antecedent1RefTitle,$Antecedent2,$Antecedent2RefTitle,
				 $Consequence,$ConsequenceVal1,$ConsequenceVal2,$ConsequenceVal3,$ConsequenceVal4)
{
	global $servername, $username, $password, $dbname;
	
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	
	
	//sfor(())
	$sql = "INSERT INTO RuleBaseForTwo (Serial,Ruleweight,Antecedent1,Antecedent1RefTitle,Antecedent2,Antecedent2RefTitle,Consequence,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4) VALUES ('$Serial','$Ruleweight','$Antecedent1','$Antecedent1RefTitle','$Antecedent2','$Antecedent2RefTitle','$Consequence','$ConsequenceVal1','$ConsequenceVal2','$ConsequenceVal3','$ConsequenceVal4')";
	//echo"sql=>".$sql;
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	
	mysql_close($link);  
}
function insert_ruleBaseTwo_5($Serial,$Ruleweight,$Antecedent1,$Antecedent1RefTitle,$Antecedent2,$Antecedent2RefTitle,
		$Consequence,$ConsequenceVal1,$ConsequenceVal2,$ConsequenceVal3,$ConsequenceVal4,$ConsequenceVal5)
{
	global $servername, $username, $password, $dbname;

	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);


	//sfor(())
	$sql = "INSERT INTO RuleBaseForTwo (Serial,Ruleweight,Antecedent1,Antecedent1RefTitle,Antecedent2,Antecedent2RefTitle,Consequence,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4,ConsequenceVal5) VALUES ('$Serial','$Ruleweight','$Antecedent1','$Antecedent1RefTitle','$Antecedent2','$Antecedent2RefTitle','$Consequence','$ConsequenceVal1','$ConsequenceVal2','$ConsequenceVal3','$ConsequenceVal4','$ConsequenceVal5')";
	//echo"sql=>".$sql;
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());

	mysql_close($link);
}
function insert_ruleBaseTwo_3($Serial,$Ruleweight,$Antecedent1,$Antecedent1RefTitle,$Antecedent2,$Antecedent2RefTitle,
				 $Consequence,$ConsequenceVal1,$ConsequenceVal2,$ConsequenceVal3){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	
	$sql = "INSERT INTO RuleBaseForTwo (Serial,Ruleweight,Antecedent1,Antecedent1RefTitle,Antecedent2,Antecedent2RefTitle,Consequence,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3)
	VALUES ('$Serial','$Ruleweight','$Antecedent1','$Antecedent1RefTitle','$Antecedent2','$Antecedent2RefTitle','
				 $Consequence','$ConsequenceVal1','$ConsequenceVal2','$ConsequenceVal3')";
	//echo"sql=>".$sql;
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	
	mysql_close($link);
}
function insert_ruleBaseThree_5($Serial,$Ruleweight,$Antecedent1,$Antecedent1RefTitle,$Antecedent2,$Antecedent2RefTitle,$Antecedent3,$Antecedent3RefTitle,
		$Consequence,$ConsequenceVal1,$ConsequenceVal2,$ConsequenceVal3,$ConsequenceVal4,$ConsequenceVal5)
{
	global $servername, $username, $password, $dbname;

	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);


	//sfor(())
	$sql = "INSERT INTO RuleBaseForThree (Serial,Ruleweight,Antecedent1,Antecedent1RefTitle,Antecedent2,Antecedent2RefTitle,Antecedent3,Antecedent3RefTitle,Consequence,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4,ConsequenceVal5) 
	VALUES ('$Serial','$Ruleweight','$Antecedent1','$Antecedent1RefTitle','$Antecedent2','$Antecedent2RefTitle','$Antecedent3','$Antecedent3RefTitle','$Consequence','$ConsequenceVal1','$ConsequenceVal2','$ConsequenceVal3','$ConsequenceVal4','$ConsequenceVal5')";
	//echo"sql=>".$sql;
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());

	mysql_close($link);
}
function insert_ruleBaseThree_4($Serial,$Ruleweight,$Antecedent1,$Antecedent1RefTitle,$Antecedent2,$Antecedent2RefTitle,$Antecedent3,$Antecedent3RefTitle,
		$Consequence,$ConsequenceVal1,$ConsequenceVal2,$ConsequenceVal3,$ConsequenceVal4)
{
	global $servername, $username, $password, $dbname;

	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);


	//sfor(())
	$sql = "INSERT INTO RuleBaseForThree (Serial,Ruleweight,Antecedent1,Antecedent1RefTitle,Antecedent2,Antecedent2RefTitle,Antecedent3,Antecedent3RefTitle,Consequence,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4) 
	VALUES ('$Serial','$Ruleweight','$Antecedent1','$Antecedent1RefTitle','$Antecedent2','$Antecedent2RefTitle','$Antecedent3','$Antecedent3RefTitle','$Consequence','$ConsequenceVal1','$ConsequenceVal2','$ConsequenceVal3','$ConsequenceVal4')";
	//echo"sql=>".$sql;
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());

	mysql_close($link);
}
function insert_ruleBaseThree_3($Serial,$Ruleweight,$Antecedent1,$Antecedent1RefTitle,$Antecedent2,$Antecedent2RefTitle,$Antecedent3,$Antecedent3RefTitle,
		$Consequence,$ConsequenceVal1,$ConsequenceVal2,$ConsequenceVal3){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);

	$sql = "INSERT INTO RuleBaseForThree (Serial,Ruleweight,Antecedent1,Antecedent1RefTitle,Antecedent2,Antecedent2RefTitle,Antecedent3,Antecedent3RefTitle,Consequence,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3)
	VALUES ('$Serial','$Ruleweight','$Antecedent1','$Antecedent1RefTitle','$Antecedent2','$Antecedent2RefTitle','$Antecedent3','$Antecedent3RefTitle','
	$Consequence','$ConsequenceVal1','$ConsequenceVal2','$ConsequenceVal3')";
	//echo"sql=>".$sql;
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());

	mysql_close($link);
}
function insert_ruleBaseFive_3($Serial,$Ruleweight,$Antecedent1,$Antecedent1RefTitle,$Antecedent2,$Antecedent2RefTitle,$Antecedent3,$Antecedent3RefTitle,
		$Antecedent4,$Antecedent4RefTitle,$Antecedent5,$Antecedent5RefTitle,$Consequence,$ConsequenceVal1,$ConsequenceVal2,$ConsequenceVal3){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);

	$sql = "INSERT INTO RuleBaseForFive (Serial,Ruleweight,Antecedent1,Antecedent1RefTitle,Antecedent2,Antecedent2RefTitle,Antecedent3,Antecedent3RefTitle,Antecedent4,Antecedent4RefTitle,Antecedent5,Antecedent5RefTitle,Consequence,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3)
	VALUES ('$Serial','$Ruleweight','$Antecedent1','$Antecedent1RefTitle','$Antecedent2','$Antecedent2RefTitle','$Antecedent3','$Antecedent3RefTitle','$Antecedent4','$Antecedent4RefTitle','$Antecedent5','$Antecedent5RefTitle','
	$Consequence','$ConsequenceVal1','$ConsequenceVal2','$ConsequenceVal3')";
	//echo"sql=>".$sql;
// 	write_to_log(__FILE__,__LINE__,__FUNCTION__,'$sql',$sql);
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());

	mysql_close($link);
}
function insert_ruleBaseFive_4($Serial,$Ruleweight,$Antecedent1,$Antecedent1RefTitle,$Antecedent2,$Antecedent2RefTitle,$Antecedent3,$Antecedent3RefTitle,
		$Antecedent4,$Antecedent4RefTitle,$Antecedent5,$Antecedent5RefTitle,$Consequence,$ConsequenceVal1,$ConsequenceVal2,$ConsequenceVal3,$ConsequenceVal4){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);

	$sql = "INSERT INTO RuleBaseForFive (Serial,Ruleweight,Antecedent1,Antecedent1RefTitle,Antecedent2,Antecedent2RefTitle,Antecedent3,Antecedent3RefTitle,Antecedent4,Antecedent4RefTitle,Antecedent5,Antecedent5RefTitle,Consequence,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4)
	VALUES ('$Serial','$Ruleweight','$Antecedent1','$Antecedent1RefTitle','$Antecedent2','$Antecedent2RefTitle','$Antecedent3','$Antecedent3RefTitle','$Antecedent4','$Antecedent4RefTitle','$Antecedent5','$Antecedent5RefTitle','
	$Consequence','$ConsequenceVal1','$ConsequenceVal2','$ConsequenceVal3','$ConsequenceVal4')";
	//echo"sql=>".$sql;
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());

	mysql_close($link);
}
function insert_ruleBaseFive_5($Serial,$Ruleweight,$Antecedent1,$Antecedent1RefTitle,$Antecedent2,$Antecedent2RefTitle,$Antecedent3,$Antecedent3RefTitle,
		$Antecedent4,$Antecedent4RefTitle,$Antecedent5,$Antecedent5RefTitle,$Consequence,$ConsequenceVal1,$ConsequenceVal2,$ConsequenceVal3,$ConsequenceVal4,$ConsequenceVal5){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);

	$sql = "INSERT INTO RuleBaseForFive (Serial,Ruleweight,Antecedent1,Antecedent1RefTitle,Antecedent2,Antecedent2RefTitle,Antecedent3,Antecedent3RefTitle,Antecedent4,Antecedent4RefTitle,Antecedent5,Antecedent5RefTitle,Consequence,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4,ConsequenceVal5)
	VALUES ('$Serial','$Ruleweight','$Antecedent1','$Antecedent1RefTitle','$Antecedent2','$Antecedent2RefTitle','$Antecedent3','$Antecedent3RefTitle','$Antecedent4','$Antecedent4RefTitle','$Antecedent5','$Antecedent5RefTitle','
	$Consequence','$ConsequenceVal1','$ConsequenceVal2','$ConsequenceVal3','$ConsequenceVal4','$ConsequenceVal5')";
	//echo"sql=>".$sql;
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());

	mysql_close($link);
}
function insert_MatchingDegree($result){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);
	$i=0;
	foreach($result as $row){
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);
	
		//echo"i=>".$i;
		$sql = 'update RuleBaseForTwo set MatchingDegree=' . $row . ' where Serial='.$i;
// 		echo"sqlq=>".$sql;
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('insert_MatchingDegree=== Could not update data: ' . mysql_error());
		}
		//echo"result=>".$result;
		mysql_close($link);
		$i=$i+1;
	}
	
}
function insert_MatchingDegree_Three($result){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);
	$i=0;
	foreach($result as $row){
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);

		//echo"i=>".$i;
		$sql = 'update RuleBaseForThree set MatchingDegree=' . $row . ' where Serial='.$i;
		// 		echo"sqlq=>".$sql;
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('insert_MatchingDegreeThree=== Could not update data: ' . mysql_error());
		}
		//echo"result=>".$result;
		mysql_close($link);
		$i=$i+1;
	}

}
function insert_MatchingDegree_Five($result){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);
	$i=0;
	foreach($result as $row){
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);

		//echo"i=>".$i;
		$sql = 'update RuleBaseForFive set MatchingDegree=' . $row . ' where Serial='.$i;
		// 		echo"sqlq=>".$sql;
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('insert_MatchingDegreeFive=== Could not update data: ' . mysql_error());
		}
		//echo"result=>".$result;
		mysql_close($link);
		$i=$i+1;
	}

}
function insert_ActivationWeight($result){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);
	$i=0;
	foreach($result as $row){
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);

		//echo"i=>".$i;
		$sql = 'update RuleBaseForTwo set ActivationWeight=' . $row . ' where Serial='.$i;
// 		echo"sqlq=>".$sql."<br>";
// 		write_to_log(__FILE__,__LINE__,'$sql',$sql);
		/*
		 *
		 * write_to_log(__FILE__,__LINE__,'$GLOBALS[numberOfRules]',$GLOBALS['numberOfRules']);
		 *
		 *
		 * */
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('insert_ActivationWeight==Could not update data: ' . mysql_error());
		}
		//echo"result=>".$result;
		mysql_close($link);
		$i=$i+1;
	}

}
function insert_ActivationWeight_Three($result){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);
	$i=0;
	foreach($result as $row){
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);

		//echo"i=>".$i;
		$sql = 'update RuleBaseForThree set ActivationWeight=' . $row . ' where Serial='.$i;
		// 		echo"sqlq=>".$sql."<br>";
		// 		write_to_log(__FILE__,__LINE__,'$sql',$sql);
		/*
		*
		* write_to_log(__FILE__,__LINE__,'$GLOBALS[numberOfRules]',$GLOBALS['numberOfRules']);
		*
		*
		* */
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('insert_ActivationWeightThree==Could not update data: ' . mysql_error());
		}
		//echo"result=>".$result;
		mysql_close($link);
		$i=$i+1;
	}

}
function insert_ActivationWeight_Five($result){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);
	$i=0;
	foreach($result as $row){
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);

		//echo"i=>".$i;
		$sql = 'update RuleBaseForFive set ActivationWeight=' . $row . ' where Serial='.$i;
		// 		echo"sqlq=>".$sql."<br>";
		// 		write_to_log(__FILE__,__LINE__,'$sql',$sql);
		/*
		*
		* write_to_log(__FILE__,__LINE__,'$GLOBALS[numberOfRules]',$GLOBALS['numberOfRules']);
		*
		*
		* */
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('insert_ActivationWeightFive==Could not update data: ' . mysql_error());
		}
		//echo"result=>".$result;
		mysql_close($link);
		$i=$i+1;
	}

}
function update_ConsequenceVal($number_consequent,$updatevalue){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);
// 	echo'<br>number_consequent';
// 	print_r($number_consequent);
	if($number_consequent=='Default'){
		$number_consequent=3;
	}
	for($i=1;$i<=$number_consequent;$i++){
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);

		//echo"i=>".$i;
		$sql = 'update RuleBaseForTwo set ConsequenceVal'.$i.'= ConsequenceVal'.$i.'*' . $updatevalue;
		//update RuleBaseForTwo set ConsequenceVal" & CStr(i + 1) & " = ConsequenceVal" & CStr(i + 1) & " *" & updatevalue
// 		echo"sqlq=>".$sql;
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('Could not update data: ' . mysql_error());
		}
		//echo"result=>".$result;
		mysql_close($link);
		//$i=$i+1;
	}

}
function update_ConsequenceVal_Three($number_consequent,$updatevalue){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);
	// 	echo'<br>number_consequent';
	// 	print_r($number_consequent);
	if($number_consequent=='Default'){
		$number_consequent=3;
	}
	for($i=1;$i<=$number_consequent;$i++){
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);

		//echo"i=>".$i;
		$sql = 'update RuleBaseForThree set ConsequenceVal'.$i.'= ConsequenceVal'.$i.'*' . $updatevalue;
		//update RuleBaseForTwo set ConsequenceVal" & CStr(i + 1) & " = ConsequenceVal" & CStr(i + 1) & " *" & updatevalue
		// 		echo"sqlq=>".$sql;
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('Could not update data: ' . mysql_error());
	}
	//echo"result=>".$result;
	mysql_close($link);
	//$i=$i+1;
	}

}
function update_ConsequenceVal_Five($number_consequent,$updatevalue){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);
	// 	echo'<br>number_consequent';
	// 	print_r($number_consequent);
	if($number_consequent=='Default'){
		$number_consequent=3;
	}
	for($i=1;$i<=$number_consequent;$i++){
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);

		//echo"i=>".$i;
		$sql = 'update RuleBaseForFive set ConsequenceVal'.$i.'= ConsequenceVal'.$i.'*' . $updatevalue;
		//update RuleBaseForTwo set ConsequenceVal" & CStr(i + 1) & " = ConsequenceVal" & CStr(i + 1) & " *" & updatevalue
		// 		echo"sqlq=>".$sql;
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('Could not update data: ' . mysql_error());
		}
		//echo"result=>".$result;
		mysql_close($link);
		//$i=$i+1;
	}

}
function get_prev_ConsequenceVal($number_consequent){
	
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);

	
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);
		$sql = 'select ';
		$header='';
		for($i=1;$i<=$number_consequent;$i++){
			$sql .='ConsequenceVal'.$i.',';
			$header.='Prev ConsequenceVal'.$i.'-';
		}
		$sql=rtrim($sql,',');
		$header=rtrim($header,'-').'|';
		$sql.=' from RuleBaseForTwo order by Serial';
		//echo"i=>".$i;
		//$sql = 'update RuleBaseForTwo set ConsequenceVal'.$i.'= ConsequenceVal'.$i.'*' . $updatevalue;
		//update RuleBaseForTwo set ConsequenceVal" & CStr(i + 1) & " = ConsequenceVal" & CStr(i + 1) & " *" & updatevalue
		//echo'sqlq=>'.$sql.'<br>';
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('Could not update data: ' . mysql_error());
		}
		$resultString=$header;
		$noOfColumns=$number_consequent;
		while($row = mysql_fetch_array($result)){
		
			for($i=0;$i<$noOfColumns;$i++){
				if(is_null($row[$i]) )
					$resultString.='NULL-';
				else
					$resultString.=$row[$i].'-';
					
			}
			$resultString=rtrim($resultString,'-').'|';
			//echo "<br />";
			//echo $resultString;
		
		}
		
		/* echo"<br>result=><br>";
		print_r($resultString); */
		mysql_close($link);
		return $resultString;
		//$i=$i+1;
	

}
function get_prev_ConsequenceVal_Three($number_consequent){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	//echo"result=>".count($result);


	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	$sql = 'select ';
	$header='';
	for($i=1;$i<=$number_consequent;$i++){
		$sql .='ConsequenceVal'.$i.',';
		$header.='Prev ConsequenceVal'.$i.'-';
	}
	$sql=rtrim($sql,',');
	$header=rtrim($header,'-').'|';
	$sql.=' from RuleBaseForThree order by Serial';
	//echo"i=>".$i;
	//$sql = 'update RuleBaseForTwo set ConsequenceVal'.$i.'= ConsequenceVal'.$i.'*' . $updatevalue;
	//update RuleBaseForTwo set ConsequenceVal" & CStr(i + 1) & " = ConsequenceVal" & CStr(i + 1) & " *" & updatevalue
	//echo'sqlq=>'.$sql.'<br>';
	$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
	if(! $result )
	{
	die('Could not update data: ' . mysql_error());
	}
	$resultString=$header;
	$noOfColumns=$number_consequent;
	while($row = mysql_fetch_array($result)){

	for($i=0;$i<$noOfColumns;$i++){
	if(is_null($row[$i]) )
		$resultString.='NULL-';
		else
				$resultString.=$row[$i].'-';
					
	}
	$resultString=rtrim($resultString,'-').'|';
	//echo "<br />";
			//echo $resultString;

	}

	/* echo"<br>result=><br>";
	print_r($resultString); */
		mysql_close($link);
		return $resultString;
		//$i=$i+1;


	}
	function get_prev_ConsequenceVal_Five($number_consequent){
		global $servername, $username, $password, $dbname;
		//echo $servername."-".$username."-".$password."-".$dbname;
		//echo"result=>".count($result);
	
	
		$link = mysql_connect($servername, $username, $password);
		if (!$link) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db($dbname);
		$sql = 'select ';
		$header='';
		for($i=1;$i<=$number_consequent;$i++){
			$sql .='ConsequenceVal'.$i.',';
			$header.='Prev ConsequenceVal'.$i.'-';
		}
		$sql=rtrim($sql,',');
		$header=rtrim($header,'-').'|';
		$sql.=' from RuleBaseForFive order by Serial';
		//echo"i=>".$i;
		//$sql = 'update RuleBaseForTwo set ConsequenceVal'.$i.'= ConsequenceVal'.$i.'*' . $updatevalue;
		//update RuleBaseForTwo set ConsequenceVal" & CStr(i + 1) & " = ConsequenceVal" & CStr(i + 1) & " *" & updatevalue
		//echo'sqlq=>'.$sql.'<br>';
		$result = mysql_query($sql); //or die($sql."<br/><br/>".mysql_error());
		if(! $result )
		{
			die('Could not update data: ' . mysql_error());
		}
		$resultString=$header;
		$noOfColumns=$number_consequent;
		while($row = mysql_fetch_array($result)){
	
			for($i=0;$i<$noOfColumns;$i++){
				if(is_null($row[$i]) )
					$resultString.='NULL-';
				else
					$resultString.=$row[$i].'-';
					
			}
			$resultString=rtrim($resultString,'-').'|';
			//echo "<br />";
			//echo $resultString;
	
		}
	
		/* echo"<br>result=><br>";
		 print_r($resultString); */
		mysql_close($link);
		return $resultString;
		//$i=$i+1;
	
	
	}
function get_data_RuleWeight_ruleBaseThree(){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);


	$sql = "select RuleWeight from RuleBaseForThree  order by Serial";

	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$resultString="";
	$i=0;
	$RuleWeight=array();
	while($row = mysql_fetch_array($result)){
			
		$RuleWeight[$i]=$row[0];
		$i=$i+1;

	}



	mysql_close($link);
	return $RuleWeight;
}
function get_data_RuleWeight_ruleBaseFive(){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);


	$sql = "select RuleWeight from RuleBaseForFive  order by Serial";

	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$resultString="";
	$i=0;
	$RuleWeight=array();
	while($row = mysql_fetch_array($result)){
			
		$RuleWeight[$i]=$row[0];
		$i=$i+1;

	}



	mysql_close($link);
	return $RuleWeight;
}
function get_data_RuleWeight_ruleBaseTwo(){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	
	
	$sql = "select RuleWeight from RuleBaseForTwo  order by Serial";
	
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$resultString="";
	$i=0;
	$RuleWeight=array();
	while($row = mysql_fetch_array($result)){
			
			$RuleWeight[$i]=$row[0];
			$i=$i+1;
				
	}
	
	
	
	mysql_close($link);
	return $RuleWeight;
}
function get_datat_ruleBaseTwo(){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	$result = mysql_query("SHOW COLUMNS FROM RuleBaseForTwo");
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	$columnsName='';
	$noOfColumns=0;
	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_assoc($result)) {
			//print_r($row);
			
			$columnsName.=$row['Field'].'-';
			$noOfColumns=$noOfColumns+1;
		}
		$columnsName=rtrim($columnsName,'-').'|';
	}
	
	$sql = "select * from RuleBaseForTwo  order by Serial";
	
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$resultString="";
	while($row = mysql_fetch_array($result)){
		
		for($i=0;$i<$noOfColumns;$i++){
			if(is_null($row[$i]) )
				$resultString.='NULL-';
			else
				$resultString.=$row[$i].'-';
			
		}
		$resultString=rtrim($resultString,'-').'|';
		//echo "<br />";
		//echo $resultString;
	
	}
	//echo "<br />";
	//echo $resultString=$columnsName.$resultString;
	$resultString=$columnsName.$resultString;
	mysql_close($link);
	return $resultString;
}
function get_datat_ruleBaseThree(){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	$result = mysql_query("SHOW COLUMNS FROM RuleBaseForThree");
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	$columnsName='';
	$noOfColumns=0;
	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_assoc($result)) {
			//print_r($row);
				
			$columnsName.=$row['Field'].'-';
			$noOfColumns=$noOfColumns+1;
		}
		$columnsName=rtrim($columnsName,'-').'|';
	}

	$sql = "select * from RuleBaseForThree  order by Serial";

	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$resultString="";
	while($row = mysql_fetch_array($result)){

		for($i=0;$i<$noOfColumns;$i++){
			if(is_null($row[$i]) )
				$resultString.='NULL-';
			else
				$resultString.=$row[$i].'-';
				
		}
		$resultString=rtrim($resultString,'-').'|';
		//echo "<br />";
		//echo $resultString;

	}
	//echo "<br />";
	//echo $resultString=$columnsName.$resultString;
	$resultString=$columnsName.$resultString;
	mysql_close($link);
	return $resultString;
}
function get_datat_ruleBaseFive(){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	$result = mysql_query("SHOW COLUMNS FROM RuleBaseForFive");
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	$columnsName='';
	$noOfColumns=0;
	if (mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_assoc($result)) {
			//print_r($row);

			$columnsName.=$row['Field'].'-';
			$noOfColumns=$noOfColumns+1;
		}
		$columnsName=rtrim($columnsName,'-').'|';
	}

	$sql = "select * from RuleBaseForFive  order by Serial";

	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$resultString="";
	while($row = mysql_fetch_array($result)){

		for($i=0;$i<$noOfColumns;$i++){
			if(is_null($row[$i]) )
				$resultString.='NULL-';
			else
				$resultString.=$row[$i].'-';

		}
		$resultString=rtrim($resultString,'-').'|';
		//echo "<br />";
		//echo $resultString;

	}
	//echo "<br />";
	//echo $resultString=$columnsName.$resultString;
	$resultString=$columnsName.$resultString;
	mysql_close($link);
	return $resultString;
}
function getRuleBase_frm_db($consequent_number_of_ref_val){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
	
// 	echo "<br />consequent_number_of_ref_valin DB<br />";
// 	print_r($consequent_number_of_ref_val);
	if($consequent_number_of_ref_val==3){
		$sql = "select ConsequenceVal1,ConsequenceVal2,ConsequenceVal3 from RuleBaseForTwo";
	}elseif($consequent_number_of_ref_val==4){
		$sql = "select ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4 from RuleBaseForTwo";
	}elseif($consequent_number_of_ref_val==5){
		$sql = "select ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4,ConsequenceVal5 from RuleBaseForTwo";
	}
// 	echo "<br />sql in DB<br />";
// 	print_r($sql);
	$rule_base=array_fill(0,$consequent_number_of_ref_val,array_fill(0,$_SESSION[$_GET['node']]['numberOfRules'],0));
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$j=0;
	while($row = mysql_fetch_array($result)){
// 		echo'<br />$row>';print_r($row);
		for($i=0;$i<$consequent_number_of_ref_val;$i++){
// 			echo'<br />$row['.$i.']'.$row[$i];
			if(is_null($row[$i]) )
				$rule_base[$i][$j]='NULL';
			else
				$rule_base[$i][$j]=$row[$i];
	
		}
		if($j==($_SESSION[$_GET['node']]['numberOfRules']))
			$j=0;
		else
			$j=$j+1;
// 		echo "<br />rule_base<br />".$j;
// 		print_r($rule_base);
	
	}
// 	echo "<br />==================<br />";
// 	echo "rule_base";
// 	print_r($rule_base);
	mysql_close($link);
	return $rule_base;
}
function getRuleBase_frm_db_three($consequent_number_of_ref_val){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);

	// 	echo "<br />consequent_number_of_ref_valin DB<br />";
	// 	print_r($consequent_number_of_ref_val);
	if($consequent_number_of_ref_val==3){
		$sql = "select ConsequenceVal1,ConsequenceVal2,ConsequenceVal3 from RuleBaseForThree";
	}elseif($consequent_number_of_ref_val==4){
		$sql = "select ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4 from RuleBaseForThree";
	}elseif($consequent_number_of_ref_val==5){
		$sql = "select ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4,ConsequenceVal5 from RuleBaseForThree";
	}
	// 	echo "<br />sql in DB<br />";
	// 	print_r($sql);
	$rule_base=array_fill(0,$consequent_number_of_ref_val,array_fill(0,$_SESSION[$_GET['node']]['numberOfRules'],0));
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$j=0;
	while($row = mysql_fetch_array($result)){
		// 		echo'<br />$row>';print_r($row);
		for($i=0;$i<$consequent_number_of_ref_val;$i++){
			// 			echo'<br />$row['.$i.']'.$row[$i];
			if(is_null($row[$i]) )
				$rule_base[$i][$j]='NULL';
			else
				$rule_base[$i][$j]=$row[$i];

		}
		if($j==($_SESSION[$_GET['node']]['numberOfRules']))
			$j=0;
		else
			$j=$j+1;
		// 		echo "<br />rule_base<br />".$j;
		// 		print_r($rule_base);

	}
	// 	echo "<br />==================<br />";
	// 	echo "rule_base";
	// 	print_r($rule_base);
	mysql_close($link);
	return $rule_base;
}
function getRuleBase_frm_db_five($consequent_number_of_ref_val){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);

	// 	echo "<br />consequent_number_of_ref_valin DB<br />";
	// 	print_r($consequent_number_of_ref_val);
	if($consequent_number_of_ref_val==3){
		$sql = "select ConsequenceVal1,ConsequenceVal2,ConsequenceVal3 from RuleBaseForFive";
	}elseif($consequent_number_of_ref_val==4){
		$sql = "select ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4 from RuleBaseForFive";
	}elseif($consequent_number_of_ref_val==5){
		$sql = "select ConsequenceVal1,ConsequenceVal2,ConsequenceVal3,ConsequenceVal4,ConsequenceVal5 from RuleBaseForFive";
	}
	// 	echo "<br />sql in DB<br />";
	// 	print_r($sql);
	$rule_base=array_fill(0,$consequent_number_of_ref_val,array_fill(0,$_SESSION[$_GET['node']]['numberOfRules'],0));
	$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$j=0;
	while($row = mysql_fetch_array($result)){
		// 		echo'<br />$row>';print_r($row);
		for($i=0;$i<$consequent_number_of_ref_val;$i++){
			// 			echo'<br />$row['.$i.']'.$row[$i];
			if(is_null($row[$i]) )
				$rule_base[$i][$j]='NULL';
			else
				$rule_base[$i][$j]=$row[$i];

		}
		if($j==($_SESSION[$_GET['node']]['numberOfRules']))
			$j=0;
		else
			$j=$j+1;
		// 		echo "<br />rule_base<br />".$j;
		// 		print_r($rule_base);

	}
	// 	echo "<br />==================<br />";
	// 	echo "rule_base";
	// 	print_r($rule_base);
	mysql_close($link);
	return $rule_base;
}
function save_aggregated_Values($aggregated_Values,$consequent_id_1,$consequent_number_of_ref_val){
	global $servername, $username, $password, $dbname;
	//echo $servername."-".$username."-".$password."-".$dbname;
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname);
// 	echo "<br />consequent_id_1<br />";
// 	print_r($consequent_id_1);
	$sql="select * from AggregatedValues where ConsequentName='" . $consequent_id_1 . "'";
// 	echo $sql;
	$result = mysql_query($sql);
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
// 	echo 'mysql_num_rows'.mysql_num_rows($result);
	if (mysql_num_rows($result) == 0){
		echo 'mysql_num_rows'.mysql_num_rows($result);
		if($consequent_number_of_ref_val==3){
			//$sql = "INSERT INTO RuleBaseForTwo (Serial,Ruleweight,Antecedent1,Antecedent1RefTitle,Antecedent2,Antecedent2RefTitle,Consequence,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3);
			$sql = "insert into AggregatedValues(ConsequentName,ConsequenceVal1,ConsequenceVal2,ConsequenceVal3) values ('" . $consequent_id_1 . "',0,0,0)";
		}elseif($consequent_number_of_ref_val==4){
			
		}elseif($consequent_number_of_ref_val==5){
			
		}
	}
	$result = mysql_query($sql);
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	for($i = 0;$i<$consequent_number_of_ref_val;$i++){
		$sql = 'update AggregatedValues set ConsequenceVal'.($i+1).'=' .$aggregated_Values[$i]. ' where ConsequentName=\'' . $consequent_id_1.'\'';
// 		echo $sql;
		$result = mysql_query($sql);
		if (!$result) {
			echo 'Could not run query: ' . mysql_error();
			exit;
		}
	}

	mysql_close($link);

}

function getSensorData(){
	global $servername, $username, $password, $dbname,$dbname_ssc;

    $data = array(
        "temp" => 0,
        "soil_mois" => 0,
    );

	//write_to_log(__FILE__,__LINE__,__FUNCTION__,'$data',$data);
	$link = mysql_connect($servername, $username, $password);
	if (!$link) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db($dbname_ssc);
	$sql = "SELECT * FROM ssc_gravlax_v12.sensor_data_temperature  order by id desc LIMIT 1";
    $result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
	$i =0;
    $temperatur[]=array();
	while($row = mysql_fetch_array($result)){
        $temperatur[$i]=$row["temperature"];

        $i++;
	
	}
    $data["temp"]=$temperatur;
    //write_to_log(__FILE__,__LINE__,__FUNCTION__,'$data',$data);


    $sql = "SELECT * FROM ssc_gravlax_v12.sensor_data_soil_moisture  order by id desc LIMIT 1";
    $result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
    $i=0;
    $soil_moisture=array();
    while($row = mysql_fetch_array($result)){
        $soil_moisture[$i]=$row["soil_moisture"];
        $i++;
    }
    $data["soil_mois"]=$soil_moisture;
	mysql_close($link);
	write_to_log(__FILE__,__LINE__,__FUNCTION__,' $data', $data);
	return  $data;
}
?>