<?php 
  session_start();
// session_start inicia a sessão
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
include('conexao.php');
 
// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysqli_query($con,"SELECT * FROM usuarios WHERE matricula = '$login' and senha = '$senha' ");

	if(mysqli_num_rows($result) > 0 )
	{
		while($line = mysqli_fetch_array($result) ){
		
			$id = $line['id'];
			$nome = $line['nome'];
		}

		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		$_SESSION['nome'] = $nome;
		$_SESSION['id'] = $id;

		

		if($id == 0){ //prefeitura
			header('location:pag_prefeitura.html.php');
		}elseif ($id == 1){ //diretor
			header('location:pag_diretor.html.php');
		}
		
	}
	else{
	    unset ($_SESSION['login']);
	    unset ($_SESSION['senha']);
	    header('location:login.html');   
	   
    }
    
?>