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
    $tipo_user= $_SESSION['id']
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
                          <?php
                            if($tipo_user==2){
                                echo"<option value='minhas_reservas_notebooks.html.php'>Notebooks</option>
                          <option value='minhas_reservas_datashows.html.php'>Datashow</option>";

                            }
                          
                          ?>
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
                
                <div class="col col-8">
                    <table>
                        <?php 
                        include('conexao.php');
                        header("Content-Type: text/html; charset=ISO-8859-1",true);
                        $id_user = $_SESSION['login'];
                        $tipo_reserva = 0;
                        $check  = mysqli_query($con,"SELECT salas.*, reservas.* FROM reservas as reservas INNER JOIN salas as salas  on reservas.id_objeto = salas.id and reservas.matricula = $id_user and reservas.id_tipo = $tipo_reserva");
                        $valor = mysqli_num_rows($check);
                        if( $valor == 0){
                            echo " <h3>Não há salas reservadas<h3>";
                        }else{
                            echo "<td>Setor:</td>";
                            echo "<td>Num_ala:</td>";
                            echo "<td>Tipo:</td>";
                            echo "<td>Ar_Cond:</td>";
                            echo "<td>Projetor:</td>";
                            echo "<td>Capacidade:</td>";
                            echo "<td>Estado:</td>";
                            echo "<td>Data:</td>";
                            echo "<td>Turno:</td><tr>";

                            while($fetch = mysqli_fetch_assoc($check)){
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