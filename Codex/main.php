<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">  
<head>
  <title>Bibliotech</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="main.css">

</head>

<?php if(isset($_SESSION["permissao"]) == 1) { ?>

<body onload="load()">
  <script>
    load = () =>{
  var random = Math.floor(Math.random() * 11);
  var listaFrases = 
  [
    "O homem que não lê bons livros não tem nenhuma vantagem sobre o homem que não sabe ler.& - Mark Twain",
    "A companhia dos livros dispensa com grande vantagem a dos homens.& - Marquês de Maricá",
    "Na minha vida ainda preciso de discípulos, e se os meus livros não serviram de anzol, falharam a sua intenção. O melhor e essencial só se pode comunicar de homem para homem.& - Friedrich Nietzsche",
    "Há livros de que apenas é preciso provar, outros que têm de se devorar, outros, enfim, mas são poucos, que se tornam indispensáveis, por assim dizer, mastigar e digerir.& - Francis Bacon",
    "Caminhais em direcção da solidão. Eu, não, eu tenho os livros.& - Marguerite Duras",
    "Em ciência leia sempre os livros mais novos. Em literatura, os mais velhos.& - Millôr Fernandes",
    "Os verdadeiros analfabetos são os que aprenderam a ler e não lêem.& - Mario Quintana",
    "O livro é um mestre que fala mas que não responde.& - Platão",
    "Sempre imaginei que o paraíso fosse uma espécie de livraria.& - Jorge Luis Borges",
    "Se ao lado da biblioteca houver um jardim, nada faltará.& - Cícero",
    "A vida ideal consiste em ter bons amigos, bons livros e uma consciência sonolenta.& - Mark Twain",
    "Bendito aquele que semeia livros e faz o povo pensar.& - Castro Alves",
  ]

  var fraseSelecionada = listaFrases[random]
  var arrayFrase = fraseSelecionada.split("&");
  var frase = arrayFrase[0]
  var autor = arrayFrase[1]
  console.log(frase)
  document.getElementById("frasetop").innerHTML = frase
  console.log(autor)
  document.getElementById("autortop").innerHTML = autor
}
  </script>
  <nav class="navbar navbar-expand-lg navbar-light bg-faded">
        <a class="navbar-brand" href="#">
            <img>
            Bibliotech
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="main.php">Início <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pesquisas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="livro.php">Livros</a>
                <a class="dropdown-item" href="autores.php">Autores</a>
                <a class="dropdown-item" href="categorias.php">Categorias</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Sair</a>
            </li>
        </div>
      </nav>

    <section class=" text-xs-center">
        <div id="carouselExampleIndicators" class="carousel slide cover" data-ride="carousel">
            <ol class="carousel-indicators">
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/1.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/2.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/3.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <p></p>
        <div style="text-align: center;" class="container">
            <h2 class="jumbotron-heading">Bem-vindo,</h2>
            <h1 id="username" class="jumbotron-heading">
            <?php 
                echo $_SESSION["usuario"]; 
              ?>
            </h1>
            <p style="font-style: italic" class="lead text" id="frasetop">"O livro é um mestre que fala mas que não responde."
              </p>
              <small style="font-style: italic; font-size: 0.9em;" class="lead text" id="autortop">- Platão</small>
              <br/>
              <br/>
            <div>
                <button onclick="window.location='livro.php'" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                  Livros
                </button>
                <button onclick="window.location='autores.php'" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                  Autores
                </button>
                <button onclick="window.location='categorias.php'" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                  Categorias
                </button>
                <!-- <a href="#" class="btn btn-secondary">Pesquisar</a> -->
            </div>
        </div>
    </section>

    

    <footer class="text-muted">
        <div class="container">
            <!-- <p class="pull-xs-right">
                <a href="#">Back to top</a>
            </p> -->
            <p>Bibliotech é um projeto de desenvolvimento open-source.</p>
            <p>Quer colaborar com o projeto? <a href="../../">Visite nosso Git Hub</a> e leia nossas <a href="../../getting-started/">diretrizes de alteração</a>.</p>
        </div>
    </footer>
   
   
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        var nome = "<?php echo $_SESSION["usuario"]; ?>"
        var array = nome.split(" ")
        var newnome = nome.match(/.{1,1}/g);
        var primeironome = array[0]
        console.log(primeironome)
        console.log(newnome[0])
        document.getElementById("username").innerHTML = primeironome
      });
    </script>
  </body>

  <?php } else { 
    header('Location: index.php');
  }
  ?>
</html>