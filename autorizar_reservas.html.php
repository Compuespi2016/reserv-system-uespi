<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Prefeitura - UESPI</title>
    <link rel="stylesheet" href="css/pages/home.css">
    <link rel="stylesheet" media="Screen and (max-width: 700px)" href="css/mobile.css">


    <?php 
    include('conexao.php');
    header("Content-Type: text/html; charset=ISO-8859-1",true);
    session_start();
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:index.html.php');
    }

    ?>
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

                <div class="col col-8 col-mobile-6">
                    <nav>
                        <ul>
                            <li><a href="pag_prefeitura.html.php">Prefeitura</a></li>
                            <li><a href="cadastro_setor.html.php">Cadastrar Setor</a></li>
                            <li><a href="sala.html.php">Cadastrar Sala</a></li>
                            <li><a href="autorizar_reservas.html.php" class="active">Autorizar Reservas</a></li>
                            <li><a href="logout.php">Sair</a></li>
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
                    <h2>SALAS</h2>
                    
                    <div class="col col-11" align="center">
                        <table>
                            <?php 
                            include('conexao.php');
                            header("Content-Type: text/html; charset=ISO-8859-1",true);

                            $check  = mysqli_query($con,"SELECT * FROM pre_reservas WHERE status = 0");
                            if(mysqli_num_rows($check) == 0){
                                echo "<h3> Não há salas cadastrados</h3>";
                            }else{
                                echo "<tr><td>Solicitante:</td>";
                                echo "<td>Num_pre_reserva :</td>";
                                echo "<td>Data:</td>";
                                echo "<td>Tipo:</td>";
                                echo "<td>Turno:</td>";
                                echo "<td>Id Sala:</td>";
                                echo "<td>Autorizar</td>";
                                while($fetch = mysqli_fetch_assoc($check)){
                                    

                                $matricula = $fetch['matricula'];
                                echo "<tr><td>$matricula</td>";
                                $id_pre_reserva = $fetch['id_pre_reserva'];
                                echo "<td>$id_pre_reserva</td>";
                                $data_reserva = $fetch['data_reserva'];
                                echo "<td>$data_reserva</td>";
                                $id_tipo = $fetch['id_tipo'];
                                echo "<td>$id_tipo</td>";
                                $turno = $fetch['turno'];
                                echo "<td>$turno</td>"; 
                                $id_objeto = $fetch['id_objeto'];
                                echo "<td>$id_objeto</td>


                                    <td>
                                        <form method='POST' action='cadastro_reserv.php' enctype='multipart/form-data'>



                                        <input type='hidden' name='id_user' value='0' />
                                        <input type='hidden' name='matricula' value='$matricula;' />
                                        <input type='hidden' name='data_completa' value='$data_reserva;' />
                                        <input type='hidden' name='id_objeto_reservado' value='$id_objeto;' />
                                        <input type='hidden' name='tipo_reserva' value='$id_pre_reserva;' />
                                         <input type='hidden' name='turno' value='$turno;' />


                                        <input type='submit' name='Autorizar' value='Autorizar'>
                                        </form>
                                    </td></tr>";
                                }
                            }
                            

                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>

</main>



<div id="copyright">
    &copy; UESPI - 2018 - Todos os direitos reservados
</div>
</body>
</html>