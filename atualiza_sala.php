<?
include('conexao.php');

$id_alterar = $_POST['id_alterar'];

$setor = $_POST['setor'];

$num_sala = $_POST['num_sala'];

$tipo_de_sala = $_POST['tipo_de_sala'];

$capacidade = $_POST['capacidade'];

$ar_condicionado = $_POST['ar_condicionado'];

$projetor = $_POST['projetor'];

 $check  = mysqli_query($con,"SELECT * FROM reservas WHERE id_objeto = '$id_alterar' and id_tipo = 0 ");
  $valor = mysqli_num_rows($check);

if( $valor > 0){
  echo "<script language='javascript' type='text/javascript'>alert('ERRO, Sala esta reservada! ');window.location.href='pag_prefeitura.html.php'</script>";
}else{

  $insert = mysqli_query($con,"UPDATE salas
   SET setor = '$setor',
    numero_sala_no_setor='$num_sala',
    tipo_de_sala = '$tipo_de_sala',
    capacidade = '$capacidade', 
    ar_condicionado = '$ar_condicionado',
    projetor = '$projetor'
   WHERE id = '$id_alterar' ");


  if($insert){

    echo "<script language='javascript' type='text/javascript'>alert('Alterado com sucesso! ');window.location.href='pag_prefeitura.html.php'</script>";
  
  }else{
  	#echo mysqli_error($insert);
  	echo "<script language='javascript' type='text/javascript'>alert('Nao deu certo!);window.location.href='sala.html.php'</script>";

  }
}