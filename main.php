<?php

require "tm_connexion.php";

//ejecutas las funciones que del archivo tm_connexion.php
escli();



//declarar las constantes
const ACTION1 = 'save';
const ACTION2 = 'update';
const ACTION3 = 'delete';
const ACTION4 = 'list';

//action es igual al primer argumento en minusculas
$action=strtolower($argv[1]);

switch($action){
  case(ACTION1){
    if($argv>6){
      show_help();
    }
  }
}