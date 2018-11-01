<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de reservas - Cadastro de datashows</title>
	<link rel="stylesheet" href="css/pages/home.css">
	<link rel="stylesheet" media="Screen and (max-width: 700px)" href="css/mobile.css">
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
					<a href="">
						<h3><img src="./imagens/uespi2.png"></h3>
					</a>
				</div>

				<div class="col col-8 col-mobile-6">
					<nav>
						<ul>
							<?php
							echo "<li><a href='pag_professor.html.php'> $logado </a></li>"
							?>							
							<li><a href="#">Reserva de Salas</a></li>
                            <li><a href="reserv_notebooks.html.php">Reserva de Notebook</a></li>
                            <li><a href="reserv_datashows.html.php">Reserva de Data-Show</a></li>
                            <li><a href="#">Minhas reservas</a></li>
                            <li><a href="index.html.php">Sair</a></li>
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
			<div class="row">
				<h2>DATASHOWS</h2>
				<div class="col col-2"></div>
				<div class="col col-8">
					<table class = "centered" >
						<?php 
						include('conexao.php');
						$check  = mysqli_query($con,"SELECT * FROM data_shows");
						if(mysqli_num_rows($check) == 0){
							echo "<h3> Não há datashows cadastrados</h3>";
						}else{
							echo "<tr><td>Marca:</td>";
							echo "<td>Entrada do cabo:</td>";
							echo "<td>Lumens:</td>";
							while($fetch = mysqli_fetch_assoc($check)){
								$marca = $fetch['marca'];
								echo "<tr><td>$marca</td>";
								$entercabo = $fetch['entrada_de_cabo'];
								echo "<td>$entercabo</td>";
								$lumens = $fetch['lumens'];
								echo "<td>$lumens</td>";
								$id = $fetch['id'];
								echo "<td> <form action = 'cad_reserv_datashows.html.php' method = 'POST'>";
								echo "<input type = 'hidden' name = 'id' value = '$id' >";
								echo "<button class='btn-flat' type='submit' name ='action'><i class='material-icons center'>Reservar</i></td></tr>" ;
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
		

		
	</section>
</main>


<div id="copyright">
	&copy; UESPI - 2018 - Todos os direitos reservados
</div>
<script type="text/javascript">
	function fun_del(value) {
		
		$.post("cad_reserv_datashows.html.php", {id:value})
		alert("Data: "+ value);
    	window.location.replace("cad_reserv_datashows.html.php");
		
	}
</script>
</body>
</html>