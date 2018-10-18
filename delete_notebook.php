<?php 
include('conexao.php');
$id = $_POST['id'];
  if($id == "" || $id == null){
    echo"<script language='javascript' type='text/javascript'>alert('ERRO em -delete_notebook.php-');window.location.href='notebook.html.php';</script>";
      }else{
        $query = "DELETE FROM notebooks WHERE id = $id";
        $delete = mysqli_query($con,$query);  
        if($delete){
          echo"<script language='javascript' type='text/javascript'>alert('Notebook excluido com sucesso!');window.location.href='pag_diretor.html.php'</script>";
      }
    }
?>

