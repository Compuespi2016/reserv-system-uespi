<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Salas</title>
	
</head>
	<body>

		<div class="center-align" >
	 		<h2 class="center-align">SALAS</h2>
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

							echo "<td>Tipo:</td>";
							
							echo "<td>Ar-Cond:</td>";
							
							echo "<td>Projetor:</td>";
							
							echo "<td>Capacidade:</td></tr>";


						while($fetch = mysqli_fetch_assoc($check)){

							$id_sala = $fetch['id'];
							echo "<tr><td>$id_sala</td>";

							$id_setor = $fetch['setor'];
							echo "<td>$id_setor</td>";

							$numero_sala_no_setor = $fetch['numero_sala_no_setor'];
							echo "<td>$id_setor</td>";

							
							

							$tipo_de_sala =$fetch['tipo_de_sala'];

							if($tipo_de_sala == 1){

								echo "<td>Aula</td>";

							}else if($tipo_de_sala == 2){

								echo "<td>Laboratorio</td>";

							}else if($tipo_de_sala == 3){

								echo "<td>Auditorio</td>";

							}else{

							}
							

							$ar_condicionado = $fetch['ar_condicionado'];
							if($ar_condicionado == 1){
								echo "<td>Sim</td>";
							}else{
								echo "<td>Não</td>";
							}

							$projetor=$fetch['projetor'];

							if($projetor == 1){
								echo "<td>Sim</td>";
							}else{
								echo "<td>Não</td>";
							}
							

							$capacidade =$fetch['capacidade'];
							echo "<td>$capacidade</td>";
					
						}
					}
		        ?>
	        </table>
		</div>

		<div class = "form">
			
			<h1>Cadastro de Sala</h1>

			<form method="POST" action="cadastro_sala.php" enctype="multipart/form-data">
				<input type="int" name="setor" placeholder="setor">
				<input type="int" name="numero_sala_no_setor" placeholder="numero_sala_no_setor">
				<input type="int" name="tipo_de_sala" placeholder="tipo sala">
				<input type="int" name="capacidade" placeholder="capacidade">
				<input type="int" name="ar_condicionado" placeholder="ar_condicionado">
				<input type="int" name="projetor" placeholder="projetor">
				<button>Cadastrar</button>
			</form>

		</div>
	</body>
</html>

