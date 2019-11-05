<?php
session_start();

	$con = mysqli_connect('localhost','root');

	mysqli_select_db($con,'clproject');
	$tname="room";
	$id=$_GET['id'];

	$q = "update $tname set quantity=quantity-1 where id=$id";
	$query = mysqli_query($con,$q);
	
	$qq="select quantity from $tname where id=$id";
	$query1=mysqli_query($con,$qq);
	
	$row=mysqli_fetch_assoc($query1);
	
	if($row['quantity']==0)
	{
		$qqq="DELETE FROM $tname WHERE id = $id";
		mysqli_query($con,$qqq);
	}

?>
<html>
 <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Main page</title>
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
<body>
<?php if($query) { ?>
	<h1 align="center">YOUR BOOKING IS CONFIRMED</h1>
		
	<div class="float-md-right">
		<a href="logout.php"> <button class="btn btn-info btn-lg"> Log out </button></a>
	<?php 
	if(isset($_SESSION['id']))
	{}
	else
	{
		session_unset(); 
		session_destroy();
		header("Location:index.php");
	}?>
	</div>
<?php }else{ ?>
	<h1 align="center">PLEASE TRY AFTER SOME TIME</h1>
	<div class="float-md-right">
		<a href="logout.php"> <button class="btn btn-info btn-lg"> Log out </button></a>
	<?php 
	if(isset($_SESSION['id']))
	{}
	else
	{
		session_unset(); 
		session_destroy();
		header("Location:index.php");
	}?>
	</div>
<?php } ?>
</body>
</html>