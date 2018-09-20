<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Minha pagina</title>
	 <meta charset="utf-8">
	
	<?php 
		include('conexao.php');
		session_start();
		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
			unset($_SESSION['login']);
			unset($_SESSION['senha']);
		    header('location:index.html');
		}

	?>
</head>
<body>

	<h1>Prefeitura UESPI</h1>
	<?php
		echo "<li><a href='#'>Bem-Vindo</a></li>";
    ?>
	<ul>
		<li><a href="cadastro_setor.html">Cadastro Setor</a></li>
		<li><a href="#">Cadastro Sala</a></li>
		
	</ul>
</body>
</html>