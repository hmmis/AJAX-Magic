
<?php foreach ($country_list as $c): ?>
	<div>
	<h1><a href=""><?php echo $c['country_name']?>(<?php echo $c['id']?>)</a></h1>
	<h3><?php echo $c['country_code'] ?></h3>
	<div class="text-right">
		<button class="btn btn-success">Read More</button>
	</div>
	<hr style="margin-top:5px;">
</div>
<?php endforeach ?>