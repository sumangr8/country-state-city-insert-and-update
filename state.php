<?php
include("db.php");
$country_id=$_REQUEST["country_id"];
$qry=mysqli_query($con,"select * from state where country_id='$country_id'");
while($row=mysqli_fetch_array($qry))
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["state_name"]; ?></option>
<?php
}
?>