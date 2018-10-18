<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de reservas - Cadastro de notebooks</title>
	<link rel="stylesheet" href="css/pages/home.css">
	<link rel="stylesheet" media="Screen and (max-width: 700px)" href="css/mobile.css">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>

</head>
<body>
	<?php  
	include('conexao.php');
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
						echo "<li><a href='pag_diretor.html.php'> $logado </a></li>"
						?>
						<li><a href="$" class="active">Cadastro Notebook</a></li>
						<li><a href="data_shows.html.php">Cadastro Data-Show</a></li>
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

				<h2>NOTEBOOKS</h2>
				<div class="col col-2"></div>
				<div class="col col-8">
					<table class = "centered" >
						<?php 
						include('conexao.php');
						$check  = mysqli_query($con,"SELECT * FROM notebooks");
						if(mysqli_num_rows($check) == 0){
							echo "<h3> Não há notebooks cadastrados</h3>";
						}else{
							echo "<tr><td>Marca:</td>";
							echo "<td>Modelo:</td>";
							echo "<td>Polegada:</td>";
							echo "<td>SO:</td>";
							echo "<td>Delete:</td></tr>";

							while($fetch = mysqli_fetch_assoc($check)){
								$marca = $fetch['marca'];
								echo "<tr><td>$marca</td>";
								$modelo = $fetch['modelo'];
								echo "<td>$modelo</td>";
								$polegada = $fetch['polegada'];
								echo "<td>$polegada</td>";
								$so =$fetch['so'];
								echo "<td>$so</td>";

								$id = $fetch['id'];
									echo "<td><button class='btn-flat' value='$id' onclick='fun_del(this.value)' name='bt1'>
									<i class='material-icons center'>DELETE</i>
									</button></td>";

							}
						}
						?>
					</table>
				</div>
				<div class="col col-2"></div>
			</div>
		</div>
	</section>

	

	<section class="section section-center">
		

		<h1>Cadastro de Notebooks</h1>
		<div class = "container">
			<div class="row">
				<form method="POST" action="cadastro_notebooks.php" enctype="multipart/form-data">
					<input type="text" name="marca" placeholder="Marca">
					<input type="text" name="modelo" placeholder="Modelo">
					<input type="int" name="polegada" placeholder="Tamanho tela(polegadas)">
					<input type="text" name="so" placeholder="SO(Sistema Operacional)">
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
		$.post("delete_notebook.php", { id: value });
		alert("notebook  excluido com Sucesso");
		window.location.href='notebooks.html.php';
	}

</script>

</body>
</html>