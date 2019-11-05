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
<html lang="en">
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
    <div class="container">
      <h1 class="text-center text-white bg-dark">
        AVAILABLE ROOMS
      </h1>
	  
   <div class="float-md-right ">
		<a href="logout.php" class="btn btn-info btn-lg">Logout</a>
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
	
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover text-center">
        <thead class="bg-dark text-white">
          <th>Id</th>
          <th>ROOMTYPE</th>
          <th>LOCATION</th>
		  <th>PRICE</th>
		  <th>QUANTITY</th>
		  <th>IMAGE</th>
		  <th>BOOK</th>
		  
          <tbody>
            <?php
			$tname="room";
            $con= mysqli_connect('localhost','root','')or die("could not connect to mysql");
            mysqli_select_db($con,'clproject');
			echo "<br>";
                          
                $displayquery="select * from $tname";
                $querydisplay=mysqli_query($con,$displayquery);
				$i=null;
               while($result = mysqli_fetch_array($querydisplay))
			   {
				   

                  ?>
                    <tr >
					  <td><?php echo $result['id']; ?></td>
                      <td><?php echo $result['roomtype']; ?></td>
                      <td><?php echo $result['location']; ?></td>
					  <td><?php echo $result['price']; ?></td>
					  <td><?php echo $result['quantity']; ?></td>
                      <td><img src="<?php echo $result['image']; ?>" height="200px" width="300px"></td>
					  <td> 
							<form action="" method="POST" enctype="multipart/form-data">
							<button class="btn btn-primary" name="book"  type="submit" ><a href="update.php? id=<?php echo $result['id']; ?>" class="text-white">BOOK</button>
							</form>
					</td>
                    </tr>
				 <?php
                }
           
            ?>
          </tbody>
        </thead>
      </table>
    </div>
    </div>
  </body>
</html>

<?php

/*if(isset($_POST['submit']))
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
	}*/
?>
