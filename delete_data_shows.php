<?php 
include('conexao.php');
$id = $_POST['id'];
  if($id == "" || $id == null){
    echo"<script language='javascript' type='text/javascript'>alert('ERRO em -delete_data_shows.php-');window.location.href='data_shows.html.php';</script>";
      }else{
        $query = "DELETE FROM data_shows WHERE id = $id";
        $delete = mysqli_query($con,$query);  
        if($delete){
          echo"<script language='javascript' type='text/javascript'>alert('Sala excluida com sucesso!');window.location.href='pag_diretor.html.php'</script>";
      }
    }
?>

