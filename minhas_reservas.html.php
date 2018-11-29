<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de reservas - UESPI</title>
    <link rel="stylesheet" href="css/pages/home.css">
    <link rel="stylesheet" media="Screen and (max-width: 700px)" href="css/mobile.css">
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
    $tipo_user = $_SESSION['id']
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
                            if($tipo_user == 2){
                echo "<li><a href='pag_professor.html.php' class ='active' > $logado </a></li>";
                                echo"
                            <li><a href='reserv_notebooks.html.php'>Reserva de Notebook</a></li>
                            <li><a href='reserv_datashows.html.php'>Reserva de Data-Show</a></li>";
                            }else{
                echo "<li><a href='pag_proreitoria.html.php' class ='active' > $logado </a></li>";
                            }
                            ?>
                            <li><a href="reserv_sala_unitaria.html.php">Reserva de Salas</a></li>
                            <li><a href="minhas_reservas.html.php">Minhas Reservas</a></li>
                            <li><a href="index.html.php">Sair</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
    </div>    
</header>

<main>
    <section id="middle" class="section section-center">

        <h2>Itens e Salas - UESPI</h2>
        <p>Itens disponiveis para reserva</p>
        <div class="container">
            <div class="row">
                <div class="col col-12">
                    <div>
                       <select onchange="la(this.value)" id="appearance-select">
                          <option disabled="" selected="">Selecione</option>
                          <option value="minhas_reservas_salas.html.php">Salas</option>
                          <option value="minhas_reservas_notebooks.html.php">Notebooks</option>
                          <option value="minhas_reservas_datashows.html.php">Datashow</option>
                          
                      </select>  

                      <script type="text/javascript">
                          function la(src){
                            window.location=src;
                        }
                    </script>
                </div>
            </div>
        </div>            
    </section>
</main>



<footer id="footer">

    <div class="container">
  
    </div>

</footer>


<div id="copyright">
    &copy; UESPI - 2018 - Todos os direitos reservados
</div>

</body>
</html>