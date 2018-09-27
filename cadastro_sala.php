<?


$id_setor = $_POST['setor'];

$numero_sala_no_setor = $_POST['numero_sala_no_setor'];

$tipo_de_sala = $_POST['tipo_de_sala'];


$num_cadeiras =$_POST['num_cadeiras'];

$tamanho_mquadrado=$_POST['tamanho_mquadrado'];

$ar_condicionado=$_POST['ar_condicionado'];

$data_reserva_inicio=$_POST['data_reserva_inicio'];

$data_reserva_fim=$_POST['data_reserva_fim'];
							

include('conexao.php');
        	   
  $insert = mysqli_query($con,"INSERT INTO sala(setor,numero_sala_no_setor,tipo_de_sala,num_cadeiras,tamanho_mquadrado,ar_condicionado,data_reserva_inicio,data_reserva_fim) VALUES($id_setor ,$numero_sala_no_setor,$tipo_de_sala,$num_cadeiras,$tamanho_mquadrado,$ar_condicionado,$data_reserva_inicio,$data_reserva_fim)"); 

  if($insert){

    echo"<script language='javascript' type='text/javascript'>alert('Sensor cadastrado com sucesso!');window.location.href='pag_prefeitura.php'</script>";
  
  }