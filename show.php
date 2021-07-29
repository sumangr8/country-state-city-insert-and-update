<?php
include("db.php");
$i=1;
$qry=mysqli_query($con,"select * from student left join country on student.country=country.id left join state on student.state=state.id left join city on student.city=city.id");
while($row=mysqli_fetch_array($qry))
{
?>
<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $row["name"]; ?></td>
	<td><?php echo $row["email"]; ?></td>
	<td><?php echo $row["mobile"]; ?></td>
	<td><?php echo $row["country_name"]; ?></td>
	<td><?php echo $row["state_name"]; ?></td>
	<td><?php echo $row["city_name"]; ?></td>
	<td><button class="btn btn-info" id="edit" data-eid="<?php echo $row['sid'] ?>">Edit</button></td>
</tr>
<?php
$i++;
}
?>