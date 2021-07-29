<?php
include("db.php");
$state_id=$_REQUEST["state_id"];
$qry=mysqli_query($con,"select * from city where state_id='$state_id'");
while($row=mysqli_fetch_array($qry))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["city_name"]; ?></option>
<?php
}
?>