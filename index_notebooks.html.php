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
                    <a href="index.html.php">
                        <h3><img src="./imagens/uespi2.png"></h3>
                    </a>
                </div>

                <div class="col col-8 col-mobile-6">
                    <nav>
                        <ul>
                            <li><a href="index.html.php" class="active">Página inicial</a></li>
                            <li><a href="login.html">Entrar</a></li>

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

        <h2>Itens e Salas - UESPI</h2>
        <p>Itens disponiveis para reserva</p>
        <div class="container">
            <div class="row">
                <div class="col col-12">
                    <div>
                       <select onchange="la(this.value)" id="appearance-select">
                          <option disabled="" selected="">Selecione</option>
                          <option value="index_salas.html.php">Salas</option>
                          <option value="index_notebooks.html.php">Notebooks</option>
                          <option value="index_datashow.html.php">Datashow</option>
                          
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
                    $check  = mysqli_query($con,"SELECT * FROM notebooks");
                    if(mysqli_num_rows($check) == 0){
                        echo "<h3> Não há notebooks cadastrados</h3>";
                    }else{
                        echo "<tr><td>Marca:</td>";
                        echo "<td>Modelo:</td>";
                        echo "<td>Polegada:</td>";
                        echo "<td>SO:</td>";
                        echo "<td>Estado:</td>";

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