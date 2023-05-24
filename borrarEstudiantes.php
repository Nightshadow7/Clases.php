<?php

require_once("config.php");

$record = new Config();

if(isset($_GET['id']) and isset($_GET['req'])){
  if ($_GET['req'] == "delete"){
    $record-> setId($_GET['id']);
    $record->delete();
    echo "
    <script> alert('Dato borrado satisfactoriamente');
    document.location='estudiantes.php'
    </script>";
  };
};