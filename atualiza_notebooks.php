<?
include('conexao.php');

$id = $_POST['id_alterar'];

$marca = $_POST['marca'];

$modelo = $_POST['modelo'];

$polegada = $_POST['polegada'];

$so =$_POST['so'];


 $check  = mysqli_query($con,"SELECT * FROM reservas WHERE id_objeto = '$id' and id_tipo = 1 ");
  $valor = mysqli_num_rows($check);

if( $valor > 0){
	echo "<script language='javascript' type='text/javascript'>alert('ERRO, Notebook esta reservado! ');window.location.href='pag_diretor.html.php'</script>";
}else{

  $insert = mysqli_query($con,"UPDATE notebooks
   SET marca = '$marca', modelo='$modelo', polegada = '$polegada', so='$so'
   WHERE id= '$id' ");


  if($insert){

    echo "<script language='javascript' type='text/javascript'>alert('Alterado com sucesso! ');window.location.href='pag_diretor.html.php'</script>";
  
  }else{
  	echo mysqli_error($insert);
  	echo "<script language='javascript' type='text/javascript'>alert('Nao deu certo!);window.location.href='notebooks.html.php'</script>";

  }
}