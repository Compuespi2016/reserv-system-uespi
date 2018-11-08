<?php
$id_matricula =$_POST['matricula'];

$id_reserv = $_POST['tipo'];

$dia = $_POST['dia'];

$mes = $_POST['mes'];

$ano = $_POST['ano'];

$turno =$_POST['turno'];

include('conexao.php');
        	   
  $insert = mysqli_query($con,"INSERT INTO reservas(matricula,data_reserva,turno,id_tipo) VALUES($id_matricula,TO_DATE('$dia/$mes/$ano', 'DD/MM/YYYY'),$turno,id_tipo)"); 

  if($insert){

    echo"<script language='javascript' type='text/javascript'>alert('Notebook reservado com sucesso!');window.location.href='-1'</script>";
  
  }else{

  	echo"<script language='javascript' type='text/javascript'>alert('Reserva invalida!');window.location.href='-1'</script>";

  }