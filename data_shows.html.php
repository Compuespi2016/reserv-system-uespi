<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de reservas - Cadastro de datashows</title>
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
					<a href="">
						<h3><img src="./imagens/uespi2.png"></h3>
					</a>
				</div>

				<div class="col col-8 col-mobile-6">
					<nav>
						<ul>
							<?php
							echo "<li><a href='pag_diretor.html.php'> $logado </a></li>"
							?>							
							<li><a href="notebooks.html.php">Cadastro Notebook</a></li>
							<li><a href="#" class="active">Cadastro Data-Show</a></li>
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
							echo "<td>Delete:</td></tr>";
							while($fetch = mysqli_fetch_assoc($check)){
								$marca = $fetch['marca'];
								echo "<tr><td>$marca</td>";
								$entercabo = $fetch['entrada_de_cabo'];
								echo "<td>$entercabo</td>";
								$lumens = $fetch['lumens'];
								echo "<td>$lumens</td>";

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
		

		<div class="row">
			<h1>Cadastro de Datashows</h1>
			<div class = "container">

				<form method="POST" action="cadastro_datashows.php" enctype="multipart/form-data">
					<input type="text" name="marca" placeholder="Marca">
					<input type="text" name="entercabo" placeholder="Tipo de entrada de cabo">
					<input type="int" name="lumens" placeholder="Lumens(intesidade luminosa)">
					<div class="input-control">
						<input type="submit" name="Cadastrar" value="Cadastrar">
					</div>
				</form>

			</div>
		</div>
	</section>
</main>

    <!--
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col col-offset-desktop-1 col-4 col-mobile-6">
                   
                </div>
                <div class="col col-offset-desktop-1 col-3 col-mobile-2">
                    <h3>Menu</h3>
                    <nav>
                        <ul>
                            <li><a href="index.html" class="active">Home</a></li>
                            <li><a href="login.html">Usúario</a></li>
                            <li><a href="#">Opção 1</a></li>
                            <li><a href="#">Opção 2</a></li>
                        </ul>           
                    </nav>
                </div>
            </div>
        </div>
    </footer>
-->


<div id="copyright">
	&copy; UESPI - 2018 - Todos os direitos reservados
</div>

<script type="text/javascript">
	function fun_del(value) {
		$.post("delete_data_shows.php", { id: value });
		alert("Data-Show excluido com Sucesso");
		window.location.href='data_shows.html.php';
	}

</script>

</body>
</html>