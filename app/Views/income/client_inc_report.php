<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>
<div class="container">

	<div class="box-body">
        <div class="col-sm-12">
            <form method="post">
                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                              	<label class="control-label" for="year">Year:</label>

								<select name="year" id="year" class="form-control select2" >
									<?php
									foreach($years as $year)
			  							{
			  		 					$a = explode("-", $year['date']);?>
								  <option value="<?=$a['0']?>"><?=$a['0']?></option>
								<?php }?>
								 
								</select>
							</div>

								<div class="col-md-3">
                              	<label class="control-label" for="month">Month:</label>

								<select name="month" id="month" class="form-control select2" >
									
								  <option value=""></option>
								  <option value="01">January</option>
								  <option value="02">February</option>
								  <option value="03">March</option>
								  <option value="04">April</option>
								  <option value="05">May</option>
								  <option value="06">June</option>
								  <option value="07">July</option>
								  <option value="08">August</option>
								  <option value="09">Septemper</option>
								  <option value="10">October</option>
								  <option value="11">November</option>
								  <option value="12">December</option>

								
								 
								</select>
                            </div>

                            <div class="col-md-3">
                              	<label class="control-label" for="week">Week:</label>

								<input type="number" max="54" name="week" id="week" class="form-control" >
									
								 
								</select>
                            </div>

                            <div class="col-md-3">
                              	</br>
								<button class="btn btn-success">Search Report</button>
								
                            </div>

                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    
<hr>


	<div class="row">
		<div class="col-12 offset-sm-2">
			<h3>Your Income, <?= session()->get('client_name') ." ". $message ?> </h3>
			<div class="col-md-10 ">
				<table class="table table-striped" >
					<tr>
						<th>Income Heading</th>
						<th>Date</th>
						<th>Amount</th>
						
						
						
					</tr>
					
						<?php if($users){ $amt = 0;
							foreach($users as $user){ $amt= $amt+ $user['amount'];?>
								<tr>
									<td><?php echo $user['income_heading'] ?></td>
									<td><?php echo $user['date'] ?></td>
									<td><?php echo "Rs"." ".$user['amount'] ?></td>
									
								</tr>
						<?php } ?>
						<tr>
							<td>Total Income</td>
							<td></td>
							<td><?="Rs"." ".$amt ?></td>
							
							
						</tr> 
					<?php } ?>
					
				</table>
			</div>
		</div>
	</div>
</div>	
	
</div>
		
<?= $this->endSection() ?>