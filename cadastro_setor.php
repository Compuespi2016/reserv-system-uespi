<?
include('conexao.php');
        	   
  $insert = mysqli_query($con,"INSERT INTO setor VALUES()"); 

  if($insert){

    echo"<script language='javascript' type='text/javascript'>alert('Sensor cadastrado com sucesso!');window.location.href='pag_prefeitura.php'</script>";
  
  }