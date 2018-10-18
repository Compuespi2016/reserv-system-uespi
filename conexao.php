<?php
$con = new MySQLi('localhost', 'root', '', 'banco-de-dados-S2');
if($con->connect_error){
   //echo "Desconectado! Erro: " . $con->connect_error;
}else{
   //echo "Conectado!"."<br>";
}



?>
