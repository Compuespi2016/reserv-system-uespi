<?php 
include('conexao.php');
$id = $_POST['id'];
  if($id == "" || $id == null){
    echo"<script language='javascript' type='text/javascript'>alert('ERRO em -delete_sala.php-');window.location.href='sala.html.php';</script>";
      }else{
        $query = "DELETE FROM salas WHERE id = $id";
        $delete = mysqli_query($con,$query);  
        if($delete){
          echo"<script language='javascript' type='text/javascript'>alert('Sala excluida com sucesso!');window.location.href='pag_prefeitura.html.php'</script>";
      }
    }
?>

