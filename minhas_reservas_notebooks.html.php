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
                            <li><a href="reserv_sala_unitaria.html.php">Reserva de Salas</a></li>
                            <li><a href="reserv_notebooks.html.php">Reserva de Notebook</a></li>
                            <li><a href="reserv_datashows.html.php">Reserva de Data-Show</a></li>
                            <li><a href="minhas_reservas.html.php">Minhas reservas</a></li>
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

        <div class="row">
            <div class="col col-12">
                <table>
                    <?php 
                    include('conexao.php');
                    header("Content-Type: text/html; charset=ISO-8859-1",true);
                    $id_user = $_SESSION['login'];
                    $tipo_reserva = 1;
                    include('conexao.php');
                    
                    $check  = mysqli_query($con,"SELECT notebooks.*, reservas.* FROM reservas as reservas INNER JOIN notebooks as notebooks  on reservas.id_objeto = notebooks.id and reservas.matricula = $id_user and reservas.id_tipo = $tipo_reserva");
                    $valor = mysqli_num_rows($check);
                    if( $valor == 0){
                        echo "<h3> Não há notebooks cadastrados</h3>";
                    }else{
                        echo "<tr><td>Marca:</td>";
                        echo "<td>Modelo:</td>";
                        echo "<td>Polegada:</td>";
                        echo "<td>SO:</td>";
                        echo "<td>Estado:</td>";
                        echo "<td>Data:</td>";
                        echo "<td>Turno:</td><tr>";

                        while($fetch = mysqli_fetch_assoc($check)){
                            $marca = $fetch['marca'];
                            echo "<tr><td>$marca</td>";
                            $modelo = $fetch['modelo'];
                            echo "<td>$modelo</td>";
                            $polegada = $fetch['polegada'];
                            echo "<td>$polegada</td>";
                            $so =$fetch['so'];
                            echo "<td>$so</td>";
                            $estado=$fetch['estado'];
                            if($estado == 0){
                                echo "<td>reservado</td>";
                            }else{
                                echo "<td>indisponivel</td>";
                            }

                            $data = $fetch['data_reserva'];
                            echo "<td>$data</td>";
                            $turno = $fetch['turno'];
                            echo "<td>$turno</td><tr>";
                            

                        }
                    }
                    ?>
                </table>
                
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