<?php
$con = new MySQLi('localhost', 'root', '', 'reserv-system-uespi');
if($con->connect_error){
   //echo "Desconectado! Erro: " . $con->connect_error;
}else{
   //echo "Conectado!"."<br>";
}



?>
