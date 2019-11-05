<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Broker</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Rent It</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"
                >Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminlogin.php">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="brokerlogin.php">Broker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">User</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-ride="carousel"
      >
        <ol class="carousel-indicators">
          <li
            data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div
            class="carousel-item active"
            style="background-image: url('https://source.unsplash.com/RCAhiGJsUUE/1920x1080')"
          >
            <div class="carousel-caption d-none d-md-block">
              <h3 class="display-4">First Slide</h3>
              <p class="lead">This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div
            class="carousel-item"
            style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1920x1080')"
          >
            <div class="carousel-caption d-none d-md-block">
              <h3 class="display-4">Second Slide</h3>
              <p class="lead">This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div
            class="carousel-item"
            style="background-image: url('https://source.unsplash.com/O7fzqFEfLlo/1920x1080')"
          >
            <div class="carousel-caption d-none d-md-block">
              <h3 class="display-4">Third Slide</h3>
              <p class="lead">This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="py-5">
      <div class="container">
        <h1 class="font-weight-light text-center">
          Online House Rental System
        </h1>
      </div>
    </div>
    <div class="container mb-5">
      <div class="header">
        <h2>Broker Login</h2>
      </div>
      <form method="post" action="brokerlogin.php">
        <div class="input-group">
          <label>Username</label>
          <input type="text" name="username" />
        </div>
        <div class="input-group">
          <label>Password</label>
          <input type="password" name="password" />
        </div>
        <div class="input-group">
          <button type="submit" class="btn" name="login_broker">Login</button>
        </div>
        <p>Not yet a member? <a href="brokerregistration.php">Sign up</a></p>
      </form>
    </div>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
      <div class="container text-center">
        <small>Copyright &copy; Your Website</small>
      </div>
    </footer>
  </body>
</html>

<?php
	
	$tname="broker";
	$connection = mysqli_connect("localhost", "root", "","clproject"); // Establishing Connection with Server
	$db = mysqli_select_db($connection,$tname); // Selecting Database from Server
	if(isset($_POST['reg_broker'])) // Fetching variables of the form which travels in URL
	{	
		$username = $_POST['username'];
		$email = $_POST['email'];
		$contactno=$_POST['contactno'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
		
		if($username!=null || $email!=null || $contactno!=null || $password_1!=null || $password_2!=null)
		{
			if($password_1==$password_2)
			{
				$query = "insert into $tname (username,email,contactno,password,confirmpassword) values ('$username','$email','$contactno','$password_1','$password_2')";  //Insert Query of SQL	
				if (mysqli_query($connection, $query)) 
				{
					?>
					<script>
						alert("You Are Sucessfully Registred");
					</script>
					<?php
				}
				else 
				{
					?>
					<script>
						alert("Error: " .concat( $query ," " , <?php mysqli_error($connection)?>));
					</script>
					<?php
				}
			}
			else
			{
				?>
				<script>
					alert("Password And Confirm Password Not Match");
				</script>
				<?php
			}
		}
		else
		{
			?>
			<script>
				alert("Please Enter All Fields");
			</script>
			<?php
		}
	}	
	
	if(isset($_POST['login_broker']))
	{
	
		$usernamelogin = $_POST['username'];
		$passwordlogin = $_POST['password'];
		//$tname="broker";
		
		if(count($_POST)>0) 
		{
			$_SESSION["brokerloginusername"] = $usernamelogin;
			$con = mysqli_connect("localhost",'root','','clproject');
			$result = mysqli_query($con,"SELECT * FROM $tname WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
			$row  = mysqli_fetch_array($result);
			if(is_array($row)) 
			{
				$_SESSION["id"] = $row['id'];
				$_SESSION["username"] = $row['username'];
				echo "<script> window.location.assign('afterBrokerLogin.php'); </script>";
			} 
			else 
			{
				?>
				<script>
					alert("Invalid Username or Password!");
				</script>
				<?php
			}
		}		
	}
	
?>
