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
      </div>
		
	
    </div>
    <div class="container mb-5">
      <div class="header">
        <h2>Insert Room Details</h2>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-group">
          <label>RoomType :</label>
          <select name="roomtype" class="form-control">
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
          <input type="text" name="location" value="" class="form-control" />
        </div>
        <div class="input-group">
          <label>Price :</label>
          <input type="text" name="price" value="" class="form-control" />
        </div>
        <div class="input-group">
          <label>Quantity :</label>
          <input type="number" name="quantity" class="form-control" />
        </div>

        <div class="form-group">
          <label for="file">Image :</label>
          <input type="file" name="file" id="file" class="form-control" />
        </div>
        <input
          type="submit"
          name="submit"
          value="Submit"
          class="btn btn-success"
        />
      </form>
    </div>
	
	
	
  </body>
</html>

<?php
$tname="room";
$con= mysqli_connect("localhost","root","","clproject");
 if(isset($_POST['submit']))
 {
	
	$brokerusername=$_SESSION["brokerloginusername"];
	 
	$roomtype=$_POST['roomtype']; 
	$location=$_POST['location'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
    $files=$_FILES['file'];
	
    $filename= $files['name'];
       
    $filetemp=$files['tmp_name'];
  
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));

    $fileextstored=array('png','jpeg','jpg');

    if(in_array($filecheck,$fileextstored))
	{
		$destinationfile= 'upload/'.$filename;
        move_uploaded_file($filetemp,$destinationfile);
        $q="INSERT INTO $tname (roomtype,location,price,quantity,image,username) VALUES ('$roomtype','$location','$price','$quantity','$destinationfile','$brokerusername')";
        $query=mysqli_query($con,$q);
		if($query)
		{
			?>
<script>
  alert("Insertion Sucessfully Done.");
</script>




	<!--
	TO DISPLAY DATA
	-->
	
	
	
	<div class="table-responsive">
      <table class="table table-bordered table-striped table-hover text-center">
        <thead class="bg-dark text-white">
          <!--<th>Id</th>-->
          <th>ROOMTYPE</th>
          <th>LOCATION</th>
		  <th>PRICE</th>
		  <th>QUANTITY</th>
		  <th>IMAGE</th>
		 <!-- <th>BOOK</th> -->
		  
          <tbody>
            <?php
			$tname="room";
            $con= mysqli_connect('localhost','root','')or die("could not connect to mysql");
            mysqli_select_db($con,'clproject');
			echo "<br>";
                          
                $displayquery="select * from $tname where username='$brokerusername'";
                $querydisplay=mysqli_query($con,$displayquery);
				$i=null;
               while($result = mysqli_fetch_array($querydisplay))
			   {
				   

                  ?>
                    <tr >
					
                      <td><?php echo $result['roomtype']; ?></td>
                      <td><?php echo $result['location']; ?></td>
					  <td><?php echo $result['price']; ?></td>
					  <td><?php echo $result['quantity']; ?></td>
                      <td><img src="<?php echo $result['image']; ?>" height="200px" width="300px"></td>
									
                    </tr>
				 <?php
                }
           
            ?>
          </tbody>
        </thead>
      </table>
    </div>
	









<?php
		}
		else
		{
			?>
<script>
  alert("Query Not Proceed");
</script>
<?php
		}

	}
	else
	{
		?>
<script>
  alert("Extension does not matched");
</script>
<?php
    }
 }
?>
