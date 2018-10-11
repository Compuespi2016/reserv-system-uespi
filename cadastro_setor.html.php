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
	        		$check  = mysqli_query($con,"SELECT * FROM setor");
	        		if(mysqli_num_rows($check) == 0){
						echo "<h3> Não há setores cadastrados</h3>";
					}else{
						while($fetch = mysqli_fetch_assoc($check)){

							$id_setor = $fetch['id'];
							echo "<tr><td>Setor:";
							echo "$id_setor</td></tr>"; 
					
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

