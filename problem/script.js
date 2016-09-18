var is_transmission_button_pressed = false;
var interval; // unfortunately, a timer is required to ensure it is automatically called after a certain time.
var countofcall=0;;
function open_popup(node_id)
{
	//alert('node_id: ' + node_id);
	var url = 'popup.php?node=' + node_id;
	window.open(url, '_blank', "height=600,width=1030,modal=yes,alwaysRaised=yes,scrollbars=yes,resizable=yes");
	//alert('Hello!');
	
	return false;
}

function load_results()
{
	var data = jQuery("#my_form").serializeArray();
	jQuery.ajax({
		type: "POST",
		url: 'process.php?showdata=yes',
		data: data,
		dataType: "json",
		timeout: 5000, // sets timeout to 5 seconds
		cache: false,
		success: function(data){
			if(data.result_type == 'success')
			{
				jQuery('.html_output').html(data.html);
			}
			else if(data.result_type == 'failed')
			{
				alert('Error Occured! Please try again.');
			}
		},
		error: function(request, status, error){ 
			alert('No Internet connection!');
		}
	});
}
function show_default_values_for_antecedent(action_type,antecedent_id,i,value)
{
	//alert('antecedent_id: ' + value);
	var data = jQuery("#my_form").serializeArray();
	jQuery.ajax({
		type: "POST",
		url: 'process.php?antecedent_id='+antecedent_id+ '&action_type='+action_type+ '&i='+i+ '&value='+value,
		data: data,
		dataType: "json",
		timeout: 5000, // sets timeout to 5 seconds
		cache: false,
		success: function(data){
			if(data.result_type == 'success')
			{
				//jQuery('.antecedent_ref_values').html(data.html);
				//alert(data.returntag);
				jQuery(data.returntag).html(data.html);
				//$data['returntag']
			}
			else if(data.result_type == 'failed')
			{
				alert('Error Occured! Please try again.');
			}
		},
		error: function(request, status, error){ 
			alert('No Internet connection!');
		}
	});
}
function get_input_values_for_antecedent(){
	//alert('got it !!!!');
}
function show_default_values_for_consequent(action_type,antecedent_id,value)
{
	//alert('antecedent_id: ' + value);
	var data = jQuery("#my_form").serializeArray();
	jQuery.ajax({
		type: "POST",
		url: 'process.php?antecedent_id='+antecedent_id+ '&action_type='+action_type+ '&value='+value,
		data: data,
		dataType: "json",
		timeout: 50000, // sets timeout to 5 seconds
		cache: false,
		success: function(data){
			if(data.result_type == 'success')
			{
				//jQuery('.html_output').html(data.html);
				jQuery(data.returntag).html(data.html);
			}
			else if(data.result_type == 'failed')
			{
				alert('Error Occured! Please try again.');
			}
		},
		error: function(request, status, error){ 
			alert('No Internet connection!');
		}
	});
}
function compute_rule_base(action_type,antecedent_id){
	 $('.html_output').show();

	var data = jQuery("#my_form").serializeArray();
	jQuery.ajax({
		type: "POST",
		url: 'process.php?antecedent_id='+antecedent_id+ '&action_type='+action_type+ '&node='+antecedent_id,
		data: data,
		dataType: "json",
		timeout: 50000, // sets timeout to 5 seconds
		cache: false,
		success: function(data){
			if(data.result_type == 'success')
			{
				//jQuery('.html_output').html(data.html);
				jQuery(data.returntag).html(data.html);
			}
			else if(data.result_type == 'failed')
			{
				alert('Error Occured! Please try again.');
			}
		},
		error: function(request, status, error){ 
			alert('No Internet connection!');
		}
	});
	
}
function execute_Input_Transformation(action_type,node_id)
{
	//alert('antecedent_id: ' + value);
	var data = jQuery("#my_form").serializeArray();
	jQuery.ajax({
		type: "POST",
		url: 'process.php?action_type='+action_type+ '&node='+node_id,
		data: data,
		dataType: "json",
		timeout: 50000, // sets timeout to 5 seconds
		cache: false,
		success: function(data){
			if(data.result_type == 'success')
			{
				//jQuery('.html_output').html(data.html);
				jQuery(data.returntag).html(data.html);
			}
			else if(data.result_type == 'failed')
			{
				alert('Error Occured! Please try again.');
			}
		},
		error: function(request, status, error){ 
			alert('No Internet connection!');
		}
	});
}
function execute_Activation_Weight_Computation(action_type,node_id){
	//alert('action_type: ' + action_type);
	var data = jQuery("#my_form").serializeArray();
	jQuery.ajax({
		type: "POST",
		url: 'process.php?action_type='+action_type+ '&node='+node_id,
		data: data,
		dataType: "json",
		timeout: 50000, // sets timeout to 5 seconds
		cache: false,
		success: function(data){
			if(data.result_type == 'success')
			{
				//jQuery('.html_output').html(data.html);
				jQuery(data.returntag).html(data.html);
				jQuery(data.returntag_status).html(data.html1);
			}
			else if(data.result_type == 'failed')
			{
				alert('Error Occured! Please try again.');
			}
		},
		error: function(request, status, error){ 
			alert('No Internet connection!');
		}
	});
}

