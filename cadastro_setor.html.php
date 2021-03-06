<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Reservas - Cadastro de Datashows</title>
	<link rel="stylesheet" href="css/pages/home.css">
	<link rel="stylesheet" media="Screen and (max-width: 700px)" href="css/mobile.css">
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>
<body>
	<?php 
	include('conexao.php');
	header("Content-Type: text/html; charset=ISO-8859-1",true);
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:login.html');
	}

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
							<li><a href="cadastro_setor.html.php" class="active">Cadastrar Setor</a></li>
							<li><a href="sala.html.php">Cadastrar Sala</a></li>
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
					<h2>Setores</h2>
					<div class="col col-4"></div>
					<div class="col col-4">
						<table>
							<?php 
							include('conexao.php');
							$check  = mysqli_query($con,"SELECT * FROM setor");
							if(mysqli_num_rows($check) == 0){
								echo "<h3> Não há setores cadastrados</h3>";
							}else{
								while($fetch = mysqli_fetch_assoc($check)){

									$id_setor = $fetch['id'];
									echo "<tr><td>Setor:";
									echo "$id_setor</td>"; 

									$id = $id_setor;
									echo "<td><button class='btn-flat' value='$id' onclick='fun_del(this.value)' name='bt1'>
									<i class='material-icons center'>Excluir</i>
									</button></td><tr>";

								}
							}
							?>
						</table>
					</div>
					<div class="col col-12"></div>
				</div>
			</div>

			<div>

				<h1>Cadastro de Setor</h1>

				<form method="POST" action="cadastro_setor.php">
					<button>Cadastrar</button>
				</form>

			</div>
		</section>
	</main>


<div id="copyright">
	&copy; UESPI - 2018 - Todos os direitos reservados
</div>
<script type="text/javascript">
	function fun_del(value) {
		$.post("delete_setor.php", { id: value });
		alert("Setor Excluido com Sucesso");
		window.location.href='cadastro_setor.html.php';
	}

</script>
</body>
</html>