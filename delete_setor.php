<?php 
include('conexao.php');
$id = $_POST['id'];
  if($id == "" || $id == null){
    echo"<script language='javascript' type='text/javascript'>alert('ERRO em -delete_sala.php-');window.location.href='cadastro_setor.html.php';</script>";
      }else{
        $query = "DELETE FROM setor WHERE id = $id";
        $delete = mysqli_query($con,$query);  
        if($delete){
          echo"<script language='javascript' type='text/javascript'>alert('Setor excluida com sucesso!');window.location.href='pag_prefeitura.html.php'</script>";
      }
    }
?>

