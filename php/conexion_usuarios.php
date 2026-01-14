<?php

$conexion = mysqli_connect("localhost","root","","login_register");
if($conexion){
    echo "conectado con exito ";
    }else{
       echo "No se conecto";
}







?>