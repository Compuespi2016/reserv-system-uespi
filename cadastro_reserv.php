<?php

$id_user =$_POST['id_user'];

$id_matricula =$_POST['matricula'];

$data_completa = $_POST['data_completa'];

$tipo_reserva = $_POST['tipo_reserva'];

@$turno =$_POST['turno'];

$id_objeto_reservado = $_POST['id_objeto_reservado'];

$data_atual = date('Y-m-d');

if($data_atual > $data_completa || $turno == NULL){
  if($id_user == 5){
          echo"<script language='javascript' type='text/javascript'>alert('Data de reserva/turno invalido!');window.location.href='pag_proreitoria.html.php'</script>";
        }elseif (id_user == 2) {
           echo"<script language='javascript' type='text/javascript'>alert('Data de reserva/turno invalido!');window.location.href='pag_professor.html.php'</script>";
        }
	
	
}else{

include('conexao.php');

  	$test = mysqli_query($con,"SELECT * FROM reservas Where data_reserva = '$data_completa' and id_tipo ='$tipo_reserva' and turno = '$turno' and id_objeto ='$id_objeto_reservado'");
	$cont = mysqli_num_rows($test);	
  
  	if($cont == 0 ){
  		$insert = mysqli_query($con,"INSERT INTO reservas(matricula,data_reserva,id_tipo,turno,id_objeto) VALUES('$id_matricula','$data_completa','$tipo_reserva','$turno','$id_objeto_reservado')"); 
  		if($insert){
        if($id_user == 5){
          echo"<script language='javascript' type='text/javascript'>alert('Reserva realizada com sucesso!');window.location.href='pag_proreitoria.html.php'</script>";
        }elseif (id_user == 2) {
           echo"<script language='javascript' type='text/javascript'>alert('Reserva realizada com sucesso!');window.location.href='pag_professor.html.php'</script>";
        }
  		}else{
        if($id_user == 5){
          echo"<script language='javascript' type='text/javascript'>alert('Reserva invalida!');window.location.href='pag_proreitoria.html.php'</script>";
        }elseif (id_user == 2) {
           echo"<script language='javascript' type='text/javascript'>alert('Reserva invalida!');window.location.href='pag_professor.html.php'</script>";
        }
  		}

  	}else{
      if($id_user == 5){
          echo"<script language='javascript' type='text/javascript'>alert('Reserva já existente!');window.location.href='pag_proreitoria.html.php'</script>";
        }elseif (id_user == 2) {
           echo"<script language='javascript' type='text/javascript'>alert('Reserva já existente!');window.location.href='pag_professor.html.php'</script>";
        }

  }
 }
