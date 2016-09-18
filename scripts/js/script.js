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
function create_draw_graph(graph_data,graph_label,i){
	console.log('i '+i);

	console.log('graph_data '+graph_data);
	console.log('graph_data.length '+graph_data.length);
	console.log('typeof graph_data '+typeof graph_data);
	console.log('graph_label '+graph_label);
	console.log('graph_label.length '+graph_label.length);
	console.log('typeof graph_label '+typeof graph_label);
	
	
	var data = {
//			labels: ["January", "February", "March", "April", "May", "June", "July"],
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
//					data: [65, 59, 80, 81, 56, 55, 40]
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

		var ctx = document.getElementById("myChart_"+i).getContext("2d");
		var myLineChart = new Chart(ctx).Line(data, options);
}
function transmit_data_rt(action_type,node_id){
    console.log('insdide transmit_data_rt');
	if(is_transmission_button_pressed == false){
		document.getElementById("status").innerHTML = "Starting Real Time Sensor Data Computation";
		countofcall=0;
		//alert(is_transmission_button_pressed);
		interval = setInterval(function(){ process_data_rt(action_type,countofcall++,node_id) }, 100000); // I am calling this function after evey X seconds. 1,000 = 1 sec

	}

}

function process_data_rt(action_type,countofcall,node_id)
{
    console.log('insdide process_data_rt');
    var data = jQuery("#my_form").serializeArray();
	jQuery.ajax({
		type: "POST",
		url: 'process.php?action_type='+action_type+'&countofcall='+countofcall.toString()+ '&node='+node_id,
		data: data,
		dataType: "json",
		timeout: 50000, // sets timeout to 5 seconds
		cache: false,
		success: function(data){
            console.log('DATA=>');
            console.log(data);
			if(data.result_type == 'success')
			{
				//jQuery('.html_output').html(data.html);
//				jQuery(data.returntag).html(data.html);
				//jQuery(data.returntag_status).html(data.html1);
				console.log(data);
				//alert(data.html);
				//window.opener.document.getElementById('status').innerHTML  = data.html;
				//window.close();
			}
			else if(data.result_type == 'failed')
			{
				alert('Error Occured! Please try again.');
			}
		},
		error: function(request, status, error){
			alert(error);
		}
	});
}
function transmit_data(action_type,node_id)
{	//alert(is_transmission_button_pressed); // see output
	
	if(is_transmission_button_pressed == false){
		document.getElementById("status").innerHTML = "Starting Sensor Data Computation";
		countofcall=0;
		//alert(is_transmission_button_pressed);
		interval = setInterval(function(){ process_data(action_type,countofcall++,node_id) }, 10000); // I am calling this function after evey X seconds. 1,000 = 1 sec

	}
}
function process_data(action_type,countofcall,node_id)
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
			url: 'process.php?action_type='+action_type+'&countofcall='+countofcall.toString()+ '&node='+node_id,
			data: data,
			dataType: "json",
			timeout: 50000, // sets timeout to 5 seconds
			cache: false,
			success: function(data){
						//alert(data);
						console.log('DATA=>');
						console.log(data);
				if(data.result_type == 'success')
				{
					jQuery(data.returntag_status).html(data.html1);
				
					if(data.end_of_sensor_data == 'done')
					{
						is_transmission_button_pressed=false;
						
						clearInterval(interval);
						//alert('is_transmission_button_pressed'+is_transmission_button_pressed);
					}
					//return;
					var horizontalAxisLabel=data.horizontalAxisLabel.split(',');
					var sensor_data_result = data.sensor_data_result;
					sensor_data_result = sensor_data_result.split('__DIVIDER__');
					
					$.each(sensor_data_result, function( index, value )	{
						sensor_data_result[index] = value.split(',');
//						alert( index + ":a " + value );
//						$.each(sensor_data_result[index], function( inner_index, inner_value )	{
//							alert( inner_index + ": " + inner_value );
//						});					
					});	
//					alert(data.sensor_data_result);
					var sensor_graph_label = data.sensor_graph_label;
					sensor_graph_label = sensor_graph_label.split('__DIVIDER__');
					
					$.each(sensor_graph_label, function( index, value )	{
						sensor_graph_label[index] = value.split(',');
//						alert( index + ": " + value );
//						$.each(sensor_data_result[index], function( inner_index, inner_value )	{
//							alert( inner_index + ": " + inner_value );
//						});					
					});	
//					alert(data.sensor_data_result);
//					for(i=0;i<data.numberOfGraph;i++){
////						window["horizontalAxisLabel_" + i] = data.sensor_graph_label_1[i-1];
////						alert(window["horizontalAxisLabel_" + i]);
//						document.getElementById("horizontalAxisLabel_"+(i+1)).innerHTML =horizontalAxisLabel[i];
//						console.log('data.sensor_data_result['+i+']'+data.sensor_data_result[i]);
//						console.log('data.sensor_graph_label['+i+']'+data.sensor_graph_label[i]);
//						create_draw_graph(sensor_data_result[i],sensor_graph_label[i],i+1);
//					}
//					console.log('data.sensor_data_result'+data.sensor_data_result);
					draw_chart_input(data.sensor_graph_label,data.horizontalAxisLabel);
					draw_chart_output(data.sensor_data_result,data.sensor_graph_label_output);
//					draw_chart_output(sensor_data_result,data.sensor_graph_label_output);
//					write_to_log
				}
				else if(data.result_type == 'failed')
				{
					alert('Error Occured! Please try again.');
				}
			},
			error: function(request, status, error){ 
				//alert('Error in process_data ! '+request+'!' +status+'!'+error);
				
				//alert('From Error'+data.end_of_sensor_data);
			}
		});
	}
}


