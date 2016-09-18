<?php
include_once('JTree.php');
//create a new tree object
$jt = new JTree();

/* $categories = array();
$categories[] = array('id' => 1, 'weather_condition' => 'weather', 'parent_id' => 9999);
$categories[] = array('id' => 2, 'weather_condition' => 'Earthquakes', 'parent_id' => 1);
$categories[] = array('id' => 3, 'weather_condition' => 'Major', 'parent_id' => 2);
$categories[] = array('id' => 4, 'weather_condition' => 'Minor', 'parent_id' => 2);
$categories[] = array('id' => 5, 'weather_condition' => 'Fires', 'parent_id' => 9);
$categories[] = array('id' => 6, 'weather_condition' => 'Rain', 'parent_id' => 1);
$categories[] = array('id' => 7, 'weather_condition' => 'Flooding', 'parent_id' => 6);
$categories[] = array('id' => 8, 'weather_condition' => 'Washout', 'parent_id' => 6);
$categories[] = array('id' => 9, 'weather_condition' => 'Hurricanes', 'parent_id' => 1); */

$categories = array();
$categories[] = array('id' => 'X7', 'Name' => 'Flood water level', 'parent_id' => 9999);
$categories[] = array('id' => 'X8', 'Name' => 'Meteorological Factors', 'parent_id' => 'X7');
$categories[] = array('id' => 'X9', 'Name' => 'Geological Factors', 'parent_id' => 'X7');
$categories[] = array('id' => 'X10', 'Name' => 'River Discharge', 'parent_id' => 'X7');
$categories[] = array('id' => 'X11', 'Name' => 'Topography', 'parent_id' => 'X7');
$categories[] = array('id' => 'X12', 'Name' => 'Human activities', 'parent_id' => 'X7');
$categories[] = array('id' => 'X22', 'Name' => 'Onset rainfall', 'parent_id' => 'X8');
$categories[] = array('id' => 'X23', 'Name' => 'Prolonged rainfall', 'parent_id' => 'X8');
$categories[] = array('id' => 'X19', 'Name' => 'Soil type', 'parent_id' => 'X9');
$categories[] = array('id' => 'X20', 'Name' => 'Saturation limit of the soil type', 'parent_id' => 'X9');
$categories[] = array('id' => 'X21', 'Name' => 'Soil infiltration rate', 'parent_id' => 'X9');
$categories[] = array('id' => 'X14', 'Name' => 'River depth', 'parent_id' => 'X10');
$categories[] = array('id' => 'X15', 'Name' => 'River width', 'parent_id' => 'X10');
$categories[] = array('id' => 'X16', 'Name' => 'Velocity', 'parent_id' => 'X10');
$categories[] = array('id' => 'X25', 'Name' => 'Slope', 'parent_id' => 'X11');
$categories[] = array('id' => 'X26', 'Name' => 'Aspect', 'parent_id' => 'X11');
$categories[] = array('id' => 'X27', 'Name' => 'Unplanned infrastructure', 'parent_id' => 'X12');
$categories[] = array('id' => 'X28', 'Name' => 'Embankment failure', 'parent_id' => 'X12');
$categories[] = array('id' => 'X29', 'Name' => 'Deforestation', 'parent_id' => 'X12');
$categories[] = array('id' => 'X30', 'Name' => 'Settlement on the flood prone areas', 'parent_id' => 'X12');
$categories[] = array('id' => 'X31', 'Name' => 'Decrease watershed areas', 'parent_id' => 'X12');
$categories[] = array('id' => 'X17', 'Name' => 'Slope', 'parent_id' => 'X16');
$categories[] = array('id' => 'X18', 'Name' => 'Siltation', 'parent_id' => 'X16');
// $categories[] = array('id' => 'X7', 'Name' => 'Hurricanes', 'parent_id' => 1);


//iterate building the tree
foreach($categories as $category) {
	$uid = $jt->createNode($category['Name'],$category['id'], $category['parent_id']);
}

function gettree(){
	$jt = new JTree();
	$categories = array();
	$categories[] = array('id' => 'X7', 'Name' => 'Flood water level', 'parent_id' => 9999);
	$categories[] = array('id' => 'X8', 'Name' => 'Meteorological Factors', 'parent_id' => 'X7');
	$categories[] = array('id' => 'X9', 'Name' => 'Geological Factors', 'parent_id' => 'X7');
	$categories[] = array('id' => 'X10', 'Name' => 'River Discharge', 'parent_id' => 'X7');
	$categories[] = array('id' => 'X11', 'Name' => 'Topography', 'parent_id' => 'X7');
	$categories[] = array('id' => 'X12', 'Name' => 'Human activities', 'parent_id' => 'X7');
	$categories[] = array('id' => 'X22', 'Name' => 'Onset rainfall', 'parent_id' => 'X8');
	$categories[] = array('id' => 'X23', 'Name' => 'Prolonged rainfall', 'parent_id' => 'X8');
	$categories[] = array('id' => 'X19', 'Name' => 'Soil type', 'parent_id' => 'X9');
	$categories[] = array('id' => 'X20', 'Name' => 'Saturation limit of the soil type', 'parent_id' => 'X9');
	$categories[] = array('id' => 'X21', 'Name' => 'Soil infiltration rate', 'parent_id' => 'X9');
	$categories[] = array('id' => 'X14', 'Name' => 'River depth', 'parent_id' => 'X10');
	$categories[] = array('id' => 'X15', 'Name' => 'River width', 'parent_id' => 'X10');
	$categories[] = array('id' => 'X16', 'Name' => 'Velocity', 'parent_id' => 'X10');
	$categories[] = array('id' => 'X25', 'Name' => 'Slope', 'parent_id' => 'X11');
	$categories[] = array('id' => 'X26', 'Name' => 'Aspect', 'parent_id' => 'X11');
	$categories[] = array('id' => 'X27', 'Name' => 'Unplanned infrastructure', 'parent_id' => 'X12');
	$categories[] = array('id' => 'X28', 'Name' => 'Embankment failure', 'parent_id' => 'X12');
	$categories[] = array('id' => 'X29', 'Name' => 'Deforestation', 'parent_id' => 'X12');
	$categories[] = array('id' => 'X30', 'Name' => 'Settlement on the flood prone areas', 'parent_id' => 'X12');
	$categories[] = array('id' => 'X31', 'Name' => 'Decrease watershed areas', 'parent_id' => 'X12');
	$categories[] = array('id' => 'X17', 'Name' => 'Slope', 'parent_id' => 'X16');
	$categories[] = array('id' => 'X18', 'Name' => 'Siltation', 'parent_id' => 'X16');
	foreach($categories as $category) {
		$uid = $jt->createNode($category['Name'],$category['id'], $category['parent_id']);
	}
	return $jt;
}

/* //update: removed third variable. Use defaults
$it = new JTreeRecursiveIterator($jt, new JTreeIterator($jt->getTree()));

//iterate to create the ul list
foreach($it as $k => $v) {
	echo "<br>k:=>$k";
	//echo "v:=>$v";
	print_r($v);
	
}

echo"<br>";
echo"Details of Node X8";
echo"<br>";
$jN=$jt->getNode("X8");
print_r($jN->getValue());
echo"<br>";
//print_r($jN->getChildren());
$jChildren=$jN->getChildren();
foreach( $jChildren as $value )
{
	$h=$jt->getNode($value);
	print_r($h->getUid());
	print_r($h->getValue());
	echo"<br>";
	//echo "Value is $h->getValue() <br />";
} */