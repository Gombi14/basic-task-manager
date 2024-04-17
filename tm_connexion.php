<?php
function conn_mysql(){
$servername = "localhost";
$username = "tmanager";
$password = "1234";
$database = "task_manager";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
}
function escli(){
  if(php_sapi_name()!="cli"){
    die("Este programa solo se puede ejecutar desde CLI");
  }
}