function draw_chart_input(input_string,nodes)
{
	var label_data = [];
	var graph_data = [];

	var color_list = [];
	
	color_list[0] = '220,220,220';
	color_list[1] = '151,187,205';
	color_list[2] = '196,29,24';
	color_list[3] = '72,6,156';
	color_list[4] = '255,170,34';
//	var input_string =input_string1;
//	console.log('typeof input_string1'+typeof input_string1);
//	var input_string = "65, 59, 80, 81, 56, 55, 40";
//	console.log('typeof input_string'+typeof input_string);
//	var input_string = "65, 59, 80, 81, 56, 55, 40";
//	var input_string = "65, 59, 80, 81, 56, 55, 40__DIVIDER__28, 48, 40, 19, 86, 27, 90";
//	var input_string = "65, 59, 80, 81, 56, 55, 40__DIVIDER__28, 48, 40, 19, 86, 27, 90__DIVIDER__8, 75, 10, 2, 14, 12, 80";
//	var input_string = "65, 59, 80, 81, 56, 55, 40__DIVIDER__28, 48, 40, 19, 86, 27, 90__DIVIDER__8, 75, 10, 2, 14, 12, 80__DIVIDER__4, 48, 30, 49, 96, 2, 10";
//	var input_string = "65, 59, 80, 81, 56, 55, 40__DIVIDER__28, 48, 40, 19, 86, 27, 90__DIVIDER__8, 75, 10, 2, 14, 12, 80__DIVIDER__4, 48, 30, 49, 96, 2, 10__DIVIDER__18, 18, 25, 11, 76, 7, 30";
	var input_list = input_string.split("__DIVIDER__");
	console.log(input_list);
	console.log(nodes);
//	var nodes = "X8, X20, X5, X10, X4";
	var nodes = nodes.split(",");
	var node_list = [];

	$.each(nodes, function( index, value ) {
		node_list[index] = $.trim(value);
	});
	
	//alert(node_list.length);

	$.each(input_list, function( index, value ) {
		//fixing color boxes
		node_no = index + 1;
		color_code = 'rgb(' + color_list[index] + ')';
		//alert(color_code);
		//$("#color-span-" + node_no).css("background-color": color_code);
		$("#color-span-" + node_no).css("background-color", color_code);
		node = node_list[index];
		$('#node-name-' + node_no).text(node);
		
		
		//alert( index + ": " + value );
		graph_data[index] = [];
		graph_inputs = value.split(",");
		$.each(graph_inputs, function( graph_index, graph_value ) {
			//alert( index + ": " + graph_index + ": " + graph_value );
			graph_data[index][graph_index] = parseFloat($.trim(graph_value));
		});
	});

	$.each(graph_data[0], function( index, value ) {
		label_data[index] = index + 1;
	});


	var dataset_items = input_list.length;
	
	switch(dataset_items)
	{
		case 1:
			var data = {
				labels: label_data,
				datasets: [
					{
						label: "My First dataset",
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data: graph_data[0]
					}
				]
			};
			break;
		case 2:
			var data = {
				labels: label_data,
				datasets: [
					{
						label: "My First dataset",
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data: graph_data[0]
					},
					{
						label: "My Second dataset",
						fillColor: "rgba(151,187,205,0.5)",
						strokeColor: "rgba(151,187,205,0.8)",
						highlightFill: "rgba(151,187,205,0.75)",
						highlightStroke: "rgba(151,187,205,1)",
						data: graph_data[1]
					}
				]
			};
			break;
		case 3:
			var data = {
				labels: label_data,
				datasets: [
					{
						label: "My First dataset",
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data: graph_data[0]
					},
					{
						label: "My Second dataset",
						fillColor: "rgba(151,187,205,0.5)",
						strokeColor: "rgba(151,187,205,0.8)",
						highlightFill: "rgba(151,187,205,0.75)",
						highlightStroke: "rgba(151,187,205,1)",
						data: graph_data[1]
					},
					{
						label: "My Third dataset",
						fillColor: "rgba(196,29,24,0.5)",
						strokeColor: "rgba(196,29,24,0.8)",
						highlightFill: "rgba(196,29,24,0.75)",
						highlightStroke: "rgba(196,29,24,1)",
						data: graph_data[2]
					}
				]
			};
			break;
		case 4:
			var data = {
				labels: label_data,
				datasets: [
					{
						label: "My First dataset",
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data: graph_data[0]
					},
					{
						label: "My Second dataset",
						fillColor: "rgba(151,187,205,0.5)",
						strokeColor: "rgba(151,187,205,0.8)",
						highlightFill: "rgba(151,187,205,0.75)",
						highlightStroke: "rgba(151,187,205,1)",
						data: graph_data[1]
					},
					{
						label: "My Third dataset",
						fillColor: "rgba(196,29,24,0.5)",
						strokeColor: "rgba(196,29,24,0.8)",
						highlightFill: "rgba(196,29,24,0.75)",
						highlightStroke: "rgba(196,29,24,1)",
						data: graph_data[2]
					},
					{
						label: "My Fourth dataset",
						fillColor: "rgba(72,6,156,0.5)",
						strokeColor: "rgba(72,6,156,0.8)",
						highlightFill: "rgba(72,6,156,0.75)",
						highlightStroke: "rgba(72,6,156,1)",
						data: graph_data[3]
					}
				]
			};
			break;
		case 5:
			var data = {
				labels: label_data,
				datasets: [
					{
						label: "My First dataset",
						fillColor: "rgba(80,80,80,0.5)",
						strokeColor: "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data: graph_data[0]
					},
					{
						label: "My Second dataset",
						fillColor: "rgba(151,187,205,0.5)",
						strokeColor: "rgba(151,187,205,0.8)",
						highlightFill: "rgba(151,187,205,0.75)",
						highlightStroke: "rgba(151,187,205,1)",
						data: graph_data[1]
					},
					{
						label: "My Third dataset",
						fillColor: "rgba(196,29,24,0.5)",
						strokeColor: "rgba(196,29,24,0.8)",
						highlightFill: "rgba(196,29,24,0.75)",
						highlightStroke: "rgba(196,29,24,1)",
						data: graph_data[2]
					},
					{
						label: "My Fourth dataset",
						fillColor: "rgba(72,6,156,0.5)",
						strokeColor: "rgba(72,6,156,0.8)",
						highlightFill: "rgba(72,6,156,0.75)",
						highlightStroke: "rgba(72,6,156,1)",
						data: graph_data[3]
					},
					{
						label: "My Second dataset",
						fillColor: "rgba(255,170,34,0.5)",
						strokeColor: "rgba(255,170,34,0.8)",
						highlightFill: "rgba(255,170,34,0.75)",
						highlightStroke: "rgba(255,170,34,1)",
						data: graph_data[4]
					}
				]
			};
			break;
	}

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

	// Get the context of the canvas element we want to select
	var ctx = document.getElementById("myChart_input").getContext("2d");
	//var myNewChart = new Chart(ctx).PolarArea(data);
	//var myBarChart = new Chart(ctx).Bar(data, options);
	var myLineChart = new Chart(ctx).Line(data, options);


	
	//alert(ctx);
	//alert(myNewChart);

	//alert('OK');
}
function draw_chart_output(input_string1,nodes1)
{
	var label_data = [];
	var graph_data = [];

	var color_list = [];
	color_list[0] = '220,220,220';
	color_list[1] = '151,187,205';
	color_list[2] = '196,29,24';
	color_list[3] = '72,6,156';
	color_list[4] = '255,170,34';
	
	
	var input_string = "65, 59, 80, 81, 56, 55, 40";
	console.log('type of input_string  '+typeof input_string);
	console.log('input_string  '+input_string);
	
	
//	var input_string = input_string1;
//	var input_string = "65, 59, 80, 81, 56, 55, 40__DIVIDER__28, 48, 40, 19, 86, 27, 90";
	//var input_string = "65, 59, 80, 81, 56, 55, 40__DIVIDER__28, 48, 40, 19, 86, 27, 90__DIVIDER__8, 75, 10, 2, 14, 12, 80";
	//var input_string = "65, 59, 80, 81, 56, 55, 40__DIVIDER__28, 48, 40, 19, 86, 27, 90__DIVIDER__8, 75, 10, 2, 14, 12, 80__DIVIDER__4, 48, 30, 49, 96, 2, 10";
	//var input_string = "65, 59, 80, 81, 56, 55, 40__DIVIDER__28, 48, 40, 19, 86, 27, 90__DIVIDER__8, 75, 10, 2, 14, 12, 80__DIVIDER__4, 48, 30, 49, 96, 2, 10__DIVIDER__18, 18, 25, 11, 76, 7, 30";
	var input_list = input_string.split("__DIVIDER__");
	console.log('type of input_list  '+typeof input_list);
	console.log('input_list  '+input_list);
	console.log('input_list.length  '+input_list.length);
//	var input_list= input_list[0];
//	console.log('before assigning type of input_list  '+typeof input_list);
//	console.log('input_list  '+input_list);
	console.log('input_string1  '+input_string1);
	console.log('type of input_string1  '+typeof input_string1);
	var input_list1 = input_string1.split("__DIVIDER__");
	console.log('type of input_list1  '+typeof input_list1);
	console.log('input_list1  '+input_list1);
	console.log('input_list1.length  '+input_list1.length);
	input_list1 = input_list1[0];
	console.log('type of input_list1  '+typeof input_list1);
	console.log('input_list1  '+input_list1);
	console.log('input_list1.length  '+input_list1.length);
	input_list1 = input_list1.split("__DIVIDER__");

	console.log('type of input_list1  '+typeof input_list1);
	console.log('input_list1  '+input_list1);
	console.log('input_list1.length  '+input_list1.length);
	var input_list= input_list1;
	console.log('input_list  '+input_list);
	console.log('type of input_list  '+typeof input_list);
	
	console.log('input_list.length  '+input_list.length);
	console.log('nodes1 '+nodes1);
	//var nodes = "X8, X20, X5, X10, X4";
	var nodes = nodes1;
	var nodes = nodes.split(",");
	var node_list = [];

	$.each(nodes, function( index, value ) {
		node_list[index] = $.trim(value);
	});
	
	//alert(node_list.length);
	console.log('node_list.length'+node_list.length);
	$.each(input_list, function( index, value ) {
		//fixing color boxes
		node_no = index + 1;
		color_code = 'rgb(' + color_list[index] + ')';
		//alert(color_code);
		//$("#color-span-" + node_no).css("background-color": color_code);
		$("#color-span-output-" + node_no).css("background-color", color_code);
		node = node_list[index];
		$('#node-name-output-' + node_no).text(node);
		
		
		//alert( index + ": " + value );
		graph_data[index] = [];
		graph_inputs = value.split(",");
		$.each(graph_inputs, function( graph_index, graph_value ) {
			//alert( index + ": " + graph_index + ": " + graph_value );
			graph_data[index][graph_index] = parseFloat($.trim(graph_value));
		});
	});

	$.each(graph_data[0], function( index, value ) {
		label_data[index] = index + 1;
	});


	var dataset_items = input_list.length;
	console.log('input_list.length  '+input_list.length);
	switch(dataset_items)
	{
		case 1:
			var data = {
				labels: label_data,
				datasets: [
					{
						label: "My First dataset",
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data: graph_data[0]
					}
				]
			};
			break;
		case 2:
			var data = {
				labels: label_data,
				datasets: [
					{
						label: "My First dataset",
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data: graph_data[0]
					},
					{
						label: "My Second dataset",
						fillColor: "rgba(151,187,205,0.5)",
						strokeColor: "rgba(151,187,205,0.8)",
						highlightFill: "rgba(151,187,205,0.75)",
						highlightStroke: "rgba(151,187,205,1)",
						data: graph_data[1]
					}
				]
			};
			break;
		case 3:
			var data = {
				labels: label_data,
				datasets: [
					{
						label: "My First dataset",
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data: graph_data[0]
					},
					{
						label: "My Second dataset",
						fillColor: "rgba(151,187,205,0.5)",
						strokeColor: "rgba(151,187,205,0.8)",
						highlightFill: "rgba(151,187,205,0.75)",
						highlightStroke: "rgba(151,187,205,1)",
						data: graph_data[1]
					},
					{
						label: "My Third dataset",
						fillColor: "rgba(196,29,24,0.5)",
						strokeColor: "rgba(196,29,24,0.8)",
						highlightFill: "rgba(196,29,24,0.75)",
						highlightStroke: "rgba(196,29,24,1)",
						data: graph_data[2]
					}
				]
			};
			break;
		case 4:
			var data = {
				labels: label_data,
				datasets: [
					{
						label: "My First dataset",
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data: graph_data[0]
					},
					{
						label: "My Second dataset",
						fillColor: "rgba(151,187,205,0.5)",
						strokeColor: "rgba(151,187,205,0.8)",
						highlightFill: "rgba(151,187,205,0.75)",
						highlightStroke: "rgba(151,187,205,1)",
						data: graph_data[1]
					},
					{
						label: "My Third dataset",
						fillColor: "rgba(196,29,24,0.5)",
						strokeColor: "rgba(196,29,24,0.8)",
						highlightFill: "rgba(196,29,24,0.75)",
						highlightStroke: "rgba(196,29,24,1)",
						data: graph_data[2]
					},
					{
						label: "My Fourth dataset",
						fillColor: "rgba(72,6,156,0.5)",
						strokeColor: "rgba(72,6,156,0.8)",
						highlightFill: "rgba(72,6,156,0.75)",
						highlightStroke: "rgba(72,6,156,1)",
						data: graph_data[3]
					}
				]
			};
			break;
		case 5:
			var data = {
				labels: label_data,
				datasets: [
					{
						label: "My First dataset",
						fillColor: "rgba(220,220,220,0.5)",
						strokeColor: "rgba(220,220,220,0.8)",
						highlightFill: "rgba(220,220,220,0.75)",
						highlightStroke: "rgba(220,220,220,1)",
						data: graph_data[0]
					},
					{
						label: "My Second dataset",
						fillColor: "rgba(151,187,205,0.5)",
						strokeColor: "rgba(151,187,205,0.8)",
						highlightFill: "rgba(151,187,205,0.75)",
						highlightStroke: "rgba(151,187,205,1)",
						data: graph_data[1]
					},
					{
						label: "My Third dataset",
						fillColor: "rgba(196,29,24,0.5)",
						strokeColor: "rgba(196,29,24,0.8)",
						highlightFill: "rgba(196,29,24,0.75)",
						highlightStroke: "rgba(196,29,24,1)",
						data: graph_data[2]
					},
					{
						label: "My Fourth dataset",
						fillColor: "rgba(72,6,156,0.5)",
						strokeColor: "rgba(72,6,156,0.8)",
						highlightFill: "rgba(72,6,156,0.75)",
						highlightStroke: "rgba(72,6,156,1)",
						data: graph_data[3]
					},
					{
						label: "My Second dataset",
						fillColor: "rgba(255,170,34,0.5)",
						strokeColor: "rgba(255,170,34,0.8)",
						highlightFill: "rgba(255,170,34,0.75)",
						highlightStroke: "rgba(255,170,34,1)",
						data: graph_data[4]
					}
				]
			};
			break;
	}

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

	// Get the context of the canvas element we want to select
	var ctx = document.getElementById("myChart_output").getContext("2d");
	//var myNewChart = new Chart(ctx).PolarArea(data);
	//var myBarChart = new Chart(ctx).Bar(data, options);
	var myLineChart = new Chart(ctx).Line(data, options);


	
	//alert(ctx);
	//alert(myNewChart);

	//alert('OK');
}