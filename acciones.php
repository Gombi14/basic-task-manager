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


function post($title,$content,$status){
  $conn=conn_mysql();

  $sql="INSERT INTO task(title, content, status) VALUES ('$title','$content','$status')";

  if(mysqli_query($conn,$sql)){
    echo"Se han insertado los datos correctamente.\n";
  }else{
    echo'error'.$sql."\n".mysqli_error($conn);
  }

  mysqli_close($conn);

}

function update($id, $title, $content, $status) {
  $conn = conn_mysql();

  //evita los caracteres especiales para que no haya errores
  $id = mysqli_real_escape_string($conn, $id);
  $title = mysqli_real_escape_string($conn, $title);
  $content = mysqli_real_escape_string($conn, $content);
  $status = mysqli_real_escape_string($conn, $status);

  $sql = "UPDATE task SET title='$title', content='$content', status='$status' WHERE id='$id'";

  if (mysqli_query($conn, $sql)) {
    echo "Actualizado correctamente\n";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}


function delete_data($id){
$conn=conn_mysql();

  $sql="DELETE FROM task WHERE id = $id";

  $result=mysqli_query($conn,$sql);

  if($result){
    echo"Se ha elinado la tarea correctamente\n";
  }else{
    echo"error\n".mysqli_error($conn);  
  }
    mysqli_close($conn);
    
}


function list_table(){
  $conn = conn_mysql();

  // Query para seleccionar todas las tareas
  $sql = "SELECT * FROM task";
  $result = mysqli_query($conn, $sql);

  // Verificar si hay resultados y mostrarlos
  if (mysqli_num_rows($result) > 0) {
    echo "|ID | Title | Content | Status\n";
    //$row es como una especie de diccionario con sus identificadores en este caso id title content y status
    while($row = mysqli_fetch_assoc($result)) {
      echo "| ". $row["id"] . " | " . $row["title"] ." | ". $row["content"] . " | " . $row["status"] . " | ". "\n";
    }
  } else {
      echo "No se encontraron tareas.\n";
  }

  // Cerrar conexión
  mysqli_close($conn);
}
