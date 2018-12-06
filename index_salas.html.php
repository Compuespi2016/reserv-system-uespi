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
                            <li><a href="index.html.php" class="active">Ṕágina inicial</a></li>
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
                        header("Content-Type: text/html; charset=ISO-8859-1",true);
                        $check  = mysqli_query($con,"SELECT * FROM salas");
                        if(mysqli_num_rows($check) == 0){
                            echo "<h3> Não há salas cadastrados</h3>";
                        }else{
                            echo "<td>Setor:</td>";
                            echo "<td>Num Sala:</td>";
                            echo "<td>Tipo:</td>";
                            echo "<td>Ar-Cond:</td>";
                            echo "<td>Projetor:</td>";
                            echo "<td>Capacidade:</td>";
                            echo "<td>Estado:</td></tr>";
                            while($fetch = mysqli_fetch_assoc($check)){

                            $id = $fetch['id'];
                            $checkx  = mysqli_query($con,"SELECT * FROM reservas WHERE id_objeto = '$id' ");
                            $valor = mysqli_num_rows($checkx);



                                $id_sala = $fetch['id'];
                                echo "<tr>";
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
                                    echo "<td>Nao definido </td>";
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
                                $estado=$fetch['estado'];
                                if($valor > 0){
                                    echo "<td>reservado</td>";
                                }else{
                                    echo "<td>disponivel</td>";
                                }
                            }
                        }
                        ?>
                    </table>                    
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