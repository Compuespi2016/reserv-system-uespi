<?
include('conexao.php');

$id = $_POST['id_alterar'];

$marca = $_POST['marca'];

$modelo = $_POST['modelo'];

$polegada = $_POST['polegada'];

$so =$_POST['so'];
echo $id, $marca,$modelo,$polegada,$so;



  $insert = mysqli_query($con,"UPDATE notebooks
   SET marca = '$marca', modelo='$modelo', polegada = '$polegada', so='$so'
   WHERE id= '$id' ");


  if($insert){

    echo "<script language='javascript' type='text/javascript'>alert('Alterado com sucesso! ');window.location.href='pag_diretor.html.php'</script>";
  
  }else{
  	echo mysqli_error($insert);
  	echo "<script language='javascript' type='text/javascript'>alert('Nao deu certo!);window.location.href='notebooks.html.php'</script>";

  }