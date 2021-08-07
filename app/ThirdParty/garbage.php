<div class="row">
		<div class="col-12">
			<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
			    Yearly Report
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
			  	<?php 
			  	foreach($years as $year)
			  		{
			  	
			  		 $a = explode("-", $year['date']); 

			  		 ?>

			    <li><a class="dropdown-item" href="income/specific/<?=$a['0']?>"><?php echo $a['0']; ?></a></li>
			    <?php }?>
			  </ul>
			</div>	
		</div>
	</div>