<?php

require "acciones.php";

//ejecutas las funciones que del archivo tm_connexion.php
//escli();
//action es igual al primer argumento en minusculas

$action=strtolower($argv[1]);

if($argv[1]="save"){
  post();
}elseif($argv[1]="update"){
  update();
}elseif($argv[1]="delete"){
  delete_data();
}elseif($argv[1]="list"){
  list_table();
}elseif($argv[1]="help"){
  show_help();
}else{
  echo "Error no se ha encontrado la orden.";
  show_help();
}