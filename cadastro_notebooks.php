<?

$marca = $_POST['marca'];

$modelo = $_POST['modelo'];

$polegada = $_POST['polegada'];

$so =$_POST['so'];

include('conexao.php');

        	   
  $insert = mysqli_query($con,"INSERT INTO notebooks(marca,modelo,polegada,so) VALUES('$marca','$modelo','$polegada','$so')");


  if($insert){

    echo"<script language='javascript' type='text/javascript'>alert('Sala cadastrada com sucesso! ');window.location.href='pag_diretor.html.php'</script>";
  
  }else{
  	echo mysqli_error($insert);
  	echo"<script language='javascript' type='text/javascript'>alert('Nao deu certo!$marca $modelo $polegada $so $insert');window.location.href='notebooks.html.php'</script>";

  }