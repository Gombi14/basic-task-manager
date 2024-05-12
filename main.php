<?php

require "acciones.php";

//ejecutas las funciones que del archivo tm_connexion.php
//escli();
//action es igual al primer argumento en minusculas

$action=strtolower($argv[1]);

if($action=="save"){
  post();
}elseif($action=="update"){
  update();
}elseif($action=="delete"){
  delete_data();
}elseif($action=="list"){
  list_table();
}elseif($action=="help"){
  show_help();
}else{
  echo "Error no se ha encontrado la orden.";
  show_help();
}