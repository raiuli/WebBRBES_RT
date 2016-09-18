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
<?php include_once('loadingData.php');
/* $transformedRefVal1=array_fill(0,5,0);
print_r($transformedRefVal1);
$transformedRefVal1=array_fill(0,7,10);
print_r($transformedRefVal1); 
$antecedentRefTitle=0;
$antecedentRefVal=0;
print_r($antecedentRefTitle);
print_r($antecedentRefVal);
$antecedentRefTitle[3][2];
$antecedentRefVal[4][2];
print_r($antecedentRefTitle);
print_r($antecedentRefVal);
$a = array_fill(0, 2, array_fill(0, 3, 1));
print_r($a);
echo $a[0];
print_r($a[0]);
$a[1]=array_fill(0,5,5);
echo '<br>';
print_r($a);*/
?>
<body>

	<!-- http://raphaeljs.com/ -->

	<div class="container">
	
		<p class="title-para">A belief rule base to assess flooding in an area</p>

		<div class="first-level"><button name="X7" id="X7" onclick="return open_popup('X7');">X7</button></div>
		
		<div class="second-level">
			<div class="second-level-1"><button name="X8" id="X8" onclick="return open_popup('X8');">X8</button></div>
			<div class="second-level-2"><button name="X9" id="X9" onclick="return open_popup('X9');">X9</button></div>
			<div class="second-level-3"><button name="X10" id="X10" onclick="return open_popup('X10');">X10</button></div>
			<div class="second-level-4"><button name="X11" id="X11" onclick="return open_popup('X11');">X11</button></div>
			<div class="second-level-5"><button name="X12" id="X12" onclick="return open_popup('X12');">X12</button></div>
		</div>

		<div class="third-level">
			<div><button name="X22" id="X22" onclick="return open_popup('X22');">X22</button></div>
			<div><button name="X23" id="X23" onclick="return open_popup('X23');">X23</button></div>
			<div><button name="X19" id="X19" onclick="return open_popup('X19');">X19</button></div>
			<div><button name="X20" id="X20" onclick="return open_popup('X20');">X20</button></div>
			<div><button name="X21" id="X21" onclick="return open_popup('X21');">X21</button></div>
			<div><button name="X14" id="X14" onclick="return open_popup('X14');">X14</button></div>
			<div><button name="X15" id="X15" onclick="return open_popup('X15');">X15</button></div>
			<div><button name="X16" id="X16" onclick="return open_popup('X16');">X16</button></div>
			<div><button name="X25" id="X25" onclick="return open_popup('X25');">X25</button></div>
			<div><button name="X26" id="X26" onclick="return open_popup('X26');">X26</button></div>
			<div><button name="X27" id="X27" onclick="return open_popup('X27');">X27</button></div>
			<div><button name="X28" id="X28" onclick="return open_popup('X28');">X28</button></div>
			<div><button name="X29" id="X29" onclick="return open_popup('X29');">X29</button></div>
			<div><button name="X30" id="X30" onclick="return open_popup('X30');">X30</button></div>
			<div><button name="X31" id="X31" onclick="return open_popup('X31');">X31</button></div>
		</div>

		<div class="fourth-level">
			<div><button name="X17" id="X17" onclick="return open_popup('X17');">X17</button></div>
			<div><button name="X18" id="X18" onclick="return open_popup('X18');">X18</button></div>
		</div>

	</div>
	
	<div class="button-list">
		<p>Meaning of the syntaxes applied in BRB</p>

		<ul>
			<li>X7 = Flood water level</li>
			<li>X10 = River Discharge</li>
			<li>X14 = River depth</li>
			<li>X15 = River width</li>
			<li>X16 = Velocity</li>
			<li>X17 = Slope</li>
			<li>X18 = Siltation</li>
			<li>X9 = Geological Factors</li>
			<li>X19 = Soil type</li>
			<li>X20 = Saturation limit of the soil type</li>
			<li>X21 = Soil infiltration rate</li>
			<li>X8 = Meteorological Factors</li>
			<li>X22 = Onset rainfall</li>
			<li>X23 = Prolonged rainfall</li>
			<li>X24 = Flood producing rainfall</li>
			<li>X11 = Topography</li>
			<li>X25 = Slope</li>
			<li>X26 = Aspect</li>
			<li>X12 = Human activities</li>
			<li>X27 = Unplanned infrastructure</li>
			<li>X28 = Embankment failure</li>
			<li>X29 = Deforestation</li>
			<li>X30 = Settlement on the flood prone areas</li>
			<li>X31 = Decrease watershed areas</li>
		</ul>
	</div>
	
	<div class="container status-container">
	
		
			<div id="status" class="status">
			Status
				
			
			</div>
	
	</div>
<?php function debug_to_console($data) {
    if(is_array($data) || is_object($data))
	{
		echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
	} else {
		echo("<script>console.log('PHP: ".$data."');</script>");
	}
}
	$data=1;
	debug_to_console("testa".$data);
	?>		
</body>
</html>