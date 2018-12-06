            
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
                    $matricula = $_SESSION['login'];
                    $id_user= $_SESSION['id'];

                    $var_destino = 'cadastro_reserv.php';

                    if($id_user == 2){
                        $var_destino = 'cadastro_pre_reserv.php';
                    } 

                    ?>

                
                <div class="col col-8 col-mobile-6">
                    <nav>
                        <ul>
                            <li><a href="notebooks.html.php">Cadastro Notebook</a></li>
                            <li><a href="data_shows.html.php">Cadastro Data-Show</a></li>
                            <li><a href="reserva_semestre.html.php">Reserva de Salas (Semestre)</a></li>
                            <li><a href="logout.php">Sair</a></li>

                         
                        </ul>
                    </nav>
                </div>
            </div>
        </div>    
    </header>
<main>
        <section class="section section-center">
        <div class="container">
            <div class="row">

                <h2>SALA:</h2>
                <div class="col col-2"></div>
                <div class="col col-4">
                    <table class = "centered" >
                        <?php 
                        include('conexao.php');
                        $check  = mysqli_query($con,"SELECT * FROM salas WHERE  id ='$id_objeto'");
                            if(mysqli_num_rows($check) == 0){
                                echo "<h3> Não há salas cadastrados</h3>";
                            }else{
                                echo "<tr><td>id:</td>";
                                echo "<td>Setor:</td>";
                                echo "<td>Num_Sala:</td>";
                                echo "<td>Tipo:</td>";
                                echo "<td>Ar_Cond:</td>";
                                echo "<td>Projetor:</td>";
                                echo "<td>Capacidade:</td></tr>";
                             
                                
                                while($fetch = mysqli_fetch_assoc($check)){
                                    $idx = $fetch['id'];
                                     echo "<tr><td>$idx</td>";
                                    $id_setor = $fetch['setor'];
                                    echo "<td>$id_setor</td>";
                                    $numero_sala_no_setor = $fetch['numero_sala_no_setor'];
                                    echo "<td>$numero_sala_no_setor</td>";
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

                                   
                                    
                                }
                            }
                            

                            ?>
                    </table>
                </div>
                <div class="col col-2"></div>
            </div>
        </div>
    </section>
       <section class="section section-center">
            
            <div class="row">
                <h1>EFETUAR RESERVA DE SALA</h1>
                <div class = "container">

                    <form method="POST" action="<?php echo $var_destino;?>" enctype="multipart/form-data">
                        
                        <select name="turno">
                            <option disabled="" selected="">Horario</option>
                            <option value="08-10">08-10</option>
                            <option value="10-12">10-12</option>
                            <option value="14-16">14-16</option>
                            <option value="16-18">16-18</option>
                            <option value="18-20">18-20</option>
                            <option value="20-22">20-22</option>
                        </select>
                    <input type="date" name="data_completa" ></input> 
                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                    <input type="hidden" name="matricula" value="<?php echo $matricula; ?>" />
                    <input type="hidden" name="id_objeto_reservado" value="<?php echo $idx; ?>" />

                    <input type="hidden" name="tipo_reserva" value="0" />                        
                    
                        <div class="input-control">

                            <input type="submit" name="Cadastrar" value="Cadastrar">
                        
                        </div>
                    </form>

                </div>
            </div>
        </section>

    

    <section class="section section-center">
        

        
</main>



<div id="copyright">
    &copy; UESPI - 2018 - Todos os direitos reservados
</div>

</body>
</html>
    <main>
        <section id="middle" class="section section-center">
                 

    </main>
   
</body>
</html>