<?php
session_start();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Online House Rental System</title>
    <link rel="stylesheet" href="style.css" />
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
    <div class="mt-5">
      <div class="container">
        <h1 class="font-weight-light text-center">
          Online House Rental System
        </h1>
		<!--<div class="float-md-right ">
		<a href="logout.php" class="btn btn-info btn-lg">Logout</a>
	
	if(isset($_SESSION['id']))
	{}
	else
	{
		session_unset(); 
		session_destroy();
		header("Location:index.php");
	}
	</div>-->
      </div>
	

	
    </div>
    </body>
</html>



<?php
$tname="room";
$con= mysqli_connect("localhost","root","","clproject");
	
	$q="SELECT * FROM $tname";
	$query=mysqli_query($con,$q);
	
	if($query)
	{
	?>
		<script>
			alert("Database Sucessfully Fetched.");
		</script>
	<?php
	}
	 
	 $count=mysqli_num_rows($query);
	
	?>
	<form  method="POST" enctype="multipart/form-data">
	<?php
	while($rows = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	?>
		<div class="input-group">
          <label>ID :</label>
          <input type="number" name="id"  class="form-control"  value="<?php echo $rows['id']; ?>" />
        </div>
       
		<div class="input-group">
		 <label>RoomType :</label>
          <select name="roomtype" class="form-control" value="<?php echo $rows['roomtype']; ?>">
            <option value="single">Single</option>
            <option value="double">Double</option>
            <option value="triple">Triple</option>
            <option value="quad">Quad</option>
            <option value="queen">Queen</option>
            <option value="king">King</option>
            <option value="twin">Twin</option>
            <option value="doubledouble">Double-double</option>
            <option value="studio">Studio</option>
          </select>
        </div>
        <div class="input-group">
          <label>Location :</label>
          <input type="text" name="location"  class="form-control" value="<?php echo $rows['location']; ?>"/>
        </div>
        <div class="input-group">
          <label>Price :</label>
          <input type="text" name="price" class="form-control" value="<?php echo $rows['price']; ?>"/>
		  
        </div>
        <div class="input-group">
          <label>Quantity :</label>
          <input type="number" name="quantity" class="form-control" value="<?php echo $rows['quantity']; ?>"/>
        </div>
	
        <input
          type="submit"
          name="submit"
          value="Submit"
          class="btn btn-success"
		  
		  />
        

	<?php
	}
	 
	/*if(array_key_exists('submit',$_POST))
	{
		testfun();
	}*/
	
	?>
	</form>