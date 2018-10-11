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
                            <li><a href="index.html.php" class="active">Home</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="#">Menu Item</a></li>
                            <li><a href="#">Menu Item</a></li>
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
        <p>Itens disponieveis para reserva</p>
        <div class="container">
            <div class="row">
                <div class="col col-12">
                    <div>
                       <select onchange="la(this.value)" id="appearance-select">
                          <option disabled="" selected="">Selecione</option>
                          <option value="index_salas.html.php">Salas</option>
                          <option value="index_notebooks.html.php">Notebooks</option>
                          <option value="index_datashow.html.php">Datashow</option>
                          <option value="index_diversos.html.php">Diversos</option>
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
        <div class="row">
            <div class="col col-offset-desktop-1 col-4 col-mobile-6">
                <p>Aenean sollicitudin, lorem quis bibendum. Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor</p>
            </div>

            <div class="col col-offset-desktop-1 col-3 col-mobile-2">
                <h3>Menu</h3>
                <nav>
                    <ul>
                        <li><a href="index.html" class="active">Home</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="#">Membros</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>           
                </nav>
            </div>

        </div>
    </div>

</footer>


<div id="copyright">
    &copy; UESPI - 2018 - Todos os direitos reservados
</div>

</body>
</html>