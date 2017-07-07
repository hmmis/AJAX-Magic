<!DOCTYPE html>
<html>
<head>
	<title>On Change Append Data</title>
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
		
		<select name="a" id="selected_district_id" required>
			<option value="">--Please Select --</option>
			<?php foreach ($district_list as $d): ?>
				<option value="<?php echo $d['id']?>"><?php echo $d['name'] ?></option>
			<?php endforeach ?>
		</select>

		<select name="b" id="upzilla_list" required>
			<option value="">--Select--</option>
		</select>

		<input type="submit" name="submit" value="Save">
	</form>


</body>
</html>

<script>

	var base="<?php echo base_url(); ?>";

    $(document).ready(function() 
    {
        $("#selected_district_id").change(function() 
        {
            var selected_district_id = $("#selected_district_id").val();
            $("#upzilla_list").html("<option value=''>--Select--</option>");

            /*Ajax Request Starts*/
            $.ajax({
            	url  	: base+"my_on_select_append_data/get_upzilla_list",
                type 	: "GET",
                dataType:'json',
      			data 	: {
		      				selected_id : selected_district_id,	//pass selected_id as a json perameter through get request
		      			},
                success : function(data) 
                {
                	for (var i = 0; i <= data.length; i++) {
                		$("#upzilla_list").append("<option value="+data[i].id+">"+data[i].name+"</option>");
                	}
                    
                    
                }
            });
            /*Ajax Request Ends*/
        });
    });
</script>