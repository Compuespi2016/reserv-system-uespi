<?
include('conexao.php');
        	   
  $insert = mysqli_query($con,"INSERT INTO setor VALUES()"); 

  if($insert){

    echo"<script language='javascript' type='text/javascript'>alert('Setor cadastrado com sucesso!');window.location.href='cadastro_setor.html.php'</script>";
  
  }