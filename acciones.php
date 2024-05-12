<?php


function conn_mysql(){
  $servername = "localhost";
  $username = "tmanager";
  $password = "1234";
  $database = "task_manager";
  
  // Create connection
  $conn = mysqli_connect($servername, $username, $password,$database);
  
  // Check connection
  if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
  }

  return $conn;
}



function escli(){
  if(php_sapi_name()!="cli"){
    die("Este programa solo se puede ejecutar desde CLI");
  }
}



function show_help(){
    echo("La syntaxis es:\n");
    echo("Post: \tphp FILENAME.php post 'title' 'content' 'status'\n");
    echo("Update:\tphp FILENAME.php update 'id' 'title' 'content' 'status'\n");
    echo("Delete:\tphp FILENAME.php delete 'id'\n");
    echo("List: \tphp FILENAME.php list\n");
    echo("Help: \tphp FILENAME.php help\n");
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

  // Query para seleccionar todas las tareas
  $sql = "SELECT * FROM task";
  $result = mysqli_query($conn, $sql);

  // Verificar si hay resultados y mostrarlos
  if (mysqli_num_rows($result) > 0) {
    echo "|ID | Title | Content | Status\n";
    while($row = mysqli_fetch_assoc($result)) {
      echo "| ". $row["id"] . " | " . $row["title"] ." | ". $row["content"] . " | " . $row["status"] . " | ". "\n";
    }
  } else {
      echo "No se encontraron tareas.\n";
  }

  // Cerrar conexión
  mysqli_close($conn);
}

