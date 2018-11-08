<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de reservas - Cadastro de Salas</title>
	<link rel="stylesheet" href="css/pages/home.css">
	<link rel="stylesheet" media="Screen and (max-width: 700px)" href="css/mobile.css">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>

</head>
<body>	
	
	<?php 
	#include('conexao.php');
	#session_start();
	#if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	#	unset($_SESSION['login']);
	#	unset($_SESSION['senha']);
	#	header('location:login.html');
	#}
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
							<li><a href="pag_prefeitura.html.php">Prefeitura</a></li>
							<li><a href="cadastro_setor.html.php">Cadastrar Setor</a></li>
							<li><a href="#" class="active">Cadastrar Sala</a></li>
							<li><a href="logout.php">Sair</a></li>
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
					
					<div class="col col-12" align="center">
						<table>
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
								echo "<td>Capacidade:</td>";
								echo "<td>Alterar</td>";
								echo "<td>Excluir</td></tr>";
								while($fetch = mysqli_fetch_assoc($check)){
									$id_sala = $fetch['id'];
									echo "<tr><td>$id_sala</td>";
									$id_setor = $fetch['setor'];
									echo "<td>$id_setor</td>";
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

									echo "<td><button class='btn-flat' value='' onclick='' name='bt1'>
									<i class='material-icons center'>Alterar</i>
									</button></td>";
									
									$id = $fetch['id'];
									echo "<td><button class='btn-flat' value='$id' onclick='fun_del(this.value)' name='bt1'>
									<i class='material-icons center'>Excluir</i>
									</button></td></tr>";
								}
							}
							

							?>
						</table>
					</div>
				</div>
			</div>
		</section>

		<br>

		<section class="section section-center">
			
			<div class="row">
				<h1>Cadastro de Sala</h1>
				<div class = "container">

					<form method="POST" action="cadastro_sala.php" enctype="multipart/form-data">
						<input type="int" name="setor" placeholder="Setor">
						<input type="int" name="num_sala" placeholder="Numero da Sala">

						<select name="tipo_de_sala">
							<option disabled="" selected="">Tipo de Sala</option>
							<option value="1" >Aulas</option>
							<option value="2" >Laboratorio</option>
							<option value="3" >Auditorio</option>
							<option value="0" >Outro</option>
						</select>

						<input type="int" name="capacidade" placeholder="capacidade">
						<select name="ar_condicionado">
							<option disabled="" selected="">Ar Condicionado</option>
							<option value="1" >Sim</option>
							<option value="0" >Não</option>
						</select>
						<select name="projetor">
							<option disabled="" selected="">Projetor</option>
							<option value="1" >Sim</option>
							<option value="0" >Não</option>
						</select>
						<div class="input-control">
							<input type="submit" name="Cadastrar" value="Cadastrar">
						</div>
					</form>

				</div>
			</div>
		</section>
	</main>

<div id="copyright">
	&copy; UESPI - 2018 - Todos os direitos reservados
</div>
<script type="text/javascript">
	function fun_del(value) {
		$.post("delete_sala.php", { id: value });
		alert("Sala  Excluido com Sucesso");
		window.location.href='sala.html.php';
	}

</script>
</body>
</html>
