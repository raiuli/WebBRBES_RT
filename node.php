<?php

$data = array();
$data['result_type'] = 'failed';
$data['graph_data'] = '';
$graph = '';

//$graph = '65, 59, 80, 81, 56, 55, 40';
$element_list = array();


$file_handle = fopen("textfiles/X8.txt", "r");
while (!feof($file_handle))
{
	$line = fgets($file_handle);
	$line = trim($line);
	
	if(is_numeric($line))
	{
		$element_list[] = $line;
	}
}
fclose($file_handle);

if(count($element_list) > 0)
{
	$data['result_type'] = 'success';
}

$data['graph_data'] = implode(', ', $element_list);

echo json_encode($data);


?>