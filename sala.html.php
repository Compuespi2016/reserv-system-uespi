<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de reservas - Cadastro de Salas</title>
	<link rel="stylesheet" href="css/pages/home.css">
	<link rel="stylesheet" media="Screen and (max-width: 700px)" href="css/mobile.css">
</head>

</head>
<body>
	<header id="header" class="page-home">
		<div class="container">
			<div class="row">
				<div class="col col-4 col-mobile-6">
					<a href="index.html">
						<h3><img src="./imagens/uespi2.png"></h3>
					</a>
				</div>

				<div class="col col-8 col-mobile-6">
					<nav>
						<ul>
							<li><a href="#" class="active">Usuário</a></li>
							<li><a href="#">Opção 1</a></li>
							<li><a href="#">Opção 2</a></li>
							<li><a href="#">Opção 3</a></li>
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
			<h2>SALAS</h2>
			<div class="col col-2"></div>
			<div class="col col-8">
				<table class = "centered" >
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

						echo "<td>Capacidade:</td></tr>";


						while($fetch = mysqli_fetch_assoc($check)){

							$id_sala = $fetch['id'];
							echo "<tr><td>$id_sala</td>";

							$id_setor = $fetch['setor'];
							echo "<td>$id_setor</td>";

							$numero_sala_no_setor = $fetch['numero_sala_no_setor'];
							echo "<td>$id_setor</td>";




							$tipo_de_sala =$fetch['tipo_de_sala'];

							if($tipo_de_sala == 1){

								echo "<td>Aula</td>";

							}else if($tipo_de_sala == 2){

								echo "<td>Laboratorio</td>";

							}else if($tipo_de_sala == 3){

								echo "<td>Auditorio</td>";

							}else{

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

						}
					}
					?>
				</table>
			</div>
			<div class="col col-2"></div>
		</div>
	</section>

	<br>

	<section class="section section-center">
		

		<h1>Cadastro de Sala</h1>
		<div class = "container">

			<form method="POST" action="cadastro_sala.php" enctype="multipart/form-data">
				<input type="int" name="setor" placeholder="setor">
				<input type="int" name="numero_sala_no_setor" placeholder="numero_sala_no_setor">
				<input type="int" name="tipo_de_sala" placeholder="tipo sala">
				<input type="int" name="capacidade" placeholder="capacidade">
				<input type="int" name="ar_condicionado" placeholder="ar_condicionado">
				<input type="int" name="projetor" placeholder="projetor">
				<div class="input-control">
					<input type="submit" name="Cadastrar" value="Cadastrar">
				</div>
			</form>

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

</body>
</html>

