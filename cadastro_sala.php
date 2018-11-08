<?php
include('conexao.php');	
$aba = mysqli_query($con,"SELECT * FROM salas");
if(mysqli_num_rows($aba) == 0){
	
	$var = mysqli_num_rows($aba)+1;
	
}else{

	$var = mysqli_num_rows($aba)+1;
}


$id = $var;

$id_setor = $_POST['setor'];

$numero_sala_no_setor = $_POST['num_sala'];

$tipo_de_sala = $_POST['tipo_de_sala'];

$capacidade = $_POST['capacidade'];

$ar_condicionado = $_POST['ar_condicionado'];

$projetor = $_POST['projetor'];

        	   
$insert = mysqli_query($con,"INSERT INTO salas(id,setor,numero_sala_no_setor,tipo_de_sala,capacidade,ar_condicionado,projetor) VALUES($id,$id_setor,$numero_sala_no_setor,$tipo_de_sala,$capacidade,$ar_condicionado,$projetor)"); 

if($insert){

echo"<script language='javascript' type='text/javascript'>alert('Sala cadastrada com sucesso!');window.location.href='sala.html.php'</script>";

}else{

	echo"<script language='javascript' type='text/javascript'>alert('Cadastro invalido!');window.location.href='sala.html.php'</script>";

}
