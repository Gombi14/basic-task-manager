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
    die( "Connection failed: " . mysqli_connect_error() );
  }else{
    return $conn;
    }
}



function escli(){
  if(php_sapi_name()!="cli"){
    die("Este programa solo se puede ejecutar desde CLI");
  }
}



function show_help(){
    echo("La syntaxis es:");
    echo("Post: php FILENAME.php post 'title' 'content' 'status'");
    echo("Update: php FILENAME.php update 'id' 'title' 'content' 'status'");
    echo("Delete: php FILENAME.php delete 'id'");
    echo("List: php FILENAME.php list");
    echo("Help: php FILENAME.php help");
}


function post(){
    conn_mysql();

}


function update(){
    conn_mysql();

}


function delete_data(){
    conn_mysql();

}


function list_table(){
    $conn = conn_mysql();
echo 'dedede';die();
    $sql='SELECT * FROM task';

    $result=$conn->query($sql);

    print_r($result);
}

