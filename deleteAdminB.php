<?php
session_start();

$con = mysqli_connect('localhost','root');

mysqli_select_db($con,'clproject');

$id=$_GET['id'];

$q="DELETE FROM broker WHERE id = $id";
mysqli_query($con,$q);
header('location:afterAdminLogin.php');
?>