<?php
session_start();
$tname="room";
$con= mysqli_connect("localhost","root","","clproject");
if(isset($_REQUEST['submit']))
{
	$id=$_POST['id'];
	$roomtype=$_POST['roomtype']; 
	$location=$_POST['location'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	
	$q="UPDATE $tname SET roomtype=$roomtype, location=$location, price=$price, quantity=$quantity WHERE id=$id";
    $query=mysqli_query($con,$q);
	
		if($query)
		{
			?>
			<script>
				alert("UPDATION Sucessfully Done.");
			</script>
			<?php
		}
		else
		{
			?>
			<script>
				alert("Query Not Proceed ".concay(<?php $id ?>));
			</script>
			<?php
		}

}

?>



