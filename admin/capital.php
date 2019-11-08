<?php include_once('header.php'); ?>

<?php

	if (isset($_POST['inv_submit'])) {
		$date = $_POST['date'];
		$farm = $_POST['farm'];
		$ssheads = $_POST['ssheads'];
		$sskilos = $_POST['sskilos'];
		$tsheads = $_POST['tsheads'];
		$tskilos = $_POST['tskilos'];
		$sheads = $_POST['sheads'];
		$skilos = $_POST['skilos'];
		$sfeeds = $_POST['sfeeds'];
		$rip = $_POST['rip'];
		$total = $_POST['total'];

		$sql = "INSERT INTO kapital VALUES (null, '$date', '$farm', '$ssheads', '$sskilos', '$tsheads', '$tskilos', '$sheads', '$skilos', '$sfeeds', '$rip', '$total', '2')";
		$result = mysqli_query($link, $sql) or die('Error querying database CAPITAL.');
	}

?>

<div class="container-fluid">
	<label><STRONG>Capital</STRONG></label>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group form-inline">
                <input class="form-control" type="date" placeholder="Date" name="date" value="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="">
                &nbsp;
                <button class="btn btn-md btn-primary">Search</button>
              </div>
              <hr>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered ">
			<thead>
				<tr>
					<th>Date</th>
					<th>Farm</th>
					<th>Amount</th>
					<th>Expenses</th>
					<th>Total</th>
					<th>Transaction</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>10/11/2019</td>
					<td>ROA</td>
					<td>10,000.00</td>
					<td>2,300.00</td>
					<td>12,300.00</td>
					<td>1</td>
				</tr>
				<tr>
					<td>10/11/2019</td>
					<td>JUX</td>
					<td>11,000.00</td>
					<td>4,300.00</td>
					<td>15,300.00</td>
					<td>1</td>
				</tr>
			</tbody>
			
		</table>
	</div>
</div>
	<div class="row">
	<div class="col-sm-6">

		
		<label><STRONG>Date: </STRONG></label>
		<label>10/11/2019</label>
		
		<div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="ROA FARM" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="" name="farm" value="10,000.00" disabled="">
                &nbsp;
              
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Expenses" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="" name="farm" value="2,300.00" disabled="">
                &nbsp;
               
        </div>

        <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="JUX FARM" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="" name="farm" value="11,000.00" disabled="">
                &nbsp;
               
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Expenses" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="" name="farm" value="4,300.00" disabled="">
                &nbsp;
               
        </div>
        
        <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="TOTAL CAPITAL" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="" name="farm" value="27,600.00" disabled="">
                &nbsp;               
        </div>
		<hr width="78%" align="left">
		<div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="REMITANCE" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="" name="farm" value="11,000.00" disabled="">
                &nbsp;
               
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Bali" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="" name="farm" value="4,300.00" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Collectibles" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="" name="farm" value="4,300.00" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Feeds" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Enter Feeds" name="farm" value="" >
                &nbsp;
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Salin" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="Enter Salin" name="farm" value="" >

                </div>
         <div class="form-group form-inline">
                <input class="form-control" type="text" placeholder="Farm" name="farm" value="Total Net" disabled="">
                &nbsp;
                <input class="form-control" type="text" placeholder="" name="farm" value="" disabled="" >
               
        </div>




	</div>

	<div class="col-sm-6">
		<b><strong>STOCK</strong></b>
		
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>Date</th>
				<th>Farm</th>
				<th>Heads</th>
				<th>Kilos</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>10/11/2019</td>
				<td>ROA</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>10/11/2019</td>
				<td>JUX</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">Total</td>
				
				<td></td>
				<td></td>
			</tr>
		</tbody>
		</table>

	</div>
</div>
</div>

<?php include_once('footer.php'); ?>