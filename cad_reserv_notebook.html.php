            
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

                <h2>NOTEBOOK :</h2>
                <div class="col col-2"></div>
                <div class="col col-8">
                    <table class = "centered" >
                        <?php 
                        include('conexao.php');
                        $check  = mysqli_query($con,"SELECT * FROM notebooks WHERE  id ='$id'");
                        if(mysqli_num_rows($check) == 0){
                            echo "<h3> Não há notebooks cadastrados</h3>";
                        }else{
                            echo "<tr><td>Marca:</td>";
                            echo "<td>Modelo:</td>";
                            echo "<td>Polegada:</td>";
                            echo "<td>SO:</td>";

                            while($fetch = mysqli_fetch_assoc($check)){
                                $marca = $fetch['marca'];
                                echo "<tr><td>$marca</td>";
                                $modelo = $fetch['modelo'];
                                echo "<td>$modelo</td>";
                                $polegada = $fetch['polegada'];
                                echo "<td>$polegada</td>";
                                $so =$fetch['so'];
                                echo "<td>$so</td>";

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
        

        <h1>EFETUAR RESERVA DE NOTEBOOK</h1>
        <div class = "container">
            <div class="row">
                <form method="POST" action="#" enctype="multipart/form-data">
                    <input type="text" name="#" placeholder="Dia">
                    <input type="text" name="#" placeholder="Mês">
                    <input type="int" name="#" placeholder="Ano">
                    <input type="text" name="so" placeholder="Horário">
                    <div class="input-control">
                        <input type="submit" name="Cadastrar" value="Reserva">
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