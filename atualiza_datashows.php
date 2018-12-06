<?
include('conexao.php');

$id = $_POST['id_alterar'];

$marca = $_POST['marca'];

$entrada_de_cabo = $_POST['entrada_de_cabo'];

$lumens = $_POST['lumens'];





  $insert = mysqli_query($con,"UPDATE data_shows
   SET marca = '$marca', entrada_de_cabo='$entrada_de_cabo', lumens = '$lumens'
   WHERE id= '$id' ");


  if($insert){

    echo "<script language='javascript' type='text/javascript'>alert('Alterado com sucesso! ');window.location.href='pag_diretor.html.php'</script>";
  
  }else{
  	echo mysqli_error($insert);
  	echo "<script language='javascript' type='text/javascript'>alert('Nao deu certo!);window.location.href='data_shows.html.php'</script>";

  }