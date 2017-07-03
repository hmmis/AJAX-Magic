<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter infinite scroll pagination</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
		<h2 class="text-center">Codeigniter infinite scroll pagination</h2>
		<div class="info">
			<h4>$(window).scrollTop() returns the position of the top of the page,</h4>
				<h4>and $(document).height() returns the position of the bottom of the page.</h4>
				<h4>and $(window).height() returns the height of the window.</h4>
				<h4>Therefore you need to subtract the height of the window  to get the position to compare against, as this will give you the position where the top of the page would be if you were fully scrolled to the bottom.</h4>
		</div>
		<br/>

		<!-- Load Div -->
		<div class="col-md-12" id="autoload_div">
			<?php $this->load->view('view_auto_scroll_loaded_div'); ?>
		</div>
		<!-- /Load Div -->
	</div>

	<!-- Loding Message -->
	<div class="loding_msg text-center" style="display:none">
		<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading......</p>
	</div>
	<!-- /Loding Message -->

	<script type="text/javascript">
		/*Auto Load on scroll Ajax Script*/
		var page = 1;
		$(window).scroll(function() {
			if($(window).scrollTop() > $(document).height() - $(window).height() - 1) {
				// Condition To Load Ajax Request on Scroll
				page++;
				loadMoreData(page);
			}
		});

		function loadMoreData(page){
			var base="<?php echo base_url();?>";
			$.ajax(
			{
				url: base+'my_auto_scroll_load/scroll_pagination?page=' + page, //Call Controller
				type: "get",
				beforeSend: function()
				{
						$('.loding_msg').show();	//Before Return Data Show Loding Message
				}
			})
			.done(function(data)
			{

				if(data == " "){
	                $('.loding_msg').html("No more records found");		//Empty Data Messgae
	                return;
	            }else{
	            	$('.loding_msg').hide();
	            	$("#autoload_div").append(data); //Append Div with Data
	            }
	            
				
			})
			.fail(function(jqXHR, ajaxOptions, thrownError)
			{
				$('.loding_msg').html("Server not responding...");	//Server Error Message
			});
		}
	</script>

</body>
</html>