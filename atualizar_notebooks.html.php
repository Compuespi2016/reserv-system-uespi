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
						echo "<li><a href='pag_diretor.html.php'> $logado </a></li>"
						?>
						<li><a href="notebooks.html.php" class="active">Cadastro Notebook</a></li>
						<li><a href="data_shows.html.php">Cadastro Data-Show</a></li>
						<li><a href="logout.php">Sair</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>    
</header>

<main>
	
	<section class="section section-center">
			<h1>Atualiza Dados Notebooks</h1>
		<div class = "container">
			<?php 
						header("Content-Type: text/html; charset=ISO-8859-1",true);
						$id_recebido = $_POST['id_alterar'];
						$check  = mysqli_query($con,"SELECT * FROM notebooks where id = '$id_recebido'");
						if(mysqli_num_rows($check) == 0){
							echo "<h3> Não há notebooks com esse ID</h3>";
						}else{

							$fetch = mysqli_fetch_assoc($check);
							
						}
			?>
			<div class="row">
				<form method="POST" action="atualiza_notebooks.php" enctype="multipart/form-data">
					<select name="marca">
						<option value="<?php echo $fetch['marca'];?>"> <?php echo $fetch['marca'];?> </option>
						<option value="Dell">Dell</option>
						<option value="Asus">Asus</option>
						<option value="Apple">Apple</option>
						<option value="Samsumg">Samsung</option>
					</select>
					<input type="text" name="modelo" placeholder="Modelo" value="<?php echo $fetch['modelo'];?>">
					<input type="int" name="polegada" placeholder="Tamanho tela(polegadas)" value="<?php echo $fetch['polegada'];?>">
					<select name="so">
						<option value="<?php echo $fetch['so'];?>"> <?php echo $fetch['so'];?> </option>
						<option value="MacOS">MacOS</option>
						<option value="Windows">Windows</option>
						<option value="Ubuntu">Ubuntu</option>
						<option value="Linux Derivados">Linux Derivados</option>
					</select>
					<div class="input-control">
						<input type="hidden" name="id_alterar" value="<?php echo $fetch['id']; ?>" />
						
						<input type="submit" name="Alterar" value="Alterar">
					</div>
				</form>
			</div>

		</div>
	</section>
</main>

<div id="copyright">
	&copy; UESPI - 2018 - Todos os direitos reservados
</div>


</body>
</html>