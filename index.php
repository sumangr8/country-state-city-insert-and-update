<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="custom.css">
	<script type="text/javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="popper.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<!-- insert form start -->
			<div class="col-xl-4">
				<form id="insertForm">
					<div class="form-group">
						<label>Name : </label>
						<input type="text" name="name" class="form-control" id="name">
					</div>
					<div class="form-group">
						<label>Email : </label>
						<input type="text" name="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label>Password : </label>
						<input type="password" name="password" class="form-control" id="password">
					</div>
					<div class="form-group">
						<label>Mobile : </label>
						<input type="text" name="mobile" class="form-control" id="mobile">
					</div>
					<div class="form-group">
						<label>Country : </label>
						<select name="country" id="country" class="form-control">
							<option>Any Select</option>
							<?php
							$qry=mysqli_query($con,"select * from country");
							while($country=mysqli_fetch_array($qry))
							{
							?>
							<option value="<?php echo $country['id'] ?>"><?php echo $country["country_name"]; ?></option>
							<?php
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label>State : </label>
						<select name="state" id="state" class="form-control">
							<option>Any Select</option>
						</select>
					</div>

					<div class="form-group">
						<label>City : </label>
						<select name="city" id="city" class="form-control">
							<option>Any Select</option>
						</select>
					</div>
					<input type="submit" class="btn btn-success">
						
				</form>
				<div id="msg" class="alert alert-success" style="display:none;"></div>
			</div>
			<!-- insert form end -->

			<!-- data dispaly start -->
			<div class="col-xl-8">
				<table class="table table-striped" id="show">
					<tbody>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Country</th>
							<th>State</th>
							<th>City</th>
							<th>Action</th>
						</tr>
					</tbody>
					<tbody>
						
					</tbody>
				</table>
			</div>
			<!-- data dispaly end -->
		</div>
	</div>

	<!-- for edit model start -->
	<div id="modal">
		<div id="modal-form">
			<h2>Edit Form..</h2>
		</div>
	</div>
	<!-- for edit model end -->
<script type="text/javascript" src="jquery.min.js"></script>
<script>
	$(document).ready(function(){

		//for state display in insert form state
		$("#country").change(function(){
			var country_id=$("#country").val();
			$.ajax({
				url : 'state.php',
				type:'GET',
				data:{country_id:country_id},
				success:function(data)
				{
					$("#state").append(data);
					// console.log(data);
				}
			});
		});
		//for state display in insert form end


		//for city display in insert form state
		$("#state").change(function(){
			var state_id=$("#state").val();
			$.ajax({
				url :'city.php',
				type: 'GET',
				data:{state_id:state_id},
				success:function(data)
				{
					// console.log(data);
					$("#city").append(data);
				} 
			});
		});
		//for city display in insert form end


		//start insert
		$("#insertForm").on("submit",function(e){
			e.preventDefault();
			$.ajax({
				url : 'insert.php',
				type: 'POST',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				success:function(data)
				{
					$("#insertForm").trigger('reset');
					$("#msg").show();
					$("#msg").html("Insert Success");
				},
				error:function(data)
				{
					$("#msg").show();
					$("#msg").html("Insert Faield");
				}
			});
		});
		//end insert

		// start data show
		function show()
		{
			$.ajax({
				url : 'show.php',
				type: 'GET',
				success:function(data)
				{
					// console.log(data);
					$("#show").append(data);
				}
			});
		}
		show();
		// end data show


		//start edit
		$(document).on("click","#edit",function(){
			$("#modal").show();
			var sid=$(this).attr('data-eid');
			$.ajax({
				url : 'edit.php',
				type: 'GET',
				data:{sid:sid},
				success:function(data)
				{
					// console.log(data);
					$("#modal-form").append(data);
				}
			});
		});
		// end edit


		//state for edit form
		$(document).on("change","#e_country",function(){
			var country_id=$("#e_country").val();
			$.ajax({
				url : 'state.php',
				type:'GET',
				data:{country_id:country_id},
				success:function(data)
				{
					$("#e_state").html(data);
					// console.log(data);
				}
			});
		});

		//city for edit form
		$(document).on("change","#e_state",function(){
			var state_id=$("#e_state").val();
			$.ajax({
				url : 'city.php',
				type:'GET',
				data:{state_id:state_id},
				success:function(data)
				{
					$("#e_city").html(data);
					// console.log(data);
				}
			});
		});


		//update data
		$(document).on("submit","#updateForm",function(e){
			e.preventDefault();
			$.ajax({
				url: 'update.php',
				type:'POST',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				success:function(data)
				{
					// alert("Recored update");
					// console.log(data);
					$("#modal").hide();
					
					show();
				}
			});
		});

	});
</script>
</body>
</html>