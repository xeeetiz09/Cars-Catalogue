<!-- form heading is set according to condition... -->
<h2><?php echo $head; ?></h2>

<!-- form to add cars -->
<form method="POST" enctype="multipart/form-data">

<!-- input field for car's name, if the car's id is provided, the car's name is displayed in the text field -->
	<label>Car Model</label><input type="text" name="car_name" <?php if (isset($_GET['id'])){echo 'value = "'.$car['car_name'].'"'; } ?> required/>

	<!-- input field for car's description, if the car's id is provided, the car's description is displayed in the text field -->
	<label>Description</label><textarea name="description" style = "width: 50%;" required><?php if (isset($_GET['id'])){echo $car['description']; } ?></textarea>

	<!-- input field for car's price, if the car's id is provided, the car's price is displayed in the text field -->
	<label>Price</label><span style = "float: left; margin: 30px 0 0 -20px;">£</span><input type="text" style = "width: 28%;" <?php if (isset($_GET['id'])){echo 'value = "'.$car['prev_price'].'"'; } ?> name="price" required/>

	<!-- input field for car's mileage, if the car's id is provided, the car's mileage is displayed in the text field -->
	<label>Mileage</label><input type="text" style = "width: 28%;" <?php if (isset($_GET['id'])){echo 'value = "'.$car['mileage'].'"'; } ?> required name="mileage" /> <span style = "float: left; margin: 30px 0 0 10px;">Miles per litre </span>
	
	<label>Engine Type</label>
	<!-- select between engine type of a car... -->
	<select name = "en_type" required>
		<option value = "Petrol">Petrol</option>
		<option value = "Diesel">Diesel</option>
	</select>
	<label>Category</label>

	<!-- for selecting manufacturer's name,... -->
	<select name="manufacturerId" required>
		<option disabled selected>Choose</option>
		<?php
		$stmt = $allQueries->selectAll($pdo, 'manufacturers');
		foreach ($stmt as $row) {

			//  if the car's id is provided, the car's manufacturer's name is selected
            if (isset($_GET['id'])){
                if ($car['manufacturerId'] == $row['id']) {
                    echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
                else{
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
            }
            else {
    		    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
			}
			?>
	</select>

	<!-- submit button for inserting car's details to database table... -->
	<input type="submit" name="submit" value="Next" />
</form>