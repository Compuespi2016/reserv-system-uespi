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
	include('conexao.php');
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
							<li><a href="cadastro_setor.html.php">Cadastrar Setor</a></li>
							<li><a href="sala.html.php" class="active">Cadastrar Sala</a></li>
							<li><a href="logout.php">Sair</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>    
	</header>

	<main>
		

		<section class="section section-center">
			<?php 
							include('conexao.php');
							$check  = mysqli_query($con,"SELECT * FROM salas");
							if(mysqli_num_rows($check) == 0){
								echo "<h3> Não há salas cadastrados</h3>";
							}else{
								$fetch = mysqli_fetch_assoc($check);
							}
	
							?>
			<div class="row">
				<h1>Atualizar Dados de Sala</h1>
				<div class = "container">

					<form method="POST" action="atualiza_sala.php" enctype="multipart/form-data">
						<select name="setor">
							<?php $query = $con->query("SELECT id FROM setor"); ?>

							<option value = "<?php echo $fetch['setor']; ?>"><?php echo $fetch['setor']; ?></option>

							<?php while($reg = $query->fetch_array()) { ?>
								<option value="<?php echo $reg['id']; ?>">
									<?php echo $reg['id']; ?>
								</option>
							<?php } ?>  

						</select>

						<input type="int" name="num_sala" placeholder="Numero da Sala" value="<?php echo $fetch['numero_sala_no_setor'];?>">

						<select name="tipo_de_sala">
							<option value="<?php echo $fetch['tipo_de_sala'];?>">
								<?php
									if($fetch['tipo_de_sala']== 1){
										echo "Aulas";
									}elseif($fetch['tipo_de_sala']== 2){
										echo "Laboratorio";
									}elseif($fetch['tipo_de_sala']== 3){
										echo "Auditorio";
									}else{
										echo "Outro";
									}
								?>		
							</option>
							<option value="1" >Aulas</option>
							<option value="2" >Laboratorio</option>
							<option value="3" >Auditorio</option>
							<option value="0" >Outro</option>
						</select>

						<input type="int" name="capacidade" placeholder="capacidade" value="<?php echo $fetch['capacidade'];?>">

						<select name="ar_condicionado">
							<option value="<?php echo $fetch['ar_condicionado'];?>">
								<?php
									if($fetch['ar_condicionado']== 0){
										echo "Não";
									}else{
										echo "Sim";
									}
								?>		
							</option>
							<option value="1" >Sim</option>
							<option value="0" >Não</option>
						</select>
						<select name="projetor">
							
							<option value="<?php echo $fetch['projetor'];?>">
								<?php
									if($fetch['projetor']== 0){
										echo "Não";
									}else{
										echo "Sim";
									}
								?>		
							</option>
							<option value="1" >Sim</option>
							<option value="0" >Não</option>
						</select>
						<input type="hidden" name="id_alterar" value="<?php echo $fetch['id']; ?>" />
						<div class="input-control">
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
	<script type="text/javascript">
		function fun_del(value) {
			$.post("delete_sala.php", { id: value });
			alert("Sala  Excluido com Sucesso");
			window.location.href='sala.html.php';
		}

	</script>
</body>
</html>
