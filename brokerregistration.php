<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home</title>
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
              <a class="nav-link" href="#">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Broker</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">User</a>
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
        <h2>Broker Register</h2>
      </div>

      <form method="post" action="brokerlogin.php">
        <div class="input-group">
          <label>Username</label>
          <input type="text" name="username" value="" />
        </div>
        <div class="input-group">
          <label>Email</label>
          <input type="email" name="email" value="" />
        </div>
		<div class="input-group">
          <label>Contact No.</label>
          <input type="tel" name="contactno" value="" />
        </div>
        <div class="input-group">
          <label>Password</label>
          <input type="password" name="password_1" />
        </div>
        <div class="input-group">
          <label>Confirm password</label>
          <input type="password" name="password_2" />
        </div>
        <div class="input-group">
          <button type="submit" class="btn" name="reg_broker">Register</button>
        </div>
        <p>Already a member? <a href="brokerlogin.php">Sign in</a></p>
      </form>
    </div>
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
      <div class="container text-center">
        <small>Copyright &copy; Your Website</small>
      </div>
    </footer>
  </body>
</html>