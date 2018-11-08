            
<?
    $id = $_POST['id'];

?>
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
                           echo "<li><a href='#' class ='active' > $logado </a></li>" ;
                            ?>
                            <li><a href="#">Reserva de Salas</a></li>
                            <li><a href="reserv_notebooks.html.php">Reserva de Notebook</a></li>
                            <li><a href="reserv_datashows.html.php">Reserva de Data-Show</a></li>
                            <li><a href="#">Minhas reservas</a></li>
                            <li><a href="index.html.php">Sair</a></li>
                         
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

                <h2>DATASHOW :</h2>
                <div class="col col-2"></div>
                <div class="col col-8">
                    <table class = "centered" >
                        <?php 
                        include('conexao.php');
                        $check  = mysqli_query($con,"SELECT * FROM data_shows WHERE  id ='$id'");
                        if(mysqli_num_rows($check) == 0){
                            echo "<h3> Não há notebooks cadastrados</h3>";
                        }else{
                            echo "<tr><td>Marca:</td>";
                            echo "<td>Entrada de cabo:</td>";
                            echo "<td>Lumens:</td>";

                            while($fetch = mysqli_fetch_assoc($check)){
                                $marca = $fetch['marca'];
                                echo "<tr><td>$marca</td>";
                                $entrada_cabo = $fetch['entrada_de_cabo'];
                                echo "<td>$entrada_cabo</td>";
                                $Lumens = $fetch['lumens'];
                                echo "<td>$Lumens</td>";

                            }
                        }
                        ?>
                    </table>
                </div>
                <div class="col col-2"></div>
            </div>
        </div>
    
    <section class="section section-center">
            
            <div class="row">
                <h1>EFETUAR RESERVA DE DATASHOW</h1>
                <div class = "container">

                    <form method="POST" action="cadastro_resev.php" enctype="multipart/form-data">
                        <select name="dia">
                            <option disabled="" selected="">Dia</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>

                        </select>
                            <select name="mes">
                            <option disabled="" selected="">Mês</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            
                        </select>
                        <select name="ano">
                            <option disabled="" selected="">Ano</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <select name="turno">
                            <option disabled="" selected="">Horario</option>
                            <option value="08-10">08-10</option>
                            <option value="10-12">10-12</option>
                            <option value="14-16">14-16</option>
                            <option value="16-18">16-18</option>
                            <option value="18-20">18-20</option>
                            <option value="20-22">20-22</option>
                        </select>
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
  <script type="text/javascript">
    function fun_del(value) {
        
        $.post("cadastro_resev.php", {id:value})
        alert("Data: "+ value);
        window.location.replace("cadastro_resev.php");
        
    }
</script> 
</body>
</html>