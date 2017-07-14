<!DOCTYPE html>
<html>
<head>
	<title>CI Ajax Datatable</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstarp CSS CDN -->
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <!--  Datatable Bootstarp CSS CDN-->
   <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

   <!-- jQuery JS CDN -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
   <!-- DataTable JS CDN -->
   <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" type="text/javascript"></script>
   <!-- DataTable BootStarp JS CDN -->
   <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('.datatable').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('my_ajax_datatable/load_ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
</script>

</head>
<body>

	<div class="container-fluid">
		<h1>Welcome</h1>

		<table class="datatable table" >
        <thead>
            <tr>
                <th>SL</th>
                <th>Code</th>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>

        </tbody>
        
        </table>

    </div>


</body>	
</html>

