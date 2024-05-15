<?php

require "acciones.php";

escli();

//para evitar errores con mayusculas y minusculas
$action=strtolower($argv[1]);

if($action=="post"){
  if($argc!=5){
    show_help();
  }else{
    post($argv[2],$argv[3],$argv[4]);
  }
}elseif($action=="update"){
  if($argc!=6){
    show_help();
  }else{
    update($argv[2],$argv[3],$argv[4],$argv[5]);
  }
}elseif($action=="delete"){
  delete_data($argv[2]);
}elseif($action=="list"){
  list_table();
}elseif($action=="help"){
  show_help();
}else{
  echo "Error no se ha encontrado la orden.";
  show_help();
}