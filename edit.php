<?php
include("db.php");
$sid=$_REQUEST["sid"];
$qry=mysqli_query($con,"select * from student where sid='$sid'");
$row=mysqli_fetch_array($qry);
extract($row);

?>
<form id="updateForm">
	<input type="hidden" name="sid" id="e_id" value="<?php echo $sid; ?>">
	<div class="form-group">
		<label>Name : </label>
		<input type="text" name="name" class="form-control" value="<?php echo $name ?>">
	</div>
	<div class="form-group">
		<label>Email : </label>
		<input type="text" name="email" class="form-control" value="<?php echo $email ?>">
	</div>
	<div class="form-group">
		<label>Mobile : </label>
		<input type="text" name="mobile" class="form-control" value="<?php echo $mobile ?>">
	</div>
	<div class="form-group">
		<label>Country : </label>
		<select name="country" id="e_country" class="form-control">
			<?php
			$qry1=mysqli_query($con,"select * from country");
			while($countryrow=mysqli_fetch_array($qry1))
			{
			?>
			<option value="<?php echo $countryrow['id'] ?>"
				<?php
				if($row["country"]==$countryrow['id'])
				{
					echo "selected";
				}
				?>
			><?php echo $countryrow["country_name"]; ?></option>
			<?php
			}
			?>
		</select>
	</div>

	<div class="form-group">
		<label>State : </label>
		<select name="state" id="e_state" class="form-control">
			<?php
			$qry2=mysqli_query($con,"select * from state");
			while($staterow=mysqli_fetch_array($qry2))
			{
			?>
			<option value="<?php echo $staterow['id'] ?>"
				<?php
				if($row["state"]==$staterow['id'])
				{
					echo "selected";
				}
				?>
			><?php echo $staterow["state_name"]; ?></option>
			<?php
			}
			?>
		</select>
	</div>

	<div class="form-group">
		<label>City : </label>
		<select name="city" id="e_city" class="form-control">
			<?php
			$qry3=mysqli_query($con,"select * from city");
			while($cityrow=mysqli_fetch_array($qry3))
			{
			?>
			<option value="<?php echo $cityrow['id'] ?>"
				<?php
				if($row["city"]==$cityrow['id'])
				{
					echo "selected";
				}
				?>
			><?php echo $cityrow["city_name"]; ?></option>
			<?php
			}
			?>
		</select>
	</div>

	<input type="submit" value="update" class="btn btn-success">
</form>
<!-- <script type="text/javascript" src="jquery.min.js"></script> -->
<!-- <script>
	$(document).ready(function(){
		//for state display in insert form state
		$("#country").change(function(){
			var country_id=$("#country").val();
			// console.log(country_id);
			alert("working");
		});
	});
</script> -->