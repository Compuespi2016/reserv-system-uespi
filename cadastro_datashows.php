<?
$marca = $_POST['marca'];
$entercabo = $_POST['entercabo'];
$lumens = $_POST['lumens'];
include('conexao.php');
        	   
  $insert = mysqli_query($con,"INSERT INTO data_shows(marca,entrada_de_cabo,lumens) VALUES('$marca','$entercabo','$lumens')");
  if($insert){
    echo"<script language='javascript' type='text/javascript'>alert('Datashow cadastrado com sucesso! ');window.location.href='data_shows.html.php'</script>";
  
  }else{
  	echo"<script language='javascript' type='text/javascript'>alert('Cadastro invalido!');window.location.href='data_shows.html.php'</script>";
  }