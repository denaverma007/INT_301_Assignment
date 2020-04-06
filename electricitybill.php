<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Electricity Bill Calculator</title>

		<!-- Bootstrap CSS -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>
<?php
$result_str = $result = '';
if (isset($_POST['unit-submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $result_str = 'Total amount of bill for ' . $units .'units  - ' . $result . 'Rs';
    }
}
/**
 * To calculate electricity bill as per unit cost
 */
function calculate_bill($units) {
    $unit_cost_first = 9.00;
    $unit_cost_second = 12.00;
    $unit_cost_third = 15.00;
   

    if($units <= 50) {
        $bill = $units * $unit_cost_first;
    }
    else if($units > 50 && $units <= 100) {
        $temp = 50 * $unit_cost_first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    }
    else 
    {
      $temp = (50 * 9.00) + (50 * $unit_cost_second);
        $remaining_units = $units - 100;
        $bill = $temp + ($remaining_units * $unit_cost_third);  
    }
    return number_format((float)$bill, 2, '.', '');
}

?>

<body>
	


<div class="container">


 
	<div id="page-wrap">     
    
		
		<form action="" method="post" id="quiz-form">            
            	<!-- <input type="number" name="units" id="units" placeholder="Please enter no. of Units" />             -->
                <div class="container">
		      <h1>Electricity Bill Calculator</h1>
		               <form action="" method="POST" role="form">
		                    <div class="row">
			                 <div class="col-lg-6">
				             <div class="form-group">
					         <label for="">Total Unit / Kwh</label>
					    <input type="text" class="form-control" name="units" placeholder="Input total Unit">
				</div>
			</div>



            
			<div class="col-lg-6">
				<div class="form-group">
					<label for="">Connection Type</label>
					<select class="form-control" name="meter">
						<option value="0">Commerical</option>
						<option value="0">Household</option>
					</select>
				</div>
			</div>

            <div class="col-lg-6">
			<input type="submit" class="btn btn-primary" name="unit-submit" id="unit-submit" value="Submit" />	
			</div>
            	

            <div class="col-lg-6">
			<input type="submit" class="btn btn-primary" name="unit-submit" id="unit-submit" value="Pay" />	
			</div>
            	
            <!-- <?php

            echo "<h3> $result_str </h3>";
            ?> -->

		</form>
		<div>
        
     
      

            <div>
            <?php
			echo "<table class=\"table table-hover\">
			<thead>
				<tr>
					<th>Range</th>
					<th>Price/Unit</th>
				
					
				</tr>
			</thead>
			<tbody>
				
            <tr>
          <td>0-50</td>
          <td>9Rs/unit</td>
          
        
            </tr>
            <tr>
            <td>50-100</td>
            <td>12Rs/unit</td>
            
              </tr>
              </tr>
              <tr>
              <td>100 and above</td>
              <td>15Rs/unit</td>
 
                </tr>
            </tbody>
			<tfoot>
				<tr>
					<th></th>
					<th></th>
					<th>Bill</th>
					<th> $result_str </th>
				</tr>
            ";
			?>
		</div>	
	</div>
</body>
</html>