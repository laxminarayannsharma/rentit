<?php
session_start();
?>
<html>
  <head>
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">

	  <div class="col-lg-12">
        <br /><br />
        <h1 class="text-center text-warning">Display Table Data</h1>
		<div class="float-md-right ">
		<a href="logout.php" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-log-out"></span>Logout</a>
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
	 
        <br />
        <table class="table table-striped table-hover table-bordered text-center">
          <tr class="bg-dark text-white">
			<th>T NAME</th>
            <th>ID</th>
            <th>USERNAME</th>
			<th>PASSWORD</th>
            <th>EMAIL</th>
            <th>DELETE</th>
            <!--<th>UPDATE</th>-->
          </tr>
          <?php
          
			$con = mysqli_connect('localhost','root');

			mysqli_select_db($con,'clproject');

          
            $q = "select * from user";
          
            $query = mysqli_query($con,$q);
            while($res=mysqli_fetch_array($query))
			{
           
          ?>
          <tr>
		    <td><?php echo "USER" ?></td>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['username']; ?></td>
			<td><?php echo $res['password']; ?></td>
            <td><?php echo $res['email']; ?></td>
            <td><button class="btn-danger btn"><a href="deleteAdminU.php?id=<?php echo $res['id']; ?>" class="text-white">Delete</a></button></td>
            <!--<td><button class="btn-primary btn"><a href="updateAdmin.php?id=<?php echo $res['id']; ?>" class="text-white">Update</a></button></td>-->
          </tr>
          <?php
        }
          ?>
        </table>
		
		<br/>
		
		 <table class="table table-striped table-hover table-bordered text-center">
          <tr class="bg-dark text-white">
			<th>T NAME</th>
            <th>ID</th>
            <th>USERNAME</th>
			<th>PASSWORD</th>
            <th>EMAIL</th>
            <th>DELETE</th>
            <!--<th>UPDATE</th>-->
          </tr>
          <?php
          
		    $qq = "select * from broker";
          
            $queryq = mysqli_query($con,$qq);
            while($res=mysqli_fetch_array($queryq))
			{
           
          ?>
          <tr>
		    <td><?php echo "BROKER" ?></td>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['username']; ?></td>
			<td><?php echo $res['password']; ?></td>
            <td><?php echo $res['email']; ?></td>
            <td><button class="btn-danger btn"><a href="deleteAdminB.php?id=<?php echo $res['id']; ?>" class="text-white">Delete</a></button></td>
            <!--<td><button class="btn-primary btn"><a href="updateAdmin.php?id=<?php echo $res['id']; ?>" class="text-white">Update</a></button></td>-->
          </tr>
          <?php
        }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>
