<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter Auto Load On Click</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.loding_msg{
			background: #e1e1e1;
			padding: 10px 0px;
			width: 100%;
		}
	</style>
</head>
<body>

	<div class="container">
		<h2 class="text-center">Codeigniter Auto Load On Click</h2>
		
		<br/>

		<!-- Load Div -->
		<div class="col-md-12" id="autoload_div">
			<?php $this->load->view('view_auto_scroll_loaded_div'); ?>
		</div>
		<!-- /Load Div -->
	</div>

	<!-- Loding Message -->
	<center><button class="load_more_btn btn btn-info"><i class="fa fa-spinner" aria-hidden="true"></i> Load More...........</button>
		<br>
		<h4>Thank You</h4></center>
		<!-- /Loding Message -->

		<script type="text/javascript">
			/*Auto Load on Click Script*/
			var page = 1;
			$(".load_more_btn").click(function() {

				page++;
				var base="<?php echo base_url();?>";
				$.ajax({
					url: base+'my_autoload_on_click/scroll_pagination?page=' + page, //Call Controller
					type: "get",
					success:function(data) {
						if(data){
							$("#autoload_div").append(data); //Append Div with Data
						}else{
							$('.load_more_btn').html("No More Data Available");//Empty Data Messgae
							$('.load_more_btn').attr("disabled", true);
							return;
						}
						
					},
					error: function(){
						$('.load_more_btn').html("Server not responding...");
					}
				})
			});
		</script>

	</body>
	</html>