<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Setor</title>
	
</head>
	<body>

		<div class="center-align" >
	 		<h2 class="center-align">Setores</h2>
			<table class = "centered" >
				<?php 
		        	include('conexao.php');
	        		$check  = mysqli_query($con,"SELECT * FROM salas");
	        		if(mysqli_num_rows($check) == 0){
						echo "<h3> Não há salas cadastrados</h3>";
					}else{


							echo "<tr><td>Id:</td>";
							
							echo "<td>Setor:</td>";
						
							echo "<td>Num Sala:</td>";

							echo "<td>Num Cadeiras:</td>";
							
							echo "<td>Tam m²:</td>";
							
							echo "<td>Ar-Cond:</td>";
							
							echo "<td>Dat.Inicio</td>";
							
							echo "<td>Dat.Fim:</td></tr>"; 


						while($fetch = mysqli_fetch_assoc($check)){

							$id_sala = $fetch['id'];
							echo "<tr><td>$id_sala</td>";

							$id_setor = $fetch['setor'];
							echo "<td>$id_setor</td>";

							$numero_sala_no_setor = $fetch['numero_sala_no_setor'];
							echo "<td>$numero_sala_no_setor</td>";

							$num_cadeiras =$fetch['num_cadeiras'];
							echo "<td>$num_cadeiras</td>";

							$tamanho_mquadrado=$fetch['tamanho_mquadrado'];
							echo "<td>$tamanho_mquadrado</td>";

							$ar_condicionado=$fetch['ar_condicionado'];
							if($ar_condicionado == 1){
								echo "<td>Sim</td>";
							}
							

							$data_reserva_inicio=$fetch['data_reserva_inicio'];
							echo "<td>$data_reserva_inicio</td>";

							$data_reserva_fim=$fetch['data_reserva_fim'];
							echo "<td>$data_reserva_fim</td></tr>"; 
					
						}
					}
		        ?>
	        </table>
		</div>

		<div class = "form">
			
			<h1>Cadastro de Setor</h1>

			<form method="POST" action="cadastro_setor.php">
				
				<button>Cadastrar</button>
			</form>

		</div>
	</body>
</html>

