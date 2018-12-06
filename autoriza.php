<?php  
	
	$id_autorizar = $_POST ['id_autorizar'];
	
	$query = mysqli_query($con,"SELECT * FROM pre_reservas WHERE id_autorizar = 'id_autorizar'");


	$test = mysqli_query($con,"SELECT * FROM reservas Where data_reserva = '$data_completa' and id_tipo ='$tipo_reserva' and turno = '$turno' and id_objeto ='$id_objeto_reservado'");
	
	$cont = mysqli_num_rows($test);	



?>