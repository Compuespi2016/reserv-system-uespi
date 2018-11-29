<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Reservas - Salas</title>
	<link rel="stylesheet" href="css/pages/home.css">
	<link rel="stylesheet" media="Screen and (max-width: 700px)" href="css/mobile.css">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>

</head>
<body>
	<?php  
	include('conexao.php');
	header("Content-Type: text/html; charset=ISO-8859-1",true);
	session_start();
	if((!isset($_SESSION['login'])==true)and(!isset($_SESSION['senha'])==true))
	{
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		header('location:login.html');   

	}
	$logado = $_SESSION['nome'];

	?>

	<header id="header" class="page-home">
		<div class="container">
			<div class="row">
				<div class="col col-4 col-mobile-6">
					<a href="#">
					<h3><img src="./imagens/uespi2.png"></h3>
				</a>
			</div>

			<div class="col col-8 col-mobile-6">
				<nav>
					<ul>
						<?php
						echo "<li><a href='pag_professor.html.php'> $logado </a></li>"
						?>
						<li><a href="reserv_sala_unitaria.html.php">Reserva de Salas</a></li>
                            <li><a href="reserv_notebooks.html.php">Reserva de Notebook</a></li>
                            <li><a href="reserv_datashows.html.php">Reserva de Data-Show</a></li>
                            <li><a href="#">Minhas reservas</a></li>
                            <li><a href="index.html.php">Sair</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>    
</header>

<main>
	<section class="section section-center">
		<div class="container">
				<div class="row">
					<h2>SALAS</h2>
					
					<div class="col col-2"></div>
					<div class="col col-4">
						<table>
							<?php 
							include('conexao.php');
							$check  = mysqli_query($con,"SELECT * FROM salas");
							if(mysqli_num_rows($check) == 0){
								echo "<h3> Não há salas cadastrados</h3>";
							}else{
								
								echo "<tr><td>Setor:</td>";
								echo "<td>Num_Sala:</td>";
								echo "<td>Tipo:</td>";
								echo "<td>Ar_Cond:</td>";
								echo "<td>Projetor:</td>";
								echo "<td>Capacidade:</td>";
								echo "<td>Reservar</td></tr>";
								
								while($fetch = mysqli_fetch_assoc($check)){
									$id_setor = $fetch['setor'];
									echo "<tr><td>$id_setor</td>";
									$numero_sala_no_setor = $fetch['numero_sala_no_setor'];
									echo "<td>$numero_sala_no_setor</td>";
									$tipo_de_sala =$fetch['tipo_de_sala'];
									if($tipo_de_sala == 1){
										echo "<td>Aula</td>";
									}else if($tipo_de_sala == 2){
										echo "<td>Laboratorio</td>";
									}else if($tipo_de_sala == 3){
										echo "<td>Auditorio</td>";
									}else{
										echo "<td>Nao definido </td>";
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

									$idx = $fetch['id'];
									echo "<td> <form action = 'cad_reserv_sala_unitaria.html.php' method = 'POST'>";
									echo "<input type = 'hidden' name = 'id_objeto' value = '$idx' >
									<button class='btn-flat' type='submit' name ='action'><i class='material-icons center'>Reservar</i></button></form></td></tr>";
								}
							}
							

							?>
						</table>
					</div>
				</div>
			</div>
	</section>

	

	<section class="section section-center">
		

		
</main>



<div id="copyright">
	&copy; UESPI - 2018 - Todos os direitos reservados
</div>

</body>
</html>