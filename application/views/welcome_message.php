<!DOCTYPE html>
<html>
<head>
	<title>Welcome- Shovon</title>
	<link rel="icon" href="https://aboutme.imgix.net/background/users/m/i/s/mislam6789_1485627085_89.jpg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="container">
		<h1>Welcome to Ajax Magic!!! Play With Ajax</h1>
		<a href="<?php echo base_url()?>my_autocomplete/show" target="_blank">Auto Complete</a><br>
		<a href="<?php echo base_url()?>my_auto_scroll_load/scroll_pagination" target="_blank">Auto Load On Scroll</a><br>
		<a href="<?php echo base_url()?>my_autoload_on_click/scroll_pagination" target="_blank">Auto Load On Click</a><br>
		<a href="<?php echo base_url()?>my_on_select_get_data" target="_blank">On Change Show Table</a><br>
		<a href="<?php echo base_url()?>my_on_select_append_data" target="_blank">On Change Append Dropdown</a><br>

		<hr>
		<h4>This Project is created by -- H M Mohidul Islam Shovon</h4>
		<hr>
		<center><h3>Database Information</h3></center>

		<div class="row">
			<div class="col-md-4">
				<center><h4>Country List</h4></center>
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>SL</td>
							<td>Country Name</td>
							<td>Country Code</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sl=1;
						foreach ($country_list as $c): ?>
						<tr>
							<td><?php echo $sl++ ?></td>
							<td><?php echo $c['country_name'] ?></td>
							<td><?php echo $c['country_code'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

		<div class="col-md-8">
			<center><h4>Bangladesh</h4></center>
			<table class="table table-bordered">
				<tbody>
					<!-- Division List -->
					<?php 
					$sl_div=1;
					foreach ($division_list as $div): ?>
						<tr>
							<td><?php echo $sl_div++; ?>.<?php echo $div['bn_name'] ?></td>
							<td>
								<!-- District List -->
								<?php $own_district_list=$this->my_get_data_model->get_district_list($div['id']) ?>
								<table class="table">
									<?php 
									$sl_dis=1;
									foreach ($own_district_list as $dis): ?>
										<tr>
											
											<td><?php echo $sl_dis++ ?>.
											<?php if ($dis['lat']): ?>
												<a href="https://www.google.com/maps/preview/@<?php echo $dis['lat'] ?>,<?php echo $dis['lon'] ?>,10z" target="_blank"><?php echo $dis['bn_name'] ?></a>
											<?php else: ?>
												<?php echo $dis['bn_name'] ?>
											<?php endif ?>
											<a href="https://<?php echo $dis['website']?>" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
											</td>
											
											<td>
												<!-- Upazilla List -->
												<?php $own_upazila_list=$this->my_get_data_model->get_upazila_list($dis['id']) ?>
												<?php 
												$sl_up=1;
												foreach ($own_upazila_list as $up): ?>
													<?php echo $sl_up++ ?>.<?php echo $up['bn_name'] ?><br> 
												<?php endforeach ?>
												<!-- /Upazilla List -->
											</td>
										</tr>
									<?php endforeach ?>
								</table>
								<!-- /District List -->
							</td>
						</tr>
					<?php endforeach ?>
					<!-- /Division List -->
				</tbody>
			</table>
		</div>
	</div>

</div>
</body>
</html>