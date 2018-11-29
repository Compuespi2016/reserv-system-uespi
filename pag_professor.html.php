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
    <header id="header" class="page-home">
        <div class="container">
            <div class="row">
                <div class="col col-4 col-mobile-6">
                    <a href="#">
                        <h3><img src="./imagens/uespi2.png"></h3>
                    </a>
                </div>

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

                
                <div class="col col-8 col-mobile-6">
                    <nav>
                        <ul>
                            <?php
                           echo "<li><a href='#' class ='active' > $logado </a></li>" 
                            ?>
                            <li><a href="reserv_sala_unitaria.html.php">Reserva de Salas</a></li>
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
        <section id="middle" class="section section-center">

            <h2>Bem Vindo Professor</h2>          
            <h3>Neste ambiente você pode realizar reservas de Salas, data-shows e notebooks</h3>
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