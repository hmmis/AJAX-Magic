<!DOCTYPE html>
<html>
<head>
	<title>On Change Show Table</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

	<style type="text/css">
		table,td,th{
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>
<body>

	<form>
		
		<select name="" id="selected_district_id">
			<option value="">--Please Select --</option>
			<?php foreach ($district_list as $d): ?>
				<option value="<?php echo $d['id']?>"><?php echo $d['name'] ?></option>
			<?php endforeach ?>
		</select>
	</form>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>
	<table id="table_result" style="display: none">
		<tr>
			<td>Name</td>
			<td><p id="english_name"></p></td>
		</tr>
		<tr>
			<td>Bangla Name</td>
			<td><p id="bangla_name"></p></td>
		</tr>
		<tr>
			<td>Website</td>
			<td><p id="website"></p></td>
		</tr>
		<tr>
			<td>Latitude</td>
			<td><p id="lat"></p></td>
		</tr>
		<tr>
			<td>Longitude</td>
			<td><p id="lon"></p></td>
		</tr>
	</table>

</body>
</html>

<script>

	var base="<?php echo base_url(); ?>";

    $(document).ready(function() 
    {
        $("#selected_district_id").change(function() 
        {
            var selected_district_id = $("#selected_district_id").val();
            /*Result Table Show Hide Condition*/
            if(selected_district_id){
            	$("#table_result").show();
            }else{
            	$("#table_result").hide();
            }

            /*Ajax Request Starts*/
            $.ajax({
            	url  	: base+"my_on_select_get_data/show_data",
                type 	: "GET",
                dataType:'json',
      			data 	: {
		      				selected_id : selected_district_id,	//pass selected_id as a json perameter through get request
		      			},
                success : function(data) 
                {
                    $("#english_name").html(data[0].name);
                    $("#bangla_name").html(data[0].bn_name);
                    $("#website").html(data[0].website);
                    $("#lat").html(data[0].lat);
                    $("#lon").html(data[0].lon);
                }
            });
            /*Ajax Request Ends*/
        });
    });
</script>