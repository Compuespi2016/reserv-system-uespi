<?php

$id_setor = $_POST['setor'];

$numero_sala_no_setor = $_POST['numero_sala_no_setor'];

$tipo_de_sala = $_POST['tipo_de_sala'];

$capacidade =$_POST['capacidade'];

$ar_condicionado=$_POST['ar_condicionado'];

$projetor=$_POST['projetor'];

include('conexao.php');
        	   
  $insert = mysqli_query($con,"INSERT INTO salas(setor,numero_sala_no_setor,tipo_de_sala,capacidade,ar_condicionado,projetor) VALUES($id_setor ,$numero_sala_no_setor,$tipo_de_sala,$capacidade,$ar_condicionado,$projetor)"); 

  if($insert){

    echo"<script language='javascript' type='text/javascript'>alert('Sala cadastrada com sucesso!');window.location.href='sala.html.php'</script>";
  
  }else{

  	echo"<script language='javascript' type='text/javascript'>alert('Cadastro invalido!');window.location.href='sala.html.php'</script>";

  }
