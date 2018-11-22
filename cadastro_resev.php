<?php


$id_matricula =$_POST['matricula'];

$dia = $_POST['dia'];

$mes = $_POST['mes'];

$ano = $_POST['ano'];

$tipo_reserva = $_POST['tipo_reserva'];

$turno =$_POST['turno'];

$id_objeto_reservado = $_POST['id_objeto_reservado'];

echo "<p>$id_matricula,$dia,$mes,$ano,$tipo_reserva,$turno,$id_objeto_reservado</p>";

include('conexao.php');
        	   
  $insert = mysqli_query($con,"INSERT INTO reservas(matricula,data_reserva,id_tipo,turno,id_objeto) VALUES('$id_matricula','TO_DATE($dia/$mes/$ano, DD/MM/YYYY)','$tipo_reserva','$turno','$id_objeto_reservado')"); 

  if($insert){

    echo"<script language='javascript' type='text/javascript'>alert('Notebook reservado com sucesso!');window.location.href='reserv_datashows.html.php'</script>";
  
  }else{

  	echo"<script language='javascript' type='text/javascript'>alert('Reserva invalida!');window.location.href='reserv_datashows.html.php'</script>";

  }
  