function perform_update(action_type,node_id){
	//alert('action_type: ' + action_type);
	var data = jQuery("#my_form").serializeArray();
	jQuery.ajax({
		type: "POST",
		url: 'process.php?action_type='+action_type+ '&node='+node_id,
		data: data,
		dataType: "json",
		timeout: 50000, // sets timeout to 5 seconds
		cache: false,
		success: function(data){
			if(data.result_type == 'success')
			{
				//jQuery('.html_output').html(data.html);
				jQuery(data.returntag).html(data.html);
				jQuery(data.returntag_status).html(data.html1);
			}
			else if(data.result_type == 'failed')
			{
				alert('Error Occured! Please try again.');
			}
		},
		error: function(request, status, error){ 
			alert('No Internet connection!');
		}
	});
}


function perform_aggregation(action_type,node_id){
	//alert('action_type: ' + action_type);
	var data = jQuery("#my_form").serializeArray();
	jQuery.ajax({
		type: "POST",
		url: 'process.php?action_type='+action_type+ '&node='+node_id,
		data: data,
		dataType: "json",
		timeout: 50000, // sets timeout to 5 seconds
		cache: false,
		success: function(data){
			if(data.result_type == 'success')
			{
				//jQuery('.html_output').html(data.html);
				jQuery(data.returntag).html(data.html);
				jQuery(data.returntag_status).html(data.html1);
			}
			else if(data.result_type == 'failed')
			{
				alert('Error Occured! Please try again.');
			}
		},
		error: function(request, status, error){ 
			alert('No Internet connection!');
		}
	});
}
function transfer_value(node_id)
{
	
	var data = jQuery("#my_form").serializeArray();
	jQuery.ajax({
		type: "POST",
		url: 'process.php?action_type=transfer_value&node='+node_id,
		data: data,
		dataType: "json",
		timeout: 50000, // sets timeout to 5 seconds
		cache: false,
		success: function(data){
			if(data.result_type == 'success')
			{
				//jQuery('.html_output').html(data.html);
//				jQuery(data.returntag).html(data.html);
//				jQuery(data.returntag_status).html(data.html1);
				alert(data.html);
				window.opener.document.getElementById('status').innerHTML  = data.html;
				window.close();
			}
			else if(data.result_type == 'failed')
			{
				alert('Error Occured! Please try again.');
			}
		},
		error: function(request, status, error){ 
			alert('No Internet connection!');
		}
	});
	
	//window.opener.document.getElementById('text_input').value = input;
}
function transmit_data(action_type)
{	//alert(is_transmission_button_pressed); // see output
	
	if(is_transmission_button_pressed == false){
		document.getElementById("status").innerHTML = "Starting Sensor Data Computation";
		countofcall=0;
		//alert(is_transmission_button_pressed);
		interval = setInterval(function(){ process_data(action_type,countofcall++) }, 10000); // I am calling this function after evey X seconds. 1,000 = 1 sec

	}
}
function process_data(action_type,countofcall)
{
	//alert(is_transmission_button_pressed); // see output
	is_transmission_button_pressed = true;
//	alert(is_transmission_button_pressed); // see output and difference. since it is a global variable, it will alert "false" only once (initial assignment). then it will always be "true" until your change the value to "false"
	
	if(is_transmission_button_pressed) // as long as it is "true", it will keep performing. to stop it, just add this line "is_transmission_button_pressed = false;" wherever you want
	{
		$(".graph-message").hide();

		var data = jQuery("#my_form").serializeArray();
		jQuery.ajax({
			type: "POST",
			url: 'process.php?action_type='+action_type+'&countofcall='+countofcall.toString(),
			data: data,
			dataType: "json",
			timeout: 50000, // sets timeout to 5 seconds
			cache: false,
			success: function(data){
				if(data.result_type == 'success')
				{
					jQuery(data.returntag_status).html(data.html1);
					//alert(data.graph_data);
					//alert(data.graph);
					//jQuery('.graph-message').html(data.graph);
					var graph_data = data.graph_data.split(','); // this is equal to explode function in PHP
					alert(data.graph_label);
					alert(data.graph_data);
					var graph_label= data.graph_label.split(',');
					//alert(graph_data[0]);
					//alert('data.returntag_status '+data.end_of_sensor_data);
					if(data.end_of_sensor_data == 'done')
					{
						is_transmission_button_pressed=false;
						document.getElementById("horizontalAxisLabel").innerHTML =data.horizontalAxisLabel;
						clearInterval(interval);
						//alert('is_transmission_button_pressed'+is_transmission_button_pressed);
					}
					//return;
					var data = {
						//labels: ["January", "February", "March", "April", "May", "June", "July"],
							labels:	graph_label,
						datasets: [
							{
								label: "My First dataset",
								fillColor: "rgba(220,220,220,0.2)",
								strokeColor: "rgba(220,220,220,1)",
								pointColor: "rgba(220,220,220,1)",
								pointStrokeColor: "#fff",
								pointHighlightFill: "#fff",
								pointHighlightStroke: "rgba(220,220,220,1)",
								data: graph_data
							}
						]
					};
					
					
					

					var options = {
					
						///Boolean - Whether grid lines are shown across the chart
						scaleShowGridLines : true,
					
						//String - Colour of the grid lines
						scaleGridLineColor : "rgba(0,0,0,.05)",
					
						//Number - Width of the grid lines
						scaleGridLineWidth : 1,
					
						//Boolean - Whether to show horizontal lines (except X axis)
						scaleShowHorizontalLines: true,
					
						//Boolean - Whether to show vertical lines (except Y axis)
						scaleShowVerticalLines: true,
					
						//Boolean - Whether the line is curved between points
						bezierCurve : true,
					
						//Number - Tension of the bezier curve between points
						bezierCurveTension : 0.4,
					
						//Boolean - Whether to show a dot for each point
						pointDot : true,
					
						//Number - Radius of each point dot in pixels
						pointDotRadius : 4,
					
						//Number - Pixel width of point dot stroke
						pointDotStrokeWidth : 1,
					
						//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
						pointHitDetectionRadius : 20,
					
						//Boolean - Whether to show a stroke for datasets
						datasetStroke : true,
					
						//Number - Pixel width of dataset stroke
						datasetStrokeWidth : 2,
					
						//Boolean - Whether to fill the dataset with a colour
						datasetFill : true,
					
						//String - A legend template
						legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
					
					};

					var ctx = document.getElementById("myChart").getContext("2d");
					var myLineChart = new Chart(ctx).Line(data, options);
				}
				else if(data.result_type == 'failed')
				{
					alert('Error Occured! Please try again.');
				}
			},
			error: function(request, status, error){ 
				alert('No Internet connection!'+error);
				//alert('From Error'+data.end_of_sensor_data);
			}
		});
	}
}