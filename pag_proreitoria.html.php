<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina Pro-Reitoria - UESPI</title>
	<link rel="stylesheet" href="css/pages/home.css">
	<link rel="stylesheet" media="Screen and (max-width: 700px)" href="css/mobile.css">


	<?php 
	include('conexao.php');
	header("Content-Type: text/html; charset=ISO-8859-1",true);
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.html.php');
	}	
	$logado = $_SESSION['nome']

	?>
</head>
<body>
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
							echo "<li><a href='pag_proreitoria.html.php' class ='active' > $logado </a></li>";

							?>
							
							
							<li><a href="reserv_sala_unitaria.html.php">Reserva de Salas</a></li>
							<li><a href="">Minhas Reservas</a></li>
							<li><a href="logout.php">Sair</a></li>
						</ul>
					</nav>
				</div>
			</div>

            <!--
            <div class="row">
                <div class="col col-12 title">
                    <h1>Tabela de Itens</h1>
                </div>

            </div>
       	    -->
    </div>    
</header>

<main>
	<section class="section section-center">
		<div class="container">
			<h2>Pro-Reitoria UESPI</h2>
			<p>Seja bem-vindo ao Sistema de cadastro de Materiais e Salas da UESPI</p>
		</div>
	</section>
</main>



<div id="copyright">
	&copy; UESPI - 2018 - Todos os direitos reservados
</div>
</body>
</html>